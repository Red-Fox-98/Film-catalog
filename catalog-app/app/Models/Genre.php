<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 */

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, MovieHasGenre::class, 'genre_id', 'movie_id', 'id', 'id');
    }
}
