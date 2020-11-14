<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->firstName,
            'describe'   => $this->faker->describe,
            'phone'       => $this->faker->phoneNumber,
            'image'       => $this->faker->image('public/assets/images/uploaded/clients', 400, 300, null, false),
            'address'     => $this->faker->streetAddress,
            'city'        => $this->faker->city,
            'zip'         => $this->faker->postcode,
            'country'     => $this->faker->country,
            'description' => $this->faker->paragraph
        ];
    }
}
