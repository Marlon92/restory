<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table='orders';
	protected $fillable=['id','date','description','total','cantMenus','status','created_at','updated_at'];
}
