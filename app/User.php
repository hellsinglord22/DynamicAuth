<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role; 

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class); 
    }

    public function hasRole($role){
        if (is_string($role)){
            return $this->roles->contains('name', $role); 
        }

        // if this a collection of roles 
        foreach ($role as $eachRole) {
            if ($this->hasRole($eachRole->name)){
                return true; 
            }
        }

        return false; 
    }

    
    public function setRole(Role $role){
        $this->roles()->save($role); 
    }
}
