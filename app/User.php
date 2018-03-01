<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('first_name', 'last_name', 'email', 'role_id', 'facility_id');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function students()
    // {
    //     return $this->belongsToMany(\App\Student::class, 'enrollments');
    // }
    // public function lessons()
    // {
    //     return $this->hasMany(\App\Lesson::class);
    // }
    // public function lessonhours()
    // {
    //     return $this->hasManyThrough(\App\Lessonhour::class, \App\Lesson::class);
    // }
}
