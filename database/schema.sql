-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2012 at 05:48 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `cid` varchar(20) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `credits` int(10) NOT NULL DEFAULT '4',
  `type` varchar(50) NOT NULL DEFAULT 'compulsory ',
  `iname` varchar(20) NOT NULL,
  `program` varchar(10) NOT NULL,
  `max_seat` int(200) NOT NULL,
  `avai_seat` int(200) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `credits`, `type`, `iname`, `program`, `max_seat`, `avai_seat`) VALUES
('', '', 0, '', '', 'UG', 0, 0),
('11', 'asd', 2, 'HSS', 'rajbala', 'UG', 150, 141),
('14', 'toc', 4, 'compulsory ', 'Bhanukiran Vinzamuri', 'UG', 150, 17),
('2', 'swe', 4, 'compulsory ', 'ravi', 'UG', 150, 142),
('56', 'Eco', 4, 'Elective', 'NM', 'UG/PG', 50, 49),
('7', 'os', 4, 'compulsory ', 'gaurav somani', 'UG', 150, 149),
('77', 'ComGraph', 4, 'Compulsory', 'GG', 'UG', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE IF NOT EXISTS `dean` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`username`, `password`, `fname`, `lname`) VALUES
('dean', 'dean', 'anupam', 'singh');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
  `sid` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `flag` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`sid`, `cid`, `flag`) VALUES
('y09uc004', '11', 0),
('y09uc001', '11', 0),
('y09uc001', '100', 0),
('y09uc001', '14', 0),
('y09uc001', '11', 0),
('y09uc001', '100', 0),
('y09uc001', '7', 0),
('y09uc001', '2', 0),
('y09uc001', '2', 0),
('y09uc001', '7', 0),
('y09uc001', '14', 0),
('y09uc001', '14', 0),
('y09uc001', '11', 0),
('', '2', 1),
('y09uc001', '56', 1),
('y09uc001', '2', 1),
('y09uc001', '14', 1),
('y09uc001', '11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `lname`, `username`, `password`) VALUES
(0, 'anupam', 'singh', 'dean', 'dean'),
(1, 'anupam', 'singh', 'dean', 'dean'),
(2, 'ravi', 'gorthi', 'ravi', 'ravi'),
(3, 'subrat', 'dash', 'subrat', 'subrat'),
(4, 'gaurav', 'somani', 'gaurav', 'gaurav');

-- --------------------------------------------------------

--
-- Table structure for table `overload`
--

CREATE TABLE IF NOT EXISTS `overload` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `sid` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `application` varchar(100) NOT NULL,
  `is_approved` int(10) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `overload`
--

INSERT INTO `overload` (`rid`, `sid`, `cid`, `application`, `is_approved`) VALUES
(7, 'y09uc001', '100', 'jhdbcshdbcshdb', 0),
(8, 'y09uc001', '100', 'hwdbvjchd cjhdjvhe', 0),
(9, 'y09uc001', '11', '', 0),
(10, 'y09uc001', '11', '', 0),
(11, 'y09uc001', '11', '12', 0),
(12, 'y09uc001', '11', '12', 0),
(13, 'y09uc001', '11', '12', 0),
(14, 'y09uc001', '11', '12', 0),
(15, 'y09uc001', '2', '12', 0),
(16, 'y09uc001', '2', '2', 0),
(17, 'y09uc001', '11', 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` varchar(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `CPI` float NOT NULL,
  `branch` varchar(10) NOT NULL,
  `program` varchar(10) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `sem` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `username`, `password`, `fname`, `CPI`, `branch`, `program`, `lname`, `dob`, `sem`, `email`, `phone`) VALUES
('001', 'y09uc001', '001', 'vikas', 9.2, 'cse', 'UG', '', '0000-00-00', 0, '', ''),
('002', 'y09uc002', '002', 'pankaj', 7.2, 'ece', 'UG', '', '0000-00-00', 0, '', ''),
('003', 'y09uc003', '003', 'mohit', 6.8, 'ece', 'PG', '', '0000-00-00', 0, '', ''),
('004', 'y09uc004', '004', 'nikhil', 7.9, 'cce', 'UG', '', '0000-00-00', 0, '', ''),
('005', 'y09uc005', '005', 'gaurav', 8.2, 'cse', 'UG', '', '0000-00-00', 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
