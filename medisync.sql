-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 04:52 PM
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
('b4a1aa96-812c-451b-b55e-a39f730d59e4', 'Syifa Khairunnisa', 'syifa@gmail.com', '$2y$10$1XSCQ5JI5AZ5Cuz7SofBwup0ROQ2UbSFh704aZQkOoSguiy8obhzC', 'Anya-taylor.jpg'),
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
('34e61663-73f6-4b03-b55b-9dd48b3954a0', 'Eren Yeager', 'eren@gmail.com', '$2y$10$aez/ChGleX5a979ZOg0yI.78WfMkwpIpMFrAK44xvC0nJRSKSX1q2', '1c1fbfe2-cd3a-11ed-bbfa-b4a9fcffb61c', 'Konohagakure', '0896043335789', 'Eren 1.jpg'),
('db881baa-cc83-43c2-85e3-98805850141b', 'Mikasa Ackerman', 'mikasa@gmail.com', '$2y$10$t.sEtq4DP5sg7SOlEbNwReJDaz.BztT1RTq8emQwlSwcwCsiuOEuO', '1c1fb5da-cd3a-11ed-bbfa-b4a9fcffb61c', 'Cocoyashi Village', '089604333575', 'Mikasa 1.jpg');

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
('48451e86-08d3-483d-bb6a-e2d6e696260c', '148ff283-3687-45bb-b12b-7687fc52caaa'),
('48451e86-08d3-483d-bb6a-e2d6e696260c', '09a7b207-40fe-4077-8fff-8787b6688bd0');

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
('48451e86-08d3-483d-bb6a-e2d6e696260c', '5a1994bb-0250-4aa3-beba-29447311f064', 'Fever', '34e61663-73f6-4b03-b55b-9dd48b3954a0', 'Flu', '900ff3ff-52dc-436e-9c5a-83425f37f722', '2023-05-30');

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
('09a7b207-40fe-4077-8fff-8787b6688bd0', 'Paracetamol', 'Fever'),
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
  `email_patient` varchar(255) NOT NULL,
  `password_patient` varchar(255) NOT NULL,
  `gender_patient` varchar(10) NOT NULL,
  `address_patient` text NOT NULL,
  `phone_patient` varchar(15) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `blood_patient` varchar(2) NOT NULL,
  `religion_patient` varchar(255) NOT NULL,
  `marriage_patient` varchar(255) NOT NULL,
  `profile_patient` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id_patient`, `nik_patient`, `name_patient`, `email_patient`, `password_patient`, `gender_patient`, `address_patient`, `phone_patient`, `birth_date`, `birth_place`, `blood_patient`, `religion_patient`, `marriage_patient`, `profile_patient`) VALUES
('5a1994bb-0250-4aa3-beba-29447311f064', '41815010140', 'Chou Tzuyu', 'tzuyu@gmail.com', '$2y$10$2p1M7GVp2FOnEhA6hjLzROe1mBlfvdZoLuIJHgVauoSfxqxjV3hxi', 'Woman', 'Taipei, Taiwan', '089604333578', '1994-10-29', 'New Taipei', 'B', 'Christian', 'Not Married', 'Tzuyu 1.jpg'),
('77083b9b-2ff7-4ae3-b32d-7303cccb6e68', '41815010120', 'Winter', 'winter@gmail.com', '$2y$10$jmJiB2TcA8m5u9ywoQ61FOIk3qToOBvA5QaT4lcKmMq6j7jy15Pv2', 'Woman', 'Paris, France', '089604333523', '2000-05-15', 'Kuala Lumpur', 'O', 'Islam', 'Not Married', 'Winter 1.jpg'),
('daf90ef9-5c75-4353-95a9-e9af018788f2', '41815010130', 'Irene', 'irene@gmail.com', '$2y$10$iirGZJYn6S/0HFkMA6gpgOHVjnLHQ/HzIxHGakQLr24Pjafs16SQu', 'Woman', 'Milan, Italy', '089604333526', '1991-02-20', 'Venice', 'AB', 'Hindu', 'Not Married', 'Irene 1.jpg');

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
('5a1994bb-0250-4aa3-beba-29447311f064', 'tzuyu@gmail.com', 'Patient'),
('5f41259b-d1ad-11ed-b3e4-b4a9fcffb61c', 'velika@gmail.com', 'Owner'),
('77083b9b-2ff7-4ae3-b32d-7303cccb6e68', 'winter@gmail.com', 'Patient'),
('b4a1aa96-812c-451b-b55e-a39f730d59e4', 'syifa@gmail.com', 'Admin'),
('d558e35a-318d-4605-8d98-6df32b8962cf', 'bayu@gmail.com', 'Admin'),
('daf90ef9-5c75-4353-95a9-e9af018788f2', 'irene@gmail.com', 'Patient'),
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

--
-- Constraints for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD CONSTRAINT `tbl_patient_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
