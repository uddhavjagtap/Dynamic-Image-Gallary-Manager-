-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 01:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `title`, `image_path`) VALUES
(1, 3, 'image2', 'Screenshot (2).png'),
(2, 3, 'image 2', 'Screenshot (9).png'),
(3, 3, 'kjfhdgjg', 'Screenshot (8).png'),
(4, 3, 'mage4', 'id.jpg'),
(6, 5, 'image1', 'images/photo_2022-01-16_17-54-15.jpg'),
(7, 5, 'uddhav', 'images/Screenshot 2022-08-13 162637.png'),
(8, 6, 'uddhav 1 image', 'images/DSC_0339.JPG'),
(10, 10, 'my updates image', 'images/IMG20230413151729.jpg'),
(12, 11, 'first img', 'images/vesUoP6-wallpaper-birds.jpg'),
(14, 11, 'third img', 'images/wc1672553-wallpaper-nature-full-size-desktop-2016.jpg'),
(15, 11, 'fourth img', 'images/wp2590510-hd-wallpapers-for-desktop-full-size.jpg'),
(16, 11, 'new img', 'images/70063-logo-travel-design-free-hq-image.png'),
(17, 5, 'my_tempalate', 'images/wc1672553-wallpaper-nature-full-size-desktop-2016.jpg'),
(18, 5, 'last', 'images/vesUoP6-wallpaper-birds.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'uddhav', '123456789'),
(3, 'mahi', '$2y$10$h84fPTBpx1xsZXUM/5/t7.KTwwfY2HwlH39FaROe8qXfAUnVt9m1G'),
(5, 'mahi2', 'e4eac5b0a4f05aa6e594e8804bc4091b'),
(6, 'uddhav1', '25f9e794323b453885f5181f1b624d0b'),
(9, 'mahi3', 'e4eac5b0a4f05aa6e594e8804bc4091b'),
(10, 'mahi7', 'e807f1fcf82d132f9bb018ca6738a19f'),
(11, 'demo2', 'e4eac5b0a4f05aa6e594e8804bc4091b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
