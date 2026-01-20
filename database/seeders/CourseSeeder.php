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

        $teacher1 = User::where('email', 'azharaulia@gmail.com')->first();
        $category1 = Category::where('name', 'Web Development')->first();
        $teacher2 = User::where('email', 'ardhiansyakh@gmail.com')->first();
        $category2 = Category::where('name', 'Database')->first();
        $teacher3 = User::where('email', 'mhrf@gmail.com')->first();
        $category3 = Category::where('name', 'Game Development')->first();

        if (!$teacher1 || !$category1 || !$teacher2 || !$category2 || !$teacher3 || !$category3) {
            $this->command->error('Teacher atau Category tidak ditemukan. Pastikan UserSeeder & CategorySeeder sudah dijalankan.');
            return;
        }

        $courseRoblox = Course::create([
            'name' => 'Belajar Roblox Studio dari Nol',
            'price' => 500000,

            'about' => 'Kursus lengkap untuk pemula banget. Membahas fundamental Roblox Studio.',
            'thumbnail' => 'https://jetex.id/blog/wp-content/uploads/2025/08/roblox-studio-kroha.jpg',
            'teacher_id' => $teacher3->id,
            'category_id' => $category3->id,
        ]);

        Lesson::create([
            'name' => 'Intro',
            'description' => 'Perkenalan tentang apa itu Roblox Studio dan kenapa kita harus mempelajarinya.',
            'video_url' => 'https://www.youtube.com/watch?v=teP9AvsRLPA',
            'course_id' => $courseRoblox->id,
        ]);

        $courseMysql = Course::create([
            'name' => 'Belajar MySQL dari Nol',
            'price' => 500000,

            'about' => 'Kursus lengkap untuk pemula banget. Membahas fundamental MySQL.',
            'thumbnail' => 'https://www.petanikode.com/img/mysql/mysql-backup.png',
            'teacher_id' => $teacher2->id,
            'category_id' => $category2->id,
        ]);

        Lesson::create([
            'name' => 'Intro',
            'description' => 'Perkenalan tentang apa itu MySQL dan kenapa kita harus mempelajarinya.',
            'video_url' => 'https://www.youtube.com/watch?v=xYBclb-sYQ4&list=PL-CtdCApEFH_P2_2zR6pvDublvpD3fF6W',
            'course_id' => $courseMysql->id,
        ]);


        $courseLaravel = Course::create([
            'name' => 'Belajar Laravel 11 dari Nol',
            'price' => 500000,

            'about' => 'Kursus lengkap untuk pemula banget. Membahas fundamental Laravel dari instalasi hingga deploy.',
            'thumbnail' => 'https://cdn.clouden.id/wp-content/uploads/2024/05/Mengenal-Laravel.png',
            'teacher_id' => $teacher1->id,
            'category_id' => $category1->id,
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
