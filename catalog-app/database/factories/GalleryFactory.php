<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $img = UploadedFile::fake()->image("i.png", 30, 30);
        $path = Storage::disk('public')->putFile('/gallery', $img);

        return [
            'name' => $img->hashName(),
            'path' => $path
        ];
    }
}
