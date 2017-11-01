-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2017 г., 22:49
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `block_category`
--

CREATE TABLE `block_category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `block_category`
--

INSERT INTO `block_category` (`id_category`, `name_category`) VALUES
(1, 'clother'),
(2, 'orgteh'),
(3, 'show_car'),
(4, 'washing');

-- --------------------------------------------------------

--
-- Структура таблицы `block_name`
--

CREATE TABLE `block_name` (
  `id` int(11) NOT NULL,
  `block_title` varchar(100) NOT NULL,
  `block_content` varchar(100) NOT NULL,
  `id_category` int(11) NOT NULL,
  `login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `block_name`
--

INSERT INTO `block_name` (`id`, `block_title`, `block_content`, `id_category`, `login`) VALUES
(1, 'cvcs', ' svsdvvsd', 2, 'Ovso'),
(2, 'asdcsdsd', '55555', 1, 'Ovso');

-- --------------------------------------------------------

--
-- Структура таблицы `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(50) CHARACTER SET utf32 NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registered_users`
--

INSERT INTO `registered_users` (`id`, `login`, `email`, `password`) VALUES
(8, 'Ovso', 'ovsyankinds@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `gender`, `create_date`, `phone`) VALUES
(3, 'Ovso', 'ovsyankinds@gmail.com', '12345', 'Male', '2017-03-21', '12345555'),
(4, 'Ovso', 'ovsyankinds@gmail.com', '12345', 'Male', '2017-03-21', '123455555'),
(5, 'ovsyankinds@gmail.com', 'ovsyankinds@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', '2017-04-01', 'aff');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `block_category`
--
ALTER TABLE `block_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `block_name`
--
ALTER TABLE `block_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `block_category`
--
ALTER TABLE `block_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `block_name`
--
ALTER TABLE `block_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
