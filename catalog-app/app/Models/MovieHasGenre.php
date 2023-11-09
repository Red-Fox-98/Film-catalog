<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $movie_id
 * @property int $genre_id
 */

class MovieHasGenre extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'movie_id',
        'genre_id'
    ];
}
