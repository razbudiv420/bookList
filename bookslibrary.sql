-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2019 г., 00:16
-- Версия сервера: 5.5.62-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookslibrary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `library`
--

CREATE TABLE `library` (
  `id` int(2) NOT NULL,
  `bookName` varchar(40) NOT NULL,
  `authorName` varchar(100) NOT NULL,
  `writeDate` int(4) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `pages` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`id`, `bookName`, `authorName`, `writeDate`, `genre`, `pages`) VALUES
(2, 'Мастер и Маргарита', 'Булгаков', 1923, 'Роман', 200),
(3, 'Евгений Онегин', 'А. С. Пушкин', 1725, 'Повесть', 250),
(4, 'Преступление и наказание', 'Ф. М. Достоевский', 1886, 'Роман', 1021),
(5, 'Маленький Принц', 'А. Д. Экзюпери', 1943, 'Филосовская сказка', 200),
(6, '1984', 'Оруэл', 1948, 'Антиутопия', 285),
(7, 'Сто лет одиночества', 'Гарсия Маркес', 1967, 'Магический реализм', 584),
(8, 'Мертвые Души', 'Н. В. Гоголь', 1842, 'Поэма', 300),
(9, 'Идиот', 'Ф. М. Достоевский', 1868, 'Роман', 250),
(10, 'PHP 7 в подлиннике', 'Котеров, Симдянов', 2016, 'Веб- программирование', 1071),
(15, 'Государь', 'Макиавелли', 1532, 'Трактат', 600),
(47, 'тень ветра', 'Карлос Сафон Руис', 1965, 'приключения', 554),
(48, '', '', 0, '', 0),
(49, '', '', 0, '', 0),
(50, '', '', 0, '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `library`
--
ALTER TABLE `library`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
