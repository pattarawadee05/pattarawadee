-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 11:05 AM
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
-- Database: `4055db`
--
CREATE DATABASE IF NOT EXISTS `4055db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4055db`;

-- --------------------------------------------------------

--
-- Table structure for table `appication`
--

CREATE TABLE `appication` (
  `r_id` int(6) NOT NULL,
  `r_position` varchar(255) NOT NULL,
  `r_title` varchar(255) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_birthday` varchar(255) NOT NULL,
  `r_education` varchar(255) NOT NULL,
  `r_experience` varchar(255) NOT NULL,
  `r_skills` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appication`
--

INSERT INTO `appication` (`r_id`, `r_position`, `r_title`, `r_name`, `r_birthday`, `r_education`, `r_experience`, `r_skills`) VALUES
(1, 'Digital Marketer', 'นางสาว', 'ภัทรวดี ขามประโคน', '2025-12-14', 'ปริญญาตรี', 'ไม่มี', 'ตัดต่อวิดีโอ');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(6) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` int(20) NOT NULL,
  `r_height` int(6) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_birthday` varchar(255) NOT NULL,
  `r_color` varchar(255) NOT NULL,
  `r_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_height`, `r_address`, `r_birthday`, `r_color`, `r_major`) VALUES
(1, 'ภัทรวดี ขามประโคน', 828532900, 0, '', '', '', ''),
(2, 'ภัทรวดี ขามประโคน', 828532900, 0, '', '', '', ''),
(3, 'ภัทรวดี ขามประโคน', 828532900, 160, '', '2025-12-20', '#97e7f2', 'คอมพิวเตอร์ธุรกิจ'),
(4, 'ภัทรวดี ขามประโคน', 828532900, 160, '', '2025-12-19', '#9acdf4', 'คอมพิวเตอร์ธุรกิจ'),
(5, 'ภัทรวดี ขามประโคน', 828532900, 160, 'หมู่ 8', '2025-12-19', '#9acdf4', 'คอมพิวเตอร์ธุรกิจ'),
(6, 'ภัทรวดี ขามประโคน', 828532900, 160, 'หมู่ 8', '2025-12-20', '#95d7f4', 'คอมพิวเตอร์ธุรกิจ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appication`
--
ALTER TABLE `appication`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appication`
--
ALTER TABLE `appication`
  MODIFY `r_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
