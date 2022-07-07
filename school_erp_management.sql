-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 03:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`aid`, `title`, `descr`, `added_on`, `active`) VALUES
(1, 'webinar on artificial intelligence', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. voluptas aliquid dolores reprehenderit vitae? quae consequuntur exercitationem, quibusdam aspernatur facilis quos repellat, officiis molestias, commodi impedit nisi dolor. animi, debitis est!', '2022-07-03', 1);

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
  `description` varchar(20) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='subjects in each class';

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `standard`, `subject_ids`, `description`, `total_amount`, `date_created`, `active`) VALUES
(1, 'one', '[\"1\",\"4\",\"3\"]', 'course1', 4500, '2022-07-03 12:00:28', 1),
(2, 'two', '[\"2\"]', 'new fee', 6000, '2022-07-03 12:00:28', 1),
(3, 'three', '[\"1\"]', 'course3', 4000, '2022-07-03 13:55:21', 1),
(4, 'four', '[\"2\"]', 'course4', 4000, '2022-07-03 13:56:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `course_id`, `description`, `amount`) VALUES
(1, 1, 'Tuition', 3000),
(3, 1, 'sample', 1500),
(19, 2, 'tution', 5000),
(36, 4, 'tution', 2000),
(37, 3, 'tution', 4000),
(39, 2, 'bus', 1000),
(40, 4, 'van', 2000);

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
(1, 'swaraj kumar', 'admin.org@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '-', '8002046457', '-', '2022-07-01', 1),
(2, 'samvedna gupta', 'accountant.org@gmail.com', '4cd5edcd9aa8e3aed333a5dccda30a3b4a7eeeb7', 'accountant', '-', '9955075265', '-', '2022-07-02', 1),
(3, 'shivam jaiswal', 'shivam.org@gmail.com', '61f8c88f94091bd306411cfde6711254fec07bda', 'driver', 'male', '8002046457', 'jhapan, bihar', '2022-07-08', 0),
(4, 'amaya chaudhary', 'amaya.org@gmail.com', '570a8eee40de7053bc03b927095e4982e17683fe', 'driver', 'male', '8002046457', 'chanakyapuri, bihar', '2022-07-02', 1),
(5, 'amrita panday', 'amrita.org@gmail.com', '2db56d2069bdf73a5fe128cad4b1219ee1c82de5', 'driver', 'male', '8002046457', 'ahiyapur, bihar', '2022-07-06', 1),
(6, 'shubham mishra', 'shubham.org@gmail.com', 'c250f88274cb8a75961a08502efcb7c262033c87', 'driver', 'male', '8002046457', 'ahiyapur, bihar', '2022-07-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `ef_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ef_id`, `amount`, `remarks`, `date_created`) VALUES
(9, 2, 200, 'new pay adones', '2022-06-28 18:48:57'),
(10, 1, 400, 'tution fee', '2022-06-30 20:16:41'),
(11, 3, 1000, 'dfghbht', '2022-06-30 20:47:07'),
(12, 3, 100, 'new pay', '2022-07-01 18:10:45'),
(13, 5, 1000, 'new pay', '2022-07-03 20:56:17'),
(14, 8, 6000, 'whole pay', '2022-07-03 21:23:38'),
(15, 6, 200, 'now pay', '2022-07-04 19:14:14');

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
(1, 'campus', 'bh13', 45, 1),
(2, 'campus', 'bh11', 50, 1);

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `password`, `class_id`, `phone`, `gender`, `dob`, `doj`, `address`, `active`) VALUES
(1, 'happy chaudhary', 'happy.org@gmail.com', '3978d009748ef54ad6ef7bf851bd55491b1fe6bb', 1, '8002046457', 'male', '2022-07-01', '2022-07-03', 'ahiyapur, bihar', 1),
(2, 'sudhanshu chaudhary', 'sudhanshu.org@gmail.com', '9251fe746968404db8d1223406586371959efe0f', 2, '8002046457', 'male', '2022-07-01', '2022-07-03', 'chanakyapuri, bihar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_ef_list`
--

CREATE TABLE `student_ef_list` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `ef_no` varchar(200) NOT NULL,
  `course_id` int(30) NOT NULL,
  `total_fee` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_ef_list`
--

INSERT INTO `student_ef_list` (`id`, `student_id`, `ef_no`, `course_id`, `total_fee`, `date_created`, `month`) VALUES
(2, 1, '2020-65427823', 1, 4500, '2020-10-31 13:12:13', 'jan'),
(5, 2, '2020-667586', 2, 6000, '2022-07-03 20:53:25', 'jan'),
(6, 2, '2020-66756', 1, 4500, '2022-07-03 21:02:06', 'August'),
(8, 1, '2020-87427824', 2, 6000, '2022-07-03 21:07:39', 'November'),
(10, 1, '2020-6867356', 3, 4000, '2022-07-03 21:35:01', 'September');

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

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `title`, `descr`, `code`, `credit`, `teacher_id`, `added_on`, `active`) VALUES
(1, 'geography', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. voluptas aliquid dolores reprehenderit vitae? quae consequuntur exercitationem, quibusdam aspernatur facilis quos repellat, officiis molestias, commodi impedit nisi dolor. animi, debitis est!', 'GEO1', 3, 1, '2022-07-03', 1),
(2, 'geography', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. voluptas aliquid dolores reprehenderit vitae? quae consequuntur exercitationem, quibusdam aspernatur facilis quos repellat, officiis molestias, commodi impedit nisi dolor. animi, debitis est!', 'GEO2', 4, 2, '2022-07-03', 1),
(3, 'political science', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. voluptas aliquid dolores reprehenderit vitae? quae consequuntur exercitationem, quibusdam aspernatur facilis quos repellat, officiis molestias, commodi impedit nisi dolor. animi, debitis est!', 'POL1', 2, 2, '2022-07-03', 1),
(4, 'history', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. voluptas aliquid dolores reprehenderit vitae? quae consequuntur exercitationem, quibusdam aspernatur facilis quos repellat, officiis molestias, commodi impedit nisi dolor. animi, debitis est!', 'HIST1', 1, 1, '2022-07-03', 1);

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

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `email`, `password`, `designation`, `phone`, `gender`, `doj`, `address`, `active`) VALUES
(1, 'pratyay kuila', 'pratyay.org@gmail.com', '97026e649d3a629d10dee8cbb592a492d0de9862', 'head of teacher management', '8002046457', 'male', '2022-07-03', 'west bengal, india', 1),
(2, 'anand mishra', 'anand.org@gmail.com', 'b973f774bfeab53233b4f347be114e9ca7b2d00f', 'head of timetable management', '8002046457', 'male', '2022-07-03', 'uttar pradesh, india', 1),
(3, 'sangram ray', 'sangram.org@gmail.com', '162d49ca8e94c2d87fe6d3c74fe4556f332b3cf1', 'head of syllabus management', '8002046457', 'male', '2022-07-03', 'patna, bihar', 1);

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
(1, 'bus', 'bh1728', 5, 1),
(2, 'van', 'BH1111', 4, 1);

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
-- Dumping data for table `vehicles_schedule`
--

INSERT INTO `vehicles_schedule` (`schedule_id`, `vehicle_id`, `arrival`, `departure`, `route_id`, `active`) VALUES
(1, 1, '11:20:00', '09:22:00', 1, 1),
(2, 2, '01:25:00', '09:20:00', 2, 1);

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
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  ADD PRIMARY KEY (`miscellaneous_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  MODIFY `miscellaneous_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles_schedule`
--
ALTER TABLE `vehicles_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
