-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 07:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgn_ykpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_datakaryawan`
--

CREATE TABLE `tbl_datakaryawan` (
  `id_karyawan` varchar(90) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_datakaryawan`
--

INSERT INTO `tbl_datakaryawan` (`id_karyawan`, `nama_karyawan`, `nik`, `status`, `agama`, `pendidikan`, `jabatan`, `bagian`, `no_telp`, `email`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tanggal_masuk`, `foto`) VALUES
('PG20200700000', 'Aditya vicky hernawan', '1928374658102938', 'Ya', 'Islam', 'S3', 'JB0007', 'D01', '0812345678901', 'admin@gmail.com', 'Jakarta', 'Laki-Laki', 'Jakarta', '2001-12-19', '2020-03-01', '1619067285.jpg'),
('PG20210400004', 'nisa fajrianingsih', '5684658786123490', 'Ya', 'Islam', 'S3', 'JB0005', 'D05', '085442115683', 'nisapajri@gmail.com', 'cibarusah 2 bogor', 'Perempuan', 'cibarusah', '2001-06-01', '2021-04-01', '1619170482.jpg'),
('PG20210400005', 'munadi bahari', '7898765439876549', 'Ya', 'Islam', 'S1', 'JB0007', 'D03', '087654567654', 'munadi@gmail.com', 'tanjungsari cariu 2', 'Laki-Laki', 'cisada', '2001-11-07', '2021-04-21', '1618988263.jpg'),
('PG20210400006', 'Supri Izhar', '1983758476958473', 'Tidak', 'Islam', 'S1', 'JB0008', 'D07', '085776859456', 'supri@gmail.com', 'harvest city blok c2 no 14', 'Laki-Laki', 'bandung', '2000-03-08', '2021-04-23', '1619170697.jpg'),
('PG20210500007', 'budi utomo', '7384938274637280', 'Tidak', 'Islam', 'SMK', 'JB0003', 'D06', '021383768321', 'budi@gmail.com', 'tasikmalaya kampung cibaduyut', 'Laki-Laki', 'tasikmalaya', '2001-10-02', '2021-05-03', '1619966357.png'),
('PG20210500008', 'rahmat darmawan', '1324567653546789', 'Tidak', 'Islam', 'S1', 'JB0003', 'D06', '087654324234', 'rahmat@gmail.com', 'bekasi kampung sawah', 'Laki-Laki', 'bekasi', '2001-10-24', '2021-05-03', '1620009153.jpg'),
('PG20230100009', 'kuniawan santiaji', '3245533455677644', 'Ya', 'Islam', 'S3', 'JB0001', 'D01', '089775676876', 'kurniawan.santiaji@pertamina.c', 'jl rawa engkek nomer 45', 'Laki-Laki', 'palembang', '2001-12-28', '2023-01-01', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `id_divisi` varchar(10) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`id_divisi`, `divisi`) VALUES
('D01', 'Human Resource Development'),
('D02', 'Produksi'),
('D03', 'Marketing'),
('D04', 'Gudang'),
('D05', 'Keuangan'),
('D06', 'IT'),
('D07', 'Direktur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gajian`
--

CREATE TABLE `tbl_gajian` (
  `id_gajian` int(11) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tunjangan_jabatan` varchar(20) NOT NULL,
  `tunjangan` varchar(50) NOT NULL,
  `potongan` varchar(50) NOT NULL,
  `gaji_bersih` varchar(50) NOT NULL,
  `tgl_gajian` varchar(10) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gajian`
--

INSERT INTO `tbl_gajian` (`id_gajian`, `gaji_pokok`, `tunjangan_jabatan`, `tunjangan`, `potongan`, `gaji_bersih`, `tgl_gajian`, `id_karyawan`) VALUES
(1, '4,000,000', '0', '0', '0', '4,000,000', '2021-04-25', 'PG20200700000'),
(2, '2,500,000', '0', '0', '100,000', '2,400,000', '2021-04-25', 'PG20210400004'),
(3, '4,000,000', '0', '25,000', '0', '4,025,000', '2021-04-25', 'PG20210400006'),
(4, '2,500,000', '0', '25,000', '0', '2,525,000', '2021-05-25', 'PG20210500007'),
(5, '2,500,000', '0', '25,000', '0', '2,525,000', '2021-05-25', 'PG20210500008');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `tunjangan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tunjangan`) VALUES
('JB0001', 'Kepala HRD', 4000000, 0),
('JB0002', 'Manager Proyek', 4000000, 0),
('JB0003', 'Staff', 2500000, 0),
('JB0004', 'Mandor Proyek', 2000000, 0),
('JB0005', 'Staff Administrator', 2500000, 0),
('JB0006', 'Satpam', 2000000, 0),
('JB0007', 'Manajer', 3000000, 0),
('JB0008', 'Direktur Utama', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komponen`
--

CREATE TABLE `tbl_komponen` (
  `id_komponen` int(11) NOT NULL,
  `id_tunjangan` varchar(10) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komponen`
--

INSERT INTO `tbl_komponen` (`id_komponen`, `id_tunjangan`, `id_karyawan`) VALUES
(1, 'T001', 'PG20200800001'),
(2, 'T009', 'PG20200800001'),
(3, 'T006', 'PG20200800002'),
(10, 'T001', 'PG20200800002'),
(12, 'T001', 'PG20200800003'),
(13, 'T004', 'PG20200800003'),
(16, 'T009', 'PG20200800003'),
(17, 'T004', 'PG20210400004'),
(18, 'T003', 'PG20210400006'),
(19, 'T003', 'PG20210500007'),
(20, 'T003', 'PG20210500008');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pernikahan`
--

CREATE TABLE `tbl_pernikahan` (
  `id_status` varchar(10) NOT NULL,
  `nama_status` varchar(20) NOT NULL,
  `jumlah_tanggungan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pernikahan`
--

INSERT INTO `tbl_pernikahan` (`id_status`, `nama_status`, `jumlah_tanggungan`) VALUES
('K01', 'Belum Menikah', 0),
('K02', 'Menikah', 1),
('K03', 'Menikah Anak 1', 2),
('K04', 'Menikah Anak 2', 3),
('K05', 'Menikah Anak > 2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pola`
--

CREATE TABLE `tbl_pola` (
  `id_pola` int(11) NOT NULL,
  `tgl_kerja` date NOT NULL,
  `id_karyawan` varchar(15) NOT NULL,
  `id_shift` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pola`
--

INSERT INTO `tbl_pola` (`id_pola`, `tgl_kerja`, `id_karyawan`, `id_shift`, `status`) VALUES
(103, '2021-04-27', 'PG20210400004', 'S002', 'Hadir'),
(104, '2021-04-28', 'PG20210400004', 'S002', 'Hadir'),
(105, '2021-04-29', 'PG20210400004', 'S002', ''),
(106, '2021-04-30', 'PG20210400004', 'S002', 'Hadir'),
(107, '2021-05-01', 'PG20210400004', 'S002', 'Hadir'),
(108, '2021-05-02', 'PG20210400004', 'S002', ''),
(109, '2021-05-03', 'PG20210400004', 'S002', ''),
(110, '2021-05-04', 'PG20210400004', 'S002', ''),
(111, '2021-05-05', 'PG20210400004', 'S002', ''),
(112, '2021-05-06', 'PG20210400004', 'S002', 'Hadir'),
(113, '2021-05-07', 'PG20210400004', 'S002', ''),
(114, '2021-05-08', 'PG20210400004', 'S002', ''),
(115, '2021-05-09', 'PG20210400004', 'S002', ''),
(116, '2021-05-10', 'PG20210400004', 'S002', ''),
(117, '2021-05-11', 'PG20210400004', 'S002', ''),
(118, '2021-05-12', 'PG20210400004', 'S002', ''),
(119, '2021-05-13', 'PG20210400004', 'S002', ''),
(120, '2021-05-14', 'PG20210400004', 'S002', ''),
(121, '2021-05-15', 'PG20210400004', 'S002', ''),
(122, '2021-05-16', 'PG20210400004', 'S002', ''),
(123, '2021-05-17', 'PG20210400004', 'S002', ''),
(124, '2021-05-18', 'PG20210400004', 'S002', ''),
(125, '2021-05-19', 'PG20210400004', 'S002', ''),
(126, '2021-05-20', 'PG20210400004', 'S002', ''),
(127, '2021-05-21', 'PG20210400004', 'S002', ''),
(128, '2021-05-22', 'PG20210400004', 'S002', ''),
(129, '2021-05-23', 'PG20210400004', 'S002', 'Hadir'),
(130, '2021-05-24', 'PG20210400004', 'S002', ''),
(131, '2021-05-25', 'PG20210400004', 'S002', ''),
(132, '2021-04-27', 'PG20210400006', 'S001', 'Hadir'),
(133, '2021-04-28', 'PG20210400006', 'S001', 'Hadir'),
(134, '2021-04-29', 'PG20210400006', 'S001', ''),
(135, '2021-04-30', 'PG20210400006', 'S001', 'Hadir'),
(136, '2021-05-01', 'PG20210400006', 'S001', 'Hadir'),
(137, '2021-05-02', 'PG20210400006', 'S001', ''),
(138, '2021-05-03', 'PG20210400006', 'S001', ''),
(139, '2021-05-04', 'PG20210400006', 'S001', ''),
(140, '2021-05-05', 'PG20210400006', 'S001', ''),
(141, '2021-05-06', 'PG20210400006', 'S001', 'Hadir'),
(142, '2021-05-07', 'PG20210400006', 'S001', ''),
(143, '2021-05-08', 'PG20210400006', 'S001', ''),
(144, '2021-05-09', 'PG20210400006', 'S001', ''),
(145, '2021-05-10', 'PG20210400006', 'S001', ''),
(146, '2021-05-11', 'PG20210400006', 'S001', ''),
(147, '2021-05-12', 'PG20210400006', 'S001', ''),
(148, '2021-05-13', 'PG20210400006', 'S001', ''),
(149, '2021-05-14', 'PG20210400006', 'S001', ''),
(150, '2021-05-15', 'PG20210400006', 'S001', ''),
(151, '2021-05-16', 'PG20210400006', 'S001', ''),
(152, '2021-05-17', 'PG20210400006', 'S001', ''),
(153, '2021-05-18', 'PG20210400006', 'S001', ''),
(154, '2021-05-19', 'PG20210400006', 'S001', ''),
(155, '2021-05-20', 'PG20210400006', 'S001', ''),
(156, '2021-05-21', 'PG20210400006', 'S001', ''),
(157, '2021-05-22', 'PG20210400006', 'S001', ''),
(158, '2021-05-23', 'PG20210400006', 'S001', 'Hadir'),
(159, '2021-05-24', 'PG20210400006', 'S001', ''),
(160, '2021-05-25', 'PG20210400006', 'S001', ''),
(161, '2021-04-27', 'PG20200700000', 'S003', 'Alpa'),
(162, '2021-04-28', 'PG20200700000', 'S003', 'Hadir'),
(163, '2021-04-29', 'PG20200700000', 'S003', ''),
(164, '2021-04-30', 'PG20200700000', 'S003', 'Hadir'),
(165, '2021-05-01', 'PG20200700000', 'S003', 'Hadir'),
(166, '2021-05-02', 'PG20200700000', 'S003', ''),
(167, '2021-05-03', 'PG20200700000', 'S003', ''),
(168, '2021-05-04', 'PG20200700000', 'S003', ''),
(169, '2021-05-05', 'PG20200700000', 'S003', ''),
(170, '2021-05-06', 'PG20200700000', 'S003', 'Hadir'),
(171, '2021-05-07', 'PG20200700000', 'S003', ''),
(172, '2021-05-08', 'PG20200700000', 'S003', ''),
(173, '2021-05-09', 'PG20200700000', 'S003', ''),
(174, '2021-05-10', 'PG20200700000', 'S003', ''),
(175, '2021-05-11', 'PG20200700000', 'S003', ''),
(176, '2021-05-12', 'PG20200700000', 'S003', ''),
(177, '2021-05-13', 'PG20200700000', 'S003', ''),
(178, '2021-05-14', 'PG20200700000', 'S003', ''),
(179, '2021-05-15', 'PG20200700000', 'S003', ''),
(180, '2021-05-16', 'PG20200700000', 'S003', ''),
(181, '2021-05-17', 'PG20200700000', 'S003', ''),
(182, '2021-05-18', 'PG20200700000', 'S003', ''),
(183, '2021-05-19', 'PG20200700000', 'S003', ''),
(184, '2021-05-20', 'PG20200700000', 'S003', ''),
(185, '2021-05-21', 'PG20200700000', 'S003', ''),
(186, '2021-05-22', 'PG20200700000', 'S003', ''),
(187, '2021-05-23', 'PG20200700000', 'S003', 'Hadir'),
(188, '2021-05-24', 'PG20200700000', 'S003', ''),
(189, '2021-05-25', 'PG20200700000', 'S003', ''),
(190, '2021-05-03', 'PG20210500007', 'S004', ''),
(191, '2021-05-04', 'PG20210500007', 'S004', ''),
(192, '2021-05-05', 'PG20210500007', 'S004', ''),
(193, '2021-05-06', 'PG20210500007', 'S004', ''),
(194, '2021-05-07', 'PG20210500007', 'S004', ''),
(195, '2021-05-08', 'PG20210500007', 'S004', ''),
(196, '2021-05-09', 'PG20210500007', 'S004', ''),
(197, '2021-05-10', 'PG20210500007', 'S004', ''),
(198, '2021-05-11', 'PG20210500007', 'S004', ''),
(199, '2021-05-12', 'PG20210500007', 'S004', ''),
(200, '2021-05-13', 'PG20210500007', 'S004', ''),
(201, '2021-05-14', 'PG20210500007', 'S004', ''),
(202, '2021-05-15', 'PG20210500007', 'S004', ''),
(203, '2021-05-16', 'PG20210500007', 'S004', ''),
(204, '2021-05-17', 'PG20210500007', 'S004', ''),
(205, '2021-05-18', 'PG20210500007', 'S004', ''),
(206, '2021-05-19', 'PG20210500007', 'S004', ''),
(207, '2021-05-20', 'PG20210500007', 'S004', ''),
(208, '2021-05-21', 'PG20210500007', 'S004', ''),
(209, '2021-05-22', 'PG20210500007', 'S004', ''),
(210, '2021-05-23', 'PG20210500007', 'S004', 'Hadir'),
(211, '2021-05-24', 'PG20210500007', 'S004', ''),
(212, '2021-05-25', 'PG20210500007', 'S004', ''),
(213, '2021-05-03', 'PG20210500008', 'S005', 'Hadir'),
(214, '2021-05-04', 'PG20210500008', 'S005', ''),
(215, '2021-05-05', 'PG20210500008', 'S005', ''),
(216, '2021-05-06', 'PG20210500008', 'S005', ''),
(217, '2021-05-07', 'PG20210500008', 'S005', ''),
(218, '2021-05-08', 'PG20210500008', 'S005', ''),
(219, '2021-05-09', 'PG20210500008', 'S005', ''),
(220, '2021-05-10', 'PG20210500008', 'S005', ''),
(221, '2021-05-11', 'PG20210500008', 'S005', ''),
(222, '2021-05-12', 'PG20210500008', 'S005', ''),
(223, '2021-05-13', 'PG20210500008', 'S005', ''),
(224, '2021-05-14', 'PG20210500008', 'S005', ''),
(225, '2021-05-15', 'PG20210500008', 'S005', ''),
(226, '2021-05-16', 'PG20210500008', 'S005', ''),
(227, '2021-05-17', 'PG20210500008', 'S005', ''),
(228, '2021-05-18', 'PG20210500008', 'S005', ''),
(229, '2021-05-19', 'PG20210500008', 'S005', ''),
(230, '2021-05-20', 'PG20210500008', 'S005', ''),
(231, '2021-05-21', 'PG20210500008', 'S005', ''),
(232, '2021-05-22', 'PG20210500008', 'S005', ''),
(233, '2021-05-23', 'PG20210500008', 'S005', 'Hadir'),
(234, '2021-05-24', 'PG20210500008', 'S005', ''),
(235, '2021-05-25', 'PG20210500008', 'S005', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `id_shift` varchar(10) NOT NULL,
  `nama_shift` varchar(50) NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `jam_keluar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shift`
--

INSERT INTO `tbl_shift` (`id_shift`, `nama_shift`, `jam_masuk`, `jam_keluar`) VALUES
('S001', 'jam kerja supri izhar', '09:00', '17:00'),
('S002', 'jam kerja navyra', '08:00', '16:00'),
('S003', 'jam kerja adit', '08:00', '16:00'),
('S004', 'jam kerja budi', '08:00', '16:00'),
('S005', 'nama jam kerja rahmat', '07:00', '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tunjangan`
--

CREATE TABLE `tbl_tunjangan` (
  `id_tunjangan` varchar(10) NOT NULL,
  `nama_tunjangan` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tunjangan`
--

INSERT INTO `tbl_tunjangan` (`id_tunjangan`, `nama_tunjangan`, `nominal`, `jenis`) VALUES
('T001', 'Tunjangan Jabatan', 0, 'Tunjangan'),
('T002', 'Tunjangan transportasi', 40000, 'Tunjangan'),
('T003', 'Tunjangan makan', 25000, 'Tunjangan'),
('T004', 'Tunjangan BPJS', 100000, 'Potongan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` varchar(10) NOT NULL,
  `id_karyawan` varchar(15) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `id_karyawan`, `username`, `password`, `status`) VALUES
('U001', 'PG20200700000', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('U002', 'PG20210400004', 'nisa', '5fad30428811fe378fd389cd7659a33c', 'Member'),
('U003', 'PG20210400005', 'munadi', 'a6d91358169c3540346213cbcb439322', 'Member'),
('U004', 'PG20210400006', 'supri', 'd79444495ba8886c397b418227564d3f', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_datakaryawan`
--
ALTER TABLE `tbl_datakaryawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tbl_gajian`
--
ALTER TABLE `tbl_gajian`
  ADD PRIMARY KEY (`id_gajian`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_komponen`
--
ALTER TABLE `tbl_komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `tbl_pernikahan`
--
ALTER TABLE `tbl_pernikahan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_pola`
--
ALTER TABLE `tbl_pola`
  ADD PRIMARY KEY (`id_pola`);

--
-- Indexes for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `tbl_tunjangan`
--
ALTER TABLE `tbl_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gajian`
--
ALTER TABLE `tbl_gajian`
  MODIFY `id_gajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_komponen`
--
ALTER TABLE `tbl_komponen`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pola`
--
ALTER TABLE `tbl_pola`
  MODIFY `id_pola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
