<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunninProcessModel extends Model
{
    //
    protected $table = 'running_processes';

    protected $fillable = [
        'pfc_id',
        'start_time',
        'refresh_time',
        'faild_attempt',
        'class_name',
        'type_id',
        'created_at',
        'updated_at'
    ];

    public function getDateFormat(){
        return 'U';
    }
}
