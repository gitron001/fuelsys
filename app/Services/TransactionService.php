<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;

class TransactionService extends ServiceProvider
{
    /**
     * Check transactions
     *
     * Lock Transaction and call store function if there is one
     */
    public static function read($socket = null)
    {
        if($socket === null) {
            $socket = PFC::create_socket();
        }

            //Get all transaction by channel
            $message = "\x1\x5\x2\x1";
            $the_crc = PFC::crc16( $message);

            $binarydata = pack("c*", 0x01)
                .pack("c*",0x05)
                .pack("c*",0x02)
                .pack("c*",0x1)
                .strrev(pack("s",$the_crc))
                .pack("c*",02);


            $response = PFC::send_message($socket, $binarydata);
            //print_r($response);

            $total_msg_legth = count($response);
            for($i = 4; $i <= $total_msg_legth; $i+= 4) {
                if ($response[$i] == 1) {
                     $channel = (($i/4));
                    //Lock status transaction
                    $status = 1;
                    $changed_status = self::transaction_status($channel, $status, $socket);
                    usleep(150000);
                    self::read_data($socket, $channel);
                    if($changed_status)
                        echo 'UPDATED';
                }else if($response[$i] == 2){
                    $channel = (($i/4));
                    self::read_data($socket, $channel);
                }
            }
            //LOCKED
            return true;

    }
    /**
     * Read Transaction data and call Clear Transaction function
     *
     *
     */
    public static function read_data($socket, $channel)
    {
        $controller = Config::get('app.controller_id');
        $controller_id =  PFC::conver_to_bin($controller);
        $channel_id =  PFC::conver_to_bin($channel);

        //Generate CRC for the Transaction Message
        $message = "\x1\x6\x3".$channel_id.$controller_id;
        $the_crc = PFC::crc16( $message);

        //Read Transactions Message
        $binarydata = pack("c*", 0x01)
         .pack("c*",0x06)
         .pack("c*",0x03)
         .pack("C*", $channel )
         .pack("C*", $controller )
         .strrev(pack("s",$the_crc))
         .pack("c*",02);

        $response = PFC::send_message($socket, $binarydata);

        $transaction = new Transaction();

        $transaction->status = $response[4];

        $transaction->locker = $response[5];

        $tr_no = pack('c', $response[7]).pack('c', $response[6]);
        $tr_no = unpack('s', $tr_no)[1];

        $transaction->tr_no = $tr_no;

        $transaction->sl_no = $response[8];

        $transaction->product_id = $response[9];

        $transaction->dis_tot = $response[10];

        $price = pack('c', $response[12]).pack('c', $response[11]);
        $price = unpack('s', $price)[1];
        $transaction->price = number_format(($price/100),2);

        $lit = pack('c', $response[16]).pack('c', $response[15]).pack('c', $response[14]).pack('c', $response[13]);
        $lit = unpack('i', $lit)[1];
        $transaction->lit = number_format(($lit/100),2);

        $money = pack('c', $response[20]).pack('c', $response[19]).pack('c', $response[18]).pack('c', $response[17]);
        $money = unpack('i', $money)[1];
        $transaction->money = number_format(($money/100),2);

        $dis_tot = pack('c', $response[24]).pack('c', $response[23]).pack('c', $response[22]).pack('c', $response[21]);
        $dis_tot = unpack('i', $dis_tot)[1];
        $transaction->dis_tot = $dis_tot;


        $pfc_tot = pack('c', $response[28]).pack('c', $response[27]).pack('c', $response[26]).pack('c', $response[25]);
        $pfc_tot = unpack('i', $pfc_tot)[1];
        $transaction->pfc_tot = $pfc_tot;

        $transaction->tr_status = $response[29];

        $rfid = pack('c', $response[33]).pack('c', $response[32]).pack('c', $response[31]).pack('c', $response[30]);
        $rfid = unpack('i', $rfid)[1];

        $the_card = Rfid::where("rfid", $cardNumber)->where('status', 1)->first();
        //Query the rfid ID from the RFID table
        $transaction->rfid_id = $the_card->id;

        $transaction->ctype = $response[34];

        $transaction->method = $response[35];

        $bill_no = pack('c', $response[37]).pack('c', $response[36]);
        $bill_no = unpack('s', $bill_no)[1];
        $transaction->bill_no = $bill_no;

        $transaction->save();

        //Clear status transaction
        $status = 2;
        $changed_status = self::transaction_status($channel, $status, $socket);
        echo 'stored';
        return true;
    }

    /**\
     *Change Transaction status
     * Status 0 - unlock transaction
     * Status 1 - lock transaction
     * Status 2 - clear transaction
     * Status 3 - block dispanser
     * Status 4 - unblock dispanser
     * Status 5 - suspend fueling
     * Status 6 - resume fueling
     */
    public static function transaction_status($channel, $status,  $socket)
    {
        $controller = Config::get('app.controller_id');
        $pos_id =  PFC::conver_to_bin($controller);
        $bin_channel = PFC::conver_to_bin($channel);
        $status_bin = PFC::conver_to_bin($status);

        //Generate CRC for the Transaction Message
        $message = "\x1\x7\x82" .$bin_channel. $pos_id.$status_bin;
        $the_crc = PFC::crc16($message);

        //Clear Transactions Message
        $binarydata = pack("c*", 0x01)
            .pack("c*", 0x07)
            .pack("c*", 0x82)
            .pack("C*", $channel)
            .pack("C*", $controller)
            .pack("C*", $status)
            .strrev(pack("s", $the_crc))
            .pack("c*", 02);

        $response = PFC::send_message($socket, $binarydata);
        return true;
    }
}
