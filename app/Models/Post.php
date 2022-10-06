<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','image','text','category_id', 'tags[]' ];

    public function category ()
     {
        //Relazione posts -> category = debole -> forte | many to one
        return $this->belongsTo('App\Models\Category');
    }

    public function user ()
     {
        
        return $this->belongsTo('App\User');
    }

    public function tags()
     {
        return $this->belongsToMany('App\Models\Tag');
    }

}
