<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingCommands extends Model
{
    protected $table = 'tracking';

    public function dispaneser(){
        return $this->hasOne('App\Models\Dispaneser', 'channel_id', 'channel_id');
    }
}
