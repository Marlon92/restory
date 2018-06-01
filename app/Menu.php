<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menus';
    protected $fillable=['id','name','price','available','created_at','updated_at'];  
}
