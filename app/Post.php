<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\Model;

// class Post extends Model
class Post extends Eloquent
{
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}
