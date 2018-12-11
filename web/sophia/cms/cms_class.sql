-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 04:08 AM
-- Server version: 8.0.12
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'beidan huang'),
(4, 'sophia'),
(12, 'this is php'),
(222, 'i love beidan'),
(232, 'Wonderful');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'I love php sooooo much', 'Edwin Diaz      ', '2018-12-01', 'IMG_7519.jpg', '                                                                        Wow I really like this course \r\n        \r\n        \r\n        \r\n        \r\n        \r\n       ', 'Edwin, JavaScript, PHP      ', 1, 'draft      '),
(2, 2, 'JavaScript Course Post', 'Sophia', '2018-11-13', '', 'WOW man this is really cool post? Can you call me?', 'wonderful', 3, 'draft'),
(4, 1, ' Capstone Demo', 'Beidan     ', '2018-12-01', 'Screen Shot 2018-11-28 at 10.40.02 AM.png', 'Wow,\r\nSophia you did a great job\r\n        \r\n        \r\n        \r\n       ', 'php     ', 4, 'Great     '),
(7, 1, '', 'sophia ', '2018-12-01', 'Screen Shot 2018-11-29 at 12.42.18 AM.png', '            Oh cool, this staff is really awesome \r\n       ', 'Capstone progress ', 4, 'good '),
(8, 222, 'Example post No.1000 ', 'Sophia ', '2018-12-01', 'IMG_2343.JPG', '            HAHAHAHAPPY \r\n       ', 'LaJolla ', 4, 'good '),
(17, 40, 'Best PHP Ever', 'Beidan Huang', '2018-12-01', 'after-19.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'java,webcrawling', 4, 'Awesome');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
