# Codemy

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-6.0-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)

**Codemy** is an online learning platform designed to seamlessly connect teachers and students. We believe in making knowledge interaction practical, accessible, and effective.

---

## 📖 About The Project

Codemy acts as a bridge in the digital education space. The concept is simple yet powerful:
- **Teachers** can create, manage, and sell video-based classes.
- **Students** can explore, purchase, and access learning materials tailored to their interests.

We built Codemy to democratize access to skills and knowledge, providing a robust tool for educators and a flexible learning environment for students.

## ✨ Key Features

*   **👥 Dual User Roles**: Dedicated dashboards and functionalities for both **Students** and **Teachers**.
*   **📚 Course Management**: Teachers can create courses, set prices, write descriptions, and upload video lessons.
*   **📺 Video Learning**: Structured lesson delivery with video support.
*   **📂 Categorization**: Courses are organized into categories for easy discovery.
*   **💸 Subscription & Transactions**: specialized flow for course purchasing, including proof-of-payment uploads and validation.
*   **🔒 Secure Authentication**: Robust user management and access control.

## 🛠️ Tech Stack

*   **Framework**: [Laravel 12](https://laravel.com)
*   **Language**: PHP 8.2
*   **Frontend**: Blade Templates, Vite
*   **Database**: SQLite / MySQL

## 🚀 Getting Started

Follow these steps to set up the project locally on your machine.

### Prerequisites

*   PHP >= 8.2
*   Composer
*   Node.js & NPM

### Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/yourusername/codemy.git
    cd codemy
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install Frontend dependencies**
    ```bash
    npm install
    ```

4.  **Environment Setup**
    Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```
    *Configure your database settings in the `.env` file if you are not using SQLite.*

5.  **Generate App Key**
    ```bash
    php artisan key:generate
    ```

6.  **Run Migrations**
    Set up the database tables:
    ```bash
    php artisan migrate
    ```

7.  **Start the Server**
    You need to run both the Laravel development server and Vite.
    ```bash
    npm run dev
    ```
    *Note: The `dev` script in `composer.json` is configured to run both `php artisan serve`, `queue:listen`, and `npm run dev` concurrently.*
    
    Alternatively, run them separately:
    ```bash
    php artisan serve
    npm run dev
    ```

## 👥 Authors

**Cluster ARK DEV**

*   **Azhar Aulia Priatna** - 1402024013
*   **Muhammad Rafi** - 1402024040
*   **Askhabul Nur Ardiansyakh** - 1402024012

## 📄 License

The framework and this project are open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).