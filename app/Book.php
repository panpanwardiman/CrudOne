<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
    protected $fillable = ['name', 'author', 'publisher', 'description', 'price', 'cover', 'category_id'];    

    public function getNameAttribute($name) 
    {
        return ucwords($name);
    }

    public function getAuthorAttribute($author)
    {
        return ucwords($author);
    }

    public function getDescriptionAttribute($description)
    {
        return ucfirst($description);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
