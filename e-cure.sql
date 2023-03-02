-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 09:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-cure`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `id_doctor` varchar(50) NOT NULL,
  `name_doctor` varchar(225) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`id_doctor`, `name_doctor`, `spesialis`, `address`, `phone`) VALUES
('00dea765-4808-498d-be8e-63291e848489', 'Fryzna', 'Penyakit Dalam', 'Kebon Jeruk', '089604333589'),
('71ea109f-d755-4f11-9179-aed88015a56b', 'Monkey D Luffy', 'Dokter Jiwa', 'Raftel', '089604333574'),
('e97e91a6-6a0d-4433-abad-1318aa9e5fc4', 'Dwi Rahmah', 'Penyakit Anak', 'Meruya', '0896043335789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital_medicine`
--

CREATE TABLE `tbl_hospital_medicine` (
  `id` int(11) NOT NULL,
  `id_hospital` varchar(50) NOT NULL,
  `id_medicine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hospital_medicine`
--

INSERT INTO `tbl_hospital_medicine` (`id`, `id_hospital`, `id_medicine`) VALUES
(13, 'e695355e-08df-4d7b-8b0c-9e5d4821580c', 'ad24d4af-b0d2-11ed-8ce2-b4a9fcffb61c'),
(14, 'e695355e-08df-4d7b-8b0c-9e5d4821580c', 'fb7eb1b7-b0d3-11ed-8ce2-b4a9fcffb61c');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medical_record`
--

CREATE TABLE `tbl_medical_record` (
  `id_hospital` varchar(50) NOT NULL,
  `id_patient` varchar(50) NOT NULL,
  `illness` text NOT NULL,
  `id_doctor` varchar(50) NOT NULL,
  `diagnosis` text NOT NULL,
  `id_poly` varchar(50) NOT NULL,
  `check_up` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_medical_record`
--

INSERT INTO `tbl_medical_record` (`id_hospital`, `id_patient`, `illness`, `id_doctor`, `diagnosis`, `id_poly`, `check_up`) VALUES
('e695355e-08df-4d7b-8b0c-9e5d4821580c', '34cf1cd1-ed82-418a-9412-df8149f4659e', 'pusing', 'e97e91a6-6a0d-4433-abad-1318aa9e5fc4', 'istritsda', '9b8736dd-b134-11ed-8ce2-b4a9fcffb61c', '2023-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id_medicine` varchar(50) NOT NULL,
  `name_medicine` varchar(255) NOT NULL,
  `description_medicine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id_medicine`, `name_medicine`, `description_medicine`) VALUES
('0e89d473-b102-11ed-8ce2-b4a9fcffb61c', 'Baloxavir marboxil', 'Flu'),
('1645bf6b-d266-43e1-9a8a-5720ea93fad1', 'Oskadon', 'Headache'),
('50982659-b102-11ed-8ce2-b4a9fcffb61c', 'Midodrine', 'Hipotensi'),
('6b91a00e-b102-11ed-8ce2-b4a9fcffb61c', 'Ventolin', 'asthma'),
('ad24d4af-b0d2-11ed-8ce2-b4a9fcffb61c', 'Paracetamol', 'High Fever Medicine'),
('c7fc1bb4-b101-11ed-8ce2-b4a9fcffb61c', 'Angiotensin-converting enzyme', 'Hipertensi'),
('cf469727-fdd4-4a20-bbf5-7ffc8bd67548', 'Vit C', 'Vitamin C'),
('fb7eb1b7-b0d3-11ed-8ce2-b4a9fcffb61c', 'Paramex', 'Headache');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `id_patient` varchar(50) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `name_admin` varchar(255) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id_patient`, `nik`, `name_admin`, `gender`, `address`, `phone`) VALUES
('34cf1cd1-ed82-418a-9412-df8149f4659e', '41815010141', 'Chou Tzuyu', 'P', 'Seoul', '089604333575'),
('62c20641-cc31-461d-8577-8ed08ebda101', '41815010144', 'Irene', 'P', 'Permata Hijau', '089604333577'),
('895ca7af-ff15-42ed-97ba-50eb684d1bac', '41815010145', 'Yeri', 'P', 'Grogol', '089604333577'),
('ae228900-8241-4f9c-bf73-f451d01b7823', '41815010142', 'Minji', 'P', 'London', '089604335525'),
('b2a0a1ae-26b8-49d3-bfe2-331a0a11f8ff', '41815010143', 'Sila Indi', 'P', 'Palmerah', '089604333575');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poly`
--

CREATE TABLE `tbl_poly` (
  `id_poly` varchar(50) NOT NULL,
  `name_poly` varchar(50) NOT NULL,
  `place_poly` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_poly`
--

INSERT INTO `tbl_poly` (`id_poly`, `name_poly`, `place_poly`) VALUES
('45a07c9e-32ee-4833-a6ff-fa3da729c9b4', 'Poly K', 'Lantai 1'),
('9b8736dd-b134-11ed-8ce2-b4a9fcffb61c', 'Poly C', 'Lantai 8'),
('d503b3ab-97af-4057-964d-3bcb12a3fc76', 'Poly Z', 'Lantai 8'),
('ecfa9b0d-b125-11ed-8ce2-b4a9fcffb61c', 'Poly B', 'Lantai 2'),
('ffc403a5-22cd-4462-b46b-d5bbc85d9c91', 'Poly H', 'Lantai 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(50) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `name_admin`, `username`, `password`, `level`) VALUES
('0fc08115-afb1-11ed-8ce2-b4a9fcffb61c', 'Syifa Khairunnisa', 'syifa', '$2y$10$4hSMhJ4iGZ6UniDMW78JtOAv7oTyz2cgl7DlG03iByd9/ePRQ7ORq', '1'),
('7a26582f-afa7-11ed-8ce2-b4a9fcffb61c', 'Dwi Putra Bayu', 'admin', '$2y$10$oLH88W3xXef0PbrY8IOsSekHFQYQ7CJufpZv8sGyzr.bnyvTf.NVi', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indexes for table `tbl_hospital_medicine`
--
ALTER TABLE `tbl_hospital_medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medical_record` (`id_hospital`),
  ADD KEY `id_medicine` (`id_medicine`),
  ADD KEY `id_hospital` (`id_hospital`);

--
-- Indexes for table `tbl_medical_record`
--
ALTER TABLE `tbl_medical_record`
  ADD PRIMARY KEY (`id_hospital`),
  ADD UNIQUE KEY `id_patient` (`id_patient`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_poly` (`id_poly`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id_medicine`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Indexes for table `tbl_poly`
--
ALTER TABLE `tbl_poly`
  ADD PRIMARY KEY (`id_poly`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hospital_medicine`
--
ALTER TABLE `tbl_hospital_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hospital_medicine`
--
ALTER TABLE `tbl_hospital_medicine`
  ADD CONSTRAINT `tbl_hospital_medicine_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `tbl_medical_record` (`id_hospital`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hospital_medicine_ibfk_2` FOREIGN KEY (`id_medicine`) REFERENCES `tbl_medicine` (`id_medicine`);

--
-- Constraints for table `tbl_medical_record`
--
ALTER TABLE `tbl_medical_record`
  ADD CONSTRAINT `tbl_medical_record_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `tbl_patient` (`id_patient`),
  ADD CONSTRAINT `tbl_medical_record_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `tbl_doctor` (`id_doctor`),
  ADD CONSTRAINT `tbl_medical_record_ibfk_3` FOREIGN KEY (`id_poly`) REFERENCES `tbl_poly` (`id_poly`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
