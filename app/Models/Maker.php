<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Maker extends Model
{
    protected $table = 'makers';

    protected $fillable = ['name','phone'];

    protected $hidden = ['id','created_at','updated_at'];

    public function vehicles()
    {
    	return $this->hasMany('App\Models\Vehicle');
    }
}
