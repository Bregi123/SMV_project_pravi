-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: localhost:3306
-- Čas nastanka: 20. okt 2023 ob 21.22
-- Različica strežnika: 8.0.34-0ubuntu0.22.04.1
-- Različica PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `smv_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabele `login`
--

CREATE TABLE `login` (
  `id_login` int NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `professor` boolean NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `login`
--

INSERT INTO `login` (`id_login`, `name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES
(1, 'luka', 'Bombek', 'kljukec', 'admin', '12345678', 'luka@gmail.com', false ),
(2, 't', 't', 't', 't', 't', 't', false );

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Struktura tabele `professors-subjects`
--

CREATE TABLE `professors_subjects` (
  `id` int NOT NULL,
  `id_professor` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `id_student` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `subjects`
--

INSERT INTO `subjects` (`id_subject`, `subject_name`) VALUES
(1, 'SLO'),
(2, 'MAT'),
(3, 'ANG'),
(4, 'NRP'),
(5, 'RPR'),
(6, 'NUP'),
(7, 'NPP');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--

-- Indeksi tabele `professors-subjects`
--
ALTER TABLE `professors_subjects`
  ADD PRIMARY KEY  (`id`);
  

--
-- Indeksi tabele `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY  (`id`);
  

--
-- Indeksi tabele `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- AUTO_INCREMENT tabele `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `professors_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Omejitve za tabelo `professors-subjects`
--
ALTER TABLE `professors_subjects`
  ADD CONSTRAINT `subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `professors_subjects`
  ADD CONSTRAINT `professor` FOREIGN KEY (`id_professor`) REFERENCES `login` (`id_login`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Omejitve za tabelo `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_student` FOREIGN KEY (`id_student`) REFERENCES `login` (`id_login`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_STUD_subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
