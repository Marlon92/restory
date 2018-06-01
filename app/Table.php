<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table='tables';
    protected $fillable=['id','code','available','created_at','updated_at'];
}
