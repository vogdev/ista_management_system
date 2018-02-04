<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function scopeSearch($query, $s) {
        return $query->where('name', 'like', '%' .$s. '%')->orWhere('email', 'like', '%' .$s. '%');
    }
    protected $hidden = ['pivot','created_at','updated_at'];

    public function classrooms()
    {
            return $this->belongsToMany('App\Classroom');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
