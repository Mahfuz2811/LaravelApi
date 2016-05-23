<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $primaryKey = 'series';

    protected $fillable = ['color','power','capacity','speed','maker_id'];

    protected $hidden = ['series','created_at','updated_at','maker_id'];

    public function makers()
    {
    	return $this->belongTo('App\Models\Maker');
    }
}

