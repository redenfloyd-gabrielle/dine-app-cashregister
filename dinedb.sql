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
-- CREATE TABLE `cart` (
-- `order_item_id` int(11)
-- ,`order_item_qty` int(11)
-- ,`order_item_subtotal` float
-- ,`product_id` int(11)
-- ,`product_image` varchar(30)
-- ,`product_name` varchar(30)
-- ,`product_description` varchar(50)
-- ,`product_price` float
-- ,`ordered_id` int(11)
-- ,`ordered_time` timestamp
-- ,`ordered_qr_code` int(11)
-- ,`ordered_total` float
-- );

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
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_availability` enum('AVAILABLE','NOT AVAILABLE') NOT NULL DEFAULT 'AVAILABLE',
  `product_category` enum('DRINKS','PANCIT','SOUP','MAIN COURSE','EXTRAS') NOT NULL,
  `product_created_by` int(11) NOT NULL,
  `product_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_modified_by` int(11) NOT NULL,
  `product_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--





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
(18000, 'Redenfloyd Gabrielle', 'M', 'Cayanan', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'Supervisor', 'SUPERADMIN', 'ACTIVE', 18000, '2017-12-24 10:40:32', 18000, '2018-01-12 17:13:08'),
(18001, 'Joanne', 'S', 'Malaluan', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', 'Supervisor', 'ADMIN', 'ACTIVE', 18000, '2017-12-24 11:06:25', 18000, '2018-01-12 17:13:08'),
(18002, 'Angela', 'C', 'Ong', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'Cashier', 'REGULAR', 'ACTIVE', 18000, '2017-12-24 11:07:08', 18000, '2018-01-12 17:13:08'),
(18003, 'Lois Ram', 'D', 'Dico', 'BA3253876AED6BC22D4A6FF53D8406C6AD864195ED144AB5C87621B6C233B548BAEAE6956DF346EC8C17F5EA10F35EE3CBC514797ED7DDD3145464E2A0BAB413', 'Manager', 'ADMIN', 'ACTIVE', 18000, '2018-01-11 06:27:58', 18000, '2018-01-12 17:13:08');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990000;

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
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_item_ordered_id`) REFERENCES `ordered` (`ordered_id`),
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
