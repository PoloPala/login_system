-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2021 at 01:29 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_country` varchar(150) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `user_country`, `user_city`, `user_password`) VALUES
(1, 'Test user', 'test@user.com', 1111111, 'mabibo', 'Tanzania', 'City 01', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'Test user2', 'test@user2.com', 2222222, 'buza', 'Tanzania', 'City 01', '098f6bcd4621d373cade4e832627b4f6');
COMMIT;