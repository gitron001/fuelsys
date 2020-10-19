<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    protected $table = 'pumps';

    protected $fillable = [
        'name',
        'status',
        'tank_id',
        'dispaneser_id'
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function tank(){
        return $this->belongsTo('App\Models\Tank');
    }

    public function dispaneser(){
        return $this->belongsTo('App\Models\Dispaneser');
    }

}
