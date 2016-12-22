-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2016 at 03:16 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
('Y57983', 'Algeria'),
('I65055', 'Angola'),
('O12287', 'Benin'),
('U37348', 'Botswana'),
('O61078', 'Burkina Faso'),
('Z69881', 'Burundi'),
('N65509', 'Cameroon'),
('D89117', 'Cape Verde'),
('E72617', 'Central African Republic'),
('Z34742', 'Chad'),
('A45191', 'Comoros'),
('E31556', 'Congo Democratic Republic DRC'),
('C89904', 'Congo Republic'),
('G41649', 'Djibouti'),
('M28124', 'Egypt'),
('L20145', 'Equatorial Guinea'),
('L24517', 'Eritrea'),
('X74846', 'Ethiopia'),
('W13824', 'Gabon'),
('W38924', 'Gambia'),
('W95733', 'Ghana'),
('Y01063', 'Guinea'),
('U86273', 'Guinea Bissau'),
('M80582', 'Ivory Coast'),
('S34028', 'Kenya'),
('Z17567', 'Lesotho'),
('U58697', 'Liberia'),
('W58872', 'Libya'),
('O20687', 'Madagascar'),
('Z61177', 'Malawi'),
('U83068', 'Mali'),
('W79472', 'Mauritania'),
('T26270', 'Mauritius'),
('A66149', 'Morocco'),
('R82722', 'Mozambique'),
('K25335', 'Namibia'),
('A08971', 'Niger'),
('Y62392', 'Nigeria'),
('R20732', 'Rwanda'),
('F31137', 'Sao Tome and Principe'),
('J21567', 'Senegal'),
('I53893', 'Seychelles'),
('P27433', 'Sierra Leone'),
('B70823', 'South Africa'),
('G51935', 'South Sudan'),
('R18662', 'Sudan'),
('R40708', 'Swaziland'),
('J79990', 'Tanzania'),
('Y52042', 'Togo'),
('Q21954', 'Tunisia'),
('T08962', 'Uganda'),
('Z27470', 'Zambia'),
('I01892', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` varchar(50) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `age` int(4) NOT NULL,
  `points` int(4) DEFAULT NULL,
  `special_needs` varchar(30) NOT NULL,
  `schools` varchar(50) NOT NULL,
  `accepted` varchar(50) NOT NULL,
  `state` int(1) DEFAULT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `parent_id`, `firstname`, `lastname`, `dob`, `gender`, `age`, `points`, `special_needs`, `schools`, `accepted`, `state`, `date`) VALUES
('0af513d26bf32488c9dd', '5063e5ea434371fcf01e', 'Reggie', 'Tembwepo', '12/03/1997', 'male', 11, 9, '', '10', '', 0, '13-12-16'),
('b97a49cf367b855f8cf8', '5063e5ea434371fcf01e', 'Reggie', 'Tembwepo', '12/03/1997', 'male', 11, 9, '', '10', '', 0, '13-12-16'),
('27af764fa1fb570b8328', '5063e5ea434371fcf01e', 'Reggie', 'Tembwepo', '12/03/1997', 'male', 11, 9, '', '10', '', 0, '13-12-16'),
('5cde007894841768abfe', '5063e5ea434371fcf01e', 'Reggie', 'Tembwepo', '12/03/1997', 'male', 11, 9, '', '10', '', 0, '13-12-16'),
('43e454b0bacce42a3896', '5063e5ea434371fcf01e', 'Reggie', 'Tembwepo', '12/03/1997', 'male', 11, 9, '', '10', '', 0, '13-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `userparent`
--

CREATE TABLE IF NOT EXISTS `userparent` (
  `id` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nationalid` varchar(50) NOT NULL,
  `province` varchar(10) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `date` varchar(10) NOT NULL,
  `lastlogin` varchar(30) NOT NULL,
  `lastlogout` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userparent`
--

INSERT INTO `userparent` (`id`, `name`, `firstname`, `lastname`, `nationalid`, `province`, `phone`, `email`, `description`, `password`, `salt`, `type`, `state`, `date`, `lastlogin`, `lastlogout`) VALUES
('5063e5ea434371fcf01e', 'unicorw', 'Reggie', 'Tembwepo', 'E31556', 'E31556', '2761549024', 'tembachakoregis@gmail.com', '', 'd2ea23a96275ad689b57c39e688287250894f541ef692cf7e526531207fb4cb2', '3500836855851b3ae68b10', NULL, 1, '13-12-16', '14-12-16 10:12:47', '13-12-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD UNIQUE KEY `developer_code` (`id`);

--
-- Indexes for table `userparent`
--
ALTER TABLE `userparent`
 ADD UNIQUE KEY `developer_code` (`id`), ADD UNIQUE KEY `name` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
