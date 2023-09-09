CREATE DATABASE perpustakaan;

USE perpustakaan;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    universitas VARCHAR(255) NOT NULL,
    alamat TEXT
);
