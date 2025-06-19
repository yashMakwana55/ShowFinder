-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 08:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemagnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_movie`
--

CREATE TABLE `add_movie` (
  `id` int(25) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `directer` varchar(100) NOT NULL,
  `release_date` varchar(100) NOT NULL,
  `categroy` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `you_tube_link` varchar(250) NOT NULL,
  `show` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `decription` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_movie`
--

INSERT INTO `add_movie` (`id`, `movie_name`, `directer`, `release_date`, `categroy`, `language`, `you_tube_link`, `show`, `action`, `decription`, `image`, `status`) VALUES
(1, 'A Salesman', 'Miller', '1948', 'Drama', 'English', '', '21:00', 'running', '\"Death of a Salesman\" is a poignant exploration of the American Dream\'s disillusionment, portraying the tragic life of Willy Loman as he grapples with identity, success, and the harsh realities of a changing society.', 'dos.png', 1),
(2, 'Hamlet', 'Shakespeare', '1609', 'Tragedy', 'English', '', '15:00', 'upcoming', 'One of William Shakespeare\'s most famous tragedies, Hamlet follows the young Prince of Denmark as he seeks revenge against his uncle, who has murdered Hamlet\'s father and taken the throne.', 'hamlet.jpg', 1),

(3, 'A Night\'s Dream', 'Shakespeare', '1595', 'Comedy', 'English', '', '18:00', 'running', 'A whimsical comedy by William Shakespeare, A Midsummer Night\'s Dream weaves together the stories of lovers, fairies, and a group of amateur actors in a magical forest.', 'midnight.jpg', 1),

(4, 'Romeo and Juliet', 'Shakespeare', '1597', 'Tragedy', 'English', '', '18:15', 'running', 'The timeless tale of forbidden love, Romeo and Juliet, penned by William Shakespeare, tells the story of two young star-crossed lovers from feuding families.', 'romeo.jpg', 1),

(5, 'Macbeth', 'Shakespeare', '1606', 'Tragedy', 'English', '', '15:15', 'upcoming', 'Macbeth, another tragic masterpiece by William Shakespeare, delves into the corrupting influence of unchecked ambition as Macbeth and Lady Macbeth plot and commit regicide.', 'macbeth.png', 1),

(6, 'Being Earnest', 'Oscar Wilde', '1895', 'Comedy', 'English', '', '21:15', 'running', 'Oscar Wilde\'s satirical comedy explores the societal conventions of marriage and social status, featuring mistaken identities and humorous situations.', 'earnest.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `movie` varchar(100) NOT NULL,
  `show_time` varchar(100) NOT NULL,
  `seat` varchar(100) NOT NULL,
  `totalseat` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` varchar(25) NOT NULL,
  `ex_date` varchar(100) NOT NULL,
  `cvv` int(5) NOT NULL,
  `custemer_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `uid`, `movie`, `show_time`, `seat`, `totalseat`, `price`, `payment_date`, `booking_date`, `card_name`, `card_number`, `ex_date`, `cvv`, `custemer_id`) VALUES
(1, 1, 'Chaal Jeevi Laiye', '15:00', 'G1,G2,D1,D2', '4', '500', 'Wed-09-21 ', 'Thu-09-21 ', 'pratik d', '7896', '2021-09-30', 789, 1869901767),
(2, 1, 'Tanaji', '15:15', 'F7,F8,E7,E8,A7,A8', '6', '1200', 'Thu-09-21 ', 'Fri-09-21 ', 'pratik d', '145260', '2021-09-30', 349, 1890244096),
(3, 2, 'Chaal Jeevi Laiye', '15:00', 'I5,I6,H5,H6,G5,G6', '6', '600', 'Thu-09-21 ', 'Fri-09-21 ', 'parthiv', '45456845565', '2021-10-23', 455, 560041981),
(4, 3, 'Chaal Jeevi Laiye', '15:00', 'I7,I8', '2', '200', 'Thu-09-21 ', 'Fri-10-21 ', 'rushabh', '545656', '2021-09-29', 545, 447698228),
(5, 3, 'Chaal Jeevi Laiye', '18:15', 'G9', '1', '100', 'Thu-09-21 ', 'Fri-10-21 ', 'rushabh', '565464', '2021-09-10', 655, 2080652377),
(6, 1, 'Avengers', '21:00', 'I10', '1', '100', 'Thu-12-23 ', 'Fri-12-23 ', 'Vraj', '123', '2023-12-06', 123, 1929499100),
(7, 1, 'Avengers', '21:00', 'I10', '1', '100', 'Thu-12-23 ', 'Fri-12-23 ', '123', '1', '0001-01-01', 1, 373048572),
(8, 1, 'Avengers', '21:00', 'I10', '1', '100', 'Thu-12-23 ', 'Fri-12-23 ', '123', '123', '0001-01-01', 123, 993059063),
(9, 1, 'Avengers', '21:00', 'G9', '1', '100', 'Thu-12-23 ', 'Fri-12-23 ', '1', '1', '0001-01-01', 1, 2119421580),
(10, 1, 'Avengers', '21:00', 'F10', '1', '150', 'Thu-12-23 ', 'Fri-12-23 ', '1', '1', '0001-01-11', 1, 1097331418),
(11, 1, 'Avengers', '21:00', 'H9', '1', '100', 'Thu-12-23 ', 'Fri-12-23 ', '1', '1', '0001-01-01', 1, 2001905734),
(12, 1, 'Avengers', '21:00', 'I9,H9', '2', '200', 'Sat-12-23 ', 'Sun-12-23 ', '1', '1', '0001-01-01', 1, 636120264),
(13, 1, '1', '15:00', 'H10', '1', '100', 'Fri-01-24 ', 'Sat-01-24 ', '1', '1', '0001-01-01', 1, 1484545020);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `massage` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `massage`) VALUES
(1, 'pratik', 'prati@gmail.com', 'Inox Theatre is widely use now days.'),
(2, 'parth', 'part@gmail.com', 'You can easily book your Tickets anywhere in city .'),
(3, 'vrushti', 'vrusht@gmail.com', 'you easily choose your sheets.'),
(4, 'yash', 'yas@gmail.com', 'Also customer service is vary good.'),
(5, 'Vraj', 'v@gmail.com', 'Overall a great experience.');

-- --------------------------------------------------------

--
-- Table structure for table `theater_show`
--

CREATE TABLE `theater_show` (
  `id` int(25) NOT NULL,
  `show` varchar(100) NOT NULL,
  `theater` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theater_show`
--

INSERT INTO `theater_show` (`id`, `show`, `theater`) VALUES
(1, '21:00', '1'),
(2, '15:00', '1'),
(3, '18:00', '1'),
(4, '18:15', '2'),
(5, '15:15', '2'),
(6, '21:15', '2'),
(8, '22:00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task`) VALUES
(1, 'Update shows.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `mobile`, `city`, `password`, `image`) VALUES
(1, 'pratik', 'prati@gmail.com', 2147483647, 'Surendranagar', '4550', 'the-batman-2022.jpg'),
(2, 'parthiv', 'parthi@gmail.com', 2147483647, 'WADHWAN', '78963', 'IMG_6440.JPG'),
(3, 'rushabh', 'rushab@gmail.com', 1198875215, 'joravarnagar', '147852', 'MeAni.jpg'),
(5, 'dharmin', 'dharm@gmail.com', 2147483647, 'surat', 'hitesh', 'eye candy wallpapers 6 by deadpxl.jpg'),
(7, 'vraj', 'v@gmail.com', 2147483647, 'Rajkot', 'vraj123', 'Screenshot 2023-12-25 170123-2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_movie`
--
ALTER TABLE `add_movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater_show`
--
ALTER TABLE `theater_show`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_movie`
--
ALTER TABLE `add_movie`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `theater_show`
--
ALTER TABLE `theater_show`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
