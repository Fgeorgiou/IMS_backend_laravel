<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArrivalsProduct extends Model 
{

    protected $table = 'arrivals_products';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('arrival_id', 'product_id', 'quantity');

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }

    public function arrival()
    {
        return $this->belongsTo(\App\Arrival::class);
    }

}