-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 10:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midterms_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `dateofbirth`, `specialization`, `date_added`) VALUES
(1, 'morthread', '0308c46ae517fd72cd1e53002dcff557bff3b3cf', 'Kurt Kenji', 'Gonzales', '2001-09-19', 'Web Development', '2024-10-31 07:12:32'),
(2, 'ris', 'a4a7006b450b5602d6bb120c08c26d197385f683', 'Gabriel', 'Arcega', '2001-12-13', 'Back End Developer', '2024-10-31 07:15:41'),
(3, 'maestro', 'fa7fd83623ebaec44c47c84f79005aa2b37c45ba', 'Aeron', 'Dualan', '2002-07-09', 'Back End Developer', '2024-10-31 07:16:26'),
(4, 'stnlysaurus', 'af0b3024125153f33ab383c081e500ec0672d6cc', 'Stanley', 'Panag', '2001-12-18', 'Front End Developer', '2024-10-31 07:17:36'),
(5, 'brnl_dylan', '0d7b418527f7a0a170cab932ae02a1aff86afb39', 'Dylan', 'Bernal', '2001-12-01', 'Front End Developer', '2024-10-31 07:19:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;