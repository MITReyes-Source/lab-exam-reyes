<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            'BS Information Technology',
            'BS Computer Science',
            'BS Information Systems',
        ] as $name) {
            Course::firstOrCreate(['name' => $name]);
        }
    }
}
