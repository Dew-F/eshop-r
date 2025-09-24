-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 22 2022 г., 16:37
-- Версия сервера: 8.0.24
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eshop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `ID` bigint UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SubcategoryID` bigint UNSIGNED NOT NULL,
  `UnitID` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`ID`, `Name`, `SubcategoryID`, `UnitID`) VALUES
(1, 'Ширина экрана', 1, 1),
(2, 'Высота экрана', 1, 1),
(3, 'Количество ядер', 1, 2),
(4, 'Частота работы процессора', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `ID` bigint UNSIGNED NOT NULL,
  `ProductID` bigint UNSIGNED NOT NULL,
  `SessionID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Count` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `ID` bigint UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Icon`) VALUES
(1, 'Смартфоны и гаджеты', 'fa-solid fa-mobile-screen'),
(2, 'ТВ и мультимедиа', 'fa-solid fa-tv'),
(3, 'Компьютеры', 'fa-solid fa-computer'),
(4, 'Офис и сеть', 'fa-solid fa-print'),
(5, 'Бытовая техника', 'fa-solid fa-blender'),
(6, 'Отдых и развлечения', 'fa-brands fa-xbox'),
(7, 'Строительство и ремонт', 'fa-solid fa-lightbulb'),
(8, 'Аксессуары', 'fa-solid fa-headphones');

-- --------------------------------------------------------

--
-- Структура таблицы `compares`
--

CREATE TABLE `compares` (
  `ID` bigint UNSIGNED NOT NULL,
  `ProductID` bigint UNSIGNED NOT NULL,
  `SessionID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `ID` bigint UNSIGNED NOT NULL,
  `ProductID` bigint UNSIGNED NOT NULL,
  `UserID` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `incomings`
--

CREATE TABLE `incomings` (
  `ID` bigint UNSIGNED NOT NULL,
  `ProductID` bigint UNSIGNED NOT NULL,
  `Count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `incomings`
--

INSERT INTO `incomings` (`ID`, `ProductID`, `Count`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2022-06-22 10:35:34', '2022-06-22 10:35:34'),
(2, 2, 15, '2022-06-22 10:35:34', '2022-06-22 10:35:34'),
(3, 3, 14, '2022-06-22 10:35:34', '2022-06-22 10:35:34'),
(4, 4, 11, '2022-06-22 10:35:34', '2022-06-22 10:35:34'),
(5, 5, 16, '2022-06-22 10:35:34', '2022-06-22 10:35:34');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_03_02_043244_create_roles_table', 1),
(3, '2022_04_01_054528_create_users_table', 1),
(4, '2022_04_02_000001_create_categories_table', 1),
(5, '2022_04_02_000002_create_subcategories_table', 1),
(6, '2022_04_02_101255_create_sessions_table', 1),
(7, '2022_04_03_073802_create_units_table', 1),
(8, '2022_04_04_073735_create_products_table', 1),
(9, '2022_04_05_050314_create_carts_table', 1),
(10, '2022_04_06_073705_create_attributes_table', 1),
(11, '2022_04_07_073752_create_product_attributes_table', 1),
(12, '2022_04_08_092125_create_product_images_table', 1),
(13, '2022_04_09_061121_create_incomings_table', 1),
(14, '2022_04_11_120224_create_orders_table', 1),
(15, '2022_04_12_112157_create_order_products_table', 1),
(16, '2022_04_13_120749_create_favourites_table', 1),
(17, '2022_06_07_052654_create_compares_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` bigint UNSIGNED NOT NULL,
  `UserID` bigint UNSIGNED DEFAULT NULL,
  `PayStatus` tinyint(1) NOT NULL,
  `OrderStatus` tinyint(1) NOT NULL,
  `DeliveryMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PayMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Total` int NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `ID` bigint UNSIGNED NOT NULL,
  `OrderID` bigint UNSIGNED NOT NULL,
  `ProductID` bigint UNSIGNED NOT NULL,
  `Count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` bigint UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SubcategoryID` bigint UNSIGNED NOT NULL,
  `FullDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShortDescription` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `Name`, `SubcategoryID`, `FullDescription`, `ShortDescription`, `Price`) VALUES
(1, 'Смартфон Apple iPhone 11 64GB Black', 1, 'Экран 6.1\"/1792x828 Пикс\n                                        Технология экрана IPS\n                                        Тип процессора A13 Bionic\n                                        Встроенная память (ROM) 64 ГБ\n                                        Основная камера МПикс 12/12\n                                        Разрешение видеосъемки 3840x2160 Пикс (4K)\n                                        Оптическая стабилизация Да\n                                        Фронтальная камера МПикс 12', 'Экран 6.1\"/1792x828 Пикс\n                                        Технология экрана IPS\n                                        Тип процессора A13 Bionic\n                                        Разрешение видеосъемки 3840x2160 Пикс (4K)', 47999),
(2, 'Смартфон Samsung Galaxy A52 256GB Awesome Black', 1, 'Смартфон Samsung Galaxy A52 с новым дизайном задаёт тренд! Его выступающий блок камер окрашен в цвет корпуса, что создаёт ощущение целостности и гармонии. Стеклопластиковая задняя панель долго остаётся гладкой и приятной на ощупь. Устройство соответствует классу IP67 – оно продолжает работать на глубине до метра под водой.\n                    ОБНОВЛЁННАЯ КАМЕРА\n                    64-мегапиксельная матрица, светосильный объектив и оптическая стабилизация творят чудеса – вы получаете чёткие детализированные кадры при ярком солнечном свете и в полной темноте. Смартфон также умеет делать портреты с эффектом боке, широкоугольные панорамы и макрофотографии. А ещё он может снимать видео на уровне экшн-камеры, передавая естественные движения в динамичных сценах.', 'Смартфон Samsung Galaxy A52 с новым дизайном задаёт тренд! Его выступающий блок камер окрашен в цвет корпуса, что создаёт ощущение целостности и гармонии.', 34999),
(3, 'Смарт-часы Xiaomi Watch S1 Active GL Space Black', 2, 'Смарт-часы Xiaomi Watch S1 Active оснащены круглым сенсорным AMOLED-дисплеем. Его диаметр — 1,43 дюйма, разрешение — 466 х 466 пикселей. Устройство поддерживает Bluetooth, Wi-Fi и NFC, есть навигация по GPS и ГЛОНАСС.\n                    В этой модели есть акселерометр, гироскоп и кардиодатчик. Она ведет мониторинг сна, следит за сердечным ритмом, уровнем стресса и кислородом в крови, подсчитывает количество потраченных калорий.\n                    При подключении к смартфону с операционной системой Android или iOS на гаджет приходят уведомления о звонках и SMS. Также можно сохранять результаты тренировок на мобильные девайсы. Есть микрофон и динамик.\n                    Корпус изготовлен из пластика. Класс водонепроницаемости — 5 Атм. В комплект входит съемный ремешок изe', 'Смарт-часы Xiaomi Watch S1 Active оснащены круглым сенсорным AMOLED-дисплеем.', 13999),
(4, 'Смартфон vivo V21e Чёрный антрацит', 1, 'Смартфон Vivo V21е оснащен тремя основными и одной фронтальной камерой. Есть вспышка, оптическая и цифровая стабилизация кадра, цифровой зум. Экран у смартфона безрамочный, изготовлен на основе технологии AMOLED. Устройство снабжено восьмиядерным процессором Mediatek Dimensity 800U.\n                    В смартфоне есть слот под карту памяти (microSD) и два отсека под сим-карты (nano-SIM). Устройство поддерживает сети 2G/3G/4G LTE. Передачу данных можно осуществлять по Wi-Fi или через встроенный модуль Bluetooth версии 5.1. Также есть поддержка технологии бесконтактных платежей NFC, навигаторов GPS и ГЛОНАСС. На фронтальной панели смартфона расположен сканер отпечатков пальцев. Есть разъем для проводной гарнитуры и кабеля Type-С. Устройство поддерживает функцию быстрой зарядки.', 'Смартфон Vivo V21е оснащен тремя основными и одной фронтальной камерой. Есть вспышка, оптическая и цифровая стабилизация кадра, цифровой зум. Экран у смартфона безрамочный, изготовлен на основе технологии AMOLED. Устройство снабжено восьмиядерным процессором Mediatek Dimensity 800U.', 22999),
(5, 'Электрочайник Moulinex BY600130', 6, 'В электрочайнике Moulinex BY600130 гармонично сочетаются удобство использования и высококачественные материалы. Прозрачная колба позволяет видеть процесс кипячения, ведь встроенная подсветка создаёт эффектную игру пузырьков.\n                    БЕЗ ВРЕДА ДЛЯ ЗДОРОВЬЯ\n                    Ударопрочное и термостойкое стекло, из которого выполнен резервуар, не выделяет в воду опасных веществ. Готовьте любимые напитки, не переживая, что они приобретут посторонние привкусы и запахи. В носике находится сетчатый фильтр – ни крупинки накипи не попадёт в чашки.\n                    БЕЗ ЛИШНИХ ХЛОПОТ\n                    Наполнять чайник и следить за количеством жидкости легко: делать это помогают широкое горло и чёткая шкала, которая не стирается на протяжении всего срока использования прибора. На круглом основании', 'В электрочайнике Moulinex BY600130 гармонично сочетаются удобство использования и высококачественные материалы. Прозрачная колба позволяет видеть процесс кипячения, ведь встроенная подсветка создаёт эффектную игру пузырьков.', 5500);

-- --------------------------------------------------------

--
-- Структура таблицы `product_attributes`
--

CREATE TABLE `product_attributes` (
  `ID` bigint UNSIGNED NOT NULL,
  `ProductID` bigint UNSIGNED NOT NULL,
  `AttributeID` bigint UNSIGNED NOT NULL,
  `Value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_attributes`
--

INSERT INTO `product_attributes` (`ID`, `ProductID`, `AttributeID`, `Value`) VALUES
(1, 1, 1, '1024'),
(2, 1, 2, '1025'),
(3, 1, 3, '4'),
(4, 1, 4, '1.3'),
(5, 2, 1, '1026'),
(6, 2, 2, '1027'),
(7, 2, 3, '2'),
(8, 2, 4, '2.5'),
(9, 4, 1, '1028'),
(10, 4, 2, '1029'),
(11, 4, 3, '3'),
(12, 4, 4, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product_images`
--

CREATE TABLE `product_images` (
  `ID` bigint UNSIGNED NOT NULL,
  `ProductID` bigint UNSIGNED NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_images`
--

INSERT INTO `product_images` (`ID`, `ProductID`, `Image`, `Num`) VALUES
(1, 5, 'Чайник_0.png', 0),
(2, 5, 'iphone_0.png', 1),
(3, 5, 'samsung_0.png', 2),
(4, 1, 'iphone_0.png', 0),
(5, 2, 'samsung_0.png', 0),
(6, 3, 'smartwatch_0.png', 0),
(7, 4, 'vivo_0.png', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `ID` bigint UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`ID`, `Name`) VALUES
(1, 'Пользователь'),
(2, 'Администратор'),
(3, 'Товаровед'),
(4, 'Курьер');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wpdvFwfXxFBTN6aQAMMYUYHXxd1zaTBSkbR0MRGP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTFlaDRmTEJRQjdWODl1WmNBWDI3cEJpc29oQ0o2NER3dmMzdkhSUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lc2hvcC1yL3B1YmxpYy9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1655904976);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `ID` bigint UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CategoryID` bigint UNSIGNED NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`ID`, `Name`, `CategoryID`, `Image`) VALUES
(1, 'Смартфоны', 1, 'smartphone.png'),
(2, 'Смарт-часы', 1, 'smart_clock.png'),
(3, 'Телевизоры', 2, 'tv.png'),
(4, 'Ноутбуки', 3, 'laptop.png'),
(5, 'Принтеры', 4, 'printer.png'),
(6, 'Электрочайники', 5, 'electric_kettle.png'),
(7, 'Электросамокаты', 6, 'electric_scooter.png'),
(8, 'Лампы', 7, 'lamp.png'),
(9, 'Наушники', 8, 'headphones.png');

-- --------------------------------------------------------

--
-- Структура таблицы `units`
--

CREATE TABLE `units` (
  `ID` bigint UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShortName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `units`
--

INSERT INTO `units` (`ID`, `Name`, `ShortName`) VALUES
(1, 'Пиксель', 'Px'),
(2, '', ''),
(3, 'Герц', 'Гц');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` bigint UNSIGNED NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoleID` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Email`, `Name`, `Password`, `RoleID`) VALUES
(1, 'Admin@mail.ru', 'Admin', '$2y$10$uPa33C4HiYBem3EWq958/ekoml1Wq/M.647fXIGsjHVsi/pXUHdIe', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `attributes_subcategoryid_foreign` (`SubcategoryID`),
  ADD KEY `attributes_unitid_foreign` (`UnitID`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `carts_productid_foreign` (`ProductID`),
  ADD KEY `carts_sessionid_foreign` (`SessionID`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `compares_productid_foreign` (`ProductID`),
  ADD KEY `compares_sessionid_foreign` (`SessionID`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `favourites_productid_foreign` (`ProductID`),
  ADD KEY `favourites_userid_foreign` (`UserID`);

--
-- Индексы таблицы `incomings`
--
ALTER TABLE `incomings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `incomings_productid_foreign` (`ProductID`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `orders_userid_foreign` (`UserID`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_products_orderid_foreign` (`OrderID`),
  ADD KEY `order_products_productid_foreign` (`ProductID`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `products_subcategoryid_foreign` (`SubcategoryID`);

--
-- Индексы таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_attributes_productid_foreign` (`ProductID`),
  ADD KEY `product_attributes_attributeid_foreign` (`AttributeID`);

--
-- Индексы таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_images_productid_foreign` (`ProductID`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `subcategories_categoryid_foreign` (`CategoryID`);

--
-- Индексы таблицы `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `users_roleid_foreign` (`RoleID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `compares`
--
ALTER TABLE `compares`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `favourites`
--
ALTER TABLE `favourites`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `incomings`
--
ALTER TABLE `incomings`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `product_images`
--
ALTER TABLE `product_images`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `units`
--
ALTER TABLE `units`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_subcategoryid_foreign` FOREIGN KEY (`SubcategoryID`) REFERENCES `subcategories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attributes_unitid_foreign` FOREIGN KEY (`UnitID`) REFERENCES `units` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_productid_foreign` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_sessionid_foreign` FOREIGN KEY (`SessionID`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `compares`
--
ALTER TABLE `compares`
  ADD CONSTRAINT `compares_productid_foreign` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compares_sessionid_foreign` FOREIGN KEY (`SessionID`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_productid_foreign` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `incomings`
--
ALTER TABLE `incomings`
  ADD CONSTRAINT `incomings_productid_foreign` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_orderid_foreign` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_productid_foreign` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_subcategoryid_foreign` FOREIGN KEY (`SubcategoryID`) REFERENCES `subcategories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_attributeid_foreign` FOREIGN KEY (`AttributeID`) REFERENCES `attributes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_attributes_productid_foreign` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_productid_foreign` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_categoryid_foreign` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roleid_foreign` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
