<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail')->nullable(); // Gambar Boleh Kosong (Sesuai PDM 'o')
            $table->text('about')->nullable();       // Deskripsi Boleh Kosong (Sesuai PDM 'o')
            
            // Relasi ke Master USER (Teacher)
            $table->foreignId('teacher_id')
                  ->constrained('users') // Mengarah ke tabel users
                  ->onDelete('cascade');
            
            // Relasi ke Master KATEGORI
            $table->foreignId('category_id')
                  ->constrained() // Mengarah ke tabel categories
                  ->onDelete('cascade');
            $table->softDeletes(); // Opsional: Agar tidak langsung hilang permanen kalau dihapus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
