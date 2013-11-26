-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `tolovesc`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `groups`
-- 

CREATE TABLE `groups` (
  `group_id` int(5) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `groups`
-- 

INSERT INTO `groups` VALUES (1, 'ผู้ดูแลระบบ');
INSERT INTO `groups` VALUES (2, 'สมาชิก');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `users`
-- 

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL auto_increment,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` text NOT NULL,
  `user_address` text NOT NULL,
  `user_logo_avatar` varchar(50) NOT NULL,
  `user_fb` varchar(50) NOT NULL,
  `user_into_date` date NOT NULL,
  `user_online_date` date NOT NULL,
  `user_status_id` int(5) NOT NULL,
  `group_id` int(5) NOT NULL,
  `deleted` int(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  KEY `users_status_id` (`user_status_id`,`group_id`),
  KEY `groups_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', 'admin', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '2013-11-22', 0, 1, 0);
INSERT INTO `users` VALUES (5, 'as', 'asdasd', 'as', 'as', '2013-10-30', 'as@dfas.com', '23121', 'asasas', 'PY.png', 'asasas', '2013-11-22', '0000-00-00', 1, 2, 0);
INSERT INTO `users` VALUES (6, 'aaaa', 'aaaa', 'อาณัติ', 'ลิ้นฤาษ๊', '1991-09-27', 'afasd@dasfsd.com', '011212122', 'บ้าน)ัน', '0', 'chidkai', '2013-11-22', '0000-00-00', 1, 2, 0);
INSERT INTO `users` VALUES (7, 'aaaa', 'aaaa', 'อาณัติ', 'ลิ้นฤาษ๊', '1991-09-27', 'afasd@dasfsd.com', '011212122', 'บ้าน)ัน', '0', 'chidkai', '2013-11-22', '0000-00-00', 2, 2, 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `users_status`
-- 

CREATE TABLE `users_status` (
  `user_status_id` int(5) NOT NULL,
  `user_status_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `users_status`
-- 

INSERT INTO `users_status` VALUES (1, 'ใช้งานอยู่');
INSERT INTO `users_status` VALUES (2, 'ระงับการใช้งาน');
