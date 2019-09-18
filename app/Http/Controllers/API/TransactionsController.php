<?php

namespace App\Http\Controllers\API;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;


class TransactionsController extends Controller
{
    public function getAllTransactions() {
        $transactions = Transaction::where('exported',0)->get();
        $access_token = config('token.access_token');

        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);
            $url = 'http://fuelsystem.alba-petrol.com/api/transactions/create';
            
            $response = $client->request('POST', $url, [
                'json' => $transactions
            ]);
            
            $inserted_id = $response->getBody()->getContents();;
            $data = json_decode($inserted_id);
            foreach($data->inserted_transaction as $key){
                foreach($key as $value){
                    Transaction::where('id',$value)->update(['exported'=> 1]);
                }
            }

            return $response->getBody();

        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to insert transaction into server / Unauthenticated",
                "message" => $e->getMessage()
            ]);
        }
        
    }
}
