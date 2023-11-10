<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $director_id
 * @property int $preview_id
 * @property string $name
 * @property float $rating
 * @property string $date
 */

class Movie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'director_id',
        'preview_id',
        'name',
        'rating',
        'date'
    ];

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, MovieHasActor::class, 'movie_id', 'actor_id', 'id', 'id');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, MovieHasGenre::class, 'movie_id', 'genre_id', 'id', 'id');
    }

    public function directors(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    public function previews(): BelongsTo
    {
        return $this->belongsTo(Preview::class);
    }

    public function galleries(): HasMany
    {
        return $this->HasMany(Movie::class);
    }
}
