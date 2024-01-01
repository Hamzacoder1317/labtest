-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 12:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labtest_inventry_emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `user_paswword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `admin_email`, `user_paswword`) VALUES
(1, 'hamza', 'hamza@gmail.com', 'hamza123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `Emp_Id` int(11) NOT NULL,
  `Emp_Name` varchar(255) NOT NULL,
  `Emp_Department` varchar(255) NOT NULL,
  `Emp_Position` varchar(255) NOT NULL,
  `Emp_Number` bigint(11) NOT NULL,
  `Emp_Cnic_No` bigint(13) NOT NULL,
  `Emp_Email` varchar(255) DEFAULT 'Nill',
  `Emp_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `Emp_Id`, `Emp_Name`, `Emp_Department`, `Emp_Position`, `Emp_Number`, `Emp_Cnic_No`, `Emp_Email`, `Emp_Address`) VALUES
(3, 1003, 'Bob Johnson', 'Finance', 'Financial Analyst', 5556667777, 5556667777888, 'bob.johnson@example.com', '789 Pine Lane, City C'),
(4, 1004, 'Emily Brown', 'Marketing', 'Marketing Specialist', 1112223333, 1112223333444, 'emily.brown@example.com', '987 Elm Street, City D'),
(5, 1005, 'Michael Davis', 'Sales', 'Sales Representative', 4445556666, 4445556666777, 'michael.davis@example.com', '654 Birch Road, City E'),
(6, 1006, 'Sophia Wilson', 'IT', 'Systems Analyst', 9998887777, 9998887777666, 'sophia.wilson@example.com', '321 Cedar Lane, City F'),
(7, 1007, 'William Turner', 'Finance', 'Finance Manager', 7778889999, 7778889999111, 'william.turner@example.com', '852 Maple Avenue, City G'),
(8, 1008, 'Olivia White', 'HR', 'HR Specialist', 6665554444, 6665554444222, 'olivia.white@example.com', '456 Pine Lane, City H'),
(9, 1009, 'Daniel Smith', 'Marketing', 'Marketing Manager', 3332221111, 3332221111999, 'daniel.smith@example.com', '789 Oak Street, City I'),
(10, 1010, 'Ava Davis', 'Sales', 'Sales Manager', 2223334444, 2223334444555, 'ava.davis@example.com', '147 Walnut Road, City J');

-- --------------------------------------------------------

--
-- Table structure for table `inventry`
--

CREATE TABLE `inventry` (
  `id` int(11) NOT NULL,
  `inv_Equipment_Name` varchar(255) NOT NULL,
  `inv_Make` varchar(255) NOT NULL,
  `inv_Model` varchar(255) NOT NULL,
  `inv_Serial` varchar(255) NOT NULL,
  `inv_Specification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventry`
--

INSERT INTO `inventry` (`id`, `inv_Equipment_Name`, `inv_Make`, `inv_Model`, `inv_Serial`, `inv_Specification`) VALUES
(1, 'Laptop', 'Dell', 'Latitude E7470', 'ABC123456', 'Intel Core i5, 8GB RAM, 256GB SSD'),
(2, 'Printer', 'HP', 'LaserJet Pro M402n', 'XYZ789012', 'Monochrome Laser, Network Ready'),
(3, 'Scanner', 'Epson', 'Perfection V600', 'DEF345678', 'High-quality scanning, 6400 dpi resolution'),
(4, 'Projector', 'Sony', 'VPL-HW45ES', 'GHI901234', '1080p Full HD, 1800 lumens'),
(5, 'Server', 'Lenovo', 'ThinkSystem SR650', 'JKL567890', 'Dual Intel Xeon, 32GB RAM, 1TB HDD'),
(6, 'Camera', 'Canon', 'EOS 5D Mark IV', 'MNO123456', '30.4MP, 4K video, Full-frame CMOS sensor'),
(7, 'Tablet', 'Samsung', 'Galaxy Tab S7', 'PQR789012', '11-inch display, 128GB storage'),
(8, 'Router', 'Cisco', 'ISR 1100 Series', 'STU345678', 'Gigabit Ethernet, VPN support'),
(9, 'Monitor', 'LG', '27GL83A-B', 'VWX901234', '27-inch QHD IPS, 144Hz refresh rate'),
(10, 'Switch', 'Netgear', 'GS308', 'YZA567890', '8-port Gigabit Ethernet switch'),
(11, 'Laptop', 'Dell', 'Latitude E7470', 'ABC123456', 'Intel Core i5, 8GB RAM, 256GB SSD'),
(12, 'Printer', 'HP', 'LaserJet Pro M402n', 'XYZ789012', 'Monochrome Laser, Network Ready'),
(13, 'Scanner', 'Epson', 'Perfection V600', 'DEF345678', 'High-quality scanning, 6400 dpi resolution'),
(14, 'Projector', 'Sony', 'VPL-HW45ES', 'GHI901234', '1080p Full HD, 1800 lumens'),
(15, 'Server', 'Lenovo', 'ThinkSystem SR650', 'JKL567890', 'Dual Intel Xeon, 32GB RAM, 1TB HDD'),
(16, 'Camera', 'Canon', 'EOS 5D Mark IV', 'MNO123456', '30.4MP, 4K video, Full-frame CMOS sensor'),
(17, 'Tablet', 'Samsung', 'Galaxy Tab S7', 'PQR789012', '11-inch display, 128GB storage'),
(18, 'Router', 'Cisco', 'ISR 1100 Series', 'STU345678', 'Gigabit Ethernet, VPN support'),
(19, 'Monitor', 'LG', '27GL83A-B', 'VWX901234', '27-inch QHD IPS, 144Hz refresh rate');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `user_paswword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `User_email`, `user_paswword`) VALUES
(1, 'Jasir', 'jasir@gmail.com', 'jasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Emp_Cnic_No` (`Emp_Cnic_No`),
  ADD UNIQUE KEY `Emp_Number` (`Emp_Number`);

--
-- Indexes for table `inventry`
--
ALTER TABLE `inventry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventry`
--
ALTER TABLE `inventry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
