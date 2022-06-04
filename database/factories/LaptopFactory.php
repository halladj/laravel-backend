<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laptop>
 */
class LaptopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          "brand" => $this->faker->firstName(),
          //CPU Stuff
          "cpu_brand" => $this->faker->lastName(),
          "cpu_frequency" => $this->faker->randomFloat(3,0,100.0),
          "cpu_family" => $this->faker->randomLetter(),
          "cpu_generation" => $this->faker->randomNumber(),
          "cpu_number_identifier" => $this->faker->randomNumber(),
          "cpu_modifier" => $this->faker->name(),
          //END CPU CUZ
          "state" => $this->faker->randomNumber(),
          //GPU STUFF
          "gpu_brand" => $this->faker->lastName(),
          "gpu_words_identifier" => $this->faker->lastName(),
          "gpu_number_identifier" => $this->faker->lastName(),
          "gpu_vram" => $this->faker->randomNumber(),
          "gpu_frequency" => $this->faker->randomFloat(3,0,100.0),
          //END GPU CUZZ
          "ram" => $this->faker->randomNumber(),
          "ram_frequency" => $this->faker->randomFloat(3,0,100.0),
          "ram_type" => $this->faker->lastName(),
          //END RAM
          "ssd" => $this->faker->randomNumber(),
          "hdd" => $this->faker->randomNumber(),
          "screen_refresh_rate" => $this->faker->randomNumber(),
          "screen_size" => $this->faker->randomFloat(3,0,100.0),
          "screen_resolution" => $this->faker->lastName(),
          "anti_glare" => $this->faker->randomNumber(),
          "touch_screen" => $this->faker->randomNumber(),
          "price" => 250000.0,
        ];
    }
}
