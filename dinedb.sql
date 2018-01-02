-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 02:10 PM
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
  `order_item_ordered_id` int(11) NOT NULL,
  `order_item_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
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
  `product_availability` enum('AVAILABLE','NOT AVAILABLE') NOT NULL,
  `product_category` enum('DRINKS','RICE MEAL','SOUP','MAIN COURSE','EXTRAS') NOT NULL,
  `product_created_by` int(11) NOT NULL,
  `product_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_modified_by` int(11) NOT NULL,
  `product_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `receipt_change` float NOT NULL DEFAULT '0'
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
  `receipt_item_receipt_id` int(11) NOT NULL,
  `receipt_item_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_first_name` varchar(30) NOT NULL,
  `user_mi` varchar(1) DEFAULT NULL,
  `user_last_name` varchar(30) NOT NULL,
  `user_password` varchar(256) NOT NULL DEFAULT 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413',
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

INSERT INTO `user` (`user_id`, `user_first_name`, `user_mi`, `user_last_name`, `user_password`, `user_type`, `user_status`, `user_created_by`, `user_created_on`, `user_modified_by`, `user_modified_on`) VALUES
(17000, 'Redenfloyd Gabrielle', 'M', 'Cayanan', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'SUPERADMIN', 'ACTIVE', 1, '2017-12-24 10:40:32', 1, '2017-12-24 11:05:43'),
(17001, 'Joanne', 'S', 'Malaluan', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'ADMIN', 'ACTIVE', 1, '2017-12-24 11:06:25', 1, '2017-12-24 11:06:25'),
(17002, 'Angela', 'C', 'Ong', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'REGULAR', 'ACTIVE', 1, '2017-12-24 11:07:08', 1, '2017-12-24 11:07:08');

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
  ADD PRIMARY KEY (`ordered_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `receipt_item`
--
ALTER TABLE `receipt_item`
  ADD PRIMARY KEY (`receipt_item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `ordered_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_item`
--
ALTER TABLE `receipt_item`
  MODIFY `receipt_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
