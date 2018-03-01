<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model 
{

    protected $table = 'sales';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function sale_products()
    {
        return $this->hasMany(\App\SalesProduct::class);
    }

    public function products()
    {
        return $this->hasManyThrough(\App\Product::class, \App\SalesProduct::class);
    }

}