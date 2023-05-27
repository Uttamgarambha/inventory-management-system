-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 12:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`name`, `email`, `subject`, `message`) VALUES
('Uttam Patel', 'uttam@gmail.com', 'Website Design', 'Hey Team ..!\r\nYour Website Design was awsome buddy...\r\nkeep it up..'),
('Krishna', 'krishna@gmail.com', 'Feature', 'well Features are there...'),
('parth', 'parth@gmail.com', 'just for testing', 'hello..'),
('jay', 'jay@gmail.com', 'greetings', 'how are you?'),
('uttam', 'uttam@gmail.com', 'how', 'hey hello'),
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_list`
--

DROP TABLE IF EXISTS `customer_list`;
CREATE TABLE `customer_list` (
  `customer_id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_list`
--

INSERT INTO `customer_list` (`customer_id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'c1', 'c1@gmail.com', 5445511, 'karunasagar');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_list`
--

DROP TABLE IF EXISTS `inventory_list`;
CREATE TABLE `inventory_list` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(7) NOT NULL,
  `quantity` int(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_list`
--

INSERT INTO `inventory_list` (`id`, `name`, `category`, `price`, `quantity`, `date`) VALUES
(3, 'p3', 'c3', 40, 40, '2023-02-01'),
(8, 'p1', 'c6', 50, 22, '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `order_id` int(3) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `order_quantity` int(5) NOT NULL,
  `order_price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `customer_name`, `order_date`, `order_quantity`, `order_price`) VALUES
(1, 'c1', '2021-01-22', 0, 0),
(2, 'c2', '2022-04-30', 100, 5000),
(4, 'c4', '2022-08-05', 130, 1500),
(5, 'c5', '2021-09-14', 1000, 40000),
(6, 'c6', '2022-04-27', 54, 4120);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`) VALUES
('uttam', 'uttam@gmail.com', 'uttam123'),
('keval', 'keval@gmail.com', 'keval123'),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('pareshbhai', 'pareshbhai@gmail.com', 'paresh12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
