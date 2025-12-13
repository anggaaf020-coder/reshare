/*
  # ReShare Database Schema - Production Ready
  
  ## Overview
  Complete database schema for ReShare platform with proper security and relationships.
  
  ## Tables Created
  
  ### 1. users
  - id (uuid, primary key)
  - nama (text) - User's full name
  - email (text, unique) - User's email address
  - password (text) - Hashed password
  - nomor (text) - Phone number
  - created_at (timestamptz) - Account creation timestamp
  
  ### 2. item
  - item_id (uuid, primary key)
  - user_id (uuid, foreign key) - References user who donated
  - nama_barang (text) - Item name
  - deskripsi (text) - Full description
  - deskripsi_singkat (text) - Short description for list view
  - kategori (text) - Category: Pakaian, Elektronik, Rumah Tangga, Buku
  - kondisi (text) - Condition: Seperti Baru, Bagus, Layak Pakai
  - foto (text) - Photo filename
  - status (text) - Status: tersedia, diambil
  - alamat (text) - Donor's address
  - created_at (timestamptz)
  
  ### 3. transaksi
  - id (uuid, primary key)
  - item_id (uuid, foreign key) - Item being transferred
  - donor_id (uuid, foreign key) - User who donated
  - penerima_id (uuid, foreign key) - User who collected
  - tanggal (timestamptz) - Transaction date
  
  ### 4. event
  - event_id (uuid, primary key)
  - title (text) - Event title
  - deskripsi (text) - Event description
  - kategori (text) - Event category
  - tanggal (date) - Event date
  - lokasi (text) - Event location
  - poster (text) - Poster image filename
  - contact (text) - Contact number
  - created_at (timestamptz)
  
  ## Security
  - RLS enabled on all tables
  - Policies for authenticated users to manage their own data
  - Public read access for items and events
  - Restricted write access based on ownership
*/

-- Create users table
CREATE TABLE IF NOT EXISTS users (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  nama text NOT NULL,
  email text UNIQUE NOT NULL,
  password text NOT NULL,
  nomor text NOT NULL,
  created_at timestamptz DEFAULT now()
);

-- Create item table
CREATE TABLE IF NOT EXISTS item (
  item_id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id uuid NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  nama_barang text NOT NULL,
  deskripsi text NOT NULL,
  deskripsi_singkat text NOT NULL,
  kategori text NOT NULL,
  kondisi text NOT NULL,
  foto text NOT NULL DEFAULT 'default.jpg',
  status text DEFAULT 'tersedia',
  alamat text NOT NULL,
  created_at timestamptz DEFAULT now()
);

-- Create transaksi table
CREATE TABLE IF NOT EXISTS transaksi (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  item_id uuid NOT NULL REFERENCES item(item_id) ON DELETE CASCADE,
  donor_id uuid NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  penerima_id uuid NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  tanggal timestamptz DEFAULT now()
);

-- Create event table
CREATE TABLE IF NOT EXISTS event (
  event_id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  title text NOT NULL,
  deskripsi text NOT NULL,
  kategori text NOT NULL,
  tanggal date NOT NULL,
  lokasi text NOT NULL,
  poster text NOT NULL DEFAULT 'event_default.jpg',
  contact text NOT NULL,
  created_at timestamptz DEFAULT now()
);

-- Enable RLS on all tables
ALTER TABLE users ENABLE ROW LEVEL SECURITY;
ALTER TABLE item ENABLE ROW LEVEL SECURITY;
ALTER TABLE transaksi ENABLE ROW LEVEL SECURITY;
ALTER TABLE event ENABLE ROW LEVEL SECURITY;

-- Users policies
CREATE POLICY "Users can view all profiles"
  ON users FOR SELECT
  USING (true);

CREATE POLICY "Users can update own profile"
  ON users FOR UPDATE
  USING (id = (current_setting('app.user_id', true))::uuid)
  WITH CHECK (id = (current_setting('app.user_id', true))::uuid);

-- Item policies
CREATE POLICY "Anyone can view items"
  ON item FOR SELECT
  USING (true);

CREATE POLICY "Users can insert own items"
  ON item FOR INSERT
  WITH CHECK (user_id = (current_setting('app.user_id', true))::uuid);

CREATE POLICY "Users can update own items"
  ON item FOR UPDATE
  USING (user_id = (current_setting('app.user_id', true))::uuid)
  WITH CHECK (user_id = (current_setting('app.user_id', true))::uuid);

CREATE POLICY "Users can delete own items"
  ON item FOR DELETE
  USING (user_id = (current_setting('app.user_id', true))::uuid);

-- Transaksi policies
CREATE POLICY "Users can view own transactions"
  ON transaksi FOR SELECT
  USING (donor_id = (current_setting('app.user_id', true))::uuid OR penerima_id = (current_setting('app.user_id', true))::uuid);

CREATE POLICY "Users can create transactions"
  ON transaksi FOR INSERT
  WITH CHECK (penerima_id = (current_setting('app.user_id', true))::uuid);

-- Event policies
CREATE POLICY "Anyone can view events"
  ON event FOR SELECT
  USING (true);

-- Create indexes
CREATE INDEX IF NOT EXISTS idx_item_user_id ON item(user_id);
CREATE INDEX IF NOT EXISTS idx_item_status ON item(status);
CREATE INDEX IF NOT EXISTS idx_item_kategori ON item(kategori);
CREATE INDEX IF NOT EXISTS idx_transaksi_donor ON transaksi(donor_id);
CREATE INDEX IF NOT EXISTS idx_transaksi_penerima ON transaksi(penerima_id);
CREATE INDEX IF NOT EXISTS idx_transaksi_item ON transaksi(item_id);