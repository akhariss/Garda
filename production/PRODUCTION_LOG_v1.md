# 📑 GARDA Production Log (v1.0 - Baseline)

Dokumentasi progress teknis dan kapabilitas sistem saat ini.

---

## 🛠️ Status Arsitektur (Baseline)

Sistem saat ini telah mencapai fase **Stable Core**, di mana fondasi keamanan, basis data, dan antarmuka utama sudah terintegrasi secara modular.

### 1. Smart Installer (`setup.php`)

- **Interactive Configuration**: Antarmuka web untuk mengatur DB Host, Name, User, dan Password.
- **Master Admin Creation**: Akun administrator utama dibuat secara dinamis saat setup (tidak statis di SQL).
- **Schema Driver**: Mendukung impor skema database baik secara manual (upload file) maupun otomatis (menggunakan default `/db/schema.sql`).
- **Auto-Config Generator**: Menghasilkan file `/config/config.php` dengan deteksi `BASE_URL` otomatis dan generator `AUTH_SALT` unik.
- **Security Lockdown**: Installer otomatis terkunci jika sistem terdeteksi sudah terpasang.

### 2. Keamanan & Integritas Data

- **One-Door Auth**: Sistem login terpusat dengan Role-Based Access Control (RBAC).
- **Session Fixation Protection**: Regenerasi ID sesi setiap kali login sukses.
- **Data Integrity Layer**: Implementasi **SHA-256 CAP Hash** yang mensinkronkan sesi user dengan database dan registry blockchain log.
- **Auto-Timeout**: Sesi otomatis hangus jika user tidak aktif selama 15 menit.

### 3. Antarmuka Pengguna (UI/UX)

- **Framework-less Premium**: Menggunakan Vanilla CSS dengan desain modern (Glassmorphism).
- **4 Dashboard Perspective**:
  - **Admin**: Audit sistem dan manajemen user tingkat tinggi.
  - **Mahasiswa Portal**: Tracking progress magang dan pengisian logbook.
  - **Monitoring Dosen**: Tabel monitoring performa bimbingan.
  - **Mitra Dashboard**: Kelola data peserta di perusahaan.

### 4. Database Core

- **Users Table**: Penyimpanan kredensial terenkripsi BCRYPT.
- **Blockchain Registry**: Tabel permanen untuk pencatatan log hash integritas data.

---

## 📅 Roadmap Tahap Berikutnya (V2.0 Idea)

- [ ] Implementasi form logbook harian mahasiswa.
- [ ] Fitur export laporan periodik ke PDF otomatis.
- [ ] Dashboard analitik dengan Chart.js untuk Dosen/Admin.
- [ ] Notifikasi sistem via email/telegram.

---

_Log terakhir diperbarui: 2026-09-01_
