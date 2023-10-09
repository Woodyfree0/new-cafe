-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 09, 2023 at 12:08 AM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `Menu_items`
--

CREATE TABLE `Menu_items` (
  `item_id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Desc` text NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Menu_items`
--

INSERT INTO `Menu_items` (`item_id`, `Name`, `Desc`, `Price`) VALUES
(1, 'Classic Burger', 'Juicy beef patty with lettuce, tomato, and special sauce.', 10),
(2, 'Margherita Pizza', 'Fresh mozzarella, tomato sauce, and basil on thin crust.', 12),
(3, 'Caesar Salad', 'Crisp romaine lettuce with parmesan cheese and Caesar dressing.', 8),
(4, 'Spaghetti Carbonara', 'Pasta with creamy egg-based sauce, pancetta, and parmesan.', 12),
(5, 'Mushroom Risotto', 'Creamy risotto with a variety of sautéed mushrooms.', 11),
(6, 'Grilled Salmon', 'Freshly grilled salmon fillet served with steamed vegetables.', 15),
(7, 'Veggie Wrap', 'Grilled vegetables and hummus wrapped in a whole wheat tortilla.', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Menu_items`
--
ALTER TABLE `Menu_items`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Menu_items`
--
ALTER TABLE `Menu_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
