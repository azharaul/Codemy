# Codemy

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-6.0-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)

**Codemy** adalah platform pembelajaran online yang dirancang untuk menghubungkan pengajar yang ingin mengajar ke mahasiswa yang ingin belajar koding dan sebaliknya.

---

## 📖 Tentang Proyek

Codemy berperan sebagai jembatan dalam ruang pendidikan digital. Konsepnya sederhana namun kuat:
- **Pengajar** dapat membuat, mengelola, dan menjual kelas berbasis video.
- **Siswa** dapat menjelajahi, membeli, dan mengakses materi pembelajaran yang disesuaikan dengan minat mereka.

## 🛠️ Tech Stack

*   **Framework**: [Laravel 12](https://laravel.com)
*   **Language**: PHP 8.2
*   **Frontend**: Blade Templates, Vite
*   **Database**: MySQL

## 🚀 Getting Started

### Prasyarat

*   PHP >= 8.2
*   Composer

### Instalasi

1.  **Clone repositori**
    ```bash
    git clone https://github.com/yourusername/codemy.git
    cd codemy
    ```

2.  **Instal dependensi PHP**
    ```bash
    composer install
    ```

3.  **Environment Setup**
    Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
    *Konfigurasikan pengaturan database Anda di file `.env` jika Anda tidak menggunakan SQLite.*

5.  **Generate App Key**
    ```bash
    php artisan key:generate
    ```

6.  **Jalankan Migrasi**
    Siapkan tabel database:
    ```bash
    php artisan migrate
    ```


## 👥 Authors

**Kelompok ARK DEV**

*   **Azhar Aulia Priatna** - 1402024013
*   **Muhammad Rafi** - 1402024040
*   **Askhabul Nur Ardiansyakh** - 1402024012
