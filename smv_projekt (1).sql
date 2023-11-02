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


CREATE TABLE materials( id_subject int NOT NULL, material_name varchar(255) NOT NULL, material_file varchar(255) NOT NULL );
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
(8, 'UPN');
(9, 'ROB');
(10, 'VVO');

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
-- Student 1
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('John', 'Smith', 'johnsmith1', 'Student', 'password1', 'john@example.com', false);

-- Student 2
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Emma', 'Johnson', 'emmajohnson2', 'Student', 'password2', 'emma@example.com', false);

-- Student 3
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Michael', 'Brown', 'michaelbrown3', 'Student', 'password3', 'michael@example.com', false);

-- Student 4
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Olivia', 'Davis', 'oliviadavis4', 'Student', 'password4', 'olivia@example.com', false);

-- Student 5
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('William', 'Wilson', 'williamwilson5', 'Student', 'password5', 'william@example.com', false);

-- Student 6
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sophia', 'Lee', 'sophiale6', 'Student', 'password6', 'sophia@example.com', false);

-- Student 7
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('James', 'Miller', 'jamesmiller7', 'Student', 'password7', 'james@example.com', false);

-- Student 8
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Charlotte', 'Harris', 'charlotteharris8', 'Student', 'password8', 'charlotte@example.com', false);

-- Student 9
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Benjamin', 'Moore', 'benjaminmoore9', 'Student', 'password9', 'benjamin@example.com', false);

-- Student 10
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mia', 'Taylor', 'miataylor10', 'Student', 'password10', 'mia@example.com', false);

-- Continue with similar INSERT statements for more students
-- Student 11
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Liam', 'Anderson', 'liamanderson11', 'Student', 'password11', 'liam@example.com', false);

-- Student 12
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ava', 'Clark', 'avaclark12', 'Student', 'password12', 'ava@example.com', false);

-- Student 13
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Noah', 'Turner', 'noahturner13', 'Student', 'password13', 'noah@example.com', false);

-- Student 14
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Isabella', 'Wright', 'isabellawright14', 'Student', 'password14', 'isabella@example.com', false);

-- Student 15
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('James', 'Martin', 'jamesmartin15', 'Student', 'password15', 'james@example.com', false);

-- Student 16
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sophia', 'Hill', 'sophiahill16', 'Student', 'password16', 'sophia@example.com', false);

-- Student 17
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Logan', 'Turner', 'loganturner17', 'Student', 'password17', 'logan@example.com', false);

-- Student 18
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Olivia', 'Garcia', 'oliviagarcia18', 'Student', 'password18', 'olivia@example.com', false);

-- Student 19
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Liam', 'Davis', 'liamdavis19', 'Student', 'password19', 'liam@example.com', false);

-- Student 20
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mia', 'Robinson', 'miarobinson20', 'Student', 'password20', 'mia@example.com', false);

-- Continue with similar INSERT statements for more students
-- Repeat this pattern for a total of 100 students
-- Student 21
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ethan', 'Bennett', 'ethanbennett21', 'Student', 'password21', 'ethan@example.com', false);

-- Student 22
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Avery', 'Morgan', 'averymorgan22', 'Student', 'password22', 'avery@example.com', false);

-- Student 23
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Lucas', 'Gray', 'lucasgray23', 'Student', 'password23', 'lucas@example.com', false);

-- Student 24
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sophia', 'Fisher', 'sophiafisher24', 'Student', 'password24', 'sophia@example.com', false);

-- Student 25
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Henry', 'Turner', 'henryturner25', 'Student', 'password25', 'henry@example.com', false);

-- Student 26
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Aria', 'Collins', 'ariacollins26', 'Student', 'password26', 'aria@example.com', false);

-- Student 27
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mason', 'Hill', 'masonhill27', 'Student', 'password27', 'mason@example.com', false);

-- Student 28
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Scarlett', 'Reed', 'scarlettreed28', 'Student', 'password28', 'scarlett@example.com', false);

-- Student 29
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Liam', 'Brown', 'liambrown29', 'Student', 'password29', 'liam@example.com', false);

-- Student 30
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Abigail', 'Scott', 'abigailscott30', 'Student', 'password30', 'abigail@example.com', false);

-- Student 31
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Elijah', 'Cooper', 'elijahcooper31', 'Student', 'password31', 'elijah@example.com', false);

-- Student 32
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sofia', 'Ward', 'sofiaward32', 'Student', 'password32', 'sofia@example.com', false);

-- Student 33
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Oliver', 'Foster', 'oliverfoster33', 'Student', 'password33', 'oliver@example.com', false);

-- Student 34
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Amelia', 'Peterson', 'ameliapeterson34', 'Student', 'password34', 'amelia@example.com', false);

-- Student 35
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Benjamin', 'Price', 'benjaminprice35', 'Student', 'password35', 'benjamin@example.com', false);

-- Student 36
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Lucy', 'Ward', 'lucyward36', 'Student', 'password36', 'lucy@example.com', false);

-- Student 37
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Alexander', 'Mitchell', 'alexandermitchell37', 'Student', 'password37', 'alexander@example.com', false);

-- Student 38
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ava', 'Bell', 'avabell38', 'Student', 'password38', 'ava@example.com', false);

-- Student 39
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Henry', 'Reed', 'henryreed39', 'Student', 'password39', 'henry@example.com', false);

-- Student 40
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Harper', 'Parker', 'harperparker40', 'Student', 'password40', 'harper@example.com', false);

-- Continue with similar INSERT statements for more students
-- Student 41
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Luna', 'Collins', 'lunacollins41', 'Student', 'password41', 'luna@example.com', false);

-- Student 42
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Eli', 'Harrison', 'eliharrison42', 'Student', 'password42', 'eli@example.com', false);

-- Student 43
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mason', 'Adams', 'masonadams43', 'Student', 'password43', 'mason@example.com', false);

-- Student 44
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Grace', 'Campbell', 'gracecampbell44', 'Student', 'password44', 'grace@example.com', false);

-- Student 45
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Oliver', 'Cole', 'olivercole45', 'Student', 'password45', 'oliver@example.com', false);

-- Student 46
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Chloe', 'Wright', 'chloewright46', 'Student', 'password46', 'chloe@example.com', false);

-- Student 47
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ethan', 'Lewis', 'ethanlewis47', 'Student', 'password47', 'ethan@example.com', false);

-- Student 48
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Harper', 'Jenkins', 'harperjenkins48', 'Student', 'password48', 'harper@example.com', false);

-- Student 49
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Logan', 'Harrison', 'loganharrison49', 'Student', 'password49', 'logan@example.com', false);

-- Student 50
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Isabella', 'Diaz', 'isabelladiaz50', 'Student', 'password50', 'isabella@example.com', false);

-- Student 51
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Elijah', 'Stewart', 'elijahstewart51', 'Student', 'password51', 'elijah@example.com', false);

-- Student 52
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ava', 'Reed', 'avareed52', 'Student', 'password52', 'ava@example.com', false);

-- Student 53
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Carter', 'Foster', 'carterfoster53', 'Student', 'password53', 'carter@example.com', false);

-- Student 54
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sophia', 'Cooper', 'sophiacooper54', 'Student', 'password54', 'sophia@example.com', false);

-- Student 55
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mason', 'Ramirez', 'masonramirez55', 'Student', 'password55', 'mason@example.com', false);

-- Student 56
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Lily', 'Bennett', 'lilybennett56', 'Student', 'password56', 'lily@example.com', false);

-- Student 57
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Liam', 'Adams', 'liamadams57', 'Student', 'password57', 'liam@example.com', false);

-- Student 58
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Grace', 'Hill', 'gracehill58', 'Student', 'password58', 'grace@example.com', false);

-- Student 59
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Noah', 'Robinson', 'noahrobinson59', 'Student', 'password59', 'noah@example.com', false);

-- Student 60
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Aria', 'Clark', 'ariaclark60', 'Student', 'password60', 'aria@example.com', false);
-- Student 61
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Aiden', 'Gonzalez', 'aidengonzalez61', 'Student', 'password61', 'aiden@example.com', false);

-- Student 62
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Aria', 'Mitchell', 'ariamitchell62', 'Student', 'password62', 'aria@example.com', false);

-- Student 63
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Oliver', 'Foster', 'oliverfoster63', 'Student', 'password63', 'oliver@example.com', false);

-- Student 64
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sophia', 'Young', 'sophiayoung64', 'Student', 'password64', 'sophia@example.com', false);

-- Student 65
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Elijah', 'Harrison', 'elijahharrison65', 'Student', 'password65', 'elijah@example.com', false);

-- Student 66
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ava', 'Jenkins', 'avajenkins66', 'Student', 'password66', 'ava@example.com', false);

-- Student 67
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Noah', 'Ward', 'noahward67', 'Student', 'password67', 'noah@example.com', false);

-- Student 68
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Isabella', 'Turner', 'isabellaturner68', 'Student', 'password68', 'isabella@example.com', false);

-- Student 69
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Henry', 'Scott', 'henryscott69', 'Student', 'password69', 'henry@example.com', false);

-- Student 70
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Chloe', 'Parker', 'chloeparker70', 'Student', 'password70', 'chloe@example.com', false);

-- Student 71
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Liam', 'Ramirez', 'liamramirez71', 'Student', 'password71', 'liam@example.com', false);

-- Student 72
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sophia', 'Hill', 'sophiahill72', 'Student', 'password72', 'sophia@example.com', false);

-- Student 73
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ethan', 'Cole', 'ethancole73', 'Student', 'password73', 'ethan@example.com', false);

-- Student 74
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ava', 'Adams', 'avaadams74', 'Student', 'password74', 'ava@example.com', false);

-- Student 75
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Lucas', 'Robinson', 'lucasrobinson75', 'Student', 'password75', 'lucas@example.com', false);

-- Student 76
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mia', 'Gonzalez', 'miagonzalez76', 'Student', 'password76', 'mia@example.com', false);

-- Student 77
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Elijah', 'Price', 'elijahprice77', 'Student', 'password77', 'elijah@example.com', false);

-- Student 78
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Charlotte', 'Moore', 'charlottemoore78', 'Student', 'password78', 'charlotte@example.com', false);

-- Student 79
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Aiden', 'Bennett', 'aidenbennett79', 'Student', 'password79', 'aiden@example.com', false);

-- Student 80
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Eli', 'Taylor', 'elitaylor80', 'Student', 'password80', 'eli@example.com', false);
-- Student 81
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mason', 'Fisher', 'masonfisher81', 'Student', 'password81', 'mason@example.com', false);

-- Student 82
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sophia', 'Harrison', 'sophiaharrison82', 'Student', 'password82', 'sophia@example.com', false);

-- Student 83
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ethan', 'Garcia', 'ethangarcia83', 'Student', 'password83', 'ethan@example.com', false);

-- Student 84
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Liam', 'Lewis', 'liamlewis84', 'Student', 'password84', 'liam@example.com', false);

-- Student 85
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Aria', 'Robinson', 'ariarobinson85', 'Student', 'password85', 'aria@example.com', false);

-- Student 86
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Lucas', 'Foster', 'lucasfoster86', 'Student', 'password86', 'lucas@example.com', false);

-- Student 87
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Isabella', 'Turner', 'isabellaturner87', 'Student', 'password87', 'isabella@example.com', false);

-- Student 88
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Noah', 'Foster', 'noahfoster88', 'Student', 'password88', 'noah@example.com', false);

-- Student 89
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ava', 'Mitchell', 'avamitchell89', 'Student', 'password89', 'ava@example.com', false);

-- Student 90
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Henry', 'Ward', 'henryward90', 'Student', 'password90', 'henry@example.com', false);

-- Student 91
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Chloe', 'Bell', 'chloebell91', 'Student', 'password91', 'chloe@example.com', false);

-- Student 92
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Eli', 'Hill', 'elihill92', 'Student', 'password92', 'eli@example.com', false);

-- Student 93
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Harper', 'Turner', 'harperturner93', 'Student', 'password93', 'harper@example.com', false);

-- Student 94
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Aria', 'Lewis', 'arialewis94', 'Student', 'password94', 'aria@example.com', false);

-- Student 95
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Mia', 'Harrison', 'miaharrison95', 'Student', 'password95', 'mia@example.com', false);

-- Student 96
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Liam', 'Garcia', 'liamgarcia96', 'Student', 'password96', 'liam@example.com', false);

-- Student 97
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Oliver', 'Scott', 'oliverscott97', 'Student', 'password97', 'oliver@example.com', false);

-- Student 98
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Sofia', 'Bell', 'sofiabell98', 'Student', 'password98', 'sofia@example.com', false);

-- Student 99
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Luna', 'Parker', 'lunaparker99', 'Student', 'password99', 'luna@example.com', false);

-- Student 100
INSERT INTO `login` (`name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES ('Ethan', 'Cooper', 'ethancooper100', 'Student', 'password100', 'ethan@example.com', false);
