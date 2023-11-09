<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $full_name
 */

class Director extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'full_name'
    ];

    public function movies(): HasOne
    {
        return $this->hasOne(Movie::class);
    }
}
