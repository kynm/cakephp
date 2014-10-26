-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2014 at 03:14 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `haivl`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE IF NOT EXISTS `friendships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) DEFAULT NULL,
  `user_to` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`) VALUES
(1, 'The title', 'This is the post body.', '2012-05-24 02:31:41', '2012-05-23 18:38:30', NULL),
(2, 'A title once again', 'And the post body follows.', '2012-05-24 02:31:41', '2012-05-23 18:38:42', NULL),
(5, 'tutorial', 'https://www.youtube.com/watch?v=uVAcGIQzFVM', '2014-10-11 22:06:43', '2014-10-11 22:06:43', 6),
(6, 'bai hat tieng anh', 'http://www.youtube.com/watch?v=6vWj66c88Do', '2014-10-13 16:28:54', '2014-10-13 16:30:14', 6),
(7, 'This field cannot be left blank', 'http://www.youtube.com/watch?v=O3Ucy2vhRw0', '2014-10-13 17:00:41', '2014-10-13 17:00:41', 6),
(9, 'sss', 'http://www.youtube.com/watch?v=Oqni5MHmWNc', '2014-10-13 17:23:50', '2014-10-13 17:23:50', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `created`, `modified`) VALUES
(4, 'admin', '020178e5acdb8de1a04335e245e4feefd8115edc', 'odin88@gmail.com', '', NULL, NULL),
(5, 'manhky', '123456', 'ngainguyendv@gmail.com', 'kynm', '2014-10-11 18:34:46', '2014-10-11 18:34:46'),
(6, 'aaaaaa', '26a0bd50daee7b722122be885af78750579b7c43', 'aaaaaa@gmail.com', 'aaaaaa', '2014-10-11 18:40:01', '2014-10-11 18:40:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;