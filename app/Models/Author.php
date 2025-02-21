<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];

    public function posts()
    {
        return $this->hasMany(Article::class, 'userID');
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class, 'userID');
    // }
}
