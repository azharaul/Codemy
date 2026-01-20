# Codemy

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-6.0-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)

**Codemy** adalah platform pembelajaran online yang dirancang untuk menghubungkan pengajar dan siswa secara mulus. Kami percaya dalam membuat interaksi pengetahuan menjadi praktis, mudah diakses, dan efektif.

---

## 📖 Tentang Proyek

Codemy berperan sebagai jembatan dalam ruang pendidikan digital. Konsepnya sederhana namun kuat:
- **Pengajar** dapat membuat, mengelola, dan menjual kelas berbasis video.
- **Siswa** dapat menjelajahi, membeli, dan mengakses materi pembelajaran yang disesuaikan dengan minat mereka.

Kami membangun Codemy untuk mendemokratisasi akses ke keterampilan dan pengetahuan, menyediakan alat yang tangguh bagi para pendidik dan lingkungan belajar yang fleksibel bagi siswa.

## ✨ Fitur Utama

*   **👥 Peran Pengguna Ganda**: Dasbor dan fungsionalitas khusus untuk **Siswa** dan **Pengajar**.
*   **📚 Manajemen Kursus**: Pengajar dapat membuat kursus, mengatur harga, menulis deskripsi, dan mengunggah video pelajaran.
*   **📺 Pembelajaran Video**: Penyampaian pelajaran yang terstruktur dengan dukungan video.
*   **📂 Kategorisasi**: Kursus diatur ke dalam kategori untuk memudahkan pencarian.
*   **💸 Langganan & Transaksi**: Alur khusus untuk pembelian kursus, termasuk unggah bukti pembayaran dan validasi.
*   **🔒 Autentikasi Aman**: Manajemen pengguna dan kontrol akses yang kuat.

## 🛠️ Teknologi yang Digunakan

*   **Framework**: [Laravel 12](https://laravel.com)
*   **Bahasa**: PHP 8.2
*   **Frontend**: Blade Templates, Vite
*   **Database**: SQLite / MySQL

## 🚀 Memulai

Ikuti langkah-langkah ini untuk mengatur proyek secara lokal di mesin Anda.

### Prasyarat

*   PHP >= 8.2
*   Composer
*   Node.js & NPM

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

3.  **Instal dependensi Frontend**
    ```bash
    npm install
    ```

4.  **Pengaturan Lingkungan**
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

7.  **Jalankan Server**
    Anda perlu menjalankan server pengembangan Laravel dan Vite.
    ```bash
    npm run dev
    ```
    *Catatan: Skrip `dev` di `composer.json` dikonfigurasi untuk menjalankan `php artisan serve`, `queue:listen`, dan `npm run dev` secara bersamaan.*
    
    Atau, jalankan secara terpisah:
    ```bash
    php artisan serve
    npm run dev
    ```

## 👥 Penulis

**Cluster ARK DEV**

*   **Azhar Aulia Priatna** - 1402024013
*   **Muhammad Rafi** - 1402024040
*   **Askhabul Nur Ardiansyakh** - 1402024012

## 📄 Lisensi

Framework dan proyek ini adalah perangkat lunak sumber terbuka yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).