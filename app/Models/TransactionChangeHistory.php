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

    public function previous_user(){
        return $this->belongsTo('App\Models\Users', 'previous_user_id', 'id');
    }

    public function current_user(){
        return $this->belongsTo('App\Models\Users', 'current_user_id', 'id');
    }

    public function updated_by_user(){
        return $this->belongsTo('App\Models\Users', 'updated_by', 'id');
    }
}
