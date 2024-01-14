<?php

namespace Database\Seeders;

use App\Models\Organization\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'SoftUni',
                'category' => 'Web development',
                'image' => 'softuni.jpg',
            ],
            [
                'name' => 'Udemy',
                'category' => 'All IT fields',
                'image' => 'udemy.jpg',
            ],
            [
                'name' => 'DesignMe',
                'category' => 'Web design',
                'image' => 'coursera.jpg',
            ]
        ];

        foreach ($courses as $course) {
            Organization::create($course);
        }
    }
}
