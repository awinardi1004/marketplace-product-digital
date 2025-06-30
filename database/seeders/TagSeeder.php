<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Finance',
            'Marketing',
            'Business',
            'Technology',
            'Education',
            'Design',
            'Programming',
            'Startup',
            'E-commerce',
            'Data Science',
            'UI/UX',
            'Web Development',
            'Mobile Development',
            'Artificial Intelligence',
            'Machine Learning',
            'Cybersecurity',
            'Cloud Computing',
            'DevOps',
            'Blockchain',
            'Cryptocurrency',
            'Product Management',
            'Project Management',
            'Digital Marketing',
            'Content Creation',
            'Social Media',
            'SEO',
            'SEM',
            'Email Marketing',
            'Graphic Design',
            'Video Editing',
            'Photography',
            'Game Development',
            'Backend Development',
            'Frontend Development',
            'Software Testing',
            'Quality Assurance',
            'Agile',
            'Scrum',
            'UI Design',
            'UX Research',
            'Figma',
            'Canva',
            'Excel',
            'Power BI',
            'SQL',
            'NoSQL',
            'Big Data',
            'Entrepreneurship',
            'Freelance',
            'Remote Work',
            'Career Tips',
            'Productivity',
            'Leadership',
            'Personal Finance',
            'Investing',
            'HR & Recruitment'
        ];

        foreach ($tags as $tagName) {
            Tag::create([
                'name' => $tagName,
                'slug' => Str::slug($tagName),
            ]);
        }
    }
}
