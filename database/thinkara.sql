-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 03:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `email`, `password`, `user_role`, `created_at`) VALUES
(1, '1', '1@1', 'c4ca4238a0b923820dcc509a6f75849b', 'mahasiswa', '2026-04-16 07:50:35'),
(3, '2', '2@2', 'c81e728d9d4c2f636f067f89cc14862c', 'mahasiswa', '2026-04-16 19:59:33'),
(4, '3', '3@3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'mahasiswa', '2026-04-16 19:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id_latihan` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id_latihan`, `judul`, `isi`) VALUES
(1, 'Dampak Media Sosial terhadap Konsentrasi Belajar', 'Penggunaan media sosial di kalangan mahasiswa mengalami peningkatan signifikan dalam beberapa tahun terakhir, terutama sejak berkembangnya platform berbasis video pendek dan interaksi instan. Beberapa studi dalam bidang psikologi pendidikan menunjukkan bahwa paparan konten yang terus-menerus dapat menyebabkan penurunan kapasitas perhatian dan meningkatnya kecenderungan multitasking yang tidak efektif. Selain itu, notifikasi yang muncul secara berkala juga berkontribusi terhadap gangguan fokus saat proses pembelajaran berlangsung. Meskipun demikian, media sosial juga memiliki potensi sebagai sarana berbagi informasi akademik apabila digunakan secara terkontrol dan terarah.'),
(2, 'Pembelajaran Berbasis Proyek (Project-Based Learning)', 'Pendekatan pembelajaran berbasis proyek telah banyak diterapkan dalam sistem pendidikan modern untuk meningkatkan keterlibatan siswa secara aktif. Model ini menekankan pada penyelesaian masalah nyata melalui kolaborasi dan eksplorasi mandiri. Penelitian dalam bidang pendidikan menunjukkan bahwa siswa yang terlibat dalam pembelajaran berbasis proyek cenderung memiliki pemahaman konsep yang lebih mendalam dibandingkan metode ceramah tradisional. Selain itu, kemampuan berpikir kritis dan keterampilan komunikasi juga berkembang lebih baik melalui pendekatan ini karena siswa didorong untuk mengemukakan ide dan mempertahankan argumennya.'),
(3, 'E-Learning dan Efektivitas Pembelajaran', 'Perkembangan teknologi informasi telah mendorong munculnya sistem pembelajaran elektronik atau e-learning yang memungkinkan proses belajar dilakukan secara fleksibel tanpa batasan ruang dan waktu. Studi menunjukkan bahwa efektivitas e-learning sangat bergantung pada desain instruksional serta interaksi antara pengajar dan peserta didik. Tanpa adanya interaksi yang memadai, siswa cenderung mengalami penurunan motivasi dan kesulitan memahami materi secara mendalam. Namun, jika dirancang dengan baik, e-learning dapat menjadi alternatif yang efektif dalam meningkatkan aksesibilitas pendidikan.'),
(4, 'Multitasking dan Kinerja Kognitif', 'Multitasking sering dianggap sebagai kemampuan yang meningkatkan produktivitas, terutama dalam lingkungan digital yang serba cepat. Namun, penelitian dalam bidang kognitif menunjukkan bahwa otak manusia memiliki keterbatasan dalam memproses beberapa tugas kompleks secara bersamaan. Ketika seseorang mencoba melakukan multitasking, sebenarnya terjadi peralihan fokus yang cepat antar tugas, yang justru dapat menurunkan efisiensi dan meningkatkan tingkat kesalahan. Dampak ini menjadi lebih signifikan ketika tugas yang dilakukan membutuhkan konsentrasi tinggi.'),
(5, 'Perubahan Iklim dan Aktivitas Manusia', 'Perubahan iklim global merupakan salah satu tantangan terbesar yang dihadapi oleh dunia saat ini. Laporan ilmiah menunjukkan bahwa peningkatan suhu rata-rata bumi berkaitan erat dengan emisi gas rumah kaca yang dihasilkan oleh aktivitas manusia, seperti pembakaran bahan bakar fosil dan deforestasi. Dampak dari perubahan iklim ini meliputi peningkatan frekuensi bencana alam, naiknya permukaan air laut, serta gangguan terhadap ekosistem. Oleh karena itu, berbagai upaya mitigasi dan adaptasi perlu dilakukan secara kolektif untuk mengurangi dampak yang lebih besar di masa depan.');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id_leaderboard` int(11) NOT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `nama_pengguna` varchar(225) NOT NULL,
  `xp` int(25) NOT NULL,
  `skor` int(25) NOT NULL,
  `waktu_dimulai` date NOT NULL,
  `waktu_main` datetime DEFAULT current_timestamp(),
  `waktu_tercepat` time NOT NULL,
  `jenis_latihan` varchar(225) NOT NULL,
  `kode_latihan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id_leaderboard`, `id_akun`, `nama_pengguna`, `xp`, `skor`, `waktu_dimulai`, `waktu_main`, `waktu_tercepat`, `jenis_latihan`, `kode_latihan`) VALUES
(1, NULL, 'Bintang P', 15200, 4890, '2026-04-10', '2026-04-16 19:37:39', '00:05:04', 'Argument Builder', 'ab'),
(2, NULL, 'Siska Ayu', 12400, 4210, '2026-04-11', '2026-04-16 19:37:39', '00:06:16', 'Argument Builder', 'ab'),
(3, NULL, 'Riko Akbar', 11800, 3980, '2026-04-11', '2026-04-16 19:37:39', '00:06:44', 'Argument Builder', 'ab'),
(4, NULL, 'Budiman Sekti', 8900, 3750, '2026-04-12', '2026-04-16 19:37:39', '00:07:28', 'Argument Builder', 'ab'),
(7, 1, '', 160, 80, '0000-00-00', '2026-04-16 19:37:39', '00:00:01', '', ''),
(9, 3, '', 20, 10, '0000-00-00', '2026-04-16 19:59:44', '00:00:07', '', ''),
(10, 4, '', 40, 20, '0000-00-00', '2026-04-16 20:00:09', '00:00:05', '', '');

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
-- Table structure for table `soal_item`
--

CREATE TABLE `soal_item` (
  `id_item` int(11) NOT NULL,
  `id_latihan` int(11) DEFAULT NULL,
  `teks` text DEFAULT NULL,
  `tipe` enum('claim','evidence','reasoning','reference') DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal_item`
--

INSERT INTO `soal_item` (`id_item`, `id_latihan`, `teks`, `tipe`, `is_correct`) VALUES
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
(25, 5, 'Laporan ilmiah iklim', 'reference', 1),
(26, 5, 'Lingkungan harus dijaga', 'claim', 0);

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
-- Indexes for table `latihan`
--
ALTER TABLE `latihan`
  ADD PRIMARY KEY (`id_latihan`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id_leaderboard`),
  ADD UNIQUE KEY `id_akun` (`id_akun`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `npm` (`npm`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `soal_item`
--
ALTER TABLE `soal_item`
  ADD PRIMARY KEY (`id_item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `latihan`
--
ALTER TABLE `latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id_leaderboard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `soal_item`
--
ALTER TABLE `soal_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `fk_leaderboard_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `id_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
