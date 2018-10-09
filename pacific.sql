-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 10:16 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `class`) VALUES
(1, '2016.walsh.fernandes@ves.ac.in', 'asdfghjkl', 'Student', 'D5'),
(2, '2016.walsh.fernandes@ves.ac.in', '123456', 'Student', 'D5'),
(3, '2016.walsh.fernandes@ves.ac.in', '123456', 'Student', 'D5'),
(4, '', '', '', ''),
(5, '2016.walsh.fernandes@ves.ac.in', 'asddad', 'Student', 'D5'),
(6, '2016.walsh.fernandes@ves.ac.in', 'asddad', 'Student', 'D5'),
(7, '2016.walsh.fernandes@ves.ac.in', '126456', 'Student', 'D5'),
(8, '2016.walsh.fernandes@ves.ac.in', '126456', 'Student', 'D5'),
(9, '', '', '', ''),
(10, '2016.walsh.fernandes@ves.ac.in', 'asdasd', 'Student', 'D10'),
(11, '2016.walsh.fernandes@ves.ac.in', '123456', 'Student', 'D10'),
(12, 'wasdsad', 'asdasdasd', 'Student', 'D5'),
(13, '', '', '', ''),
(14, 'Milan@hazra.com', 'gitbtitw', 'Student', 'D15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
