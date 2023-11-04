<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $projects = Project::all();                       // object Post
      $tags = Tag::all()->pluck('id')->toArray(); // array  [1, 2, ... n]
    
      foreach($projects as $project) {
        $project
          ->tags()
          ->attach($faker->randomElements($tags, random_int(0, 3)));
      }
    }
}
