-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 12 apr 2022 om 12:44
-- Serverversie: 10.3.27-MariaDB-cll-lve
-- PHP-versie: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` varchar(255) DEFAULT NULL,
  `customer_lastname` varchar(255) DEFAULT NULL,
  `customer_street` varchar(255) DEFAULT NULL,
  `customer_housenumber` varchar(5) NOT NULL,
  `customer_location` varchar(255) NOT NULL,
  `customer_zipcode` varchar(6) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_admin` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_street`, `customer_housenumber`, `customer_location`, `customer_zipcode`, `customer_email`, `customer_password`, `customer_admin`) VALUES
(4, 'Lenn', 'van Esveld', 'willem de zwijgerlaan', '7a', 'Maartensdijk', '3738DV', 'info@lennghc.nl', '$2y$10$2WGQRk1KQM27GfznoYMSJ.m/IlvW2mLjapDFBocrEZqHV4a2qW6AO', 1),
(5, 'Anouk', '', '', '', '', '', 'a.muller.anouk@gmail.com', '$2y$10$USiweGzOT9WZNVn4cOENgeS9Vpy8n9YyBBu9jgxr0Y3ILtPihusuG', 1),
(32, 'ROC', '', '', '', '', '', 'roc@gmail.com', '$2y$10$QxV4u8y05hYd3gmI048vWewp6QTc5njZrqyieoqliGErI603OotXK', 1),
(33, 'Amos', 'de Vis', 'sesamstraat', '100', 'Sprookjes bos', '1234NL', 'amosadmin@gmail.com', '$2y$10$t0oL/U4uxtpWiWL/nDz0KOXIV2dJmmVmpwzLwbuk.SiBaDpuS5.aW', 1),
(34, 'stan', NULL, NULL, '', '', NULL, 'stan@gmail.com', '$2y$10$FmFL56UxfFdE/AnO1l9p0.ZIoQLqEXjL5blDJ8Otjq3vD7opr5g7S', 0),
(36, NULL, NULL, NULL, '', '', NULL, 'anouk@gmail.com', '$2y$10$qWETUODqnw/nP21LQxLhnuc5HNEC1fUQkstYFL/GTbr4soAi01m7i', 0),
(37, '', '', '', '', '', '', 'robbie@robbie.nl', '$2y$10$cYdMZrumZKpgbEnpnuBmkuKC3HTPQlnsJxJyh759A6ZNHjZe7w8km', 0),
(38, NULL, NULL, NULL, '', '', NULL, 'tygo@gmail.com', '$2y$10$wlTrnj19GK5bIq2bwyVsFuUeUdHFqWnYp1edqBgLwHOUyK/oer5aO', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_price` decimal(10,0) DEFAULT NULL,
  `order_details` varchar(100) DEFAULT NULL,
  `order_mail_status` varchar(40) DEFAULT NULL,
  `order_shipment_destination` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_categorie` varchar(40) DEFAULT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `product_price` varchar(50) DEFAULT NULL,
  `product_details` varchar(500) DEFAULT NULL,
  `product_thumbnail` varchar(500) DEFAULT NULL,
  `product_title` varchar(40) DEFAULT NULL,
  `product_description` varchar(500) DEFAULT NULL,
  `product_best_seller` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_categorie`, `product_name`, `product_price`, `product_details`, `product_thumbnail`, `product_title`, `product_description`, `product_best_seller`) VALUES
(2, 'Horror', 'outlast', '5757.69', 'spook go boo', '', 'OutLast', '<p>Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus.</p>\r\n<p>&nbsp;</p>\r\n<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Proin eget tortor risus.</p', 1),
(4, 'Race', 'F1 2021', '29.99', 'max sim ', '', 'Formula One 2021', '<p>Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit. Curabitur aliquet quam id dui posuere blandit.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>', 0),
(5, 'Race', 'huts', '12.98', 'SUPER COLLE DIKKE GAMES MAN', 'vanguard.jpg', 'huts', '<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada.</p>\r\n<p>&nbsp;</p>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, ', 1),
(6, 'Race', 'F! 2023', '10.10', 'vbr', '', 'bert', '<p>Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus.</p>\r\n<p>&nbsp;</p>\r\n<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Proin eget tortor risus.</p', 0),
(7, 'Race', 'huts', '12.98', 'huts', '', 'huts', '<p>Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus.</p>\r\n<p>&nbsp;</p>\r\n<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Proin eget tortor risus.</p', 0),
(8, 'Race', 'huts', '12.98', 'huts', '', 'huts', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(9, 'Race', 'huts', '12.98', 'huts', '', 'huts', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(10, 'co-op', 'A Way Out', '10', 'egwh', '', 'A Way Out', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(12, 'FPS', 'GTA 3', '41.59', 'auto game', '', 'GTA III', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(13, 'Openworld', 'GTA 3', '41.59', 'auto game', '', 'GTA III', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(14, 'FPS', 'GTA 3', '41.59', 'auto game', '', 'GTA III', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(15, 'FPS', 'GTA 3', '41.59', 'auto game', '', 'GTA III', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 1),
(16, 'FPS', 'GTA', '0', 'aaa', '', 'GTA VI', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(17, 'FPS', 'GTA', '0', 'aaa', '', 'GTA VI', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(19, 'FPS', 'GTA', '0', 'aaaaaaaaaaaa', '', 'GTA III', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 1),
(20, 'FPS', 'Call of Duty', '50.00', 'Call of Duty modern warfare!', '21e5e83a7ffa6da634d2c2acb27ebd7d.', 'Call of Duty', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(21, '', 'Aardbei', '013', '13', '97da1dc551e1bdb278fd20d9a48479ca.', 'JE MOEDER', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(22, '', 'GTA V', '29.99', 'Vroem', '364f7162fd8874f4401454bcda2ca8e1.', 'Gta V', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(23, 'Horror', 'Among US', '5.99', 'sus', 'aa0646724cbedaaafb345427d448b8b7.', 'among us', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(24, 'openworld', 'Legends of zelda', '35.99', 'link', '4fbdd6149d6c92c961d92ae3f2168557.', 'legends of zelda', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(25, 'FPS', 'Call of duty World at war', '59.99', 'piew', 'b61311c9466a83a9e60a11bf0f51647a.', 'Call of duty world at war', '<p>Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n<p>&nbsp;</p>\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>', 0),
(26, 'openworld', 'Outlast', '50', '<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>\r\n<p>&nbsp;</p>\r\n<p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Ve', '9c9375e4365c9ec562acb96c3deff9e3.', 'among us', '<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>\r\n<p>&nbsp;</p>\r\n<p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Ve', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `categorie_id` int(11) NOT NULL,
  `categorie_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product_categories`
--

INSERT INTO `product_categories` (`categorie_id`, `categorie_name`) VALUES
(2, 'Race'),
(3, 'Horror'),
(4, 'FPS'),
(6, 'co-op'),
(7, 'Simulatie'),
(8, 'Adventure');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexen voor tabel `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexen voor tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
