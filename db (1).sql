-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 04:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'shveta123'),
(2, 'admin', 'janvi123'),
(3, 'admin', 'yesha123'),
(4, 'admin', 'krisha123');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `vote` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `release_date` date NOT NULL,
  `director` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `shows` varchar(255) NOT NULL,
  `language` varchar(200) NOT NULL,
  `times` varchar(100) NOT NULL,
  `poster_path` varchar(255) NOT NULL,
  `large_poster_path` varchar(255) NOT NULL,
  `about` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `genre`, `vote`, `price`, `release_date`, `director`, `actors`, `shows`, `language`, `times`, `poster_path`, `large_poster_path`, `about`) VALUES
('101', 'Stree2 : Sarkate ka Atank', 'Comedy,Horror', '9/10 (208.5k) Votes', 180, '2024-08-25', 'Amar Kaushik', 'Shraddha Kapoor ,Rajkummar Rao', '2D', 'Hindi', '2h 29m', 'uploads/stree2_poster.jpg', 'uploads/stree2.jpg', 'After the events of Stree, the town of Chanderi is being haunted again. This time, women are mysteriously abducted by a terrifying headless entity. Once again, it`s up to Bicky and his friends to save their town and loved ones.'),
('102', 'Fakt Purusho Maate', 'Comedy , Drama , Fantasy', '8.9/10 (2.8K Votes)', 120, '2024-08-23', 'Jay Bodas', 'Yash Soni, Mitra Gadhvi , Esha Kansara ', '2D', 'Gujarati', '2h 15m', 'uploads/factpurushomate_poster.jpg', 'uploads/factpurushomate_largeposter.jpg', 'Fakt Purusho Maate is a Gujarati movie starring Yash Soni, Mitra Gadhvi, Esha Kansara and Darshan Jariwala in prominent roles.'),
('103', 'Deadpool & Wolverine', 'Action , Adventure , Comedy', ' 8.7/10 (143.7K Votes)', 150, '2024-07-26', 'Shawn Levy', 'Ryan Reynolds,Hugh Jackman ', '2D , 2D SCREEN X , 3D', 'English , Telugu , Hindi , Tamil', '3h 0m', 'uploads/deadpool_poster.jpg', 'uploads/deadpool_largeposter.jpg', 'Wolverine is recovering from his injuries when he meets the loudmouth, Deadpool. They team up to defeat a common enemy.'),
('104', 'Vedaa', 'Action , Adventure , Comedy', ' 8.7/10 (143.7K Votes)', 150, '2024-07-26', 'Shawn Levy', 'John Abraham,Wagh Sharvari,Abhishek Banerjee,Tamannaah Bhatia ', ' 2D', 'Hindi , Tamil , Telugu ', ' 2h 31m', 'uploads/vedaa_poster.jpg', 'uploads/vedaa_largeposter.jpg', 'It is the story of a young woman who fought back, steered, and championed by the one man she believed was her saviour, who became her weapon. It is the story of a man who found himself while helping Vedaa find justice.'),
('105', 'Jigra', ' Action , Drama , Thriller', '7.7/10 (51K Votes)', 250, '2024-10-11', 'Vasan Bala', 'Alia Bhatt ,Vedang Raina ', '2D , ICE', 'Hindi , Tamil ', '2h 35m', 'uploads/first.jpg', 'uploads/second.jpg', 'Jigra is the heart wrenching tale of a sister taking on the world to avenge her brother. Their odyssey of reunification tests their bond, their morals, and their inner strengths. Who wouldn`t set the world on fire to protect what`s theirs?');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `phonenumber`, `password`) VALUES
(8, 'vibhuti', 'vibhuti@123gmail.com', '1231293696', '$2y$10$FeFt6hbxKxRopYcaP/K4oO2BySAO39cpdE6xhvcQJX3NAzbp5.OYe'),
(7, 'jency', 'jenci@gmail.com', '4564565460', '$2y$10$itBFOmZEX32jrv9H7hFIne7S7eA4FFbUjxX94wBhLUg7eh4WJhIxW'),
(4, 'jenishaa', 'jenisha2@gmail.com', '7412589632', '$2y$10$T5Gf.toCGYfN.OD/5LW/X.QI1Ieu864Nt4DoJoTPZU2KQ15L9mUFG'),
(3, 'janvi', 'janvi@gmail.com', '7412589874', '$2y$10$lBwZbn/qDldZHuhkAxtyYOyW00ie8ouJlMHx93PVLRZvuIwWr.4Qa'),
(5, 'krisha', 'krisha@123gmail.com', '7456983213', '$2y$10$YkEYwzexd7Y98qeOZ.zgOOiNhZVz9FQiGotNbr8jSq/kLHX2RQGeS'),
(13, 'dhruvi', 'dhruvi@gmail.com', '7845127845', '$2y$10$Wm2Bs52nvb..eh2Bz3RkbePnmEKrRY54kLlc.2S4UNTsWate.NcMe'),
(6, 'yesha', 'yesha@gmail.com', '7987989784', '$2y$10$yk/CVLSn1VRmwyTEayRIO./1hrYGA/PVkOsSl2Ztdqc5.2mO2r9AK'),
(1, 'shveta', 'shvetajikadara13@gmail.com', '9632278600', '$2y$10$/1Kdva4ajec.MP6/Cjga0.1.gdlDxop.Au0cR32mBWpquTv9GukSi');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `no` int(11) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `m_id` varchar(500) NOT NULL,
  `m_name` varchar(500) NOT NULL,
  `seat_id` varchar(500) NOT NULL,
  `total_tickets` int(11) NOT NULL,
  `cinema` varchar(500) NOT NULL,
  `m_date` varchar(255) NOT NULL,
  `m_time` varchar(255) NOT NULL,
  `payment` varchar(11) NOT NULL,
  `ticketbooking_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`no`, `phone_no`, `m_id`, `m_name`, `seat_id`, `total_tickets`, `cinema`, `m_date`, `m_time`, `payment`, `ticketbooking_time`) VALUES
(1, '9632278600', '101', 'Stree2 : Sarkate ka Atank', 'D1, D2, D3, D4, D5, D6', 6, ' INOX: DR World, Surat', 'Wed, 28 Aug', '9:00 PM', '₹1080', '2024-08-28 21:00:01'),
(2, '9632278600', '104', 'Vedaa', 'A1, A2, A3', 3, ' INOX: DR World, Surat', 'Wed, 28 Aug', '9:00 PM', '₹330', '2024-08-28 20:52:34'),
(3, '1234658971', '104', 'Vedaa', 'C3, C4, C5, C6, C7, C8', 6, ' Raj Imperial, INOX: Varachha Road, Surat', 'Fri, 30 Aug', '9:30 PM', '₹660', '2024-08-28 21:18:09'),
(4, '9637891234', '102', 'Fakt Purusho Maate', 'A1, A2, A3, A4, A5, A6, A7, A8', 8, ' INOX: DR World, Surat', 'Thu, 29 Aug', '10:30 PM', '₹960', '2024-08-28 22:25:19'),
(5, '9632278600', '102', 'Fakt Purusho Maate', 'A5, A6, A7, A8, A9', 5, ' Cherish Cinemas: Katargam', 'Thu, 05 Sep', '7:30 PM', '₹600', '2024-09-05 19:24:42'),
(6, '7854127854', '102', 'Fakt Purusho Maate', 'F5, F6, G5, G6', 4, ' Raj Imperial, INOX: Varachha Road, Surat', 'Sat, 19 Oct', '6:30 PM', '₹480', '2024-10-19 18:26:19'),
(7, '7845127845', '105', 'Jigra', 'C7, C8, C9', 3, ' Raj Imperial, INOX: Varachha Road, Surat', 'Mon, 21 Oct', '10:30 PM', '₹750', '2024-10-19 19:28:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`phonenumber`),
  ADD UNIQUE KEY `1` (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD UNIQUE KEY `1` (`no`),
  ADD KEY `ftickets` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
