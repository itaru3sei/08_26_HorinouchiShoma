-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.37-MariaDB
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
-- Database: `gs_f02_db26`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(1, 'name1', 'url1', 'comment1', '2019-02-03 14:04:49'),
(2, 'name2', NULL, 'comment2', '2019-02-03 14:06:16'),
(3, 'name3', 'url3', NULL, '2019-02-03 14:06:16'),
(4, 'name4', NULL, NULL, '2019-02-03 14:06:16'),
(5, 'test01', 'https://www.facebook.com/', 'comment01', '2019-02-03 14:58:13'),
(6, 'test02', '', '', '2019-02-03 14:59:55'),
(7, 'aaa', '', 'commentcomment!', '2019-02-03 15:37:57'),
(8, 'DJnarikinn', 'http://aaaaa.com', 'あああああ', '2019-02-05 17:03:29'),
(9, 'DJnarikinn', 'http://aaaaa.com', 'あああああ', '2019-02-05 17:05:31'),
(25, 'ああ', '', '', '2019-02-05 18:08:15'),
(26, 'DJnarikinn', '', 'narikinnarikin', '2019-02-06 20:48:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `moisture_table`
--

CREATE TABLE `moisture_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `moisture` float NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `moisture_table`
--

INSERT INTO `moisture_table` (`id`, `name`, `moisture`, `comment`, `indate`) VALUES
(7, '1', 0.3, '', '2019-02-13 10:08:06'),
(9, '2', 0.2, '', '2019-02-13 14:45:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `php02_table`
--

CREATE TABLE `php02_table` (
  `id` int(12) NOT NULL,
  `task` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `indate`) VALUES
(1, '課題更新', '2019-02-07', '難しい更新', '0000-00-00 00:00:00'),
(5, '課題04', '2019-01-04', 'tatituteto', '2019-02-02 15:25:15'),
(6, '課題05', '2019-01-05', 'aiueo', '2019-02-02 15:25:50'),
(7, '課題06', '2019-01-06', 'aiueo', '2019-02-02 15:26:15'),
(8, '課題07', '2019-01-07', NULL, '2019-02-02 15:26:55'),
(9, '課題08', '2019-01-08', NULL, '2019-02-02 15:26:55'),
(10, '課題09', '2019-01-09', NULL, '2019-02-02 15:26:55'),
(11, 'aaa', '2019-02-02', 'aafds', '2019-02-02 16:29:49'),
(12, 'aiueo', '2019-02-06', 'fhjdkasl', '2019-02-02 16:30:53'),
(13, 'fdja;lj', '2019-02-12', 'jfla;dsk', '2019-02-02 16:31:57'),
(14, 'aiueokakikicukecosasisusesotatituteto', '2019-02-09', 'hdfajdsal;jfld', '2019-02-09 14:41:34'),
(15, 'aaa', '2019-02-09', 'fjadl;kj', '2019-02-09 15:32:56');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'DJnarikin', 'user', 'pass', 0, 0),
(2, 'test_user1', 'test', 'pass', 0, 0),
(4, 'test_user2', 'id02', 'pass02', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moisture_table`
--
ALTER TABLE `moisture_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `moisture_table`
--
ALTER TABLE `moisture_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
