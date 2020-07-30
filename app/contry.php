<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contry extends Model
{
    //
    public function posts(){
        return $this->hasManyThrough('App\Post','App\User');
    }
}
