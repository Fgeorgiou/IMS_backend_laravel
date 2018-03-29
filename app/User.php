<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('first_name', 'last_name', 'email', 'password', 'api_token', 'role_id', 'facility_id');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'remember_token',
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function orders()
    {
        return $this->hasMany(\App\Order::class);
    }

    public function facility()
    {
        return $this->belongsTo(\App\Facility::class);
    }

    public function role()
    {
        return $this->belongsTo(\App\Role::class);
    }
}
