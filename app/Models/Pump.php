<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use DB;

class Pump extends Model
{
    protected $table = 'pumps';

    protected $fillable = [
        'name',
        'nozzle_id',
        'channel_id',
        'pfc_id',
        'starting_totalizer',
        'status',
        'tank_id',
        'created_at',
        'updated_at'
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function tank(){
        return $this->belongsTo('App\Models\Tank');
    }

    public function dispaneser(){
        return $this->belongsTo('App\Models\Dispaneser', 'channel_id', 'channel_id');
    }
}
