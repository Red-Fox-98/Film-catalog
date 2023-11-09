<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $movie_id
 * @property string $name
 * @property string $path
 */

class Gallery extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'movie_id',
        'name',
        'path'
    ];

    public function movies(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
