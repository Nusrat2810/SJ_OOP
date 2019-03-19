-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 04:05 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sj`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `dd` datetime NOT NULL,
  `cmnt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`pid`, `cid`, `Email`, `dd`, `cmnt`) VALUES
(5, 19, 'alex@gmail.com', '2019-02-21 06:44:04', 'problem'),
(4, 277, 'nusu2810@gmail.com', '2019-02-21 06:44:41', 'doneeeeeeeee'),
(4, 346, 'nusu2810@gmail.com', '2019-03-07 12:43:04', 'comment with ajax done'),
(5, 347, 'nusu2810@gmail.com', '2019-03-07 12:43:28', ' comment show with ajax done'),
(5, 348, 'nusu2810@gmail.com', '2019-03-07 12:49:28', 'j'),
(4, 349, 'nusu2810@gmail.com', '2019-03-07 12:49:37', ' jk'),
(4, 350, 'nusu2810@gmail.com', '2019-03-07 12:50:48', 'dxc'),
(6, 351, 'nusu2810@gmail.com', '2019-03-08 11:31:26', 'ff'),
(17, 352, 'nusu2810@gmail.com', '2019-03-17 16:59:15', 'mhbh'),
(17, 353, 'nusu2810@gmail.com', '2019-03-17 17:46:48', 'kkkh'),
(17, 354, 'nusu2810@gmail.com', '2019-03-17 17:47:33', 'kk'),
(19, 355, 'nusu@gmail.com', '2019-03-18 07:52:46', 'kuh'),
(19, 356, 'nusu@gmail.com', '2019-03-18 07:52:46', 'kuh'),
(18, 357, 'nusu@gmail.com', '2019-03-18 07:52:54', ' kjhoi'),
(18, 358, 'nusu@gmail.com', '2019-03-18 07:52:55', ' kjhoi'),
(18, 359, 'nusu@gmail.com', '2019-03-18 07:54:40', 'j'),
(19, 360, 'nusu@gmail.com', '2019-03-18 08:04:14', 'testing comments'),
(19, 361, 'nusu2810@gmail.com', '2019-03-18 08:05:05', 'test2'),
(20, 362, 'nusu2810@gmail.com', '2019-03-18 08:06:17', 'ok'),
(20, 363, 'nusu@gmail.com', '2019-03-18 15:29:30', 'comment on welcome'),
(19, 364, 'nusu@gmail.com', '2019-03-18 15:29:40', ' doing ok'),
(21, 365, 'nusu2810@gmail.com', '2019-03-18 15:32:08', 'admin comment test'),
(20, 366, 'nusu2810@gmail.com', '2019-03-18 15:32:17', ' doing ok');

-- --------------------------------------------------------

--
-- Table structure for table `qs`
--

CREATE TABLE `qs` (
  `cat` varchar(250) NOT NULL,
  `qsn` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `dd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qs`
--

INSERT INTO `qs` (`cat`, `qsn`, `Email`, `id`, `dd`) VALUES
('testing ', 'admin_welcome.php', 'nusu2810@gmail.com', 20, '2019-03-18 08:05:20'),
('post', 'admin post test', 'nusu2810@gmail.com', 22, '2019-03-18 15:31:39'),
('js', 'what is ajax?', 'nusu@gmail.com', 23, '2019-03-17 16:10:00'),
('p1', 'test', 'nusu@gmail.com', 27, '2019-03-18 15:45:34'),
('p1', 'test', 'nusu@gmail.com', 29, '2019-03-18 15:55:54'),
('done', 'doneeeeeeeeeeeeeeeee', 'nusu2810@gmail.com', 30, '2019-03-18 16:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

CREATE TABLE `req` (
  `cat` varchar(250) NOT NULL,
  `qsn` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `dd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req`
--

INSERT INTO `req` (`cat`, `qsn`, `Email`, `id`, `dd`) VALUES
(' p3', 'test', 'nusu@gmail.com', 17, '2019-03-18 15:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Admin` int(11) NOT NULL DEFAULT '0',
  `Ban` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Password`, `Admin`, `Ban`) VALUES
(1, 'alex', 'alex@gmail.com', '7b8b965ad4bca0e41ab51de7b31363a1', 0, 1),
(2, 'nusu2212', 'nusu2212@gmail.com', '4c8b40018f893d4384fcfe60302cb46a', 1, 0),
(3, 'Nusrat Farzana', 'nusu2810@gmail.com', '5685dc0f607f78a329fa293e9401f977', 1, 0),
(4, 'nusu', 'nusu@gmail.com', '4c8b40018f893d4384fcfe60302cb46a', 0, 0),
(5, 'nb', 'kjhk', '4a5b47e079da271df772b75bb8e5164d', 0, 0),
(6, 'df', 'trhyh', 'a310f11db604130b5317512b0933ad1f', 1, 0),
(7, 'nusu', 'nusu2212@gmail', '4c8b40018f893d4384fcfe60302cb46a', 0, 0),
(8, 'index', 'index.php', '4c8b40018f893d4384fcfe60302cb46a', 1, 0),
(9, 'jknh', 'nusu2@gmail.com', '4c8b40018f893d4384fcfe60302cb46a', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `qs`
--
ALTER TABLE `qs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`Email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `qs`
--
ALTER TABLE `qs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `req`
--
ALTER TABLE `req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
