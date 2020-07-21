-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 21. Jul 2020 um 15:18
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `test_db`
--
CREATE DATABASE IF NOT EXISTS `test_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test_db`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date_start` date DEFAULT NULL,
  `booking_date_end` date DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date_start`, `booking_date_end`, `fk_user_id`, `fk_car_id`) VALUES
(1, '2020-07-22', '2020-07-25', 2, 4),
(2, '2020-07-22', '2020-07-25', 2, 4),
(3, '2020-07-22', '2020-07-24', 2, 4),
(4, '2020-07-22', '2020-07-24', 2, 4),
(5, '2020-07-22', '2020-07-25', 2, 4),
(26, '2020-07-23', '2020-07-25', 2, 1),
(27, '2020-07-23', '2020-07-25', 4, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `availability` enum('yes','no') DEFAULT 'yes',
  `price` int(10) NOT NULL,
  `picture` varchar(15) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `location`, `availability`, `price`, `picture`, `active`) VALUES
(1, 'Chrysler', 'Neon', '1220 Wien', 'yes', 79, 'img/neon.jpg', 0),
(4, 'Dodge', 'Caliber', '1050 Wien', 'yes', 89, 'img/caliber.jpg', 0),
(5, 'Ram', 'Heavy Duty', '1130 Wien', 'yes', 170, 'img/ram.jpg', 0),
(7, 'Chrysler', '300', '1220 Wien', 'yes', 129, 'img/c300.jpg', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'Andreas', 'andreas.pirkner@gmx.net', 'b89f393ec9cb8be763d21a51c214bdd79bf5b7ef41d673697c8e1406168aebfc', 'admin'),
(2, 'Andreas Test User', 'chilloutpi@gmx.at', 'b89f393ec9cb8be763d21a51c214bdd79bf5b7ef41d673697c8e1406168aebfc', 'user'),
(3, 'Test Two', 'test2@gmail.com', 'b89f393ec9cb8be763d21a51c214bdd79bf5b7ef41d673697c8e1406168aebfc', 'user'),
(4, 'Test One', 'test1@gmail.com', 'b89f393ec9cb8be763d21a51c214bdd79bf5b7ef41d673697c8e1406168aebfc', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indizes für die Tabelle `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
