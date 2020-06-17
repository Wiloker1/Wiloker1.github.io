-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2020 г., 16:04
-- Версия сервера: 5.6.47
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `device_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `ID` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`ID`, `country_name`) VALUES
(21, 'USA'),
(22, 'Китай'),
(51, 'Корея'),
(44, 'Россия'),
(6, 'Япония');

-- --------------------------------------------------------

--
-- Структура таблицы `kategory`
--

CREATE TABLE `kategory` (
  `ID` int(10) UNSIGNED NOT NULL,
  `kategory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kategory`
--

INSERT INTO `kategory` (`ID`, `kategory_name`) VALUES
(63, 'Мониторы'),
(23, 'Ноутбуки'),
(21, 'Развлечение'),
(7, 'Смартфоны'),
(64, 'Умные устройства');

-- --------------------------------------------------------

--
-- Структура таблицы `proizvoditel`
--

CREATE TABLE `proizvoditel` (
  `ID` int(10) UNSIGNED NOT NULL,
  `proizvod_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `proizvoditel`
--

INSERT INTO `proizvoditel` (`ID`, `proizvod_name`) VALUES
(98, 'Apple'),
(73, 'ASUS'),
(20, 'Google'),
(97, 'Microsoft'),
(46, 'Nintendo'),
(38, 'SONY'),
(45, 'Sumsung'),
(36, 'Xiaomi');

-- --------------------------------------------------------

--
-- Структура таблицы `proto`
--

CREATE TABLE `proto` (
  `ID` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `text` text NOT NULL,
  `kategory_name` varchar(255) NOT NULL,
  `proizvod_name` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `cena` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `proto`
--

INSERT INTO `proto` (`ID`, `name`, `photo`, `text`, `kategory_name`, `proizvod_name`, `country_name`, `cena`) VALUES
(1, 'ASUS MB16AC', 'monic.png', 'тип матрицы экрана: IPS;<br>разрешение 1920x1080 (16:9);<br>контрастность 800:1;<br>подключение: USB (видео), USB Type-C<br>', 'Мониторы', 'ASUS', 'Корея', 268),
(2, 'Xbox one X', 'xbox.png', 'стационарная<br>объем жесткого диска 1024 Гб<br>поддержка виртуальной реальности<br>поддержка UHD-разрешения и 3D-режима<br>беспроводной контроллер в комплекте<br>Bluetooth, Wi-Fi (802.11ac), LAN<br>воспроизведение видео<br>8 Гб<br>разъемы: HDMI, USB x3, оптический аудиовыход', 'Развлечение', 'Microsoft', 'USA', 350),
(3, 'MI MIX 3', 'MI_MIX_3.png', 'смартфон с Android 9.0<br>поддержка двух SIM-карт<br>экран 6.39\", разрешение 2340x1080<br>двойная камера 12 МП/12 МП, автофокус<br>память 128 ГБ, без слота для карт памяти<br>3G, 4G LTE, Wi-Fi, Bluetooth, NFC<br>объем оперативной памяти 6 ГБ<br>аккумулятор 3200 мА⋅ч<br>вес 218 г, ШxВxТ 74.69x157.89x8.46 мм', 'Смартфоны', 'Xiaomi', 'Китай', 496),
(4, 'PlayStation4 pro', 'PS.png', 'стационарная<br>объем жесткого диска 1000 Гб<br>поддержка виртуальной реальности<br>поддержка UHD-разрешения и 3D-режима<br>беспроводной контроллер в комплекте<br>Bluetooth, Wi-Fi (802.11ac), LAN<br>воспроизведение видео<br>разъемы: HDMI, USB x3, оптический аудиовыход', 'Развлечение', 'SONY', 'Япония', 350),
(5, 'Google Pixel 3', 'google_px3.png', 'смартфон с Android 9.0<br>экран 5.5\", разрешение 2160x1080<br>камера 12.20 МП, автофокус<br>память 64 ГБ, без слота для карт памяти<br>3G, 4G LTE, LTE-A, Wi-Fi, Bluetooth, NFC<br>объем оперативной памяти 4 ГБ<br>аккумулятор 2915 мА⋅ч<br>вес 148 г, ШxВxТ 68.20x145.60x7.90 мм', 'Смартфоны', 'Google', 'USA', 470),
(6, 'Nintendo switch', 'Nintendo.png', 'портативная<br>дисплей 6.2\", 1280x720 пикс.<br>время работы 6 ч<br>поддержка HD-разрешения<br>беспроводной контроллер в комплекте<br>Bluetooth, Wi-Fi (802.11ac)<br>поддержка виртуальной реальности<br>объем встроенной памяти 32 Гб<br>поддерживаемые карты памяти: microSD, microSDHC, microSDXC<br>разъемы: HDMI, USB x2, выход для наушников', 'Развлечение', 'Nintendo', 'Япония', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `info` text CHARACTER SET utf8,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`ID`, `name`, `email`, `login`, `password`, `phone`, `info`, `photo`) VALUES
(1, '', 'fsda', 'Lion', 'b1ab4dc6f527094ed8487e3f77b35cfb', '', '', NULL),
(2, 'Олег Ефремов', 'Oleg345@gmail.com', 'Wiloker1', 'e10adc3949ba59abbe56e057f20f883e', '8953068472', 'hello', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Индексы таблицы `kategory`
--
ALTER TABLE `kategory`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`kategory_name`);

--
-- Индексы таблицы `proizvoditel`
--
ALTER TABLE `proizvoditel`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `proizvod_name` (`proizvod_name`);

--
-- Индексы таблицы `proto`
--
ALTER TABLE `proto`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `kategory`
--
ALTER TABLE `kategory`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `proizvoditel`
--
ALTER TABLE `proizvoditel`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT для таблицы `proto`
--
ALTER TABLE `proto`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
