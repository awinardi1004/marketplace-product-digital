<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['name' => 'Kotlin', 'icon_path' => 'tool_icons/kotlin.png', 'role' => 'Android Development'],
            ['name' => 'Capcut', 'icon_path' => 'tool_icons/capcut.png', 'role' => 'Video Editor'],
            ['name' => 'Blender', 'icon_path' => 'tool_icons/blender.png', 'role' => '3D UI Design'],
            ['name' => 'Excel', 'icon_path' => 'tool_icons/excel.png', 'role' => 'Data Analyst'],
            ['name' => 'Figma', 'icon_path' => 'tool_icons/figma.png', 'role' => 'UI/UX Design'],
            ['name' => 'Flutter', 'icon_path' => 'tool_icons/flutter.png', 'role' => 'Modile Development'],
            ['name' => 'Golang', 'icon_path' => 'tool_icons/golang.png', 'role' => 'Back-end Development'],
            ['name' => 'Laravel', 'icon_path' => 'tool_icons/laravel.png', 'role' => 'Back-end Development'],
            ['name' => 'Photoshop', 'icon_path' => 'tool_icons/photoshop.png', 'role' => 'Grafik Design'],
            ['name' => 'Python', 'icon_path' => 'tool_icons/python.png', 'role' => 'Data Science'],
            ['name' => 'React', 'icon_path' => 'tool_icons/react.png', 'role' => 'Front-end Development'],
            ['name' => 'Vue', 'icon_path' => 'tool_icons/Vue.png', 'role' => 'Front-End Development'],
        ];

        foreach ($technologies as $tech) {
            Technology::create([
                'name' => $tech['name'],
                'slug' => Str::slug($tech['name']), 
                'icon_path' => $tech['icon_path'],
                'role' => $tech['role'],
            ]);
        }

    }
}
