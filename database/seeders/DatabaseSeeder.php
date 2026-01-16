<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Basic Settings and Permissions
        $this->call([
            AcademicSettingSeeder::class,
            PermissionSeeder::class,
        ]);

        // 2. Academic Structure
        $session = \App\Models\SchoolSession::factory()->create(['session_name' => '2023-2024']);

        $semester1 = \App\Models\Semester::factory()->create([
            'semester_name' => 'First Semester',
            'session_id' => $session->id,
            'start_date' => '2023-01-01',
            'end_date' => '2023-06-30'
        ]);

        $semester2 = \App\Models\Semester::factory()->create([
            'semester_name' => 'Second Semester',
            'session_id' => $session->id,
            'start_date' => '2023-07-01',
            'end_date' => '2023-12-31'
        ]);

        // 3. Classes and Sections
        $classes = [];
        for ($i = 1; $i <= 10; $i++) {
            $class = \App\Models\SchoolClass::factory()->create([
                'class_name' => "Class $i",
                'session_id' => $session->id
            ]);
            $classes[] = $class;

            \App\Models\Section::factory()->create([
                'section_name' => 'Section A',
                'class_id' => $class->id,
                'session_id' => $session->id
            ]);

            \App\Models\Section::factory()->create([
                'section_name' => 'Section B',
                'class_id' => $class->id,
                'session_id' => $session->id
            ]);
        }

        // 4. Teachers
        $teachers = \App\Models\User::factory()->count(10)->create(['role' => 'teacher']);
        foreach ($teachers as $teacher) {
            $teacher->assignRole('teacher');
        }

        // 5. Courses and Teacher Assignments
        foreach ($classes as $class) {
            $courses = ['Mathematics', 'English', 'Science', 'Social Studies'];
            foreach ($courses as $courseName) {
                $course = \App\Models\Course::factory()->create([
                    'course_name' => $courseName,
                    'class_id' => $class->id,
                    'session_id' => $session->id,
                    'semester_id' => $semester1->id
                ]);

                // Assign a random teacher to this course/class/section
                $section = \App\Models\Section::where('class_id', $class->id)->first();
                \App\Models\AssignedTeacher::factory()->create([
                    'teacher_id' => $teachers->random()->id,
                    'course_id' => $course->id,
                    'class_id' => $class->id,
                    'section_id' => $section->id,
                    'semester_id' => $semester1->id,
                    'session_id' => $session->id
                ]);
            }
        }

        // 6. Students
        \App\Models\User::factory()->count(50)->create(['role' => 'student'])->each(function ($student) use ($classes, $session) {
            $student->assignRole('student');

            $class = $classes[array_rand($classes)];
            $section = \App\Models\Section::where('class_id', $class->id)->first();

            \App\Models\StudentAcademicInfo::factory()->create([
                'student_id' => $student->id
            ]);

            \App\Models\StudentParentInfo::factory()->create([
                'student_id' => $student->id
            ]);
        });
    }
}
