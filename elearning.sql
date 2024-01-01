-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2019 at 05:41 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'halo');

-- --------------------------------------------------------

--
-- Table structure for table `detail_materi`
--

CREATE TABLE `detail_materi` (
  `id_detailmateri` int(11) NOT NULL,
  `bab` varchar(255) NOT NULL,
  `usernamedosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_materi`
--

INSERT INTO `detail_materi` (`id_detailmateri`, `bab`, `usernamedosen`) VALUES
(1, 'majas', 'eve'),
(2, 'prosa', 'eve');

-- --------------------------------------------------------

--
-- Table structure for table `detail_quiz`
--

CREATE TABLE `detail_quiz` (
  `id` int(11) NOT NULL,
  `namaquiz` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `usernamedosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_quiz`
--

INSERT INTO `detail_quiz` (`id`, `namaquiz`, `jumlah`, `usernamedosen`) VALUES
(1, 'Majas', 4, 'eve'),
(2, 'Prosa', 2, 'eve');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`username`, `nama`, `password`) VALUES
('angel', 'Angela', 'elearndosen'),
('eve', 'Eve Angel', 'eve123'),
('feli', 'Felicia', 'elearndosen'),
('michele', 'Michele', 'elearndosen'),
('nadia', 'Nadia', 'elearndosen');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`username`, `nama`, `password`, `nilai`) VALUES
('c14170005', 'Kristianto Utomo', 'elearnmhs', 0),
('c14170025', 'Gede Agung', '654321', 0),
('c141800119', 'Maria Eve', 'elearnmhs', 0),
('d11180106', 'Angela Vienna', 'elearnmhs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `usernamedosen` varchar(255) NOT NULL,
  `isimateri` longtext NOT NULL,
  `id_detailmateri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `usernamedosen`, `isimateri`, `id_detailmateri`) VALUES
(1, 'eve', 'prosa adalah karya sastra', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `usernamemhs` varchar(255) NOT NULL,
  `id_detailquiz` int(11) NOT NULL,
  `nama_kuis` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `usernamemhs`, `id_detailquiz`, `nama_kuis`, `nilai`) VALUES
(1, 'c14170025', 1, 'Majas', 75),
(2, 'c14170025', 2, 'Prosa', 100),
(3, 'c14170005', 1, 'Majas', 25);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `isiquiz` longtext NOT NULL,
  `score` double NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `id_detailquiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `nomor`, `isiquiz`, `score`, `jawaban`, `id_detailquiz`) VALUES
(1, 1, 'Metafora: Pengungkapan berupa penggunaan nama untuk benda lain yang menjadi merek, ciri khas, atau atribut.\r\nApakah pernyataan tersebut benar?', 25, 'salah', 1),
(2, 2, 'Alegori: Menyatakan dengan cara lain, melalui kiasan atau penggambaran.\r\nApakah pernyataan tersebut benar?', 25, 'benar', 1),
(3, 3, 'Majas atau gaya bahasa yaitu pemanfaatan kekayaan bahasa, pemakaian ragam tertentu untuk memperoleh efek-efek tertentu yang membuat sebuah karya sastra semakin hidup, keseluruhan ciri bahasa sekelompok penulis sastra dan cara khas dalam menyampaikan pikiran dan perasaan, baik secara lisan maupun tertulis.\r\nApakah pernyataan tersebut benar?', 25, 'benar', 1),
(4, 4, 'Hipokorisme:Pengungkapan dengan menggunakan perilaku manusia yang diberikan kepada sesuatu yang bukan manusia. \r\nApakah pernyataan tersebut benar?', 25, 'salah', 1),
(5, 1, 'Menurut KBBI puisi adalah:\r\n\r\nRagam sastra yang bahasanya terikat oleh irama, matra, rima, serta penyusunan larik dan bait\r\nGubahan dalam bahasa yang bentuknya dipilih dan ditata secara cermat sehingga mempertajam kesadaran orang akan pengalaman dan membangkitkan tanggapan khusus lewat penataan bunyi, irama, dan makna khusus\r\nSajak\r\nApakah pernyataan tersebut benar?', 50, 'benar', 2),
(6, 2, 'Penekanan pada segi estetik suatu bahasa dan penggunaan sengaja pengulangan, meter, dan rima adalah yang membedakan puisi dari sajak.\r\nApakah pernyataan tersebut benar? ', 50, 'salah', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD PRIMARY KEY (`id_detailmateri`);

--
-- Indexes for table `detail_quiz`
--
ALTER TABLE `detail_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_materi`
--
ALTER TABLE `detail_materi`
  MODIFY `id_detailmateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_quiz`
--
ALTER TABLE `detail_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
