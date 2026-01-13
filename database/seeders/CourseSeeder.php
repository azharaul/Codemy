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
            'price' => 500000,

            'about' => 'Kursus lengkap untuk pemula banget. Membahas fundamental Laravel dari instalasi hingga deploy.',
            'thumbnail' => 'https://cdn.clouden.id/wp-content/uploads/2024/05/Mengenal-Laravel.png', 
            'teacher_id' => $teacher->id,
            'category_id' => $category->id,
        ]);
        Lesson::create([
            'name' => 'Intro',
            'description' => 'Perkenalan tentang apa itu Framework Laravel dan kenapa kita harus mempelajarinya di tahun 2025. Laravel membuat pengembangan web menjadi cepat dan menyenangkan.',
            'video_url' => 'https://youtu.be/T1TR-RGf2Pw?si=AWY1zonQBP84m85e',
            'course_id' => $courseLaravel->id,
        ]);
        Lesson::create([
            'name' => 'Instalasi & Konfigurasi',
            'description' => 'Panduan lengkap cara menginstall Laravel 11 menggunakan Composer dan setting environment database.',
            'video_url' => 'https://youtu.be/nW60yGRoUrs?si=wSnLbtqdZTCiwj3i',
            'course_id' => $courseLaravel->id,
        ]);
         Lesson::create([
            'name' => 'Struktur Folder',
            'description' => 'Membedah struktur folder Laravel 11 agar paham tempat penyimpanan file Model, View, Controller, dan Routing.',
            'video_url' => 'https://youtu.be/x55ndgkD2QI?si=6IN8D6_bDqerIIgR',
            'course_id' => $courseLaravel->id,
        ]);
    }
}
