<?php

namespace App\Http\Controllers\API;

use Session;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Users;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;


class TransactionsController extends Controller
{
    public function importTransactions(Request $request) {
       $response = $request->all();
       $inserted_transaction = array();
       
       foreach($response as $data) {
           $user_id = Users::select('id')->where('branch_id',Session::get('branch_id'))->where('branch_user_id',$data['user_id'])->first();
           
           if($user_id) {
            $transaction = Transaction::insertGetId([
                'status'        => $data['status'],
                'locker'        => $data['locker'],
                'tr_no'         => $data['tr_no'],
                'channel_id'    => $data['channel_id'],
                'receipt_no'    => $data['receipt_no'],
                'sl_no'         => $data['sl_no'],
                'pfc_id'        => $data['pfc_id'],
                'product_id'    => $data['product_id'],
                'dis_status'    => $data['dis_status'],
                'price'         => $data['price'],
                'lit'           => $data['lit'],
                'money'         => $data['money'],
                'dis_tot'       => $data['dis_tot'],
                'pfc_tot'       => $data['pfc_tot'],
                'tr_status'     => $data['tr_status'],
                'user_id'       => $user_id->id,
                'branch_id'     => Session::get('branch_id'),
                'branch_transaction_id' => $data['id'],
                'ctype'         => $data['ctype'],
                'method'        => $data['method'],
                'bill_no'       => $data['bill_no'],
                'created_at'    => $data['created_at'],
                'updated_at'    => $data['updated_at'],
            ]);
            
            $inserted_transaction[] = $transaction;
           }
           
        }
        
        $data = array();
        foreach($inserted_transaction as $transaction){
            $data[] = Transaction::where('id',$transaction)->pluck('branch_transaction_id');
        }   
       
        return response()->json([
            'response'  => 'Success',
            'inserted_transaction' => $data,
        ], 201);
       
    }
}
