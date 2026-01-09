# 🛡️ GARDA - Documentation (v1.0 Baseline)

Sistem Manajemen Magang & PKL Mahasiswa dengan Integritas Data Berbasis Blockchain Layer.

---

## 📅 Progress Report: Version 1.0 (Baseline)

- [x] **Smart Installer**: Setup mandiri via web (`setup.php`).
- [x] **Auth System**: Login multi-role (4 Role) dengan verifikasi hash.
- [x] **Integrity Layer**: Simulasi blockchain menggunakan `blockchain_registry` untuk bukti perubahan data.
- [x] **Premium UI**: Dashboard Glassmorphism & Sidebar Navigation ready.
- [x] **Security Engine**: Session Fixation Protection & 15-min Session Timeout.

---

## 🛠️ Instalasi & Konfigurasi

### 1. Prasyarat

- XAMPP / PHP 8.0+
- Database MySQL

### 2. Cara Install

1. Clone / Copy folder ke `htdocs`.
2. Buka browser: `http://localhost/Garda/` (atau folder project lo).
3. Anda akan otomatis diarahkan ke **Garda Initial Setup**.
4. Masukkan konfigurasi database (Host, User, Pass).
5. Klik **Initialize System**.

### 3. Akun Default

Setelah setup, gunakan akun berikut:

- **Admin**: `admin` / `admin123`
- **Mahasiswa**: `mahasiswa` / `mhs123`
- **Dosen**: `dosen` / `dosen123`
- **Mitra**: `mitra` / `mitra123`

---

## 📁 Struktur Folder Utama

- `core/`: Logika inti (Auth, Guard, Connection).
- `config/`: Konfigurasi yang digenerate oleh setup.
- `public/`: Antarmuka pengguna (Dashboard, Login).
- `api/`: Endpoint untuk operasi asinkron (AJAX).
- `db/`: Skema database mentah (`schema.sql`).

## 🛡️ Keamanan

Sistem ini menggunakan **SHA-256 CAP (Integrity Hash)**. Setiap kali user login, sistem membangkitkan hash unik yang melibatkan `username + role + password_hash + SALT`. Jika data di database diubah manual tanpa melalui sistem, hash tidak akan cocok (Integrity Violation).

---

_Created with ❤️ by Garda Dev Team_
