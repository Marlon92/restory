<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='order_details';
    protected $fillable=['id','order_id', 'menu_id', 'food_id','quantity','price','offerPrice','create_at','updated_at'];

     public function menu(){
    	return $this->hasOne('App\Menu','id','menu_id');
	}

	public function order(){
		return $this->hasOne('App\Order','id','order_id');
	}

	public function food(){
		return $this->hasOne('App\Food','id','food_id');
	}
}
