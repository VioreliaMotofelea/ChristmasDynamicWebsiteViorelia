-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 02, 2023 la 08:34 AM
-- Versiune server: 10.4.28-MariaDB
-- Versiune PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `atestat`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `poze`
--

CREATE TABLE `poze` (
  `cod` int(11) NOT NULL,
  `extensie` varchar(5) NOT NULL,
  `cod_utilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Eliminarea datelor din tabel `poze`
--

INSERT INTO `poze` (`cod`, `extensie`, `cod_utilizator`) VALUES
(1, 'jpeg', 4),
(2, 'jpg', 4),
(3, 'jpg', 4),
(4, 'jpg', 4),
(5, 'jpg', 4),
(6, 'jpg', 4),
(7, 'jpg', 4),
(8, 'jpg', 4),
(9, 'jpg', 4),
(10, 'jpg', 4),
(11, 'jpg', 4),
(12, 'jpg', 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `testimoniale`
--

CREATE TABLE `testimoniale` (
  `cod` int(11) NOT NULL,
  `continut` text NOT NULL,
  `aprobat` int(1) NOT NULL DEFAULT 0,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `cod_utilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Eliminarea datelor din tabel `testimoniale`
--

INSERT INTO `testimoniale` (`cod`, `continut`, `aprobat`, `data`, `cod_utilizator`) VALUES
(2, 'Test 2', 1, '2023-04-26 12:36:09', 3),
(3, 'Site frumos', 1, '2023-04-26 13:13:53', 4),
(4, 'Puteti adauga testimoniale', 1, '2023-04-26 13:18:18', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `cod` int(11) NOT NULL,
  `nume_prenume` varchar(100) NOT NULL,
  `utilizator` varchar(100) NOT NULL,
  `parola` varchar(40) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`cod`, `nume_prenume`, `utilizator`, `parola`, `admin`) VALUES
(1, 'Administrator', 'admin', 'fceeaa0bbe01f261f068909ab9318fc3ebf9266c', 1),
(3, 'Elev', 'elev', 'fceeaa0bbe01f261f068909ab9318fc3ebf9266c', 0),
(4, 'Ion Sadoveanu', 'ion.s', 'fceeaa0bbe01f261f068909ab9318fc3ebf9266c', 0);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `poze`
--
ALTER TABLE `poze`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `poze_FK_cod_utilizator` (`cod_utilizator`);

--
-- Indexuri pentru tabele `testimoniale`
--
ALTER TABLE `testimoniale`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `testimoniale_FK_cod_utilizator` (`cod_utilizator`);

--
-- Indexuri pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `poze`
--
ALTER TABLE `poze`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `testimoniale`
--
ALTER TABLE `testimoniale`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `poze`
--
ALTER TABLE `poze`
  ADD CONSTRAINT `poze_FK_cod_utilizator` FOREIGN KEY (`cod_utilizator`) REFERENCES `utilizatori` (`cod`);

--
-- Constrângeri pentru tabele `testimoniale`
--
ALTER TABLE `testimoniale`
  ADD CONSTRAINT `testimoniale_FK_cod_utilizator` FOREIGN KEY (`cod_utilizator`) REFERENCES `utilizatori` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
