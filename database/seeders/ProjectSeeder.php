<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;
use App\Models\Project;
use Faker\Generator as Faker;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {
            $new_project = new Project();
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->name = $faker->sentence;
            $new_project->slug = Helper::generateSlug($new_project->name, Project::class);
            $new_project->description = $faker->text;
            $new_project->img = $faker->imageUrl();
            $new_project->save();
        }
    }
}
