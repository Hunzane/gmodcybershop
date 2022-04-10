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
(1, 'Что то не так', 1, 1),
(2, 'А мона еще?', 1, 1),
(3, 'Привет', 4, 1),
(4, 'Новый', 4, 1),
(5, 'Диалоги тета тет', 2, 1);

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

INSERT INTO `ticket_messages` (`id`, `ticket`, `author`, `message`, `date`) VALUES
(1, 1, 1, 'А нет, все ок. А может и так, а может и не так) А нет, все ок. А может и так, а может и не так)\r\nА нет, все ок. А может и так, а может и не так) А нет, все ок. А может и так, а может и не так)\r\nА нет, все ок. А может и так, а может и не так) А нет, все ок. А может и так, а может и не так)', '2022-03-16 01-54-59'),
(2, 2, 1, 'ХАЧУ АДДОН БИСПЛАТНА!!! ДАЙ ?', '2022-03-16 02-27-58'),
(3, 1, 1, 'Тест', '2022-03-16 03-27-14'),
(4, 1, 1, 'Ебать, эта хуета работает крч', '2022-03-16 03-27-34'),
(5, 1, 1, 'ой ой\nой ой 2\nой ой 3\nой ой 4', '2022-03-16 03-29-04'),
(6, 1, 1, 'ИГНОРИТ АДМИНИСТРАЦЯ', '2022-03-16 03-29-17'),
(7, 1, 1, '31\n321\n\n213\n21\n3\n\n3\n1\n3\n1\n\n31\n', '2022-03-16 03-31-45'),
(8, 1, 1, 'Пошел нахуй', '2022-03-16 04-03-23'),
(9, 1, 1, 'Блять', '2022-03-16 04-03-35'),
(10, 3, 4, 'Текст', '2022-03-16 04-10-38'),
(11, 3, 1, 'Хуета', '2022-03-16 04-16-27'),
(12, 3, 4, '1', '2022-03-16 04-31-19'),
(13, 3, 4, 'Та\nНу\nТа', '2022-03-16 04-40-39'),
(14, 4, 4, 'Новый', '2022-03-16 04-40-50'),
(15, 4, 1, 'Да', '2022-03-16 04-41-51'),
(16, 5, 2, 'ДИАЛОГИ ТЕТА ТЕТ ДО УТРА ЗАЖИЛИ ', '2022-03-16 15-20-23'),
(18, 5, 1, 'Хта', '2022-03-17 12-03-38'),
(19, 2, 1, '1', '2022-03-17 13-25-08'),
(20, 5, 2, 'что', '2022-03-20 13-00-37'),
(21, 2, 1, '1', '2022-03-21 18-08-31'),
(22, 5, 3, '', '2022-03-24 13-41-54');

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

INSERT INTO `users` (`id`, `steamid`, `login`, `avatar`, `url`, `description`, `balance`, `type`) VALUES
(1, '76561198841881649', 'DmitryGRC', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/4c/4c773c7f04e3e51890ab1098d91cff5dca06fa58_full.jpg', 'https://steamcommunity.com/id/grc_/', 'Совсем скоро, наступит утро, проснуться настоящие звери.\nВечно злые и угрюмые пойдут творить беспредел.\nНу а мы уходим в тень, в тень ночи...', '9649.9', 'admin'),
(2, '76561199158273986', 'Yasno Ne Ponial', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/76/76d8c3f944900665ebcc04ff05378587e61006f6_full.jpg', 'https://steamcommunity.com/profiles/76561199158273986/', 'Ок\n', '0', 'admin'),
(3, '76561198353179868', 'Huzane', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/e1/e14ebed961ea8107af7f523c5acfd12854cfd620_full.jpg', 'https://steamcommunity.com/id/HuzaneS/', 'Привет, меня зовут NsFW ...', '142', 'admin'),
(4, '76561199214378248', 'Dmitry GRC', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/32/32c954f642251dd998e3a72522e0907be5161eee_full.jpg', 'https://steamcommunity.com/profiles/76561199214378248/', 'Привет, меня зовут Dmitry GRC ...', '0', 'user');

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

INSERT INTO `views` (`id`, `product`, `ip`, `date`) VALUES
(121, 0, '195.181.166.141', '26.03.22');

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

INSERT INTO `withdraw` (`id`, `user`, `sum`, `wallet`, `number`, `date`, `status`) VALUES
(4, 1, '9.5', 'card', '228228228228', '2022-03-20 12-10-12', 2);

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
