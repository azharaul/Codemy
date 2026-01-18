# System Design Diagrams

## 1. Conceptual Data Model (CDM)
The CDM represents the high-level entities and their relationships.

```mermaid
erDiagram
    USER ||--o{ COURSE : "teaches"
    USER ||--o{ SUBSCRIPTION_TRANSACTION : "makes"
    USER }|--|{ COURSE : "enrolls in"
    CATEGORY ||--o{ COURSE : "categorizes"
    COURSE ||--o{ LESSON : "contains"

    USER {
        string name
        string email
        enum role "student, teacher"
    }

    CATEGORY {
        string name
    }

    COURSE {
        string name
        int price
        text about
    }

    LESSON {
        string name
        string video_url
    }

    SUBSCRIPTION_TRANSACTION {
        int total_amount
        boolean is_paid
    }
```

## 2. Physical Data Model (PDM)
The PDM shows the specific database tables, columns, data types, and foreign keys.

```mermaid
erDiagram
    users {
        bigint id PK
        string name
        string email
        string occupation
        enum role
        string password
        timestamp email_verified_at
        timestamp created_at
        timestamp updated_at
    }

    categories {
        bigint id PK
        string name
        timestamp created_at
        timestamp updated_at
    }

    courses {
        bigint id PK
        string name
        bigint price
        string thumbnail
        text about
        bigint teacher_id FK
        bigint category_id FK
        timestamp deleted_at
        timestamp created_at
        timestamp updated_at
    }

    lessons {
        bigint id PK
        string name
        text description
        string video_url
        bigint course_id FK
        timestamp created_at
        timestamp updated_at
    }

    course_students {
        bigint id PK
        bigint user_id FK
        bigint course_id FK
        timestamp created_at
        timestamp updated_at
    }

    subscribe_transactions {
        bigint id PK
        bigint course_id FK
        bigint total_amount
        boolean is_paid
        string proof
        bigint user_id FK
        timestamp created_at
        timestamp updated_at
    }

    users ||--o{ courses : "teacher_id"
    categories ||--o{ courses : "category_id"
    courses ||--o{ lessons : "course_id"
    users ||--o{ course_students : "user_id"
    courses ||--o{ course_students : "course_id"
    users ||--o{ subscribe_transactions : "user_id"
    courses ||--o{ subscribe_transactions : "course_id"
```

## 3. Transaction Flow (Sequence Diagram)
This diagram illustrates the process of a student purchasing a course.

```mermaid
flowchart TD
    Start([User Memilih Kursus]) --> Checkout[Masuk Halaman Checkout]
    Checkout --> Upload[Upload Bukti Pembayaran]
    Upload --> Validasi{Cek File Gambar?}
    
    Validasi -- Tidak Valid --> Error[Tampilkan Error]
    Error --> Upload
    
    Validasi -- Valid --> Simpan[Simpan ke Database]
    Simpan --> Akses[Akses Kursus Dibuka]
    Akses --> Selesai([Selesai: User Bisa Belajar])
```
