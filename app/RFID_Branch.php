<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RFID_Branch extends Model
{
    protected $table = 'r_f_i_d__branches';

    protected $fillable = [
        'rfid_id', 
        'branch_id',
        'limit', 
    ];
}
