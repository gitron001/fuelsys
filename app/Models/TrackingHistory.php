<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingHistory extends Model
{
    //
    public function getDateFormat(){
        return 'U';
    }
}
