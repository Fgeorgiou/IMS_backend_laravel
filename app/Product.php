<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'barcode', 'category_id', 'supplier_id', 'unit_per_pack', 'unit_net_weight_gr', 'unit_gross_weight_gr', 'lead_days');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'category_id', 'supplier_id', 'deleted_at', 'created_at', 'updated_at'
    ];

    public function supplier()
    {
        return $this->belongsTo(\App\Supplier::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\ProductCategory::class);
    }

    public function order_products()
    {
        return $this->hasMany(\App\OrdersProduct::class);
    }

    public function stock()
    {
        return $this->hasOne(\App\Stock::class);
    }
}