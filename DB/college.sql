-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 08:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `middlename` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `fathername` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `mothername` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `gender` char(10) COLLATE utf8_croatian_ci NOT NULL,
  `branch` char(10) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_croatian_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` text COLLATE utf8_croatian_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `passportphoto` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `fathername`, `mothername`, `gender`, `branch`, `email`, `birthday`, `address`, `district`, `country`, `passportphoto`) VALUES
(85, 'efgregre', 'wegwerg', 'ewgwegweg', 'bebsrsnrn@123', 'QW!@34rf', 'ettntrnntrnrt', 'sdvdfnjyktym', 'male', 'ME', 'brtnku@umuy.com', '2020-02-22', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'baleswar', 'australia', ''),
(86, 'dvfv', '', 'evvev', 'gvgvhvih567', 'AS!@34er', 'kjhtfder', 'aa', 'female', 'ME', 'krishhna098@gmail.com', '2020-02-13', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(87, 'dsav lj skl', '', 'evvev', 'jhyt56', 'A!@We34er', 'afdbbe fdvv', 'tetntr', 'male', 'IT', 'brtnku@umuy.com', '2020-02-13', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(88, 'dvfv', '', 'vjlnkb', 'hgbvj78', 'AQ!@45ty', 'ettntrnntrnrt', '', 'male', 'IT', 'krishnaagarwall098@gmail.com', '2020-02-14', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(89, 'gjkggh', '', 'evvev', 'jhdugwdu6768', 'SDFCV%^ty32', 'afdbbe fdvv', 'sdvdfnjyktym', 'male', 'ME', 'krishhna098@gmail.com', '2020-02-19', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(90, 'dvfv', '', 'evvev', 'rrgreg56', 'XC@#gh56', 'ettntrnntrnrt', 'tetntr', 'female', 'ME', 'krishhna098@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(91, 'dvfv', '', 'evvev', 'vdsvb bda24rt43', '!@#WE234tg', 'afdbbe fdvv', 'tetntr', 'female', 'ME', 'plinkan1996@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(92, 'dvfv', 'ghjiki', 'evvev', 'bebsrsnrn@12389', 'WE#$56ty', 'afdbbe fdvv', '', 'female', 'CSE', 'plinkan1996@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(93, 'dvfv', '', 'evvev', 'wqdqwq234', 'SD$^fre23@', 'afdbbe fdvv', '', 'male', 'ME', 'brtnku@umuy.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'images.jpg'),
(94, 'dvfv', '', 'evvev', 'df45', 'XC@34rf', '', '', 'male', 'ME', 'xc@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'images.jpg'),
(95, 'dvfv', '', 'evvev', 'bebsrsnrn@123frer', 'AQ!@#ed4dd', '', '', 'male', 'IT', 'xc@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'photo-1535982330050-f1c2fb79ff78 (1).jpg'),
(96, 'dvfv', '', 'evvev', 'ergerge332', 'AQ!@#45ty', '', '', 'male', 'IT', 'brtnku@umuy.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'photo-1524202503253-d461ec0ece86.jpg'),
(97, 'dvfv', '', 'evvev', 'rutuparna209422', 'AS123AS34rf', '', '', 'male', 'ME', 'brtnku@umuy.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(98, 'wwqqwef', '', 'qfqwfqwe', 'rutuparna2094fqfqef', 'AS@#456ty', '', '', 'male', 'IT', 'brtnku@umuy.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(99, 'dvfv', '', 'evvev', 'dfsdf345', 'AS@#123ert', '', '', 'male', 'IT', 'krishhna098@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'images.jpg'),
(100, 'dvfv', '', 'evvev', 'rutuparna2094889', 'AS!@345rf', '', '', 'male', 'ME', 'krishhna098@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'photo-1509635164051-5584296265cd.jpg'),
(101, 'fefwf', '', 'ewfwew', 'ewfewwwe', 'XC%$#@77hb4', '', '', 'male', 'ME', 'krishhna098@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', ''),
(102, 'dvfv', 'fashjyuklr', 'vjlnkb', '211r321rrgg', '!@WDE#234r', '', '', 'male', 'IT', 'brtnku@umuy.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'pdf.pdf'),
(103, 'dvfv', '', 'uu', 'wdwdqwdq', '!@#ED45tg', '', '', 'male', 'ME', 'krishhna098@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'photo-1514513452089-17f8a9771ee8.jpg'),
(104, 'wdqwdqw', '', 'wqdqwdqw', 'wqdwqdwq', 'AS@!#dr5', '', '', 'male', 'ME', 'brtnku@umuy.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', NULL),
(105, 'csacsaca', '', 'scacasc', 'ascsaac', '%^FGr43e', '', '', 'male', 'ME', 'plinkan1996@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'photo-1514513452089-17f8a9771ee8.jpg'),
(106, 'scsacasc', '', 'scascas', 'acsasca', 'ZX$#ft56', '', '', 'male', 'CSE', 'brtnku@umuy.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'pdf.pdf'),
(107, 'dvfv', '', 'uu', 'fvevreew', '!@#SW45r', '', '', 'male', 'ME', 'krishhna098@gmail.com', '0000-00-00', 'At-kargil chowk,deogwrh po/dist-Deogarh Odisha', 'anugul', 'australia', 'stock-photo-150595123.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
