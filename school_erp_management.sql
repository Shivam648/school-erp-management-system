-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 08:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_erp_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `aid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `added_on` date NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='announcement information';

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `absent` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='attendance of students as per class and subjects';

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `standard` varchar(255) NOT NULL,
  `subject_ids` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='subjects in each class';

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `mid_term_1` int(11) NOT NULL,
  `mid_term_2` int(11) NOT NULL,
  `end_term` int(11) NOT NULL,
  `other` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous`
--

CREATE TABLE `miscellaneous` (
  `miscellaneous_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='details of miscellaneous users';

--
-- Dumping data for table `miscellaneous`
--

INSERT INTO `miscellaneous` (`miscellaneous_id`, `name`, `email`, `password`, `category`, `gender`, `phone`, `address`, `doj`, `active`) VALUES
(1, 'swaraj kumar', 'swaraj.driver@org.gmail.com', 'e4b40af9e152a905dacf8ff8986bfbfa1ab7600e', 'driver', 'male', '8002046457', 'ahiyapur', '2022-06-01', 1),
(2, 'happy chaudhary', 'happy.driver.org@gmail.com', '3978d009748ef54ad6ef7bf851bd55491b1fe6bb', 'driver', 'male', '8002046457', 'patna', '2022-06-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `finish` varchar(255) NOT NULL,
  `fair` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `start`, `finish`, `fair`, `active`) VALUES
(2, 'campus', 'bh11', 30, 1),
(3, 'campus', 'bh14', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='student details';

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
  `teacher_id` int(11) NOT NULL,
  `added_on` date NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='subjects information';

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='teachers details';

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_type`, `vehicle_number`, `driver_id`, `active`) VALUES
(2, 'car', 'bh1727', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_schedule`
--

CREATE TABLE `vehicles_schedule` (
  `schedule_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `arrival` time NOT NULL,
  `departure` time NOT NULL,
  `route_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  ADD PRIMARY KEY (`miscellaneous_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicles_schedule`
--
ALTER TABLE `vehicles_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  MODIFY `miscellaneous_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles_schedule`
--
ALTER TABLE `vehicles_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
