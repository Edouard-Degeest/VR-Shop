-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id`, `name`) VALUES
(5,	'Casque VR'),
(6,	'Autre');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `shipping` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `final_price` float NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`, `weight`, `shipping`, `tva`, `final_price`, `stock`) VALUES
(40,	'Casque Sony',	'Casque pour playstation 4',	420,	'Casque VR',	'300',	30,	20,	540,	10),
(41,	'HTC VIVE',	'Casque HTC',	140,	'Casque VR',	'300',	30,	20,	204,	20),
(42,	'Cable USB Apple',	'Cable pour Iphone',	10,	'Autre',	'300',	30,	20,	48,	10),
(43,	'Cable USB Apple',	'Cable pour Iphone',	10,	'Autre',	'300',	30,	20,	48,	10),
(44,	'Cable USB Apple',	'Cable pour Iphone',	10,	'Autre',	'300',	30,	20,	48,	10),
(45,	'Cable USB Apple',	'Cable pour Iphone',	10,	'Autre',	'300',	30,	20,	48,	10);

DROP TABLE IF EXISTS `weights`;
CREATE TABLE `weights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `weights` (`id`, `name`, `price`) VALUES
(1,	'300',	30),
(2,	'20009',	10);

-- 2020-12-19 01:02:26
