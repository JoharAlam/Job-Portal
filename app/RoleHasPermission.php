<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
	Public $timestamps = false;
    protected $fillable = [
        'permission_id', 'role_id',
    ];
}
