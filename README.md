# 💍 D'Karsa — Platform & Jasa Undangan Digital Multi-Kategori

<p align="center">
  <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80" alt="D'Karsa Banner" width="100%" style="border-radius: 16px; max-height: 380px; object-fit: cover;" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11%20%2F%2013-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/Filament%20v3-Admin%20Panel-F59E0B?style=for-the-badge&logo=filament&logoColor=white" alt="Filament" />
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" />
  <img src="https://img.shields.io/badge/PHP-%3E%3D%208.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/Docker-Database%20Container-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker" />
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License" />
</p>

---

## 📖 Tentang Project

**D'Karsa** adalah platform ekosistem undangan digital modern serbaguna yang dibangun menggunakan **Laravel**, **Filament v3**, dan **Docker** untuk manajemen databasenya. 

Website ini dilengkapi dengan landing page interaktif bertema elegan (*Our Wedding Link style*), katalog desain multi-kategori, sistem pembuatan undangan mandiri (*self-service invitation builder*) bertahap, alur persetujuan (**ACC**) oleh admin, serta dashboard admin yang canggih untuk mengelola data acara, tamu, dan reservasi (RSVP).

---

## ✨ Fitur Utama

- 🎨 **Self-Service Invitation Maker (`/buat-undangan`)**:
  - Formulir pendaftaran bertahap (6 langkah: Kategori, Data Tokoh/Mempelai, Keluarga, Jadwal Acara, Rekening Bank/Kado, Musik & Kontak Pemesan).
  - Validasi foto & upload sampul responsif.
  - Penomoran otomatis URL slug yang unik dan rapi.
- 🎭 **Dukungan Multi-Kategori Acara**:
  - **Pernikahan** (*Walimatul 'Ursy*)
  - **Halal Bihalal** (Silaturahmi Idul Fitri)
  - **Khitanan** (*Walimatul Khitan*)
  - **Aqiqah** (Tasyakuran Bayi)
  - **Ulang Tahun** (Milad / Sweet 17)
  - **Syukuran & Reuni**
  - **Tahlilan & Haul** (Doa & Mengenang)
  *(Label formulir dan halaman undangan beradaptasi secara otomatis sesuai kategori yang dipilih).*
- 🛡️ **Sistem Verifikasi & ACC Admin**:
  - Undangan yang baru dibuat customer otomatis berstatus **`Menunggu ACC`** (`pending`).
  - Link publik terkunci dan dilindungi dengan halaman *holding* informasi verifikasi.
  - Admin dapat mem-preview tampilan undangan sebelum mengaktifkannya.
- ⚡ **Filament Admin Panel (`/admin`)**:
  - Badge notifikasi angka pada menu **Data Undangan** yang menunjukkan jumlah undangan yang belum di-ACC.
  - Tombol aksi **ACC Undangan** sekali klik untuk mengaktifkan status publik.
  - Tombol aksi **Kirim Link ke WA** yang otomatis membuka chat WhatsApp pemesan berisi link resmi yang sudah aktif.
  - Manajemen Daftar Tamu, Jadwal Acara, Galeri Foto, dan Rekap RSVP / Pesanan.
- 💌 **Fitur Halaman Undangan Digital (`/undangan/{slug}`)**:
  - Animasi amplop pembuka layar penuh (*Full-screen Opening Envelope*).
  - Personalisasi nama tamu undangan otomatis via parameter URL (`?to=Nama+Tamu`).
  - Pemutar musik latar (*Autoplay Audio*) dengan tombol kontrol mengambang.
  - Hitung mundur (*Countdown Timer*) hari-H dinamis dan tombol **Simpan ke Google Calendar**.
  - Peta Google Maps interaktif & tombol navigasi rute lokasi acara.
  - Amplop digital: Salin nomor rekening bank & alamat pengiriman kado fisik.
  - Galeri foto kenangan & buku tamu (kirim ucapan doa & konfirmasi kehadiran).

---

## 💻 Persyaratan Sistem (Prerequisites)

Sebelum meng-clone dan menjalankan project ini di komputer lokal, pastikan telah terpasang:

1. **PHP**: Versi `>= 8.2` atau `8.3` (dengan ekstensi wajib: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `curl`, `fileinfo`, `gd`).
2. **Composer**: Versi `>= 2.x` ([Download Composer](https://getcomposer.org/))
3. **Docker & Docker Compose**: (**Wajib untuk Database**) [Download Docker Desktop](https://www.docker.com/products/docker-desktop/) untuk menjalankan container database MySQL dan phpMyAdmin secara otomatis.
4. **Git**: Untuk clone repository ([Download Git](https://git-scm.com/))

---

## 🚀 Panduan Instalasi (Step-by-Step)

Ikuti langkah-langkah di bawah ini untuk menjalankan project dari awal setelah melakukan clone dari GitHub:

### 1. Clone Repository
Buka terminal (Git Bash, Command Prompt, atau PowerShell), lalu clone project ini:
```bash
git clone https://github.com/Pak-D-Kingdom/D-Karsa.git
cd D-Karsa
```

---

### 2. Install Dependensi PHP (Composer)
Jalankan composer untuk mengunduh semua library dan framework Laravel serta Filament:
```bash
composer install
```

---

### 3. Duplikasi File Environment (`.env`)
Salin file konfigurasi `.env.example` menjadi `.env`:

- **Di Windows (Command Prompt / PowerShell):**
  ```cmd
  copy .env.example .env
  ```
- **Di Linux / macOS / Git Bash:**
  ```bash
  cp .env.example .env
  ```

---

### 4. Menjalankan Database dengan Docker (Docker Compose)
Project ini menggunakan **Docker** untuk mengelola database MySQL dan antarmuka phpMyAdmin secara terisolasi tanpa perlu meng-install server MySQL lokal secara manual. Konfigurasi kontainer sudah tersedia di file [`docker-compose.yml`](docker-compose.yml).

1. **Pastikan Docker Desktop sudah aktif/berjalan di komputer Anda.**
2. **Nyalakan container database di latar belakang (*detached mode*):**
   ```bash
   docker compose up -d
   ```
   *(Atau `docker-compose up -d` jika menggunakan Docker Compose versi lama)*.

   Perintah ini akan secara otomatis mengunduh image dan menjalankan 2 container:
   - **`undangan_db`**: MySQL 8.0 pada host port **`3307`** (database: `undangan_db`)
   - **`undangan_phpmyadmin`**: phpMyAdmin web GUI pada port **`8081`**

3. **Periksa Konfigurasi Database di file `.env`:**
   Nilai default di `.env.example` sudah disesuaikan langsung dengan container Docker, sehingga tidak perlu diubah lagi:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3307
   DB_DATABASE=undangan_db
   DB_USERNAME=undangan
   DB_PASSWORD=secret
   ```

4. **(Opsional) Mengakses phpMyAdmin via Browser:**
   Anda dapat melihat atau mengelola tabel database secara visual melalui browser:
   - **URL**: [http://localhost:8081](http://localhost:8081)
   - **Server / Host**: `db`
   - **Username**: `undangan` *(atau `root`)*
   - **Password**: `secret`

> [!TIP]
> **Perintah Docker yang berguna:**
> - Cek status container yang sedang berjalan: `docker compose ps`
> - Menghentikan container database: `docker compose down`
> - Menyalakan kembali container database: `docker compose up -d`

---

### 5. Generate Application Key
Jalankan perintah untuk membuat kunci enkripsi aplikasi:
```bash
php artisan key:generate
```

---

### 6. Jalankan Migrasi & Database Seeder
Perintah ini akan membuat seluruh tabel yang dibutuhkan serta mengisi data demo awal dan akun login admin:
```bash
php artisan migrate --seed
```

---

### 7. Hubungkan Storage Simbolik (Storage Link)
> [!IMPORTANT]
> **Langkah ini WAJIB dijalankan** agar foto-foto mempelai, cover, dan galeri yang di-upload dapat ditampilkan di browser.
```bash
php artisan storage:link
```

---

### 8. Jalankan Server Lokal
Nyalakan server development Laravel:
```bash
php artisan serve
```

Aplikasi sekarang sudah berjalan dan dapat diakses di browser melalui:
👉 **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🔐 Akun Login Admin (Filament)

Setelah menjalankan seeder pada langkah ke-6, akun administrator default telah otomatis dibuat:

| Keterangan | Informasi Login |
| :--- | :--- |
| **URL Panel Admin** | `http://127.0.0.1:8000/admin` |
| **Email** | `admin@undangan.test` |
| **Password** | `password` |

> [!TIP]
> Anda juga dapat membuat akun admin baru kapan saja melalui terminal dengan perintah:
> ```bash
> php artisan make:filament-user
> ```

---

## 🗺️ Struktur Rute / Endpoint Utama

| URL / Rute | Keterangan |
| :--- | :--- |
| `/` | Halaman beranda utama, katalog tema, portofolio, dan form konsultasi |
| `/buat-undangan` | Formulir mandiri 6 langkah untuk customer membuat undangan |
| `/buat-undangan/sukses/{slug}` | Halaman konfirmasi setelah membuat undangan (status antrean ACC) |
| `/undangan/{slug}` | Halaman undangan digital resmi yang dapat diakses tamu undangan |
| `/undangan/{slug}?to=Budi+Santoso` | Contoh membuka undangan dengan personalisasi nama tamu di amplop |
| `/admin` | Panel dashboard Filament untuk verifikasi & ACC undangan |

---

## ❓ Catatan: Mengenai File `home.html`, `home_test.html`, dan `output.html`

Jika Anda menemukan file bernama `home.html`, `home_test.html`, atau `output.html` di root folder project:

1. **Apa itu?**  
   File-file tersebut adalah file **temporary dump / log output curl** yang tidak sengaja terbuat saat proses debugging terminal lokal (berisi dump halaman error HTML Laravel).
2. **Apakah memiliki fungsi di aplikasi?**  
   **TIDAK ADA.** File-file tersebut sama sekali **tidak digunakan** oleh sistem Laravel maupun tampilan aplikasi. Seluruh tampilan aplikasi D'Karsa dikelola langsung melalui Blade templates di dalam folder `resources/views/`.
3. **Apakah boleh dihapus?**  
   **Ya, sangat aman untuk dihapus**. File tersebut telah dimasukkan ke dalam `.gitignore` agar tidak mengotori repository GitHub Anda.

---

## 🛠️ Perintah Berguna Tambahan

- **Membersihkan cache tampilan & konfigurasi:**
  ```bash
  php artisan optimize:clear
  ```
- **Melihat status antrean database lewat Tinker:**
  ```bash
  php artisan tinker
  ```

---

## 📄 Lisensi
Project ini dilisensikan di bawah lisensi terbuka [MIT License](LICENSE).
Dikembangkan untuk platform ekosistem undangan pernikahan & perayaan digital modern **D'Karsa**.
