<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    public function getAllPayments(){
        $payments = Payments::all();

        return response($payments,201);
    }

    public function createPayment(Request $request){
        $payment = new Payments;

        $payment->date          = $request->date;
        $payment->amount        = $request->amount;
        $payment->description   = $request->description;
        $payment->user_id       = $request->user_id;
        $payment->company_id    = $request->company_id;
        $payment->created_by    = $request->created_by;
        $payment->edited_by     = $request->edited_by;
        $payment->created_at    = $request->created_at;
        $payment->updated_at    = $request->updated_at;
        $payment->save();

        return response()->json([
            "message" => "Payment record created"
        ], 201);

    }
}
