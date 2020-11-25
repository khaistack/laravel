<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'id'
    ];

    public function getRole()
    {
        return $this->hasMany('App\Models\Permission', 'role_id');
    }

    public function getPermission()
    {
        return $this->hasMany('App\Models\Permission', 'role_id');
    }

    public function getPe()
    {
        return $this->belongsToMany('App\Models\Permission', 'roles','id','id','role_id');
    }
    public function getUser()
    {
        return $this->hasMany('App\Models\User', 'roles_id');
    }
}
