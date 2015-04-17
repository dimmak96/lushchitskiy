-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3310
-- Время создания: Апр 15 2015 г., 20:22
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lushchitskiy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `url` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `showhide`, `url`) VALUES
(1, 'Хлеб', 'show', 'index'),
(2, 'Молоко', 'show', 'about'),
(3, 'Колбаса', 'show', 'contacts'),
(4, 'Белый хлеб', 'show', 'vacations'),
(5, 'Мясо', 'show', 'main'),
(6, '123', 'show', '123'),
(7, '123', 'hide', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `lang` enum('ru','en') NOT NULL DEFAULT 'ru',
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `lang`, `showhide`, `putdate`) VALUES
(1, 'Добро пожаловать на сайт', 'Меня зовут Лущицкий Дмитрий.Родился в 1996 году', 'index', 'ru', 'show', '2015-03-10'),
(2, 'О компании', 'Компания была основана в 2006 году. Наша фирма более 7 лет занимается продажей продуктов.', 'about', 'ru', 'show', '2015-03-18'),
(3, 'Контакты', '+375299034891 - секретарь\r\n+375294546789 - зам.директора', 'contacts', 'ru', 'show', '2015-03-26'),
(4, 'Вакансии', 'Нам требуются на работу кассиры, продавцы, начальник отдела логистики, грузчики, кладовщики, начальники склада, мерчендайзеры, менеджеры по развитию', 'vacations', 'ru', 'show', '2015-03-12'),
(5, 'Главная', 'Здраствуйте вы попали на главную страницу нашего сайта.', 'main', 'ru', 'show', '2015-04-24');

-- --------------------------------------------------------

--
-- Структура таблицы `system_accounts`
--

CREATE TABLE IF NOT EXISTS `system_accounts` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `system_accounts`
--

INSERT INTO `system_accounts` (`id_account`, `name`, `pass`) VALUES
(26, 'test', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Структура таблицы `tovars`
--

CREATE TABLE IF NOT EXISTS `tovars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `picture` tinytext NOT NULL,
  `picturesmall` tinytext NOT NULL,
  `price` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `putdate` date NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `tovars`
--

INSERT INTO `tovars` (`id`, `name`, `body`, `picture`, `picturesmall`, `price`, `showhide`, `putdate`, `cat_id`) VALUES
(14, '12312', '<p>3123</p>\r\n', '15_04_10_08_47_Desert.jpg', 's_15_04_10_08_47_Desert.jpg', '123', 'show', '2015-04-10', 1),
(15, 'sdfsdfsdf', '<p>sdfsdfsdf</p>\r\n', '15_04_13_06_06_Lighthouse.jpg', 's_15_04_13_06_06_Lighthouse.jpg', '120000', 'hide', '2015-04-13', 1),
(16, 'qweqweqw', '<p>фывфывфыав</p>\r\n', '15_04_15_07_15_Penguins.jpg', 's_15_04_15_07_15_Penguins.jpg', '34000', 'show', '2015-04-15', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `blockunblock` enum('unblock','block') NOT NULL DEFAULT 'unblock',
  `datereg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `blockunblock`, `datereg`, `lastvisit`) VALUES
(1, 'dimmak', 'dimmak@gmail.com', 'dre', 'unblock', '2015-04-03', '2015-04-15 19:30:31'),
(2, 'qwe', 'qwe@gmail.com', '123', 'unblock', '2015-04-06', '2015-04-08 15:10:24'),
(3, 'rty', 'rty@mail.ru', '567', 'unblock', '2015-04-06', '2015-04-06 20:29:55'),
(4, 'zxc', 'zxc@mail.ru', 'ert', 'unblock', '2015-04-08', '2015-04-10 19:05:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
