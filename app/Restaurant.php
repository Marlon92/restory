<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table='restaurants';
    protected $fillable=['id','name','address','tel1','tel2','email','photo','tables','created_at','updated_at'];
}
