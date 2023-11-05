-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 07:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smv_projekt`
--
CREATE DATABASE IF NOT EXISTS `smv_projekt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `smv_projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assignment_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `id_subject`, `id_student`, `assignment_name`, `assignment_file`) VALUES
(1, 5, 3, 'burek', 'Smith John - burek.odp');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `mypassword` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `firstname`, `surname`, `username`, `user_type`, `mypassword`, `email`) VALUES
(1, 'luka', 'Bombek', 'kljukec', 'Admin', '12345678', 'luka@gmail.com'),
(2, 'Matevz', 'Berginc', 'Professor', 'Professor', 't', 't@gmail.com'),
(3, 'John', 'Smith', 'johnsmith12323232323', 'Student', 'password1', 'john@example.com'),
(4, 'Emma', 'Johnson', 'emmajohnson2', 'Student', 'password2', 'emma@example.com'),
(5, 'Michael', 'Brown', 'michaelbrown3', 'Student', 'password3', 'michael@example.com'),
(6, 'Olivia', 'Davis', 'oliviadavis4', 'Student', 'password4', 'olivia@example.com'),
(7, 'William', 'Wilson', 'williamwilson5', 'Student', 'password5', 'william@example.com'),
(8, 'Sophia', 'Lee', 'sophiale6', 'Student', 'password6', 'sophia@example.com'),
(9, 'James', 'Miller', 'jamesmiller7', 'Student', 'password7', 'james@example.com'),
(10, 'Charlotte', 'Harris', 'charlotteharris8', 'Student', 'password8', 'charlotte@example.com'),
(11, 'Benjamin', 'Moore', 'benjaminmoore9', 'Student', 'password9', 'benjamin@example.com'),
(12, 'Mia', 'Taylor', 'miataylor10', 'Student', 'password10', 'mia@example.com'),
(13, 'Liam', 'Anderson', 'liamanderson11', 'Student', 'password11', 'liam@example.com'),
(14, 'Ava', 'Clark', 'avaclark12', 'Student', 'password12', 'ava@example.com'),
(15, 'Noah', 'Turner', 'noahturner13', 'Student', 'password13', 'noah@example.com'),
(16, 'Isabella', 'Wright', 'isabellawright14', 'Student', 'password14', 'isabella@example.com'),
(17, 'James', 'Martin', 'jamesmartin15', 'Student', 'password15', 'james@example.com'),
(18, 'Sophia', 'Hill', 'sophiahill16', 'Student', 'password16', 'sophia@example.com'),
(19, 'Logan', 'Turner', 'loganturner17', 'Student', 'password17', 'logan@example.com'),
(20, 'Olivia', 'Garcia', 'oliviagarcia18', 'Student', 'password18', 'olivia@example.com'),
(21, 'Liam', 'Davis', 'liamdavis19', 'Student', 'password19', 'liam@example.com'),
(22, 'Mia', 'Robinson', 'miarobinson20', 'Student', 'password20', 'mia@example.com'),
(23, 'Ethan', 'Bennett', 'ethanbennett21', 'Student', 'password21', 'ethan@example.com'),
(24, 'Avery', 'Morgan', 'averymorgan22', 'Student', 'password22', 'avery@example.com'),
(25, 'Lucas', 'Gray', 'lucasgray23', 'Student', 'password23', 'lucas@example.com'),
(26, 'Sophia', 'Fisher', 'sophiafisher24', 'Student', 'password24', 'sophia@example.com'),
(27, 'Henry', 'Turner', 'henryturner25', 'Student', 'password25', 'henry@example.com'),
(28, 'Aria', 'Collins', 'ariacollins26', 'Student', 'password26', 'aria@example.com'),
(29, 'Mason', 'Hill', 'masonhill27', 'Student', 'password27', 'mason@example.com'),
(30, 'Scarlett', 'Reed', 'scarlettreed28', 'Student', 'password28', 'scarlett@example.com'),
(31, 'Liam', 'Brown', 'liambrown29', 'Student', 'password29', 'liam@example.com'),
(32, 'Abigail', 'Scott', 'abigailscott30', 'Student', 'password30', 'abigail@example.com'),
(33, 'Elijah', 'Cooper', 'elijahcooper31', 'Student', 'password31', 'elijah@example.com'),
(34, 'Sofia', 'Ward', 'sofiaward32', 'Student', 'password32', 'sofia@example.com'),
(35, 'Oliver', 'Foster', 'oliverfoster33', 'Student', 'password33', 'oliver@example.com'),
(36, 'Amelia', 'Peterson', 'ameliapeterson34', 'Student', 'password34', 'amelia@example.com'),
(37, 'Benjamin', 'Price', 'benjaminprice35', 'Student', 'password35', 'benjamin@example.com'),
(38, 'Lucy', 'Ward', 'lucyward36', 'Student', 'password36', 'lucy@example.com'),
(39, 'Alexander', 'Mitchell', 'alexandermitchell37', 'Student', 'password37', 'alexander@example.com'),
(40, 'Ava', 'Bell', 'avabell38', 'Student', 'password38', 'ava@example.com'),
(41, 'Henry', 'Reed', 'henryreed39', 'Student', 'password39', 'henry@example.com'),
(42, 'Harper', 'Parker', 'harperparker40', 'Student', 'password40', 'harper@example.com'),
(43, 'Luna', 'Collins', 'lunacollins41', 'Student', 'password41', 'luna@example.com'),
(44, 'Eli', 'Harrison', 'eliharrison42', 'Student', 'password42', 'eli@example.com'),
(45, 'Mason', 'Adams', 'masonadams43', 'Student', 'password43', 'mason@example.com'),
(46, 'Grace', 'Campbell', 'gracecampbell44', 'Student', 'password44', 'grace@example.com'),
(47, 'Oliver', 'Cole', 'olivercole45', 'Student', 'password45', 'oliver@example.com'),
(48, 'Chloe', 'Wright', 'chloewright46', 'Student', 'password46', 'chloe@example.com'),
(49, 'Ethan', 'Lewis', 'ethanlewis47', 'Student', 'password47', 'ethan@example.com'),
(50, 'Harper', 'Jenkins', 'harperjenkins48', 'Student', 'password48', 'harper@example.com'),
(51, 'Logan', 'Harrison', 'loganharrison49', 'Student', 'password49', 'logan@example.com'),
(52, 'Isabella', 'Diaz', 'isabelladiaz50', 'Student', 'password50', 'isabella@example.com'),
(53, 'Elijah', 'Stewart', 'elijahstewart51', 'Student', 'password51', 'elijah@example.com'),
(54, 'Ava', 'Reed', 'avareed52', 'Student', 'password52', 'ava@example.com'),
(55, 'Carter', 'Foster', 'carterfoster53', 'Student', 'password53', 'carter@example.com'),
(56, 'Sophia', 'Cooper', 'sophiacooper54', 'Student', 'password54', 'sophia@example.com'),
(57, 'Mason', 'Ramirez', 'masonramirez55', 'Student', 'password55', 'mason@example.com'),
(58, 'Lily', 'Bennett', 'lilybennett56', 'Student', 'password56', 'lily@example.com'),
(59, 'Liam', 'Adams', 'liamadams57', 'Student', 'password57', 'liam@example.com'),
(60, 'Grace', 'Hill', 'gracehill58', 'Student', 'password58', 'grace@example.com'),
(61, 'Noah', 'Robinson', 'noahrobinson59', 'Student', 'password59', 'noah@example.com'),
(62, 'Aria', 'Clark', 'ariaclark60', 'Student', 'password60', 'aria@example.com'),
(63, 'Aiden', 'Gonzalez', 'aidengonzalez61', 'Student', 'password61', 'aiden@example.com'),
(64, 'Aria', 'Mitchell', 'ariamitchell62', 'Student', 'password62', 'aria@example.com'),
(65, 'Oliver', 'Foster', 'oliverfoster63', 'Student', 'password63', 'oliver@example.com'),
(66, 'Sophia', 'Young', 'sophiayoung64', 'Student', 'password64', 'sophia@example.com'),
(67, 'Elijah', 'Harrison', 'elijahharrison65', 'Student', 'password65', 'elijah@example.com'),
(68, 'Ava', 'Jenkins', 'avajenkins66', 'Student', 'password66', 'ava@example.com'),
(69, 'Noah', 'Ward', 'noahward67', 'Student', 'password67', 'noah@example.com'),
(70, 'Isabella', 'Turner', 'isabellaturner68', 'Student', 'password68', 'isabella@example.com'),
(71, 'Henry', 'Scott', 'henryscott69', 'Student', 'password69', 'henry@example.com'),
(72, 'Chloe', 'Parker', 'chloeparker70', 'Student', 'password70', 'chloe@example.com'),
(73, 'Liam', 'Ramirez', 'liamramirez71', 'Student', 'password71', 'liam@example.com'),
(74, 'Sophia', 'Hill', 'sophiahill72', 'Student', 'password72', 'sophia@example.com'),
(75, 'Ethan', 'Cole', 'ethancole73', 'Student', 'password73', 'ethan@example.com'),
(76, 'Ava', 'Adams', 'avaadams74', 'Student', 'password74', 'ava@example.com'),
(77, 'Lucas', 'Robinson', 'lucasrobinson75', 'Student', 'password75', 'lucas@example.com'),
(78, 'Mia', 'Gonzalez', 'miagonzalez76', 'Student', 'password76', 'mia@example.com'),
(79, 'Elijah', 'Price', 'elijahprice77', 'Student', 'password77', 'elijah@example.com'),
(80, 'Charlotte', 'Moore', 'charlottemoore78', 'Student', 'password78', 'charlotte@example.com'),
(81, 'Aiden', 'Bennett', 'aidenbennett79', 'Student', 'password79', 'aiden@example.com'),
(82, 'Eli', 'Taylor', 'elitaylor80', 'Student', 'password80', 'eli@example.com'),
(83, 'Mason', 'Fisher', 'masonfisher81', 'Student', 'password81', 'mason@example.com'),
(84, 'Sophia', 'Harrison', 'sophiaharrison82', 'Student', 'password82', 'sophia@example.com'),
(85, 'Ethan', 'Garcia', 'ethangarcia83', 'Student', 'password83', 'ethan@example.com'),
(86, 'Liam', 'Lewis', 'liamlewis84', 'Student', 'password84', 'liam@example.com'),
(87, 'Aria', 'Robinson', 'ariarobinson85', 'Student', 'password85', 'aria@example.com'),
(88, 'Lucas', 'Foster', 'lucasfoster86', 'Student', 'password86', 'lucas@example.com'),
(89, 'Isabella', 'Turner', 'isabellaturner87', 'Student', 'password87', 'isabella@example.com'),
(90, 'Noah', 'Foster', 'noahfoster88', 'Student', 'password88', 'noah@example.com'),
(91, 'Ava', 'Mitchell', 'avamitchell89', 'Student', 'password89', 'ava@example.com'),
(92, 'Henry', 'Ward', 'henryward90', 'Student', 'password90', 'henry@example.com'),
(93, 'Chloe', 'Bell', 'chloebell91', 'Student', 'password91', 'chloe@example.com'),
(94, 'Eli', 'Hill', 'elihill92', 'Student', 'password92', 'eli@example.com'),
(95, 'Harper', 'Turner', 'harperturner93', 'Student', 'password93', 'harper@example.com'),
(96, 'Aria', 'Lewis', 'arialewis94', 'Student', 'password94', 'aria@example.com'),
(97, 'Mia', 'Harrison', 'miaharrison95', 'Student', 'password95', 'mia@example.com'),
(98, 'Liam', 'Garcia', 'liamgarcia96', 'Student', 'password96', 'liam@example.com'),
(99, 'Oliver', 'Scott', 'oliverscott97', 'Student', 'password97', 'oliver@example.com'),
(100, 'Sofia', 'Bell', 'sofiabell98', 'Student', 'password98', 'sofia@example.com'),
(101, 'Luna', 'Parker', 'lunaparker99', 'Student', 'password99', 'luna@example.com'),
(102, 'Ethan', 'Cooper', 'ethancooper100', 'Student', 'password100', 'ethan@example.com'),
(103, 'David', 'Smith', 'davidsmith1', 'Professor', 'password1', 'david@example.com'),
(104, 'Emily', 'Johnson', 'emilyjohnson2', 'Professor', 'password2', 'emily@example.com'),
(105, 'Daniel', 'Brown', 'danielbrown3', 'Professor', 'password3', 'daniel@example.com'),
(106, 'Olivia', 'Davis', 'oliviadavis4', 'Professor', 'password4', 'olivia@example.com'),
(107, 'William', 'Wilson', 'williamwilson5', 'Professor', 'password5', 'william@example.com'),
(108, 'James', 'Miller', 'jamesmiller7', 'Professor', 'password7', 'james@example.com'),
(109, 'Charlotte', 'Harris', 'charlotteharris8', 'Professor', 'password8', 'charlotte@example.com'),
(110, 'Benjamin', 'Moore', 'benjaminmoore9', 'Professor', 'password9', 'benjamin@example.com'),
(111, 'Mia', 'Taylor', 'miataylor10', 'Professor', 'password10', 'mia@example.com'),
(112, 'Liam', 'Anderson', 'liamanderson11', 'Professor', 'password11', 'liam@example.com'),
(113, 'Ava', 'Clark', 'avaclark12', 'Professor', 'password12', 'ava@example.com'),
(114, 'Noah', 'Turner', 'noahturner13', 'Professor', 'password13', 'noah@example.com'),
(115, 'Isabella', 'Wright', 'isabellawright14', 'Professor', 'password14', 'isabella@example.com'),
(116, 'James', 'Martin', 'jamesmartin15', 'Professor', 'password15', 'james@example.com'),
(117, 'Sophia', 'Hill', 'sophiahill16', 'Professor', 'password16', 'sophia@example.com'),
(118, 'Ethan', 'Adams', 'ethanadams17', 'Professor', 'password17', 'ethan@example.com'),
(119, 'Olivia', 'Thomas', 'oliviathomas18', 'Professor', 'password18', 'olivia@example.com'),
(120, 'William', 'Garcia', 'williamgarcia19', 'Professor', 'password19', 'william@example.com'),
(121, 'Charlotte', 'King', 'charlotteking20', 'Professor', 'password20', 'charlotte@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `material_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `id_subject`, `material_name`, `material_file`) VALUES
(1, 5, 'burek', '5_Matevž-Berginc-R3B.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `professors_subjects`
--

CREATE TABLE `professors_subjects` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professors_subjects`
--

INSERT INTO `professors_subjects` (`id`, `id_professor`, `id_subject`) VALUES
(2, 2, 5),
(3, 105, 1),
(4, 105, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_student`, `id_subject`) VALUES
(3, 3, 8),
(4, 4, 2),
(5, 5, 7),
(6, 6, 10),
(9, 7, 10),
(10, 8, 5),
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
(105, 103, 1),
(106, 7, 1),
(107, 7, 2),
(108, 7, 3),
(109, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_subject_a` (`id_subject`),
  ADD KEY `FK_student_a` (`id_student`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_subject_m` (`id_subject`);

--
-- Indexes for table `professors_subjects`
--
ALTER TABLE `professors_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`id_subject`),
  ADD KEY `professor` (`id_professor`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_student` (`id_student`),
  ADD KEY `FK_STUD_subject` (`id_subject`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professors_subjects`
--
ALTER TABLE `professors_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `FK_student_a` FOREIGN KEY (`id_student`) REFERENCES `login` (`id_login`),
  ADD CONSTRAINT `FK_subject_a` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `FK_subject_m` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`);

--
-- Constraints for table `professors_subjects`
--
ALTER TABLE `professors_subjects`
  ADD CONSTRAINT `professor` FOREIGN KEY (`id_professor`) REFERENCES `login` (`id_login`),
  ADD CONSTRAINT `subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_STUD_subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`),
  ADD CONSTRAINT `FK_student` FOREIGN KEY (`id_student`) REFERENCES `login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
