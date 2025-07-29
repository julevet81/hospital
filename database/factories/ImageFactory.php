<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "filename" => $this->faker->randomElement(['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg']),
            "imageable_id" => Doctor::all()->random()->id,
            "imageable_type" => 'app\Models\Doctor',
        ];
    }
}
