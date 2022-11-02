-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2022 г., 19:19
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_form`
--
CREATE DATABASE IF NOT EXISTS `db_form` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_form`;

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `theme` varchar(30) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`id`, `name`, `email`, `year`, `sex`, `theme`, `question`) VALUES
(1, 'ПРивет', 'google@goo.ru', 1983, 'female', 'привет', 'хочу сказать привет'),
(2, 'ПРивет', 'google@goo.ru', 1983, 'female', 'привет', 'хочу сказать привет'),
(3, 'ПРивет', 'google@goo.ru', 1983, 'female', 'привет', 'хочу сказать привет'),
(4, 'ПРивет', 'google@goo.ru', 1983, 'female', 'привет', 'хочу сказать привет'),
(5, 'ПРивет', 'google@goo.ru', 1983, 'female', 'привет', 'хочу сказать привет'),
(6, 'ПРивет', 'google@goo.ru', 1983, 'female', 'привет', 'хочу сказать привет'),
(7, 'ghbdtn', 'google@go.ru', 1985, 'female', 'ghbdnt', 'gdhh'),
(8, 'ghdbn', 'go@go.rt', 1984, 'female', 'dhdhe', 'agha'),
(9, 'dgsdg', 'g@f.rt', 1984, 'male', 'gdg', 'афпупврпв'),
(10, 'dgsdg', 'g@f.rt', 1984, 'male', 'fsdf', 'sfsf'),
(11, 'dgsdg', 'g@f.rt', 1984, 'male', 'fsdf', 'sfsf'),
(12, 'dgsdg', 'g@f.rt', 1984, 'male', 'fsdf', 'sfsf'),
(13, 'dgsdg', 'g@f.rt', 1984, 'male', 'fsdf', 'sfsf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
