-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 06:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

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
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `app_id` int(10) NOT NULL,
  /*`resume` varchar(300) NOT NULL,*/
  `id` int(11) NOT NULL,
  /*`jobid` int(11) NOT NULL,*/
  `astatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_id`, `resume`, `id`, `jobid`, `astatus`) VALUES
(47, 'Applicationfrom.pdf', 34, 35, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

/*CREATE TABLE `category` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `cstatus`) VALUES
(38, 'Customer Service', 1),
(39, 'computer engineering', 1),
(40, 'Application development', 1);*/

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginid` int(20) NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type1` varchar(25) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `username`, `password`, `type1`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(97, 'soman@gmail.com', 'Soman@123', 'user', 1),
(103, 'roshanthomas726@gmail.com', 'Roshan@123', 'user', 1);

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
(30, 97, 'Soman', 'humm', 'soman@gmail.com', 'Soman house', '9876567890', 'Male', 1),
(34, 103, 'Roshan', 'Thomas', 'roshanthomas726@gmail.com', 'Abcd', '9947994235', 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

/*CREATE TABLE `sub_category` (
  `subid` int(11) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `cid` int(11) NOT NULL,
  `sstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subid`, `sname`, `cid`, `sstatus`) VALUES
(20, 'Call Center', 38, 1),
(21, 'Artificial intelligence', 39, 1),
(22, 'Big Data analytics', 39, 1),
(23, 'game development', 40, 1),
(24, 'iOS and Android', 40, 1);*/

-- --------------------------------------------------------

--
-- Table structure for table `tbljob`
--

/*CREATE TABLE `tbljob` (
  `jobid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `req_num_emp` int(11) NOT NULL,
  `salary` int(20) NOT NULL,
  `duration` date NOT NULL,
  `workexp` varchar(25) NOT NULL,
  `qualifi` varchar(33) NOT NULL,
  `location` varchar(25) NOT NULL,
  `jobdiscription` varchar(150) NOT NULL,
  `dateofpost` datetime NOT NULL DEFAULT current_timestamp(),
  `jstatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;*/

--
-- Dumping data for table `tbljob`
--

/*INSERT INTO `tbljob` (`jobid`, `cid`, `subid`, `req_num_emp`, `salary`, `duration`, `workexp`, `qualifi`, `location`, `jobdiscription`, `dateofpost`, `jstatus`) VALUES
(34, 40, 24, 234, 1234567, '2022-07-15', '2 yr', 'degree', 'kochi', 'asdfghjkl', '2022-07-05 22:05:49', 'Active'),
(35, 38, 20, 10, 200000, '2022-07-28', '3', 'plustwo', 'kochi', 'asdfghjkl', '2022-07-05 22:07:20', 'Active');*/

-- --------------------------------------------------------

--
-- Table structure for table `tbl_careerupdate`
--

/*CREATE TABLE `tbl_careerupdate` (
  `cr_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `skill` varchar(150) NOT NULL,
  `certifications` varchar(30) NOT NULL,
  `workexp` varchar(30) NOT NULL,
  `10th` varchar(300) NOT NULL,
  `plustwo` varchar(350) NOT NULL,
  `degree` varchar(300) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;*/

--
-- Dumping data for table `tbl_careerupdate`
--

/*INSERT INTO `tbl_careerupdate` (`cr_id`, `date`, `nationality`, `skill`, `certifications`, `workexp`, `10th`, `plustwo`, `degree`, `id`) VALUES
(20, '1999-03-23', 'India', 'developer', 'cpp,css,html', '3', 'career-counselling-using-data-mining-.pdf', 'Student Career Prediction.pdf', 'Sample.pdf', 34);*/

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

/*CREATE TABLE `tbl_location` (
  `lid` int(11) NOT NULL,
  `lname` varchar(33) NOT NULL,
  `lstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;*/

--
-- Dumping data for table `tbl_location`
--

/*INSERT INTO `tbl_location` (`lid`, `lname`, `lstatus`) VALUES
(2, 'kattappana', 0),
(3, 'kochi', 1);*/

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification`
--

/*CREATE TABLE `tbl_qualification` (
  `qid` int(11) NOT NULL,
  `qname` varchar(33) NOT NULL,
  `qstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;*/

--
-- Dumping data for table `tbl_qualification`
--

/*INSERT INTO `tbl_qualification` (`qid`, `qname`, `qstatus`) VALUES
(1, 'sslc', 1),
(2, 'degree', 1),
(4, 'plustwo', 1);*/

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `id` (`id`);
  /*ADD KEY `applicants_ibfk_2` (`jobid`);*/

--
-- Indexes for table `category`
--
/*ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);*/

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
-- Indexes for table `sub_category`
--
/*ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `tbl_careerupdate`
--
ALTER TABLE `tbl_careerupdate`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD PRIMARY KEY (`qid`);*/

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category`
--
/*ALTER TABLE `category`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;*/

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sub_category`
--
/*ALTER TABLE `sub_category`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_careerupdate`
--
ALTER TABLE `tbl_careerupdate`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;*/

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`id`) REFERENCES `register` (`id`);
  /*ADD CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`jobid`) REFERENCES `tbljob` (`jobid`);*/

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `loginid` FOREIGN KEY (`loginid`) REFERENCES `login` (`loginid`);

--
-- Constraints for table `sub_category`
--
/*ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`);

--
-- Constraints for table `tbljob`
--
ALTER TABLE `tbljob`
  ADD CONSTRAINT `tbljob_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`),
  ADD CONSTRAINT `tbljob_ibfk_2` FOREIGN KEY (`subid`) REFERENCES `sub_category` (`subid`);

--
-- Constraints for table `tbl_careerupdate`
--
ALTER TABLE `tbl_careerupdate`
  ADD CONSTRAINT `tbl_careerupdate_ibfk_1` FOREIGN KEY (`id`) REFERENCES `register` (`id`);
COMMIT;*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
