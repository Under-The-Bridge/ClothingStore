-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 19 2026 г., 20:11
-- Версия сервера: 8.0.30
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
  `id_address` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Addresses`
--

INSERT INTO `Addresses` (`id_address`, `id_user`, `address`) VALUES
(1, 28, 'уксивт'),
(2, 28, 'ыфвыфв');

-- --------------------------------------------------------

--
-- Структура таблицы `Basket`
--

CREATE TABLE `Basket` (
  `id_basket` int NOT NULL,
  `id_item` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `item_count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Basket`
--

INSERT INTO `Basket` (`id_basket`, `id_item`, `id_user`, `item_count`) VALUES
(2, 1, 21, 10),
(3, 2, 21, 11),
(4, 3, 21, 16),
(5, 6, 21, 18),
(6, 1, 23, 15),
(7, 1, 28, 2),
(8, 4, 28, 2),
(27, 3, 31, 1),
(28, 2, 31, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE `Categories` (
  `id_category` int NOT NULL,
  `name_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('Активен','Удален') COLLATE utf8mb4_bin NOT NULL DEFAULT 'Активен'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`id_category`, `name_category`, `status`) VALUES
(1, 'Обувь', 'Активен'),
(3, 'Одежда', 'Активен'),
(4, 'Шапки', 'Активен');

-- --------------------------------------------------------

--
-- Структура таблицы `Item`
--

CREATE TABLE `Item` (
  `id_item` int NOT NULL,
  `name_item` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `price_item` int DEFAULT NULL,
  `img_item` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `description_item` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status_item` enum('Доступен','Не доступен') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'Доступен',
  `id_category` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Item`
--

INSERT INTO `Item` (`id_item`, `name_item`, `price_item`, `img_item`, `description_item`, `status_item`, `id_category`) VALUES
(1, 'Air Force 1 Ultra Flyknit', 4999, 'Air Force 1 Ultra Flyknit.svg', 'ну очень крутые кросы', 'Доступен', 1),
(2, 'Football Shoes', 9999, 'Air Force 1 Ultra Flyknit.svg', 'крутые', 'Доступен', 1),
(3, '13', 123, 'Air Force 1 Ultra Flyknit.svg', '123', 'Доступен', 1),
(4, 'ffewfwefewf', 12312, 'Air Force 1 Ultra Flyknit.svg', '13213', 'Доступен', 1),
(5, 'fdefff', 46547, 'Air Force 1 Ultra Flyknit.svg', 'jyfkjf', 'Доступен', 1),
(6, 'vvdvd', 46543, 'Air Force 1 Ultra Flyknit.svg', 'cvdvdvdv', 'Доступен', 1),
(7, '222', 1233, 'Air Force 1 Ultra Flyknit.svg', '1eeded', 'Не доступен', 3),
(8, '1986', 1986, 'Air Force 1 Ultra Flyknit.svg', 'sdasd', 'Доступен', 3),
(9, '3er', 333, 'Air Force 1 Ultra Flyknit.svg', 'ewr', 'Доступен', 3),
(11, '234234', 444, 'Air Force 1 Ultra Flyknit.svg', 'dffd', 'Доступен', 4),
(12, '9999', 9999, 'Air Force 1 Ultra Flyknit.svg', '9999', 'Доступен', 3),
(13, '666', 666, 'Air Force 1 Ultra Flyknit.svg', '666', 'Доступен', 4),
(14, '555', 555, 'Air Force 1 Ultra Flyknit.svg', '555', 'Доступен', 4),
(15, '213rr', 1, 'Air Force 1 Ultra Flyknit.svg', 'trthrthr', 'Доступен', 4),
(16, 'air nike', 1234, 'airforce.png', 'w', 'Доступен', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `id_order` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `price` int DEFAULT NULL,
  `data_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `arrival_data` date DEFAULT NULL,
  `pay_method` enum('СБП','По карте') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'СБП',
  `status` enum('В обработке','Подтвержден','Отменен','Получен') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'В обработке'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`id_order`, `id_user`, `address`, `price`, `data_order`, `arrival_data`, `pay_method`, `status`) VALUES
(16, 31, '', 95001, '2026-05-05 18:49:45', '1111-11-11', 'СБП', 'В обработке'),
(17, 31, 'sdsds', 4999, '2026-05-05 18:50:50', '1111-02-11', 'По карте', 'Подтвержден'),
(21, 32, 'sdsds', 2468, '2026-05-19 16:51:18', '2026-05-22', 'СБП', 'В обработке');

-- --------------------------------------------------------

--
-- Структура таблицы `Order_Item`
--

CREATE TABLE `Order_Item` (
  `id_Order_Item` int NOT NULL,
  `id_item` int NOT NULL,
  `id_order` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Order_Item`
--

INSERT INTO `Order_Item` (`id_Order_Item`, `id_item`, `id_order`, `count`) VALUES
(10, 1, 16, 3),
(11, 2, 16, 2),
(12, 3, 16, 3),
(13, 4, 16, 1),
(14, 5, 16, 1),
(15, 11, 16, 1),
(16, 15, 16, 1),
(17, 9, 16, 1),
(18, 1, 17, 1),
(19, 16, 21, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id_user` int NOT NULL,
  `password_user` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status_user` enum('Активен','Удален','Заблокирован') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'Активен',
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `patronymic` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_bin NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id_user`, `password_user`, `email`, `phone`, `status_user`, `name`, `surname`, `patronymic`, `role`) VALUES
(21, 'ramz@ramz', 'ramz@ramz', 'каукуку', 'Активен', 'Рамз', 'Рамз', 'Рамз', 'user'),
(23, '123', '123@123', '123', 'Активен', '123', '123', '123', 'user'),
(26, 'we', 'we@w', 'we', 'Активен', 'we', 'we', 'we', 'user'),
(27, '3@2', 'dw@w', '8979878', 'Активен', 'Рамз', 'Рамз', 'Рамз', 'user'),
(28, '$2y$10$E4Ht2lTVCqecLlyKSWBHTuTHxkLJipwwL0KOf1I5tcM4j/Zp7tO82', 'ramazanikbaev6@gmail.com', '', 'Активен', '', '', '', 'user'),
(29, '$2y$10$3K4DODp.zx5aDPoPLJiwJ.t6hQsf9j6QMZ0Ve9YzZKnePm9pAjDby', 'r@r', NULL, 'Активен', NULL, NULL, NULL, 'user'),
(31, '$2y$10$KeGd3.jZqQemiNeB4zyRxeup8DdAYD50tMCfBGftr/1CQqHiq.GWq', 'admin@admin.admin', NULL, 'Активен', NULL, NULL, NULL, 'admin'),
(32, '$2y$10$/W5ALxKVswNgU9f9wCJQu.KQScE5k96gd/nwv2jVb0uqc5LEthRae', 'q@q', NULL, 'Активен', NULL, NULL, NULL, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `User_favorites`
--

CREATE TABLE `User_favorites` (
  `id_favorite` int NOT NULL,
  `id_item` int DEFAULT NULL,
  `id_user` int DEFAULT NULL
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
  MODIFY `id_address` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Basket`
--
ALTER TABLE `Basket`
  MODIFY `id_basket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Item`
--
ALTER TABLE `Item`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `Order_Item`
--
ALTER TABLE `Order_Item`
  MODIFY `id_Order_Item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `User_favorites`
--
ALTER TABLE `User_favorites`
  MODIFY `id_favorite` int NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `Orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
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
