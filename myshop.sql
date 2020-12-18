-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 11:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, '', 'kavanprajapati9239@gmail.com', 'kavan123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'Nokia'),
(6, 'Samsung'),
(9, 'Sony'),
(10, 'Motorola');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Computers'),
(3, 'Mobiles'),
(4, 'Cameras'),
(6, 'Tablets'),
(7, 'TVs');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` bigint(15) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(9, 'kavan', 'k@gmail.com', 'kp12345', 'India', 'ahmedabad', 9998449377, '4b manekbaug road', 'kingkohli.jpeg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(61, 9, 111110, 1092868647, 1, '2019-04-05 09:42:02', 'Complete'),
(62, 9, 25000, 1384011040, 1, '2019-04-05 09:51:09', 'Pending'),
(63, 9, 35000, 659200129, 1, '2019-04-10 09:36:04', 'Pending'),
(64, 9, 55555, 831368700, 1, '2019-04-10 09:38:01', 'Pending'),
(65, 9, 60000, 986699771, 1, '2019-04-18 06:28:57', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` bigint(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` bigint(11) NOT NULL,
  `code` bigint(11) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(3, 281057090, 12000, 'Paytm', 2448949, 14494662, '02-04-2019'),
(5, 281057090, 25000, 'Paytm', 2448949, 14494662, '02-04-2019'),
(6, 281057090, 12000, 'Bank Tranfer', 2448949, 14494662, '02-04-2019'),
(7, 281057090, 12000, 'Bank Tranfer', 2448949, 14494662, '02-04-2019'),
(9, 2137160373, 35000, 'Paytm', 2448949, 14494662, '05-04-2019'),
(10, 1622163670, 12000, 'Paytm', 2448949, 14494662, '05-04-2019'),
(11, 58053239, 25000, 'Paytm', 1518566, 14494662, '05-04-2019'),
(12, 58053239, 25000, 'Paytm', 1518566, 14494662, '05-04-2019'),
(13, 58053239, 25000, 'Paytm', 2448949, 14494662, '05-04-2019'),
(14, 1249994781, 12000, 'Paytm', 2448949, 14494662, '05-04-2019'),
(15, 1033642069, 40000, 'Paytm', 2448949, 14494662, '05-04-2019'),
(16, 1101735583, 40000, 'Paytm', 2448949, 14494662, '05-04-2019'),
(17, 53899806, 55555, 'Bank Tranfer', 2448949, 14494662, '05-04-2019'),
(18, 1670686133, 35000, 'Western Union', 2448949, 14494662, '05-04-2019'),
(19, 1092868647, 111110, 'Bank Tranfer', 2448949, 14494662, '05-04-2019');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(13) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(48, 9, 1092868647, 11, 2, 'Complete'),
(49, 9, 659200129, 8, 1, 'Pending'),
(50, 9, 831368700, 11, 1, 'Pending'),
(51, 9, 986699771, 12, 5, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(15) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(4, 1, 1, '2019-04-04 06:18:43', 'HP Pavallion Book', 'hp.png', 'dell.jpg', '', 40000, '<p>This is HP Pavillion Book. This is my favorite brand. I love HP brand.</p>', 'HP,Laptops,new,corei5,corei7', 'on'),
(5, 4, 9, '2019-04-04 05:56:30', 'Sony Camera DSLR New', 'camera.jpg', '', '', 35000, '<p>sony dslr are just beautifully made by the company</p>', 'Sony,Cameras,DSLR,nikon,canon', 'on'),
(6, 3, 3, '2019-04-04 05:52:05', 'iPhone 8 64 GB', 'iphone.jpg', '', '', 40000, '<p>iphone is most expensive brand out in world</p>', 'iPhone,mobiles,Smartphones', 'on'),
(7, 2, 6, '2019-03-28 05:58:09', 'Samsung PC Intel Core ', 'computer.jpg', '', '', 25000, '<p>samsung pc. with intel i7 processor and 1TB harddisk.</p>', 'Samsung,Computer,PC,Computers,intel,i3 processor', 'on'),
(8, 2, 6, '2019-03-28 05:58:21', 'Samsung Gaming PC', 'desktop1.png', 'right-pc.png', '', 35000, '<p>gaming computer deskktop. provided by samsung. it has 8gb graphics card with ultimate graphic versions</p>', 'Samsung, Computers, PC , Computer,gaming pc,desktop,graphics card,graphic,cpu,monitor,keyboard,game,i7,intel,i5 processor', 'on'),
(9, 4, 9, '2019-03-28 06:01:18', 'Nikon WildLife DSLR', 'Nikon_D300_Body.jpg', '', '', 25000, '<p>This is specially made for wild life photography. it captures amazing pics.with ultra HD quality</p>', 'Sony , Cameras,Nikon,Canon,wild life ,camera,lens,', 'on'),
(10, 3, 3, '2019-03-28 06:08:06', 'Nokia 8.1 Plus', 'nokia8pointoneplus.jpg', '', '', 22000, '<p>This smartphone is available in more than three colors. i.e. black ,white,gray,blue etc. its with latest android version 9 pie</p>', 'smartphones , nokia, mobiles,android, nokia 8.1 plus', 'on'),
(11, 7, 6, '2019-03-28 10:04:58', 'Samsung Smart TV', 'samsungtv1.jpg', '', '', 55555, '<p>42 inch Smart LED TV specially made by samsung. and one more amazing thing its curved</p>', 'samsung,tvs,tv,led,smart tv,42 inch,lcd', 'on'),
(12, 6, 6, '2019-03-28 06:14:17', 'Samsung Galaxy TAB ', 'tablet.png', '', '', 12000, '<p>samsung tablet. amazing product.</p>', 'Samsung, tab, tablet , tablets,galaxy', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
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
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
