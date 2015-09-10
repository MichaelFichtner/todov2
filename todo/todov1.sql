-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `todov1`;
CREATE TABLE `todov1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toto` varchar(250) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `todov1` (`id`, `toto`, `datum`) VALUES
(1,	'Einkaufen',	'2015-09-09'),
(2,	'Treffen mit Dennis',	'2015-09-17'),
(3,	'Vorstellungs Gespräch',	'2015-09-09'),
(13,	'test 123',	'2015-09-23');

-- 2015-09-10 16:53:20
