-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 17, 2011 at 09:46 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `db_repair`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `order_repairs`
-- 

CREATE TABLE `order_repairs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_repair_computer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_repair_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_repair_status` enum('wait','repair','complete') COLLATE utf8_unicode_ci NOT NULL,
  `order_repair_created_date` datetime NOT NULL,
  `order_repair_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `order_repair_will_complete_date` date NOT NULL,
  `order_repair_get_date` datetime NOT NULL,
  `order_repair_complete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `order_repairs`
-- 

INSERT INTO `order_repairs` VALUES (1, 'com001', 'เปิดไม่ได้ จอฟ้า', 1, 'complete', '2011-03-03 11:56:52', 'ทดสอบ', 1, '2554-03-04', '2011-03-04 11:22:29', '2011-03-04 15:42:16');
INSERT INTO `order_repairs` VALUES (4, 'k1001', 'ต้องการลงโปรแกรม OFFICE 2010 เพราะที่ใช้อยู่ไม่ทันสมัย ช่วยลงให้ด้วยค่ะ', 1, 'complete', '2011-03-04 15:44:16', '', 1, '2554-03-04', '2011-03-04 15:45:03', '2011-03-04 15:45:53');
INSERT INTO `order_repairs` VALUES (5, 'com002', 'เข้าระบบโปรแกรมน้ำมันไม่ได้', 1, 'wait', '2011-03-05 12:37:43', '', 1, '2554-03-07', '2011-03-05 13:12:04', '0000-00-00 00:00:00');
INSERT INTO `order_repairs` VALUES (3, 'com001', 'เมาส์ใช้งานไม่ได้ ถูก็ไม่ขยับไปไหนเลย', 1, 'repair', '2011-03-04 15:35:03', 'เมาส์เสีย ต้องเปลี่ยนอันใหม่เลย', 1, '2554-03-04', '2011-03-04 15:41:39', '0000-00-00 00:00:00');
INSERT INTO `order_repairs` VALUES (6, 'com005', 'กล้อง webcam ใช้การไม่ได้ บางครั้งก็ได้ แต่ว่าจะมีปัญหาว่าภาพกระตุก และค้างไปเลย ช่วยรีบแก้ไขให้โดยด่วนเพราะต้องใช้ในการประชุมสัมมนาในกลางเดือนนี้', 1, 'repair', '2011-03-05 15:44:19', 'ต้องเปลี่ยนกล้องให้ใหม่', 5, '2554-03-05', '2011-03-05 16:10:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `repair_records`
-- 

CREATE TABLE `repair_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_repair_id` int(11) NOT NULL,
  `repair_record_created_date` datetime NOT NULL,
  `repair_record_detail` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `repair_records`
-- 

INSERT INTO `repair_records` VALUES (1, 1, '2011-03-04 15:21:20', 'ตรวจสอบแผงวงจรภายในเครื่อง');
INSERT INTO `repair_records` VALUES (2, 1, '2011-03-04 15:27:38', 'เปลี่ยนแรมอันใหม่ลองดู คาดว่าจะเป็นกับลำดับการขึ้นลงของ แรม');
INSERT INTO `repair_records` VALUES (3, 3, '2011-03-04 15:42:06', 'เบิกเมาส์จากสโตว์ มาเปลี่ยนให้ใหม่');
INSERT INTO `repair_records` VALUES (4, 4, '2011-03-04 15:45:45', 'ลงโปรแกรมให้');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` enum('user','admin','manager','service') COLLATE utf8_unicode_ci NOT NULL,
  `user_created_date` datetime NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'user_demo', '1234', 'ผู้ใช้ ยอดเยี่ยม', '0123456789', 'user', '2011-03-02 00:00:00', 'user@mail.com');
INSERT INTO `users` VALUES (5, 'service_demo', '1234', 'นายช่างซ่อม ขยันหลับ', '01234567890', 'service', '2011-03-02 09:22:25', 'service@mail.com');
INSERT INTO `users` VALUES (6, 'admin_demo', '1234', 'นายเอกราช ใจซื่อ', '', 'admin', '2011-03-02 09:22:42', 'admin@mail.com');
INSERT INTO `users` VALUES (7, 'sdf', '1234', 'sdfsdf', '', 'admin', '2011-03-02 11:00:44', 'sdf@hot.com');
INSERT INTO `users` VALUES (8, 'sfs', '1234', 'sdfsdf', 'sdf', 'admin', '2011-03-02 11:05:22', 'sdfsdf@hotm.com');
INSERT INTO `users` VALUES (9, 'manager_demo', '1234', 'บริหาร เวิคจริง', '0123456789', 'manager', '2011-03-05 15:35:23', 'manager@mail.com');
