-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://wwwmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 09:07 PM
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
-- Database: `renit`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_brand` text NOT NULL,
  `asset_by_address` text NOT NULL,
  `asset_by_area` text NOT NULL,
  `asset_by_name` text NOT NULL,
  `asset_by_number` text NOT NULL,
  `asset_by_email` text NOT NULL,
  `asset_category` int(11) NOT NULL,
  `asset_description` text NOT NULL,
  `asset_images` text NOT NULL,
  `asset_location` text NOT NULL,
  `asset_model` text NOT NULL,
  `asset_name` text NOT NULL,
  `asset_price` double NOT NULL,
  `asset_safety_deposite` text NOT NULL,
  `asset_sub_category` int(11) NOT NULL,
  `asset_thumbnail` text NOT NULL,
  `asset_useage_description` text NOT NULL,
  `asset_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` text NOT NULL,
  `asset_tag` text NOT NULL,
  `asset_price_type` text NOT NULL,
  `asset_category_type` text NOT NULL,
  `asset_condition` text NOT NULL,
  `symbol` text NOT NULL,
  `curr_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_brand`, `asset_by_address`, `asset_by_area`, `asset_by_name`, `asset_by_number`, `asset_by_email`, `asset_category`, `asset_description`, `asset_images`, `asset_location`, `asset_model`, `asset_name`, `asset_price`, `asset_safety_deposite`, `asset_sub_category`, `asset_thumbnail`, `asset_useage_description`, `asset_user`, `id`, `created_at`, `asset_tag`, `asset_price_type`, `asset_category_type`, `asset_condition`, `symbol`, `curr_code`) VALUES
('Persian', 'A-39, Amrit puri, Ghat gate, Jaipur', 'Udaipur, Rajasthan, India', 'Zaidan Khan', '', '', 1, 'This is a cat', './assets/images/product/K6wOFGTJRW/', 'Udaipur, Rajasthan, India', 'ZEE@123', 'CAT DONIE', 1500, '100', 1, './assets/images/product/rEudSNKkR8/WhatsApp Image 2023-09-19 at 01.42.09.jpeg', 'Let it be', 6, 1, '2023-09-17 12:19:16', '', 'fixed', '', 'active', '$', ''),
('Test Test', 'Test Test', '', 'Test Test', '7014230599', '', 1, 'Test Test', './assets/images/product/bSDnfaroIc/', 'Hotel Royal Palm - A Budget Hotel in Udaipur', 'Test Test', 'Test Test', 50, '500', 1, './assets/images/product/rEudSNKkR8/WhatsApp Image 2023-09-19 at 01.42.09.jpeg', 'Test Test', 6, 2, '2023-09-17 15:45:32', '', 'fixed', '', 'active', '$', 'USD'),
('Test 2', 'Test 2', '', 'Test 2', '4545454545', '', 1, 'Test 2', './assets/images/product/HFdezohv5q/', 'Nariman Bhavan, Vinay K Shah Marg, Nariman Point, Mumbai, Maharashtra, India', 'Test 2', 'Test 2', 545, '5453', 1, './assets/images/product/av1TqIUfiw/01.jpg', 'Test 2', 6, 3, '2023-09-17 16:10:22', '', 'fixed', '', 'active', '$', 'USD'),
('akvnbld', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 1, 'random', './assets/images/product/eftlAFh1aj/', 'Jaipur, Rajasthan, India', 'aofnglalk', 'Random 1', 10, '5', 1, './assets/images/product/rEudSNKkR8/WhatsApp Image 2023-09-19 at 01.42.09.jpeg', 'random', 1, 8, '2023-09-19 01:47:49', '', 'fixed', '', 'active', '$', 'USD'),
('akvnbld', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 1, 'random', './assets/images/product/eftlAFh1aj/', 'Jaipur, Rajasthan, India', 'aofnglalk', 'zainnn', 10, '5', 1, './assets/images/product/rEudSNKkR8/WhatsApp Image 2023-09-19 at 01.42.09.jpeg', 'random', 1, 9, '2023-09-19 01:47:49', '', 'fixed', '', 'active', '$', 'USD'),
('Random 1', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 2, 'random', './assets/images/product/IfphRLTHsu/', 'Toronto, ON, Canada', 'ZEE@123', 'Random 1', 500, '500', 2, './assets/images/product/pJNkjdv7RI/WhatsApp Image 2023-09-19 at 11.22.29.jpeg', 'random', 1, 10, '2023-09-19 14:27:43', '', 'fixed', '', 'active', '', 'CAD'),
('Random 1', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 2, 'random', './assets/images/product/l5AE2tyHJF/', 'Toronto, ON, Canada', 'ZEE@123', 'Random 1', 500, '500', 2, './assets/images/product/tPHFgUshGO/WhatsApp Image 2023-09-19 at 11.22.29.jpeg', 'random', 1, 11, '2023-09-19 14:28:27', '', 'fixed', '', 'active', '', ''),
('Persian', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 1, 'asd', './assets/images/product/rvg1Su8pkP/', 'Toronto, ON, Canada', 'ZEE@123', 'Cat', 500, '199', 1, './assets/images/product/ZUhzJfI6ng/WhatsApp Image 2023-09-19 at 11.22.29.jpeg', 'asd', 1, 12, '2023-09-19 14:29:35', '', 'fixed', '', 'active', 'CA$', 'CAD'),
('Persian', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 1, 'asd', './assets/images/product/P7q3rX4pDV/', 'Toronto, ON, Canada', 'ZEE@123', 'Cat', 500, '199', 1, './assets/images/product/jt4YiQzfhb/WhatsApp Image 2023-09-19 at 11.22.29.jpeg', 'asd', 1, 13, '2023-09-19 14:30:22', '', 'fixed', '', 'active', '', ''),
('Persian', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 1, 'asd', './assets/images/product/V7kiG3rXem/', 'Toronto, ON, Canada', 'ZEE@123', 'Cat', 500, '199', 1, './assets/images/product/YkLao0vhJF/WhatsApp Image 2023-09-19 at 11.22.29.jpeg', 'asd', 1, 16, '2023-09-19 14:32:20', '', 'fixed', '', 'active', 'CA$', 'CAD'),
('azsdxcfvgbvhnj', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 1, 'fsdfxuhgjhvujhgfcfxdfcgfdxcvnbhjkl lgigkuygiuyvhgv', './assets/images/product/kreOxvYu4h/', 'Jaipur, Rajasthan,India', 'waerestfgchnmv', 'mmlkmllkmlkm', 100000, '30000', 1, './assets/images/product/Dp1XL9nMgc/pro_picture.png', 'hgvhjgjjjjjjjjjjjjj k uygihfhjhjjjjjjjjjjjjj', 1, 17, '2023-09-29 12:29:21', '', 'fixed', '', 'active', '₹', 'INR'),
('something ', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 2, 'something ', './assets/images/product/Q1Jnf9vlcr/', 'Nariman Bhavan, Vinay K Shah Marg, Nariman Point, Mumbai, Maharashtra, India', 'ZEE@123', 'something ', 1500, '1500', 2, './assets/images/product/FHev5VG7my/smartmockups_ln1fva6f.jpg', 'somethings', 2, 18, '2023-10-08 18:40:12', '', 'fixed', '', 'active', '₹', 'INR'),
('asdasda', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 1, 'testin', './assets/images/product/QG54kSUaKX/', 'USA', 'ZEE@123', 'asdasdas', 9999, '100', 1, './assets/images/product/BEaV9PoRir/Generate an ima 0.png', 'testin', 2, 19, '2023-10-12 01:43:31', '', 'fixed', '', 'active', '$', 'USD'),
('', 'A-39, Amrit puri, Ghat gate, Jaipur', '', 'Zaidan Khan', '', '', 2, '', './assets/images/product/1ImXa8WAun/', 'Jaipur, Rajasthan, India', '', 'Cat', 15000, '300', 2, './assets/images/product/kLN3wxUiAa/electronics.jpg', '', 1, 20, '2023-10-31 15:08:53', '', 'fixed', '', '', '₹', 'INR');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `asset_id` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `user_id`, `asset_id`, `created_at`) VALUES
(47, '16', '2', '2023-09-19 23:56:33'),
(48, '16', '3', '2023-09-19 23:56:34'),
(49, '16', '8', '2023-09-19 23:56:35'),
(50, '16', '1', '2023-09-20 00:09:07'),
(59, '1', '15', '2023-10-08 01:28:29'),
(62, '1', '9', '2023-10-08 14:20:28'),
(73, '1', '17', '2023-10-08 14:40:01'),
(86, '1', '19', '2023-10-15 16:44:29'),
(87, '1', '1', '2023-10-25 17:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_description` text NOT NULL,
  `category_image` text NOT NULL,
  `category_icon` text NOT NULL,
  `category_name` text DEFAULT NULL,
  `created_at` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_description`, `category_image`, `category_icon`, `category_name`, `created_at`, `id`) VALUES
(' animal', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Animals', '2023-09-05 11:03:04', 1),
('Cars', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Car', '2023-09-05 11:03:04', 2),
(' animal', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Animals', '2023-09-05 11:03:04', 4),
('Cars', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Car', '2023-09-05 11:03:04', 5),
('Cars', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Car', '2023-09-05 11:03:04', 6),
(' animal', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Animals', '2023-09-05 11:03:04', 7),
('Cars', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Car', '2023-09-05 11:03:04', 8),
(' animal', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Animals', '2023-09-05 11:03:04', 9),
('Cars', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Car', '2023-09-05 11:03:04', 10),
('Cars', './assets/images/category/hiMVC7yUJa/animals.jpg', './assets/images/category/XJ5Q7xY6kt/animals.png', 'Car', '2023-09-05 11:03:04', 11);

-- --------------------------------------------------------

--
-- Table structure for table `chat_link`
--

CREATE TABLE `chat_link` (
  `chat_asset_id` int(11) NOT NULL,
  `chat_owner_id` int(11) NOT NULL,
  `chat_reciever_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_link`
--

INSERT INTO `chat_link` (`chat_asset_id`, `chat_owner_id`, `chat_reciever_id`, `date`, `id`) VALUES
(19, 2, 6, '2023-10-31 23:04:58', 1),
(17, 1, 2, '2023-10-31 23:05:03', 2),
(17, 1, 6, '2023-10-31 23:05:56', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Zaidan Khan', 'khanzaidan786@gmail.com', 'sub', 'Test', '2023-09-19 00:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `asset_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `message_type` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `chat_link_id` int(11) NOT NULL,
  `message_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`asset_id`, `date`, `id`, `message`, `message_type`, `sender_id`, `status`, `chat_link_id`, `message_status`) VALUES
(19, '2023-10-31 23:04:58', 1, 'a:1:{s:4:\"link\";s:2:\"19\";}', 'simple', 6, 1, 1, ''),
(17, '2023-10-31 23:05:03', 2, 'a:1:{s:4:\"link\";s:2:\"17\";}', 'simple', 2, 1, 2, ''),
(19, '2023-10-31 23:05:09', 3, 'a:1:{s:4:\"link\";s:2:\"19\";}', 'simple', 1, 1, 2, ''),
(19, '2023-10-31 23:05:32', 4, 'i want this', 'sent', 6, 1, 1, ''),
(19, '2023-10-31 23:05:37', 5, 'i know', 'sent', 2, 1, 1, ''),
(17, '2023-10-31 23:05:42', 6, 'we can share', 'sent', 1, 1, 2, ''),
(17, '2023-10-31 23:05:48', 7, 'ok', 'sent', 2, 1, 2, ''),
(17, '2023-10-31 23:05:56', 8, 'a:1:{s:4:\"link\";s:2:\"17\";}', 'simple', 6, 1, 3, ''),
(17, '2023-10-31 23:06:02', 9, 'make sense?', 'sent', 6, 1, 3, ''),
(17, '2023-10-31 23:06:10', 10, 'yes', 'sent', 1, 1, 3, ''),
(17, '2023-10-31 23:06:14', 11, 'is it working now?', 'sent', 1, 1, 3, ''),
(17, '2023-10-31 23:06:22', 12, 'yes', 'sent', 6, 1, 3, ''),
(19, '2023-10-31 23:06:28', 13, 'how ?', 'sent', 6, 1, 1, ''),
(19, '2023-10-31 23:06:32', 14, 'idk', 'sent', 2, 1, 1, ''),
(19, '2023-11-01 12:40:28', 15, 'a:4:{s:4:\"from\";s:10:\"2023-11-01\";s:2:\"to\";s:10:\"2023-11-08\";s:5:\"price\";s:4:\"1500\";s:4:\"link\";s:2:\"19\";}', 'detailed', 1, 1, 2, ''),
(17, '2023-11-17 17:21:44', 16, 'fuck you', 'sent', 1, 0, 2, ''),
(17, '2023-11-17 17:22:53', 17, 'yes you', 'sent', 1, 0, 2, ''),
(17, '2023-11-17 18:25:03', 18, 'Han', 'sent', 1, 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed`
--

CREATE TABLE `recently_viewed` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recently_viewed`
--

INSERT INTO `recently_viewed` (`id`, `asset_id`, `user_id`, `created_at`) VALUES
(1, 18, 1, '2023-10-10 01:06:09'),
(2, 17, 1, '2023-10-10 01:06:22'),
(3, 19, 2, '2023-10-12 01:43:31'),
(4, 19, 2, '2023-10-12 01:43:59'),
(5, 19, 2, '2023-10-12 01:44:07'),
(6, 19, 2, '2023-10-12 01:44:10'),
(7, 19, 2, '2023-10-12 01:44:16'),
(8, 19, 2, '2023-10-12 01:44:18'),
(9, 19, 2, '2023-10-12 01:44:20'),
(10, 19, 2, '2023-10-12 01:44:34'),
(11, 19, 2, '2023-10-12 01:44:37'),
(12, 19, 2, '2023-10-12 01:44:40'),
(13, 19, 2, '2023-10-12 01:44:47'),
(14, 19, 2, '2023-10-12 01:44:51'),
(15, 19, 2, '2023-10-12 01:45:01'),
(16, 19, 2, '2023-10-12 01:46:50'),
(17, 19, 2, '2023-10-12 01:47:13'),
(18, 19, 2, '2023-10-12 01:47:29'),
(19, 19, 2, '2023-10-12 01:47:45'),
(20, 19, 2, '2023-10-12 01:47:48'),
(21, 19, 2, '2023-10-12 01:48:30'),
(22, 19, 2, '2023-10-12 01:48:38'),
(23, 19, 1, '2023-10-12 01:48:53'),
(24, 18, 2, '2023-10-13 20:02:24'),
(25, 17, 1, '2023-10-15 16:36:43'),
(26, 19, 1, '2023-10-15 16:37:17'),
(27, 19, 1, '2023-10-15 16:37:31'),
(28, 19, 1, '2023-10-15 16:39:26'),
(29, 19, 1, '2023-10-15 16:40:14'),
(30, 19, 1, '2023-10-15 16:41:11'),
(31, 19, 1, '2023-10-15 16:41:29'),
(32, 19, 1, '2023-10-15 16:41:39'),
(33, 19, 1, '2023-10-15 16:42:11'),
(34, 19, 1, '2023-10-15 16:42:25'),
(35, 19, 1, '2023-10-15 16:42:31'),
(36, 19, 1, '2023-10-15 16:42:34'),
(37, 19, 1, '2023-10-15 16:43:25'),
(38, 19, 1, '2023-10-15 16:43:37'),
(39, 19, 1, '2023-10-15 16:44:07'),
(40, 19, 1, '2023-10-15 16:44:17'),
(41, 19, 1, '2023-10-15 16:44:45'),
(42, 19, 1, '2023-10-15 16:44:52'),
(43, 19, 1, '2023-10-15 16:45:11'),
(44, 1, 1, '2023-10-15 16:45:42'),
(45, 11, 1, '2023-10-15 16:59:06'),
(46, 18, 1, '2023-10-21 02:12:18'),
(47, 18, 1, '2023-10-21 02:14:03'),
(48, 18, 1, '2023-10-21 02:14:11'),
(49, 17, 1, '2023-10-21 02:58:14'),
(50, 17, 1, '2023-10-21 03:00:23'),
(51, 1, 1, '2023-10-21 03:01:01'),
(52, 13, 1, '2023-10-25 17:29:12'),
(53, 19, 6, '2023-10-25 23:53:22'),
(54, 17, 2, '2023-10-25 23:55:15'),
(55, 17, 1, '2023-10-26 05:33:19'),
(56, 17, 0, '2023-10-26 06:01:21'),
(57, 1, 2, '2023-10-28 01:17:32'),
(58, 20, 1, '2023-10-31 15:08:55'),
(59, 10, 1, '2023-10-31 22:47:29'),
(60, 18, 6, '2023-10-31 22:59:52'),
(61, 17, 6, '2023-10-31 23:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `asset_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` text NOT NULL,
  `id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`asset_id`, `content`, `created_at`, `id`, `stars`, `user_id`) VALUES
(17, 'This is a review', '2023-09-19 20:25:17', 1, 5, 1),
(17, 'this is also a review', '2023-10-08 00:45:39', 2, 4, 1),
(17, 'okay', '2023-10-08 00:52:03', 3, 3, 1),
(12, 'hello', '2023-10-09 00:24:21', 4, 1, 0),
(12, 'randome', '2023-10-09 00:24:40', 5, 3, 0),
(18, 'Testing', '2023-10-10 23:38:29', 6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_category_description` text NOT NULL,
  `sub_category_name` text DEFAULT NULL,
  `created_at` text NOT NULL,
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_category_description`, `sub_category_name`, `created_at`, `id`, `category_id`) VALUES
(' cats', 'Cats', '2023-09-05 11:18:10', 1, 1),
('Cars', 'car', '2023-09-05 11:18:10', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `created_at` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_location` text NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_type` text NOT NULL,
  `user_number` text NOT NULL,
  `user_city` text NOT NULL,
  `user_state` text NOT NULL,
  `user_post_code` text NOT NULL,
  `user_country` text NOT NULL,
  `active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`created_at`, `id`, `profile_picture`, `user_email`, `user_location`, `user_name`, `user_password`, `user_type`, `user_number`, `user_city`, `user_state`, `user_post_code`, `user_country`, `active`) VALUES
('2023-09-19 06:37:21', 1, '', 'khanzaidan786@gmail.com', 'A-39, Amrit puri, Ghat gate, Jaipur', 'Zaidan Khan', '$2y$10$leNdWomYDRlcQNvlvzvczeKpH16BPCWF2t5fdM6My7PuUIH4vWkPu', 'admin', '07727084375', 'Jaipur', 'Rajasthan', '302002', 'India', 'active'),
('2023-09-05 11:14:41', 2, './data/PIy2QUwMYm/download.jpg', 'ghufranarshad700@gmail.com', 'A-39, Amrit puri, Ghat gate, Jaipur', 'Ghufran Arshad', '$2y$10$7fhQ/jUyG5pQxwfJyh5TjObHBvbB39Xduoixs4rGuoe3Ku0/JEUOC', 'user', '07727084375', 'Jaipur', 'Rajasthan', '302002', 'Rajasthan', ''),
('2023-09-16 18:22:30', 6, '', 'almaskhan3010@gmail.com', 'Jaipur, Rajasthan, India', 'Almas khan', '$2y$10$Nvy17nsMYzgSAlHL/0n9GeHxiZNhmT8202If46gzHGQ2ZN9//47xC', 'user', '', '', '', '', '302004', ''),
('2023-09-20 10:43:44', 17, '', 'aarush@gmail.com', 'Jaipur, Rajasthan, India', 'Aarush', '$2y$10$k5I1C57j4zZQdl9kzG1xrely9lqzlrPWzzYEHyftwXVIbJrA8p3BG', 'user', '', '', '', '', '', ''),
('2023-10-08 20:07:03', 18, '', 'test1234@gmail.com', 'Jaipur, Rajasthan, India', 'test', '$2y$10$Ex7CSnxPEkuO7FJI.FZwZu8G2QHcRg.zgVAZLxVF5omZglCo3qVYK', 'user', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_link`
--
ALTER TABLE `chat_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat_link`
--
ALTER TABLE `chat_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
