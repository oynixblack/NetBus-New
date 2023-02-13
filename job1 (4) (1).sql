-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 06:25 AM
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
-- Database: `job1`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL DEFAULT 'second',
  `no` int(11) NOT NULL DEFAULT 1,
  `seat` varchar(30) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `first_seat` int(11) NOT NULL,
  `second_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `first_seat`, `second_seat`) VALUES
(7, 'dddd', 10, 5),
(14, 'SCANCIA', 5, 10),
(15, 'SHAJI', 8, 8),
(17, 'saranya', 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `input` varchar(1000) NOT NULL,
  `output` varchar(1000) NOT NULL,
  `time` datetime NOT NULL,
  `id` int(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`input`, `output`, `time`, `id`, `title`) VALUES
('How many seats are available for PALA to Kottayam?', 'Please visit our website \r\n\r\nhttp://localhost:81/NETBUSS/', '2017-08-22 00:00:00', 0, 'View'),
('hi', 'Hello. How Can I Help You?', '2017-08-22 21:37:00', 1, NULL),
('Can you help?\r\n', 'Tell me how can assist you with the Netbus E-Ticketing Services.', '2017-08-23 00:00:00', 3, ''),
('I need to create a new account', 'You can just easily create a new account from our website.Just go to our website and follow thw guidelines to cancel the ticket.\r\n\r\nhttp://localhost:81/NETBUSS/register.php', '2023-01-04 11:10:31', 5, 'Create Account'),
('How are you?', 'I\'m fine.What about you?', '2017-08-23 18:22:07', 6, ''),
('How old are you?', 'Sorry I didn\'t get you.Please login to our website for better service.Can you tell me exactly wat are you looking for?', '2017-08-23 18:30:59', 9, ''),
('Are you a robot?', 'Yes I\'m a robotBut I\'m a good one.Let me prove it.How can I help you?', '2017-08-23 18:36:10', 10, ''),
('ok', 'Ok', '2017-08-23 22:32:23', 24, NULL),
('hey', 'Hello :-) ', '2017-08-24 00:21:01', 25, NULL),
('hello', 'Hi. How Can I Help You ?', '2017-08-27 12:24:55', 27, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(400) NOT NULL,
  `response` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `login` (
  `loginid` int(20) NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(20) NOT NULL,
  `code` varchar(30) NOT NULL,
  `verified` int(2) NOT NULL DEFAULT 0,
  `type1` varchar(25) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `username`, `password`, `code`, `verified`, `type1`, `status`) VALUES
(1, 'admin', 'admin', '', 0, 'admin', 1),
(97, 'soman@gmail.com', 'Soman@123', '', 0, 'user', 1),
(104, 'amal@gmail.com', 'Arun@2000', '', 0, 'user', 1),
(105, 'aravind@gmail.com', 'Aravind@2000', '', 0, 'user', 1),
(126, 'arunajayy17@gnmail.com', 'Arun@2000', '', 0, 'user', 1),
(127, 'amalbiju@gmail.com', 'Amal@2000', '', 0, 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(20) NOT NULL,
  `loginid` int(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(33) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `estatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `loginid`, `fname`, `lname`, `email`, `adress`, `phone`, `gender`, `estatus`) VALUES
(30, 97, 'Arun', 'humm', 'arun@gmail.com', 'Amal house', '9876567890', 'Male', 1),
(35, 104, 'Amal', 'Ajay', 'amal@gmail.com', 'Amal nivas', '7985965865', 'Male', 1),
(36, 105, 'Aravind', 'Adf', 'aravind@gmail.com', 'jauazyxsyusby', '8978987858', 'Male', 1),
(55, 127, 'Amal', 'Biju', 'amalbiju@gmail.com', 'nxshquguhqiohixjihuhqinlkhxhjqhiohqwo', '7902796869', 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `start` varchar(100) NOT NULL,
  `stop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `start`, `stop`) VALUES
(21, 'PALA', 'RANNI'),
(23, 'PATHANAMTHITTA', 'KOTTAYAM'),
(24, 'KOTTAYAM', 'KANJIRAPPALLY');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `first_fee` float NOT NULL,
  `second_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedule_id` (`schedule_id`,`user_id`,`payment_id`) USING BTREE,
  ADD KEY `schedule_id_2` (`schedule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginid` (`loginid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `route_id` (`route_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `loginid` FOREIGN KEY (`loginid`) REFERENCES `login` (`loginid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
