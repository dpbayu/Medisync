-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medisync`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_user` varchar(100) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `profile_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_user`, `name_admin`, `email_admin`, `password_admin`, `profile_admin`) VALUES
('b4a1aa96-812c-451b-b55e-a39f730d59e4', 'Syifa Khairunnisa', 'syifa@gmail.com', '$2y$10$1XSCQ5JI5AZ5Cuz7SofBwup0ROQ2UbSFh704aZQkOoSguiy8obhzC', 'Tzuyu 4.jpg'),
('d558e35a-318d-4605-8d98-6df32b8962cf', 'Dwi Putra Bayu', 'bayu@gmail.com', '$2y$10$9iH4J36JTrQGhd.V7O4zFOutD1iEZCn1zspBgtac/BsTyTIaipvcu', 'Wallpaper 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `id_user` varchar(100) NOT NULL,
  `name_doctor` varchar(225) NOT NULL,
  `email_doctor` varchar(255) NOT NULL,
  `password_doctor` varchar(255) NOT NULL,
  `id_specialist` varchar(50) NOT NULL,
  `address_doctor` text NOT NULL,
  `phone_doctor` varchar(15) NOT NULL,
  `profile_doctor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`id_user`, `name_doctor`, `email_doctor`, `password_doctor`, `id_specialist`, `address_doctor`, `phone_doctor`, `profile_doctor`) VALUES
('34e61663-73f6-4b03-b55b-9dd48b3954a0', 'Eren Yeager', 'eren@gmail.com', '$2y$10$O10XH1rcSFFvVnEFFUMaNuIPFFyOboQSKo3UCt4SAFO7OQE3CVb8y', '1c1fb5da-cd3a-11ed-bbfa-b4a9fcffb61c', 'Konohagakure', '0896043335789', 'Wallpaper 1.jpg'),
('db881baa-cc83-43c2-85e3-98805850141b', 'Mikasa Ackerman', 'mikasa@gmail.com', '$2y$10$kaPiEnCRrLIJ0KIayEAF4.h6EWZFoj.isOSi54lWQJn6M6YZUfzd6', '1c1fb5da-cd3a-11ed-bbfa-b4a9fcffb61c', 'Cocoyashi Village', '089604333575', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital_medicine`
--

CREATE TABLE `tbl_hospital_medicine` (
  `id_hospital` varchar(50) NOT NULL,
  `id_medicine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hospital_medicine`
--

INSERT INTO `tbl_hospital_medicine` (`id_hospital`, `id_medicine`) VALUES
('12de8bd0-b5e8-4945-8149-df0eea3c8d2a', '4846759e-04ff-49ca-88ee-2977a1a21e5d'),
('12de8bd0-b5e8-4945-8149-df0eea3c8d2a', '148ff283-3687-45bb-b12b-7687fc52caaa'),
('d21f2ec7-ef05-4f0e-8dad-9611a8f46085', '09a7b207-40fe-4077-8fff-8787b6688bd0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medical_record`
--

CREATE TABLE `tbl_medical_record` (
  `id_hospital` varchar(50) NOT NULL,
  `id_patient` varchar(50) NOT NULL,
  `illness` text NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `diagnosis` text NOT NULL,
  `id_poly` varchar(50) NOT NULL,
  `check_up` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medical_record`
--

INSERT INTO `tbl_medical_record` (`id_hospital`, `id_patient`, `illness`, `id_user`, `diagnosis`, `id_poly`, `check_up`) VALUES
('12de8bd0-b5e8-4945-8149-df0eea3c8d2a', '27c636fb-3c30-4d0d-9802-7edfc4593d31', 'Fever', '34e61663-73f6-4b03-b55b-9dd48b3954a0', 'Headache', '900ff3ff-52dc-436e-9c5a-83425f37f722', '2023-05-09'),
('d21f2ec7-ef05-4f0e-8dad-9611a8f46085', '484cd4f3-575b-440d-b4ef-cfc062a487b9', 'High Blood Pressure', '34e61663-73f6-4b03-b55b-9dd48b3954a0', 'Headache', '900ff3ff-52dc-436e-9c5a-83425f37f722', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id_medicine` varchar(50) NOT NULL,
  `name_medicine` varchar(255) NOT NULL,
  `description_medicine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id_medicine`, `name_medicine`, `description_medicine`) VALUES
('09a7b207-40fe-4077-8fff-8787b6688bd0', 'Angiotensin-Converting Enzyme', 'Hypertension'),
('148ff283-3687-45bb-b12b-7687fc52caaa', 'Acetazolamide', 'Glaucoma, Epilepsy or Altitude Sickness'),
('4846759e-04ff-49ca-88ee-2977a1a21e5d', 'Abacavir', 'HIV Infection');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `id_user` varchar(100) NOT NULL,
  `name_owner` varchar(255) NOT NULL,
  `email_owner` varchar(255) NOT NULL,
  `password_owner` varchar(255) NOT NULL,
  `profile_owner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_owner`
--

INSERT INTO `tbl_owner` (`id_user`, `name_owner`, `email_owner`, `password_owner`, `profile_owner`) VALUES
('5f41259b-d1ad-11ed-b3e4-b4a9fcffb61c', 'Velika Hafiza Fatiha', 'velika@gmail.com', '$2y$10$0JiL5TqJ5/iyCZ5juWC4vOUpX7DCUU02zl3nP1ADsgCQyfXki6Jri', 'Tzuyu 2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `id_patient` varchar(50) NOT NULL,
  `nik_patient` varchar(30) NOT NULL,
  `name_patient` varchar(255) NOT NULL,
  `gender_patient` varchar(10) NOT NULL,
  `address_patient` text NOT NULL,
  `phone_patient` varchar(15) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `blood_patient` varchar(2) NOT NULL,
  `religion_patient` varchar(255) NOT NULL,
  `marriage_patient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id_patient`, `nik_patient`, `name_patient`, `gender_patient`, `address_patient`, `phone_patient`, `birth_date`, `birth_place`, `blood_patient`, `religion_patient`, `marriage_patient`) VALUES
('27c636fb-3c30-4d0d-9802-7edfc4593d31', '41815010140', 'Chou Tzuyu', 'Woman', 'Busan', '089604333578', '1998-11-15', 'Seoul', 'A', 'Islam', 'Not Married'),
('484cd4f3-575b-440d-b4ef-cfc062a487b9', '41815010141', 'Chris Prattt', 'Man', 'Jakarta', '089604333589', '1991-10-29', 'Singapura', 'B', 'Chatolic', 'Married');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poly`
--

CREATE TABLE `tbl_poly` (
  `id_poly` varchar(50) NOT NULL,
  `name_poly` varchar(50) NOT NULL,
  `place_poly` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_poly`
--

INSERT INTO `tbl_poly` (`id_poly`, `name_poly`, `place_poly`) VALUES
('48519f64-c564-46e9-9cca-25e0b23cccdf', 'Pediatric Poly', '1'),
('900ff3ff-52dc-436e-9c5a-83425f37f722', 'General Poly', '2'),
('959e3ca9-402b-43ea-83d2-fc87f477fb5d', 'E.N.T', '1'),
('d4d133a4-d585-4c29-8cdf-e6046bd968d5', 'Dentistry Poly', '4'),
('fc7924e9-01ff-46fb-bde3-a25e487a14b2', 'Infection Poly', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialist`
--

CREATE TABLE `tbl_specialist` (
  `id_specialist` varchar(50) NOT NULL,
  `name_specialist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_specialist`
--

INSERT INTO `tbl_specialist` (`id_specialist`, `name_specialist`) VALUES
('1c1fb5da-cd3a-11ed-bbfa-b4a9fcffb61c', 'Neurologist'),
('1c1fbfe2-cd3a-11ed-bbfa-b4a9fcffb61c', 'Pediatrician'),
('1eff1a2a-50f7-4a33-a6ea-c4a524340997', 'Neurosurgery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `role`) VALUES
('34e61663-73f6-4b03-b55b-9dd48b3954a0', 'eren@gmail.com', 'Doctor'),
('5f41259b-d1ad-11ed-b3e4-b4a9fcffb61c', 'velika@gmail.com', 'Owner'),
('b4a1aa96-812c-451b-b55e-a39f730d59e4', 'syifa@gmail.com', 'Admin'),
('d558e35a-318d-4605-8d98-6df32b8962cf', 'bayu@gmail.com', 'Admin'),
('db881baa-cc83-43c2-85e3-98805850141b', 'mikasa@gmail.com', 'Doctor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD KEY `id_specialist` (`id_specialist`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_hospital_medicine`
--
ALTER TABLE `tbl_hospital_medicine`
  ADD KEY `id_medical_record` (`id_hospital`),
  ADD KEY `id_medicine` (`id_medicine`),
  ADD KEY `id_hospital` (`id_hospital`);

--
-- Indexes for table `tbl_medical_record`
--
ALTER TABLE `tbl_medical_record`
  ADD PRIMARY KEY (`id_hospital`),
  ADD UNIQUE KEY `id_patient` (`id_patient`),
  ADD KEY `id_doctor` (`id_user`),
  ADD KEY `id_poly` (`id_poly`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id_medicine`);

--
-- Indexes for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `tbl_specialist`
--
ALTER TABLE `tbl_specialist`
  ADD PRIMARY KEY (`id_specialist`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD CONSTRAINT `tbl_doctor_ibfk_1` FOREIGN KEY (`id_specialist`) REFERENCES `tbl_specialist` (`id_specialist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_doctor_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tbl_medical_record_ibfk_3` FOREIGN KEY (`id_poly`) REFERENCES `tbl_poly` (`id_poly`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_medical_record_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_doctor` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD CONSTRAINT `tbl_owner_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
