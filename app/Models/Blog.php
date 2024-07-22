<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'content', 
        'thumbnail',
        'adress',
        'zip',
        'city',
        'homepage',
        'custom_special'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_category');
    }
}