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

}