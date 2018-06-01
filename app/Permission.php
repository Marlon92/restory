<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $fillable=['id','isMenu','menu','menu_id','name','position','url','icon_name','isUrl','created_at','updated_at'];
}
