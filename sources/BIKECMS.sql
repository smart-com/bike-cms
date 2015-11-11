-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 11 2015 г., 21:06
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
-- Структура таблицы `ArtAuth`
--

CREATE TABLE IF NOT EXISTS `ArtAuth` (
  `ID_Article` int(10) NOT NULL COMMENT 'Связь со статьей',
  `ID_Author` int(10) NOT NULL COMMENT 'Связь с автором',
  KEY `Art` (`ID_Article`),
  KEY `Author` (`ID_Author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ArtAuth`
--

INSERT INTO `ArtAuth` (`ID_Article`, `ID_Author`) VALUES
(1, 1),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `ArtCat`
--

CREATE TABLE IF NOT EXISTS `ArtCat` (
  `ID_Article` int(10) NOT NULL COMMENT 'Связь со статьей',
  `ID_Category` int(10) NOT NULL COMMENT 'Связь с категорией',
  KEY `Art` (`ID_Article`),
  KEY `ID_Category` (`ID_Category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ArtCat`
--

INSERT INTO `ArtCat` (`ID_Article`, `ID_Category`) VALUES
(1, 2),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Articles`
--

CREATE TABLE IF NOT EXISTS `Articles` (
  `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Первичный ключ',
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
-- Структура таблицы `Authors`
--

CREATE TABLE IF NOT EXISTS `Authors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Первичный ключ',
  `Name` varchar(50) NOT NULL COMMENT 'Имя автора',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `Authors`
--

INSERT INTO `Authors` (`ID`, `Name`) VALUES
(1, 'Автор 1'),
(2, 'Автор 2'),
(3, 'Автор 3');

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Первичный идентификатор',
  `Name` varchar(20) COMMENT 'Название категории',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`ID`, `Name`) VALUES
(1, 'Languages'),
(2, 'CMS'),
(3, 'Frameworks');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ArtAuth`
--
ALTER TABLE `ArtAuth`
  ADD CONSTRAINT `Article` FOREIGN KEY (`ID_Article`) REFERENCES `Articles` (`ID`),
  ADD CONSTRAINT `Author` FOREIGN KEY (`ID_Author`) REFERENCES `Authors` (`ID`);

--
-- Ограничения внешнего ключа таблицы `ArtCat`
--
ALTER TABLE `ArtCat`
  ADD CONSTRAINT `Art` FOREIGN KEY (`ID_Article`) REFERENCES `Articles` (`ID`),
  ADD CONSTRAINT `artcat_ibfk_1` FOREIGN KEY (`ID_Category`) REFERENCES `Category` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
