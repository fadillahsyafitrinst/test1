-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 07:12 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `sinopsis` varchar(300) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `penulis`, `penerbit`, `genre`, `sinopsis`, `stok`, `harga`) VALUES
('DM001', 'SHERLOCK HOLMES', 'Sir Arthur Conan Doyle', 'Gramedia Utama', 'Detektif dan Misteri', 'Film Sherlock Holmes diawali dengan kisah di tahun 1891. Di mana Sherlock Holmes (Robert Downey, Jr.) dan partnernya, Dr.John Watson (Jude law) menyelesaikan kasus pembunuhan seorang wanita', 'Sedikit (<10)', 175000),
('FA001', 'Harry Potter and the Philosopher Stone', 'J. K. Rowling', 'Gramedia Utama', 'Fantasi', 'Harry Potter adalah seorang anak yang tampaknya biasa, hidup dengan keluarga yang berhubungan darah dengan-nya, keluarga Dursley di Surrey. Pada ulang tahunnya yang kesebelas, Harry mengetahui dari seorang asing misterius, Rubeus Hagrid, bahwa ia sebenarnya seorang penyihir, terkenal di Dunia sihir', 'Sedang (>20)', 130000),
('HO001', 'Keluarga Tak Kasatmata', 'Bonaventura Genta', 'GagasMedia', 'Horor', 'Suara ribut memaksa saya keluar dari ruangan. Saya menajamkan telinga, berusaha mencari asal suara itu. Di luar gelap, tak ada cahaya sama sekali. Refleks tangan ini mengambil ponsel dari saku celana dan menyalakan flash. Jantung serasa mencelus saat samar-samar terlihat seorang wanita berwajah Erop', 'Banyak (>30)', 85000),
('KO001', 'Doraemon', 'Fujiko F. Fujio', 'Shogakukan', 'Komik', 'Doraemon dikirim untuk menolong Nobita agar keturunan Nobita dapat menikmati kesuksesannya daripada harus menderita dari utang finansial yang akan terjadi pada masa depan yang disebabkan karena kebodohan Nobita.', 'Banyak (>30)', 65000),
('RO001', 'Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 'Basmala dan Republika', 'Romance', 'Ini adalah kisah cinta. Tapi bukan cuma sekadar kisah cinta yang biasa. Ini tentang bagaimana menghadapi turun-naiknya persoalan hidup dengan cara Islam. Fahri bin Abdillah adalah pelajar Indonesia yang berusaha menggapai gelar masternya di Al-Azhar. Berjibaku dengan panas-debu Mesir', 'Sedang (>20)', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
