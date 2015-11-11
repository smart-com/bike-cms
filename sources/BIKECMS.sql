-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2015 г., 18:04
-- Версия сервера: 5.5.45
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `BIKECMS`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Articles`
--

CREATE TABLE IF NOT EXISTS `Articles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Первичный ключ',
  `Name` varchar(255) NOT NULL COMMENT 'Название статьи',
  `Content` mediumtext NOT NULL COMMENT 'Содержимое статьи',
  `PubDate` date NOT NULL COMMENT 'Дата публикации',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `Articles`
--

INSERT INTO `Articles` (`ID`, `Name`, `Content`, `PubDate`) VALUES
(1, 'WordPress', 'Классная статья про WordPress. Бла-бла-бла...', '2009-02-15'),
(2, 'PHP - это круто', 'PHP - это супер крутой язык программирования. Бла...', '2012-03-12'),
(3, 'Java Script - это тоже круто', 'Все равно его не брошу, потому что он хороший', '2015-05-08');

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Первичный идентификатор',
  `Name` varchar(20) DEFAULT NULL COMMENT 'Название категории',
  `ID_Article` int(11) DEFAULT NULL COMMENT 'ID статьи',
  PRIMARY KEY (`ID`),
  KEY `Article` (`ID_Article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`ID`, `Name`, `ID_Article`) VALUES
(1, 'Languages', 2),
(2, 'CMS', 1),
(3, 'Languages', 3),
(4, 'Frameworks', NULL);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Category`
--
ALTER TABLE `Category`
  ADD CONSTRAINT `Article` FOREIGN KEY (`ID_Article`) REFERENCES `Articles` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
