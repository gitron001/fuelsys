<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionChangeHistory extends Model
{
    protected $table = 'transaction_change_histories';

    protected $fillable = [
        'transaction_id',
        'previous_user_id',
        'current_user_id',
        'updated_by',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
