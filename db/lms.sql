-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 03:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_name` varchar(70) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(50) DEFAULT NULL,
  `book_publication_name` varchar(50) DEFAULT NULL,
  `book_purchase_date` varchar(50) DEFAULT NULL,
  `book_price` varchar(10) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `librarin_username` varchar(50) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarin_username`, `datetime`) VALUES
(37, 4, 'ভুতুরে কাহিনী', '26566.jpg', 'ওমর ফারুক', 'রিমা পাবলিকেশন', '2020-08-24', '200', 10, 1, 'librarin_username', '2020-08-11 18:48:03'),
(44, 3, 'The Name of the Star', '54857.jpg', 'Maureen Johnson', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '150', 10, 1, NULL, '2020-08-23 06:50:52'),
(45, 3, 'Professional PHP', '41767.png', 'Patrick Louys', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '200', 10, 1, NULL, '2020-08-23 10:01:54'),
(46, 3, 'Beginning PHP and MySQL 5', '54796.jpg', 'W. Jason Gilmore', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '150', 10, 3, NULL, '2020-08-23 10:03:33'),
(47, 3, 'Learning PHP, MySQL & JavaScript', '64860.jpg', ' Robin Nixon ', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '250', 15, 9, NULL, '2020-08-23 10:06:31'),
(49, 3, 'The C++ Programming Language', '55141.jpg', ' Bjarne Stroustrup ', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '200', 10, 4, NULL, '2020-08-23 10:10:59'),
(50, 3, 'C Programming Language', '55755.jpg', 'Gerardo Mota Ebratt', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '300', 15, 7, NULL, '2020-08-23 10:12:49'),
(51, 3, 'Python Machine Learning', '30993.jpg', 'Santosh Kumar', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '350', 20, 3, NULL, '2020-08-23 10:15:53'),
(52, 3, 'Mikrotik RouterOS', '96851.png', 'Stephen R.W. Discher', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '150', 10, 10, NULL, '2020-08-23 10:21:31'),
(53, 2, 'Mathematics-I', '24958.jpg', 'Bikas Chandra Bhui', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '350', 12, 3, NULL, '2020-08-23 10:24:55'),
(54, 0, 'আমার-বাংলা-বই', '22950.jpg', 'মোঃ ওমর ফারুক', 'আধুনিক বই পাবলিকেশন', '2020-08-23', '200', 15, 1, NULL, '2020-08-23 10:26:04'),
(57, 1, 'Land Law of Bangladesh', '94417.jpg', 'Dr. L kabir', 'Ain Prokashon', '2020-09-03', '100', 5, 5, NULL, '2020-09-03 11:36:50'),
(58, 1, 'Fun. of Comapny law', '85431.jpg', 'A I Khan', 'University Publication', '2020-09-03', '100', 5, 5, NULL, '2020-09-03 11:38:02'),
(59, 1, 'The Avidence Act', '24012.jpg', 'Pro. A K M Monirujjaman', 'Estern Law Publication', '2020-09-03', '100', 5, 5, NULL, '2020-09-03 11:39:25'),
(60, 2, 'কোট ফি আইন', '52517.jpg', 'মোঃ মোসলে উদ্দিন', 'শরিফ উদ্দিন ল পাব্লিকেশন', '2020-09-03', '120', 2, 2, NULL, '2020-09-03 11:43:58'),
(61, 2, 'Bangladesh Income Tax', '41311.jpg', 'Omar faruk', 'Tisha Publication', '2020-09-03', '150', 3, 3, NULL, '2020-09-03 11:45:38'),
(62, 2, 'Direct Tax', '99265.jpg', 'Omar faruk', 'Tisha Publication', '2020-09-03', '150', 3, 3, NULL, '2020-09-03 11:46:52'),
(63, 1, 'Hindu Law in Bangladesh', '57016.jpg', 'Md. Azizul Hoque', 'University Publication', '2020-09-03', '140', 4, 4, NULL, '2020-09-03 11:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `create_at`) VALUES
(1, 'আইন', '2020-09-03 10:13:52'),
(2, 'কর', '2020-09-03 10:13:52'),
(3, 'গবেষণা মুলক', '2020-09-03 10:14:50'),
(4, 'গল্প ও উপন্যাস ', '2020-09-03 10:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(11) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(10) NOT NULL,
  `book_return_date` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 5, 37, '15-08-2020', '', '2020-08-15 04:34:33'),
(2, 5, 37, '15-08-2020', '', '2020-08-15 13:55:22'),
(3, 8, 38, '15-08-2020', '', '2020-08-15 13:55:32'),
(4, 5, 37, '16-08-2020', '', '2020-08-16 07:16:35'),
(5, 5, 39, '16-08-2020', '', '2020-08-16 07:18:09'),
(6, 5, 39, '16-08-2020', '', '2020-08-16 07:34:36'),
(7, 8, 37, '16-08-2020', '', '2020-08-16 08:53:41'),
(8, 8, 40, '16-08-2020', '', '2020-08-16 11:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `librarin`
--

CREATE TABLE `librarin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarin`
--

INSERT INTO `librarin` (`id`, `fname`, `lname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'md omar', 'faruk', 'fciomar1@gmail.com', 'fciomar', '1234567', '2020-08-02 06:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_book`
--

CREATE TABLE `order_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `delivery_type` tinyint(1) NOT NULL COMMENT '1=self_delivery, 2=shop_delivery',
  `is_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = pendding, 1 = confrim',
  `user_addres` varchar(100) DEFAULT NULL,
  `genarate_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_book`
--

INSERT INTO `order_book` (`id`, `user_id`, `book_id`, `delivery_type`, `is_status`, `user_addres`, `genarate_date`, `delete_at`) VALUES
(1, 8, 53, 1, 0, '', '2020-09-02 12:23:28', NULL),
(2, 8, 53, 2, 0, 'Parshuram, Feni', '2020-09-02 12:24:00', NULL),
(3, 8, 37, 1, 0, '', '2020-09-02 12:29:30', NULL),
(4, 8, 49, 2, 0, 'parshuram feni', '2020-09-02 12:30:06', NULL),
(5, 8, 53, 1, 0, '', '2020-09-02 12:32:20', NULL),
(6, 10, 37, 1, 0, '', '2020-09-02 12:56:32', NULL),
(7, 10, 45, 2, 0, 'ss', '2020-09-02 12:57:40', NULL),
(8, 8, 50, 1, 0, '', '2020-09-03 04:57:59', NULL),
(9, 8, 51, 2, 0, 'hgfhgg', '2020-09-03 05:09:19', NULL),
(10, 8, 58, 2, 0, 'cumilla', '2020-09-03 12:56:54', NULL),
(11, 8, 57, 2, 0, 'cumilla', '2020-09-03 12:58:37', NULL),
(12, 8, 57, 1, 0, '', '2020-09-03 13:03:26', '0000-00-00 00:00:00'),
(13, 8, 59, 1, 1, '', '2020-09-03 13:03:22', NULL),
(14, 8, 46, 2, 1, 'cumilla', '2020-09-03 13:03:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(5, 'Md Omar', 'Faruk', 151668, 171153, 'akomarfci@gmail.com', 'admin', '$2y$10$wyhQjkV4c/o4OV747.Cn5eE0XqtACMquQlsaadReoQKXV9wCAFoqC', '01878469345', '', 1, '2020-07-26 16:24:26'),
(6, 'Omar', 'Faruk', 399258, 171153, 'cablefaruk@gmail.com', 'phpmyadmin', '$2y$10$ioOhXFxaH3kH4lKIUIZAbuDLCGkLEuFFpAbqIrvbbRM.04nYBJUJ6', '01878469345', '', 1, '2020-07-26 16:25:39'),
(7, 'Md Omar', 'Faruk', 1, 444, 'fcifaruk2@gmail.com', 'faruk', '$2y$10$eXiCn4OCLmqO6YOyvFsmjeWluYsB0ktib9DgzTD/gi4y5SxMCe89O', '01878469345', '', 1, '2020-08-01 06:08:48'),
(8, 'Ariyan', 'Limon', 1, 2, 'limon@gmail.com', 'limon', '$2y$10$DhVlYiPHNJG48TH8Arg3KedA5wAgZgD9G4FsVEwpqkKyTtQa5JFZ6', '01786138312', '', 1, '2020-08-01 06:24:21'),
(9, 'nasir', 'uddin', 2, 109097, 'nasir@gmail.com', 'nasir', '$2y$10$E2Lu6hJLOynxBv9RFb9AuuLe4d8dUwz8qTGHJTDCKGfs0CC95RT/u', '01786138312', '', 1, '2020-08-02 16:40:53'),
(10, 'Bejoy', 'das', 11, 123, 'bejoyfeni@gmail.com', 'bejoy', '$2y$10$DkjY/YlOUXheRF2Arze7dubZcHBRs/PfEMyjvc/uRWaVQggNwa62m', '01918396750', '', 1, '2020-09-02 12:53:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarin`
--
ALTER TABLE `librarin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `order_book`
--
ALTER TABLE `order_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `librarin`
--
ALTER TABLE `librarin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_book`
--
ALTER TABLE `order_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
