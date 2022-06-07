-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 06:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_erp_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `credit` int(1) NOT NULL,
  `added_on` date NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='subjects information';

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `title`, `descr`, `code`, `credit`, `added_on`, `active`) VALUES
(1, 'cryptography and network security', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. doloremque amet harum eos nobis sed. animi ipsa voluptatibus aspernatur obcaecati necessitatibus!', 'CNS', 4, '2022-06-07', 1),
(2, 'data structures and algorithms', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. doloremque amet harum eos nobis sed. animi ipsa voluptatibus aspernatur obcaecati necessitatibus!', 'DSA', 3, '2022-06-07', 1),
(3, 'machine learning', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. doloremque amet harum eos nobis sed. animi ipsa voluptatibus aspernatur obcaecati necessitatibus!', 'ML', 3, '2022-06-07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
