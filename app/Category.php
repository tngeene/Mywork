<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //define the table it is connecting to
    protected $table = 'categories';
    //this function can be named anything
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
  