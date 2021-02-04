-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 2 月 04 日 09:46
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d7_11`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) NOT NULL,
  `team` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `q1` varchar(128) DEFAULT NULL,
  `q2` varchar(128) DEFAULT NULL,
  `q3` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `team`, `image`, `q1`, `q2`, `q3`, `created_at`, `updated_at`) VALUES
(16, 'パンダ', 'どうぶつ', 'upload/202102040933001d73d16b73e06692a9f1b714ea2b37c4.jpg', '楽しい', '得意', '気になる', '2021-02-04 17:33:00', '2021-02-04 17:33:00'),
(17, 'ひつじ', 'どうぶつ', 'upload/20210204093425047126698cef7ece023f453e92c4b5f7.jpg', '楽しくない', '得意でない', '気にならない', '2021-02-04 17:34:25', '2021-02-04 17:34:25'),
(18, 'うさぎ', 'どうぶつ', 'upload/202102040937158c4551d794c58e42c219798667cb8dd2.jpg', '楽しくない', '得意', '気になる', '2021-02-04 17:37:15', '2021-02-04 17:37:15'),
(19, 'しまうま', 'どうぶつ', 'upload/20210204093936375024c7a78bc0ee18910821b83412b6.jpg', '楽しくない', '得意でない', '気になる', '2021-02-04 17:39:36', '2021-02-04 17:39:36'),
(20, 'ペリカン', 'とり', 'upload/20210204094046da76f2d151677ea3ae5405031ea114bf.jpg', '楽しい', '得意', '気になる', '2021-02-04 17:40:46', '2021-02-04 17:40:46'),
(21, 'からす', 'とり', 'upload/202102040941448309f12643107808d9fcdd0d03735e77.jpeg', '楽しくない', '得意でない', '気にならない', '2021-02-04 17:41:44', '2021-02-04 17:41:44');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
