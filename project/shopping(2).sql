-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2018 at 10:31 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'iphone'),
(2, ' samsung'),
(3, ' nokia');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `photo`, `cat_id`) VALUES
(17, 'iphone4', 'very recommended', 4000, '/uploads/1517945217.jpg', 1),
(18, 'iphonex', 'iPhone X ', 20000, '/uploads/1517948791.jpg', 1),
(19, 'iphone7', 'iPhone 7 and iPhone 7 Plus are smartphones designed, developed, and marketed by Apple Inc. They were announced on September 7, 2016, at the Bill Graham Civic Auditorium in San Francisco by Apple CEO Tim Cook, and were released on September 16, 2016.', 7000, '/uploads/1517943487.jpg', 1),
(20, 'Samsung S7', 'Samsung Galaxy S7 and Samsung Galaxy S7 Edge are Android smartphones manufactured and marketed by Samsung Electronics. The S7 series serves as the successor to the Galaxy S6, S6 Edge and S6 Edge+ released in 2015. ', 10000, '/uploads/1517943782.jpg', 2),
(21, 'Samsung S3', 't has additional software features, expanded hardware, and a redesigned physique from its predecessor, the Samsung Galaxy S II. The "S III" employs an intelligent personal assistant (S Voice), eye-tracking ability, and increased storage. ', 4000, '/uploads/1517943988.jpg', 2),
(22, 'lumia Nokia', 'Microsoft Lumia (previously the Nokia Lumia Series) is a former line of mobile devices that was originally designed and marketed by Nokia and later by Microsoft Mobile. Introduced in November 2011', 4500, '/uploads/1517946208.jpg', 3),
(23, 'LG XX500', 'The LG X500 is powered by 1.5GHz octa-core processor and it comes with 2GB of RAM. The phone packs 32GB of internal storage that can be expanded up to 2GB via a microSD card. As far as the cameras are concerned', 1000, '/uploads/1517945355.jpg', 5),
(25, 'LG 34', 'The LG V34 is a single SIM (GSM) smartphone that accepts a Nano-SIM. Connectivity options include Wi-Fi, GPS, Bluetooth, USB OTG, 3G and 4G. Sensors on the phone include Compass Magnetometer, Proximity sensor, Accelerometer', 7850, '/uploads/1517947654.jpg', 5),
(26, 'Nokia', 'Avaliable Now', 1500, '/uploads/1517948996.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `phone`) VALUES
(1, 'root', 'root@gmial.com', '1234567', '201030'),
(2, 'yasmine abdallah ', 'yasmin@gmail.com', '1234567', ''),
(3, 'yasmin gaber', 'yasmin@gmail.com', '1234567', '309010'),
(4, 'yasminaaa abdallah', 'yasminaa@gmail', '1234567', '202010'),
(5, 'youmna ibrahim', 'youmna@gmail.com', '1234567', '20103000'),
(6, 'mai ahmed', 'mai@ahmed.gmail.com', '1234567', '203010'),
(7, 'fadiahusen', 'fadia@gmail.com', '1234567', '201030');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
