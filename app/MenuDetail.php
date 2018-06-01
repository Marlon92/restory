<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    protected $table='menu_details';
    protected $fillable=['id','menu_id','food_id','quantity','price','created_at','updated_at'];

    public function menu(){
    	return $this->hasOne('App\Menu','id','menu_id');
	}

	public function food(){
    	return $this->hasOne('App\Food','id','food_id');
	}
}
