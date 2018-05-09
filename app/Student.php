<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public function scopeSearch($query, $s) {
        return $query->where('name', 'like', '%' .$s. '%')->orWhere('ref', 'like', '%' .$s. '%');
    }
	public function classroom() {
		return $this->belongsTo('App\Classroom', 'classroom_id');
	}
}
