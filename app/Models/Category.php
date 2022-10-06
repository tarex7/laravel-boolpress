<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relazione category -> posts forte -> debole | one to many
    public function posts() {
    return $this->hasMany('App\Models\Post');
    }
}
