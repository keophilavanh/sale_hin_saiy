-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 03:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new_minimark`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(25) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`cat_id`, `cat_name`) VALUES
(1, 'ເຂົ້າໜົມ'),
(2, 'ມີ່ກ່ອງ'),
(4, 'ເຄື່ອງດື່ມ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE IF NOT EXISTS `tb_customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_fname` varchar(25) NOT NULL,
  `cus_lname` varchar(25) DEFAULT NULL,
  `cus_phone` varchar(13) DEFAULT NULL,
  `cus_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`cus_id`, `cus_fname`, `cus_lname`, `cus_phone`, `cus_address`) VALUES
(1, 'ຄຳຫຼ້າ', 'ຫຼວງສາມາດ', '58566622', 'sad'),
(2, 'ແມັດກີ້', 'ວັງວຽງ', '755555', 'ວັງວຽງ'),
(3, 'ລູກຄ້າທົ່ວໄປ', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE IF NOT EXISTS `tb_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_fname` varchar(25) NOT NULL,
  `emp_lname` varchar(25) DEFAULT NULL,
  `emp_phone` varchar(13) DEFAULT NULL,
  `emp_address` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_phone`, `emp_address`, `username`, `password`, `permission`) VALUES
(1, 'ໂຊກໄຊ', 'ແກ້ວພິລາວັນ', '8552077452952', 'ບ້ານ ດອນກອຍ ເມືອງສີສັດຕະນາກ ນະຄອນຫຼວງວຽງຈັນ', 'Admin', 'Admin', 'Admin'),
(2, 'ແມັກກີ້', 'ວັງວຽງ', '7777777', 'ວັງວຽງ', 'max', '12345', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_expire_product`
--

CREATE TABLE IF NOT EXISTS `tb_expire_product` (
  `exp_id` int(11) NOT NULL,
  `exp_date` datetime NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_expire_product`
--

INSERT INTO `tb_expire_product` (`exp_id`, `exp_date`, `emp_id`) VALUES
(1, '2019-04-23 19:14:54', 1),
(2, '2019-04-24 22:04:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_expire_product_detail`
--

CREATE TABLE IF NOT EXISTS `tb_expire_product_detail` (
  `exp_id` int(11) NOT NULL,
  `pro_barcode` varchar(15) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  KEY `exp_id` (`exp_id`),
  KEY `pro_barcode` (`pro_barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_expire_product_detail`
--

INSERT INTO `tb_expire_product_detail` (`exp_id`, `pro_barcode`, `quality`, `price`, `total`) VALUES
(1, 'kkjjhh', 2, 190000, 380000),
(2, '5555', 1, 30000, 30000),
(2, 'testdd', 3, 80000, 240000),
(2, 'sdasd', 3, 6000, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_import`
--

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
(1, '2019-04-02 00:00:00', 2, 2),
(2, '2019-04-01 21:02:12', 2, 1),
(3, '2019-04-01 21:11:56', 3, 1),
(4, '2019-04-02 16:28:01', 5, 1),
(5, '2019-04-23 10:54:38', 4, 1),
(6, '2019-04-23 10:55:15', 6, 1),
(7, '2019-04-23 10:55:49', 8, 1),
(8, '2019-04-23 11:28:16', 12, 1),
(9, '2019-04-23 11:33:34', 9, 1),
(10, '2019-04-23 11:34:45', 12, 1),
(11, '2019-04-23 11:36:28', 12, 1),
(12, '2019-04-23 11:38:10', 13, 1),
(13, '2019-04-23 11:39:26', 14, 1),
(14, '2019-04-23 12:59:54', 11, 1),
(15, '2019-04-23 13:00:01', 10, 1),
(16, '2019-04-23 13:00:13', 9, 1),
(17, '2019-04-23 13:00:23', 6, 1),
(18, '2019-04-23 13:00:31', 5, 1),
(19, '2019-04-24 22:16:30', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_import_detail`
--

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
(2, 'kkjjhh', 1),
(2, 'sdasd', 1),
(2, '5555', 1),
(3, 'kkjjhh', 4),
(3, '5555', 1),
(3, 'sdasd', 1),
(4, 'ffff', 1),
(4, 'kkjjhh', 1),
(4, 'sdasd', 1),
(5, '5555', 30),
(6, 'kkjjhh', 1),
(6, '5555', 1),
(6, '98799', 1),
(7, 'sdasd', 1),
(7, 'ffff', 1),
(8, '98799', 1),
(9, 'sdasd', 1),
(10, '98799', 1),
(11, '98799', 1),
(11, 'ffff', 1),
(11, 'kkjjhh', 1),
(12, '5555', 1),
(13, '98799', 15),
(14, 'sdasd', 1),
(14, 'ffff', 1),
(15, '98799', 1),
(16, 'sdasd', 1),
(17, 'kkjjhh', 1),
(17, '5555', 1),
(17, '98799', 1),
(18, 'ffff', 1),
(18, 'kkjjhh', 1),
(18, 'sdasd', 1),
(19, '5555', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

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
(2, '2019-04-01 16:05:57', 'ໃບສັ່ງຊື້', 1, 1, NULL, NULL),
(3, '2019-04-01 16:35:48', 'ໃບສັ່ງຊື້', 2, 1, 'ຈ່າຍແລ້ວ', NULL),
(4, '2019-04-01 18:47:19', 'ໃບສັ່ງຊື້', 1, 1, 'ຈ່າຍແລ້ວ', NULL),
(5, '2019-04-01 21:23:38', 'ໃບສັ່ງຊື້', 1, 1, 'ຈ່າຍແລ້ວ', 'ຮັບສິນຄ້າແລ້ວ'),
(6, '2019-04-01 22:45:50', 'ໃບສັ່ງຊື້', 2, 1, 'ຈ່າຍແລ້ວ', 'ຮັບສິນຄ້າແລ້ວ'),
(8, '2019-04-23 10:05:09', 'ໃບສັ່ງຊື້', 2, 1, 'ຍັງຄ້າງຈ່າ', 'ຮັບສິນຄ້າແລ້ວ'),
(9, '2019-04-23 10:32:43', 'ໃບສັ່ງຊື້', 2, 1, 'ຍັງຄ້າງຈ່າ', 'ຮັບສິນຄ້າແລ້ວ'),
(10, '2019-04-23 10:43:27', 'ໃບສັ່ງຊື້', 2, 1, 'ຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ'),
(11, '2019-04-23 10:45:56', 'ໃບສັ່ງຊື້', 2, 1, 'ຍັງຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ'),
(12, '2019-04-23 11:03:13', 'ໃບສັ່ງຊື້', 2, 1, 'ຍັງຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ'),
(13, '2019-04-23 11:37:39', 'ໃບສັ່ງຊື້', 1, 1, 'ຍັງຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ'),
(14, '2019-04-23 11:38:47', 'ໃບສັ່ງຊື້', 1, 1, 'ຍັງຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ'),
(15, '2019-04-23 20:37:10', 'ໃບສັ່ງຊື້', 2, 1, 'ຍັງຄ້າງຈ່າຍ', 'ຮັບສິນຄ້າແລ້ວ'),
(16, '2019-04-23 21:06:48', 'ໃບຂໍລາຄາ', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

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
(2, 'kkjjhh', 1, 150000, 150000),
(2, 'sdasd', 1, 4000, 4000),
(2, '5555', 1, 19000, 19000),
(3, 'kkjjhh', 4, 150000, 600000),
(3, '5555', 1, 19000, 19000),
(3, 'sdasd', 1, 4000, 4000),
(5, 'ffff', 1, 3000, 3000),
(5, 'kkjjhh', 1, 150000, 150000),
(5, 'sdasd', 1, 4000, 4000),
(4, '5555', 30, 19000, 570000),
(6, 'kkjjhh', 1, 150000, 150000),
(6, '5555', 1, 19000, 19000),
(6, '98799', 1, 2000, 2000),
(8, 'sdasd', 1, 4000, 4000),
(8, 'ffff', 1, 3000, 3000),
(9, 'sdasd', 1, 4000, 4000),
(10, '98799', 1, 2000, 2000),
(11, 'sdasd', 1, 4000, 4000),
(11, 'ffff', 1, 3000, 3000),
(12, '98799', 1, 2000, 2000),
(12, 'ffff', 1, 3000, 3000),
(12, 'kkjjhh', 1, 150000, 150000),
(13, '5555', 1, 19000, 19000),
(14, '98799', 15, 0, 0),
(15, '5555', 28, 34000, 952000),
(16, '5555', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

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

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`pro_barcode`, `pro_name`, `quality`, `image`, `buy_price`, `sell_price`, `cat_id`, `uni_id`) VALUES
('5555', 'ເລ', 23, '1554197168.', 0, 30000, 1, 5),
('98799', 'sfsd', 32, '1556001205.', 0, 5000, 2, 3),
('ffff', 'dfds', 22, NULL, 0, 6000, 1, 3),
('kkjjhh', 'dsdf', 22, NULL, 0, 190000, 2, 5),
('sdasd', 'ໂອອີຊິ', -1, '1553783534.', 0, 6000, 4, 3),
('testdd', 'serss', -4, NULL, 36000, 80000, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sell`
--

CREATE TABLE IF NOT EXISTS `tb_sell` (
  `sel_id` int(11) NOT NULL,
  `sel_date` datetime NOT NULL,
  `cus_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`sel_id`),
  KEY `cus_id` (`cus_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sell`
--

INSERT INTO `tb_sell` (`sel_id`, `sel_date`, `cus_id`, `emp_id`) VALUES
(1, '2019-03-29 13:17:23', 2, 1),
(2, '2019-03-29 13:36:16', 3, 1),
(3, '2019-03-29 13:52:10', 3, 1),
(4, '2019-03-29 14:23:13', 3, 1),
(5, '2019-03-29 14:23:39', 3, 1),
(6, '2019-03-29 14:25:01', 3, 1),
(7, '2019-04-02 16:19:13', 2, 1),
(8, '2019-04-23 12:50:04', 3, 1),
(9, '2019-04-23 12:51:08', 3, 1),
(10, '2019-04-23 12:51:31', 3, 1),
(11, '2019-04-23 12:54:37', 3, 1),
(12, '2019-04-23 20:21:20', 3, 1),
(13, '2019-04-24 20:54:19', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sell_detail`
--

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
(1, '5555', 2, 30000, 60000),
(1, 'kkjjhh', 4, 190000, 760000),
(1, 'sdasd', 3, 6000, 18000),
(2, 'sdasd', 1, 6000, 6000),
(2, '5555', 1, 30000, 30000),
(3, '5555', 1, 30000, 30000),
(4, '5555', 1, 30000, 30000),
(4, 'kkjjhh', 1, 190000, 190000),
(4, 'sdasd', 1, 6000, 6000),
(5, '5555', 1, 30000, 30000),
(5, 'kkjjhh', 1, 190000, 190000),
(5, 'sdasd', 1, 6000, 6000),
(6, '5555', 1, 30000, 30000),
(7, 'sdasd', 1, 6000, 6000),
(7, '5555', 1, 30000, 30000),
(8, '98799', 4, 5000, 20000),
(9, '98799', 3, 5000, 15000),
(10, '5555', 4, 30000, 120000),
(11, 'sdasd', 1, 6000, 6000),
(12, '5555', 1, 30000, 30000),
(12, 'ffff', 1, 6000, 6000),
(13, '5555', 1, 30000, 30000),
(13, 'ffff', 1, 6000, 6000),
(13, 'testdd', 1, 80000, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(25) NOT NULL,
  `sup_phone` varchar(13) DEFAULT NULL,
  `sup_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`sup_id`, `sup_name`, `sup_phone`, `sup_address`) VALUES
(1, 'ຮ້ານຈີນ', '55667788', 'ຫນ້າສະພະວິຊາ'),
(2, 'ຮ້ານຫວຽດ', '99555666', 'ໂພນທັນ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE IF NOT EXISTS `tb_unit` (
  `uni_id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_name` varchar(25) NOT NULL,
  PRIMARY KEY (`uni_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`uni_id`, `uni_name`) VALUES
(2, 'ແກ້ວ'),
(3, 'ຕຸກ'),
(4, 'ປ໋ອງ'),
(5, 'ແພກ'),
(6, 'ຖົງ');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
