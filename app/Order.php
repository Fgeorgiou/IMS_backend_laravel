<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'status_id');

    public function order_products()
    {
        return $this->hasMany(\App\OrdersProduct::class);
    }

    public function status()
    {
        return $this->hasMany(\App\Status::class);
    }
}