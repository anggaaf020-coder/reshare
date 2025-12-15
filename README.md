<<<<<<< HEAD
# ReShare - Platform Berbagi Barang Bekas Layak Pakai

## Tentang ReShare

ReShare adalah platform digital untuk mendonasikan dan mengambil barang bekas layak pakai guna mengurangi limbah rumah tangga dan membantu masyarakat yang membutuhkan.

## Teknologi yang Digunakan

- **Frontend**: HTML5, CSS3, Tailwind CSS (CDN), Vanilla JavaScript
- **Backend**: PHP Native (tanpa framework)
- **Database**: PostgreSQL (Supabase)
- **Styling**: Custom CSS dengan dark mode support

## Fitur Utama

### Autentikasi
- Register akun baru dengan validasi email
- Login dengan nama/email dan password
- Logout dengan session clearing
- Rate limiting untuk keamanan
- Password hashing dengan bcrypt

### Manajemen Barang (CRUD)
- Upload barang untuk didonasikan dengan foto
- Edit dan hapus barang milik sendiri
- Browse katalog barang dengan filter kategori
- Search barang berdasarkan nama/deskripsi
- Detail barang lengkap dengan info donatur

### Pengambilan Barang
- Ambil barang yang tersedia
- Status otomatis berubah menjadi "diambil"
- Pencatatan transaksi di database
- Kontak donatur via WhatsApp

### Event
- Lihat daftar event donation
- Detail event dengan lokasi dan tanggal
- Filter dan search event
- Pendaftaran via WhatsApp

### Pengaturan User
- Ganti username dengan validasi ketersediaan (AJAX)
- Ganti password dengan verifikasi password lama
- Ganti email dengan validasi
- Ganti nomor telepon

### Dark Mode
- Toggle manual dengan ikon matahari/bulan
- Preferensi tersimpan di localStorage
- Zero white flash saat toggle
- Palet warna eco-friendly premium (NO PURPLE)
- Smooth transitions 300ms

## Struktur Database

### users
- id (uuid, PK)
- nama, email (unique), password (hashed)
- nomor, created_at

### item
- item_id (uuid, PK)
- user_id (FK), nama_barang, deskripsi, deskripsi_singkat
- kategori, kondisi, foto, status, alamat, created_at

### transaksi
- id (uuid, PK)
- item_id, donor_id, penerima_id (FK), tanggal

### event
- event_id (uuid, PK)
- title, deskripsi, kategori, tanggal, lokasi, poster, contact, created_at

## Palet Warna (STRICT)

### Light Mode
- Body: `#F7F6F2` | Card: `#FFFFFF` | Border: `#E4DED6`
- Primary: `#8F9F7A` | Secondary: `#E6DCCF`

### Dark Mode
- Body: `#1F2A24` | Card: `#2C3E34` | Border: `#3A4F43`
- Primary: `#8F9F7A` | Secondary: `#3A4F43`

## Keamanan

- Password bcrypt hashing
- Session-based authentication
- CSRF protection ready
- Rate limiting untuk login/register
- Input sanitization & validation
- Row Level Security (RLS) di database
- Prepared statements (SQL injection protection)

## Setup & Instalasi

### Requirements
- PHP 7.4+ dengan PDO PostgreSQL extension
- Supabase PostgreSQL database
- Web server (Apache/Nginx)

### Langkah Setup
1. Database sudah ter-setup di Supabase
2. File `.env` berisi connection string
3. Upload sample data dari `database/reshare.sql`
4. Buat folder `assets/items/` dan `assets/events/`
5. Akses `frontend/login.php`

### Default Login
- Email: admin@reshare.com
- Password: reshare123

## Struktur Backend

```
backend/
├── auth/ (login, register, logout)
├── config/ (database connection)
├── events/ (fetch, detail)
├── items/ (CRUD + ambil)
├── user/ (update profile)
└── utils/ (helper, protection)
```

## Production-Ready Features

- Proper error handling
- Session management
- File upload validation
- Transaction management
- Responsive design
- SEO-friendly structure
- Clean, maintainable code
- Modular architecture
- Security best practices

## Kontribusi

Proyek production-ready untuk platform berbagi barang sustainable dengan dampak sosial positif.

## Lisensi

Educational Project - 2025
=======
# reshare
>>>>>>> 3ce806d7dd898541e8ce1d1e18e4778f1f3617cb
