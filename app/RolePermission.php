<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table='role_permissions';
    protected $fillable=['id','permissionId','role_id','status','created_at','updated_at'];

    public function role(){
    	return $this->hasOne('App\Role','id','role_id');
    }
}
