<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use App\Models\Transaction;
use App\Models\Company;

class TransactionMail extends Mailable
{
    //use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		//$transactions  = Transaction::where('id', $this->trans_id)->first();
		$company       = Company::where('status',4)->first();


        return $this->view('emails.transaction')->with( [
            'id'                    => $this->transactions->id,
            'product_name'          => $this->transactions->product->name,
            'lit'                   => $this->transactions->lit,
            'price'                 => $this->transactions->price,
            'created_at'            => $this->transactions->created_at,
            'user_name'             => $this->transactions->users->name,
            'company_name'          => $this->transactions->users->company ? $this->transactions->users->company->name : '',
            'our_company'           => $company->name,
            'our_company_address'   => $company->address,
            'our_company_city'      => $company->city,
            'our_company_phone'     => $company->tel_number,
        ] );
    }
}
