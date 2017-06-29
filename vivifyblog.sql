-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2017 at 03:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vivifyblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `text` text,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `created_at`, `text`, `user_id`, `category_id`) VALUES
(1, 'Post title', '2000-01-01', 'Some text that describes post', 1, 1),
(2, 'Post title', '2000-01-01', 'Some text that describes post', 1, 2),
(3, 'Post title', '2000-01-01', 'Some text that describes post', 1, 3),
(4, 'Post title', '2000-01-01', 'Some text that describes post', 1, 4),
(5, 'Post title', '2000-01-01', 'Some text that describes post', 1, 5),
(7, 'Post title', '2000-01-01', 'Some text that describes post', 1, 2),
(8, 'Post title', '2000-01-01', 'Some text that describes post', 1, 3),
(9, 'Post title', '2000-01-01', 'Some text that describes post', 1, 4),
(10, 'Post title', '2000-01-01', 'Some text that describes post', 1, 5),
(11, 'Post title', '2000-01-01', 'Some text that describes post', 2, 1),
(12, 'Post title', '2000-01-01', 'Some text that describes post', 2, 2),
(13, 'Post title', '2000-01-01', 'Some text that describes post', 2, 2),
(14, 'Post title', '2000-01-01', 'Some text that describes post', 2, 3),
(15, 'Post title', '2000-01-01', 'Some text that describes post', 3, 2),
(16, 'Post title', '2000-01-01', 'Some text that describes post', 3, 4),
(17, 'Post title', '2000-01-01', 'Some text that describes post', 3, 4),
(18, 'Post title', '2000-01-01', 'Some text that describes post', 5, 3),
(19, 'Post title', '2000-01-01', 'Some text that describes post', 5, 5),
(20, 'Post title', '2000-01-01', 'Some text that describes post', 6, 1),
(21, 'Post title', '2000-01-01', 'Some text that describes post', 6, 2),
(22, 'Post title', '2000-01-01', 'Some text that describes post', 6, 3),
(23, 'Post title', '2000-01-01', 'Some text that describes post', 7, 3),
(24, 'Post title', '2000-01-01', 'Some text that describes post', 7, 4),
(25, 'Post title', '2000-01-01', 'Some text that describes post', 7, 5),
(26, 'Post title', '2000-01-01', 'Some text that describes post', 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
