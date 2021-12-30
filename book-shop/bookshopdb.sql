-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 06:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@bookshop.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bookreview`
--

CREATE TABLE `bookreview` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookreview`
--

INSERT INTO `bookreview` (`id`, `book_id`, `comment`, `date`, `user_name`) VALUES
(1, 1, 'Nice book', '2021-10-09', 'Ram'),
(2, 5, 'nice book!!', '2021-10-10', 'shruti Mane'),
(3, 2, 'good book', '2021-10-29', 'akshay jadhav'),
(4, 6, 'good ', '2021-12-15', 'Shraddha Mane');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `pages` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `recommended` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `rating`, `author`, `lang`, `publisher`, `isbn`, `pages`, `category_id`, `category_name`, `image`, `price`, `recommended`) VALUES
(1, 'Java', 5, 'Balguruswamy', 'English', 'N Publisher', '5641568485', 599, 1, 'Programming', '41gr3r3FSWL.jpg', 299, 1),
(2, 'let Us C', 5, 'Dennis Ritchie', 'English', 'hackr publisher', '4567895612', 400, 1, 'Programming', 'c.jfif', 399, 8),
(3, 'My SQL', 4, 'Paul DuBois.', 'English', 'ABC PUblisher', '90876467589', 566, 1, 'Programming', 'mysql.jpg', 455, 10),
(4, 'PHP', 7, 'Lynn Beighley &amp; Michael Morrison.', 'English', 'ABC PUblisher', '9035474938', 366, 1, 'Programming', 'sample-book.jpg', 300, 10),
(5, 'Information Technology', 5, 'Stephen King', 'English', 'hackr publisher', '7840936485', 569, 1, 'Programming', 'images.jfif', 356, 10),
(6, 'Objective Agriculture', 5, 'S.R.Knwta', 'English', 'XYZ', '5673909874', 455, 2, 'Agriculture', 'obj Agri.jfif', 255, 11),
(7, 'A Complete Book of Agriculture', 5, 'Henry Stephens FRSE', 'English', 'PHI Learning Pvt. Ltd. Delhi, India.', '7809451234', 578, 2, 'Agriculture', 'complete book of agri.jfif', 375, 12),
(8, 'the End of Animal Farming', 4, 'Jacy Reese Anthis', 'English', 'Edupedia Publications Pvt Ltd. New Delhi, India', '4567890123', 300, 2, 'Agriculture', 'animal farming.jpg', 355, 8),
(9, 'Farming While Black', 5, 'Orhan Pamuk', 'English', 'skyfox Publishing Group. Thanjavur, India. ...', '7890123456', 600, 2, 'Agriculture', 'farming black.jpg', 350, 7),
(10, 'Bibi’s Kitchen', 5, 'Julia Turshen', 'English', 'Prabhat Prakashan Private Limited', '8907654321', 233, 3, 'food', 'Babie  Kitchen.jpg', 260, 6),
(11, 'Flavor Equation', 5, 'Nik Sharma’s', 'English', 'GrowJust India', '9088563351', 200, 3, 'food', 'flavour.jpg', 245, 7),
(12, 'The Jordan Rules', 5, 'Jordan', 'English', 'Jordan', '8907654132', 400, 4, 'Sport', 'Sport 1.jpg', 375, 8),
(13, 'The Victory Machine', 5, 'Jordan', 'English', 'Jordan Rules.pvt.ltd', '5678901234', 345, 4, 'Sport', 'Sport 2.jpg', 345, 7),
(14, 'Cloud computing', 8, 'F Ramsome', 'English', 'Edupedia Publications Pvt Ltd. New Delhi, India', '4567895612', 345, 1, 'Programming', 'cloud-computing-29.jpg', 234, 9);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cart_id`, `book_id`) VALUES
(7, 3, 6),
(8, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `total_books` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `total_books`) VALUES
(1, 'Programming', 0),
(2, 'Agriculture', 0),
(3, 'food', 0),
(4, 'Sport', 0),
(5, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_amount`, `payment_status`) VALUES
(1, 1, 'ordered', '299', 'Successful'),
(2, 2, 'ordered', '356', 'Successful'),
(3, 3, 'ordered', '260', 'Successful'),
(4, 5, 'ordered', '375', 'Successful'),
(5, 6, 'ordered', '299', 'Successful'),
(6, 3, 'ordered', '345', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `book_id`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 3, 10),
(4, 5, 7),
(5, 6, 1),
(6, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `cart_id`, `address`, `status`) VALUES
(1, 'Ram', 'ram@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'At Post : Rahimatpur, Taluka : Koregaon, District :  Satara, Pincode : 415511', 'active'),
(2, 'shruti Mane', 'shruti@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'at post Kolhapur', 'active'),
(3, 'Shraddha Mane', 'shraddha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'At Post : Rahimatpur, Taluka : Koregaon, District :  Satara, Pincode : 415511', 'active'),
(5, 'Shreya Jadhav', 'shreya@gmail.com', '6531401f9a6807306651b87e44c05751', 5, 'Odisha', 'active'),
(6, 'akshay jadhav', 'akshayjadhav@gmail.com', '5c3a0d0c7daa30b5df3e567ba0943fdd', 6, 'satara', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookreview`
--
ALTER TABLE `bookreview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookreview`
--
ALTER TABLE `bookreview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
