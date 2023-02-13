-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2023 at 06:52 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job1`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bkid` int(10) NOT NULL AUTO_INCREMENT,
  `bid` varchar(30) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `scapacity` varchar(50) NOT NULL,
  `nseat` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` varchar(30) NOT NULL,
  `vid` varchar(10) NOT NULL,
  `dte` varchar(10) NOT NULL,
  `frm` varchar(30) NOT NULL,
  `tdetails` varchar(30) NOT NULL,
  PRIMARY KEY (`bkid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bkid`, `bid`, `bname`, `scapacity`, `nseat`, `name`, `phone`, `status`, `vid`, `dte`, `frm`, `tdetails`) VALUES
(1, '24', 'Albert', '40', '2', 'Soman', '8754567890', 'Approve', '97', '2023-02-07', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE IF NOT EXISTS `booked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL DEFAULT 'second',
  `no` int(11) NOT NULL DEFAULT '1',
  `seat` varchar(30) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schedule_id` (`schedule_id`,`user_id`,`payment_id`) USING BTREE,
  KEY `schedule_id_2` (`schedule_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `booked`
--


-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `first_seat` int(11) NOT NULL,
  `second_seat` int(11) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `scapacity` varchar(30) NOT NULL,
  `frm` varchar(50) NOT NULL,
  `tdetails` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `vid` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `first_seat`, `second_seat`, `regno`, `scapacity`, `frm`, `tdetails`, `image`, `vid`, `status`) VALUES
(7, 'dddd', 10, 5, '', '', '', '', '', '', ''),
(14, 'SCANCIA', 5, 10, '', '', '', '', '', '', ''),
(15, 'SHAJI', 8, 8, '', '', '', '', '', '', ''),
(17, 'saranya', 15, 10, '', '', '', '', '', '', ''),
(24, 'Albert', 40, 40, 'KL012349', '40', 'Pathanamthitta', 'Adoor', '3.png', '132', 'Approved'),
(27, 'RIYa', 40, 40, 'KL039879', '40', 'Pathanamthitta', 'Kollam', '1.jpg', '132', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE IF NOT EXISTS `chatbot` (
  `input` varchar(1000) NOT NULL,
  `output` varchar(1000) NOT NULL,
  `time` datetime NOT NULL,
  `id` int(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`input`, `output`, `time`, `id`, `title`) VALUES
('How many seats are available for PALA to Kottayam?', 'Please visit our website \r\n\r\nhttp://localhost:81/NETBUSS/', '2017-08-22 00:00:00', 0, 'View'),
('hi', 'Hello. How Can I Help You?', '2017-08-22 21:37:00', 1, NULL),
('Can you help?\r\n', 'Tell me how can assist you with the Netbus E-Ticketing Services.', '2017-08-23 00:00:00', 3, ''),
('I need to create a new account', 'You can just easily create a new account from our website.Just go to our website and follow thw guidelines to cancel the ticket.\r\n\r\nhttp://localhost:81/NETBUSS/register.php', '2023-01-04 11:10:31', 5, 'Create Account'),
('How are you?', 'I''m fine.What about you?', '2017-08-23 18:22:07', 6, ''),
('How old are you?', 'Sorry I didn''t get you.Please login to our website for better service.Can you tell me exactly wat are you looking for?', '2017-08-23 18:30:59', 9, ''),
('Are you a robot?', 'Yes I''m a robotBut I''m a good one.Let me prove it.How can I help you?', '2017-08-23 18:36:10', 10, ''),
('ok', 'Ok', '2017-08-23 22:32:23', 24, NULL),
('hey', 'Hello :-) ', '2017-08-24 00:21:01', 25, NULL),
('hello', 'Hi. How Can I Help You ?', '2017-08-27 12:24:55', 27, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` varchar(400) NOT NULL,
  `response` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `message`, `response`) VALUES
(15, 0, 'hkd wbhjhdbfchdgwvdgvwdf', 'okbgttgtt'),
(16, 0, 'dsvvddsvdvsdsvdvsdvsvsddvsdsvd', 'mnjnjnjnjnj'),
(17, 0, 'qaqwqaAAWSWSWSWSS', 'ok\r\n'),
(18, 0, 'yugyugyuguyg', 'okkk'),
(19, 0, 'hlooo\r\nkjhtljglijbljlj', 'gko;jilvjljcl;jxibukb'),
(20, 0, 'very bad service', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginid` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(33) NOT NULL,
  `password` varchar(20) NOT NULL,
  `code` varchar(30) NOT NULL,
  `verified` int(2) NOT NULL DEFAULT '0',
  `type1` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`loginid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `username`, `password`, `code`, `verified`, `type1`, `status`) VALUES
(1, 'admin', 'admin', '', 0, 'admin', '1'),
(97, 'soman@gmail.com', 'Soman@123', '', 0, 'user', '1'),
(104, 'amal@gmail.com', 'Arun@2000', '', 0, 'user', '1'),
(105, 'aravind@gmail.com', 'Aravind@2000', '', 0, 'user', '1'),
(126, 'arunajayy17@gnmail.com', 'Arun@2000', '', 0, 'user', '1'),
(127, 'amalbiju@gmail.com', 'Amal@2000', '', 0, 'user', '1'),
(130, 'nidheeshkumar@gmail.com', 'Nidheesh@123', '', 0, 'owner', '1'),
(131, 'ak@gmail.com', 'Abdul@123', '', 0, 'user', '1'),
(132, 'abhi@gmail.com', 'Abhi@432', '', 0, 'owner', '1');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `loggid` varchar(10) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1004 ;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`oid`, `fname`, `lname`, `email`, `address`, `phone`, `image`, `gender`, `loggid`) VALUES
(1001, '', '', '', '', '', '', '', ''),
(1002, 'Nidheesh', 'Kumar', 'nidheeshkumar@gmail.com', 'nidheeshbhavanam', '9061722429', 'pay.jpg', 'Male', ''),
(1003, 'Abhi', 'Krishna', 'abhi@gmail.com', 'abhibhavanam', '7896543210', 'loading.gif', 'Male', '132');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `loginid` int(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(33) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `estatus` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `loginid` (`loginid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `loginid`, `fname`, `lname`, `email`, `adress`, `phone`, `gender`, `estatus`) VALUES
(30, 97, 'Arun', 'humm', 'arun@gmail.com', 'Amal house', '9876567890', 'Male', 1),
(35, 104, 'Amal', 'Ajay', 'amal@gmail.com', 'Amal nivas', '7985965865', 'Male', 1),
(36, 105, 'Aravind', 'Adf', 'aravind@gmail.com', 'jauazyxsyusby', '8978987858', 'Male', 1),
(55, 127, 'Amal', 'Biju', 'amalbiju@gmail.com', 'nxshquguhqiohixjihuhqinlkhxhjqhiohqwo', '7902796869', 'Male', 0),
(56, 131, 'Abdul', 'Kabeer', 'ak@gmail.com', 'akvilla', '7894561230', 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` varchar(100) NOT NULL,
  `stop` varchar(100) NOT NULL,
  `bid` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `start`, `stop`, `bid`) VALUES
(21, 'PALA', 'RANNI', ''),
(23, 'PATHANAMTHITTA', 'KOTTAYAM', ''),
(24, 'KOTTAYAM', 'KANJIRAPPALLY', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `first_fee` float NOT NULL,
  `second_fee` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bus_id` (`bus_id`),
  KEY `route_id` (`route_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `bus_id`, `route_id`, `date`, `time`, `first_fee`, `second_fee`) VALUES
(161, 14, 23, '13-10-2022', '23:05', 25, 45),
(162, 15, 23, '25-10-2022', '23:19', 455, 85),
(163, 14, 23, '26-10-2022', '13:42', 25, 45),
(164, 14, 23, '28-10-2022', '09:49', 25, 26),
(165, 15, 23, '28-10-2022', '17:37', 52, 88),
(166, 14, 21, '26-10-2022', '13:39', 55, 44),
(167, 15, 23, '27-10-2022', '18:33', 24, 15),
(168, 15, 24, '01-11-2022', '22:14', 50, 25),
(170, 14, 21, '05-01-2023', '12:12', 25, 50),
(171, 14, 21, '11-01-2023', '23:22', 5151, 515);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `loginid` FOREIGN KEY (`loginid`) REFERENCES `login` (`loginid`);
