-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2023 at 06:19 PM
-- Server version: 8.0.32
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `location_id` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int NOT NULL,
  `item` varchar(255) NOT NULL,
  `destination_type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `item`, `destination_type_id`) VALUES
(1, 'Note book', 2),
(2, 'Pen', 2),
(3, 'Camera', 2),
(4, 'Check opening days', 2),
(5, 'Walking shoes', 1),
(6, 'Cap', 1),
(7, 'Backpack', 1),
(8, 'Solar cream', 1),
(9, 'Sunglasses', 1),
(10, 'Flip Flop', 1),
(11, 'Swimsuit', 1),
(12, 'Being single', 3),
(13, 'No child', 3),
(14, 'Condoms', 3),
(15, 'Money money money\r\n', 3),
(16, 'Backpack', 4),
(17, 'Money money money', 4),
(18, 'Bottle of water', 4),
(19, 'Snacks', 4),
(20, 'id card', 3);

-- --------------------------------------------------------

--
-- Table structure for table `destination_type`
--

CREATE TABLE `destination_type` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `destination_type`
--

INSERT INTO `destination_type` (`id`, `name`, `value`) VALUES
(1, 'natural', 'natural'),
(2, 'cultural', 'cultural'),
(3, 'night owl', 'adult'),
(4, 'amusements', 'amusements');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `country`, `city`, `latitude`, `longitude`) VALUES
(1, 'United-Kingdom', 'Bridgwater', '51.127889', '-3.003632'),
(2, 'Brazil', 'Sao Polo', '19.432608', '-99.133209'),
(3, 'France', 'Orléans', '47.9167', '1.9'),
(4, 'Italy', 'Pozzuoli', '40.844444', '14.093333'),
(5, 'Puerto Rico', 'Ponce', '18.0110768', '-66.6140616'),
(6, 'Japan', 'Tokyo', '35.652832', '139.839478'),
(7, 'Japan', 'Nagoya', '35.18147', '136.90641'),
(8, 'Cuba', 'Havana', '23.113592', '-82.366592'),
(9, 'United States', 'Princeton', '40.343898', '-74.660049'),
(10, 'United-States', 'New-York', '40.730610', ' -73.935242'),
(11, 'Netherlands', 'Amsterdam', '52.377956', '4.897070'),
(12, 'Grece', 'Athens', '37.983917', '23.7293599');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk@checklist@destination_type` (`destination_type_id`);

--
-- Indexes for table `destination_type`
--
ALTER TABLE `destination_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `destination_type`
--
ALTER TABLE `destination_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checklist`
--
ALTER TABLE `checklist`
  ADD CONSTRAINT `fk@checklist@destination_type` FOREIGN KEY (`destination_type_id`) REFERENCES `destination_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
