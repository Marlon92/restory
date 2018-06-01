<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $table='measures';
    protected $fillable=['id','description','created_at','updated_at'];
}
