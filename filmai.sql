-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Sau 23 d. 08:26
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies_data`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `filmai`
--

CREATE TABLE `filmai` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(45) DEFAULT NULL,
  `aprasymas` varchar(200) DEFAULT NULL,
  `metai` varchar(45) DEFAULT NULL,
  `rezisierius` varchar(45) DEFAULT NULL,
  `imdb` varchar(45) DEFAULT NULL,
  `zanrai_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `filmai`
--

INSERT INTO `filmai` (`id`, `pavadinimas`, `aprasymas`, `metai`, `rezisierius`, `imdb`, `zanrai_id`) VALUES
(1, 'Titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', '1997', 'James Cameron', '8.9', '1'),
(2, 'Gran Torino', 'Disgruntled Korean War veteran Walt Kowalski sets out to reform his neighbor, Thao Lor, a Hmong teenager who tried to steal Kowalski\'s prized possession: a 1972 Gran Torino.', '2008', 'Clint Eastwood', '8.1', '2'),
(3, 'Catch me if you can', 'Frank Abagnale Jr. who, before his 19th birthday, successfully forged millions of dollars\' worth of checks while posing as a Pan Am pilot, a doctor, and a legal prosecutor.', '2002', 'Steven Spielberg', '8.1', '3'),
(4, 'Titanikas', 'Filmas apie skÄ™stantÄ¯ laivÄ…', '1995', 'Joseph Mofrey', '8.2', NULL),
(5, 'Titanikas', 'Filmas apie skÄ™stantÄ¯ laivÄ…', '1969', 'Joseph Mofrey', '8.3', '2'),
(6, 'Valkata su Å¡autuvu', 'Keliaujantis valkata turi tik Å¡autuvÄ…', '1987', 'Bilas Kedys', '6.7', '3'),
(7, 'Ratas', 'Ratas keliaujantis laiku', '1960', 'Ratai2', '7', '2'),
(8, 'PaslapÄiÅ³ kambarys', 'Paslaptys slypi kambaryje', '2000', 'Haris Poteris', '6.5', '2'),
(9, 'Azkabano kalinys', 'PabÄ—ga kalinys', '2001', 'Haris Poters', '5.4', '2'),
(10, 'KalÄ—jimo bÄ—gliai', 'Brolis nuteisiamas mirties bausme, jaunesnysis brolis gelbÄ—ja jÄ¯ iÅ¡ kalÄ—jimo', '2004', 'Michael Scofield', '1', '3'),
(11, 'Geriau skambink Solui', 'Advokato gyvenimas', '2016', 'Sol Goodman', '8.4', '2'),
(12, '33', 'NepaÅ¾Ä¯stama aplinka', '1996', 'Dominic Percel', '6.7', '2'),
(14, 'PabÄ—gimas iÅ¡ Å¡auÅ¡enko', 'Du vyrai pabÄ—ga iÅ¡ kalÄ—jimo', '1988', 'David Mod', '9.4', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmai`
--
ALTER TABLE `filmai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmai`
--
ALTER TABLE `filmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
