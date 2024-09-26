<?php

namespace Database\Seeders;

use App\Functions\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Web Development",
            "Graphic Design",
            "UI/UX Design",
            "Photography",
            "Video Editing",
            "Illustration",
            "Copywriting",
            "Digital Marketing",
            "Mobile App Development",
            "Data Science",
            "3D Modeling",
            "Animation",
            "Content Creation",
            "Software Engineering",
            "Branding & Identity"
        ];

        foreach ($data as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Helper::generateSlug($new_type->name, Type::class);
            $new_type->save();
        }
    }
}
