<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [
            'nombre' => $name,
            'slug' => Str::slug($name),
            'cantidad' => $this->faker->numberBetween(100, 500),
            'precio' => $this->faker->randomFloat(2, 0, 1),
            'descripcion' => $this->faker->text(250),
            'url_img' => 'products/'.$this->faker->image('public/storage/products',640,480,null,false),
            'category_id' => Category::all()->random()->id,
        ];
    }
}
