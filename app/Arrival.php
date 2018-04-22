<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arrival extends Model 
{

    protected $table = 'arrivals';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('order_id');

    public function arrival_products()
    {
        return $this->hasMany(\App\ArrivalsProduct::class);
    }

    public function arrival_anomalies()
    {
        return $this->hasMany(\App\ArrivalProductAnomaly::class);
    }

    public function order()
    {
        return $this->belongsTo(\App\Order::class);
    }

}