<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersProduct extends Model 
{

    protected $table = 'orders_products';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('order_id', 'product_id', 'quantity');

    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }

    public function status()
    {
        return $this->hasMany(\App\Status::class);
    }

}