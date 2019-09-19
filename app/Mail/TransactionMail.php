<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Transaction;
use App\Models\Company;

class TransactionMail extends Mailable
{
    //use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $trans_id;
	
    public $company;
	
    public function __construct($trans_id)
    {
        $this->trans_id = $trans_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$transactions  = Transaction::where('id', $this->trans_id)->first();
		$company       = Company::where('status',4)->first();
				
        return $this->view('emails.transaction')->with( [
            'id'                    => $transactions->id,
            'product_name'          => $transactions->product->name,
            'lit'                   => $transactions->lit,
            'price'                 => $transactions->price,
            'created_at'            => $transactions->created_at,
            'user_name'             => $transactions->users->name,
            'company_name'          => $transactions->users->company->name,
            'our_company'           => $company->name,
            'our_company_address'   => $company->address,
            'our_company_city'      => $company->city,
            'our_company_phone'     => $company->tel_number,
        ] );
    }
}
