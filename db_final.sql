-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2019 at 02:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `conditions` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `brand`, `model`, `price`, `conditions`) VALUES
(1, 'apple', 'iphone x 64g', 900, 'good'),
(2, 'apple', 'iphone xr 64g', 599, 'Acceptable'),
(3, 'apple', 'ipad pro 64g', 799, 'very good'),
(4, 'apple', 'iphone xs max 64g', 1099, 'very good'),
(5, 'apple', 'iphone xs 64g', 999, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `account`, `password`, `address`, `email`) VALUES
(1, 'test1', 'test1', 'test1', '01 e prince rd', '01@gmail.com'),
(2, 'test2', 'test2', 'test2', '02 e prince rd', '02@gmail.com'),
(3, 'test3', 'test3', 'test3', '03 e prince rd', '03@gmail.com'),
(4, 'test4', 'test4', 'test4', '04 e prince rd', '04@gmail.com'),
(5, 'test5', 'test5', 'test5', '05 e prince rd', '05@gmail.com'),
(6, 'test6', 'test6', 'test6', '06 e prince rd', '06@gmail.com'),
(7, 'test7', 'test7', 'test7', '07 e prince rd', '07@gmail.com'),
(8, 'test8', 'test8', 'test8', '08 e prince rd', '08@gmail.com'),
(9, 'test9', 'test9', 'test9', '09 e prince rd', '09@gmail.com'),
(10, 'test10', 'test10', 'test10', '10 e prince rd', '10@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
