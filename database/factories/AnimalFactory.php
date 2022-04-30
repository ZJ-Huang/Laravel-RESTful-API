<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'type_id' => Type::all()->random()->id,
          'name' => $this->faker->name,
          'birthday' => $this->faker->date(),
          'area' => $this->faker->city,
          'fix' => $this->faker->boolean,
          'description' => $this->faker->text,
          'personality' => $this->faker->text,
          'user_id' => User::all()->random()->id
        ];
    }
}
