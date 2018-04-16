<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArrivalProductAnomaly extends Model 
{

    protected $table = 'arrivals_product_anomalies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('arrival_id', 'status_id', 'product_barcode', 'quantity');

    public function status()
    {
        return $this->hasMany(\App\Status::class);
    }
}