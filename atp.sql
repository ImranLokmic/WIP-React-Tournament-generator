-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 03:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atp`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_week`
--

CREATE TABLE `current_week` (
  `id` int(11) NOT NULL,
  `current_week` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_week`
--

INSERT INTO `current_week` (`id`, `current_week`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(8) NOT NULL,
  `tournament_id` int(8) NOT NULL,
  `tournament_stage` varchar(255) NOT NULL,
  `player_1` varchar(255) NOT NULL,
  `player_2` varchar(255) NOT NULL,
  `player_1_result` int(8) NOT NULL,
  `player_2_result` int(8) NOT NULL,
  `is_set` int(8) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `old_matches`
--

CREATE TABLE `old_matches` (
  `match_id` int(8) NOT NULL,
  `tournament_id` int(8) NOT NULL,
  `tournament_stage` varchar(255) NOT NULL,
  `player_1` varchar(255) NOT NULL,
  `player_2` varchar(255) NOT NULL,
  `player_1_result` int(8) NOT NULL,
  `player_2_result` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(8) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `player_points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `player_points`) VALUES
(1, 'Coric', 45),
(2, 'Cilic', 0),
(3, 'Medvedev', 0),
(4, 'Djokovic', 0),
(5, 'Nadal', 0),
(6, 'Federer', 0),
(7, 'Zverev', 0),
(8, 'Tsitsipas', 0),
(9, 'Thiem', 0),
(10, 'Berrettini', 0),
(11, 'Alcaraz', 0),
(12, 'Ruud', 0),
(13, 'Auger-Aliassime', 0),
(14, 'Norrie', 0),
(15, 'Hurkacz', 0),
(16, 'Rublev', 0),
(17, 'Fritz', 0),
(18, 'Sinner', 0),
(19, 'Murray', 0),
(20, 'Wawrinka', 0),
(21, 'Kyrgios', 0),
(22, 'Carreno Busta', 0),
(23, 'Schwartzman', 0),
(24, 'Bautista Agut', 0),
(25, 'Dimitrov', 0),
(26, 'De Minaur', 0),
(27, 'Shapovalov', 0),
(28, 'Evans', 0),
(29, 'Monfils', 0),
(30, 'Tiafoe', 0),
(31, 'Opelka', 0),
(32, 'Musetti', 0),
(33, 'Khachanov', 0),
(34, 'Karatsev', 0),
(35, 'Brooksby', 0),
(36, 'Isner', 0),
(37, 'Korda', 0),
(38, 'Fognini', 0),
(39, 'Goffin', 0),
(40, 'Kokkinakis', 0),
(41, 'Garin', 0),
(42, 'Gasquet', 0),
(43, 'Verdasco', 0),
(44, 'Sock', 0),
(45, 'Paire', 0),
(46, 'Simon', 0),
(47, 'Nishikori', 0),
(48, 'Lopez', 0),
(49, 'Karlovic', 0),
(50, 'Edmund', 0),
(51, 'Raonic', 0),
(52, 'Del Potro', 0),
(53, 'Tsonga', 0),
(54, 'Rune', 0),
(55, 'Van Rijthoven', 0),
(56, 'Davidovich Fokina', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `tournament_id` int(8) NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `tournament_rating` varchar(255) NOT NULL,
  `tournament_week` varchar(255) NOT NULL,
  `tournament_surface` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`tournament_id`, `tournament_name`, `tournament_rating`, `tournament_week`, `tournament_surface`) VALUES
(5, 'Australian Open', '2000', '1', 'Outdoor Hard'),
(18, 'BNP Paribas Open', '1000', '2', 'Outdoor Hard'),
(19, 'Miami Open presented by Itau', '1000', '3', 'Outdoor Hard'),
(23, 'Rolex Monte-Carlo Masters', '1000', '4', 'Outdoor Clay'),
(27, 'Mutua Madrid Open', '1000', '5', 'Outdoor Clay'),
(28, 'Internazionali BNL d\'Italia', '1000', '6', 'Outdoor Clay'),
(31, 'Roland Garros', '2000', '7', 'Outdoor Clay'),
(38, 'Wimbledon', '2000', '8', 'Outdoor Grass'),
(48, 'National Bank Open Presented by Rogers', '1000', '9', 'Outdoor Hard'),
(49, 'Western & Southern Open', '1000', '10', 'Outdoor Hard'),
(51, 'US Open', '2000', '11', 'Outdoor Hard'),
(57, 'Rolex Shanghai Masters', '1000', '12', 'Outdoor Hard'),
(63, 'Rolex Paris Masters', '1000', '13', 'Indoor Hard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_week`
--
ALTER TABLE `current_week`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `old_matches`
--
ALTER TABLE `old_matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tournament_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_week`
--
ALTER TABLE `current_week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `old_matches`
--
ALTER TABLE `old_matches`
  MODIFY `match_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournament_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
