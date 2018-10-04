-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- 主機: dbhome.cs.nctu.edu.tw
-- 產生時間： 2015 年 04 月 24 日 19:10
-- 伺服器版本: 5.6.21-log
-- PHP 版本： 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `annie0111279_cs`
--

-- --------------------------------------------------------

--
-- 資料表結構 `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
`id` int(11) NOT NULL,
  `specialty` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `specialty`
--

INSERT INTO `specialty` (`id`, `specialty`) VALUES
(1, 'Accounting'),
(2, 'Beauty'),
(3, 'Building & Construction'),
(4, 'Design'),
(5, 'Education'),
(6, 'Finance/Investment'),
(7, 'Information Technology'),
(8, 'Insurance');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `specialty`
--
ALTER TABLE `specialty`
 ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `specialty`
--
ALTER TABLE `specialty`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
