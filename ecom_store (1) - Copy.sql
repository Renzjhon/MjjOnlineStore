-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 11:25 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` varchar(100) NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Renz Jhon Buizon', 'renzjohnbuizon@gmail.com', '09362651651', 'RenzTheAdmin.jpg', 'Philippines', 'I am the Developer of this system uwu', '09999814876', 'Developer'),
(5, 'Boss Ahuahu', 'ahuahu@gmail.com', '222', 'Screenshot (68).jpg', 'Philippines', 'im the best coffee maker in my group', '2323231', 'tiga timpla ng kape');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `verification_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `verified`, `verification_code`) VALUES
(3, 'Renz Jhon Buizon', 'Renzjhonbuizon@gmail.com', '$2y$10$XZAX1a2B4sZxGVcIcT3xNuwP357UBEpnGoWdwR61c0U4z.163jP6O', 'Bulacan', 'marilao', '09999814876', '23 radiant, tabing ilog', 'profile.png', '::1', 1, 1625611208);

-- --------------------------------------------------------

--
-- Table structure for table `customer_cancelled_orders`
--

CREATE TABLE `customer_cancelled_orders` (
  `cancel_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `ss_payment` varchar(255) NOT NULL DEFAULT 'NotAvailable',
  `status` varchar(255) NOT NULL DEFAULT 'UnSettled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_cancelled_orders`
--

INSERT INTO `customer_cancelled_orders` (`cancel_id`, `order_id`, `invoice_no`, `payment_method`, `customer_id`, `customer_name`, `customer_email`, `reason`, `message`, `ss_payment`, `status`) VALUES
(1, 1, '1774919988', 'Cash On Delivery', 3, 'Renz Jhon Buizon', 'Renzjhonbuizon@gmail.com', 'Change of mind', 'Nagbago isip ko', 'NotAvailable', ''),
(2, 2, '1030588959', 'Gcash', 3, 'Renz Jhon Buizon', 'Renzjhonbuizon@gmail.com', 'Too Expensive', 'Mahal eh balik nyo pera ko', '225573715_318223850000773_8833216575489454149_n.jpg', 'Settled'),
(3, 3, '470367000', 'Gcash', 3, 'Renz Jhon Buizon', 'Renzjhonbuizon@gmail.com', 'Change of mind', 'bla bla', '225573715_318223850000773_8833216575489454149_n.jpg', 'Settled');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'To Pack',
  `payment_method` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `Customer_verify` int(10) NOT NULL,
  `Rider_verify` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`, `payment_method`, `payment`, `Customer_verify`, `Rider_verify`) VALUES
(1, 3, 100, 1774919988, 1, '2021-10-03', 'To Pack', 'Cash On Delivery', 'Unpaid', 0, 0),
(2, 3, 100, 1030588959, 1, '2021-10-03', 'To Pack', 'Gcash', 'Paid', 0, 0),
(3, 3, 100, 470367000, 1, '2021-10-03', 'To Pack', 'Gcash', 'Paid', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gcash_cancelled_orders`
--

CREATE TABLE `gcash_cancelled_orders` (
  `cancel_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `ss_proof` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `qty_stock` int(50) NOT NULL,
  `critical_level` int(11) NOT NULL DEFAULT 1,
  `product_img` varchar(255) NOT NULL,
  `stock_in_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `product_title`, `qty_stock`, `critical_level`, `product_img`, `stock_in_date`) VALUES
(1, 'Copperlock', 60, 10, 'copper lock 75 per 100pcs img1.png', '2021-09-30 13:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_date`) VALUES
(1, 1568694041, 100, '2021-10-03 09:01:29'),
(2, 330950273, 200, '2021-11-03 09:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'To Pack',
  `payment_method` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `cancel` varchar(10) NOT NULL DEFAULT 'NotCancel',
  `review` varchar(10) NOT NULL DEFAULT 'Reviewed',
  `ss_proof` varchar(255) NOT NULL DEFAULT 'Not_Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`, `payment_method`, `payment`, `cancel`, `review`, `ss_proof`) VALUES
(1, 3, 1774919988, '1', 1, 'To Pack', 'Cash On Delivery', 'Unpaid', 'Cancelled', 'Reviewed', 'Not_Available'),
(2, 3, 1030588959, '1', 1, 'To Pack', 'Gcash', 'Paid', 'Cancelled', 'Reviewed', '225573715_318223850000773_8833216575489454149_n.jpg'),
(3, 3, 470367000, '1', 1, 'To Pack', 'Gcash', 'Paid', 'Cancelled', 'Reviewed', '225573715_318223850000773_8833216575489454149_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` varchar(255) NOT NULL,
  `product_img1` varchar(255) NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `unit`, `product_price`, `product_desc`) VALUES
(1, 1, '2021-09-30 05:47:09', 'Copperlock', 'copper lock 75 per 100pcs img1.png', 'copper lock 75 per 100pcs img2.png', 'copper lock 75 per 100pcs img3.png', '100 pcs', '100.00', 'This is a copper lock aye aye');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Others ', 'This is for others yeah');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_sent`
--

CREATE TABLE `quotation_sent` (
  `quotation_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pricerange` varchar(255) NOT NULL,
  `customer_budget` int(10) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `additional_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `productservice_name` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `issue_img` varchar(255) NOT NULL,
  `receipt` varchar(255) NOT NULL DEFAULT 'Not_Available',
  `status` varchar(255) NOT NULL DEFAULT 'NotSettled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `rider_id` int(10) NOT NULL,
  `rider_name` varchar(255) NOT NULL,
  `rider_email` varchar(255) NOT NULL,
  `rider_pass` varchar(255) NOT NULL,
  `rider_image` varchar(255) NOT NULL,
  `rider_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`rider_id`, `rider_name`, `rider_email`, `rider_pass`, `rider_image`, `rider_contact`) VALUES
(2, 'Renz jhon', 'Renzjohnbuizon@gmail.com', '09362651651', 'profile.png', '09362651651');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(10) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_desc` text NOT NULL,
  `service_price_min` int(11) NOT NULL,
  `service_price_max` int(11) NOT NULL,
  `service_img1` text NOT NULL,
  `service_img2` text NOT NULL,
  `service_img3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `service_price_min`, `service_price_max`, `service_img1`, `service_img2`, `service_img3`) VALUES
(1, 'Glass Installation', '                                        ', 100, 1000, 'slidingwindow1.png', 'slidingwindow2.png', 'slidingwindow3.png'),
(2, 'fasdfs', 'fsadfsdf', 333, 3, 'hangerrod1.png', 'hangerrod2.png', 'hangerrod3.png'),
(3, 'fasdfsasdf', 'sfasdfs', 333, 33, 'Glass Coat 2.png', 'Glass Coat 3.png', 'Glass Coat.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide1', 'Slide 1.png'),
(2, 'slide 2', 'Slide 2.png'),
(3, 'slide 3', 'Slide 3.png'),
(4, 'slide 4', 'Slide 4.png');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_ID` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `customer_cancelled_orders`
--
ALTER TABLE `customer_cancelled_orders`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `gcash_cancelled_orders`
--
ALTER TABLE `gcash_cancelled_orders`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_title` (`product_title`),
  ADD KEY `product_img` (`product_img`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_title` (`product_title`),
  ADD UNIQUE KEY `product_img1` (`product_img1`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `quotation_sent`
--
ALTER TABLE `quotation_sent`
  ADD PRIMARY KEY (`quotation_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`rider_id`),
  ADD UNIQUE KEY `rider_name` (`rider_name`),
  ADD UNIQUE KEY `rider_email` (`rider_email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`,`service_img1`) USING HASH;

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_cancelled_orders`
--
ALTER TABLE `customer_cancelled_orders`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gcash_cancelled_orders`
--
ALTER TABLE `gcash_cancelled_orders`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotation_sent`
--
ALTER TABLE `quotation_sent`
  MODIFY `quotation_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
