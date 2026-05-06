-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 06 2026 г., 14:17
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ClothingStore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Addresses`
--

CREATE TABLE `Addresses` (
  `id_address` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `Basket`
--

CREATE TABLE `Basket` (
  `id_basket` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `item_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE `Categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`id_category`, `name_category`) VALUES
(1, 'Обувь'),
(3, 'Шапки'),
(4, 'Одежда');

-- --------------------------------------------------------

--
-- Структура таблицы `Item`
--

CREATE TABLE `Item` (
  `id_item` int(11) NOT NULL,
  `name_item` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `price_item` int(11) DEFAULT NULL,
  `img_item` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `description_item` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `status_item` enum('Доступен','Не доступен') COLLATE utf8mb4_bin DEFAULT 'Доступен',
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Item`
--

INSERT INTO `Item` (`id_item`, `name_item`, `price_item`, `img_item`, `description_item`, `status_item`, `id_category`) VALUES
(1, 'Air Force 1 Ultra Flyknit', 4999, 'Air Force 1 Ultra Flyknit.svg', 'ну очень крутые кросы', 'Доступен', 1),
(2, 'Football Shoes', 9999, 'Air Force 1 Ultra Flyknit.svg', 'крутые', 'Доступен', 4),
(3, '135', 123, 'Air Force 1 Ultra Flyknit.svg', '123', 'Доступен', 1),
(4, 'ffewfwefewf', 12312, 'Air Force 1 Ultra Flyknit.svg', '13213', 'Доступен', 1),
(14, '555', 555, 'Air Force 1 Ultra Flyknit.svg', '555', 'Доступен', 4),
(15, '213rr', 1, 'Air Force 1 Ultra Flyknit.svg', 'trthrthr', 'Доступен', 4),
(16, 'Football Shoes', 2999, 'img.png', 'крутые', 'Доступен', 1),
(17, 'Football Shoes', 2999, 'img.png', 'крутые', 'Доступен', 1),
(18, 'Football Shoes', 2999, 'img.png', 'крутые', 'Доступен', 1),
(19, 'Football Shoes', 2999, 'img.png', 'крутые', 'Доступен', 1),
(20, 'Football Shoes', 2999, 'img.png', 'крутые', 'Доступен', 1),
(21, 'ramz', 1999, 'img (12).png', '123', 'Доступен', 1),
(22, '1231', 999, 'img (10).png', 'крутые', 'Доступен', 1),
(23, 'ramz', 999, 'img (12).png', 'крутые', 'Не доступен', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) DEFAULT NULL,
  `data_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `arrival_data` date DEFAULT NULL,
  `pay_method` enum('СБП','По карте') COLLATE utf8mb4_bin NOT NULL DEFAULT 'СБП',
  `status` enum('В обработке','Подтвержден','Отменен','Получен') COLLATE utf8mb4_bin NOT NULL DEFAULT 'В обработке'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`id_order`, `id_user`, `address`, `price`, `data_order`, `arrival_data`, `pay_method`, `status`) VALUES
(16, 30, 'Уксивт', 15000, '2026-05-06 10:51:41', '2222-02-22', 'СБП', 'В обработке'),
(18, 30, 'Рамзу', 24993, '2026-05-06 11:13:01', '2026-05-07', 'СБП', 'В обработке');

-- --------------------------------------------------------

--
-- Структура таблицы `Order_Item`
--

CREATE TABLE `Order_Item` (
  `id_Order_Item` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Order_Item`
--

INSERT INTO `Order_Item` (`id_Order_Item`, `id_item`, `id_order`, `count`) VALUES
(10, 1, 16, 3),
(11, 15, 16, 3),
(13, 1, 18, 3),
(14, 21, 18, 2),
(15, 20, 18, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL,
  `password_user` text COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `status_user` enum('Активен','Удален') COLLATE utf8mb4_bin DEFAULT 'Активен',
  `name` varchar(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `patronymic` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_bin NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id_user`, `password_user`, `email`, `phone`, `status_user`, `name`, `surname`, `patronymic`, `role`) VALUES
(29, '$2y$10$zENjl59jda5PGGDPfxz/EuDvLu249zi/U2a2ewDprMs0SSTDh.LSC', 'admin@admin.admin', NULL, 'Активен', NULL, NULL, NULL, 'admin'),
(30, '$2y$10$BEMOqcq44GvBmjCG/7Iq1egYB4dEGH6sOnw.qSCxx2x8mz0JwoqKu', 'ramazanikbaev6@gmail.com', NULL, 'Активен', NULL, NULL, NULL, 'user'),
(31, '$2y$10$wxFUuEoW8swMskkud0wlsOhjQPzMgFvKDoRcEJ2sLiJDjHWneAzRm', 'r@r', NULL, 'Активен', NULL, NULL, NULL, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `User_favorites`
--

CREATE TABLE `User_favorites` (
  `id_favorite` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Addresses`
--
ALTER TABLE `Addresses`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `addresses_ibfk_1` (`id_user`);

--
-- Индексы таблицы `Basket`
--
ALTER TABLE `Basket`
  ADD PRIMARY KEY (`id_basket`),
  ADD KEY `basket_ibfk_1` (`id_item`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `item_ibfk_1` (`id_category`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `orders_ibfk_1` (`id_user`);

--
-- Индексы таблицы `Order_Item`
--
ALTER TABLE `Order_Item`
  ADD PRIMARY KEY (`id_Order_Item`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_item` (`id_item`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `User_favorites`
--
ALTER TABLE `User_favorites`
  ADD PRIMARY KEY (`id_favorite`),
  ADD KEY `user_favorites_ibfk_2` (`id_user`),
  ADD KEY `user_favorites_ibfk_1` (`id_item`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Addresses`
--
ALTER TABLE `Addresses`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Basket`
--
ALTER TABLE `Basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `Item`
--
ALTER TABLE `Item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `Order_Item`
--
ALTER TABLE `Order_Item`
  MODIFY `id_Order_Item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `User_favorites`
--
ALTER TABLE `User_favorites`
  MODIFY `id_favorite` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Addresses`
--
ALTER TABLE `Addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Basket`
--
ALTER TABLE `Basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `Item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `Categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Order_Item`
--
ALTER TABLE `Order_Item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `Orders` (`id_order`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `Item` (`id_item`);

--
-- Ограничения внешнего ключа таблицы `User_favorites`
--
ALTER TABLE `User_favorites`
  ADD CONSTRAINT `user_favorites_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `Item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_favorites_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
