<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = array('title', 'website','phone','address');

    protected $table = 'companies';
}
