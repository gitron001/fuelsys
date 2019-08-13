<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaileAttempt extends Model
{
    protected $table = 'failed_attempts';

    protected $fillable = [
        'rfid',
        'pfc_id',
        'channel_id',
    ];

}
