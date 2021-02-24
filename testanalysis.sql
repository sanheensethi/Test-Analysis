-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 05:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testanalysis`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapoints`
--

CREATE TABLE `datapoints` (
  `userid` bigint(20) NOT NULL,
  `testid` bigint(20) NOT NULL,
  `total_ques` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `blank` int(11) NOT NULL,
  `rht` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `testname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `rightper` int(11) NOT NULL,
  `wrongper` int(11) NOT NULL,
  `attemptper` int(11) NOT NULL,
  `blankper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapoints`
--

INSERT INTO `datapoints` (`userid`, `testid`, `total_ques`, `attempt`, `blank`, `rht`, `wrong`, `testname`, `date`, `rightper`, `wrongper`, `attemptper`, `blankper`) VALUES
(1, 2, 45, 30, 15, 20, 10, '2021-02-24', '0000-00-00', 67, 33, 67, 33),
(1, 5, 67, 43, 24, 32, 11, 'drtu', '2021-02-24', 74, 26, 64, 36),
(1, 6, 100, 56, 44, 50, 6, 'hjfgh', '2021-02-25', 89, 11, 56, 44),
(1, 7, 230, 170, 60, 150, 20, 'mjhg', '2021-02-25', 88, 12, 74, 26),
(1, 8, 90, 56, 34, 55, 1, 'ghfdhg', '2021-02-23', 98, 2, 62, 38);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `password`, `batch`) VALUES
(1, 'Sanheen', 'sanheensethi', '1234', 'M1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapoints`
--
ALTER TABLE `datapoints`
  ADD PRIMARY KEY (`testid`),
  ADD KEY `any` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapoints`
--
ALTER TABLE `datapoints`
  MODIFY `testid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
