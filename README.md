# KostCook - Aplikasi Resep Praktis untuk Anak Kost

## 👤 Identitas
- **Nama:** [Siti Mawaddah]
- **NIM:** [D0223324]

## 📚 Mata Kuliah
- **Mata Kuliah:** FRAMEWORK WEB BASED
- **Tahun Ajaran:** 2024/2025

KostCook adalah sebuah website yang dirancang untuk memberikan solusi bagi anak kost yang ingin menemukan resep praktis dan hemat. Website ini menyediakan berbagai resep masakan sederhana yang mudah dibuat dengan bahan yang terjangkau dan tidak membutuhkan banyak alat masak.
KostCook bertujuan untuk membantu anak kost dalam memanfaatkan bahan makanan sederhana dan murah dengan resep-resep praktis yang tetap lezat. Selain itu, dengan adanya rating dan ulasan dari pengguna lain, KostCook juga memberikan platform untuk berbagi pengalaman memasak yang bermanfaat.

## 🎭 Role dan Fitur Akses

| Role         | Fitur                                                                 |
|--------------|------------------------------------------------------------------------|
| **Superadmin** | - Mengelola semua user dan role<br>- Melihat semua data resep, rating |
| **Admin**      | - Melihat & moderasi resep<br>- Melihat data rating & user            |
| **User**       | - Membuat resep<br>- Memberi rating & komentar                        |

---

## 🗃️ Struktur Tabel Database

### 1. `roles`
| Field     | Tipe Data     | Keterangan         |
|-----------|---------------|--------------------|
| id        | bigint (PK)   | Primary Key        |
| name      | string        | Nama role unik     |
| timestamps| timestamps    | Created & updated  |

### 2. `users`
| Field             | Tipe Data     | Keterangan                    |
|------------------|---------------|-------------------------------|
| id               | bigint (PK)   | Primary Key                   |
| name             | string        | Nama user                     |
| email            | string (unique)| Email user                   |
| password         | string        | Password terenkripsi          |
| role_id          | foreignId     | Relasi ke `roles.id`          |
| email_verified_at| timestamp     | Waktu verifikasi email        |
| remember_token   | string|null   | Token login                   |
| timestamps       | timestamps    | Created & updated             |

### 3. `recipes`
| Field         | Tipe Data     | Keterangan                            |
|---------------|---------------|----------------------------------------|
| id            | bigint (PK)   | Primary Key                           |
| title         | string        | Judul resep                           |
| description   | text|null     | Deskripsi singkat                     |
| steps         | longText      | Langkah-langkah pembuatan             |
| prep_time     | integer|null  | Waktu persiapan (menit)              |
| cook_time     | integer|null  | Waktu memasak (menit)                |
| estimated_cost| decimal(10,2) | Estimasi biaya                        |
| difficulty    | enum          | mudah / sedang / sulit               |
| image         | string|null   | Path gambar                          |
| user_id       | foreignId     | Relasi ke `users.id`                 |
| timestamps    | timestamps    | Created & updated                    |

### 4. `ingredients`
| Field     | Tipe Data     | Keterangan                  |
|-----------|---------------|-----------------------------|
| id        | bigint (PK)   | Primary Key                 |
| recipe_id | foreignId     | Relasi ke `recipes.id`      |
| name      | string        | Nama bahan                  |
| quantity  | string        | Jumlah/ukuran (misal: 2 sdm)|
| timestamps| timestamps    | Created & updated           |

### 5. `ratings`
| Field     | Tipe Data     | Keterangan                            |
|-----------|---------------|----------------------------------------|
| id        | bigint (PK)   | Primary Key                           |
| user_id   | foreignId     | Relasi ke `users.id`                  |
| recipe_id | foreignId     | Relasi ke `recipes.id`                |
| rating    | tinyInteger   | Skor (1–5)                            |
| comment   | text|null     | Komentar pengguna                     |
| timestamps| timestamps    | Created & updated                     |
| unique    | user_id + recipe_id | Satu user hanya bisa rating sekali |

---

## 🔗 Relasi Antar Tabel

| Tabel Asal     | Relasi           | Tabel Tujuan | Jenis Relasi       |
|----------------|------------------|--------------|---------------------|
| `users`        | hasMany          | `recipes`    | 1 user banyak resep |
| `roles`        | hasMany          | `users`      | 1 role banyak user  |
| `recipes`      | hasMany          | `ingredients`| 1 resep banyak bahan|
| `recipes`      | hasMany          | `ratings`    | 1 resep banyak rating|
| `users`        | hasMany          | `ratings`    | 1 user banyak rating|
| `ratings`      | belongsTo        | `users` & `recipes` | rating milik user & resep |
| `ingredients`  | belongsTo        | `recipes`    | bahan milik resep   |

---


