-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 14 2020 г., 16:14
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fitness`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `fitnesses`
--

CREATE TABLE `fitnesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `growth` tinyint(3) UNSIGNED NOT NULL,
  `starting_weight` tinyint(4) NOT NULL,
  `current_weight` tinyint(4) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `without_changing_the_weight` int(11) NOT NULL,
  `weight_loss` int(11) NOT NULL,
  `rapid_weight_loss` int(11) NOT NULL,
  `exercise_stress` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `fitnesses`
--

INSERT INTO `fitnesses` (`id`, `user_id`, `gender`, `growth`, `starting_weight`, `current_weight`, `age`, `without_changing_the_weight`, `weight_loss`, `rapid_weight_loss`, `exercise_stress`, `created_at`, `updated_at`) VALUES
(1, 1, 'male', 186, 85, 85, 23, 2949, 2399, 2049, 3, '2020-08-02 07:09:36', '2020-08-02 07:09:36'),
(2, 2, 'female', 150, 100, 100, 28, 2250, 1700, 1350, 2, '2020-08-02 07:19:51', '2020-08-02 07:19:51'),
(3, 2, 'female', 150, 100, 100, 28, 2250, 1700, 1350, 2, '2020-08-02 07:31:14', '2020-08-02 07:31:14'),
(4, 6, 'female', 164, 73, 73, 45, 1643, 1093, 743, 1, '2020-08-12 17:16:20', '2020-08-12 17:16:20'),
(5, 7, 'male', 186, 85, 85, 23, 3282, 2732, 2382, 4, '2020-08-14 10:30:24', '2020-08-14 10:30:24');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_08_01_115639_create_fitnesses_table', 2),
(15, '2020_08_02_115308_create_products_table', 3),
(27, '2020_08_03_154324_create_product_user_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calories` double(8,2) NOT NULL,
  `proteins` double(8,2) NOT NULL,
  `fats` double(8,2) NOT NULL,
  `carbohydrates` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `calories`, `proteins`, `fats`, `carbohydrates`, `created_at`, `updated_at`) VALUES
(1, 'Рис белый', 344.00, 6.70, 0.70, 78.90, '2020-08-02 15:08:56', '2020-08-02 15:08:56'),
(2, 'Фарш говяжий', 293.00, 15.00, 25.00, 0.00, '2020-08-02 15:09:19', '2020-08-09 13:30:16'),
(3, 'Кофе Nescafe Original', 413.00, 1.20, 8.70, 66.00, '2020-08-02 15:11:25', '2020-08-02 15:11:25'),
(4, 'Гречневая каша', 132.00, 4.50, 2.30, 25.00, '2020-08-02 15:12:32', '2020-08-02 15:12:32'),
(5, 'Огурец', 15.00, 0.80, 0.10, 2.80, '2020-08-02 15:13:48', '2020-08-02 15:13:48'),
(7, 'Картофель', 80.00, 2.00, 0.40, 18.10, '2020-08-03 06:55:52', '2020-08-03 06:55:52'),
(8, 'Шоколад молочный Milka', 534.26, 6.23, 31.77, 55.18, '2020-08-03 10:52:33', '2020-08-03 10:52:33'),
(9, 'Помидор', 20.00, 0.60, 0.20, 4.20, '2020-08-03 11:57:40', '2020-08-03 11:57:40'),
(10, 'Абрикос', 41.00, 0.90, 0.10, 10.80, '2020-08-03 12:47:25', '2020-08-03 12:47:25'),
(11, 'Авокадо', 208.00, 2.00, 20.00, 7.40, '2020-08-03 12:48:18', '2020-08-03 12:48:18'),
(15, 'Банан', 95.00, 1.50, 0.20, 21.80, '2020-08-09 13:29:24', '2020-08-09 13:29:56'),
(30, 'Snikers', 483.00, 8.60, 22.60, 60.70, '2020-08-11 18:22:15', '2020-08-11 18:22:27'),
(31, 'Кальмар сушеный', 153.00, 23.90, 0.40, 13.50, '2020-08-11 18:23:51', '2020-08-11 18:24:22'),
(32, 'Арахис Big Bob', 641.30, 19.90, 50.50, 26.90, '2020-08-12 16:47:04', '2020-08-12 16:47:04'),
(33, 'Каша ячневая', 150.00, 1.50, 4.00, 88.00, '2020-08-12 17:30:02', '2020-08-12 17:31:18'),
(35, 'qwe', 32.00, 1213.00, 323.00, 323.00, '2020-08-14 09:03:18', '2020-08-14 09:03:18'),
(36, 'ячс', 321.00, 321.00, 321.00, 321.00, '2020-08-14 09:04:44', '2020-08-14 09:04:44'),
(37, 'аваава', 432.00, 432.00, 432432.00, 432432.00, '2020-08-14 09:06:48', '2020-08-14 09:06:48');

-- --------------------------------------------------------

--
-- Структура таблицы `product_user`
--

CREATE TABLE `product_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_user`
--

INSERT INTO `product_user` (`id`, `user_id`, `product_id`, `weight`, `created_at`) VALUES
(60, 1, 30, 113, '2020-08-11 21:25:53'),
(61, 1, 8, 90, '2020-08-11 21:26:15'),
(71, 1, 31, 222, '2020-08-12 19:56:46'),
(72, 1, 1, 222, '2020-08-12 19:58:00'),
(73, 1, 7, 222, '2020-08-12 19:58:15'),
(74, 5, 5, 23, '2020-08-12 20:13:22'),
(75, 5, 7, 4343, '2020-08-12 20:13:28'),
(76, 5, 11, 555, '2020-08-12 20:13:33'),
(77, 6, 5, 150, '2020-08-12 20:27:17'),
(78, 6, 7, 200, '2020-08-12 20:27:44'),
(81, 1, 32, 150, '2020-08-13 09:32:07'),
(84, 1, 37, 3243, '2020-08-14 12:06:48');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Егор', 'tushkanchik756@gmail.com', NULL, '$2y$10$Ec3VNE1JSsbCTnc8RGw8K..FRb4CQpMSNkxchBLexUbL0D2XTihAm', '3Njk7Ln3sQ3bEjJ1rSxmIVx89OSls0y0zO0m19fX4wQOu7yem6s5RafwiQhd', '2020-08-01 07:47:59', '2020-08-01 07:47:59'),
(2, 'SimpleUser', 'SimpleUser@user.com', NULL, '$2y$10$AxTfXXvnLx6.Prxc/UxJAeFYWdIEPK4Fgx11WzXRBcj/pzCvgn00S', NULL, '2020-08-02 07:17:44', '2020-08-02 07:17:44'),
(3, 'SimpleUser1', 'SimpleUser1@user.com', NULL, '$2y$10$glKjoqOAbkmgL5LcExML3uFUtg0O8EWLsEjCwegy/ZgGXP.Sqg0Uq', NULL, '2020-08-09 02:50:49', '2020-08-09 02:50:49'),
(4, 'simpleUser3', 'SimpleUser3@user.com', NULL, '$2y$10$verftLreJypWGp.8/eDmwePfMsBtqh3P4OoSv7rqjbmGmALuKxshW', NULL, '2020-08-09 02:52:21', '2020-08-09 02:52:21'),
(5, 'Васян', 'Vasyan99@vasya.com', NULL, '$2y$10$uugupzF7lvR7eVsfbmCD9OPVhGwMIkll5.phAQ9NA15ZeBwkCazP.', NULL, '2020-08-12 17:13:15', '2020-08-12 17:13:15'),
(6, 'Аля', 'dan261716@gmail.com', NULL, '$2y$10$Bo6AMl2pjxelMViO2jykv.2FMilOkWbGQYRIJLn9c4Tb5Yvynhhjq', 'EKuBt3xGSVMFiWfgg59hL9wVjQONbP1AmTHjRIWTlbxGMJBHapENVIbgUWjL', '2020-08-12 17:15:42', '2020-08-12 17:15:42'),
(7, 'TestUser', 'TestUser@gmail.com', NULL, '$2y$10$Jg7raAcvYZx7bbdhR9TFyevUAcyty8HUcD0iK8wJDyemqE.6ndiX.', NULL, '2020-08-14 10:30:08', '2020-08-14 10:30:08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fitnesses`
--
ALTER TABLE `fitnesses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `fitnesses`
--
ALTER TABLE `fitnesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `product_user`
--
ALTER TABLE `product_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
