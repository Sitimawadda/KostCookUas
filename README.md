
 <div align="center">
    <h1>KostCook </h1>
    <h2>platform resep masakan praktis dan hemat untuk anak kost</h2>


  <img src="logos.png" alt="Logo Unsulbar" width="200"/>


  <p><strong>Siti Mawaddah</strong>
  <br/>D0223324</p> <br>

  <h1> FRAMEWORK WEB BASED </h1>
  <h1> 2025 </h1>

</div>


---

KostCook adalah sebuah website yang dirancang untuk memberikan solusi bagi anak kost yang ingin menemukan resep praktis dan hemat. Website ini menyediakan berbagai resep masakan sederhana yang mudah dibuat dengan bahan yang terjangkau dan tidak membutuhkan banyak alat masak.
KostCook bertujuan untuk membantu anak kost dalam memanfaatkan bahan makanan sederhana dan murah dengan resep-resep praktis yang tetap lezat. Selain itu, dengan adanya rating dan ulasan dari pengguna lain, KostCook juga memberikan platform untuk berbagi pengalaman memasak yang bermanfaat.

---

# Sistem Manajemen Resep Makanan
---

##  Fitur Utama

-  Buat dan simpan resep pribadi
-  Beri rating dan komentar pada resep
-  Tandai resep favorit
-  Role pengguna: Superadmin, Admin, User
-  Manajemen user dan profil

---

##  Role & Hak Akses

| Role        | Fitur Akses                                                                 |
|-------------|-----------------------------------------------------------------------------|
| Superadmin  | Kelola semua user & role, lihat semua resep & rating                        |
| Admin       | Lihat & moderasi resep, lihat data rating & user                           |
| User        | Buat resep, beri rating & komentar, simpan resep favorit                   |

---

##  Struktur Database

### 1. `roles`

| Field       | Tipe Data  | Keterangan                |
|-------------|------------|---------------------------|
| id          | bigint     | Primary Key               |
| name        | string     | Nama role unik            |
| timestamps  | timestamps | Created_at & Updated_at   |

### 2. `users`

| Field             | Tipe Data   | Keterangan                      |
|-------------------|-------------|----------------------------------|
| id                | bigint      | Primary Key                     |
| name              | string      | Nama user                       |
| email             | string      | Email unik                      |
| password          | string      | Password terenkripsi            |
| role_id           | foreignId   | Relasi ke `roles.id`            |
| remember_token    | string      | Token login                     |
| timestamps        | timestamps  | Created_at & Updated_at         |

### 3. `user_profiles`

| Field     | Tipe Data   | Keterangan                          |
|-----------|-------------|-------------------------------------|
| id        | bigint      | Primary Key                         |
| user_id   | foreignId   | Relasi unik ke `users.id` (One to One)|
| photo     | string      | Foto profil (opsional)              |
| bio       | text        | Bio singkat                         |
| phone     | string      | Nomor HP                            |
| address   | string      | Alamat                              |
| timestamps| timestamps  | Created_at & Updated_at             |

### 4. `recipes`

| Field        | Tipe Data   | Keterangan                        |
|--------------|-------------|-----------------------------------|
| id           | bigint      | Primary Key                       |
| title        | string      | Judul resep                       |
| description  | text        | Deskripsi                         |
| steps        | longText    | Langkah-langkah memasak           |
| cook_time    | integer     | Waktu memasak (menit)             |
| user_id      | foreignId   | Relasi ke `users.id`              |
| image        | string      | Path gambar resep                 |
| timestamps   | timestamps  | Created_at & Updated_at           |

### 5. `ingredients`

| Field      | Tipe Data   | Keterangan                        |
|------------|-------------|-----------------------------------|
| id         | bigint      | Primary Key                       |
| recipe_id  | foreignId   | Relasi ke `recipes.id`            |
| name       | string      | Nama bahan                        |
| quantity   | string      | Jumlah (contoh: 2 sdm, 1 cup)     |
| timestamps | timestamps  | Created_at & Updated_at           |

### 6. `ratings`

| Field       | Tipe Data   | Keterangan                            |
|-------------|-------------|----------------------------------------|
| id          | bigint      | Primary Key                           |
| user_id     | foreignId   | Relasi ke `users.id`                  |
| recipe_id   | foreignId   | Relasi ke `recipes.id`                |
| rating      | tinyInteger | Nilai 1–5                             |
| comment     | text        | Komentar (opsional)                  |
| timestamps  | timestamps  | Created_at & Updated_at              |
| unique      | user_id + recipe_id | Satu user hanya bisa beri 1 rating per resep |

### 7. `favorite_recipe` (pivot table)

| Field       | Tipe Data   | Keterangan                             |
|-------------|-------------|----------------------------------------|
| user_id     | foreignId   | Relasi ke `users.id`                   |
| recipe_id   | foreignId   | Relasi ke `recipes.id`                 |
| timestamps  | timestamps  | Created_at & Updated_at               |

---

##  Relasi Antar Tabel

| Relasi                        | Jenis Relasi     | Penjelasan                                                                 |
|------------------------------|------------------|---------------------------------------------------------------------------|
| Role → Users                 | One to Many      | 1 role dimiliki banyak user                                               |
| User → Recipes               | One to Many      | 1 user bisa membuat banyak resep                                          |
| Recipe → Ingredients         | One to Many      | 1 resep memiliki banyak bahan                                             |
| Recipe → Ratings             | One to Many      | 1 resep bisa memiliki banyak rating dari user                             |
| User → Ratings               | One to Many      | 1 user bisa memberi banyak rating ke berbagai resep                       |
| User → UserProfile           | One to One       | 1 user hanya memiliki 1 profil                                            |
| User ↔ Recipes (Favorites)   | Many to Many     | 1 user bisa menyukai banyak resep dan 1 resep bisa disukai banyak user    |

---
