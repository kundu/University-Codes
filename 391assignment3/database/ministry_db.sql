-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 07:16 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE IF NOT EXISTS `admin_panel` (
`id_auto` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_phone` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id_auto`, `admin_name`, `admin_username`, `admin_password`, `admin_phone`) VALUES
(1, 'Sauvik kundu', 'kundu', '123456', 2345),
(2, 'Ali', 'ali', '123456', 45678876);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE IF NOT EXISTS `appointment_table` (
`id_auto` int(11) NOT NULL,
  `m_username` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`id_auto`, `m_username`, `client_id`, `time`, `status`) VALUES
(1, 'kundu', '8', '6-2-2017', 'done'),
(2, 'kundu', '9', '10-2-2017', 'done'),
(3, 'agar', '10', '10-2-2017', ''),
(13, 'kundu', '20', '6-2-2017', 'done'),
(14, 'kundu', '21', '6-2-2017', ''),
(15, 'kundu', '22', '6-2-2017', 'done'),
(21, 'pratic', '28', '9-2-2017', 'done'),
(28, 'kundu', '35', '8-2-2017', 'done'),
(29, 'kundu', '36', '9-2-2017', 'done'),
(30, 'kundu', '37', '9-2-2017', ''),
(31, 'kundu', '38', '10-2-2017', ''),
(32, 'kundu', '39', '9-2-2017', 'done'),
(33, 'ratul', '40', '10-2-2017', ''),
(34, 'kundu', '41', '11-2-2017', '');

-- --------------------------------------------------------

--
-- Table structure for table `client_table`
--

CREATE TABLE IF NOT EXISTS `client_table` (
`id_auto` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `c_c_lis` varchar(255) NOT NULL,
  `c_c_eng` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `client_table`
--

INSERT INTO `client_table` (`id_auto`, `c_name`, `c_address`, `c_phone`, `c_c_lis`, `c_c_eng`) VALUES
(8, 'knjhgvcf', 'oplknjbhv', '45678987', 'edrfgh', 'ghjk'),
(9, 'Rafsan', 'Mirpur', '6546789', 'ygtfsxyah', 'vxujhasbjka'),
(10, 'Roti', 'VVknds', '45667556', 'shxaja', 'vuchsaa'),
(20, 'nisdj', 'bijdsn', '7689', 'hbfjdjv', 'rrrr'),
(21, 'nisdj', 'bijdsn', '7689', 'hbfjdjv', 'rrrrr'),
(22, 'nisdj', 'bijdsn', '7689', 'hbfjdjv', 'rrrrrr'),
(28, 'vfd', 'vfdvd', 'vfdvd', 'vfdvd', 'ghjyt'),
(35, 'bgnh', 'bgd', 'bfdbd', 'fbdbd', 'rrrrt'),
(36, 'csavbhj', 'hbuhdsbc', 'hadbchvbj', 'bisjdns', 'jndvhsh'),
(37, 'dvsbhj', 'bcijsacni', 'nibdjaonchsbc', 'bhcbdsjcnhusbc', 'bajdbchab'),
(38, 'scabaibvgy', 'hbvcuhsbdcgvb', 'gvdijncbhgsvdcnskjbv', 'hcdvshbh', 'hdbhjchuv'),
(39, 'cagyvhajbg', 'vbhbacbhv', 'gvdbhavygcb', 'vcbhdcbgyv', 'hbdhvduc'),
(40, 'dvsghjqngv', 'bcghbj', 'bcvkb', 'chjbdsv', 'ghjytg'),
(41, 'jbhjsv', 'bdjsb', 'bdshjcbh', 'chsdjc', 'ghjk');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_table`
--

CREATE TABLE IF NOT EXISTS `mechanic_table` (
`id_auto` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_address` varchar(255) NOT NULL,
  `m_phone` varchar(20) NOT NULL,
  `m_username` varchar(255) NOT NULL,
  `added_admin` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mechanic_table`
--

INSERT INTO `mechanic_table` (`id_auto`, `m_name`, `m_address`, `m_phone`, `m_username`, `added_admin`) VALUES
(3, 'Sadman', 'Narayanganj', '777533', 'sadman', 'k'),
(4, 'kundu', 'Bogra', '765433', 'kundu', 'k'),
(5, 'Ali', 'dhaka', '234567876', 'ali', 'k'),
(6, 'Agar', 'Bangla', '564322', 'agar', 'k'),
(7, 'Pratic', 'Uttara', '876542134', 'pratic', 'k'),
(8, 'Ratul', 'Narayanganj', '12345678', 'ratul', 'k');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
 ADD PRIMARY KEY (`id_auto`);

--
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
 ADD PRIMARY KEY (`id_auto`);

--
-- Indexes for table `client_table`
--
ALTER TABLE `client_table`
 ADD PRIMARY KEY (`id_auto`);

--
-- Indexes for table `mechanic_table`
--
ALTER TABLE `mechanic_table`
 ADD PRIMARY KEY (`id_auto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `appointment_table`
--
ALTER TABLE `appointment_table`
MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `client_table`
--
ALTER TABLE `client_table`
MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `mechanic_table`
--
ALTER TABLE `mechanic_table`
MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
