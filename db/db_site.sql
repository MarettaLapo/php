-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2022 г., 09:05
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
-- База данных: `db_site`
--
CREATE DATABASE IF NOT EXISTS `db_site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_site`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Рубашки', 'Категория с рубашками'),
(2, 'Штаны', 'Категория со штанами'),
(3, 'Рубашки Nat', 'Категория с рубашками Nat'),
(4, 'Рубашки Non', 'Категория с рубашками Non'),
(5, 'Штаны Trous', 'Категория со штанами Trous'),
(6, 'Штаны neTrous', 'Категория со штанами neTrous');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `alt` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `alt`, `path`) VALUES
(1, 'картинка 1', 'image-1.jpg'),
(2, 'картинка 2', 'image-2.jpg'),
(3, 'картинка 3', 'image-3.jpg'),
(4, 'картинка 4', 'image-4.jpg'),
(5, 'картинка 5', 'image-5.jpg'),
(6, 'картинка 6', 'image-6.jpg'),
(7, 'картинка 7', 'image-7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price_now` decimal(10,2) DEFAULT NULL,
  `price_full` decimal(10,2) DEFAULT NULL,
  `price_promocode` decimal(10,2) DEFAULT NULL,
  `is_avaible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price_now`, `price_full`, `price_promocode`, `is_avaible`) VALUES
(1, 'Рубашка Nat', 'Серая рубашка', '1200.00', '1699.99', '1000.00', 1),
(2, 'Рубашка Nat', 'Черная рубашка', '1200.00', '1699.99', '1000.00', 1),
(3, 'Рубашка Nat', 'Красно-черная рубашка', '1200.00', '1699.99', '1000.00', 1),
(4, 'Рубашка Nat', 'Красная рубашка', '1200.00', '1699.99', '1000.00', 1),
(5, 'Рубашка Nat', 'Желтая рубашка', '1200.00', '1699.99', '1000.00', 1),
(6, 'Рубашка Nat', 'Синяя рубашка', '1200.00', '1699.99', '1000.00', 1),
(7, 'Рубашка Nat', 'Голубая рубашка', '1200.00', '1699.99', '1000.00', 1),
(8, 'Рубашка Nat', 'Розовая рубашка', '1200.00', '1699.99', '1000.00', 1),
(9, 'Рубашка Nat', 'Разноцветная рубашка', '1200.00', '1699.99', '1000.00', 1),
(10, 'Рубашка Nat', 'Зеленая рубашка', '1200.00', '1699.99', '1000.00', 1),
(11, 'Рубашка Nat', 'Рубашка в клетку', '1200.00', '1699.99', '1000.00', 1),
(12, 'Рубашка Nat', 'Рубашка в полоску', '1200.00', '1699.99', '1000.00', 1),
(13, 'Рубашка Nat', 'Рубашка в вертикальную полоску', '1200.00', '1699.99', '1000.00', 0),
(14, 'Рубашка Non', 'Красная рубашка', '1200.00', '1699.99', '1000.00', 1),
(15, 'Штаны neTrous', 'Черные штаны', '2200.00', '2699.99', '2000.00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`) VALUES
(3, 1, 1),
(5, 2, 3),
(7, 3, 3),
(9, 4, 3),
(11, 5, 3),
(13, 6, 3),
(15, 7, 3),
(17, 8, 3),
(19, 9, 3),
(21, 10, 3),
(23, 11, 3),
(25, 12, 3),
(27, 13, 3),
(29, 14, 4),
(31, 14, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `product_category_main`
--

CREATE TABLE `product_category_main` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_category_main`
--

INSERT INTO `product_category_main` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_id`) VALUES
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 5),
(7, 3, 4),
(8, 3, 1),
(9, 4, 2),
(11, 4, 3),
(12, 5, 3),
(13, 5, 6),
(14, 5, 2),
(15, 6, 1),
(16, 6, 2),
(18, 7, 5),
(19, 7, 3),
(20, 8, 1),
(22, 8, 3),
(23, 9, 6),
(24, 9, 2),
(26, 10, 1),
(27, 11, 1),
(28, 11, 2),
(29, 11, 3),
(30, 12, 5),
(31, 12, 4),
(32, 12, 3),
(33, 13, 3),
(34, 13, 4),
(35, 13, 6),
(36, 14, 1),
(38, 14, 3),
(39, 15, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `product_image_main`
--

CREATE TABLE `product_image_main` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_image_main`
--

INSERT INTO `product_image_main` (`id`, `product_id`, `image_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 1),
(8, 8, 2),
(9, 9, 3),
(10, 10, 4),
(11, 11, 5),
(12, 12, 6),
(13, 13, 1),
(14, 14, 2),
(15, 15, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_category_main`
--
ALTER TABLE `product_category_main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `product_image_main`
--
ALTER TABLE `product_image_main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `product_category_main`
--
ALTER TABLE `product_category_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `product_image_main`
--
ALTER TABLE `product_image_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_category_main`
--
ALTER TABLE `product_category_main`
  ADD CONSTRAINT `product_category_main_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_category_main_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_image_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_image_main`
--
ALTER TABLE `product_image_main`
  ADD CONSTRAINT `product_image_main_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_image_main_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
