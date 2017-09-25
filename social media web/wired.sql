-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2016 at 06:27 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wired`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id` int(11) NOT NULL,
  `f_source` varchar(255) NOT NULL,
  `f_destination` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `f_source`, `f_destination`, `status`) VALUES
(10, 'soudi@gmail.com', 'sauvik@gmail.com', 'friend'),
(12, 'amit@gmail.com', 'sauvik@gmail.com', 'friend'),
(13, 'sauvik@gmail.com', 'amit@gmail.com', 'friend'),
(14, 'sauvik@gmail.com', 'soudi@gmail.com', 'friend'),
(15, 'tashrik@gmail.com', 'wasif@gmail.com', 'friend'),
(16, 'wasif@gmail.com', 'tashrik@gmail.com', 'friend'),
(19, 'wasif@gmail.com', 'sauvik@gmail.com', 'friend'),
(20, 'sauvik@gmail.com', 'wasif@gmail.com', 'friend'),
(21, 'mark@gmail.com', 'wasif@gmail.com', 'friend'),
(22, 'wasif@gmail.com', 'mark@gmail.com', 'friend'),
(23, 'amitkumar@gmail.com', 'tashrik@gmail.com', 'friend'),
(24, 'tashrik@gmail.com', 'amitkumar@gmail.com', 'friend'),
(25, 'rafi@gmail.com', 'wasif@gmail.com', 'request');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `works` varchar(255) NOT NULL,
  `studies` varchar(255) NOT NULL,
  `live` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `about` varchar(999) NOT NULL,
  `ppname` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `works`, `studies`, `live`, `mobile`, `email`, `password`, `birthday`, `gender`, `about`, `ppname`) VALUES
(1, 'Amithaba', 'Dey', '', '', '', '123529', 'amit@gmail.com', '123456', '2016-11-25', 'Male', '', 'amit@gmail.com.jpeg'),
(2, 'Sauvik', 'kundu', 'Jobless', 'Brac University', 'Dhaka ', '987654', 'sauvik@gmail.com', 'sauvik', '2016-11-17', 'Male', 'Dak mama dak !!!! ugli\r\n', 'sauvik@gmail.com.jpeg'),
(3, 'Artko', 'Suq', '', '', '', '2345678', 'arko@gmail.com', '123', '2016-11-09', 'Male', '', 'arko@gmail.com.jpeg'),
(4, 'Abdullah', 'Rabbani Soudi', 'tre', 'vrfbd', 'bdbdbd', 'rthg', 'soudi@gmail.com', '123456', '6gbb', 'Male', 'troll\r\n', 'soudi@gmail.com.jpeg'),
(5, 'Wasif', 'Abdullah', '', 'IUT', 'Gazipur', '454545', 'wasif@gmail.com', 'wasif', '2016-11-23', 'Male', 'dsadsa', 'wasif@gmail.com.jpeg'),
(6, 'Suhana', 'Ishrat', '', '', '', '54546456', 'suhana@gmail.com', 'suhana', '2016-11-22', 'Female', '', 'suhana@gmail.com.jpeg'),
(7, 'tashrik', 'Haq', '', '', '', '3543656', 'tashrik@gmail.com', 'tashrik', '2016-11-23', 'Male', '', 'tashrik@gmail.com.jpeg'),
(8, 'Amit Kumar', 'Dey', 'durbar', '', '', '34873894', 'amitkumar@gmail.com', 'amit', '2016-08-25', 'Male', '', 'amitkumar@gmail.com.jpeg'),
(9, 'Mark', 'Zuckerberg', 'Facebook', '', '', '43748', 'mark@gmail.com', 'mark', '2016-11-17', 'Male', '', 'mark@gmail.com.jpeg'),
(10, 'rafi', 'rahman', '', '', 'Mirpur', '4343', 'rafi@gmail.com', '123', '2016-11-17', 'Male', '', 'rafi@gmail.com.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
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
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
