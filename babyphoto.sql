-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 12, 2022 lúc 08:34 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `babyphoto`
--
CREATE DATABASE IF NOT EXISTS `babyphoto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `babyphoto`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `phone`, `firstName`, `lastName`) VALUES
(1, 'admin', '123456', 'admin@gmail.com', '0987654321', 'tran', 'duc'),
(3, 'admin1', '123456', 'admin@gmail.com', '0987654321', 'tran', 'duc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `createDate` date NOT NULL DEFAULT current_timestamp(),
  `lastUpdateTime` date NOT NULL DEFAULT current_timestamp(),
  `gender` int(2) NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `totalImage` int(10) NOT NULL DEFAULT 0,
  `relation` int(2) NOT NULL,
  `idCreateUser` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `albums`
--

INSERT INTO `albums` (`id`, `name`, `createDate`, `lastUpdateTime`, `gender`, `birthday`, `totalImage`, `relation`, `idCreateUser`) VALUES
(2, 'album 1', '2022-08-13', '2022-08-13', 1, '2022-03-04', 0, 1, 1),
(3, 'album 2', '2022-08-13', '2022-08-13', 1, '2022-03-04', 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `albumId` int(20) NOT NULL,
  `urlImage` varchar(500) NOT NULL,
  `createDate` date NOT NULL DEFAULT current_timestamp(),
  `userUpload` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `albumId`, `urlImage`, `createDate`, `userUpload`, `description`) VALUES
(1, 2, 'https://i.pinimg.com/474x/9f/da/3e/9fda3e54d878b2a52b5ae15a682630a6.jpg', '2022-08-13', 'admin', 'anh test ne'),
(2, 2, 'https://i.pinimg.com/474x/b1/f0/41/b1f0412cf6c8699b66395c029c02a44c.jpg', '2022-08-13', 'admin', 'anh test 2'),
(3, 3, 'https://i.pinimg.com/474x/6a/44/5f/6a445fb1067e72b1a6e5a8f9d9e37d57.jpg', '2022-08-13', 'admin', 'anh test album 3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
