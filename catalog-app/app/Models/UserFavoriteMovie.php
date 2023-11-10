<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $movie_id
 */

class UserFavoriteMovie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'movie_id'
    ];
}
