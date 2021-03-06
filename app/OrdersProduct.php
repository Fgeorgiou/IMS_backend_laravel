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
    protected $fillable = array('order_id', 'product_id', 'status_id', 'quantity');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }

    public function status()
    {
        return $this->hasMany(\App\Status::class);
    }

}