-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 09, 2025 at 12:35 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rozklad_zajec`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupy_studenckie`
--

CREATE TABLE `grupy_studenckie` (
  `grupa_id` int(11) NOT NULL,
  `grupa_nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grupy_studenckie`
--

INSERT INTO `grupy_studenckie` (`grupa_id`, `grupa_nazwa`) VALUES
(1, 'INF1'),
(2, 'INF2'),
(3, 'INF3'),
(4, 'MAT1'),
(5, 'BIO1'),
(8, 'FIZ4'),
(9, 'MAT2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prowadzacy`
--

CREATE TABLE `prowadzacy` (
  `prowadzacy_id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `stopien_prowadzacy` enum('brak','mgr','dr','dr hab.','prof.') NOT NULL DEFAULT 'brak' COMMENT 'Stopień naukowy prowadzącego'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prowadzacy`
--

INSERT INTO `prowadzacy` (`prowadzacy_id`, `imie`, `nazwisko`, `stopien_prowadzacy`) VALUES
(1, 'Anna', 'Nowak', 'dr'),
(2, 'Piotr', 'Kowalski', 'mgr'),
(3, 'Jakub', 'Kowalewski', 'dr hab.'),
(4, 'Tomasz', 'Problem', 'mgr'),
(5, 'Kamil', 'Jutro', 'prof.'),
(6, 'Joachim', 'Górzenko', 'mgr');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rozklad_zajec`
--

CREATE TABLE `rozklad_zajec` (
  `id_rozkladu` int(11) NOT NULL,
  `zajecia_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  `prowadzacy_id` int(11) NOT NULL,
  `grupa_id` int(11) NOT NULL,
  `id_terminu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rozklad_zajec`
--

INSERT INTO `rozklad_zajec` (`id_rozkladu`, `zajecia_id`, `sala_id`, `prowadzacy_id`, `grupa_id`, `id_terminu`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2),
(3, 3, 3, 3, 3, 3),
(4, 4, 4, 4, 4, 4),
(5, 5, 5, 5, 5, 5),
(7, 6, 2, 6, 9, 6),
(8, 3, 4, 1, 8, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `nazwa`) VALUES
(1, 'Sala 101'),
(2, 'Laboratorium A'),
(3, 'Aula Główna'),
(4, 'Sala 202'),
(5, 'Sala Komputerowa'),
(6, 'Hala WSM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `terminy_zajec`
--

CREATE TABLE `terminy_zajec` (
  `id_terminu` int(11) NOT NULL,
  `id_zajecia` int(11) NOT NULL,
  `dzien_tygodnia` enum('Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela') NOT NULL,
  `godzina_start` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terminy_zajec`
--

INSERT INTO `terminy_zajec` (`id_terminu`, `id_zajecia`, `dzien_tygodnia`, `godzina_start`) VALUES
(1, 1, 'Poniedziałek', '08:00:00'),
(2, 2, 'Wtorek', '10:00:00'),
(3, 3, 'Środa', '12:00:00'),
(4, 4, 'Czwartek', '14:00:00'),
(5, 5, 'Piątek', '16:00:00'),
(6, 6, 'Piątek', '07:30:00'),
(7, 3, 'Piątek', '08:30:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE `zajecia` (
  `id_zajecia` int(11) NOT NULL,
  `nazwa_zajecia` varchar(50) NOT NULL,
  `rodzaj_zajecia` varchar(50) NOT NULL,
  `sala_id` int(11) NOT NULL,
  `prowadzacy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zajecia`
--

INSERT INTO `zajecia` (`id_zajecia`, `nazwa_zajecia`, `rodzaj_zajecia`, `sala_id`, `prowadzacy_id`) VALUES
(1, 'Matematyka', 'Wykład', 1, 1),
(2, 'Informatyka', 'Laboratorium', 2, 2),
(3, 'Fizyka', 'Ćwiczenia', 3, 3),
(4, 'Chemia', 'Wykład', 4, 4),
(5, 'Biologia', 'Laboratorium', 5, 5),
(6, 'Matematyka2', 'Ćwiczenia', 2, 6);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `grupy_studenckie`
--
ALTER TABLE `grupy_studenckie`
  ADD PRIMARY KEY (`grupa_id`);

--
-- Indeksy dla tabeli `prowadzacy`
--
ALTER TABLE `prowadzacy`
  ADD PRIMARY KEY (`prowadzacy_id`);

--
-- Indeksy dla tabeli `rozklad_zajec`
--
ALTER TABLE `rozklad_zajec`
  ADD PRIMARY KEY (`id_rozkladu`),
  ADD KEY `fk_id_sala` (`sala_id`),
  ADD KEY `fk_id_prowadzacy` (`prowadzacy_id`),
  ADD KEY `fk_id_grupa` (`grupa_id`),
  ADD KEY `fk_id_termin` (`id_terminu`),
  ADD KEY `fk_id_zajec` (`zajecia_id`);

--
-- Indeksy dla tabeli `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indeksy dla tabeli `terminy_zajec`
--
ALTER TABLE `terminy_zajec`
  ADD PRIMARY KEY (`id_terminu`),
  ADD KEY `fk_zajecia_id` (`id_zajecia`);

--
-- Indeksy dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD PRIMARY KEY (`id_zajecia`),
  ADD KEY `fk_zajecia_prowadzacy` (`prowadzacy_id`),
  ADD KEY `fk_zajecia_sale` (`sala_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grupy_studenckie`
--
ALTER TABLE `grupy_studenckie`
  MODIFY `grupa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prowadzacy`
--
ALTER TABLE `prowadzacy`
  MODIFY `prowadzacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rozklad_zajec`
--
ALTER TABLE `rozklad_zajec`
  MODIFY `id_rozkladu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terminy_zajec`
--
ALTER TABLE `terminy_zajec`
  MODIFY `id_terminu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zajecia`
--
ALTER TABLE `zajecia`
  MODIFY `id_zajecia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rozklad_zajec`
--
ALTER TABLE `rozklad_zajec`
  ADD CONSTRAINT `fk_id_grupa` FOREIGN KEY (`grupa_id`) REFERENCES `grupy_studenckie` (`grupa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_prowadzacy` FOREIGN KEY (`prowadzacy_id`) REFERENCES `prowadzacy` (`prowadzacy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_sala` FOREIGN KEY (`sala_id`) REFERENCES `sale` (`sale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_termin` FOREIGN KEY (`id_terminu`) REFERENCES `terminy_zajec` (`id_terminu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_zajec` FOREIGN KEY (`zajecia_id`) REFERENCES `zajecia` (`id_zajecia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terminy_zajec`
--
ALTER TABLE `terminy_zajec`
  ADD CONSTRAINT `fk_zajecia_id` FOREIGN KEY (`id_zajecia`) REFERENCES `zajecia` (`id_zajecia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zajecia`
--
ALTER TABLE `zajecia`
  ADD CONSTRAINT `fk_zajecia_prowadzacy` FOREIGN KEY (`prowadzacy_id`) REFERENCES `prowadzacy` (`prowadzacy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_zajecia_sale` FOREIGN KEY (`sala_id`) REFERENCES `sale` (`sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
