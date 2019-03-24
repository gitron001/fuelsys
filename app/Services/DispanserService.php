<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use App\Models\Products;
use App\Models\Dispaneser;

class DispanserService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public static function fuelPrices($socket, $pfc_id = 1)
    {
        //Create socket if it does not exist
        if($socket === null) {
            $socket = PFC::create_socket();
        }
        $message = "\x1\x4\x1";
        $the_crc = PFC::crc16($message);
        $binarydata = pack("c*", 0x01)
            .pack("c*",0x04)
            .pack("c*",0x01)
            .strrev(pack("s",$the_crc))
            .pack("c*",02);
        $response = PFC::send_message($socket, $binarydata, $message);

        $length = count($response) - 4;
        $j = 1;

        for($i = 4; $i <= $length; $i=$i+2){
            $price = pack('c', $response[$i+1]).pack('c', $response[$i]);
            $price = unpack('s', $price)[1];
            if($price == 0 ){  $j++; continue; }
            $data['price'] = $price;
            $data['pfc_id'] = $pfc_id;
            $data['pfc_pr_id'] = $j;
            $data['created_at'] = time();
            $data['updated_at'] = time();
            Products::insert($data);
            $j++;
        }

        return true;
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function dispanserChannels($socket, $pfc_id = 1)
    {
        $message = "\x1\x4\x9";
        $the_crc = PFC::crc16($message);
        $binarydata = pack("c*", 0x01)
            .pack("c*",0x04)
            .pack("c*",0x09)
            .strrev(pack("s",$the_crc))
            .pack("c*",02);
        $response = PFC::send_message($socket, $binarydata, $message);

        $length = count($response) - 3;
        for($i = 3; $i <= $length; $i++){
            if($response[$i] == 1){
                $channel = ($i - 3);

                $data['name']      = 'Pump - '.$channel;
                $data['created_at'] = time();
                $data['pfc_id'] = $pfc_id;
                $data['updated_at'] = time();
                Dispaneser::insert($data);
            }
        }
    }
}
