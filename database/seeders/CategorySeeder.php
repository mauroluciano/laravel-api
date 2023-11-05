<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $_categories = [
            "Tipo1",
            "Tipo2",
            "Tipo3",
            "Tipo4",
            "Tipo5",
        ];
        foreach ($_categories as $_category) {
            $category = new Category();
            $category->label = $_category;
            $category->color = $faker->hexColor();
            $category->save();
        }
    }
}