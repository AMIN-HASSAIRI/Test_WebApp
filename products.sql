-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 10:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pSku` varchar(255) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pPrice` float NOT NULL,
  `pType` varchar(255) NOT NULL,
  `pSize` int(11) NOT NULL,
  `pWeight` int(11) NOT NULL,
  `pHeight` int(11) NOT NULL,
  `pWidth` int(11) NOT NULL,
  `pLength` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pSku`, `pName`, `pPrice`, `pType`, `pSize`, `pWeight`, `pHeight`, `pWidth`, `pLength`) VALUES
(38, 'trffr-rerewe-ert', 'Frederic Under Attack', 16.99, 'DVD', 4042, 0, 0, 0, 0),
(39, 'fofof-fofofo-fof', 'Behind The Tree', 13.6, 'Book', 0, 13, 0, 0, 0),
(40, 'poipo-poipoi-poi', 'Table', 20.99, 'Furniture', 0, 0, 150, 90, 70),
(41, 'sdfsd-sdfsdf-sdf', 'Rocking Chair', 149.5, 'Furniture', 0, 0, 60, 50, 90),
(42, 'trffr-rerewe-ert', 'Face me!', 17, 'DVD', 700, 0, 0, 0, 0),
(43, 'asdas-asdasd-asd', 'To The Glory', 14.3, 'Book', 0, 1, 0, 0, 0),
(44, 'qweqw-qweqwe-qwe', 'Bookshelf', 199, 'Furniture', 0, 0, 200, 20, 200),
(45, 'zxczx-zxczxc-zxc', 'Mirror', 6, 'Furniture', 0, 0, 30, 1, 20),
(46, 'xcvxc-xcvxcv-xcv', 'Camillon', 23.2, 'Book', 0, 2, 0, 0, 0),
(47, 'cvbcv-cvbcvb-cvb', 'Sofa', 170, 'Furniture', 0, 0, 90, 80, 270),
(48, 'bnmbn-bnmbnm-bnm', 'Sunrise', 14, 'DVD', 2700, 0, 0, 0, 0),
(49, 'jkljk-jkljkl-jkl', 'Le Palace', 19.5, 'DVD', 3600, 0, 0, 0, 0),
(50, 'rfvrf-rfvrfv-rfv', 'The River', 7.9, 'Book', 0, 4, 0, 0, 0),
(51, 'edced-edcedc-edc', 'Chair', 18.9, 'Furniture', 0, 0, 70, 50, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
