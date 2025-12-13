-- ReShare Database - Complete Schema and Sample Data
-- Production-ready SQL for PostgreSQL (Supabase)

-- Note: The schema has already been created via Supabase migration
-- This file contains sample data for testing

-- Sample Users (password for all: "reshare123")
INSERT INTO users (id, nama, email, password, nomor, created_at) VALUES
('a0eebc99-9c0b-4ef8-bb6d-6bb9bd380a11', 'Admin ReShare', 'admin@reshare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567890', NOW()),
('b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', 'Budi Santoso', 'budi@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567891', NOW()),
('c2eebc99-9c0b-4ef8-bb6d-6bb9bd380a33', 'Siti Nurhaliza', 'siti@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567892', NOW()),
('d3eebc99-9c0b-4ef8-bb6d-6bb9bd380a44', 'Ahmad Faizal', 'ahmad@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567893', NOW())
ON CONFLICT (id) DO NOTHING;

-- Sample Items
INSERT INTO item (item_id, user_id, nama_barang, deskripsi, deskripsi_singkat, kategori, kondisi, foto, status, alamat, created_at) VALUES
('11111111-1111-1111-1111-111111111111', 'a0eebc99-9c0b-4ef8-bb6d-6bb9bd380a11', 'Laptop Dell Inspiron', 'Laptop bekas kantor dalam kondisi baik, sudah di-upgrade RAM menjadi 8GB. Cocok untuk pelajar atau pekerja kantoran. Termasuk charger original.', 'Laptop Dell Inspiron 8GB RAM, kondisi baik', 'Elektronik', 'Bagus', 'sample1.jpg', 'tersedia', 'Jl. Merdeka No. 45, Jakarta Pusat', NOW()),
('22222222-2222-2222-2222-222222222222', 'b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', 'Pakaian Anak Usia 5-7 Tahun', 'Satu set pakaian anak lengkap dengan celana, baju, dan jaket. Masih sangat layak pakai, bersih, dan wangi. Cocok untuk anak usia 5-7 tahun.', 'Pakaian anak lengkap, usia 5-7 tahun', 'Pakaian', 'Seperti Baru', 'sample2.jpg', 'tersedia', 'Jl. Sudirman No. 12, Bandung', NOW()),
('33333333-3333-3333-3333-333333333333', 'c2eebc99-9c0b-4ef8-bb6d-6bb9bd380a33', 'Buku Pelajaran SMA Kelas 12', 'Paket lengkap buku pelajaran SMA kelas 12 semua mata pelajaran. Masih dalam kondisi baik, beberapa ada coretan pensil yang bisa dihapus.', 'Paket buku pelajaran SMA kelas 12', 'Buku', 'Bagus', 'sample3.jpg', 'tersedia', 'Jl. Gatot Subroto No. 88, Surabaya', NOW()),
('44444444-4444-4444-4444-444444444444', 'd3eebc99-9c0b-4ef8-bb6d-6bb9bd380a44', 'Kipas Angin Miyako', 'Kipas angin stand masih berfungsi dengan baik. Sudah dibersihkan dan siap pakai. Cocok untuk kamar atau ruang tamu.', 'Kipas angin Miyako kondisi bagus', 'Elektronik', 'Layak Pakai', 'sample4.jpg', 'tersedia', 'Jl. Diponegoro No. 23, Yogyakarta', NOW()),
('55555555-5555-5555-5555-555555555555', 'a0eebc99-9c0b-4ef8-bb6d-6bb9bd380a11', 'Panci Set Lengkap', 'Set panci masak lengkap 5 buah berbagai ukuran. Masih sangat layak pakai, anti lengket masih bagus. Cocok untuk keluarga baru.', 'Set panci lengkap 5 buah, anti lengket', 'Rumah Tangga', 'Bagus', 'default.jpg', 'tersedia', 'Jl. Asia Afrika No. 15, Jakarta Selatan', NOW())
ON CONFLICT (item_id) DO NOTHING;

-- Sample Events
INSERT INTO event (event_id, title, deskripsi, kategori, tanggal, lokasi, poster, contact, created_at) VALUES
('e1111111-1111-1111-1111-111111111111', 'Sedekah Buku, Buka Jendela Dunia', 'Event ini bertujuan untuk mengajak masyarakat menyumbangkan buku layak baca untuk dibagikan kepada anak-anak di berbagai daerah. Buku yang dikumpulkan akan disalurkan ke perpustakaan sekolah di daerah terpencil.', 'Buku', '2025-01-15', 'Balai Kota Jakarta', 'event1.png', '081234567890', NOW()),
('e2222222-2222-2222-2222-222222222222', 'Donasi Pakaian Layak Pakai', 'Mari berbagi kehangatan dengan menyumbangkan pakaian layak pakai untuk saudara kita yang membutuhkan. Pakaian akan disalurkan ke panti asuhan dan masyarakat kurang mampu.', 'Pakaian', '2025-01-20', 'GOR Soemantri Brodjonegoro, Bandung', 'event_default.jpg', '081234567891', NOW()),
('e3333333-3333-3333-3333-333333333333', 'Berbagi Elektronik Bekas', 'Event pengumpulan barang elektronik bekas yang masih berfungsi untuk didistribusikan ke sekolah-sekolah yang membutuhkan. Elektronik yang diterima: laptop, tablet, proyektor, dll.', 'Elektronik', '2025-02-01', 'Kampus UGM, Yogyakarta', 'event_default.jpg', '081234567892', NOW())
ON CONFLICT (event_id) DO NOTHING;
