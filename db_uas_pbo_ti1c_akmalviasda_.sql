-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 07:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_akmalviasda.`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('kontrak','tetap','magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KTR001', 'Andi Wijaya', 'Produksi', 22, '150000.00', 'kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('KTR002', 'Budi Santoso', 'Logistik', 20, '140000.00', 'kontrak', 6, 'PT Sumber Daya Baru', NULL, NULL, NULL, NULL),
('KTR003', 'Citra Lestari', 'Pemasaran', 21, '160000.00', 'kontrak', 12, 'PT Talent Nusantara', NULL, NULL, NULL, NULL),
('KTR004', 'Dedi Kurniawan', 'Produksi', 23, '150000.00', 'kontrak', 24, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('KTR005', 'Eka Saputra', 'Umum', 19, '135000.00', 'kontrak', 6, 'PT Sumber Daya Baru', NULL, NULL, NULL, NULL),
('KTR006', 'Fitriani', 'Administrasi', 22, '145000.00', 'kontrak', 12, 'PT Talent Nusantara', NULL, NULL, NULL, NULL),
('KTR007', 'Gilang Ramadhan', 'Logistik', 20, '140000.00', 'kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('MGN001', 'Oki Setiawan', 'IT', 18, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-01'),
('MGN002', 'Putri Handayani', 'Pemasaran', 20, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-02'),
('MGN003', 'Rian Hidayat', 'Desain Grafis', 15, '45000.00', 'magang', NULL, NULL, NULL, NULL, '1200000.00', 'CERT-KM-03'),
('MGN004', 'Siti Aminah', 'HRD', 22, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-04'),
('MGN005', 'Taufik Hidayat', 'IT', 19, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-05'),
('MGN006', 'Utari Lestari', 'Administrasi', 20, '45000.00', 'magang', NULL, NULL, NULL, NULL, '1200000.00', 'CERT-KM-06'),
('MGN007', 'Vina Amelia', 'Pemasaran', 17, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-07'),
('TTP001', 'Hendra Wijaya', 'IT', 22, '250000.00', 'tetap', NULL, NULL, '1500000.00', 'ESOP-TTP001', NULL, NULL),
('TTP002', 'Indah Permata', 'Keuangan', 21, '240000.00', 'tetap', NULL, NULL, '1200000.00', 'ESOP-TTP002', NULL, NULL),
('TTP003', 'Joko Susilo', 'HRD', 22, '230000.00', 'tetap', NULL, NULL, '1200000.00', 'ESOP-TTP003', NULL, NULL),
('TTP004', 'Kurniawati', 'IT', 20, '260000.00', 'tetap', NULL, NULL, '1500000.00', 'ESOP-TTP004', NULL, NULL),
('TTP005', 'Laksana Perdana', 'Pemasaran', 22, '220000.00', 'tetap', NULL, NULL, '1000000.00', 'ESOP-TTP005', NULL, NULL),
('TTP006', 'Megawati', 'Keuangan', 23, '240000.00', 'tetap', NULL, NULL, '1200000.00', 'ESOP-TTP006', NULL, NULL),
('TTP007', 'Nugroho', 'HRD', 21, '230000.00', 'tetap', NULL, NULL, '1200000.00', 'ESOP-TTP007', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
