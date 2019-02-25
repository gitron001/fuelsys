<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;

class TransactionService extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
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

            $total_msg_legth = count($response);
            for($i = 4; $i <= $total_msg_legth; $i+= 4) {
                if ($response[$i] == 1) {
                     $channel = (($i/4));
                    //Lock status transaction
                    $status = 1;
                    $changed_status = self::transaction_status($channel, $status, $socket);
                    if($changed_status)
                        echo 'UPDATED';
                }
            }
            //LOCKED
            return true;

    }

    public static function read_data($socket, $channel)
    {
        $controller = Config::get('app.controller_id');
        $pos_id =  PFC::conver_to_bin($controller);

        //Generate CRC for the Transaction Message
        $message = "\x1\x6\x3\x1".$pos_id;
        $the_crc = PFC::crc16( $message);

        //Read Transactions Message
        $binarydata = pack("c*", 0x01)
         .pack("c*",0x06)
         .pack("c*",0x03)
         .pack("c*",0x01)
         .pack("C*", $controller )
         .strrev(pack("s",$the_crc))
         .pack("c*",02);

        $response = PFC::send_message($socket, $binarydata);

        $transaction = new Transaction();
        $status = $response[4];
        echo '<br> STATUS: '. $status;
        $transaction->status = $status;

        $locker = $response[5];
        echo '<br> locker: '. $locker;
        $transaction->locker = $locker;

        $tr_no = pack('c', $response[7]).pack('c', $response[6]);
        $tr_no = unpack('s', $tr_no)[1];
        echo '<br> tr_no: '. $tr_no;
        $transaction->tr_no = $tr_no;

        $sl_no 	= $response[8];
        echo '<br> sl_no: '. $sl_no;
        $transaction->sl_no = $sl_no;

        $product 	= $response[9];
        echo '<br> product: '. $product;
        $transaction->product = $product;

        $dis_status 	= $response[10];
        echo '<br> dis_status: '. $dis_status;
        $transaction->dis_tot = $dis_status;

        $price = pack('c', $response[12]).pack('c', $response[11]);
        $price = unpack('s', $price)[1];
        echo '<br> price: '. $price;
        $transaction->price = number_format(($price/100),2);

        $lit = pack('c', $response[16]).pack('c', $response[15]).pack('c', $response[14]).pack('c', $response[13]);
        $lit = unpack('i', $lit)[1];
        echo '<br> lit: '. $lit;
        $transaction->lit = number_format(($lit/100),2);

        $money = pack('c', $response[20]).pack('c', $response[19]).pack('c', $response[18]).pack('c', $response[17]);
        $money = unpack('i', $money)[1];
        echo '<br> money: '. $money;
        $transaction->money = number_format(($money/100),2);

        $dis_tot = pack('c', $response[24]).pack('c', $response[23]).pack('c', $response[22]).pack('c', $response[21]);
        $dis_tot = unpack('i', $dis_tot)[1];
        echo '<br> dis_tot: '. $dis_tot;
        $transaction->dis_tot = $dis_tot;


        $pfc_tot = pack('c', $response[28]).pack('c', $response[27]).pack('c', $response[26]).pack('c', $response[25]);
        $pfc_tot = unpack('i', $pfc_tot)[1];
        echo '<br> pfc_tot: '. $pfc_tot;
        $transaction->pfc_tot = $pfc_tot;

        $tr_status	 	= $response[29];
        echo '<br> tr_status: '. $tr_status;
        $transaction->tr_status = $tr_status;

        $rfid = pack('c', $response[33]).pack('c', $response[32]).pack('c', $response[31]).pack('c', $response[30]);
        $rfid = unpack('i', $rfid)[1];
        $rfid	 	= $response[15];

        //Query the rfid ID from the RFID table
        $transaction->rfid = $rfid;

        echo '<br> rfid: '. $rfid;
        $cType	 	= $response[34];
        echo '<br> cType: '. $cType;
        $transaction->ctype = $cType;

        $method	 	= $response[35];
        echo '<br> method: '. $method;
        $transaction->method = $method;

        $bill_no = pack('c', $response[37]).pack('c', $response[36]);
        $bill_no = unpack('s', $bill_no)[1];
        echo '<br> bill_no: '. $bill_no;
        $transaction->bill_no = $bill_no;

        $transaction->save();
        echo '<br>';

        //socket_close($socket);
        self::clear($controller, $socket);
        return true;
    }

    /**
     * Register services.
     *
     * @return void
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
