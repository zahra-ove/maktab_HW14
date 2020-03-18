<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'username', 'email', 'age', 'gender_id', 'password'];

    public function gender(){
        return $this->belongsTo('App\Gender');
    }

// many to many relationship between User model and Role model
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

// each user has many comments ---> one to many relationship between user and comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


//one to one polymorphic relationships to image
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }



//if user has determined role return true, otherwise return false
    public function hasRole($roleName)
    {
        $roles = $this->roles()->get();

        foreach($roles as $role)
        {
            if($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }


    //second way of checking if a user has a specific role or not
    public function hasRole2($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //checking if a user has array of roles
    public function hasAnyRole($role)
    {
        if($this->roles()->whereIn('name', $role)->first())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
