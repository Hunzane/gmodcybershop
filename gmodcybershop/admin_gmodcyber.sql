-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 26 2022 г., 12:03
-- Версия сервера: 10.1.44-MariaDB-0+deb9u1
-- Версия PHP: 7.0.33-0+deb9u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `admin_gmodcyber`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `ava` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `name`, `url`, `ava`) VALUES
(11, 'Мастерская Создателя', 'https://vk.com/gmodluamc', '11.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `price` int(11) NOT NULL,
  `file` text NOT NULL,
  `author` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_updates`
--

CREATE TABLE `products_updates` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `price` int(11) NOT NULL,
  `file` text NOT NULL,
  `author` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sells`
--

CREATE TABLE `sells` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `au` int(11) NOT NULL,
  `price` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `parameter` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`parameter`, `data`) VALUES
('comission', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `theme` text NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `theme`, `author`, `status`) VALUES

-- --------------------------------------------------------

--
-- Структура таблицы `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ticket_messages`
--

-- --------------------------------------------------------

--
-- Структура таблицы `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `price` int(11) NOT NULL,
  `file` text NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `steamid` text NOT NULL,
  `login` text NOT NULL,
  `avatar` text NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `balance` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `ip` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `views`
--

-- --------------------------------------------------------

--
-- Структура таблицы `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `sum` text NOT NULL,
  `wallet` text NOT NULL,
  `number` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `withdraw`
--

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_updates`
--
ALTER TABLE `products_updates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT для таблицы `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
