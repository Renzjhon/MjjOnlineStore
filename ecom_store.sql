-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 02:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
(1, 'Renz Jhon', 'Renzjohnbuizon@gmail.com', '09362651651', 'profile dsfsdfs.png', 'Philippines', 'Im Admin', '09999814876', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(2, '::1', 1);

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
  `customer_image` text DEFAULT NULL,
  `customer_ip` varchar(100) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `verification_code` int(10) NOT NULL,
  `otp_time_generated` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_pass_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `verified`, `verification_code`, `otp_time_generated`, `reset_pass_code`) VALUES
(1, 'Renz Jhon', 'Renzjhonbuizon@gmail.com', 'mlk!@#$%', 'Cavite', 'Magallanes', '1', 'dfasf', '', '::1', 0, 558003194, '2022-01-11 00:13:51', NULL),
(2, 'Renz', 'Renzjohnbuizon@gmail.com', '$2y$10$DwcyJMkHhOcQgfmksywe9egQld21dCBrnVF0EuqqMGPGcCDjjgTNS', 'Bulacan', 'Marilao', '3333', 'fadf', '', '::1', 0, 1723172640, '2022-05-28 00:25:18', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` decimal(8,2) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'On Process',
  `payment_method` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `Customer_verify` int(10) NOT NULL,
  `Rider_verify` int(10) NOT NULL,
  `rider_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_fee`
--

CREATE TABLE `delivery_fee` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(20) NOT NULL,
  `delivery_fee` decimal(8,2) NOT NULL DEFAULT 50.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_fee`
--

INSERT INTO `delivery_fee` (`province_id`, `province_name`, `delivery_fee`) VALUES
(1, 'Batangas', '75.00'),
(2, 'Bulacan', '100.00'),
(3, 'Cavite', '50.00'),
(4, 'Laguna', '50.00'),
(5, 'Metro_Manila', '50.00'),
(6, 'Pampanga', '50.00'),
(7, 'Quezon', '50.00'),
(8, 'Rizal', '50.00'),
(9, 'Tarlac', '50.00');

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
(1, 'Sample 1', 9, 10, 'Hand Sanitizer Dispenser 1.png', '2021-12-02 13:37:28'),
(2, 'Sample 2', 7, 10, 'Bended Handle 1.png', '2021-12-02 13:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_report`
--

CREATE TABLE `inventory_report` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_report`
--

INSERT INTO `inventory_report` (`report_id`, `product_id`, `stock`, `date`) VALUES
(1, 1, 100, '2021-12-02'),
(2, 2, 100, '2021-12-02'),
(3, 2, 99, '2021-12-02'),
(4, 1, 99, '2021-12-02'),
(5, 2, 98, '2021-12-02'),
(6, 1, 98, '2021-12-02'),
(7, 2, 97, '2021-12-02'),
(8, 1, 97, '2021-12-02'),
(9, 2, 96, '2021-12-02'),
(10, 1, 96, '2021-12-02'),
(11, 2, 95, '2021-12-02'),
(12, 2, 8, '2021-12-07'),
(13, 2, 7, '2021-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `order_summary`
--

CREATE TABLE `order_summary` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'On Process',
  `payment_method` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `Customer_verify` int(10) NOT NULL,
  `Rider_verify` int(10) NOT NULL,
  `cancel` varchar(10) NOT NULL DEFAULT 'NotCancel',
  `review` varchar(10) NOT NULL DEFAULT 'Reviewed',
  `ss_proof` varchar(255) NOT NULL DEFAULT 'Not_Available',
  `rider_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_date` text NOT NULL,
  `order_type` varchar(20) NOT NULL DEFAULT 'Product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `order_status` varchar(255) NOT NULL DEFAULT 'On Process',
  `payment_method` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `cancel` varchar(10) NOT NULL DEFAULT 'NotCancel',
  `review` varchar(10) NOT NULL DEFAULT 'Reviewed',
  `ss_proof` varchar(255) NOT NULL DEFAULT 'Not_Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `supplier` varchar(255) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `unit`, `product_price`, `supplier`, `product_desc`) VALUES
(1, 1, '2021-12-02 05:37:28', 'Sample 1', 'Hand Sanitizer Dispenser 1.png', 'Hand Sanitizer Dispenser 2.png', 'Hand Sanitizer Dispenser 3.png', 'piecce', '999.99', 'Buizon Supplier ng sama ng loob inc.', 'This is sample 1\r\n'),
(2, 4, '2021-12-02 05:38:14', 'Sample 2', 'Bended Handle 1.png', 'Bended handle 2.png', 'Bended handle 3.png', 'piece', '49.99', 'Buizon inc.', 'This is sample 2');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  `p_cat_top` varchar(10) NOT NULL,
  `p_cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`, `p_cat_top`, `p_cat_img`) VALUES
(1, 'Others ', 'This is for others yeah', 'yes', 'others.png'),
(2, 'Accesories', '', 'no', 'accessories.png'),
(3, 'Glass', '', 'no', 'glass.png'),
(4, 'Aluminum', '', 'yes', 'aluminum.jpg'),
(5, 'Paint', 'paint', 'no', 'paint.png');

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
  `customer_budget` float(8,2) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `additional_message` varchar(255) NOT NULL,
  `material` text NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not_Settled'
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
  `quantity` int(11) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `issue_img` varchar(255) NOT NULL,
  `receipt` varchar(255) NOT NULL DEFAULT 'Not_Available',
  `status` varchar(255) NOT NULL DEFAULT 'NotSettled',
  `invoice_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund_id`, `customer_id`, `customer_name`, `customer_email`, `productservice_name`, `quantity`, `payment_method`, `issue`, `issue_img`, `receipt`, `status`, `invoice_no`) VALUES
(1, 1, 'Renz Jhon Buizon', 'renzjhonbuizon@gmail.com', 'Balusters', NULL, 'Cash On Delivery', 'Sira', 'balusters img1.png', '225573715_318223850000773_8833216575489454149_n.jpg', 'Settled', '221941946'),
(2, 1, 'Renz jhon buizon', 'Renzjhonbuizon@gmail.com', 'Bended Handle', 5, 'Cash On Delivery', 'Sira', 'Bended handle 2.png', '225573715_318223850000773_8833216575489454149_n.jpg', 'NotSettled', '236935341'),
(3, 1, 'Renz jhon buizon', 'Renzjhonbuizon@gmail.com', 'window shit', 0, 'Cash On Delivery', 'Kulang', 'touch up paint img1 ( (1)_P649.png', '225573715_318223850000773_8833216575489454149_n.jpg', 'NotSettled', 'service');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_name` varchar(30) NOT NULL,
  `report_image` text NOT NULL,
  `report_keyword` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_name`, `report_image`, `report_keyword`) VALUES
(1, 'Sales Report', 'sales.png', 'sales_report'),
(2, 'Inventory Reports', 'Inventory.png', 'inventory_report'),
(3, 'Order Reports', 'itemreduced.png', 'order_reports'),
(4, 'Payment Method Reports', 'payment_method.png', 'payment_method_reports'),
(5, 'Return Item Reports', 'Return_Item.png', 'return_item_reports'),
(6, 'Cancel Order Reports', 'Inventory.png', 'cancelled_order_reports'),
(7, 'Delivery Rider Report', 'rider.png', 'delivery_rider_report');

-- --------------------------------------------------------

--
-- Table structure for table `return_items`
--

CREATE TABLE `return_items` (
  `return_item_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `date` date NOT NULL
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
(1, 'Renzjhon', 'Renzjohnbuizon@gmail.com', '09362651651', 'profile dsfsdfs.png', '09999814876'),
(2, 'Eloisa', 'Eoisa@gmail.com', '09362651651', 'profile.png', '09999814876');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(10) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_desc` text NOT NULL,
  `service_price_min` decimal(8,2) NOT NULL,
  `service_price_max` decimal(8,2) NOT NULL,
  `service_img1` text NOT NULL,
  `service_img2` text NOT NULL,
  `service_img3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `service_price_min`, `service_price_max`, `service_img1`, `service_img2`, `service_img3`) VALUES
(5, 'stainless steel fabrication', 'Steel fabrication is the process involving the transformation of raw steel into a product or item that can be used in construction or assembly. Steel is considered an alloy of iron and other metals.', '80000.00', '200000.00', 'stailess tube handrails img2.png', 'Stainless gate img1.png', 'stainless spiral stairs img2.png'),
(6, 'store front showcase', 'It is anything in a store that houses or promotes your product. A visual merchandising strategy focuses heavily on the appearance of retail displays as they are often the first point of contact between your product and the shopper.                                ', '6500.00', '10000.00', 'storefrontshowcase img1.png', 'storefrontshowcase img1.png', 'storefrontshowcase img1.png'),
(7, 'patch fitting frameless door', 'Patch fittings are a frameless glass concept, which evolved as modern interior and exterior design option for commercial and residential projects. They can be frameless fixed glass over panel glass or frameless glass doors.\r\n', '20000.00', '45000.00', 'patch fitting img1.png', 'patch fitting img2.png', 'patch fitting img3.png'),
(8, 'automatic door motion sensor', 'Allows for field adjustments to work as both full energy motion activated or low energy knowing act activated automation and has the ability to compensate for wind and stack pressure.\r\n                                ', '82000.00', '165000.00', 'automatic door img1.png', 'automatic door img2.png', 'automatic door img1.png'),
(9, 'shower enclosure', 'The shower enclosure is a separation between the wet and dry areas. Shower enclosure surrounds the shower area and is installed with railings or curtain rods fixed with the ceilings or walls                                ', '25000.00', '18000.00', 'shower enclosure img1.png', 'shower enclosure2.png', 'shower enclosure2.png'),
(10, 'aluminum composite panel', 'Composite panel is composed of two aluminum sheets and an inner thermoplastic base core that can hold mineral charge.', '2500.00', '5000.00', 'aluminum composite panel img1.png', 'aluminum composite panel img2.png', 'aluminum composite panel img3.png'),
(11, 'casement awning window', 'Casement windows are hinged at the side and open outward, to the left or to the right.  Awning windows are made for openings in which the width is greater than the height. Since awning and casement windows open outward fully, they provide maximum ventilation and natural light.', '2500.00', '5000.00', 'casement awning window img2.png', 'casement awning window img3.png', 'casement awning window imga1.png'),
(12, 'frameless door', 'Frameless doors are made of the same tempered glass but have a much thicker pane because there is no supporting frame. Clips, hinges, and door pulls are set into the glass and are caulked 2 at the edges and corners with a thick silicone to seal the glass', '18000.00', '36000.00', 'frameless door img1.png', 'frameless door img2.png', 'frameless door img3.png'),
(13, 'sliding door', 'A sliding door is a type of door which opens horizontally by sliding, usually parallel to a wall. Sliding doors can be mounted either on top of a track below or be suspended from a track above.', '8000.00', '16000.00', 'sliding door img1.png', 'sliding door img2.png', ''),
(14, 'sliding window', 'Sliding windows are horizontal, with sashes that slide back and forth rather than up and down like more traditional windows. They are essentially double hung windows turned on their side                                ', '6000.00', '10000.00', 'sliding window.png', 'sliding window.png', 'sliding window.png'),
(15, 'screen door', 'A screen door can refer to a hinged storm door or hinged screen door covering an exterior door, or a screened sliding door used with sliding glass doors.                                ', '3500.00', '8000.00', 'screen door img1.png', 'screen door img1.png', 'screen door img1.png'),
(16, 'frosted film', 'The glass comes out as translucent, obscuring visibility even as it transmits light. This effect of frosting can also be achieved by applying a film of vinyl that acts as a stencil on the surface of the glass or through canned frosted glass sprays\r\n                                ', '60.00', '100.00', 'frosted film2.png', 'frosted film1.png', 'frosted film3.png'),
(17, 'frosted tint', 'Frosted window film is a type of window film that is installed directly onto a glass surface, typically for privacy or decorative purposes. Also it can easily be removed if need be with no damage to the glass surface                                ', '600.00', '800.00', 'frosted tint.png', 'frosted tint.png', 'frosted tint.png'),
(18, 'auto glass', 'It can repair or replace any type of glass on any make, model or age of vehicle                                ', '6000.00', '8000.00', 'auto glass1.png', 'auto glass1.png', 'auto glass1.png'),
(19, 'BALUSTERS', 'It is a vertical moulded shaft square or lathe-turned form found in stairways parapets and other architectural features. In furniture construction it is known as a spindle. Common materials used in its construction are wood stone and less frequently metal and ceramic.', '3000.00', '6000.00', 'balusters img2.png', 'balusters img1.png', 'balusters img3.png');

-- --------------------------------------------------------

--
-- Table structure for table `services_materials`
--

CREATE TABLE `services_materials` (
  `service_id` int(10) NOT NULL,
  `material` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_materials`
--

INSERT INTO `services_materials` (`service_id`, `material`) VALUES
(5, 'Stainless'),
(5, 'Aluminum'),
(5, 'Cold Rolled'),
(5, 'Pre-Plated'),
(5, 'Copper Brass'),
(6, 'Single Pane Low-E Glass'),
(6, 'Dual Pane Low-E Glass'),
(7, 'Finishing'),
(7, 'Packaging Type'),
(7, 'Usage/Application'),
(8, 'Radar Movement Sensors'),
(8, 'Pressure Sensors'),
(8, 'Optical Sensors or Motion Detectors'),
(8, 'Passive Infrared Movement Sensors'),
(8, 'Active Infrared Sensors'),
(9, 'Tempered Glass'),
(9, 'Annealed Glass'),
(10, 'Grade 1100'),
(10, 'Grade 3003'),
(10, 'Grade 6061'),
(11, 'Aluminum'),
(11, 'Wood'),
(12, 'Tempered Glass'),
(12, 'Annealed Glass'),
(13, 'Wood'),
(13, 'Aluminum'),
(13, 'Stainless Steel'),
(13, 'Steel'),
(13, 'PVC-Plastic'),
(14, 'Timber'),
(14, 'Aluminum'),
(14, 'PVC'),
(15, 'Wood'),
(15, 'Glass '),
(15, 'Aluminum'),
(15, 'Metal '),
(15, 'Steel'),
(15, 'Vinyl'),
(15, 'Fiberglass'),
(15, 'Plastic'),
(16, 'Acid Etched Glass'),
(16, 'Sandblasted Glass'),
(16, 'Ceramic Frit Silkscreened Glass'),
(16, 'Translucent Interlayer Laminated Glass'),
(16, 'Applied Translucent Film'),
(17, 'Dyed Tint'),
(17, 'Metalized Tint'),
(17, 'Hybrid Tint'),
(17, 'Carbon Tint'),
(17, 'Ceramic Tint'),
(18, 'Laminated Glass'),
(18, 'Tempered Glass'),
(18, 'Curved Glass'),
(18, 'Regular Glass'),
(19, 'Metal'),
(19, 'Wood'),
(19, 'Plastic');

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
(5, 'Slide1', 'rslide1.png'),
(6, 'Slide2', 'rslide4.png'),
(7, 'Slide3', 'rslides2.png'),
(8, 'Slide4', 'rslide3.png');

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
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_ID`, `supplier_name`, `address`, `contact_number`, `email`) VALUES
(3, 'Buizon Supplier ng sama ng loob inc.', 'sa tabi tabi', 'xxxxxxxx', 'fadffadf@gmail.com'),
(4, 'Buizon inc.', 'Tabing ilog Marilao Bulacan', '09362651651', 'Buizon@gmail.com');

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
-- Indexes for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  ADD PRIMARY KEY (`province_id`);

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
-- Indexes for table `inventory_report`
--
ALTER TABLE `inventory_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `order_summary`
--
ALTER TABLE `order_summary`
  ADD PRIMARY KEY (`order_id`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `return_items`
--
ALTER TABLE `return_items`
  ADD PRIMARY KEY (`return_item_id`);

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_cancelled_orders`
--
ALTER TABLE `customer_cancelled_orders`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gcash_cancelled_orders`
--
ALTER TABLE `gcash_cancelled_orders`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_report`
--
ALTER TABLE `inventory_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_summary`
--
ALTER TABLE `order_summary`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quotation_sent`
--
ALTER TABLE `quotation_sent`
  MODIFY `quotation_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `return_items`
--
ALTER TABLE `return_items`
  MODIFY `return_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
