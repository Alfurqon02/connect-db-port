<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'stock' => $this->faker->randomNumber(2),
            'id_category' => \App\Models\Category::factory(), // Menggunakan factory untuk membuat kategori
        ];
    }
}
