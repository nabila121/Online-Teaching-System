-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 07:16 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_teaching_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `loginid`, `password`, `status`, `usertype`) VALUES
(1, 'Ram', 'ruhina', '12345678', 'Active', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `Institution` varchar(20) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `confirm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `Institution`, `Class`, `start_time`, `start_date`, `comments`, `student_id`, `teacher_id`, `confirm`) VALUES
(2, 'diu', '7', '13:04:00', '2019-08-14', 'cvbhjh', 14, 3, 1),
(4, 'uiu', '12', '01:00:00', '2019-01-01', 'Hey ruhina apa', 15, 23, 0),
(5, 'uiu', '10', '02:01:00', '2019-08-15', 'hi', 3, 1, 1),
(6, 'NSU', '12', '01:00:00', '2019-01-01', 'hey', 3, 3, 0),
(7, 'BUET', '12', '01:00:00', '2019-01-01', 'hello', 3, 6, 1),
(8, '', '', '00:00:00', '0000-00-00', '', 3, 1, 0),
(11, 'uiu', '9', '15:01:00', '2019-08-12', 'hello', 16, 3, 0),
(12, 'uiu', '5', '13:01:00', '2019-08-21', 'ok', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES
(1, 'rokon', 'khan', 'rokonuzzaman999@gmail.com', '01876414028', 'nhjgfjchcnh78654665'),
(2, 'fatima', 'khatun', 'fatima2424@bscse.uiu.ac.bd', '62656464', 'ndknnrlnrdl,nbr'),
(3, 'Ruhina', 'Ruma', 'ruhinaakter.ruma@gmail.com', '01962779835', '1234'),
(4, 'Rokon', 'Ahmed', 'bb@gmail.com', '123', '123'),
(5, 'aed', 'sdedf', 'as5@gmail.com', '1243', '123'),
(6, 'ruhina', 'ruma', 'rakter152073@gmail.com', '01962779835', '12345'),
(7, 'priti', 'chowdhury', 'priti@gmail.com', '0192736465', '12'),
(8, 'pia', 'sadia', 'pia@gmail.com', '0163647586', '12'),
(9, 'akter', 'hossain', 'akter@gmail.com', '01636456757', '12'),
(10, 'alif', 'azmer', 'alif@gmail.com', '0173645565', '12'),
(11, 'abc', 'as', 'abc@gmail', '213354', '12'),
(12, 'a', 'v', 'a@gmail', '12', '12'),
(13, 'a', 'r', 'a@gmail', '24', '12'),
(14, 'sohel', 'amin', 'sohel@gmail.com', '12345', '123'),
(15, 'as', 'asd', 'as@gmail', '123', '123'),
(16, 'ruhina', 'ruma', 'ruhina@gmail.com', '235676', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(50) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `gra_complete` varchar(50) NOT NULL,
  `aca_result` varchar(50) NOT NULL,
  `sala_tution` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `study_field` varchar(10) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `email`, `phone_number`, `gra_complete`, `aca_result`, `sala_tution`, `password`, `study_field`, `subject`) VALUES
(1, 'Nahian', 'nafiza56@gmail.com', '3265664', 'uiu', '3.85', '10,000', 'vndxnfnkfkasbf', 'Literature', 'Bangla'),
(2, 'ramesh', 'ramesh48@gmail.com', '013255554', 'uiu', '3.50', '5358', 'hgfghgcdz', 'English ', 'English'),
(3, 'imam hossain', 'imam69@gmail.com', '01717526437', 'BUET', '3.9', '70000', '1234', 'Statistics', 'Math'),
(4, 'nahid hossain', 'nahid@gmail.com', '78798', 'BUET', '3.76', '10000', '123', 'Literature', 'Bangla'),
(6, 'sumon', 'sumon@gmail.com', '657849', 'uiu', '3.80', '10000', '15', 'English', 'English'),
(7, 'farid', 'farid@gmail.com', '122445', 'uiu', '3.90', '15000', '23', 'physics', 'physics'),
(8, 'Farid', 'Farid@gmail.com', '01245789988', 'BUET', '3.50', '15000', '5sa3d', NULL, 'CSE'),
(9, 'sondip', 'sondip@gmail.com', '01203934343', 'DU', '3.65', '7000', 'jdsjgje', NULL, 'Physics'),
(10, 'kalam', 'kalam@gmail.com', '13457', 'RU', '3.70', '12000', '23434654', NULL, 'Chemistry'),
(11, 'Shakhawat', 'shakhawat@gmail.com', '134567', 'CU', '3.80', '9000', '344565', NULL, 'Biology'),
(15, 'kabir', 'k@gmail.com', '787734', 'bu', '3.33', '5000', '73757873', NULL, 'chemistry'),
(16, 'kabir', 'k@gmail.com', '787734', 'bu', '3.33', '5000', '73757873', NULL, 'chemistry'),
(17, 'kabir', 'k@gmail.com', '787734', 'bu', '3.33', '5000', '73757873', NULL, 'chemistry'),
(18, 'kabir', 'k@gmail.com', '787734', 'bu', '3.33', '5000', '73757873', NULL, 'chemistry'),
(22, 'salam', 'salam@gmail.com', '5678910', 'DU', '3.90', '12000', '34', 'Chemistry', 'Chemistry'),
(23, 'ruhina', 'ruhina@gmail', '123', 'uiu', '3.96', '15000', '12345', 'CSE', 'Math'),
(24, 'kajol', 'kajol@gmail.com', '', 'uiu', '3.90', '12000', '1234', 'English', 'English'),
(29, 'abc', 'abc@gmail.com', '67487398', 'uiu', '3.80', '10000', '12', 'English', 'English'),
(30, 'imam', 'imam@gmail.com', '6656578', 'uiu', '3.90', '12000', '12323', 'English', 'English'),
(31, 'imam', 'imam@gmail.com', '232', 'BUET', '3.90', '12000', '1324', 'Literature', 'Bangla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `adminname` (`adminname`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
