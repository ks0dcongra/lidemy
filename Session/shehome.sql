-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-16 12:48:30
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shehome`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `id` int(128) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `content` varchar(128) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- 傾印資料表的資料 `comments`
--

INSERT INTO `comments` (`id`, `nickname`, `content`, `created_at`) VALUES
(15, 'Kerwin', '我是Kerwin，我很帥', '2023-06-09'),
(17, 'Andy', '我是Andy，我更帥!', '2023-06-09'),
(18, 'Andy', '<script>alert(\"我是Andy，我更帥!\");</script>', '2023-06-09'),
(19, 'Sidney', '<script>alert(document.cookie);</script>', '2023-06-09'),
(21, 'Sidney', '你好<script></script>', '2023-06-09'),
(22, '1', '<h1>你好!</h1>', '2023-06-09');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(128) DEFAULT NULL,
  `nickname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `nickname`, `username`, `password`) VALUES
(NULL, '1', '1', '$2y$10$dQg9JVhljWpvJHtMIlGLguE5ZrGbtzSjIZzz6v9fC3ISGff4Brs1O'),
(NULL, '1', '1', '$2y$10$Amyp5cgaJ1/AmcQc/JB6Vuvda5UL3QCnOpc1ErVtYgPcMIyoN12BG'),
(NULL, '1', '1', '$2y$10$epgDFpTve37pvwFBz0U4IeKQ45wcQxjwNFmc1WR3hCE31QQZx8BjK'),
(NULL, '2', '2', '$2y$10$bCXb4YGyxe6vin30mofgu.6cSz1f5x74EpoyvRX/wsa8v.L2.rlRq'),
(NULL, 'Kerwin', 'kerwin', '$2y$10$dQaG5DkQAZb38MxoA5hgleJj09PYVx5cRbXAYwxqqFopHP8RN.MEq'),
(NULL, 'Andy', 'andy', '$2y$10$Wko0jpBRbMSgOs8HMN5ybOeHN8MzpcEvCLBwHRB9/G67FVshb0cmy'),
(NULL, 'Sidney', 'Sidney', '$2y$10$T9xp5ENCqw3U3hrdYAeQFePuAIXyqJZDZ5ibv8JImxH8Tq9yBKsNi'),
(NULL, 'Sidney', 'Sidney', '$2y$10$rXxoCou2VeD9sOtH7FOYEOL.OYOPST0oH25lHZxyQiydbvr.FXrba');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
