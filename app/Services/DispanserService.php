<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use App\Models\Products;
use App\Models\Dispaneser;
use App\Models\Tank;
use App\Models\Pump;
use App\Models\RunninProcessModel as Process;

class DispanserService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public static function fuelPrices($socket, $pfc_id = 1) {
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

		if(!$response){ return false; }

        $length = count($response) - 4;
        $j = 1;
        //Products::where('pfc_id',$pfc_id)->delete();
        for($i = 4; $i <= $length; $i=$i+2){
            $price = pack('c', $response[$i+1]).pack('c', $response[$i]);
            $price = unpack('s', $price)[1];
            if($price == 0 ){  $j++; continue; }
            if(Products::where('pfc_id', $pfc_id)->where('pfc_pr_id', $j)->count() > 0){
				$product = Products::where('pfc_id', $pfc_id)->where('pfc_pr_id', $j)->first();
				$product->price = $price;
				$product->updated_at = time();
				$product->save();
			}else{
				$data['price'] = $price;
				$data['pfc_id'] = $pfc_id;
				$data['pfc_pr_id'] = $j;
				$data['created_at'] = time();
				$data['updated_at'] = time();
				Products::insert($data);
			}

            $j++;
        }

        return true;
    }

    /**
     * Register services.
     *
     * @return void
     */
    public static function UpdatefuelPrices($socket, $pfc_id = 1) {
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

		if(!$response){ return false; }

        $length = count($response) - 4;
        $j = 1;

        for($i = 4; $i <= $length; $i=$i+2){
            $price = pack('c', $response[$i+1]).pack('c', $response[$i]);
            $price = unpack('s', $price)[1];
            if($price == 0 ){  $j++; continue; }
            $product = Products::where('pfc_id', $pfc_id)->where('pfc_pr_id', $j)->where('status', 1)->first();
            $product->price = $price;
            $product->pfc_id = $pfc_id;
            $product->pfc_pr_id = $j;
            $product->updated_at = time();
            $product->save();
            $j++;
        }

        return true;
    }


	public static function UpdatePFCfuelPrices($socket, $pfc_id = 1) {
		//Create socket if it does not exist
        if($socket === null) {
            $socket = PFC::create_socket();
        }

		$products = Products::where('status', 1)->orderBy('pfc_pr_id')->get();


		$all_prices = array();
		$prices		= "";

		foreach($products as $p){
				$all_prices[$p->pfc_pr_id] = str_replace('.', '', $p->price);
		}

		for($i = 1; $i <= 16; $i++){
			if(!isset($all_prices[$i])){
				$all_prices[$i] = 0;
			}
		}
		for($i = 1; $i <= 16; $i++){
            $prices    .= strrev(pack('s', str_replace('.', '', $all_prices[$i])));
        }

        $message = "\x1\x24\x81".$prices;

        $the_crc = PFC::crc16($message);
		//Start of message
        $binarydata = pack("c*", 0x01);
        //Number of Bytes
		$binarydata .= pack("c*",0x24);
		//Write Prices Command
        $binarydata .= pack("c*",0x81);
		//Adding prices data to the message
		for($i = 1; $i <= 16; $i++){
			$price = $all_prices[$i];
			$binarydata .= strrev(pack('s', str_replace('.', '', $price)));
        }

		$binarydata .= strrev(pack("s",$the_crc));

		$binarydata .= pack("c*",02);

		$response = PFC::send_message($socket, $binarydata, $message);

	}
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function dispanserChannels($socket, $pfc_id = 1) {
        $message = "\x1\x4\x9";
        $the_crc = PFC::crc16($message);
        $binarydata = pack("c*", 0x01)
            .pack("c*",0x04)
            .pack("c*",0x09)
            .strrev(pack("s",$the_crc))
            .pack("c*",02);
        $response = PFC::send_message($socket, $binarydata, $message);

		if(!$response){ return false; }

        $length = count($response) - 3;
        //Dispaneser::where('pfc_id',$pfc_id)->delete();
        for($i = 3; $i <= $length; $i++){
            if($response[$i] == 1){
                $channel = ($i - 3);                
			
				$data['name']      			= 'Pump - '.$channel;
                $data['created_at'] 		= time();
                $data['channel_id'] 		= $channel;
                $data['pfc_id'] 			= $pfc_id;
                $data['cardreader_status']  = $response[$i];
                $data['updated_at'] 		= time();
				$channel_insert = Dispaneser::updateOrCreate(
					['channel_id' =>  $channel ],
					$data
				);
            }elseif($response[$i] == 0){
                $channel = ($i - 3);                
			
				$data['name']      			= 'Pump - '.$channel;
                $data['created_at'] 		= time();
                $data['channel_id'] 		= $channel;
                $data['pfc_id'] 			= $pfc_id;
                $data['cardreader_status']  = $response[$i];
                $data['updated_at'] 		= time();
				$channel_insert = Dispaneser::updateOrCreate(
					['channel_id' =>  $channel ],
					$data
				);				
			}
        }

		self::ImportNozzles($socket, $pfc_id = 1);

		return true;
    }

    public static function checkForUpdates($socket, $pfc_id = 1){

        $loadPrice = Process::where('type_id', 2)->where('pfc_id', $pfc_id)->count();
        if($loadPrice != 0){
            self::fuelPrices($socket,$pfc_id);
            Process::where('type_id', 2)->where('pfc_id', $pfc_id)->delete();
        }
        $loadChannel = Process::where('type_id', 3)->where('pfc_id', $pfc_id)->count();
        if($loadChannel != 0){
            self::dispanserChannels($socket, $pfc_id);
            Process::where('type_id', 3)->where('pfc_id', $pfc_id)->delete();
        }

        $stopCommand = Process::where('type_id', 4)->where('pfc_id', $pfc_id)->count();
        if($stopCommand != 0){
			self::UpdatePFCfuelPrices($socket, $pfc_id);
            Process::where('type_id', 4)->where('pfc_id', $pfc_id)->delete();
        }

        $stopCommand = Process::where('type_id', 5)->where('pfc_id', $pfc_id)->count();
        if($stopCommand != 0){
			if(Process::where('type_id', 1)->where('pfc_id', $pfc_id)->count() != 0){
				Process::where('type_id', 1)->where('pfc_id', $pfc_id)->delete();
				socket_close($socket);
				exit();
			}
			return false;
        }
        $stopCommand = Process::where('type_id', 6)->where('pfc_id', $pfc_id)->count();
        if($stopCommand != 0){
            Process::where('type_id', 5)->where('pfc_id', $pfc_id)->delete();
            Process::where('type_id', 6)->where('pfc_id', $pfc_id)->delete();
		}

		$stopCommand = Process::where('type_id', 7)->where('pfc_id', $pfc_id)->count();
        if($stopCommand != 0){
			self::CheckTankLevel($socket, $pfc_id);
            Process::where('type_id', 7)->where('pfc_id', $pfc_id)->delete();
		}

		$stopCommand = Process::where('type_id', 8)->where('pfc_id', $pfc_id)->count();
        if($stopCommand != 0){
			self::ImportNozzles($socket, $pfc_id);
            Process::where('type_id', 8)->where('pfc_id', $pfc_id)->delete();
		}
		return true;
    }
    /**
     * Message 4 - Dispenser Totalizers
     *
     * Read Totalizers from channel
     */
	public static function checkChannelTotalizers($socket, $channel_id, $pfc_id = 1){

        $bin_channel = pack("C*", $channel_id);

        //Generate CRC for the Transaction Message
        $message = "\x1\x5\x4" .$bin_channel;
        $the_crc = PFC::crc16($message);

        //Clear Transactions Message
        $binarydata = pack("c*", 0x01)
            .pack("c*", 0x05)
            .pack("c*", 0x04)
            .pack("C*", $channel_id)
            .strrev(pack("s", $the_crc))
            .pack("c*", 02);
		PFC::storeLogs($channel_id, null, 17, unpack('c*', $binarydata));
        $response = PFC::send_message($socket, $binarydata);
		PFC::storeLogs($channel_id, null, 18, $response);
        return $response;

	}

	/**
     * Message 4 - Dispenser Totalizers
     *
     * Read Totalizers from channel
     */
	public static function ImportNozzles($socket, $pfc_id = 1){

		//Pump::where('pfc_id',$pfc_id)->delete();
        $dispansers = Dispaneser::All();

		foreach($dispansers as $dispanser){
			$j = 1;
			$responseTot = self::checkChannelTotalizers($socket, $dispanser->channel_id, $pfc_id);
			//print_r($responseTot);
			if($responseTot == '-2'){ return false; }
			$length = count($responseTot) - 3;
			//print_r($responseTot);
			//Pump::where('pfc_id', $pfc_id)->where('channel_id', $dispanser->channel_id)->delete();
			for($i = 5; $i <= $length; $i++ ){
				$totalizer = pack('c', $responseTot[$i+3]).pack('c', $responseTot[$i+2]).pack('c', $responseTot[$i+1]).pack('c', $responseTot[$i]);

				$totalizer = (int)unpack('i', $totalizer)[1];

				//if($totalizer != 0){
					
					$nozzle_nr 		   				= (int)$j;
					$data['name']      				= 'Nozzle - '.$nozzle_nr;
					$data['nozzle_id'] 				= $nozzle_nr;
					$data['channel_id'] 			= $dispanser->channel_id;
					$data['status'] 				= 1;
					$data['pfc_id'] 				= $pfc_id;
					$data['starting_totalizer'] 	= $totalizer;
					$data['created_at'] 			= time();
					$data['updated_at'] 			= time();
					
					$pump = Pump::updateOrCreate(
						['channel_id' =>  $dispanser->channel_id, 'nozzle_id' => $nozzle_nr ],
						$data
					);
					
					//Pump::insert($data);
				/*}else{
					echo ' - Totalizer start -';
					echo $totalizer;
					echo ' - ' . $j. ' - '.  $dispanser->channel_id;
					echo ' - Totalizer end -';					
				}*/
				$i+= 7;
				$j++;
			}

		}
		return true;
	}
    /**
     * Check Tank Level Command
     *
     * Read Totalizers from channel
     */
	public static function CheckTankLevel($socket, $pfc_id = 1){

		$tanks = Tank::where('status', 1)->get();

		foreach($tanks as $t){

			$tank_id = pack("C*", $t->pfc_tank_id);

			//Generate CRC for the Transaction Message
			$message = "\x1\x5\x0F" .$tank_id;
			$the_crc = PFC::crc16($message);

			//Clear Transactions Message
			$binarydata = pack("c*", 0x01)
				.pack("c*", 0x05)
				.pack("c*", 0x0F)
				.pack("C*", $t->pfc_tank_id)
				.strrev(pack("s", $the_crc))
				.pack("c*", 02);
			PFC::storeLogs($t->id, null, 19, unpack('c*', $binarydata));
			//print_r(unpack('c*', $binarydata));
			$response = PFC::send_message($socket, $binarydata);
			//print_r($response);
			$fuel_level = pack('c', $response[6]).pack('c', $response[5]);
			$fuel_level = unpack('s', $fuel_level)[1];
			$tank = Tank::find($t->id);

			$tank->fuel_level = $fuel_level;

			$water_level = pack('c', $response[12]).pack('c', $response[11]);
			$water_level = unpack('s', $water_level)[1];

			$tank->water_level = $water_level;

			$tank->save();

			PFC::storeLogs($t->id, null, 20, $response);
			//return $response;
		}

	}

}
