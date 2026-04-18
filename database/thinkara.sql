-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2026 at 02:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thinkara`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` enum('admin','dosen','mahasiswa') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `email`, `password`, `user_role`, `created_at`, `is_active`) VALUES
(1, '1', '1@1', 'c4ca4238a0b923820dcc509a6f75849b', 'mahasiswa', '2026-04-16 07:50:35', 1),
(3, '2', '2@2', 'c81e728d9d4c2f636f067f89cc14862c', 'mahasiswa', '2026-04-16 19:59:33', 1),
(4, '3', '3@3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'mahasiswa', '2026-04-16 19:59:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_sesi_latihan`
--

CREATE TABLE `hasil_sesi_latihan` (
  `id_hasil_latihan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `xp` int(25) NOT NULL,
  `skor` int(25) NOT NULL,
  `waktu_dimulai` datetime NOT NULL,
  `durasi` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id_latihan` int(11) NOT NULL,
  `nama_latihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id_latihan`, `nama_latihan`) VALUES
(1, 'Argument Builder'),
(2, 'Fallacy Finder'),
(3, 'Fix the Argument'),
(4, 'Gamified QTE');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_siswa` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `npm` varchar(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `jenjang` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_siswa`, `id_akun`, `npm`, `nama_mahasiswa`, `jenis_kelamin`, `jenjang`, `tanggal_lahir`, `instansi`) VALUES
(1, 1, '1', '1', 'Laki-laki', 'sifo', '2026-04-16', '1'),
(3, 3, '2', '2', NULL, NULL, NULL, NULL),
(4, 4, '3', '3', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `isi_soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_latihan`, `topik`, `isi_soal`) VALUES
(1, 1, 'Dampak Media Sosial terhadap Konsentrasi Belajar', 'Penggunaan media sosial di kalangan mahasiswa mengalami peningkatan signifikan dalam beberapa tahun terakhir, terutama sejak berkembangnya platform berbasis video pendek dan interaksi instan. Beberapa studi dalam bidang psikologi pendidikan menunjukkan bahwa paparan konten yang terus-menerus dapat menyebabkan penurunan kapasitas perhatian dan meningkatnya kecenderungan multitasking yang tidak efektif. Selain itu, notifikasi yang muncul secara berkala juga berkontribusi terhadap gangguan fokus saat proses pembelajaran berlangsung. Meskipun demikian, media sosial juga memiliki potensi sebagai sarana berbagi informasi akademik apabila digunakan secara terkontrol dan terarah.'),
(2, 1, 'Pembelajaran Berbasis Proyek (Project-Based Learning)', 'Pendekatan pembelajaran berbasis proyek telah banyak diterapkan dalam sistem pendidikan modern untuk meningkatkan keterlibatan siswa secara aktif. Model ini menekankan pada penyelesaian masalah nyata melalui kolaborasi dan eksplorasi mandiri. Penelitian dalam bidang pendidikan menunjukkan bahwa siswa yang terlibat dalam pembelajaran berbasis proyek cenderung memiliki pemahaman konsep yang lebih mendalam dibandingkan metode ceramah tradisional. Selain itu, kemampuan berpikir kritis dan keterampilan komunikasi juga berkembang lebih baik melalui pendekatan ini karena siswa didorong untuk mengemukakan ide dan mempertahankan argumennya.'),
(3, 1, 'E-Learning dan Efektivitas Pembelajaran', 'Perkembangan teknologi informasi telah mendorong munculnya sistem pembelajaran elektronik atau e-learning yang memungkinkan proses belajar dilakukan secara fleksibel tanpa batasan ruang dan waktu. Studi menunjukkan bahwa efektivitas e-learning sangat bergantung pada desain instruksional serta interaksi antara pengajar dan peserta didik. Tanpa adanya interaksi yang memadai, siswa cenderung mengalami penurunan motivasi dan kesulitan memahami materi secara mendalam. Namun, jika dirancang dengan baik, e-learning dapat menjadi alternatif yang efektif dalam meningkatkan aksesibilitas pendidikan.'),
(4, 1, 'Multitasking dan Kinerja Kognitif', 'Multitasking sering dianggap sebagai kemampuan yang meningkatkan produktivitas, terutama dalam lingkungan digital yang serba cepat. Namun, penelitian dalam bidang kognitif menunjukkan bahwa otak manusia memiliki keterbatasan dalam memproses beberapa tugas kompleks secara bersamaan. Ketika seseorang mencoba melakukan multitasking, sebenarnya terjadi peralihan fokus yang cepat antar tugas, yang justru dapat menurunkan efisiensi dan meningkatkan tingkat kesalahan. Dampak ini menjadi lebih signifikan ketika tugas yang dilakukan membutuhkan konsentrasi tinggi.'),
(5, 1, 'Perubahan Iklim dan Aktivitas Manusia', 'Perubahan iklim global merupakan salah satu tantangan terbesar yang dihadapi oleh dunia saat ini. Laporan ilmiah menunjukkan bahwa peningkatan suhu rata-rata bumi berkaitan erat dengan emisi gas rumah kaca yang dihasilkan oleh aktivitas manusia, seperti pembakaran bahan bakar fosil dan deforestasi. Dampak dari perubahan iklim ini meliputi peningkatan frekuensi bencana alam, naiknya permukaan air laut, serta gangguan terhadap ekosistem. Oleh karena itu, berbagai upaya mitigasi dan adaptasi perlu dilakukan secara kolektif untuk mengurangi dampak yang lebih besar di masa depan.');

-- --------------------------------------------------------

--
-- Table structure for table `soal_item_builder`
--

CREATE TABLE `soal_item_builder` (
  `id_item_builder` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `isi_item` text NOT NULL,
  `tipe` enum('claim','evidence','reasoning','reference') NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal_item_builder`
--

INSERT INTO `soal_item_builder` (`id_item_builder`, `id_soal`, `isi_item`, `tipe`, `is_correct`) VALUES
(1, 1, 'Media sosial dapat menurunkan konsentrasi belajar mahasiswa', 'claim', 1),
(2, 1, 'Paparan konten terus-menerus menurunkan perhatian', 'evidence', 1),
(3, 1, 'Notifikasi menyebabkan gangguan fokus', 'reasoning', 1),
(4, 1, 'Studi psikologi pendidikan', 'reference', 1),
(5, 1, 'Media sosial membuat mahasiswa kreatif', 'claim', 0),
(6, 1, 'Banyak mahasiswa online setiap hari', 'evidence', 0),
(7, 2, 'Project-Based Learning meningkatkan pemahaman', 'claim', 1),
(8, 2, 'Penelitian menunjukkan pemahaman lebih baik', 'evidence', 1),
(9, 2, 'Siswa aktif menyelesaikan masalah', 'reasoning', 1),
(10, 2, 'Penelitian pendidikan modern', 'reference', 1),
(11, 2, 'Siswa suka kerja kelompok', 'claim', 0),
(12, 3, 'E-learning efektif jika dirancang baik', 'claim', 1),
(13, 3, 'Efektivitas tergantung interaksi', 'evidence', 1),
(14, 3, 'Kurangnya interaksi menurunkan motivasi', 'reasoning', 1),
(15, 3, 'Studi e-learning', 'reference', 1),
(16, 3, 'Internet mempermudah hidup', 'claim', 0),
(17, 4, 'Multitasking menurunkan kinerja', 'claim', 1),
(18, 4, 'Otak terbatas memproses banyak tugas', 'evidence', 1),
(19, 4, 'Peralihan fokus menurunkan efisiensi', 'reasoning', 1),
(20, 4, 'Penelitian kognitif', 'reference', 1),
(21, 4, 'Produktivitas itu penting', 'claim', 0),
(22, 5, 'Aktivitas manusia menyebabkan perubahan iklim', 'claim', 1),
(23, 5, 'Gas rumah kaca meningkatkan suhu bumi', 'evidence', 1),
(24, 5, 'Gas menjebak panas di atmosfer', 'reasoning', 1),
(25, 5, 'Laporan ilmiah iklim', 'reference', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soal_item_fallacy`
--

CREATE TABLE `soal_item_fallacy` (
  `id_item_fallacy` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jenis_kesalahan` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `hasil_sesi_latihan`
--
ALTER TABLE `hasil_sesi_latihan`
  ADD PRIMARY KEY (`id_hasil_latihan`),
  ADD KEY `id_latihan` (`id_latihan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `latihan`
--
ALTER TABLE `latihan`
  ADD PRIMARY KEY (`id_latihan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `npm` (`npm`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_latihan` (`id_latihan`);

--
-- Indexes for table `soal_item_builder`
--
ALTER TABLE `soal_item_builder`
  ADD PRIMARY KEY (`id_item_builder`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `soal_item_fallacy`
--
ALTER TABLE `soal_item_fallacy`
  ADD PRIMARY KEY (`id_item_fallacy`),
  ADD KEY `id_soal` (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_sesi_latihan`
--
ALTER TABLE `hasil_sesi_latihan`
  MODIFY `id_hasil_latihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latihan`
--
ALTER TABLE `latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `soal_item_builder`
--
ALTER TABLE `soal_item_builder`
  MODIFY `id_item_builder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `soal_item_fallacy`
--
ALTER TABLE `soal_item_fallacy`
  MODIFY `id_item_fallacy` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_sesi_latihan`
--
ALTER TABLE `hasil_sesi_latihan`
  ADD CONSTRAINT `hasil_sesi_latihan_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_sesi_latihan_ibfk_2` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id_latihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `id_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `id_latihan` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id_latihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal_item_builder`
--
ALTER TABLE `soal_item_builder`
  ADD CONSTRAINT `id_soal` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal_item_fallacy`
--
ALTER TABLE `soal_item_fallacy`
  ADD CONSTRAINT `soal_item_fallacy_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
