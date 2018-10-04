-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- 主機: dbhome.cs.nctu.edu.tw
-- 產生時間： 2015 年 05 月 07 日 23:49
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
-- 資料表結構 `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `user_id` int(11) NOT NULL,
  `recruit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
`id` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `user_id` int(11) NOT NULL,
  `recruit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(1, 'Taipei'),
(2, 'Tauyuan'),
(3, 'Taichung'),
(4, 'Tainan'),
(5, 'Kaohsiung');

-- --------------------------------------------------------

--
-- 資料表結構 `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
`id` int(11) NOT NULL,
  `occupation` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `occupation`
--

INSERT INTO `occupation` (`id`, `occupation`) VALUES
(1, 'teacher'),
(2, 'sailor'),
(3, 'translator'),
(4, 'tailor'),
(5, 'actor/actress');

-- --------------------------------------------------------

--
-- 資料表結構 `recruit`
--

CREATE TABLE IF NOT EXISTS `recruit` (
`id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL COMMENT 'who posted this job information',
  `occupation_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `working_time` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL COMMENT 'educational background requirement',
  `experience` int(11) NOT NULL COMMENT 'minimum of working  experience',
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
`id` int(11) NOT NULL,
  `specialty` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `specialty`
--

INSERT INTO `specialty` (`id`, `specialty`) VALUES
(1, 'accounting'),
(2, 'beauty'),
(3, 'building & construction'),
(4, 'design'),
(5, 'education');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL COMMENT 'highest education',
  `expected_salary` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `user_specialty`
--

CREATE TABLE IF NOT EXISTS `user_specialty` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL COMMENT 'what kind of specialty does the user(job seeker) have'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `application`
--
ALTER TABLE `application`
 ADD KEY `user_id` (`user_id`), ADD KEY `recruit_id` (`recruit_id`);

--
-- 資料表索引 `employer`
--
ALTER TABLE `employer`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `favorite`
--
ALTER TABLE `favorite`
 ADD KEY `user_id` (`user_id`), ADD KEY `recruit_id` (`recruit_id`);

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `occupation`
--
ALTER TABLE `occupation`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `recruit`
--
ALTER TABLE `recruit`
 ADD PRIMARY KEY (`id`), ADD KEY `employer_id` (`employer_id`), ADD KEY `employer_id_2` (`employer_id`), ADD KEY `occupation_id` (`occupation_id`), ADD KEY `location_id` (`location_id`);

--
-- 資料表索引 `specialty`
--
ALTER TABLE `specialty`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_specialty`
--
ALTER TABLE `user_specialty`
 ADD PRIMARY KEY (`id`), ADD KEY `specialty_id` (`specialty_id`), ADD KEY `user_id` (`user_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `employer`
--
ALTER TABLE `employer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `location`
--
ALTER TABLE `location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `occupation`
--
ALTER TABLE `occupation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `recruit`
--
ALTER TABLE `recruit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `specialty`
--
ALTER TABLE `specialty`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `user_specialty`
--
ALTER TABLE `user_specialty`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `application`
--
ALTER TABLE `application`
ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`recruit_id`) REFERENCES `recruit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `favorite`
--
ALTER TABLE `favorite`
ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`recruit_id`) REFERENCES `recruit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `recruit`
--
ALTER TABLE `recruit`
ADD CONSTRAINT `recruit_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `recruit_ibfk_2` FOREIGN KEY (`occupation_id`) REFERENCES `occupation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `recruit_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `user_specialty`
--
ALTER TABLE `user_specialty`
ADD CONSTRAINT `user_specialty_ibfk_1` FOREIGN KEY (`specialty_id`) REFERENCES `specialty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_specialty_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
