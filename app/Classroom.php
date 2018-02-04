<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $hidden = ['pivot','created_at','updated_at'];

    public function users()
    {
    		return $this->belongsToMany('App\User');
    }
    public function students()
    {
    		return $this->hasMany('App\Student');
    }
}
