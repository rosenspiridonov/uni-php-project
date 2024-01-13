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
                'time' => '10:00:00',
                'teacher_id' => 1, // Replace with valid IDs
                'organization_id' => 1, // Replace with valid IDs
                'place_id' => 1, // Replace with valid IDs
            ],
            [
                'name' => 'Advanced Web Development',
                'date' => '2024-03-15',
                'time' => '14:00:00',
                'teacher_id' => 2,
                'organization_id' => 1,
                'place_id' => 2,
            ],
            [
                'name' => 'Data Science Fundamentals',
                'date' => '2024-04-20',
                'time' => '09:00:00',
                'teacher_id' => 3,
                'organization_id' => 2,
                'place_id' => 3,
            ],
            [
                'name' => 'Basic Graphic Design',
                'date' => '2024-05-11',
                'time' => '11:30:00',
                'teacher_id' => 4,
                'organization_id' => 3,
                'place_id' => 1,
            ],
            [
                'name' => 'Digital Marketing 101',
                'date' => '2024-06-05',
                'time' => '15:00:00',
                'teacher_id' => 5,
                'organization_id' => 2,
                'place_id' => 2,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
