-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2015 at 05:02 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(200) NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(200) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(6, 'Dell'),
(5, 'Sony'),
(3, 'Hp'),
(4, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(20) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(28, '::1', 1),
(30, '::1', 1),
(14, '::1', 1),
(36, '::1', 1),
(34, '::1', 1),
(32, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Cameras'),
(3, 'Mobiles'),
(5, 'Accessories'),
(6, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_city`, `customer_contact`, `customer_address`) VALUES
(47, '::1', 'nitish ', 'arora@gmail.com', 'nitish', 'patiala', '9876554353', 'thapar'),
(46, '::1', 'Nitesh Gupta', 'niteshgupta1996@gmail.com', '1234', 'patiala', '1234567890', 'Hostel pg thapar university patiala');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(100) NOT NULL AUTO_INCREMENT,
  `c_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `order _date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `c_id`, `p_id`, `order _date`) VALUES
(82, 47, 31, '2015-11-30 23:04:07'),
(81, 47, 7, '2015-11-30 23:04:07'),
(80, 47, 20, '2015-11-30 23:04:07'),
(79, 47, 40, '2015-11-30 23:04:07'),
(78, 47, 29, '2015-11-30 23:04:07'),
(77, 46, 24, '2015-11-30 13:34:42'),
(76, 46, 23, '2015-11-30 13:34:42'),
(75, 46, 34, '2015-11-30 13:34:42'),
(74, 46, 22, '2015-11-30 13:34:42'),
(73, 46, 24, '2015-11-30 10:36:30'),
(72, 46, 23, '2015-11-30 10:36:30'),
(71, 46, 34, '2015-11-30 10:36:30'),
(70, 46, 22, '2015-11-30 10:36:30'),
(69, 42, 24, '2015-11-30 02:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` varchar(255) NOT NULL,
  `brand_id` varchar(200) NOT NULL,
  `product_title` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `brand_id`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(4, '1', '3', 'Hp r014tx', 45000, '<ul>\r\n<li>\r\n<h3><strong><span style="font-size: 11px;">Laptop for daily use.</span></strong></h3>\r\n</li>\r\n<li>\r\n<h3><strong><span style="font-size: 11px;">Comes </span><span style="font-size: 11px;">at</span><span style="font-size: 11px;">&nbsp;an affordable price.</span></strong></h3>\r\n</li>\r\n</ul>', 'images (1).jpe', 'laptop,hp,affordable'),
(29, '3', '', 'Asus Zenfone 2 ', 29999, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android 5.0 Lollipop</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Corning Gorilla Glass3</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">13 MP Primary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Dual Sim (LTE + GSM)</li>\r\n</ul>', 'asus-ze551ml-ze551ml-6jww-400x400-imae6qashugarq3r.jpeg', ''),
(7, '5', '', 'Headphones', 1000, '<p>Headphones with good bass.</p>', 'images (6).jpe', 'headphones,accessories'),
(8, '5', '', 'Philips Earphone e12', 300, '<p><strong>Good Earphones.</strong></p>', 'images (8).jpe', 'earphones,accessories,philips'),
(9, '3', '4', 'Lenovo A7000', 10000, '<p>Lenovo A7000 with 2 gb ram and memory expandable upto 32 gb</p>', 'images (5).jpe', 'lenovo,mobiles,a7000'),
(36, '3', '4', 'Lenovo K3 Note', 9999, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5.5 inch FHD Display</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">13MP |5MP Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android Lollipop OS</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2 GB RAM |16 GB ROM</li>\r\n</ul>', '20150622095031wmbqz1f.jpg', ''),
(14, '3', '', 'OnePlus One', 22999, '<ul class="title-notes fk-fontlight fk-font-11 line" style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; list-style: none; overflow: hidden; color: #848484;">\r\n<li class="title-note tmargin2 bmargin2" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">OnePlus Phones comes with Pre-applied UV Screen Protectors</li>\r\n</ul>\r\n<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5.5 inch Screen</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android Lollipop</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Quad Core Processor</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4G LTE, 3GB RAM</li>\r\n</ul>', 'one-plus-one-na-400x400-imae8hh32tpck3yb.jpeg', ''),
(35, '3', '', 'Micromax Xpress', 6199, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android v4.4.2 OS</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">13 MP Primary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2 MP Secondary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Dual Sim (GSM + WCDMA)</li>\r\n</ul>', 'micromax-canvas-xpress-2-e313-400x400-imae9ztscxrnyxhf.jpeg', ''),
(32, '5', '3', 'HP VB 16 GB', 543, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">16 GB Capacity</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Utility Pendrive</li>\r\n</ul>', 'hp-hp-v-215-b-400x400-imadvz6fbwp7mz8n.jpeg', ''),
(17, '1', '6', 'Dell Inspiron 3551 ', 19000, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Pentium Quad Core</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4 GB DDR3 RAM</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">500 GB HDD</li>\r\n</ul>', 'dell-inspiron-notebook-400x400-imae8z63jqzv5cdh.jpeg', ''),
(18, '1', '3', 'HP 15-ac039TU', 18999, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Celeron Dual Core</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4 GB DDR3 RAM</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">500 GB HDD</li>\r\n</ul>', 'hp-notebook-400x400-imaebughm3jrvpbg.jpeg', ''),
(19, '1', '6', 'Dell Inspiron 5000', 49990, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Core i5 (5th Gen)</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">8 GB DDR3 RAM</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1 TB HDD, NA SSD</li>\r\n</ul>', 'dell-inspiron-notebook-400x400-imae96y5t2fgsthe.jpeg', ''),
(20, '1', '4', 'Lenovo G50-80', 45990, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Core i5 (5th Gen)</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">8 GB DDR3 RAM</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1 TB HDD</li>\r\n</ul>', 'lenovo-notebook-400x400-imae88czbns8mvaj.jpeg', ''),
(21, '2', '', 'Nikon D3200', 21500, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-weight: normal; font-stretch: inherit; font-size: 11px; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;"><strong>24.2 MP</strong></li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;"><strong>CMOS</strong></li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;"><strong>with 3 inch LCD</strong></li>\r\n</ul>', 'nikon-d3200-dslr-400x400-imaeyxfayjnxjvg9.jpeg', ''),
(22, '2', '', 'Sony SLT-A58K ', 28888, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">20.1 MP</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">CMOS</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">with 2.7 inch LCD</li>\r\n</ul>', 'sony-slt-a58k-slr-400x400-imadknzgfwgzjyyf.jpeg', ''),
(23, '2', '', 'Canon Digital 160', 5280, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">20 MP</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Optical Zoom: 8x</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">with 2.7 inch LCD</li>\r\n</ul>', 'canon-digital-ixus-160-point-shoot-400x400-imae4zghfzffrrqr.jpeg', ''),
(24, '2', '5', 'Sony Cyber-shot', 7282, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">20.1 MP</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Optical Zoom: 8x</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">CCD Image Sensor</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">with 2.7 inch LCD</li>\r\n</ul>', 'sony-cyber-shot-dsc-w830-point-shoot-400x400-imadthtzww5hfchq.jpeg', ''),
(26, '6', '', 'Micromax P480', 6550, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android v4.4 OS</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5 MP Primary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1.3 GHz Processor</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">7 inch Touchscreen</li>\r\n</ul>', 'micromax-p480-400x400-imaec23e2rsnxzqe.jpeg', ''),
(28, '5', '', 'Skullcandy S2RFDA', 799, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Built-in Mic</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">In-the-ear Headset</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">In-ear-canalphone</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Wired Connectivity</li>\r\n</ul>', 'skullcandy-s2rfda-074-400x400-imadxvv5t26xygcc.jpeg', ''),
(27, '6', '6', 'Dell Venue 7', 6774, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">6.95 inch Touchscreen</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android v4.4 OS</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1.83 GHz Processor</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2 MP Primary Camera</li>\r\n</ul>', 'dell-venue-7-3741-400x400-imaec23n3g99zxur.jpeg', ''),
(30, '5', '', 'JBL T250SI', 1999, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">On-the-ear Headphone</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Over-the-head</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Wired Connectivity</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Supra-aural Headphone</li>\r\n</ul>', 'jbl-t250si-400x400-imae4pu6jhbtazak.jpeg', ''),
(31, '3', '', 'Mi 4', 17999, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">13 MP Primary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">8 MP Secondary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android v4.4 OS</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5 inch Touchscreen</li>\r\n</ul>', 'mi-mi4-64gb-mzb4240in-400x400-imae4qwz6xfz7fep.jpeg', ''),
(34, '5', '', 'Toshiba Canvio', 4125, '<p>Basic 1 TB External Hard Disk</p>\r\n<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Connectivity: USB 3.0</li>\r\n</ul>', 'toshiba-hdtp120ak3ca-400x400-imae2hcekz8k4jng.jpeg', ''),
(40, '3', '', 'Lenovo Vibe Shot', 25499, '<ul class="key-specifications fk-ul-disc lpadding20 line fk-font-11 fk-fontlight" style="margin: 0px; padding: 0px 0px 0px 20px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: arial, tahoma, verdana, sans-serif; vertical-align: baseline; overflow: hidden; color: #848484;">\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Android v5 OS</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">16 MP Primary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">8 MP Secondary Camera</li>\r\n<li class="key-specification tmargin2 bmargin2" style="margin: 2px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Dual Sim (GSM + LTE)</li>\r\n</ul>', 'lenovo-vibe-shot-na-400x400-imaebgcc3z4dkfkc.jpeg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
