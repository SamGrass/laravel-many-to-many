<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 200; $i++) {
            $project = Project::inRandomOrder()->first();
            $technology_id = Technology::inRandomOrder()->first()->id;
            $project->technologies()->attach($technology_id);
        }
    }
}
