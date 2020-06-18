-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2020 at 02:58 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale_ftp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE IF NOT EXISTS `tb_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE IF NOT EXISTS `tb_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_fname` varchar(25) NOT NULL,
  `cus_lname` varchar(25) DEFAULT NULL,
  `cus_phone` varchar(13) DEFAULT NULL,
  `cus_address` varchar(100) DEFAULT NULL,
  `cus_car_number` varchar(6) NOT NULL,
  `cus_cart` varchar(20) NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

DROP TABLE IF EXISTS `tb_employee`;
CREATE TABLE IF NOT EXISTS `tb_employee` (
  `emp_id` int(11) NOT NULL,
  `emp_fname` varchar(25) NOT NULL,
  `emp_lname` varchar(25) DEFAULT NULL,
  `emp_phone` varchar(13) DEFAULT NULL,
  `emp_address` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_expire_product`
--

DROP TABLE IF EXISTS `tb_expire_product`;
CREATE TABLE IF NOT EXISTS `tb_expire_product` (
  `exp_id` int(11) NOT NULL,
  `exp_date` datetime NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_expire_product_detail`
--

DROP TABLE IF EXISTS `tb_expire_product_detail`;
CREATE TABLE IF NOT EXISTS `tb_expire_product_detail` (
  `exp_id` int(11) NOT NULL,
  `pro_barcode` varchar(15) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  KEY `exp_id` (`exp_id`),
  KEY `pro_barcode` (`pro_barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_import`
--

DROP TABLE IF EXISTS `tb_import`;
CREATE TABLE IF NOT EXISTS `tb_import` (
  `imp_id` int(11) NOT NULL,
  `imp_date` datetime NOT NULL,
  `ord_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`imp_id`),
  KEY `ord_id` (`ord_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_import_detail`
--

DROP TABLE IF EXISTS `tb_import_detail`;
CREATE TABLE IF NOT EXISTS `tb_import_detail` (
  `imp_id` int(11) NOT NULL,
  `pro_barcode` varchar(15) NOT NULL,
  `quality` int(11) NOT NULL,
  KEY `imp_id` (`imp_id`),
  KEY `pro_barcode` (`pro_barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE IF NOT EXISTS `tb_order` (
  `ord_id` int(11) NOT NULL,
  `ord_date` datetime NOT NULL,
  `ord_status` varchar(15) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `Payment_status` varchar(15) DEFAULT NULL,
  `import_status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `sup_id` (`sup_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

DROP TABLE IF EXISTS `tb_order_detail`;
CREATE TABLE IF NOT EXISTS `tb_order_detail` (
  `ord_id` int(11) NOT NULL,
  `pro_barcode` varchar(15) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  KEY `ord_id` (`ord_id`),
  KEY `pro_barcode` (`pro_barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE IF NOT EXISTS `tb_product` (
  `pro_barcode` varchar(15) NOT NULL,
  `pro_name` varchar(25) NOT NULL,
  `quality` int(11) NOT NULL,
  `image` varchar(25) DEFAULT NULL,
  `buy_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `uni_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_barcode`),
  KEY `cat_id` (`cat_id`),
  KEY `uni_id` (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sell`
--

DROP TABLE IF EXISTS `tb_sell`;
CREATE TABLE IF NOT EXISTS `tb_sell` (
  `sel_id` int(11) NOT NULL,
  `sel_date` datetime NOT NULL,
  `cus_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`sel_id`),
  KEY `cus_id` (`cus_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sell_detail`
--

DROP TABLE IF EXISTS `tb_sell_detail`;
CREATE TABLE IF NOT EXISTS `tb_sell_detail` (
  `sel_id` int(11) NOT NULL,
  `pro_barcode` varchar(15) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  KEY `sel_id` (`sel_id`),
  KEY `pro_barcode` (`pro_barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(25) NOT NULL,
  `sup_phone` varchar(13) DEFAULT NULL,
  `sup_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_supplier`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE IF NOT EXISTS `tb_unit` (
  `uni_id` int(11) NOT NULL,
  `uni_name` varchar(25) NOT NULL,
  PRIMARY KEY (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_unit`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_expire_product`
--
ALTER TABLE `tb_expire_product`
  ADD CONSTRAINT `tb_expire_product_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tb_employee` (`emp_id`);

--
-- Constraints for table `tb_expire_product_detail`
--
ALTER TABLE `tb_expire_product_detail`
  ADD CONSTRAINT `tb_expire_product_detail_ibfk_1` FOREIGN KEY (`exp_id`) REFERENCES `tb_expire_product` (`exp_id`),
  ADD CONSTRAINT `tb_expire_product_detail_ibfk_2` FOREIGN KEY (`pro_barcode`) REFERENCES `tb_product` (`pro_barcode`);

--
-- Constraints for table `tb_import`
--
ALTER TABLE `tb_import`
  ADD CONSTRAINT `tb_import_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `tb_order` (`ord_id`),
  ADD CONSTRAINT `tb_import_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `tb_employee` (`emp_id`);

--
-- Constraints for table `tb_import_detail`
--
ALTER TABLE `tb_import_detail`
  ADD CONSTRAINT `tb_import_detail_ibfk_1` FOREIGN KEY (`imp_id`) REFERENCES `tb_import` (`imp_id`),
  ADD CONSTRAINT `tb_import_detail_ibfk_2` FOREIGN KEY (`pro_barcode`) REFERENCES `tb_product` (`pro_barcode`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `tb_supplier` (`sup_id`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `tb_employee` (`emp_id`);

--
-- Constraints for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD CONSTRAINT `tb_order_detail_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `tb_order` (`ord_id`),
  ADD CONSTRAINT `tb_order_detail_ibfk_2` FOREIGN KEY (`pro_barcode`) REFERENCES `tb_product` (`pro_barcode`);

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tb_category` (`cat_id`),
  ADD CONSTRAINT `tb_product_ibfk_2` FOREIGN KEY (`uni_id`) REFERENCES `tb_unit` (`uni_id`);

--
-- Constraints for table `tb_sell`
--
ALTER TABLE `tb_sell`
  ADD CONSTRAINT `tb_sell_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `tb_customer` (`cus_id`),
  ADD CONSTRAINT `tb_sell_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `tb_employee` (`emp_id`);

--
-- Constraints for table `tb_sell_detail`
--
ALTER TABLE `tb_sell_detail`
  ADD CONSTRAINT `tb_sell_detail_ibfk_1` FOREIGN KEY (`sel_id`) REFERENCES `tb_sell` (`sel_id`),
  ADD CONSTRAINT `tb_sell_detail_ibfk_2` FOREIGN KEY (`pro_barcode`) REFERENCES `tb_product` (`pro_barcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
