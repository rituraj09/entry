-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 11:41 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entry`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `community` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `post_grad` varchar(50) NOT NULL,
  `phd` varchar(20) NOT NULL DEFAULT 'No',
  `add_course` varchar(100) NOT NULL,
  `comp_course` varchar(200) NOT NULL,
  `exp` varchar(50) NOT NULL,
  `exp_gov` int(11) NOT NULL,
  `know_rep` varchar(10) NOT NULL,
  `know_ms` varchar(10) NOT NULL,
  `qual_remarks` varchar(300) NOT NULL,
  `work_exp` varchar(200) NOT NULL,
  `mob` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `curr_age` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `name`, `gender`, `community`, `dob`, `grad`, `post_grad`, `phd`, `add_course`, `comp_course`, `exp`, `exp_gov`, `know_rep`, `know_ms`, `qual_remarks`, `work_exp`, `mob`, `email`, `curr_age`, `isdelete`) VALUES
(1, 'DKHAR DARISA DORA', 'F', 'KHASI', '1994-03-01', 'BA', 'NO', 'No', 'PG DPLOMA', 'DIPLOMA IN COMUTER APPLICATIONS', '0', 2, 'Yes', 'Yes', 'QUALIFIED', 'NO', '9774977673', 'daridora03@gmail.com', 24, 0),
(2, 'KHARNAMI BIMI', 'F', 'KHASI', '1981-09-02', 'BSC', 'NO', 'No', 'NO', 'YES', '16', 2, 'Yes', 'Yes', 'QUALIFIED', 'YES', '9774089555', 'bimi.kharnami@gmail.com', 36, 0),
(3, 'WANKHAR IBANRISUK', 'F', 'KHASI', '1994-05-23', 'BIOTECHNOLOGY', 'BIOTECHNOLOGY', 'No', 'NO', 'NO', '0', 2, 'No', 'Yes', 'QUALIFIED', 'NO', '9089882485', 'ibanwankhar23@gmail.com', 24, 0),
(4, 'LANGSTIEH ESUKMAYA', 'F', 'KHASI', '1996-10-17', 'B.COM', 'NO', 'No', 'NO', 'YES', '0', 2, 'Yes', 'Yes', 'QUALIFIED', 'NO', '8257919980', 'NA', 21, 0),
(5, 'SYIEM AIBANSHNGAIN', 'M', 'KHASI', '1989-02-28', 'BA', 'NO', 'No', 'NO', 'YES', '0', 2, 'No', 'Yes', 'QUALIFIED', 'NO', '9402358301', 'syiemaibanshngain@gmail.com', 29, 0),
(6, 'LYNGSKOR VENIECIA', 'F', 'KHASI', '1995-04-01', 'BSC', 'NO', 'No', 'DIPLOMA DTP', 'MS OFFICE', '0', 2, 'No', 'Yes', 'QUALIFIED', 'NO', 'NA', 'na', 23, 0),
(7, 'SANGMA AGITOK ALANA', 'F', 'GARO', '1989-07-17', 'BSC', 'MSC', 'No', 'NO', 'NO', '0', 2, 'No', 'No', 'QUALIFIED', 'NO', '9402530627', 'alanasangma89@gmail.com', 28, 0),
(8, 'PASWETT CARYNE BIANGUN', 'F', 'KHASI', '1989-04-23', 'BA', 'MSW', 'NO', 'NO', 'TALLY', '0.8', 1, 'Yes', 'Yes', 'QUALIFIED', 'YES', '9863727443', 'carynepaswett@gmail.com', 29, 0),
(9, 'KHARMUTEE GENEVA DONNA', 'F', 'KHASI', '1984-01-10', 'BA', 'NO', 'NO', 'TYPE WRITING', 'PGDCA', '10.1', 2, 'Yes', 'Yes', 'QUALIFIED', 'YES', '8794326094', 'na', 34, 0),
(10, 'LYNDEM JULIANA', 'F', 'KHASI', '1982-07-10', 'BA', 'NO', 'NO', 'TALLY', 'COMPUTER DIPLOMA', '6.6', 1, 'Yes', 'Yes', 'QUALIFIED', 'YES', '9612947555', 'ju10lynd@gmail.com', 35, 0),
(11, 'WARJRI BENNYSON', 'M', 'KHASI', '1993-09-15', 'BCA', 'NO', 'NO', 'TALLY', 'HARDWARE AND NETWORKIN', '0', 2, 'Yes', 'Yes', 'QUALIFIED', 'NO', '9615037975', 'no', 24, 0),
(12, 'NONGKYNRIH JOHN HERIBERT', 'M', 'KHASI', '1988-05-09', 'BCA', 'NO', 'NO', 'NO', 'NO', '0', 2, 'No', 'No', 'QUALIFIED', 'NO', '8575234421', 'heribert.619@gmail.com', 30, 0),
(13, 'MARWEIN LAKERLINDASHISHA', 'F', 'KHASI', '1995-06-12', 'BSC', 'NO', 'NO', 'NO', 'NO', '0', 2, 'No', 'No', 'QUALIFIED', 'NO', '8837285331', 'lakermarwein@gmail.com', 23, 0),
(14, 'WANKHAR PEARLY LAROLYNE', 'F', 'KHASI', '1989-12-23', 'BSC', 'MSC', 'NO', 'NO', 'YES', '0', 2, 'No', 'Yes', 'NA', 'NA', '9774566452', 'pearlywankhar@yahoo.co.in', 28, 0),
(15, 'KHONGKAI LAWANDAPBIANG', 'F', 'KHASI', '1991-06-25', 'B.COM', 'M.COM', 'NO', 'NO', 'YES', '1.5', 2, 'Yes', 'Yes', '', '', '8787470272', 'llkhongkai@gmail.com', 27, 0),
(16, 'LYNGDOH IBAKORDOR', 'F', 'KHASI', '1992-10-05', 'BA', 'NO', 'NO', 'NO', 'NO', '0', 2, 'No', 'No', '', '', '8258817936', 'rharsohnohaufica1922@gmail.com', 25, 0),
(17, 'KHARJANA KHAMBORLANG', 'M', 'KHASI', '1987-02-27', 'BA', 'NO', 'NO', 'NO', 'PGDCA', '0', 2, 'No', 'No', '', '', '9485390384', 'na', 31, 0),
(18, 'JANA IBAPLIELAD', 'F', 'KHASI', '1991-11-03', 'BSC', 'MHA', 'NO', 'NO', 'NO', '0', 2, 'No', 'No', '', '', '7005105476', 'ibaplielad@gmail.com', 26, 0),
(19, 'NADON BOBYLIN', 'F', 'KHASI', '1985-01-08', 'BA', 'MSC IN MEDICAL SOCIOLOGY', 'NO', 'NO', 'NO', '5.6', 2, 'No', 'No', '', '', '8132837221', 'na', 33, 0),
(20, 'SHADAP ROYALDEEN', 'M', 'KHASI', '1992-06-16', 'BA', 'NO', 'NO', 'NO', 'YES', '0', 2, 'No', 'Yes', '', '', 'na', 'na', 26, 0),
(21, 'NONGBRI DAPHISHA', 'F', 'KHASI', '1990-08-17', 'BA', 'NO', 'NO', 'YES', 'YES', '2.9', 2, 'Yes', 'Yes', '', '', '8259826125', 'dafileala123@gmail.com', 27, 0),
(22, 'MARAK R RANGME', 'F', 'GARO', '1989-09-03', 'BBA', 'NO', 'NO', 'NO', 'NO', '0', 2, 'No', 'No', '', '', '7291816884', 'rangmem@gmail.com', 28, 0),
(23, 'CHESTER NONGKYNRIH', 'M', 'KHASI', '1989-03-09', 'BSC', 'MSC', 'YES', 'NO', 'NO', '0', 2, 'No', 'No', '', '', '8257847154', 'chester.bvidds@gmail.com', 29, 0),
(24, 'RYNTATHIANG JOSEPHENE', 'F', 'KHASI', '1993-03-09', 'B.COM', 'NO', 'NO', 'NO', 'NO', '0', 2, 'No', 'Yes', '', '', '8794271959', 'josepheneryntathiang6@gmail.com', 25, 0),
(25, 'YARISA WAHLANG', 'F', 'KHASI', '1995-11-17', 'BCOM', 'MBA', 'NO', 'NO', 'YES', '0', 2, 'No', 'Yes', '', '', '8794372401', 'na', 22, 0),
(26, 'RAPTHAP VICTOR BANSIEWDOR', 'M', 'KHASI', '1992-02-08', 'BSW', 'MSW', 'NO', 'SKILL DEVELOPMENT', 'DTP', '0.4', 2, 'No', 'Yes', '', '', '9774592087', 'bansiewdorrapthap@gmail.com', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `cand_id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `grad` varchar(20) NOT NULL,
  `post_grad` varchar(20) NOT NULL,
  `phd` varchar(20) NOT NULL DEFAULT 'No',
  `macip` varchar(40) NOT NULL,
  `con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `cand_id`, `postid`, `grad`, `post_grad`, `phd`, `macip`, `con`, `user`, `isdelete`) VALUES
(1, 1, 2, 'BA', 'No', 'No', '::1', '2018-07-12 11:49:40', 1, 0),
(2, 1, 4, 'BA', 'No', 'No', '::1', '2018-07-12 11:49:56', 1, 0),
(3, 2, 4, 'BSC', 'No', 'No', '::1', '2018-07-12 11:51:51', 1, 0),
(4, 3, 4, 'BIOTECHNOLOGY', 'BIOTECHNOLOGY', 'No', '::1', '2018-07-12 12:04:45', 1, 0),
(5, 3, 3, 'BIOTECHNOLOGY', 'BIOTECHNOLOGY', 'No', '::1', '2018-07-12 12:05:35', 1, 0),
(6, 4, 2, 'B.COM', 'No', 'No', '::1', '2018-07-12 12:11:13', 1, 0),
(7, 5, 5, 'BA', 'No', 'No', '::1', '2018-07-12 12:16:38', 1, 0),
(8, 5, 2, 'BA', 'No', 'No', '::1', '2018-07-12 12:18:06', 1, 0),
(9, 6, 4, 'BSC', 'No', 'No', '::1', '2018-07-12 12:21:54', 1, 0),
(10, 7, 6, 'BSC', 'MSC', 'No', '::1', '2018-07-12 12:26:43', 1, 0),
(11, 8, 4, 'BA', 'MSW', 'No', '::1', '2018-07-12 13:19:31', 1, 0),
(12, 8, 3, 'BA', 'MSW', 'No', '::1', '2018-07-12 13:20:52', 1, 0),
(13, 9, 5, 'BA', 'No', 'No', '::1', '2018-07-12 15:00:14', 1, 0),
(14, 10, 4, 'BA', 'No', 'No', '::1', '2018-07-12 15:09:27', 1, 0),
(15, 11, 2, 'BCA', 'No', 'No', '::1', '2018-07-12 15:13:43', 1, 0),
(16, 12, 2, 'BCA', 'No', 'No', '::1', '2018-07-12 15:48:56', 1, 0),
(17, 12, 4, 'BCA', 'No', 'No', '::1', '2018-07-12 15:49:21', 1, 0),
(18, 13, 4, 'BSC', 'No', 'No', '::1', '2018-07-12 15:54:34', 1, 0),
(19, 13, 2, 'BSC', 'No', 'No', '::1', '2018-07-12 15:55:10', 1, 0),
(20, 14, 2, 'BSC', 'MSC', 'No', '::1', '2018-07-12 16:07:03', 1, 0),
(21, 14, 5, 'BSC', 'MSC', 'No', '::1', '2018-07-12 16:10:17', 1, 0),
(22, 15, 2, 'B.COM', 'M.COM', 'NO', '::1', '2018-07-13 11:46:42', 1, 0),
(23, 16, 5, 'BA', 'NO', 'NO', '::1', '2018-07-13 12:20:28', 1, 0),
(24, 17, 5, 'BA', 'NO', 'NO', '::1', '2018-07-13 12:56:34', 1, 0),
(25, 18, 3, 'BSC', 'MHA', 'NO', '::1', '2018-07-13 12:59:40', 1, 0),
(26, 18, 4, 'BSC', 'MHA', 'NO', '::1', '2018-07-13 13:00:05', 1, 0),
(27, 19, 3, 'BA', 'MSC IN MEDICAL SOCIO', 'NO', '::1', '2018-07-13 13:08:56', 1, 0),
(28, 20, 2, 'BA', 'NO', 'NO', '::1', '2018-07-13 13:12:23', 1, 0),
(29, 20, 4, 'BA', 'NO', 'NO', '::1', '2018-07-13 13:12:37', 1, 0),
(30, 21, 5, 'BA', 'NO', 'NO', '::1', '2018-07-13 13:16:27', 1, 0),
(31, 21, 2, 'BA', 'NO', 'NO', '::1', '2018-07-13 13:17:10', 1, 0),
(32, 21, 4, 'BA', 'NO', 'NO', '::1', '2018-07-13 13:17:34', 1, 0),
(33, 22, 4, 'BBA', 'NO', 'NO', '::1', '2018-07-13 15:24:36', 1, 0),
(34, 22, 3, 'BBA', 'NO', 'NO', '::1', '2018-07-13 15:25:23', 1, 0),
(35, 23, 6, 'BSC', 'MSC', 'YES', '::1', '2018-07-13 15:29:33', 1, 0),
(36, 24, 2, 'B.COM', 'NO', 'NO', '::1', '2018-07-13 15:38:06', 1, 0),
(37, 25, 3, 'BCOM', 'MBA', 'NO', '::1', '2018-07-13 15:48:07', 1, 0),
(38, 26, 3, 'BSW', 'MSW', 'NO', '::1', '2018-07-13 15:52:38', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `phn` varchar(20) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `isact` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phn`, `pwd`, `isact`) VALUES
(1, 'Rituraj Borgohain', '7002274743', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cand_id` (`cand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`cand_id`) REFERENCES `applicants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
