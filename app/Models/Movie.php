<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster', 'published'];

    protected $casts = ['published' => 'boolean'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre')->using(MovieGenre::class);
    }
}
