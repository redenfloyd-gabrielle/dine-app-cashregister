-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 06:16 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinedb`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `cart`
-- (See below for the actual view)
--
CREATE TABLE `cart` (
`order_item_id` int(11)
,`order_item_qty` int(11)
,`order_item_subtotal` float
,`product_id` int(11)
,`product_image` varchar(30)
,`product_name` varchar(30)
,`product_description` varchar(50)
,`product_price` float
,`ordered_id` int(11)
,`ordered_time` timestamp
,`ordered_qr_code` int(11)
,`ordered_total` float
);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `ordered_id` int(11) NOT NULL,
  `ordered_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ordered_qr_code` int(11) NOT NULL,
  `ordered_status` enum('pending','scanned','expired') DEFAULT 'pending',
  `ordered_total` float NOT NULL DEFAULT '0',
  `ordered_guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_item_qty` int(11) NOT NULL,
  `order_item_subtotal` float NOT NULL DEFAULT '0',
  `order_item_product_id` int(11) NOT NULL,
  `order_item_ordered_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(30) NOT NULL DEFAULT 'assets/images/rice.png',
  `product_name` varchar(30) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_availability` enum('AVAILABLE','NOT AVAILABLE') NOT NULL DEFAULT 'AVAILABLE',
  `product_category` enum('DRINKS','RICE MEAL','SOUP','MAIN COURSE','EXTRAS') NOT NULL,
  `product_created_by` int(11) NOT NULL,
  `product_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_modified_by` int(11) NOT NULL,
  `product_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_image`, `product_name`, `product_description`, `product_price`, `product_availability`, `product_category`, `product_created_by`, `product_created_on`, `product_modified_by`, `product_modified_on`) VALUES
(990001, 'assets/images/rice.png', 'Nature Spring ', '250ml', 10, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:04:43', 17001, '2018-01-02 16:04:44'),
(990002, 'assets/images/rice.png', 'Nature Spring  500 ml', '500 ml', 15, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:05:09', 17001, '2018-01-02 17:20:18'),
(990003, 'assets/images/rice.png', 'Pepsi ', 'bottle', 15, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:07:52', 17001, '2018-01-02 16:07:52'),
(990004, 'assets/images/rice.png', 'Pepsi Max', 'Can', 15, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:08:17', 17001, '2018-01-02 16:08:17'),
(990005, 'assets/images/rice.png', 'Mountain Dew ', 'Can', 26, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:08:48', 17001, '2018-01-02 16:08:49'),
(990006, 'assets/images/rice.png', '7up', 'can', 18, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:11:20', 17001, '2018-01-02 16:11:20'),
(990007, 'assets/images/rice.png', 'Mirenda', 'can', 15, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:12:02', 17001, '2018-01-02 17:20:39'),
(990008, 'assets/images/rice.png', 'Mirenda', 'Bottle ', 15, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:14:05', 17001, '2018-01-02 16:14:05'),
(990009, 'assets/images/rice.png', 'San Mig Beer Pilsen', 'sample sample ', 45, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:15:00', 17001, '2018-01-02 16:15:01'),
(990010, 'assets/images/drink.png', 'San Mig Light ', 'sample sample ', 45, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:16:11', 17001, '2018-01-02 16:25:19'),
(990011, 'assets/images/drink.png', 'San Mig Flavored ', 'sample ', 45, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:21:47', 17001, '2018-01-02 16:22:58'),
(990012, 'assets/images/rice.png', 'Bucket', 'sample ', 265, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:30:00', 17001, '2018-01-02 17:21:37'),
(990013, 'assets/images/rice.png', 'Bucket Shrimp', 'sample', 380, 'NOT AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:30:47', 17001, '2018-01-12 08:24:04'),
(990014, 'assets/images/rice.png', 'trial', 'trial', 100, 'AVAILABLE', 'DRINKS', 17001, '2018-01-02 16:35:57', 17001, '2018-01-02 16:35:58'),
(990015, 'assets/images/rice.png', 'Chicken BBQ  with Rice and Dri', 'meal', 95, 'AVAILABLE', 'RICE MEAL', 17001, '2018-01-02 16:40:16', 17001, '2018-01-02 17:33:42'),
(990016, 'assets/images/meals.jpg', 'Pancit Canton', 'sample ', 120, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 16:48:16', 17001, '2018-01-12 08:39:46'),
(990017, 'assets/images/rice.png', 'Tinola - Mayamaya, Lapulapu', 'sample ', 130, 'AVAILABLE', 'SOUP', 17001, '2018-01-02 16:50:40', 17001, '2018-01-02 16:50:40'),
(990018, 'assets/images/rice.png', 'Tinola - Malasugi, Liplipan', 'sample ', 130, 'AVAILABLE', 'SOUP', 17001, '2018-01-02 16:51:21', 17001, '2018-01-02 16:51:21'),
(990019, 'assets/images/rice.png', 'Tinola - Kitong/Budas (100g)', 'sampale ', 60, 'AVAILABLE', 'SOUP', 17001, '2018-01-02 16:51:55', 17001, '2018-01-02 16:51:55'),
(990020, 'assets/images/rice.png', 'Sinigang na Bangus ', 'sample', 160, 'AVAILABLE', 'SOUP', 17001, '2018-01-02 16:52:25', 17001, '2018-01-02 16:52:26'),
(990021, 'assets/images/rice.png', 'Sinigang Shrimp', 'SAMPLE ', 150, 'AVAILABLE', 'SOUP', 17001, '2018-01-02 16:52:52', 17001, '2018-01-02 16:52:52'),
(990022, 'assets/images/rice.png', 'Kinilaw - Tuna ', 'SAMPLE ', 120, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:53:56', 17001, '2018-01-02 16:53:56'),
(990023, 'assets/images/rice.png', 'Kinilaw - Malasugi', 'SAMPLE ', 130, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:54:16', 17001, '2018-01-02 16:54:16'),
(990024, 'assets/images/rice.png', 'Kinilaw - Liplipan', 'SAMPLE ', 130, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:54:37', 17003, '2018-01-11 06:54:20'),
(990025, 'assets/images/rice.png', 'Kinilaw Pusit ', 'SAMPLE ', 150, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:55:02', 17001, '2018-01-02 16:55:02'),
(990026, 'assets/images/rice.png', 'Kinilaw - Native Oyster (Tikod', 'SAMPLE ', 170, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:55:40', 17001, '2018-01-02 16:55:40'),
(990027, 'assets/images/rice.png', 'Sinugba - Boneless Bangus ', 'SMAPLE ', 60, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:56:08', 17001, '2018-01-02 16:56:08'),
(990028, 'assets/images/rice.png', 'Sinugba - Kitong/Budas 100g', 'SAMPLE', 60, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 16:56:34', 17001, '2018-01-02 16:56:34'),
(990029, 'assets/images/rice.png', 'Sinugba - Tuna belly ', 'SAMPLE ', 130, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:00:30', 17001, '2018-01-02 17:00:30'),
(990030, 'assets/images/rice.png', 'Sinugba - Pork Belly BBQ ', 'SAMPLE ', 80, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:00:54', 17001, '2018-01-02 17:00:54'),
(990031, 'assets/images/rice.png', 'Sinugba - Chicken BBQ ', 'SAMPLE ', 80, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:01:20', 17001, '2018-01-02 17:01:20'),
(990032, 'assets/images/rice.png', 'Fried Boneless Bangus ', 'SAMPLE ', 160, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:01:46', 17001, '2018-01-02 17:01:46'),
(990033, 'assets/images/rice.png', 'Adobong Bagaybay ', 'SAMPLE ', 130, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:02:06', 17001, '2018-01-02 17:02:06'),
(990034, 'assets/images/rice.png', 'Adobo Tuna Bihod ', 'SAMPALE ', 120, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:02:28', 17001, '2018-01-02 17:02:28'),
(990035, 'assets/images/rice.png', 'Adobo Pusit ', 'SAMPLE ', 120, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:02:58', 17001, '2018-01-02 17:02:58'),
(990036, 'assets/images/rice.png', 'Adobo - Native Oyster (Tikod A', 'SAMPLE ', 160, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:03:40', 17001, '2018-01-02 17:03:40'),
(990037, 'assets/images/rice.png', 'Sizzling Tuna ', 'SAMPLE ', 120, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:04:04', 17001, '2018-01-02 17:04:04'),
(990038, 'assets/images/rice.png', 'Sizzling Saang ', 'SAMPLE ', 120, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:04:25', 17001, '2018-01-02 17:04:26'),
(990039, 'assets/images/rice.png', 'Sizzling Pusit', 'SAMPLE ', 150, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:04:55', 17001, '2018-01-02 17:04:56'),
(990040, 'assets/images/rice.png', 'Sizzling Gambas ', 'SAMPLE 150', 150, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:05:46', 17001, '2018-01-02 17:05:46'),
(990041, 'assets/images/rice.png', 'Garlic Shrimp', 'sample ', 150, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:06:35', 17001, '2018-01-02 17:06:35'),
(990042, 'assets/images/rice.png', 'Pork Sisig ', 'sample ', 120, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:07:13', 17001, '2018-01-02 17:07:13'),
(990043, 'assets/images/rice.png', 'Pancit Guisado', 'sample ', 120, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:07:51', 17001, '2018-01-02 17:07:51'),
(990044, 'assets/images/rice.png', 'Bihon Guisado ', 'SAMPLE ', 120, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:08:18', 17001, '2018-01-02 17:08:18'),
(990045, 'assets/images/rice.png', 'Sotanghon Guisado', 'SAMPLE ', 120, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:08:42', 17001, '2018-01-02 17:08:43'),
(990046, 'assets/images/rice.png', 'Bam -e ', 'sample ', 120, 'AVAILABLE', 'MAIN COURSE', 17001, '2018-01-02 17:09:08', 17003, '2018-01-11 06:36:00'),
(990047, 'assets/images/rice.png', 'Lome ', 'sample ', 0, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:09:42', 17001, '2018-01-02 17:09:42'),
(990048, 'assets/images/rice.png', 'Tuyom ', 'sample ', 60, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:10:37', 17001, '2018-01-02 17:10:38'),
(990049, 'assets/images/rice.png', 'Atsara', 'sample ', 20, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:11:27', 17001, '2018-01-02 17:11:27'),
(990050, 'assets/images/rice.png', 'Okra ', 'sample ', 15, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:11:51', 17001, '2018-01-02 17:11:51'),
(990051, 'assets/images/rice.png', 'Bam-e ', 'sample ', 120, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-02 17:12:41', 17001, '2018-01-02 17:12:42'),
(990052, 'assets/images/41ecMIz9JHL.jpg', 'Takla', 'manyaman', 100, 'AVAILABLE', 'EXTRAS', 17001, '2018-01-06 09:51:25', 17001, '2018-01-06 09:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receipt_total` float NOT NULL DEFAULT '0',
  `receipt_cashier` int(11) NOT NULL,
  `receipt_cash` float NOT NULL DEFAULT '0',
  `receipt_change` float NOT NULL DEFAULT '0',
  `receipt_ordered_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_item`
--

CREATE TABLE `receipt_item` (
  `receipt_item_id` int(11) NOT NULL,
  `receipt_item_subtotal` float NOT NULL DEFAULT '0',
  `receipt_item_quantity` int(11) NOT NULL,
  `receipt_item_product_id` int(11) NOT NULL,
  `receipt_item_receipt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(30) NOT NULL,
  `user_mi` varchar(1) DEFAULT NULL,
  `user_last_name` varchar(30) NOT NULL,
  `user_password` varchar(256) NOT NULL DEFAULT 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413',
  `user_position` enum('Manager','Supervisor','Cashier','Owner') NOT NULL,
  `user_type` enum('SUPERADMIN','ADMIN','REGULAR','') NOT NULL,
  `user_status` enum('ACTIVE','DELETED') NOT NULL DEFAULT 'ACTIVE',
  `user_created_by` int(11) NOT NULL,
  `user_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_modified_by` int(11) NOT NULL,
  `user_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_mi`, `user_last_name`, `user_password`, `user_position`, `user_type`, `user_status`, `user_created_by`, `user_created_on`, `user_modified_by`, `user_modified_on`) VALUES
(18000, 'Redenfloyd Gabrielle', 'M', 'Cayanan', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'Manager', 'SUPERADMIN', 'ACTIVE', 18000, '2017-12-24 10:40:32', 18000, '2018-01-12 17:13:08'),
(18001, 'Joanne', 'S', 'Malaluan', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', 'Supervisor', 'ADMIN', 'ACTIVE', 18000, '2017-12-24 11:06:25', 18000, '2018-01-12 17:13:08'),
(18002, 'Angela', 'C', 'Ong', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'Manager', 'REGULAR', 'ACTIVE', 18000, '2017-12-24 11:07:08', 18000, '2018-01-12 17:13:08'),
(18003, 'Lois Ram', 'D', 'Dico', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'Supervisor', 'ADMIN', 'ACTIVE', 18000, '2018-01-11 06:27:58', 18000, '2018-01-12 17:13:08');

-- --------------------------------------------------------

--
-- Structure for view `cart`
--
DROP TABLE IF EXISTS `cart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart`  AS  select `order_item`.`order_item_id` AS `order_item_id`,`order_item`.`order_item_qty` AS `order_item_qty`,`order_item`.`order_item_subtotal` AS `order_item_subtotal`,`product`.`product_id` AS `product_id`,`product`.`product_image` AS `product_image`,`product`.`product_name` AS `product_name`,`product`.`product_description` AS `product_description`,`product`.`product_price` AS `product_price`,`ordered`.`ordered_id` AS `ordered_id`,`ordered`.`ordered_time` AS `ordered_time`,`ordered`.`ordered_qr_code` AS `ordered_qr_code`,`ordered`.`ordered_total` AS `ordered_total` from ((`order_item` join `product` on((`order_item`.`order_item_product_id` = `product`.`product_id`))) join `ordered` on((`order_item`.`order_item_ordered_id` = `ordered`.`ordered_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`ordered_id`),
  ADD KEY `ordered_guest_id` (`ordered_guest_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_item_ordered_id` (`order_item_ordered_id`),
  ADD KEY `order_item_product_id` (`order_item_product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `receipt_ordered_it` (`receipt_ordered_id`),
  ADD KEY `receipt_cashier` (`receipt_cashier`);

--
-- Indexes for table `receipt_item`
--
ALTER TABLE `receipt_item`
  ADD PRIMARY KEY (`receipt_item_id`),
  ADD KEY `receipt_item_product_id` (`receipt_item_product_id`),
  ADD KEY `receipt_item_receipt_id` (`receipt_item_receipt_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_created_by` (`user_created_by`),
  ADD KEY `user_modified_by` (`user_modified_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18100000;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `ordered_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64690000;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990053;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99180000;

--
-- AUTO_INCREMENT for table `receipt_item`
--
ALTER TABLE `receipt_item`
  MODIFY `receipt_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered`
--
ALTER TABLE `ordered`
  ADD CONSTRAINT `ordered_ibfk_1` FOREIGN KEY (`ordered_guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_item_ordered_id`) REFERENCES `order_item` (`order_item_id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_item_product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`receipt_ordered_id`) REFERENCES `ordered` (`ordered_id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`receipt_cashier`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `receipt_item`
--
ALTER TABLE `receipt_item`
  ADD CONSTRAINT `receipt_item_ibfk_1` FOREIGN KEY (`receipt_item_product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `receipt_item_ibfk_2` FOREIGN KEY (`receipt_item_receipt_id`) REFERENCES `receipt` (`receipt_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_created_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_modified_by`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
