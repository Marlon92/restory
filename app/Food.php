<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table='foods';
    protected $fillable=['id','name','description','price','isOffer','measure_id','created_at','updated_at'];

    public function measure(){
    	return $this->hasOne('App\Measure','id','measure_id');
	}
}
