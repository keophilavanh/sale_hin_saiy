-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2020 at 03:09 PM
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
-- Database: `sale_hin_saiy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE IF NOT EXISTS `tb_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(25) NOT NULL,
  `active` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`cat_id`, `cat_name`, `active`, `delete`) VALUES
(1, 'ເຂົ້າໜົມ', 1, 1),
(2, 'ມີ່ກ່ອງ', 1, 0),
(4, 'ເຄື່ອງດື່ມ', 1, 0),
(5, 'aaasdsd', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE IF NOT EXISTS `tb_customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_fname` varchar(25) NOT NULL,
  `cus_lname` varchar(25) DEFAULT NULL,
  `cus_phone` varchar(13) DEFAULT NULL,
  `cus_address` varchar(100) DEFAULT NULL,
  `cus_car_number` varchar(6) DEFAULT NULL,
  `cus_cart` varchar(20) DEFAULT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`cus_id`, `cus_fname`, `cus_lname`, `cus_phone`, `cus_address`, `cus_car_number`, `cus_cart`, `delete`) VALUES
(1, 'ຄຳຫຼ້າ', 'ຫຼວງສາມາດ', '58566622', 'sad', '2222', NULL, 1),
(2, 'ແມັດກີ້', 'ວັງວຽງ', '755555', 'ວັງວຽງ', '7051', NULL, 0),
(3, 'ລູກຄ້າທົ່ວໄປ', ' ', ' ', ' ', '9999', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

DROP TABLE IF EXISTS `tb_employee`;
CREATE TABLE IF NOT EXISTS `tb_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_fname` varchar(25) NOT NULL,
  `emp_lname` varchar(25) DEFAULT NULL,
  `emp_phone` varchar(13) DEFAULT NULL,
  `emp_address` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_phone`, `emp_address`, `username`, `password`, `permission`, `delete`) VALUES
(1, 'ໂຊກໄຊ', 'ແກ້ວພິລາວັນ', '8552077452952', 'ບ້ານ ດອນກອຍ ເມືອງສີສັດຕະນາກ ນະຄອນຫຼວງວຽງຈັນ', 'Admin', 'Admin', 'Admin', 0),
(2, 'ແມັກກີ້', 'ວັງວຽງ', '7777777', 'ວັງວຽງ', 'max', '12345', 'Employee', 1);

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

--
-- Dumping data for table `tb_import`
--

INSERT INTO `tb_import` (`imp_id`, `imp_date`, `ord_id`, `emp_id`) VALUES
(1, '2020-06-19 10:39:27', 1, 1),
(2, '2020-06-19 13:23:49', 2, 1),
(3, '2020-06-19 13:26:53', 1, 1),
(4, '2020-06-19 13:28:22', 1, 1);

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

--
-- Dumping data for table `tb_import_detail`
--

INSERT INTO `tb_import_detail` (`imp_id`, `pro_barcode`, `quality`) VALUES
(1, '122', 100),
(2, '122', 10),
(3, '122', 100),
(4, '122', 100);

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

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`ord_id`, `ord_date`, `ord_status`, `sup_id`, `emp_id`, `Payment_status`, `import_status`) VALUES
(1, '2020-06-19 10:38:31', 'ໃບສັ່ງຊື້', 1, 1, 'ຍັງຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ'),
(2, '2020-06-19 13:23:34', 'ໃບສັ່ງຊື້', 2, 1, 'ຍັງຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ');

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

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`ord_id`, `pro_barcode`, `quality`, `price`, `total`) VALUES
(1, '122', 100, 500, 50000),
(2, '122', 10, 500, 5000);

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
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`pro_barcode`),
  KEY `cat_id` (`cat_id`),
  KEY `uni_id` (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`pro_barcode`, `pro_name`, `quality`, `image`, `buy_price`, `sell_price`, `cat_id`, `uni_id`, `delete`) VALUES
('02', 'khanummun', -2, NULL, 2000, 20000, 2, 2, 0),
('122', 'test', 71, NULL, 500, 5000, 2, 2, 1);

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
  `tax` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`sel_id`),
  KEY `cus_id` (`cus_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sell`
--

INSERT INTO `tb_sell` (`sel_id`, `sel_date`, `cus_id`, `emp_id`, `tax`, `total`, `amount`) VALUES
(1, '2020-06-19 10:40:49', 3, 1, 0, 0, 0),
(2, '2020-06-19 10:42:24', 3, 1, 0, 0, 0),
(3, '2020-06-19 10:44:58', 3, 1, 0, 0, 0),
(4, '2020-06-19 10:45:44', 3, 1, 0, 0, 0),
(5, '2020-06-19 13:22:29', 2, 1, 0, 0, 0),
(6, '2020-06-22 22:08:15', 3, 1, 0, 0, 0),
(7, '2020-07-02 10:43:18', 3, 1, 1000, 11000, 10000),
(8, '2020-07-02 10:45:08', 3, 1, 500, 5500, 5000),
(9, '2020-07-02 18:30:48', 3, 1, 200, 10200, 10000),
(10, '2020-07-13 13:44:08', 3, 1, 200, 10200, 10000),
(11, '2020-07-14 19:38:33', 3, 1, 400, 20400, 20000),
(12, '2020-07-14 19:51:07', 3, 1, 100, 5100, 5000),
(13, '2020-07-17 09:37:42', 3, 2, 100, 5100, 5000),
(14, '2020-07-17 09:48:28', 3, 2, 100, 5100, 5000),
(15, '2020-07-17 09:54:23', 3, 2, 100, 5100, 5000),
(16, '2020-07-17 10:02:46', 3, 2, 500, 25500, 25000),
(17, '2020-07-17 23:26:23', 3, 1, 100, 5100, 5000),
(18, '2020-07-18 08:46:35', 2, 1, 500, 25500, 25000);

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

--
-- Dumping data for table `tb_sell_detail`
--

INSERT INTO `tb_sell_detail` (`sel_id`, `pro_barcode`, `quality`, `price`, `total`) VALUES
(1, '122', 1, 5000, 5000),
(2, '122', 1, 5000, 5000),
(3, '122', 1, 5000, 5000),
(4, '122', 1, 5000, 5000),
(5, '122', 1, 5000, 5000),
(6, '122', 1, 5000, 5000),
(7, '122', 2, 5000, 10000),
(8, '122', 1, 5000, 5000),
(9, '122', 2, 5000, 10000),
(10, '122', 2, 5000, 10000),
(11, '122', 4, 5000, 20000),
(12, '122', 1, 5000, 5000),
(13, '122', 1, 5000, 5000),
(14, '122', 1, 5000, 5000),
(15, '122', 1, 5000, 5000),
(16, '122', 1, 5000, 5000),
(16, '02', 1, 20000, 20000),
(17, '122', 1, 5000, 5000),
(18, '122', 1, 5000, 5000),
(18, '02', 1, 20000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(25) NOT NULL,
  `sup_phone` varchar(13) DEFAULT NULL,
  `sup_address` varchar(100) DEFAULT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`sup_id`, `sup_name`, `sup_phone`, `sup_address`, `delete`) VALUES
(1, 'ຮ້ານຈີນ', '55667788', 'ຫນ້າສະພະວິຊາ', 1),
(2, 'ຮ້ານຫວຽດ', '99555666', 'ໂພນທັນ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tax`
--

DROP TABLE IF EXISTS `tb_tax`;
CREATE TABLE IF NOT EXISTS `tb_tax` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tax`
--

INSERT INTO `tb_tax` (`id`, `total`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE IF NOT EXISTS `tb_unit` (
  `uni_id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_name` varchar(25) NOT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`uni_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`uni_id`, `uni_name`, `delete`) VALUES
(2, 'ແກ້ວ', 0),
(3, 'ຕຸກ', 0),
(4, 'ປ໋ອງ', 0),
(5, 'ແພກ', 1),
(6, 'ຖົງ', 1);

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
