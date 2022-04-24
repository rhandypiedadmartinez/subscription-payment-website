CREATE TABLE `billing_history` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `customer_id` INT DEFAULT NULL,
  `customer_name` varchar(64) DEFAULT NULL,
  `subscription_paid` varchar(64) DEFAULT NULL, 
  `amount_paid` INT DEFAULT NULL,
  `payment_timestamp` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `persons` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
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
  `profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `persons` (`id`, `first_name`, `last_name`, `email`, `sha1_password`, `e_wallet`, `spotify_bill`, `discord_nitro_bill`, `ph_premium_bill`, `netflix_bill`, `yt_premium_bill`, `profile_pic`) VALUES
(1, 'Clark', 'Testerson', 'clark', 'a9993e364706816aba3e25717850c26c9cd0d89d', 990, 909, 990, 199, -1, -1, 'https://i1.wp.com/9tailedkitsune.com/wp-content/uploads/2020/12/letsycakes_mikasa.jpeg?ssl=1'),
(2, 'Heda', 'Doe', 'heda', 'a9993e364706816aba3e25717850c26c9cd0d89d', 1000, -1, 500, -1, 19, 19, 'https://i.pinimg.com/originals/04/28/2e/04282e49895b2287ccd3d4bdb7d334b9.png'),
(3, 'Rhandy', 'Martinez', 'rhandy', 'a9993e364706816aba3e25717850c26c9cd0d89d', 1598, 10, 10, 10, 110, -1, 'https://i.pinimg.com/originals/9c/4a/22/9c4a228a30e0be34ed9fdbb7a4e43143.jpg'),
(4, 'Roldam', 'Martinez', 'abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 20,90, 990, 10, 19, 199, 'https://i.pinimg.com/564x/6c/3f/e4/6c3fe4350219e3eb665fc5a5ad95cc65.jpg'),
(5, 'Ronie', 'Martinez', 'asd', 'a9993e364706816aba3e25717850c26c9cd0d89d', 500, -1, -1, -1, 919, -1, 'https://i.pinimg.com/564x/68/b0/f1/68b0f156020a20c7ff9cc3b0dd4390c9.jpg');


CREATE TABLE `biller_list` (
  `billerID` int(11) NOT NULL,
  `biller_bill_name` text NOT NULL,
  `biller_name` text NOT NULL,
  `ref` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `biller_list` (`billerID`, `biller_bill_name`, `biller_name`, `ref`) VALUES
(0, 'spotify_bill', 'Spotify', 'https://www.freepnglogos.com/uploads/spotify-logo-png/spotify-download-logo-30.png'),
(1, 'discord_nitro_bill', 'Discord', 'https://www.freepnglogos.com/uploads/discord-logo-png/discord-logo-logodownload-download-logotipos-1.png'),
(2, 'ph_premium_bill', 'PhilHealth', 'https://www.philhealth.gov.ph/news/2019/images/phic_logov.jpg'),
(3, 'netflix_bill', 'Netflix', 'https://www.freepnglogos.com/uploads/netflix-logo-circle-png-5.png'),
(4, 'yt_premium_bill', 'Youtube', 'https://assets.turbologo.com/blog/en/2019/10/19084944/youtube-logo-illustration.jpg');