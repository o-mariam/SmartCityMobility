-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Ιουλ 2021 στις 10:50:08
-- Έκδοση διακομιστή: 10.4.13-MariaDB
-- Έκδοση PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `web`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `heading` varchar(25) NOT NULL,
  `activity_type` set('IN_VEHICLE','ON_BICYCLE','ON_FOOT','RUNNING','STILL','TITLING','UNKNOWN','WALKING') NOT NULL,
  `activity_confidence` int(11) NOT NULL,
  `activity_timestampMs` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verticalAccuracy` float NOT NULL,
  `velocity` float NOT NULL,
  `accuracy` float NOT NULL,
  `longitudeE7` float NOT NULL,
  `latitudeE7` float NOT NULL,
  `altitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `simpleuser`
--

CREATE TABLE `simpleuser` (
  `username` varchar(25) NOT NULL,
  `id` varchar(25) NOT NULL,
  `eco_score` double DEFAULT NULL,
  `first_upload` date DEFAULT NULL,
  `last_upload` date NOT NULL,
  `leaderboard` int(11) NOT NULL,
  `days_of_uploads` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Ευρετήρια για πίνακα `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Ευρετήρια για πίνακα `simpleuser`
--
ALTER TABLE `simpleuser`
  ADD PRIMARY KEY (`username`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
