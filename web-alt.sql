-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2020 г., 18:56
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web-alt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `img`, `created_at`, `last_edit`) VALUES
(9, 5, 'Array_merge()', 'Функция array_merge() сливает элементы двух или большего количества массивов таким образом, что значения одного массива присоединяются к значениям предыдущего. Результатом работы функции является новый массив.', '/images/2fec392304a5c23ac138da22847f9b7c.png', '2020-10-02 00:25:20', '2020-10-02 01:07:16'),
(10, 5, 'setcookie', 'setcookie() задает cookie, которое будет передано клиенту вместе с другими HTTP-заголовками. Как и любой другой заголовок, cookie должны передаваться до того как будут выведены какие-либо другие данные скрипта (это ограничение протокола). Это значит, что в скрипте вызовы этой функции должны располагаться до остального вывода, включая вывод тегов <html> и <head>, а также пустые строки и пробельные символы.', '/images/Working-with-Cookies-in-PHP.jpg', '2020-10-02 00:38:10', '2020-10-02 01:07:16'),
(11, 5, 'Как научиться программировать', 'С чего мне начать?\r\nЕсли вы хотите научиться кодить, для начала полезно правильно понимать, зачем вам это нужно. В этом видео на YouTube Кевин Чирс отлично объяснил, как нужно подходить к изучению программирования.\r\n\r\nДалее, не забывайте, что не существует универсального способа научиться кодить — все люди учатся немного по-разному, и, возможно, вам придётся поэкспериментировать, чтобы найти тот вариант, который лучше сработает именно для вас.', '/images/content_hero-internship-header.png', '2020-10-02 01:28:54', '2020-10-01 18:36:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'hash1', '', '2020-09-30 21:37:23'),
(2, 'user', 'user@gmail.com', 'user', 'hash2', '', '2020-09-30 21:37:24'),
(5, 'pavel', 'pasha@mail.ru', 'user', '$2y$10$zj53zcxoGTrMLSXmEJw/rOmtypmopbXj/YCsTIPIccRg3lMgrJfny', '67c84ee86424fd9dc4ea1f49c5c074bc11cd78b67f3c5d181547970fe80b7f911ae1e346b82d507e', '2020-10-01 22:01:32'),
(6, 'stepan', 'stepan@mail.ru', 'user', '$2y$10$NuOWzOCnUYoj0XqZsM4RXOHNsb5cJxzSrGEi53rWUYf0XaW/EO6EG', 'f7986ab18fa63ba140d9b304af220286848ee2ccb65763c0dfed6cebdbbe4c94e18a217d52a7de21', '2020-10-01 23:35:16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
