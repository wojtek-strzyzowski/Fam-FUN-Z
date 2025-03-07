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
        'address',
        'zip',
        'city',
        'homepage',
        'custom_special',
        'category_id',
        'user_id' //um den Benutzer (später den Verfasser des Blogs)zu referenzieren
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_category');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}