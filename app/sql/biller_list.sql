-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2022 at 05:21 PM
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
-- Table structure for table `biller_list`
--

CREATE TABLE `biller_list` (
  `billerID` int(11) NOT NULL,
  `biller_bill_name` text NOT NULL,
  `biller_name` text NOT NULL,
  `ref` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biller_list`
--

INSERT INTO `biller_list` (`billerID`, `biller_bill_name`, `biller_name`, `ref`) VALUES
(0, 'spotify_bill', 'Spotify', 'https://www.freepnglogos.com/uploads/spotify-logo-png/spotify-download-logo-30.png'),
(1, 'discord_nitro_bill', 'Discord', 'https://www.freepnglogos.com/uploads/discord-logo-png/discord-logo-logodownload-download-logotipos-1.png'),
(2, 'ph_premium_bill', 'PhilHealth', 'https://www.philhealth.gov.ph/news/2019/images/phic_logov.jpg'),
(3, 'netflix_bill', 'Netflix', 'https://www.freepnglogos.com/uploads/netflix-logo-circle-png-5.png'),
(4, 'yt_premium_bill', 'Youtube', 'https://assets.turbologo.com/blog/en/2019/10/19084944/youtube-logo-illustration.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
