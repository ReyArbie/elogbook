-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2022 pada 10.21
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekinerja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `approval_kegiatan` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `atasan`
--

CREATE TABLE `atasan` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama_atasan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `atasan`
--

INSERT INTO `atasan` (`id`, `nip`, `nama_atasan`) VALUES
(1, '198106062006041016', 'dr. Hadi Rahmatsyah Sumardi, MARS'),
(2, '196709031990032005', 'Rin Dwi Septarina, SKM.,M.Kes'),
(3, '197602072006041007', 'drg. Arief Sutedjo, MKM'),
(4, '198001032009021002', 'Yatna Hidayatna, S.Kep.,M.MRS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instalasi`
--

CREATE TABLE `instalasi` (
  `id` int(31) NOT NULL,
  `nama_instalasi` varchar(41) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instalasi`
--

INSERT INTO `instalasi` (`id`, `nama_instalasi`) VALUES
(1, 'Manajemen'),
(2, 'Intalasi Farmasi'),
(3, 'Intalasi Rekam Medis'),
(4, 'Intalasi Rawat Jalan'),
(5, 'Intalasi Rawat Inap'),
(6, 'Instalasi Gawat Darurat'),
(7, 'Instalasi Bedah Sentral'),
(8, 'Instalasi Radiologi'),
(9, 'Instalasi Laboratorium'),
(10, 'Instalasi Rehab Medik'),
(11, 'Instalasi Medical Check Up'),
(12, 'Unit Keuangan'),
(13, 'Unit Kepegawaian dan Umum'),
(14, 'Unit Perencanaan'),
(15, 'Unit IT'),
(16, 'Manajemen Seksi Pelayanan'),
(17, 'Manajemen Seksi Penunjang Medik dan Non M'),
(18, 'Manajemen Sub Bagian Tata Usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `level` varchar(31) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `level`, `nama_jabatan`) VALUES
(1, '1', 'Direktur'),
(2, '2', 'monitoring'),
(3, '4', 'Pranata Komputer Ahli Pertama'),
(4, '5', 'Analis Perencanaan, Evaluasi dan Pelaporan'),
(5, '5', 'Analis Hukum'),
(6, '5', 'Pengolah Informasi dan Komunikasi'),
(7, '4', 'Pranata Komputer Ahli Muda'),
(8, '2', 'Kepala Seksi Pelayanan Medik'),
(9, '2', 'Kepala Seksi Penunjang Medik dan Non Medik'),
(10, '2', 'Kepala Sub Bagian Tata Usaha'),
(11, '4', 'Perawat Ahli Pertama'),
(12, '4', 'Perawat Terampil'),
(13, '4', 'Perawat Penyelia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `uraian` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `uraian`, `jabatan`) VALUES
(1, 'Mengikuti Rapat/Kegiatan/Sosialisasi dilingkup internal', '3'),
(16, 'Mengikuti Apel/Upacara', '3'),
(17, 'Koordinasi dengan instansi atau pihak terkait', '3'),
(18, 'Mengoperasikan tools untuk membuat storyboard', '3'),
(19, 'Melakukan manipulasi data', '3'),
(20, 'Menyusun definisi sistem proyeksi pada suatu data spasial', '3'),
(21, 'Membuat peta tematik rinci', '3'),
(22, 'Melakukan pengolahan data atribut dan spasial rinci', '3'),
(23, 'Membuat program multimedia kompleks', '3'),
(24, 'Membuat flowchart untuk pemrograman multimedia', '3'),
(25, 'Melakukan editing objek multimedia kompleks dengan piranti lunak', '3'),
(26, 'Membuat objek multimedia kompleks denganpiranti lunak', '3'),
(27, 'Membuat prototype kompleks pada programmultimedia', '3'),
(28, 'Melakukan instalasi, upgrade, dan konfigurasi sistem operasi dan/atau aplikasi', '3'),
(29, 'Melakukan data crawling, data feeding, dan data loading', '3'),
(30, 'Melakukan validasi kebutuhan informasi', '3'),
(31, 'Menyusun dokumentasi pengembangan sistem informasi', '3'),
(32, 'Menyusun petunjuk operasional program aplikasi sistem informasi', '3'),
(33, 'Melakukan deteksi dan/atau perbaikan kerusakan sistem informasi', '3'),
(34, 'Melakukan uji coba sistem informasi', '3'),
(35, 'Mengembangkan program aplikasi sistem informasi', '3'),
(36, 'Membuat program aplikasi sistem informasi', '3'),
(37, 'Melakukan perancangan sistem informasi', '3'),
(38, 'Melakukan optimalisasi kinerja infrastruktur teknologi informasi', '3'),
(39, 'Menyiapkan peralatan video conference (streaming), monitoring peralatan berupa audio, video, dan perangkat jaringan serta mengatur layout', '3'),
(40, 'Menyusun prosedur pemanfaatan infrastruktur teknologi informasi', '3'),
(41, 'Melakukan deteksi dan atau perbaikan terhadap permasalahan infrastruktur teknologi informasi', '3'),
(42, 'Melakukan pengaturan akses keamanan fisik teknologi informasi', '3'),
(43, 'Mengikuti kegiatan pengembangan kompetensi, berupa pelatihan teknis/magang di bidang tugas Jabatan Fungsional Pranata Komputer dan memperoleh Sertifikat', '3'),
(44, 'Koordinasi dengan Perangkat Daerah/ di Lingkup Internal', '3'),
(45, 'Melaksanakan tinjauan dan ulasan ilmiah', '3'),
(46, 'Mengikuti Pendidikan dan Pelatihan', '3'),
(47, 'Melakukan kegiatan yang mendukung pelaksanaan tugas Pranata Komputer', '3'),
(48, 'Menjadi anggota Tim Penilai/Tim Uji Kompetensi', '3'),
(49, 'Mengajar/melatih/membimbing yang berkaitan dengan bidang teknologi informasi berbasis komputer', '3'),
(50, 'Melaksanakan kegiatan lain yang mendukung pengembangan profesi yang ditetapkan oleh Instansi Pembina di bidang teknologi informasi berbasis komputer', '3'),
(51, 'Membuat buku standar/pedoman/ petunjuk pelaksanaan/ petunjuk teknis di bidang teknologi informasi berbasis komputer', '3'),
(52, 'Melakukan pemeliharaan infrastruktur teknologi informasi', '3'),
(53, 'Melakukan pemasangan infrastruktur teknologi informasi', '3'),
(54, 'Menelaah spesifikasi teknis komponen sistem komputer', '3'),
(55, 'Mengatur alokasi area dalam media komputer', '3'),
(56, 'Membuat sistem pengamanan sistem jaringan komputer', '3'),
(57, 'Mengelola katalog layanan teknologi informasi', '3'),
(58, 'Mengembangkan dan atau meremajakan program paket', '3'),
(59, 'Melakukan verifikasi spesifikasi program', '3'),
(60, 'Membuat spesifikasi program', '3'),
(61, 'Membuat dokumentasi rincian sistem informasi', '3'),
(62, 'Mengembangkan dan atau meremajakan rancangan rinci sistem informasi', '3'),
(63, 'Membuat rancangan rinci sistem informasi', '3'),
(64, 'Membuat dokumentasi penggunaan sistem jaringan komputer', '3'),
(65, 'Membuat laporan kejanggalan (anomali) sistem jaringan komputer', '3'),
(66, 'Melakukan sistem pencarian kembali sistem jaringan komputer', '3'),
(67, 'Melakukan perbaikan kerusakan sistem jaringan komputer', '3'),
(68, 'Melakukan monitoring akses', '3'),
(69, 'Melakukan uji coba sistem operasi sistem jaringan komputer', '3'),
(70, 'Membuat sistem prosedur pemanfaatan sistem jaringan komputer', '3'),
(71, 'Menerapkan rancangan konfigurasi sistem jaringan komputer', '3'),
(72, 'Menyusun alternatif solusi permasalahan pengelolaan data', '3'),
(73, 'Melakukan pencarian kembali database', '3'),
(74, 'Melaksanakan perpindahan dari perangkat lunak database yang lama ke yang baru', '3'),
(75, 'Melaksanakan duplikasi database', '3'),
(76, 'Memantau dan mengevaluasi penggunaan database', '3'),
(77, 'Membuat otorisasi akses kepada pemakai', '3'),
(78, 'Mengatur alokasi area database dalam media komputer', '3'),
(79, 'Mengimplementasikan rancangan database', '3'),
(80, 'Membuat dokumentasi program paket', '3'),
(81, 'Membuat petunjuk operasional sistem komputer', '3'),
(82, 'Melakukan deteksi dan atau memperbaiki kerusakan sistem komputer dan atau program paket', '3'),
(83, 'Melakukan instalasi dan atau meningkatkan (up- grade) sistem komputer', '3'),
(84, 'Mengelola permintaan dan layanan teknologi informasi', '3'),
(85, 'Melakukan pemeriksaan kesesuaian antara infrastruktur teknologi informasi dengan spesifikasi teknis', '3'),
(86, 'Melakukan deteksi dan/atau perbaikan terhadap permasalahan yang terjadi pada sistem jaringan kompleks', '3'),
(87, 'Melakukan optimalisasi sistem jaringan', '3'),
(88, 'Menyusun dokumentasi penggunaan sistem jaringan komputer', '3'),
(89, 'Melakukan evaluasi uji coba sistem jaringan komputer sederhana', '3'),
(90, 'Melakukan uji coba sistem jaringan komputer kompleks', '3'),
(91, 'Menyusun prosedur pemanfaatan sistem jaringan', '3'),
(92, 'Menerapkan rancangan logis sistem pengamanan jaringan komputer kompleks', '3'),
(93, 'Menerapkan rancangan fisik sistem jaringan komputer kompleks', '3'),
(94, 'Melakukan pengumpulan data audit teknologi informasi menggunakan metode tertentu', '3'),
(95, 'Mengelola pengguna dan hak akses data', '3'),
(96, 'Melakukan deteksi dan perbaikan terhadap permasalahan teknologi data', '3'),
(97, 'Melakukan pengadministrasian teknologi data', '3'),
(98, 'Melakukan evaluasi teknologi data', '3'),
(99, 'Menyusun tingkat kinerja layanan database', '3'),
(100, 'Melakukan backup atau pemulihan data', '3'),
(101, 'Melakukan instalasi dan konfigurasi database management system', '3'),
(102, 'Menyusun dokumentasi rancangan database', '3'),
(103, 'Menyusun prosedur pengujian rancangan integrasi data', '3'),
(104, 'Melakukan implementasi rancangan integrasi data', '3'),
(105, 'Melakukan ingestion data', '3'),
(106, 'Melakukan implementasi rancangan layanan akses data', '3'),
(107, 'Melakukan perancangan layanan akses data', '3'),
(108, 'Melakukan pengumpulan kebutuhan informasi', '3'),
(109, 'Menyusun arsitektur data', '3'),
(110, 'Menyusun taksonomi data', '3'),
(111, 'Melakukan pengujian infrastruktur teknologi informasi', '3'),
(112, 'rekap data', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja`
--

CREATE TABLE `kinerja` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `uraian_kegiatan` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `foto` varchar(31) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dokumen` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kinerja`
--

INSERT INTO `kinerja` (`id`, `nama_pegawai`, `uraian_kegiatan`, `waktu`, `waktu_selesai`, `foto`, `dokumen`, `status`) VALUES
(47, 'reyvan', '112', '2022-02-16 21:29:00', '2022-02-16 21:29:00', 'Capture.PNG', 'test.txt', 1),
(49, 'Fahmi Hasydik, S.Kom', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '621443badbc44.jpg', 'test.txt', 2),
(50, 'Fahmi Hasydik, S.Kom', '33', '2022-02-17 10:00:00', '2022-02-17 12:00:00', '621391b3457d6.jpg', '17 Februrari 2022 - Revisi Stok Opname Gudang Farmasi.docx', 0),
(52, 'Fahmi Hasydik, S.Kom', '44', '2022-02-22 12:05:00', '2022-02-22 13:05:00', '62146f2eeda52.jpg', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(31) NOT NULL,
  `nama_level` varchar(31) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'Direktur'),
(2, 'Kepala Seksi / Sub Bagian'),
(3, 'Kepala Instalasi'),
(4, 'Jabatan Fungsional'),
(5, 'Jabatan Pelaksana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) NOT NULL,
  `nip` varchar(18) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `jabatan` varchar(41) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `seksi` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `instalasi` varchar(41) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `atasan` varchar(41) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `jabatan`, `seksi`, `instalasi`, `atasan`) VALUES
(1, '123', 'reyvan', '8', '1', '7', '1'),
(18, '321', 'sayah', '1', '1', '7', '1'),
(19, '199008312020121012', 'Purnama NR', '3', '3', '15', '2'),
(20, '2015010001', 'Fahmi Hasydik, S.Kom', '3', '3', '15', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seksi`
--

CREATE TABLE `seksi` (
  `id` int(31) NOT NULL,
  `nama_seksi` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seksi`
--

INSERT INTO `seksi` (`id`, `nama_seksi`) VALUES
(1, 'Seksi Pelayanan'),
(2, 'Seksi Penunjang Medik dan Non Medik'),
(3, 'Sub Bagian Tata Usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `id` int(31) NOT NULL,
  `nama_tingkat` varchar(41) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id`, `nama_tingkat`) VALUES
(1, 'admin'),
(2, 'direktur'),
(3, 'kepala'),
(4, 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(11) COLLATE latin1_general_ci NOT NULL DEFAULT 'admin',
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'nophoto.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `no_telp`, `blokir`, `id_session`, `level`, `nama_lengkap`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'N', 'gf7t9m2lb9gaftjhraouci15dk', 'admin', 'Administrator', '	nophoto.png'),
(915, '123', '32d014206260702b061b938d0d16cc80', 'rey', '456789', 'N', '6pgdvnr4t4gkkctu5sb0t5icq4', 'pegawai', 'reyvan', '	nophoto.png'),
(923, '321', 'd69e36679449550c204d015e52b270f5', '', '', 'N', 'fgf6ne9hke1793n4t9mq4cadtj', 'direktur', 'sayah', 'nophoto.png'),
(917, '199008312020121012', 'e10adc3949ba59abbe56e057f20f883e', 'purnamanr@jabarprov.go.id', '08562005424', 'N', '6ogjn1j6kvor34urrbtmi5ncbl', 'admin', 'Purnama Nur Rachman, ST', '	nophoto.png'),
(918, '2015010001', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'N', 'e22uc5995j7uremp1b3ntk9sgm', 'admin', 'Fahmi Hasydik', '	nophoto.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instalasi`
--
ALTER TABLE `instalasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `atasan`
--
ALTER TABLE `atasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `instalasi`
--
ALTER TABLE `instalasi`
  MODIFY `id` int(31) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(31) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id` int(31) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id` int(31) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=924;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
