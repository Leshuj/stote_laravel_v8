<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name,
            'product_description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'price' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'id_category' => $this->faker->numberBetween($min = 1, $max = 19), // password
            'id_manufacturer' => $this->faker->numberBetween($min = 1, $max = 19),
        ];
    }
}
