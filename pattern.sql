-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 02:37 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pattern`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_pass` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'austin', 'auztincodes@gmail.com', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `gen_patterns`
--

CREATE TABLE IF NOT EXISTS `gen_patterns` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pattern_num` int(11) NOT NULL,
  `pattern_img_paths` varchar(500) CHARACTER SET utf8 NOT NULL,
  `date_gen` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_patterns`
--

INSERT INTO `gen_patterns` (`id`, `user_id`, `pattern_num`, `pattern_img_paths`, `date_gen`) VALUES
(22, 7, 4, 'FreeVector-Peacock-Feather.png, isolated-peacock-feather.jpg, feather.png, peacock.jpg, isolated-peacock-feather.jpg, feather.png, peacock.jpg, FreeVector-Peacock-Feather.png, feather.png, peacock.jpg, FreeVector-Peacock-Feather.png, isolated-peacock-feather.jpg, peacock.jpg, FreeVector-Peacock-Feather.png, isolated-peacock-feather.jpg, feather.png', '03 Aug 2017 04:27:11'),
(23, 7, 3, '09.1.jpg, 16.1.jpg, 17.1.jpg, 16.1.jpg, 17.1.jpg, 09.1.jpg, 17.1.jpg, 09.1.jpg, 16.1.jpg', '03 Aug 2017 04:45:04'),
(24, 7, 4, '84.jpg, 85.jpg, 83.jpg, 87.jpg, 85.jpg, 83.jpg, 87.jpg, 84.jpg, 83.jpg, 87.jpg, 84.jpg, 85.jpg, 87.jpg, 84.jpg, 85.jpg, 83.jpg', '03 Aug 2017 04:46:02'),
(25, 7, 4, 'Butterflies-2.jpg, Butterflies-5.jpg, Butterflies-3.jpg, Butterflies-4.jpg, Butterflies-5.jpg, Butterflies-3.jpg, Butterflies-4.jpg, Butterflies-2.jpg, Butterflies-3.jpg, Butterflies-4.jpg, Butterflies-2.jpg, Butterflies-5.jpg, Butterflies-4.jpg, Butterflies-2.jpg, Butterflies-5.jpg, Butterflies-3.jpg', '03 Aug 2017 04:47:19'),
(26, 7, 3, 'Free Mariposa Vector.jpg, Butterflies-7.jpg, Free1.jpg, Butterflies-7.jpg, Free1.jpg, Free Mariposa Vector.jpg, Free1.jpg, Free Mariposa Vector.jpg, Butterflies-7.jpg', '03 Aug 2017 04:48:30'),
(27, 7, 4, 'FreeVector-Peacock-Feather.png, isolated-peacock-feather.jpg, feather.png, peacock.jpg, isolated-peacock-feather.jpg, feather.png, peacock.jpg, FreeVector-Peacock-Feather.png, feather.png, peacock.jpg, FreeVector-Peacock-Feather.png, isolated-peacock-feather.jpg, peacock.jpg, FreeVector-Peacock-Feather.png, isolated-peacock-feather.jpg, feather.png', '03 Aug 2017 14:10:59'),
(28, 7, 4, 'feather.png, isolated-peacock-feather.jpg, FreeVector-Peacock-Feather.png, peacock.jpg, isolated-peacock-feather.jpg, FreeVector-Peacock-Feather.png, peacock.jpg, feather.png, FreeVector-Peacock-Feather.png, peacock.jpg, feather.png, isolated-peacock-feather.jpg, peacock.jpg, feather.png, isolated-peacock-feather.jpg, FreeVector-Peacock-Feather.png', '03 Aug 2017 17:26:18'),
(29, 7, 3, '43.jpg, 45.jpg, 49.jpg, 45.jpg, 49.jpg, 43.jpg, 49.jpg, 43.jpg, 45.jpg', '03 Aug 2017 18:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `img_library`
--

CREATE TABLE IF NOT EXISTS `img_library` (
`id` int(11) NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `file_path` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_library`
--

INSERT INTO `img_library` (`id`, `file_name`, `file_path`) VALUES
(10, 'Butterflies-7.jpg', '../includes/library/Butterflies-7.jpg'),
(11, 'feather.png', '../includes/library/feather.png'),
(12, 'Free Mariposa Vector.jpg', '../includes/library/Free Mariposa Vector.jpg'),
(18, '09.1.jpg', '../includes/library/09.1.jpg'),
(19, '17.1.jpg', '../includes/library/17.1.jpg'),
(20, '16.1.jpg', '../includes/library/16.1.jpg'),
(21, 'pattern536.jpg', '../includes/library/pattern536.jpg'),
(22, 'pattern465.jpg', '../includes/library/pattern465.jpg'),
(23, 'isolated-peacock-feather.jpg', '../includes/library/isolated-peacock-feather.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(7, 'maxwell', 'maxwell@gmail.com', '2222'),
(8, 'james', 'james@gmail.com', 'b59c67bf196a4758191e42f76670ce'),
(9, 'jon', 'jon@gmail.com', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `gen_patterns`
--
ALTER TABLE `gen_patterns`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_library`
--
ALTER TABLE `img_library`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gen_patterns`
--
ALTER TABLE `gen_patterns`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `img_library`
--
ALTER TABLE `img_library`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
