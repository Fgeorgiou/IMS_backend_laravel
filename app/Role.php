<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model 
{

    protected $table = 'roles';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('description', 'access_level');

    public function users()
    {
        return $this->hasMany(\App\User::class);
    }
}