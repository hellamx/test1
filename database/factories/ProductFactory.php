<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoriesIds = Category::query()->pluck('id')->toArray();

        return [
            'title' => $this->faker->text(64),
            'category_id' => $categoriesIds[rand(0, (count($categoriesIds) - 1))]
        ];
    }
}
