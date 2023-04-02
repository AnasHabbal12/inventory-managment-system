-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 فبراير 2022 الساعة 10:53
-- إصدار الخادم: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `lab_order` varchar(50) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `lab_order`, `date_order`) VALUES
(1, 'new Order', '2021-12-01'),
(2, 'skr;l', '0000-00-00'),
(3, 'mcvxvf', '0000-00-00'),
(4, 'nsdlkjf', '2022-01-09'),
(5, 'ksdfm;lds', '2022-01-09'),
(6, 'sadmfkls', '2022-01-10'),
(7, 'mcsdl', '2022-01-10'),
(8, 'mkndslc', '2022-01-10'),
(9, 'dskafmls', '2022-01-10'),
(10, 'sldfv,', '2022-01-10'),
(11, ' mxv,ds', '2022-01-10'),
(12, 'lc,;zdsa,', '2022-01-10'),
(13, ' mc,sd', '2022-01-10'),
(14, 'mkdslfmlsm', '2022-01-10'),
(15, 'dkfgsl', '2022-01-10'),
(16, 'nm.lds', '2022-01-10'),
(17, 'skdmf;sl', '2022-01-10'),
(18, 'jnsakld', '2022-01-10'),
(19, ' smdf', '2022-01-10'),
(20, 'mlkasdfk', '2022-01-10'),
(21, 'fsnkgl', '2022-01-10'),
(22, 'mams;lkd;', '2022-01-10'),
(23, 'lasf', '2022-01-10'),
(24, 'wser', '2022-01-10'),
(25, '12', '2022-01-10'),
(26, 'msd.f,s.', '2022-01-11'),
(27, 'mas.d.a', '2022-01-11'),
(28, ' sdm,fc.', '2022-01-11'),
(29, 'ewrrl;w', '2022-01-11'),
(30, 'Order', '2022-01-11'),
(31, 'mfskd.', '2022-01-11'),
(32, 'md.fc', '2022-01-11'),
(33, 'mlsdf', '2022-01-11'),
(34, ' cmdsk', '2022-01-11'),
(35, 'kasmmdla', '2022-01-11'),
(36, '2', '2022-01-11'),
(37, 'sdmf,', '2022-01-12'),
(38, 'dskmfl', '2022-01-12'),
(39, 'vdsf', '2022-01-12');

-- --------------------------------------------------------

--
-- بنية الجدول `order_detailes`
--

CREATE TABLE `order_detailes` (
  `id` int(11) NOT NULL,
  `id_prder` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `order_detailes`
--

INSERT INTO `order_detailes` (`id`, `id_prder`, `qte`, `id_product`, `id_user`, `price`) VALUES
(1, 1, 1, 2, 3, 12),
(2, 2, 3, 2, 3, 34),
(28, 24, 3423, 1, 3, 124),
(29, 24, 311, 1, 3, 111),
(30, 24, 0, 1, 3, 0),
(31, 25, 213, 1, 3, 123),
(32, 26, 0, 1, 3, 0),
(33, 27, 0, 1, 3, 0),
(34, 28, 0, 1, 3, 0),
(35, 29, 3, 1, 3, 12),
(36, 30, 3, 1, 3, 12),
(37, 31, 0, 1, 3, 0),
(38, 32, 0, 1, 3, 0),
(39, 38, 3, 1, 3, 3),
(40, 39, 1, 1, 3, 1),
(41, 39, 1, 2, 3, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `lab_prod` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `lab_prod`, `price`, `image`, `cat`, `qte`) VALUES
(1, 'Samsung A10', 150, 'a10.jpg', 'Mobile', 9),
(2, 'Samsung A1', 312, 'a10.jpg', 'Mobile', 9);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'anas', 'habbal', 'anas.habbal@gmail.com', 'MTIzNDU=', '2021-12-10', '2021-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detailes`
--
ALTER TABLE `order_detailes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prder` (`id_prder`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_detailes`
--
ALTER TABLE `order_detailes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `order_detailes`
--
ALTER TABLE `order_detailes`
  ADD CONSTRAINT `order_detailes_ibfk_1` FOREIGN KEY (`id_prder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detailes_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_detailes_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
