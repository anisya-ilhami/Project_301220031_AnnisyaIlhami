-- SQL Struktur Database PT. Berlian Tahu Tempe
-- Silakan import ke phpMyAdmin

CREATE DATABASE IF NOT EXISTS berlian_tahu_tempe;
USE berlian_tahu_tempe;

-- Tabel user
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    level ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    kota VARCHAR(100),
    status ENUM('on', 'off') DEFAULT 'on'
);

-- Tabel kategori
CREATE TABLE kategori (
    kategori_id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    status ENUM('on', 'off') DEFAULT 'on'
);

-- Tabel barang
CREATE TABLE barang (
    barang_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    kategori_id INT NOT NULL,
    gambar VARCHAR(150),
    stok INT DEFAULT 0,
    status ENUM('on', 'off') DEFAULT 'on',
    FOREIGN KEY (kategori_id) REFERENCES kategori(kategori_id)
);

-- Tabel banner
CREATE TABLE banner (
    banner_id INT AUTO_INCREMENT PRIMARY KEY,
    banner VARCHAR(100) NOT NULL,
    gambar VARCHAR(150),
    link VARCHAR(500),
    status ENUM('ON', 'OFF') DEFAULT 'ON'
);

-- Tabel pesanan
CREATE TABLE pesanan (
    pesanan_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'proses', 'selesai', 'batal') DEFAULT 'pending',
    kota_id INT,
    nama_penerima VARCHAR(100),
    alamat VARCHAR(255),
    nomor_telp VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

-- Tabel pesanan_detail
CREATE TABLE pesanan_detail (
    pesanan_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    pesanan_id INT NOT NULL,
    barang_id INT NOT NULL,
    jumlah INT NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(pesanan_id),
    FOREIGN KEY (barang_id) REFERENCES barang(barang_id)
);

-- Tabel konfirmasi_pembayaran
CREATE TABLE konfirmasi_pembayaran (
    konfirmasi_id INT AUTO_INCREMENT PRIMARY KEY,
    pesanan_id INT NOT NULL,
    nama_account VARCHAR(100) NOT NULL,
    nomor_rek VARCHAR(50) NOT NULL,
    tanggal_transfer DATE NOT NULL,
    gambar VARCHAR(150),
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(pesanan_id)
);

-- (Opsional) Tabel kota jika ingin data kota lebih terstruktur
CREATE TABLE kota (
    kota_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kota VARCHAR(100) NOT NULL
); 