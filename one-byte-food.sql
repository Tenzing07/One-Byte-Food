-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 08:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one-byte-food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'Ram', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Ram lal', 'ram123@gmail.com', 'About the worker', 'worker are hard working ', '2024-04-18 19:12:59'),
(5, 'Samir', 'samir123@gmail.com', 'I am disapointed', 'to your service i am disapointed and unsatisfied', '2024-04-24 04:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `guests` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `table_id`, `guests`, `name`, `email`, `phone`, `booking_date`, `booking_time`, `created_at`) VALUES
(7, 2, 5, 'aviman ', 'pukar123@gmail.com', '9849354082', '2025-02-02', '23:30:00', '2024-05-05 16:44:08'),
(9, 2, 3, 'aviman ', 'pukar123@gmail.com', '9849354082', '2024-02-02', '00:28:00', '2024-05-05 18:43:44'),
(10, 2, 4, 'aviman ', 'pukar123@gmail.com', '9849354082', '2004-02-02', '01:21:00', '2024-05-05 19:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `max_guests` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_name`, `max_guests`) VALUES
(2, 'Table1', 5),
(14, 'Table2', 10),
(17, 'Table3', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verification_code` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone_number`, `address`, `date_of_birth`, `password`, `created_at`, `verification_code`, `verified`) VALUES
(69, 'Aviman ', 'avibikram@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2001-02-02', 'avi123', '2024-04-10 14:07:45', NULL, 0),
(70, 'Aviman', 'agamming03@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2004-02-02', 'avi12@@', '2024-04-12 03:09:10', '735348', 1),
(72, 'Ram Shahi', 'ram123@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2004-02-02', 'ram12##', '2024-04-14 15:25:55', NULL, 1),
(73, 'Sabin', 'sabin123@gmail.com', '9845651245', 'Thoka', '2000-02-03', 'sabin123###', '2024-04-15 18:39:11', '770469', 1),
(74, 'Aviman', 'agamming03@gmail.com', '9845651232', 'Bhaktkekopul, chabel', '2004-02-02', 'aviman123###', '2024-04-17 06:06:50', '769639', 1),
(75, 'Bibek', 'bibektimalsina89@gmail.com', '9848651245', 'ashdas', '2004-02-02', 'bibek12##', '2024-04-23 06:19:36', '898380', 0),
(76, 'Aviman', 'agamming03@gmail.com', '9848651245', 'ashdas', '2004-02-02', 'aviman12##', '2024-04-23 06:20:49', '758059', 0),
(77, 'Bibek', 'bibektimalsina89@gmail.com', '9845654512', 'ababa', '2011-12-02', 'bibek12##', '2024-04-23 06:21:57', '299820', 0),
(78, 'Bibek', 'bibektimalsina89@gmail.com', '9845654512', 'ababa', '2011-12-02', 'bibek12##', '2024-04-23 06:22:45', '157679', 0),
(79, 'Bibek', 'bibektimalsina89@gmail.com', '9845654512', 'ababa', '2011-12-02', 'bibek12##', '2024-04-23 06:27:36', '640493', 0),
(80, 'Bibek', 'bibektimalsina89@gmail.com', '9845654512', 'ababa', '2011-12-02', 'bibek12##', '2024-04-23 06:28:44', '623454', 0),
(81, 'Bibek', 'bibektimalsina89@gmail.com', '9845654512', 'ababa', '2011-12-02', 'bibek12##', '2024-04-23 06:31:23', '260759', 0),
(82, 'Aviman', 'agamming03@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2001-02-02', 'avi123###', '2024-04-23 09:53:57', '967132', 0),
(83, 'Aviman', 'agamming03@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2001-02-02', 'avi123###', '2024-04-23 09:57:54', '700497', 0),
(84, 'Aviman', 'agamming03@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2001-02-02', 'avi123###', '2024-04-23 10:02:45', '749157', 0),
(85, 'Bibek', 'bibektimalsina89@gmail.com', '9848654512', 'babar mahall', '2001-02-02', 'bibek12##', '2024-04-24 04:18:38', '982194', 1),
(86, 'Riwaj', 'shahiriwaj66@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2005-02-02', 'riwaj123###', '2024-05-02 07:38:20', '671717', 1),
(87, 'Aviman', 'pukar123@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2001-02-02', 'avi123###', '2024-05-04 14:22:38', '874868', 0),
(88, 'Aviman', 'pukar123@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2001-02-02', 'avi123###', '2024-05-04 14:23:01', '844439', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_table_id` (`table_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_table_id` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
