<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBranches extends Model
{
    protected $table = 'product_branches';

    protected $fillable = [
        'branch_pfc_product_id',
        'master_pfc_product_id',
        'branch_id',
        'created_at',
        'updated_at'
    ];

    public function getDateFormat(){
        return 'U';
    }
}
