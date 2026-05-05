-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 30 2026 г., 09:03
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
  `id_basket` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `item_count` int(11) DEFAULT NULL
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
(8, 4, 28, 2);

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
(1, 'shoes'),
(3, 'humans'),
(4, 'ramz');

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
(2, 'Football Shoes', 9999, 'Football Shoes.svg', 'крутые', 'Доступен', 1),
(3, '13', 123, 'basketball_sport_icon_in_minimalist_3d_render_2 1.png', '123', 'Доступен', 1),
(4, 'ffewfwefewf', 12312, 'e987ef42a259de0c46db18715cc2c93c27dcfb3e.png', '13213', 'Доступен', 1),
(5, 'fdefff', 46547, 'beautiful-young-african-woman-sports-clothing-running-against-gray-background 1.png', 'jyfkjf', 'Доступен', 1),
(6, 'vvdvd', 46543, 'Group 7.png', 'cvdvdvdv', 'Доступен', 1),
(7, '222', 1233, 'jeans.png', '1eeded', 'Не доступен', 3),
(8, '1986', 1986, 'sportsman-drinking-water-training-stationary-bike 1 (1).png', 'sdasd', 'Доступен', 3),
(9, '3er', 333, 'cyclist-leads-actionfront-view-man-riding-bicycle-racing-road 1.png', 'ewr', 'Доступен', 3),
(11, '234234', 444, 'red-ping-pong-racket-sports-equipment 1.png', 'dffd', 'Доступен', 4),
(12, '9999', 9999, 'portrait-young-man-with-athlete-body-wears-casual-grey-clothes 2.png', '9999', 'Доступен', 3),
(13, '666', 666, 'Group 345.png', '666', 'Доступен', 4),
(14, '555', 555, 'Group 329.png', '555', 'Доступен', 4),
(15, '213rr', 1, 'Amazon_logo_PNG3 1.png', 'trthrthr', 'Доступен', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `adress` text COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) DEFAULT NULL,
  `data_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `arrival_data` date DEFAULT NULL,
  `pay_method` enum('СБП','По карте') COLLATE utf8mb4_bin NOT NULL DEFAULT 'СБП',
  `status` enum('Новый','Подтвержден','Отменен','Получен') COLLATE utf8mb4_bin NOT NULL DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`id_order`, `id_user`, `adress`, `price`, `data_order`, `arrival_data`, `pay_method`, `status`) VALUES
(14, 28, 'уксивт', 151945, '2026-04-30 02:47:37', '1233-03-12', 'По карте', 'Новый'),
(15, 28, 'ыфвыфв', 14998, '2026-04-30 03:32:48', '5555-05-05', 'СБП', 'Новый');

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
(5, 4, 14, 1),
(6, 5, 14, 1),
(7, 6, 14, 2),
(8, 1, 15, 1),
(9, 2, 15, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL,
  `password_user` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `status_user` enum('Активен','Удален') COLLATE utf8mb4_bin DEFAULT 'Активен',
  `name` varchar(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `patronymic` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id_user`, `password_user`, `email`, `phone`, `status_user`, `name`, `surname`, `patronymic`) VALUES
(21, 'ramz@ramz', 'ramz@ramz', 'каукуку', 'Активен', 'Рамз', 'Рамз', 'Рамз'),
(22, '3@2', '', '8979878', 'Активен', 'Рамз', 'Рамз', 'Рамз'),
(23, '123', '123@123', '123', 'Активен', '123', '123', '123'),
(24, '', 'we@we', '123', 'Активен', '654', 'i', 'o;op;'),
(25, '', 'se@rr', '123', 'Активен', '654', 'i', 'o;op;'),
(26, 'we', 'we@w', 'we', 'Активен', 'we', 'we', 'we'),
(27, '3@2', 'dw@w', '8979878', 'Активен', 'Рамз', 'Рамз', 'Рамз'),
(28, 'qwe', 'ramazanikbaev6@gmail.com', NULL, 'Активен', NULL, NULL, NULL);

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
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Item`
--
ALTER TABLE `Item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `Order_Item`
--
ALTER TABLE `Order_Item`
  MODIFY `id_Order_Item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
