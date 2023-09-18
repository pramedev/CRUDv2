-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 09:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

CREATE TABLE `userstbl` (
  `userID` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `role` char(1) NOT NULL DEFAULT 'U',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`userID`, `username`, `email`, `password`, `phonenumber`, `fname`, `lname`, `role`, `timestamp`) VALUES
(1, 'Admin    ', 'admin@email.com    ', 'password    ', 123456789, 'Admin    ', 'Administrator    ', 'A', '2023-09-10 09:58:11'),
(4, 'insertTest', 'testemail1@email.com', 'password', 123131321, 'insert', 'testing', 'A', '2023-09-10 11:10:03'),
(5, 'user1', 'user1@email.com', 'password', 123456789, 'user1', 'testing', 'U', '2023-09-10 11:45:35'),
(6, 'asd', 'asd@email.com', 'password', 8746165, 'asdasd', 'dsadsa', 'U', '2023-09-10 14:11:37'),
(9, 'tesla', 'tesla@gmail.com', 'password', 123456, NULL, NULL, 'U', '2023-09-18 06:57:06'),
(10, 'toyota', 'toyota@gmail.com', 'password', 2147483647, 'toyota', 'corp', 'U', '2023-09-18 07:20:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userstbl`
--
ALTER TABLE `userstbl`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
