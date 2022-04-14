-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2022 at 12:23 AM
-- Server version: 5.7.35-0ubuntu0.18.04.2
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earth`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `sha1_password` varchar(40) DEFAULT NULL,
  `e_wallet` int(11) DEFAULT NULL,
  `spotify_bill` int(11) DEFAULT NULL,
  `discord_nitro_bill` int(11) DEFAULT NULL,
  `ph_premium_bill` int(11) DEFAULT NULL,
  `netflix_bill` int(11) DEFAULT NULL,
  `yt_premium_bill` int(11) DEFAULT NULL,
  `profile_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `first_name`, `last_name`, `email`, `sha1_password`, `e_wallet`, `spotify_bill`, `discord_nitro_bill`, `ph_premium_bill`, `netflix_bill`, `yt_premium_bill`, `profile_pic`) VALUES
(1, 'Clark', 'Testerson', 'clark', 'a9993e364706816aba3e25717850c26c9cd0d89d', 0, 0, 0, 0, 1, 1, 'https://i1.wp.com/9tailedkitsune.com/wp-content/uploads/2020/12/letsycakes_mikasa.jpeg?ssl=1'),
(2, 'Heda', 'Doe', 'heda', 'a9993e364706816aba3e25717850c26c9cd0d89d', 1000, -1, 500, -1, 1, 1, 'https://i.pinimg.com/originals/04/28/2e/04282e49895b2287ccd3d4bdb7d334b9.png'),
(3, 'Rhandy', 'Martinez', 'rhandy', 'a9993e364706816aba3e25717850c26c9cd0d89d', 1598, 0, 0, 0, 0, 0, 'https://i.pinimg.com/originals/9c/4a/22/9c4a228a30e0be34ed9fdbb7a4e43143.jpg'),
(4, 'Roldam', 'Martinez', 'abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 0, 0, 0, 0, 1, 1, 'https://i.pinimg.com/564x/6c/3f/e4/6c3fe4350219e3eb665fc5a5ad95cc65.jpg'),
(5, 'Ronie', 'Martinez', 'asd', 'a9993e364706816aba3e25717850c26c9cd0d89d', 500, -1, -1, -1, 1, 1, 'https://i.pinimg.com/564x/68/b0/f1/68b0f156020a20c7ff9cc3b0dd4390c9.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;