-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 10.1.35-MariaDB
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account_infos`
--

CREATE TABLE `account_infos` (
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `account_infos`
--

INSERT INTO `account_infos` (`account`, `name`, `gender`, `birthday`, `email`, `remark`) VALUES
('Apple555', '蘋果', 'female', '1999-02-17', 'apple0208@gmail', '123'),
('asd1', '苗一', 'female', '1977-01-01', 'asd1@mail', NULL),
('ccc2', '郝盟', 'male', '1994-02-02', 'ccc2@mail', NULL),
('ddoo', '陳奕', 'male', '1994-10-10', 'ddoo@gmail', '測試1'),
('eergdd2', '國系', 'female', '1995-07-04', 'eerr@mail', NULL),
('njp 5', '孫之', 'female', '1996-10-10', 'njp@gmail', '測試2'),
('test10', 'name10', 'female', '1999-01-10', 'amail10@gmail', ''),
('test11', 'name11', 'female', '1999-01-11', 'amail11@gmail', ''),
('test2', 'name2', 'female', '1999-01-02', 'amail2@gmail', ''),
('test3', 'name3', 'female', '1999-01-03', 'amail3@gmail', ''),
('test4', 'name4', 'female', '1999-01-04', 'amail4@gmail', '2021/01/05改'),
('test5', 'name5', 'female', '1999-01-05', 'amail5@gmail', ''),
('test6', 'name6', 'female', '1999-01-06', 'amail6@gmail', ''),
('test7', 'name7', 'female', '1999-01-07', 'amail7@gmail', ''),
('test8', 'name8', 'female', '1999-01-08', 'amail8@gmail', ''),
('test9', 'name9', 'female', '1999-01-09', 'amail9@gmail', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account_infos`
--
ALTER TABLE `account_infos`
  ADD PRIMARY KEY (`account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
