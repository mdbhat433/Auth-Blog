<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Comment extends Eloquent
{
    public function post(){
        return $this->belongsTo('App\Post');
    }
}