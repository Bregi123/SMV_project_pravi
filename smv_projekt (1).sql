-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: localhost:3306
-- Čas nastanka: 03. nov 2023 ob 12.39
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
DROP TABLE  `materials`; 
DROP TABLE  `assignments`; 
DROP TABLE  `students`; 
DROP TABLE  `professors_subjects`; 
DROP TABLE  `subjects`; 
DROP TABLE  `login`; 

CREATE TABLE `login` (
  `id_login` int NOT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `professor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `login`
--

INSERT INTO `login` (`id_login`, `name`, `surname`, `username`, `user_type`, `password`, `email`, `professor`) VALUES
(1, 'luka', 'Bombek', 'kljukec', 'Admin', '12345678', 'luka@gmail.com', 0),
(2, 'Matevz', 'Berginc', 'Professor', 'Professor', 't', 't@gmail.com', 1),
(3, 'John', 'Smith', 'johnsmith1', 'Student', 'password1', 'john@example.com', 0),
(4, 'Emma', 'Johnson', 'emmajohnson2', 'Student', 'password2', 'emma@example.com', 0),
(5, 'Michael', 'Brown', 'michaelbrown3', 'Student', 'password3', 'michael@example.com', 0),
(6, 'Olivia', 'Davis', 'oliviadavis4', 'Student', 'password4', 'olivia@example.com', 0),
(7, 'William', 'Wilson', 'williamwilson5', 'Student', 'password5', 'william@example.com', 0),
(8, 'Sophia', 'Lee', 'sophiale6', 'Student', 'password6', 'sophia@example.com', 0),
(9, 'James', 'Miller', 'jamesmiller7', 'Student', 'password7', 'james@example.com', 0),
(10, 'Charlotte', 'Harris', 'charlotteharris8', 'Student', 'password8', 'charlotte@example.com', 0),
(11, 'Benjamin', 'Moore', 'benjaminmoore9', 'Student', 'password9', 'benjamin@example.com', 0),
(12, 'Mia', 'Taylor', 'miataylor10', 'Student', 'password10', 'mia@example.com', 0),
(13, 'Liam', 'Anderson', 'liamanderson11', 'Student', 'password11', 'liam@example.com', 0),
(14, 'Ava', 'Clark', 'avaclark12', 'Student', 'password12', 'ava@example.com', 0),
(15, 'Noah', 'Turner', 'noahturner13', 'Student', 'password13', 'noah@example.com', 0),
(16, 'Isabella', 'Wright', 'isabellawright14', 'Student', 'password14', 'isabella@example.com', 0),
(17, 'James', 'Martin', 'jamesmartin15', 'Student', 'password15', 'james@example.com', 0),
(18, 'Sophia', 'Hill', 'sophiahill16', 'Student', 'password16', 'sophia@example.com', 0),
(19, 'Logan', 'Turner', 'loganturner17', 'Student', 'password17', 'logan@example.com', 0),
(20, 'Olivia', 'Garcia', 'oliviagarcia18', 'Student', 'password18', 'olivia@example.com', 0),
(21, 'Liam', 'Davis', 'liamdavis19', 'Student', 'password19', 'liam@example.com', 0),
(22, 'Mia', 'Robinson', 'miarobinson20', 'Student', 'password20', 'mia@example.com', 0),
(23, 'Ethan', 'Bennett', 'ethanbennett21', 'Student', 'password21', 'ethan@example.com', 0),
(24, 'Avery', 'Morgan', 'averymorgan22', 'Student', 'password22', 'avery@example.com', 0),
(25, 'Lucas', 'Gray', 'lucasgray23', 'Student', 'password23', 'lucas@example.com', 0),
(26, 'Sophia', 'Fisher', 'sophiafisher24', 'Student', 'password24', 'sophia@example.com', 0),
(27, 'Henry', 'Turner', 'henryturner25', 'Student', 'password25', 'henry@example.com', 0),
(28, 'Aria', 'Collins', 'ariacollins26', 'Student', 'password26', 'aria@example.com', 0),
(29, 'Mason', 'Hill', 'masonhill27', 'Student', 'password27', 'mason@example.com', 0),
(30, 'Scarlett', 'Reed', 'scarlettreed28', 'Student', 'password28', 'scarlett@example.com', 0),
(31, 'Liam', 'Brown', 'liambrown29', 'Student', 'password29', 'liam@example.com', 0),
(32, 'Abigail', 'Scott', 'abigailscott30', 'Student', 'password30', 'abigail@example.com', 0),
(33, 'Elijah', 'Cooper', 'elijahcooper31', 'Student', 'password31', 'elijah@example.com', 0),
(34, 'Sofia', 'Ward', 'sofiaward32', 'Student', 'password32', 'sofia@example.com', 0),
(35, 'Oliver', 'Foster', 'oliverfoster33', 'Student', 'password33', 'oliver@example.com', 0),
(36, 'Amelia', 'Peterson', 'ameliapeterson34', 'Student', 'password34', 'amelia@example.com', 0),
(37, 'Benjamin', 'Price', 'benjaminprice35', 'Student', 'password35', 'benjamin@example.com', 0),
(38, 'Lucy', 'Ward', 'lucyward36', 'Student', 'password36', 'lucy@example.com', 0),
(39, 'Alexander', 'Mitchell', 'alexandermitchell37', 'Student', 'password37', 'alexander@example.com', 0),
(40, 'Ava', 'Bell', 'avabell38', 'Student', 'password38', 'ava@example.com', 0),
(41, 'Henry', 'Reed', 'henryreed39', 'Student', 'password39', 'henry@example.com', 0),
(42, 'Harper', 'Parker', 'harperparker40', 'Student', 'password40', 'harper@example.com', 0),
(43, 'Luna', 'Collins', 'lunacollins41', 'Student', 'password41', 'luna@example.com', 0),
(44, 'Eli', 'Harrison', 'eliharrison42', 'Student', 'password42', 'eli@example.com', 0),
(45, 'Mason', 'Adams', 'masonadams43', 'Student', 'password43', 'mason@example.com', 0),
(46, 'Grace', 'Campbell', 'gracecampbell44', 'Student', 'password44', 'grace@example.com', 0),
(47, 'Oliver', 'Cole', 'olivercole45', 'Student', 'password45', 'oliver@example.com', 0),
(48, 'Chloe', 'Wright', 'chloewright46', 'Student', 'password46', 'chloe@example.com', 0),
(49, 'Ethan', 'Lewis', 'ethanlewis47', 'Student', 'password47', 'ethan@example.com', 0),
(50, 'Harper', 'Jenkins', 'harperjenkins48', 'Student', 'password48', 'harper@example.com', 0),
(51, 'Logan', 'Harrison', 'loganharrison49', 'Student', 'password49', 'logan@example.com', 0),
(52, 'Isabella', 'Diaz', 'isabelladiaz50', 'Student', 'password50', 'isabella@example.com', 0),
(53, 'Elijah', 'Stewart', 'elijahstewart51', 'Student', 'password51', 'elijah@example.com', 0),
(54, 'Ava', 'Reed', 'avareed52', 'Student', 'password52', 'ava@example.com', 0),
(55, 'Carter', 'Foster', 'carterfoster53', 'Student', 'password53', 'carter@example.com', 0),
(56, 'Sophia', 'Cooper', 'sophiacooper54', 'Student', 'password54', 'sophia@example.com', 0),
(57, 'Mason', 'Ramirez', 'masonramirez55', 'Student', 'password55', 'mason@example.com', 0),
(58, 'Lily', 'Bennett', 'lilybennett56', 'Student', 'password56', 'lily@example.com', 0),
(59, 'Liam', 'Adams', 'liamadams57', 'Student', 'password57', 'liam@example.com', 0),
(60, 'Grace', 'Hill', 'gracehill58', 'Student', 'password58', 'grace@example.com', 0),
(61, 'Noah', 'Robinson', 'noahrobinson59', 'Student', 'password59', 'noah@example.com', 0),
(62, 'Aria', 'Clark', 'ariaclark60', 'Student', 'password60', 'aria@example.com', 0),
(63, 'Aiden', 'Gonzalez', 'aidengonzalez61', 'Student', 'password61', 'aiden@example.com', 0),
(64, 'Aria', 'Mitchell', 'ariamitchell62', 'Student', 'password62', 'aria@example.com', 0),
(65, 'Oliver', 'Foster', 'oliverfoster63', 'Student', 'password63', 'oliver@example.com', 0),
(66, 'Sophia', 'Young', 'sophiayoung64', 'Student', 'password64', 'sophia@example.com', 0),
(67, 'Elijah', 'Harrison', 'elijahharrison65', 'Student', 'password65', 'elijah@example.com', 0),
(68, 'Ava', 'Jenkins', 'avajenkins66', 'Student', 'password66', 'ava@example.com', 0),
(69, 'Noah', 'Ward', 'noahward67', 'Student', 'password67', 'noah@example.com', 0),
(70, 'Isabella', 'Turner', 'isabellaturner68', 'Student', 'password68', 'isabella@example.com', 0),
(71, 'Henry', 'Scott', 'henryscott69', 'Student', 'password69', 'henry@example.com', 0),
(72, 'Chloe', 'Parker', 'chloeparker70', 'Student', 'password70', 'chloe@example.com', 0),
(73, 'Liam', 'Ramirez', 'liamramirez71', 'Student', 'password71', 'liam@example.com', 0),
(74, 'Sophia', 'Hill', 'sophiahill72', 'Student', 'password72', 'sophia@example.com', 0),
(75, 'Ethan', 'Cole', 'ethancole73', 'Student', 'password73', 'ethan@example.com', 0),
(76, 'Ava', 'Adams', 'avaadams74', 'Student', 'password74', 'ava@example.com', 0),
(77, 'Lucas', 'Robinson', 'lucasrobinson75', 'Student', 'password75', 'lucas@example.com', 0),
(78, 'Mia', 'Gonzalez', 'miagonzalez76', 'Student', 'password76', 'mia@example.com', 0),
(79, 'Elijah', 'Price', 'elijahprice77', 'Student', 'password77', 'elijah@example.com', 0),
(80, 'Charlotte', 'Moore', 'charlottemoore78', 'Student', 'password78', 'charlotte@example.com', 0),
(81, 'Aiden', 'Bennett', 'aidenbennett79', 'Student', 'password79', 'aiden@example.com', 0),
(82, 'Eli', 'Taylor', 'elitaylor80', 'Student', 'password80', 'eli@example.com', 0),
(83, 'Mason', 'Fisher', 'masonfisher81', 'Student', 'password81', 'mason@example.com', 0),
(84, 'Sophia', 'Harrison', 'sophiaharrison82', 'Student', 'password82', 'sophia@example.com', 0),
(85, 'Ethan', 'Garcia', 'ethangarcia83', 'Student', 'password83', 'ethan@example.com', 0),
(86, 'Liam', 'Lewis', 'liamlewis84', 'Student', 'password84', 'liam@example.com', 0),
(87, 'Aria', 'Robinson', 'ariarobinson85', 'Student', 'password85', 'aria@example.com', 0),
(88, 'Lucas', 'Foster', 'lucasfoster86', 'Student', 'password86', 'lucas@example.com', 0),
(89, 'Isabella', 'Turner', 'isabellaturner87', 'Student', 'password87', 'isabella@example.com', 0),
(90, 'Noah', 'Foster', 'noahfoster88', 'Student', 'password88', 'noah@example.com', 0),
(91, 'Ava', 'Mitchell', 'avamitchell89', 'Student', 'password89', 'ava@example.com', 0),
(92, 'Henry', 'Ward', 'henryward90', 'Student', 'password90', 'henry@example.com', 0),
(93, 'Chloe', 'Bell', 'chloebell91', 'Student', 'password91', 'chloe@example.com', 0),
(94, 'Eli', 'Hill', 'elihill92', 'Student', 'password92', 'eli@example.com', 0),
(95, 'Harper', 'Turner', 'harperturner93', 'Student', 'password93', 'harper@example.com', 0),
(96, 'Aria', 'Lewis', 'arialewis94', 'Student', 'password94', 'aria@example.com', 0),
(97, 'Mia', 'Harrison', 'miaharrison95', 'Student', 'password95', 'mia@example.com', 0),
(98, 'Liam', 'Garcia', 'liamgarcia96', 'Student', 'password96', 'liam@example.com', 0),
(99, 'Oliver', 'Scott', 'oliverscott97', 'Student', 'password97', 'oliver@example.com', 0),
(100, 'Sofia', 'Bell', 'sofiabell98', 'Student', 'password98', 'sofia@example.com', 0),
(101, 'Luna', 'Parker', 'lunaparker99', 'Student', 'password99', 'luna@example.com', 0),
(102, 'Ethan', 'Cooper', 'ethancooper100', 'Student', 'password100', 'ethan@example.com', 0),
(103, 'David', 'Smith', 'davidsmith1', 'Professor', 'password1', 'david@example.com', 1),
(104, 'Emily', 'Johnson', 'emilyjohnson2', 'Professor', 'password2', 'emily@example.com', 1),
(105, 'Daniel', 'Brown', 'danielbrown3', 'Professor', 'password3', 'daniel@example.com', 1),
(106, 'Olivia', 'Davis', 'oliviadavis4', 'Professor', 'password4', 'olivia@example.com', 1),
(107, 'William', 'Wilson', 'williamwilson5', 'Professor', 'password5', 'william@example.com', 1),
(108, 'James', 'Miller', 'jamesmiller7', 'Professor', 'password7', 'james@example.com', 1),
(109, 'Charlotte', 'Harris', 'charlotteharris8', 'Professor', 'password8', 'charlotte@example.com', 1),
(110, 'Benjamin', 'Moore', 'benjaminmoore9', 'Professor', 'password9', 'benjamin@example.com', 1),
(111, 'Mia', 'Taylor', 'miataylor10', 'Professor', 'password10', 'mia@example.com', 1),
(112, 'Liam', 'Anderson', 'liamanderson11', 'Professor', 'password11', 'liam@example.com', 1),
(113, 'Ava', 'Clark', 'avaclark12', 'Professor', 'password12', 'ava@example.com', 1),
(114, 'Noah', 'Turner', 'noahturner13', 'Professor', 'password13', 'noah@example.com', 1),
(115, 'Isabella', 'Wright', 'isabellawright14', 'Professor', 'password14', 'isabella@example.com', 1),
(116, 'James', 'Martin', 'jamesmartin15', 'Professor', 'password15', 'james@example.com', 1),
(117, 'Sophia', 'Hill', 'sophiahill16', 'Professor', 'password16', 'sophia@example.com', 1),
(118, 'Ethan', 'Adams', 'ethanadams17', 'Professor', 'password17', 'ethan@example.com', 1),
(119, 'Olivia', 'Thomas', 'oliviathomas18', 'Professor', 'password18', 'olivia@example.com', 1),
(120, 'William', 'Garcia', 'williamgarcia19', 'Professor', 'password19', 'william@example.com', 1),
(121, 'Charlotte', 'King', 'charlotteking20', 'Professor', 'password20', 'charlotte@example.com', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `materials`
--

CREATE TABLE `materials` (
  `id` int NOT NULL,
  `id_subject` int NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `material_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `assignments` (
  `id` int NOT NULL,
  `id_subject` int NOT NULL,
  `id_student` int NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assignment_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- --------------------------------------------------------

--
-- Struktura tabele `professors_subjects`
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

--
-- Odloži podatke za tabelo `students`
--
INSERT INTO `professors_subjects` (`id`, `id_professor`, `id_subject`) VALUES
(1, 2, 8 ),
(2, 2, 5 );


INSERT INTO `students` (`id`, `id_student`, `id_subject`) VALUES
(3, 3, 8),
(4, 4, 2),
(5, 5, 7),
(6, 6, 10),
(9, 7, 10),
(10, 8, 5),
(11, 9, 1),
(12, 10, 9),
(13, 11, 6),
(14, 12, 4),
(15, 13, 1),
(16, 14, 1),
(17, 15, 10),
(18, 16, 7),
(19, 17, 5),
(20, 18, 8),
(21, 19, 10),
(22, 20, 2),
(23, 21, 6),
(24, 22, 3),
(25, 23, 2),
(26, 24, 5),
(27, 25, 1),
(28, 26, 9),
(29, 27, 6),
(30, 28, 4),
(31, 29, 1),
(32, 30, 2),
(33, 31, 3),
(34, 32, 4),
(35, 33, 5),
(36, 34, 6),
(37, 35, 7),
(38, 36, 8),
(39, 37, 9),
(40, 38, 10),
(41, 39, 1),
(42, 40, 2),
(43, 41, 3),
(44, 42, 4),
(45, 43, 5),
(46, 44, 6),
(47, 45, 7),
(48, 46, 8),
(49, 47, 9),
(50, 48, 10),
(51, 49, 1),
(52, 50, 2),
(53, 51, 3),
(54, 52, 5),
(55, 53, 7),
(56, 54, 2),
(57, 55, 8),
(58, 56, 4),
(59, 57, 6),
(60, 58, 10),
(61, 59, 1),
(62, 60, 9),
(63, 61, 2),
(64, 62, 5),
(65, 63, 2),
(66, 64, 4),
(67, 65, 7),
(68, 66, 1),
(69, 67, 8),
(70, 68, 3),
(71, 69, 6),
(72, 70, 9),
(73, 71, 10),
(74, 72, 3),
(75, 73, 1),
(76, 74, 2),
(77, 75, 3),
(78, 76, 4),
(79, 77, 5),
(80, 78, 6),
(81, 79, 7),
(82, 80, 8),
(83, 81, 9),
(84, 82, 10),
(85, 83, 1),
(86, 84, 2),
(87, 85, 3),
(88, 86, 4),
(89, 87, 5),
(90, 88, 6),
(91, 89, 7),
(92, 90, 8),
(93, 91, 9),
(94, 92, 10),
(95, 93, 1),
(96, 94, 2),
(97, 95, 3),
(98, 96, 4),
(99, 97, 5),
(100, 98, 6),
(101, 99, 7),
(102, 100, 8),
(103, 101, 9),
(104, 102, 10),
(105, 103, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int NOT NULL,
  `subject_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
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
(7, 'NPP'),
(8, 'UPN'),
(9, 'ROB'),
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
-- Indeksi tabele `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY  (`id`);

  ALTER TABLE `assignments`
  ADD PRIMARY KEY  (`id`);


--
-- Indeksi tabele `professors_subjects`
--
ALTER TABLE `professors_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`id_subject`),
  ADD KEY `professor` (`id_professor`);

--
-- Indeksi tabele `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_student` (`id_student`),
  ADD KEY `FK_STUD_subject` (`id_subject`);

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
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

ALTER TABLE `materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
ALTER TABLE `assignments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT tabele `professors_subjects`
--
ALTER TABLE `professors_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT tabele `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT tabele `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `FK_subject_m` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `assignments`
  ADD CONSTRAINT `FK_subject_a` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `assignments`
  ADD CONSTRAINT `FK_student_a` FOREIGN KEY (`id_student`) REFERENCES `login` (`id_login`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Omejitve za tabelo `professors_subjects`
--
ALTER TABLE `professors_subjects`
  ADD CONSTRAINT `professor` FOREIGN KEY (`id_professor`) REFERENCES `login` (`id_login`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Omejitve za tabelo `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_STUD_subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_student` FOREIGN KEY (`id_student`) REFERENCES `login` (`id_login`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
