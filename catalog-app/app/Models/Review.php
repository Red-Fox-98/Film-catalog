<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $movie_id
 * @property string $text
 * @property float rating
 */

class Review extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'movie_id',
        'text',
        'rating'
    ];

    public function movies(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
