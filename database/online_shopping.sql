-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307:3307
-- Generation Time: Nov 30, 2020 at 07:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_admin_to_product_management` (IN `admin` VARCHAR(30), IN `product_id` INT UNSIGNED)  MODIFIES SQL DATA
IF EXISTS(SELECT `username` FROM `user` WHERE `username` = admin AND `user_type` = 'admin')
THEN
	INSERT INTO `admin_management` VALUES (admin, product_id);
    SELECT 'TRUE';
ELSE     
	SELECT 'FALSE';
END IF$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_management`
--

CREATE TABLE `admin_management` (
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_management`
--

INSERT INTO `admin_management` (`username`, `product_id`) VALUES
('ngoquithu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `transaction_id` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `payment_method` enum('cash','card','qr') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cart_content`
--

CREATE TABLE `cart_content` (
  `transaction_id` datetime NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(3, 'case'),
(1, 'computer'),
(6, 'cpu'),
(2, 'monitor'),
(4, 'motherboard'),
(5, 'smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(20) COLLATE utf8_bin DEFAULT 'unknown',
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `model` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `availability` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `brand`, `name`, `model`, `price`, `availability`, `category_id`) VALUES
(1, 'DELL', 'XPS 13 (2019)', '9260', 10000000, 100, 1),
(2, 'SAMSUNG', 'GALAXY NOTE 20', 'SM-6969', 20000000, 10, 5),
(3, 'DELL', 'ULTRASHARP 24\"', 'U24Z17ABCD', 4499000, 50, 2),
(4, 'NZXT', 'H500 Mid Tower Case', 'H500', 1499000, 100, 3),
(5, 'ASUS', 'Z490 ROG STRIX DITMEMAY WIFI', 'Z490ROGDMMAC', 699000, 5, 4),
(7, 'AMD', 'RYZEN 5 6969X 5.0GHZ', 'R5-6969XOC', 7500000, 55, 6),
(8, 'SAMSUNG', 'GALAXY NOTE 21', 'SM-6970', 20000000, 10, 5),
(9, 'GOOGLE', 'PIXEL 5XL 64GB', 'P5XL-64', 10000000, 1, 5),
(11, 'NZXT', 'H510i Mid Tower Case', 'H510i', 2499000, 90, 3),
(12, 'ASUS', 'ROG SWIFT PG258Q 240Hz Gaming Monitor ', 'PG258Q', 10000000, 10, 2),
(13, 'SAMSUNG', 'ODESSEY G7 Curved Gaming Monitor', 'LC27G75TQSUXEN', 20000000, 5, 2),
(14, 'INTEL', 'CORE i9-10900K Processor', 'i9-10900K', 12000000, 50, 6),
(15, 'AMD', 'RYZEN 5 5600X 5.0GHZ', 'R5-5600X', 7900000, 100, 6),
(100, 'GOOGLE', 'PIXEL 5 64GB', 'P5-64', 10000000, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `national_id` varchar(12) COLLATE utf8_bin NOT NULL,
  `privilege` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_type` enum('customer','admin') COLLATE utf8_bin NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `address`, `first_name`, `last_name`, `national_id`, `privilege`, `user_type`) VALUES
('charleswhite', 'charleswhite', 'charleswhite@youtube.com', 'Florida', 'Charles', 'White', '091838', 1, 'customer'),
('hoanghatuandung', '*B158DC35B87F7B7369C709E89704DED73EBA40DC', 'dung.hoang190699@hcmut.edu.vn', 'Trash Can', 'Dũng', 'Hoàng', '69', 1, 'customer'),
('lequangtrai', 'lequangtrai', '1656969@hcmut.edu.vn', 'School', 'Trải', 'Lê', '045314', 100, 'admin'),
('ngonguyenduyan', 'ngonguyenduyan', 'anngo@hcmut.edu.vn', 'Small house', 'An', 'Ngô', '45', 1, 'customer'),
('ngoquithu', '*B5BD631632EE0CC970CF97DC9F4132D54F632D87', 'thu.ngo@onlineshopping.com', 'Database Server', 'Thụ', 'Ngô', '164', 100, 'admin'),
('thangphuvinh', '*B71BB483C492103E068DEE81B88373E6B747E630', 'vinhthang@hcmut.edu.vn', 'Hospital', 'Vinh', 'Thang', '100', 1, 'customer'),
('trinhmaiduy', '*8FBB4C53C5131236982A1D58115C081590916A53', 'duytrinh@hcmut.edu.vn', 'Big house', 'Duy', 'Trịnh', '44', 1, 'customer'),
('vohoangtri', '*E0F96D0594C6D88F61AB06A4134802BAF3C875F9', 'tri.vo.emailtaobiara@hcmut.edu.vn', 'Dumpster', 'Trí', 'Võ', '70', 1, 'customer'),
('vuthanhdat', '*DD3242B8E4D5106A56D64F584DCAC7C39178975D', 'datvuhaha@lmfao.nk', 'House', 'Đạt', 'Vũ', '343', 100, 'admin');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `check_admin_for_privilege` BEFORE INSERT ON `user` FOR EACH ROW IF NEW.user_type = 'admin'
THEN
	SET NEW.privilege = 100;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `password_hashing` BEFORE INSERT ON `user` FOR EACH ROW SET NEW.password = PASSWORD(NEW.password)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_management`
--
ALTER TABLE `admin_management`
  ADD PRIMARY KEY (`username`,`product_id`),
  ADD KEY `fk_product_id_idx` (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `cart_content`
--
ALTER TABLE `cart_content`
  ADD PRIMARY KEY (`transaction_id`,`product_id`),
  ADD KEY `transaction_id_idx` (`transaction_id`),
  ADD KEY `product_id_idx` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `model_UNIQUE` (`model`),
  ADD KEY `fk_product_category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `national_id_UNIQUE` (`national_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_management`
--
ALTER TABLE `admin_management`
  ADD CONSTRAINT `fk_admin_management_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_admin_management_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `cart_content`
--
ALTER TABLE `cart_content`
  ADD CONSTRAINT `fk_cart_content_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_cart_content_transaction_id` FOREIGN KEY (`transaction_id`) REFERENCES `cart` (`transaction_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
