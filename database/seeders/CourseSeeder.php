<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{

    public function run(): void
    {

        $teacher = User::where('email', 'azharaulia@gmail.com')->first();
        $category = Category::where('name', 'Web Development')->first();

   
        if (!$teacher || !$category) {
            $this->command->error('Teacher atau Category tidak ditemukan. Pastikan UserSeeder & CategorySeeder sudah dijalankan.');
            return;
        }


        $courseLaravel = Course::create([
            'name' => 'Belajar Laravel 11 dari Nol',

            'about' => 'Kursus lengkap untuk pemula banget. Membahas fundamental Laravel dari instalasi hingga deploy.',
            'thumbnail' => 'https://cdn.clouden.id/wp-content/uploads/2024/05/Mengenal-Laravel.png', 
            'teacher_id' => $teacher->id,
            'category_id' => $category->id,
        ]);

     
        Lesson::create([
            'name' => 'Intro',

            'video_url' => 'https://youtu.be/T1TR-RGf2Pw?si=AWY1zonQBP84m85e',
            'course_id' => $courseLaravel->id,
        ]);
        Lesson::create([
            'name' => 'Instalasi & Konfigurasi',

            'video_url' => 'https://youtu.be/nW60yGRoUrs?si=wSnLbtqdZTCiwj3i',
            'course_id' => $courseLaravel->id,
        ]);
         Lesson::create([
            'name' => 'Struktur Folder',

            'video_url' => 'https://youtu.be/x55ndgkD2QI?si=6IN8D6_bDqerIIgR',
            'course_id' => $courseLaravel->id,
        ]);
    }
}
