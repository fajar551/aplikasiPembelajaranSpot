-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 03:14 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idGuru` int(10) NOT NULL,
  `idMapel` varchar(10) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `namaGuru` varchar(35) NOT NULL,
  `password` varchar(40) NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idGuru`, `idMapel`, `NIP`, `namaGuru`, `password`, `noHP`, `alamat`) VALUES
(2, 'IPA-01', '198704252015122001', 'Crystal Widjaja, M.M.', 'crystal', '087829743123', 'Jl. Cihampelas No.160'),
(3, 'IPA-01', '2', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idKelas` int(10) NOT NULL,
  `namaKelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `namaKelas`) VALUES
(1, 'X IPA 1'),
(2, 'X IPA 2'),
(3, 'X IPA 3'),
(4, 'XI IPA 1'),
(5, 'XI IPA 2'),
(6, 'XI IPA 3'),
(7, 'XII IPA 1'),
(8, 'XII IPA 2'),
(9, 'XII IPA 3');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `idKontrak` int(10) NOT NULL,
  `idKelas` int(10) NOT NULL,
  `idMapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `idMapel` varchar(10) NOT NULL,
  `namaMapel` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`idMapel`, `namaMapel`) VALUES
('IPA-01', 'Kimia'),
('IPA-02', 'Fisika'),
('IPA-03', 'Biologi'),
('IPA-04', 'Matematika'),
('IPA-05', 'Bahasa Indonesia'),
('IPA-06', 'Bahasa Inggris'),
('IPA-07', 'Bahasa Sunda'),
('IPA-08', 'Olahraga'),
('IPA-09', 'Pendidikan Agama'),
('IPA-10', 'Pendidikan Pancasila dan Kewarganegaraan');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `idMateri` int(10) NOT NULL,
  `idGuru` int(10) NOT NULL,
  `judulFile` text NOT NULL,
  `deskripsi` text,
  `lokasiFile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idNilai` int(10) NOT NULL,
  `idSiswa` int(10) NOT NULL,
  `idGuru` int(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nilai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` int(10) NOT NULL,
  `idKelas` int(10) NOT NULL,
  `NIS` varchar(30) NOT NULL,
  `namaSiswa` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamatSiswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `idKelas`, `NIS`, `namaSiswa`, `password`, `alamatSiswa`) VALUES
(1, 1, '112208801', 'Ziady Mubaraq', 'ziady', 'Jl. Negla Gg. Al Ikhlas No.21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`),
  ADD KEY `fk_idMapel` (`idMapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idKelas`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`idKontrak`),
  ADD KEY `fk_idKelas` (`idKelas`),
  ADD KEY `fk_idMapel1` (`idMapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`idMapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`idMateri`),
  ADD KEY `fk_idGuru` (`idGuru`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idNilai`),
  ADD KEY `fk_idSiswa` (`idSiswa`),
  ADD KEY `fk_idGuru1` (`idGuru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`),
  ADD KEY `fk_idKelas1` (`idKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idGuru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idKelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `idKontrak` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `idMateri` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idNilai` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idSiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_idMapel` FOREIGN KEY (`idMapel`) REFERENCES `mapel` (`idMapel`) ON DELETE CASCADE;

--
-- Constraints for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `fk_idKelas` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_idMapel1` FOREIGN KEY (`idMapel`) REFERENCES `mapel` (`idMapel`) ON DELETE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_idGuru` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_idGuru1` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_idSiswa` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_idKelas1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
