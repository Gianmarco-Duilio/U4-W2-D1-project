-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 11:34 AM
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
-- Database: `gestione_libreria`
--

-- --------------------------------------------------------

--
-- Table structure for table `libri`
--

CREATE TABLE `libri` (
  `id` int(10) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `autore` varchar(100) NOT NULL,
  `anno_pubblicazione` int(4) NOT NULL,
  `genere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libri`
--

INSERT INTO `libri` (`id`, `titolo`, `autore`, `anno_pubblicazione`, `genere`) VALUES
(1, '1984', 'George Orwell', 1949, 'Romanzo distopico'),
(2, 'Il Signore degli Anelli', 'J.R.R. Tolkien', 1954, 'Fantasy epico'),
(3, 'Orgoglio e Pregiudizio', 'Jane Austen', 1813, 'Romanzo romantico'),
(8, 'Guerra e Pace', 'Lev Tolstoj', 1869, 'Romanzo storico'),
(9, 'Il nome della rosa', 'Umberto Eco', 1980, 'Romanzo storico-giallo'),
(10, 'Le Cronache del ghiaccio e del fuoco', 'George R.R. Martin', 1996, 'Fantasy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
