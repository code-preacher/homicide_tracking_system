-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 12:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homicide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `officer` varchar(32) DEFAULT NULL,
  `rank` varchar(32) DEFAULT NULL,
  `service_no` varchar(32) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `date_created` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `officer`, `rank`, `service_no`, `phone`, `username`, `password`, `date_created`) VALUES
(1, 'Val', 'MAJOR', '284765873', '+ 234 812 676 4150', 'joe', '123456', '17-03-21 @ 6:44 AM');

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_posts`
--

CREATE TABLE `ongoing_posts` (
  `id` int(11) NOT NULL,
  `ipo` varchar(200) DEFAULT NULL,
  `report` text DEFAULT NULL,
  `login_device` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `audio` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongoing_posts`
--

INSERT INTO `ongoing_posts` (`id`, `ipo`, `report`, `login_device`, `image`, `audio`, `video`, `date`) VALUES
(1, 'p@p.com', 'hello\r\n\r\n                                                                                               ', 'CODE-PREACHER', 'homicide_607597780e5ef.0x0.jpg', '', '', '13-04-21 @ 3:07 PM'),
(2, 'p@p.com', 'happy\r\n\r\n                                                                                               ', 'CODE-PREACHER', '', '', '', '13-04-21 @ 3:07 PM'),
(3, 'p@p.com', 'theft\r\n\r\n                                                                                               ', 'CODE-PREACHER', 'homicide_6075982bd1d86.mp4', '', '', '13-04-21 @ 3:10 PM'),
(4, 'p@p.com', 'police\r\n\r\n                                                                                               ', 'CODE-PREACHER', 'homicide_6075990d32789.png', 'homicide_6075990d32f53.mp3', 'homicide_6075990d334e2.mp4', '13-04-21 @ 3:13 PM'),
(5, 'p@p.com', '\r\n\r\n                            Samuel is fine                                                                  ', 'CODE-PREACHER', 'homicide_6075c46d4cede.png', '', '', '13-04-21 @ 6:18 PM');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `ipo` varchar(11) DEFAULT NULL,
  `dates` text DEFAULT NULL,
  `case_no` text DEFAULT NULL,
  `fname` text DEFAULT NULL,
  `oname` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `marital` text DEFAULT NULL,
  `height` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `occuation` text DEFAULT NULL,
  `emp_state` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `last_seen` text DEFAULT NULL,
  `crime` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `items` text DEFAULT NULL,
  `posted_by` text DEFAULT NULL,
  `legal_action` text DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `sysip` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session_log`
--

CREATE TABLE `session_log` (
  `id` int(30) NOT NULL,
  `officer` varchar(200) NOT NULL,
  `rank` varchar(200) NOT NULL,
  `service_no` varchar(200) NOT NULL,
  `login_device` varchar(200) NOT NULL,
  `last_login` varchar(200) NOT NULL,
  `last_logout` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_log`
--

INSERT INTO `session_log` (`id`, `officer`, `rank`, `service_no`, `login_device`, `last_login`, `last_logout`) VALUES
(1, 'Val', 'MAJOR', '284765873', 'CODE-PREACHER', '16-04-21 @ 7:49 AM', '16-04-21 @ 8:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `email`, `address`, `phone`, `username`, `password`, `gender`, `date`) VALUES
(1, 'Peter', 'p@p.com', '61 boniface street', '08136473738', 'oche', '123456', 'MALE', '2021-04-13 12:12:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongoing_posts`
--
ALTER TABLE `ongoing_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_log`
--
ALTER TABLE `session_log`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongoing_posts`
--
ALTER TABLE `ongoing_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session_log`
--
ALTER TABLE `session_log`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
