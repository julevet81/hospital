<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    
    protected $model = Doctor::class;
    public function definition(): array
    {
        

        return [
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'phone' => $this->faker->phoneNumber(),
            'price' => $this->faker->randomFloat(2, 50, 500), // Random price between 50 and 500
            'appointments' => $this->faker->sentence(), // Assuming appointments is a translatable attribute
            'name' => $this->faker->name(), // Assuming name is a translatable attribute
            'section_id' => Section::all()->random()->id,// Assuming you have a SectionFactory
        ];
    }
}
