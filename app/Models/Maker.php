<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $table = 'makers';

    protected $fillable = ['name','phone'];

    protected $hidden = ['id','created_at','updated_at'];

    protected function vehicles()
    {
    	return $this->hasMany('App\Models\Vehicle');
    }
}
