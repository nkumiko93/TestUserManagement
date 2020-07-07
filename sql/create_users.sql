-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 7 月 07 日 10:44
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `caketest`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_code` varchar(6) NOT NULL COMMENT 'ユーザコード',
  `password` varchar(255) NOT NULL COMMENT 'パスワード',
  `user_name` varchar(255) NOT NULL COMMENT '氏名',
  `user_kana` varchar(255) DEFAULT NULL COMMENT '氏名カナ',
  `department` varchar(255) NOT NULL COMMENT '部署',
  `birth_date` date DEFAULT NULL COMMENT '生年月日',
  `join_date` date NOT NULL COMMENT '入職日',
  `retire_date` date DEFAULT NULL COMMENT '退職日',
  `employment_status` tinyint(4) NOT NULL COMMENT '雇用形態',
  `created` datetime DEFAULT NULL COMMENT '作成日',
  `updated` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ユーザー情報管理テーブル';

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `user_code`, `password`, `user_name`, `user_kana`, `department`, `birth_date`, `join_date`, `retire_date`, `employment_status`, `created`, `updated`) VALUES
(6, 'EMP101', '$2y$10$PWL6h6uoLqnskq7kna7/Ru7f/7zTyZC5xVrdRP6.Uj0PMVVJcllM6', 'サイオン　百一', 'サイオン　ヒャクイチ', '開発', '1958-08-30', '2007-03-01', '2018-09-30', 2, '2020-07-06 05:34:04', NULL),
(7, 'EMP102', '$2y$10$sLPw356vcrw2G98iFFpgtu7Sxf7PJebX4uVv893gJNshp/KVcjA0G', 'サイオン　百二', 'サイオン　ヒャクニ', 'CTI', NULL, '2011-09-01', NULL, 2, '2020-07-06 05:38:55', NULL),
(8, 'EMP103', '$2y$10$jQMSgvq5krqzpKawL4.jZebEz9UcCwyD1oOz5Vp92D3R5E3aTWvh2', 'サイオン　百三', 'サイオン　ヒャクサン', '総務', NULL, '2006-06-01', NULL, 3, '2020-07-06 06:11:37', NULL),
(9, 'EMP104', '$2y$10$GKe68ysgP2TBE32eidJzJ.r5npvdHtTG4H1FoVNql.2mXVTgFHmzu', 'サイオン　百四', 'サイオン　ヒャクヨン', 'ネットワーク', NULL, '2008-07-01', '2016-08-30', 1, '2020-07-06 06:39:36', NULL),
(10, 'EMP105', '$2y$10$KYLDI7Y6gwVICIsMy6NFF.UGoxb9zj/C4xKXgcNsYArhNUNzIAPnS', 'サイオン　百五', 'サイオン　ヒャクゴ', 'ネットワーク', NULL, '2000-10-01', NULL, 1, '2020-07-06 08:16:33', NULL),
(12, 'EMP106', '$2y$10$ZyNFUJPJfocP0njA9bBNhui.PHoPy/4HxGIls.Co0vj33eK5eFR2O', '最恩　百六', 'サイオン　ヒャクロク', 'ネットワーク', NULL, '2011-04-01', '2019-05-31', 2, '2020-07-07 07:57:33', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_code` (`user_code`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;
