<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable; //make user model authenticatable

    public function posts() //return posts created by the user
    {
        return $this->hasMany('App\Post');
    }
}
