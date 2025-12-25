<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User Penting
        $owner = User::create([
            'name' => 'Azhar Aulia Priatna',
            'email' => 'owner@codemy.com',
            'password' => bcrypt('password'),
            'occupation' => 'CEO',
            'role' => 'owner',
        ]);
        
        $teacher = User::create([
            'name' => 'Muhammad Rafi',
            'email' => 'budi@codemy.com',
            'password' => bcrypt('password'),
            'occupation' => 'Web Developer',
            'role' => 'teacher',
        ]);
        $student = User::create([
            'name' => 'Askhabul Nur Ardiansyakh',
            'email' => 'askhabul@codemy.com',
            'password' => bcrypt('12345678'),
            'occupation' => 'Pelajar',
            'role' => 'owner',
        ]);
        // 2. Buat Kategori
        $cat1 = Category::create(['name' => 'Programming', 'slug' => 'programming']);
        $cat2 = Category::create(['name' => 'Design', 'slug' => 'design']);
        Category::create(['name' => 'Marketing', 'slug' => 'marketing']);
        // 3. Buat Kursus (Oleh Pak Budi, Kategori Programming)
        $courseLaravel = Course::create([
            'name' => 'Belajar Laravel 11 dari Nol',
            'slug' => 'belajar-laravel-11-dari-nol',
            'about' => 'Kursus lengkap untuk pemula banget.',
            'thumbnail' => 'https://placehold.co/600x400', // Gambar placeholder
            'teacher_id' => $teacher->id,
            'category_id' => $cat1->id,
        ]);
        // 4. Buat Lessons (Untuk Kursus Laravel tadi)
        Lesson::create([
            'name' => 'Intro & Instalasi',
            'slug' => 'intro-instalasi',
            'video_url' => 'https://youtu.be/video1', // Contoh link
            'course_id' => $courseLaravel->id,
        ]);
        Lesson::create([
            'name' => 'Membuat Route & Controller',
            'slug' => 'membuat-route-controller',
            'video_url' => 'https://youtu.be/video2',
            'course_id' => $courseLaravel->id,
        ]);
    }
}