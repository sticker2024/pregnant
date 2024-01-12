-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 02:45 PM
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
-- Database: `pregnant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admitedin`
--

CREATE TABLE `admitedin` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Sector` varchar(255) NOT NULL,
  `Village` varchar(255) NOT NULL,
  `LastMenstrualPeriod` date NOT NULL,
  `ExpectedDueDate` date NOT NULL,
  `NumberOfBirth` int(11) NOT NULL,
  `BloodGroup` varchar(5) NOT NULL,
  `MedicalHistory` text DEFAULT NULL,
  `AdmissionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Room` varchar(255) NOT NULL,
  `TransferStatus` varchar(20) DEFAULT 'Not Transferred'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admitedin`
--

INSERT INTO `admitedin` (`id`, `FirstName`, `LastName`, `ContactNumber`, `Sector`, `Village`, `LastMenstrualPeriod`, `ExpectedDueDate`, `NumberOfBirth`, `BloodGroup`, `MedicalHistory`, `AdmissionDate`, `Room`, `TransferStatus`) VALUES
(1, 'TUMUKUNDE', 'Esperance', '0792643522', 'RUHAHA', 'KIBOGA', '2024-01-09', '2024-01-10', 3, 'AB+', 'she  45 kg\r\n', '2024-01-12 11:28:31', 'ROOM55', 'Transferred'),
(2, 'MUKAMWIZA', 'Aline', '0786297917', 'KINDAMA', 'GATANGA', '2024-01-09', '2024-01-26', 3, 'B+', 'SHE HAVE LOW TEMPERATURE AT 34 CELSIUS DEGREE\r\n', '2024-01-12 11:30:19', 'ROOM54', 'Not Transferred'),
(3, 'MUKAMWIZA', 'Aline', '0786297917', 'NYAGATARE', 'KIGALI', '2024-01-17', '2024-01-27', 1, 'AB-', 'SHE IS STRUGGLING WITH HEAD ACHE\r\n', '2024-01-12 11:32:04', 'ROOM22', 'Not Transferred'),
(4, 'BETI', 'UWAJE', '0786297917', 'nyamirambo', 'GATARE', '2024-01-25', '2024-01-12', 2, 'A+', 'SHE HAS 100 KG ', '2024-01-12 11:33:07', 'ROOM44', 'Not Transferred'),
(5, 'BETIMAKIZO', 'UWAJENEZA', '0786297917', 'RUHAHA', 'GIKONGORO', '2024-01-28', '2024-01-25', 2, 'O+', 'NO SYMPTOMS ', '2024-01-12 11:35:30', 'ROOM11', 'Not Transferred'),
(6, 'TUMUKUNDE', 'Esperance', '0792643522', 'RUHUHA', 'rukagaga', '2024-01-22', '2024-01-23', 1, 'A+', 'NO SYMPTOMS ', '2024-01-12 11:36:31', 'ROOM 111', 'Not Transferred'),
(7, 'TUMUKUNDE', 'Esperance', '0792643522', 'RUHUHA', 'rukagaga', '2024-01-17', '2024-01-23', 1, 'A+', 'SHE HAS 98 KG\r\n', '2024-01-12 11:37:52', 'ROOM 111', 'Not Transferred'),
(8, 'MUKAMWIZA', 'Aline pet', '0792643522', 'RUHAHA', 'GATARE', '2024-01-20', '2024-01-30', 4, 'B-', 'NO SYMPTOMS ', '2024-01-12 11:38:58', 'ROOM9', 'Not Transferred');

-- --------------------------------------------------------

--
-- Table structure for table `admitedout`
--

CREATE TABLE `admitedout` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `LastMenstrualPeriod` date NOT NULL,
  `ExpectedDueDate` date NOT NULL,
  `NumberOfBirth` varchar(15) NOT NULL,
  `TransferDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `BloodGroup` varchar(5) NOT NULL,
  `MedicalHistory` text NOT NULL,
  `Sector` varchar(255) DEFAULT NULL,
  `Village` varchar(255) DEFAULT NULL,
  `LocationTransferred` varchar(255) DEFAULT NULL,
  `TransferStatus` varchar(20) DEFAULT 'Not Transferred'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admitedout`
--

INSERT INTO `admitedout` (`id`, `FirstName`, `LastName`, `ContactNumber`, `LastMenstrualPeriod`, `ExpectedDueDate`, `NumberOfBirth`, `TransferDate`, `BloodGroup`, `MedicalHistory`, `Sector`, `Village`, `LocationTransferred`, `TransferStatus`) VALUES
(1, 'TUMUKUNDE', 'Esperance', '0792643522', '2024-01-09', '2024-01-10', '3', '2024-01-12 13:37:37', 'AB+', 'she  45 kg\r\n', '0', 'KIBOGA', 'NYAMATA HOSPITAL', 'Not Transferred');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `degree` varchar(10) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `telephone`, `gender`, `degree`, `userType`, `password`) VALUES
(1, ' HAKIZIMANA', 'Jerome', 'jeromehakizimana01@gmail.com', '0786297917', 'male', 'PhD', 'Manager', '$2y$10$l0UfJzvFzjlDclgV680zdeHglVBdJXPO.vRsvCVPRw/fsYxpVT7B2'),
(2, 'HAKIZIMANA', 'Jerome', 'jeromehakizimana01@gmail.com', '0786297917', 'male', 'A0', 'Admin', '$2y$10$xOa44N8f68VYJt9JWhgwke1B6NdryzlmH9dCbqpznrsWygraF8AHu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admitedin`
--
ALTER TABLE `admitedin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admitedout`
--
ALTER TABLE `admitedout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admitedin`
--
ALTER TABLE `admitedin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admitedout`
--
ALTER TABLE `admitedout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
