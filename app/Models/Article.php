<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'title',
        'description',
        'content',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
