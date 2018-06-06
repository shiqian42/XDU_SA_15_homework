-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-11 16:18:23
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuozuo`
--

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE `books` (
  `book_name` varchar(256) NOT NULL,
  `book_info` varchar(5000) NOT NULL,
  `book_isbn` varchar(64) NOT NULL,
  `book_left` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time_stamp` date NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`book_name`, `book_info`, `book_isbn`, `book_left`, `price`, `time_stamp`, `uid`) VALUES
('12412', 'Type the info here.', '21421', 123, 12, '2021-06-09', 16),
('lk;dsjfa', 'Type the info here.', 'dslfaj;', 12, 12, '2017-06-09', 15),
('11', 'Type the info here.', '11', 11, 11, '2017-06-09', 14);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `uid` bigint(20) NOT NULL,
  `book_name` varchar(512) NOT NULL,
  `book_isbn` varchar(128) NOT NULL,
  `book_price` int(11) NOT NULL,
  `user_name` varchar(512) NOT NULL,
  `user_mail` varchar(128) NOT NULL,
  `user_address` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `username` char(8) NOT NULL,
  `passcode` char(8) NOT NULL,
  `userflag` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `account` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`username`, `passcode`, `userflag`, `name`, `mail`, `address`, `account`) VALUES
('admin', '307zuo', 1, '', '', '', 0),
('zl', '123456', 1, 'Zhi Lu', 'zl@zuozuo.com', '0', 0),
('zh', '123456', 1, 'Zhang He', 'zh@zuozuo.com', '0', 0),
('cm', '123456', 1, 'Cao Meng', 'cm@zuozuo.com', '0', 0),
('zll', '111', 0, 'zll', 'shshsh', '42', 1111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `books`
--
ALTER TABLE `books`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
