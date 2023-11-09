<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $full_name
 */

class Actor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'full_name'
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, MovieHasActor::class, 'actor_id', 'movie_id', 'id', 'id');
    }
}
