-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 08:30 AM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone_number`, `address`, `date_of_birth`, `password`, `created_at`) VALUES
(1, 'aviman ', 'avibikram777@gmail.com', '9848654512', 'Bhaktkekopul', '2004-02-02', 'avi123', '2024-04-02 13:42:05'),
(2, 'aviman ', 'avibikram777@gmail.com', '9848654512', 'Bhaktkekopul', '2004-02-02', 'avi123', '2024-04-02 13:45:07'),
(3, 'aviman ', 'avibikram777@gmail.com', '9848654512', 'Bhaktkekopul', '2004-02-02', 'avi123', '2024-04-02 13:46:44'),
(4, '', '', '', '', '0000-00-00', '', '2024-04-02 13:47:35'),
(5, '', '', '', '', '0000-00-00', '', '2024-04-02 13:49:43'),
(6, '', '', '', '', '0000-00-00', '', '2024-04-02 13:53:47'),
(7, 'aviman ', 'avibikram777@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '4202-02-01', 'avi123###', '2024-04-02 13:55:44'),
(8, 'aviman ', 'avibikram777@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2004-02-02', 'avi123###', '2024-04-02 14:30:07'),
(9, 'aviman ', 'avibikram777@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2004-02-02', 'avi123###', '2024-04-02 14:32:42'),
(10, 'Pukar', 'pukar123@gmail.com', '9848654512', 'Lalitpur', '2001-02-02', 'pukar123###', '2024-04-02 15:44:08'),
(11, 'Sabin', 'sabin123@gmail.com', '9848652312', 'Khoka', '2001-02-02', 'sabin123###', '2024-04-03 02:18:24'),
(12, 'Angel ', 'angel@gmail.com', '9848651245', 'Kathmandu', '2004-02-02', 'angel123###', '2024-04-03 04:15:57'),
(13, 'Tenzin', 'tenzin@gmail.com', '9848651232', 'Kathmandu', '2004-02-02', 'tenzin123###', '2024-04-03 04:23:13'),
(14, 'One', 'one@gmail.com', '984865213454', 'Ktm', '2006-02-02', 'one123###', '2024-04-06 03:39:57'),
(15, 'aviman ', 'avibikram777@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2005-02-02', 'avi123###', '2024-04-06 04:52:18'),
(16, 'aviman ', 'pukar123@gmail.com', '9848654512', 'Bhaktkekopul, chabel', '2202-02-02', 'avi123###', '2024-04-06 04:53:09'),
(17, 'Sabin', 'sabin123@gmail.com', '9845561245', 'chabel', '2002-02-02', 'chabel123###', '2024-04-06 04:54:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
