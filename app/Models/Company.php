<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'master_id',
        'fis_number',
        'bis_number',
        'tax_number',
        'res_number',
        'starting_balance',
        'last_balance_update',
        'tel_number',
        'contact_person',
        'email',
        'exported',
        'address',
        'city',
        'images',
        'send_email',
        'country',
        'type',
        'status',
        'limits',
        'limit_left',
        'has_limit',
        'has_receipt',
        'has_receipt_nr',
        'monthly_report',
        'daily_at',
        'on_transaction',
        'printer_id',
        'direct_login',
        'print_transaction',
        'transaction_location',
        'show_transaction',
        'show_transaction_time',
        'display_users_by_plates'
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function users(){
        return $this->hasMany('App\Models\Rfid');
    }

    public function discounts()
    {
        return $this->hasMany('App\Models\CompanyDiscount', 'company_id', 'id');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payments');
    }
}
