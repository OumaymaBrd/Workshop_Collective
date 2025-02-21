<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'postId',
        'content',
        'data_creation',
        'data_modification'
    ];
}
