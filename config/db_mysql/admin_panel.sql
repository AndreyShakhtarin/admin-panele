-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 26 2016 г., 03:15
-- Версия сервера: 5.6.31-0ubuntu0.14.04.2
-- Версия PHP: 5.6.24-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `admin_panel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_panel`
--

CREATE TABLE IF NOT EXISTS `admin_panel` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `date_birthday` int(6) NOT NULL,
  `gender` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `login`, `password`, `name`, `surname`, `date_birthday`, `gender`) VALUES
(1, 'admin', 'password', 'Admin', 'Password', 0, 'male'),
(3, 'John', 'Newman', 'John', 'Newman', 0, 'male'),
(4, 'Elizabet', 'Powerfull', 'Elizabet', 'Powerfull', 0, 'male'),
(5, 'root', '123123', 'Den', 'Freedom', 0, 'male'),
(6, 'root1', 're', 'Frank', 'Rich', 0, 'male'),
(7, 'root2', 'Powerfull', 'John', 'Powerfull', 0, 'male'),
(8, 'root3', 'P', 'POWER', 'Powerfull', 0, 'male'),
(10, 'ploot', 'P', 'HHHH', 'HHHH', 0, 'male'),
(11, 'JDFKGJ', 'SDFNLDSSD', 'FSD', 'SDF', 0, 'male'),
(12, 'DSFSD', 'DSFSD', 'SDFDF', 'DSFSD', 0, 'male'),
(13, 'FFDFSS', 'DFSD', 'Mike', 'Owen', 733125600, 'male'),
(15, 'SFSF', 'SDFSD', 'SDF', 'DSFS', 0, 'male'),
(16, 'DDDSDF', 'SDFSDF', 'SDFSDFS', 'SDFSDF', 0, 'male'),
(17, 'werwr', 'ewrwer', 'werwer', 'rwerw', 0, 'male'),
(18, 'sdfsd', 'dsf', 'dsfsdf', 'sdfdf', 0, 'male'),
(19, 'retrt', 'rtret', 'ert', 'rete', 0, 'male'),
(20, 'fjjlkfgjfgjgjgf', 'klfsnlfnklfnklfsnkl', 'kfkfsknklnlkfd', 'fnlfsdlnlnf', 0, 'male'),
(21, 'dssdf', 'sdfdf', 'sdf', 'sdf', 0, 'male'),
(22, 'Felix', 'Hyugo', 'Felix', 'Felix', 1422641000, 'male'),
(23, 'Aida', 'Voltson', 'Aida', 'Voltson', 0, 'female'),
(24, 'Polina', 'Polina', 'Polina', 'Polina', 1455040800, 'male'),
(25, 'Irina', 'Rodionovna', 'Irina', 'Irina', 1465322400, 'female'),
(26, 'Frenk', '234234', 'Frenk', 'MacFunny', 764488800, 'male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
