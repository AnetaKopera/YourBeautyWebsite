-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Gru 2019, 21:14
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `yourbeauty`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firms`
--

CREATE TABLE `firms` (
  `id` int(5) NOT NULL,
  `nameOfCompany` varchar(50) COLLATE utf8_bin NOT NULL,
  `idOwner` int(5) NOT NULL,
  `city` varchar(30) COLLATE utf8_bin NOT NULL,
  `street` varchar(50) COLLATE utf8_bin NOT NULL,
  `category` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `firms`
--

INSERT INTO `firms` (`id`, `nameOfCompany`, `idOwner`, `city`, `street`, `category`) VALUES
(1, 'Super Hairdressers', 3, 'New York', 'Orchard Street 45', 'Hairdressers'),
(2, 'Fryzjerek', 3, 'London', 'Blue 45', 'Hairdressers'),
(3, 'Barber de lux', 8, 'Krakow', 'Gorska 677', 'Barbers'),
(4, 'Paznokcie', 8, 'Opoczno', 'Piotrkowska 78', 'Nails'),
(5, 'Perfect', 8, 'Warszawa', 'Badowska 67', 'Estetic Medicine'),
(7, 'Paznokcie', 8, 'Warszawa', 'Gorska 677', 'Nails'),
(8, 'Lakierex', 8, 'Chojne', 'Główna 118', 'Nails');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinions`
--

CREATE TABLE `opinions` (
  `id` int(5) NOT NULL,
  `idUser` int(5) NOT NULL,
  `idFirm` int(5) NOT NULL,
  `idService` int(5) NOT NULL,
  `opinion` varchar(500) COLLATE utf8_bin NOT NULL,
  `stars` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `opinions`
--

INSERT INTO `opinions` (`id`, `idUser`, `idFirm`, `idService`, `opinion`, `stars`) VALUES
(1, 2, 2, 2, 'Very good colour! :D', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE `services` (
  `id` int(5) NOT NULL,
  `typeOfService` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `price` int(20) NOT NULL,
  `timeOfService` int(20) NOT NULL,
  `idFirm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `services`
--

INSERT INTO `services` (`id`, `typeOfService`, `description`, `price`, `timeOfService`, `idFirm`) VALUES
(1, 'mens haircut', 'All of hair types', 70, 60, 1),
(2, 'Hair dyeing', 'Short and medium long hair', 100, 120, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tenure`
--

CREATE TABLE `tenure` (
  `id` int(5) NOT NULL,
  `idFirm` int(5) NOT NULL,
  `idService` int(5) NOT NULL,
  `idWorker` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `tenure`
--

INSERT INTO `tenure` (`id`, `idFirm`, `idService`, `idWorker`) VALUES
(1, 1, 1, 1),
(6, 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timeofworking`
--

CREATE TABLE `timeofworking` (
  `id` int(5) NOT NULL,
  `mondayStart` time DEFAULT NULL,
  `mondayStop` time DEFAULT NULL,
  `tuesdayStart` time DEFAULT NULL,
  `tuesdayStop` time DEFAULT NULL,
  `wednesdayStart` time DEFAULT NULL,
  `wednesdayStop` time DEFAULT NULL,
  `thursdayStart` time DEFAULT NULL,
  `thursdayStop` time DEFAULT NULL,
  `fridayStart` time DEFAULT NULL,
  `fridayStop` time DEFAULT NULL,
  `saturdayStart` time DEFAULT NULL,
  `saturdayStop` time DEFAULT NULL,
  `sundayStart` time DEFAULT NULL,
  `sundayStop` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `timeofworking`
--

INSERT INTO `timeofworking` (`id`, `mondayStart`, `mondayStop`, `tuesdayStart`, `tuesdayStop`, `wednesdayStart`, `wednesdayStop`, `thursdayStart`, `thursdayStop`, `fridayStart`, `fridayStop`, `saturdayStart`, `saturdayStop`, `sundayStart`, `sundayStop`) VALUES
(1, '08:00:00', '15:00:00', '08:00:00', '15:00:00', '08:00:00', '15:00:00', '08:00:00', '15:00:00', '08:00:00', '16:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(3, '06:00:00', '14:00:00', '07:00:00', '14:00:00', '10:00:00', '16:00:00', '12:00:00', '13:00:00', '00:00:00', '00:00:00', '08:00:00', '12:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `surname` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `name2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` char(1) COLLATE utf8_bin NOT NULL,
  `userType` char(1) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `bankAccountNumber` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `name2`, `dateOfBirth`, `gender`, `userType`, `email`, `password`, `bankAccountNumber`) VALUES
(1, 'Kopera', 'Aneta', 'Patrycja', '1998-04-17', 'W', 'A', 'anetadmin@gmail.com', 'Adminka5', NULL),
(2, 'Krawczyk', 'Zuzanna', NULL, '1988-11-26', 'W', 'C', 'zuzannakrawczyk@onet.pl', 'zuzia123', 1234567),
(3, 'Warczynski', 'Zygmunt', 'Witold', '1979-03-02', 'M', 'O', 'zygmuntwarczynski@gmail.com', 'warczynski987', 987654378),
(4, 'Bilska', 'Agnieszka', NULL, '1983-07-07', 'W', 'W', 'agnieszka12@wp.pl', 'aga45', NULL),
(5, 'Olbratowski', 'Jan', NULL, '1979-11-19', 'M', 'C', 'janolbratowski@gmail.com', 'janek79', 683930221),
(8, 'Rowling', 'Jonas', 'Ben', '1998-12-09', 'M', 'O', 'jonas.ben@gmail.com', 'JonasBen1234', 1234567771),
(18, 'XD', 'xdd', 'xddd', '1234-12-09', 'M', 'C', 'xd@xd.xd', 'xdddddd1ddd', 1717155),
(19, 'XD2', 'xdd2', 'xddd2', '1234-12-09', 'M', 'C', 'xd2@xd.xd', 'xdddddd221ddd', 1717152225);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `visits`
--

CREATE TABLE `visits` (
  `id` int(5) NOT NULL,
  `idService` int(5) NOT NULL,
  `dateVisit` date NOT NULL,
  `hourVisit` time NOT NULL,
  `payInAdvance` char(1) COLLATE utf8_bin NOT NULL,
  `idWorker` int(5) NOT NULL,
  `idClient` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workers`
--

CREATE TABLE `workers` (
  `id` int(5) NOT NULL,
  `idUser` int(5) NOT NULL,
  `idFirm` int(5) NOT NULL,
  `idWorkSchedule` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `workers`
--

INSERT INTO `workers` (`id`, `idUser`, `idFirm`, `idWorkSchedule`) VALUES
(1, 4, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOwner` (`idOwner`);

--
-- Indeksy dla tabeli `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idFirm` (`idFirm`),
  ADD KEY `idService` (`idService`);

--
-- Indeksy dla tabeli `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFirm` (`idFirm`);

--
-- Indeksy dla tabeli `tenure`
--
ALTER TABLE `tenure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFirm` (`idFirm`),
  ADD KEY `idService` (`idService`),
  ADD KEY `idWorker` (`idWorker`);

--
-- Indeksy dla tabeli `timeofworking`
--
ALTER TABLE `timeofworking`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idService` (`idService`),
  ADD KEY `idWorker` (`idWorker`),
  ADD KEY `idClient` (`idClient`);

--
-- Indeksy dla tabeli `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idFirm` (`idFirm`),
  ADD KEY `idWorkSchedule` (`idWorkSchedule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `firms`
--
ALTER TABLE `firms`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `services`
--
ALTER TABLE `services`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `tenure`
--
ALTER TABLE `tenure`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `timeofworking`
--
ALTER TABLE `timeofworking`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `firms`
--
ALTER TABLE `firms`
  ADD CONSTRAINT `firms_ibfk_1` FOREIGN KEY (`idOwner`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `opinions_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `opinions_ibfk_2` FOREIGN KEY (`idFirm`) REFERENCES `firms` (`id`),
  ADD CONSTRAINT `opinions_ibfk_3` FOREIGN KEY (`idService`) REFERENCES `services` (`id`);

--
-- Ograniczenia dla tabeli `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`idFirm`) REFERENCES `firms` (`id`);

--
-- Ograniczenia dla tabeli `tenure`
--
ALTER TABLE `tenure`
  ADD CONSTRAINT `tenure_ibfk_1` FOREIGN KEY (`idFirm`) REFERENCES `firms` (`id`),
  ADD CONSTRAINT `tenure_ibfk_2` FOREIGN KEY (`idService`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `tenure_ibfk_3` FOREIGN KEY (`idWorker`) REFERENCES `workers` (`id`);

--
-- Ograniczenia dla tabeli `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`idWorker`) REFERENCES `workers` (`id`),
  ADD CONSTRAINT `visits_ibfk_3` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `workers_ibfk_2` FOREIGN KEY (`idFirm`) REFERENCES `firms` (`id`),
  ADD CONSTRAINT `workers_ibfk_3` FOREIGN KEY (`idWorkSchedule`) REFERENCES `timeofworking` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
