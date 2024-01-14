<?php

namespace Database\Seeders;

use App\Models\Course\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Introduction to Programming',
                'date' => '2024-02-01',
                'duration' => 1.5,
                'price' => 249,
                'teacher' => 'Lara Doe',
                'image' => 'course-1.jpg',
                'organization_id' => 1,
            ],
            [
                'name' => 'Advanced Web Development',
                'date' => '2024-03-15',
                'duration' => 2.5,
                'price' => 149,
                'teacher' => 'John Doe',
                'image' => 'course-2.jpg',
                'organization_id' => 1,
            ],
            [
                'name' => 'Data Science Fundamentals',
                'date' => '2024-04-20',
                'duration' => 2.5,
                'price' => 349,
                'teacher' => 'Mark Smith',
                'image' => 'course-3.jpg',
                'organization_id' => 2,
            ],
            [
                'name' => 'Basic Graphic Design',
                'date' => '2024-05-11',
                'duration' => 2,
                'price' => 149,
                'teacher' => 'John Doe',
                'image' => 'course-1.jpg',
                'organization_id' => 3,
            ],
            [
                'name' => 'Digital Marketing 101',
                'date' => '2024-06-05',
                'duration' => 1.5,
                'price' => 149,
                'teacher' => 'John Smith',
                'image' => 'course-2.jpg',
                'organization_id' => 2,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
