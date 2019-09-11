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
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $transactions;
	
    public $company;
	
    public function __construct($transactions, $company)
    {
        $this->transactions = $transactions;
		
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.transaction')->with( [
            'id'                    => $this->transactions['id'],
            'product_name'          => $this->transactions->product->name,
            'lit'                   => $this->transactions['lit'],
            'price'                 => $this->transactions['price'],
            'created_at'            => $this->transactions['created_at'],
            'user_name'             => $this->transactions->users->name,
            'company_name'          => $this->transactions->users->company->name,
            'our_company'           => $this->company['name'],
            'our_company_address'   => $this->company['address'],
            'our_company_city'      => $this->company['city'],
            'our_company_phone'     => $this->company['tel_number'],
        ] );
    }
}
