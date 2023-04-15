-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 12:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_market_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `status`) VALUES
(4, 'Diary products', 'milk,butter,ghee', 'Active'),
(6, 'Ice Creams', 'good for healths', 'Active'),
(8, 'Nutrient', 'good for health', 'Active'),
(9, 'Protiens', 'good for healths', 'Active'),
(10, 'Rice', 'good for health', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `address`, `number`, `status`) VALUES
(14, 'kathiravan', 'villupuram', 6374923354, 'Active'),
(15, 'Chandru', 'villupuram', 8756128945, 'Active'),
(16, 'keerthana', 'chennai', 8978457845, 'Active'),
(17, 'Klopp', 'Liverpool', 101010101, 'Active'),
(18, 'Cristano Ronaldo', 'Portugal', 9898451244, 'Active'),
(19, 'paneer', 'palani', 9009090090, 'Active'),
(22, 'Parakash', 'Chennai', 9001010100, 'Active'),
(23, 'Palani', 'chennai', 7777722222, 'Active'),
(24, 'Paranav', 'chennai', 9994488855, 'Active'),
(25, 'Prama', 'Chennai', 9998877744, 'Active'),
(26, 'Omar', 'chennai', 7878787878, 'Active'),
(27, 'Puli', 'chennai', 2299229922, 'Active'),
(28, 'Karim Benzema', 'chennai', 9333355222, 'Active'),
(29, 'Karim Benzema', 'chennai', 9333355228, 'Active'),
(30, 'Zidane', 'Chennai', 5656565656, 'Active'),
(31, 'Kaka', 'Chennai', 8887788877, 'Active'),
(32, 'Latifah Robinson', 'Chennai', 5454545454, 'Active'),
(33, 'Morgan Larson', 'Et Nam magnam neque ', 6851212312, 'Active'),
(34, 'Quon Bernard', 'Labore quis nulla la', 8651245712, 'Active'),
(35, 'Curran Saunders', 'Occaecat dolor labor', 7411545112, 'Active'),
(36, 'Patrick Wagner', 'Consequatur veritat', 6539945441, 'Active'),
(37, 'Karen Campbell', 'Aut qui consequatur', 3811212545, 'Active'),
(38, 'LPG', 'chennai', 9800012000, 'Active'),
(39, 'Jana Thornton', 'Enim odit Nam ea ear', 8131212412, 'Active'),
(40, 'Rina Finch', 'Autem sunt ipsam ve', 4000010000, 'Active'),
(41, 'Haaland', 'Manchester', 9874561230, 'Active'),
(42, 'Kathar', 'Chennai', 6661244451, 'Active'),
(43, 'Perry Conway', 'Chennai', 8745124578, 'Active'),
(44, 'Poondi', 'Chennai', 9896374185, 'Active'),
(45, 'Ujas', 'Chennai', 7845128945, 'Active'),
(46, 'Plani', 'Chennai', 7878784512, 'Active'),
(47, 'lalith', 'Chennai', 6006060060, 'Active'),
(48, 'Ponnarasu', 'Chennai', 3003030030, 'Active'),
(49, 'Parcel', 'Chennai', 5554545145, 'Active'),
(50, 'Thiru', 'chennai', 9811122333, 'Active'),
(51, 'Lev Downs', 'Molestiae est volup', 1080110010, 'Active'),
(52, 'Karan', 'Chennai', 7898789878, 'Active'),
(53, 'Thilagar', 'Chennai', 5454654545, 'Active'),
(54, 'palw', 'Chennai', 1010201020, 'Active'),
(55, 'Gplo', 'chennai', 2020202020, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `id` int(20) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `number` bigint(20) NOT NULL,
  `join_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `aadhar_number` bigint(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `emp_name`, `address`, `number`, `join_date`, `email`, `aadhar_number`, `password`, `status`) VALUES
(19, 'Lokesh', 'chennai', 9845234646, '2023-04-11', 'ipl@gmail.com', 123132312333, '', 'Active'),
(20, 'Gopi', 'chennai', 6374923354, '2023-04-12', 'tamizhgopi696@gmail.com', 789845124512, '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `total_price` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `employee_id`, `customer_id`, `date`, `total_price`) VALUES
(52, 19, 14, '2023-04-11', 1208),
(53, 19, 15, '2023-04-11', 116),
(54, 19, 15, '2023-04-11', 590),
(55, 20, 14, '2023-04-11', 232),
(56, 20, 14, '2023-04-11', 956),
(57, 20, 15, '2023-04-11', 308),
(58, 20, 14, '2023-04-11', 116),
(62, 20, 14, '2023-04-11', 425),
(63, 20, 14, '2023-04-11', 2220),
(64, 20, 14, '2023-04-11', 444),
(65, 20, 14, '2023-04-11', 444),
(66, 20, 14, '2023-04-11', 74),
(67, 20, 14, '2023-04-11', 74),
(68, 20, 14, '2023-04-11', 74),
(69, 20, 14, '2023-04-11', 70),
(70, 20, 14, '2023-04-11', 70),
(71, 20, 14, '2023-04-11', 740),
(72, 20, 14, '2023-04-11', 74),
(73, 20, 14, '2023-04-11', 7030),
(74, 20, 14, '2023-04-11', 700),
(76, 20, 14, '2023-04-11', 171),
(77, 20, 14, '2023-04-11', 236),
(78, 20, 14, '2023-04-11', 314),
(80, 20, 14, '2023-04-11', 240),
(82, 20, 14, '2023-04-12', 120),
(84, 20, 14, '2023-04-12', 74),
(96, 20, 38, '2023-04-12', 74),
(97, 20, 41, '2023-04-12', 425),
(100, 20, 14, '2023-04-12', 120),
(101, 20, 54, '2023-04-12', 70),
(103, 20, 14, '2023-04-13', 70),
(104, 20, 14, '2023-04-13', 74),
(105, 20, 14, '2023-04-13', 73),
(106, 20, 14, '2023-04-13', 116),
(107, 20, 14, '2023-04-13', 351),
(108, 19, 14, '2023-04-13', 120),
(109, 20, 14, '2023-04-13', 69),
(110, 20, 14, '2023-04-13', 116),
(111, 20, 15, '2023-04-13', 70);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` bigint(30) NOT NULL,
  `tot_price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `discount_type`, `discount`, `quantity`, `price`, `tot_price`) VALUES
(1, 52, 5, 'None', '0', 2, 120, 1208),
(2, 52, 7, 'Percent', '2', 20, 490, 1208),
(3, 52, 9, 'Percent', '1', 2, 235, 1208),
(4, 52, 2, 'Percent', '1', 10, 363, 1208),
(5, 53, 5, 'Flat', '2', 2, 116, 116),
(6, 54, 5, 'Flat', '1', 10, 590, 590),
(7, 55, 5, 'Flat', '2', 2, 116, 232),
(8, 55, 5, 'Flat', '1', 2, 116, 232),
(9, 56, 7, 'None', '0', 12, 300, 956),
(10, 56, 9, 'Flat', '2', 2, 236, 956),
(11, 56, 2, 'Flat', '1', 12, 420, 956),
(12, 57, 9, 'Percent', '1', 2, 238, 308),
(13, 58, 5, 'Flat', '2', 2, 116, 116),
(19, 62, 2, 'Flat', '2', 2, 70, 425),
(20, 62, 7, 'Flat', '1', 5, 115, 425),
(21, 62, 9, 'None', '0', 2, 240, 425),
(22, 63, 2, 'None', '0', 60, 2220, 2220),
(23, 64, 2, 'None', '0', 12, 444, 444),
(24, 65, 2, 'None', '0', 12, 444, 444),
(25, 66, 2, 'None', '0', 2, 74, 74),
(26, 67, 2, 'None', '0', 2, 74, 74),
(27, 68, 2, 'None', '0', 2, 74, 74),
(28, 69, 2, 'Flat', '2', 2, 70, 70),
(29, 72, 2, 'None', '0', 2, 74, 74),
(30, 73, 2, 'None', '0', 190, 7030, 7030),
(31, 76, 7, 'None', '0', 5, 125, 171),
(32, 76, 7, 'Flat', '2', 2, 46, 171),
(33, 76, 7, 'None', '0', 5, 125, 171),
(34, 76, 7, 'Flat', '2', 2, 46, 171),
(35, 77, 5, 'None', '0', 2, 120, 236),
(36, 77, 5, 'Flat', '2', 2, 116, 236),
(37, 78, 2, 'None', '0', 2, 74, 314),
(38, 78, 9, 'None', '0', 2, 240, 314),
(40, 80, 5, 'None', '0', 2, 120, 240),
(41, 80, 5, 'None', '0', 2, 120, 240),
(43, 82, 5, 'None', '0', 2, 120, 120),
(45, 84, 2, 'None', '0', 2, 74, 74),
(57, 96, 2, 'None', '0', 2, 74, 74),
(58, 97, 5, 'Flat', '2', 2, 116, 425),
(59, 97, 2, 'Percent', '2', 2, 73, 425),
(60, 97, 9, 'Flat', '2', 2, 236, 425),
(63, 100, 5, 'None', '0', 2, 120, 120),
(64, 101, 2, 'Flat', '2', 2, 70, 70),
(66, 103, 2, 'Flat', '2', 2, 70, 70),
(67, 104, 2, 'None', '0', 2, 74, 74),
(68, 105, 2, 'Percent', '2', 2, 73, 73),
(69, 106, 5, 'Flat', '2', 2, 116, 116),
(70, 107, 2, 'Flat', '2', 2, 70, 351),
(71, 107, 7, 'Flat', '2', 2, 46, 351),
(72, 107, 9, 'Percent', '2', 2, 235, 351),
(73, 108, 5, 'None', '0', 2, 120, 120),
(74, 109, 7, 'Flat', '2', 3, 69, 69),
(75, 110, 5, 'Flat', '2', 2, 116, 116),
(76, 111, 2, 'Flat', '2', 2, 70, 70);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sub_category_id`, `product_name`, `price`, `stock`, `min_stock`, `status`) VALUES
(2, 12, 'Arokhya milk', 37, 10, 20, 'Active'),
(5, 7, 'Arun ice cream ', 60, 37, 20, 'Active'),
(7, 7, 'Aavin ', 25, 37, 20, 'Active'),
(9, 19, 'India Gate', 120, 52, 10, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(20) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `description`) VALUES
(1, 'admin', 'admistration department'),
(2, 'employee', 'employee_department'),
(5, 'owner', 'ownership department');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `sub_category_name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category_name`, `description`, `status`) VALUES
(7, 4, 'Milk', 'good for healths', 'Active'),
(10, 6, 'Vanilla', 'good for health', 'Active'),
(12, 4, 'Butter', 'good for health', 'Active'),
(17, 10, 'Ponni', 'good for healths', 'Active'),
(18, 10, 'Seeraga Samba', 'good for health', 'Active'),
(19, 10, 'Unit Rice', 'good for health', 'Active'),
(20, 10, 'India Gate th', 'good for health', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `role_id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `role_id`, `email`, `address`, `password`, `status`) VALUES
(9, 'vijayan', 5, 'vijayan@gmail.com', 'villupuram', 'Gopisandy', 'Active'),
(10, 'Uma', 5, 'uma@gmail.com', 'villupuram', 'Gopisandy', 'Active'),
(18, 'Gopi', 1, 'tamizhgopi696@gmail.com', 'villupuram', '$2y$10$a.YYsBp8hykWhxAb6WC67ejJRwJxOF1JkPhiCksw2iQ1MQZQvuYC6', 'Active'),
(21, 'Sandhiya', 1, 'gosandy@gmail.com', 'villupuram', '$2y$10$FMiCvbvqsS5eVQAToDLMA.92SSPEA2AnqxA3aZhgPFK74EgDbCkIG', 'Inactive'),
(22, 'Lokesh', 1, 'pl@gmail.com', 'chennai', '$2y$10$QDj0.RZ2VrHPAnDoy5hIQOjeiWP5UZzlVKG2RYw/bw6CllNlg70jK', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `FK_PersonOrder` (`employee_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`employee_id`) REFERENCES `emp_details` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
