<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preview>
 */
class PreviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $img = UploadedFile::fake()->image("i.png", 30, 30);
        $path = Storage::disk('public')->putFile('/preview', $img);

        return [
            'name' => $img->hashName(),
            'path' => $path
        ];
    }
}
