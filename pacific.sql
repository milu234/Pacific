-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 03:41 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacific`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) UNSIGNED NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assignment_marks` int(11) NOT NULL,
  `date_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_of_submission` datetime NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `assignment_type` varchar(255) NOT NULL,
  `description_of_assignment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `assignment_name`, `assignment_marks`, `date_of_creation`, `date_of_submission`, `user_id`, `class_id`, `assignment_type`, `description_of_assignment`) VALUES
(35, 'Caesar Cipher', 30, '2018-10-17 07:19:13', '2018-10-22 17:55:00', 37, 3, 'document', 'Do It in Python'),
(36, 'Round Robin', 30, '2018-10-17 07:21:12', '2018-10-17 17:55:00', 37, 4, 'document', 'jbckabckbcb'),
(37, 'Diagonal Differnce', 30, '2018-10-17 09:04:30', '2018-10-25 17:00:00', 40, 3, 'document', 'Use Python'),
(38, 'New Assignment Posted', 20, '2018-10-18 10:50:31', '2018-01-02 00:01:00', 40, 2, 'code', 'Do it as soon as possible');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_evaluation`
--

CREATE TABLE `assignment_evaluation` (
  `assignment_evaluation_id` int(11) NOT NULL,
  `assignment_marks` int(11) NOT NULL,
  `assignment_comments` varchar(255) NOT NULL,
  `assignment_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `pdf_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_evaluation`
--

INSERT INTO `assignment_evaluation` (`assignment_evaluation_id`, `assignment_marks`, `assignment_comments`, `assignment_id`, `user_id`, `pdf_file`) VALUES
(14, 0, '', 35, 39, 'Paraphrasing assignment.pdf'),
(20, 0, '', 35, 39, 'IP UT 2.pdf'),
(21, 0, '', 35, 33, 'IJERTV2IS100652.pdf'),
(22, 0, '', 35, 34, ''),
(23, 0, '', 35, 34, 'Paraphrasing assignment.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(1, 'D5'),
(2, 'D10'),
(3, 'D15'),
(4, 'D20'),
(5, 'Teaching_Staff');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) UNSIGNED NOT NULL,
  `project_name` varchar(1000) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `github_username` varchar(255) NOT NULL,
  `project_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_description`, `project_link`, `github_username`, `project_status`) VALUES
(1, 'PGCORP', 'qoaboaobvobovbdovbovb', 'https://github.com/milu234/Data-structures.git', 'milu234', 50),
(2, 'PGCORP', 'qoaboaobvobovbdovbovb', 'https://github.com/milu234/Data-structures.git', 'milu234', 32),
(3, 'PGCORP', 'qoaboaobvobovbdovbovb', 'https://github.com/milu234/Data-structures.git', 'milu234', 61);

-- --------------------------------------------------------

--
-- Table structure for table `project_evaluation`
--

CREATE TABLE `project_evaluation` (
  `project_evaluation_id` int(11) UNSIGNED NOT NULL,
  `project_marks` int(11) NOT NULL,
  `project_comments` varchar(255) NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'student'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role_id` int(20) UNSIGNED NOT NULL,
  `class_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `role_id`, `class_id`) VALUES
(33, 'milan@gmail.com', '123456', 1, 3),
(34, 'chirag@gmail.com', '123456', 1, 3),
(35, 'walsh@gmail.com', '123456', 1, 3),
(36, 'athul@gmail.com', '123456', 1, 3),
(37, 'pooja@gmail.com', '123456', 2, 5),
(38, 'sagar@gmail.com', '123456', 1, 4),
(39, 'shravan@gmail.com', '123456', 1, 4),
(40, 'dimple@gmail.com', '123456', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--

CREATE TABLE `works_on` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_on`
--

INSERT INTO `works_on` (`user_id`, `project_id`) VALUES
(35, 1),
(35, 2),
(33, 1),
(38, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `user_id_foreign` (`user_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `assignment_evaluation`
--
ALTER TABLE `assignment_evaluation`
  ADD PRIMARY KEY (`assignment_evaluation_id`),
  ADD KEY `assign_id_foreign` (`assignment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_evaluation`
--
ALTER TABLE `project_evaluation`
  ADD PRIMARY KEY (`project_evaluation_id`),
  ADD KEY `project_evaluation_id` (`project_id`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `class_id_foreign` (`class_id`),
  ADD KEY `role_id_foreign` (`role_id`);

--
-- Indexes for table `works_on`
--
ALTER TABLE `works_on`
  ADD KEY `project_id_foreign` (`project_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `assignment_evaluation`
--
ALTER TABLE `assignment_evaluation`
  MODIFY `assignment_evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_evaluation`
--
ALTER TABLE `project_evaluation`
  MODIFY `project_evaluation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `assignment_evaluation`
--
ALTER TABLE `assignment_evaluation`
  ADD CONSTRAINT `assign_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`),
  ADD CONSTRAINT `assignment_evaluation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `project_evaluation`
--
ALTER TABLE `project_evaluation`
  ADD CONSTRAINT `project_evaluation_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `works_on`
--
ALTER TABLE `works_on`
  ADD CONSTRAINT `project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `works_on_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
