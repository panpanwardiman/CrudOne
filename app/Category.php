<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['name'];

    public function books() 
    {
        return $this->hasMany('App\Book');
    }

    public function getNameAttribute($name) 
    {
        return ucwords($name);
    }

    // public function setNameAttribute($name)
    // {
    //     return ucwords($name);
    // }

}
