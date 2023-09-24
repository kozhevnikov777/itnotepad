-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 24 2023 г., 23:58
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_itnotepad`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'отгул', '2023-05-11 18:55:45', '2023-06-14 12:37:47', NULL),
(7, 'переработка', '2023-05-11 18:57:37', '2023-06-14 12:37:56', NULL),
(12, 'ОТКАЗАНО', '2023-06-14 12:02:49', '2023-07-05 10:14:43', '2023-07-05 10:14:43');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 20, 20, 'Подтверждаю', '2023-05-31 20:23:07', '2023-05-31 20:23:07'),
(2, 20, 21, 'Выберите другое время', '2023-06-01 18:42:10', '2023-06-01 18:42:10'),
(3, 32, 20, '+', '2023-06-08 04:32:00', '2023-06-08 04:32:00');

-- --------------------------------------------------------

--
-- Структура таблицы `contact_models`
--

CREATE TABLE `contact_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contact_models`
--

INSERT INTO `contact_models` (`id`, `created_at`, `updated_at`, `email`, `record_name`, `record_text`) VALUES
(10, '2023-05-02 05:58:28', '2023-05-02 05:58:28', 'admin1@myp.ru', 'Все работает отлично', 'Самый хороший отзыв');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_30_031358_create_contact_models_table', 1),
(6, '2023_05_05_164640_create_categories_table', 2),
(7, '2023_05_05_164921_create_tags_table', 2),
(8, '2023_05_05_165148_create_posts_table', 2),
(9, '2023_05_05_165845_create_post_tags_table', 2),
(10, '2023_05_09_183043_add_column_soft_deletes_to_categories_table', 3),
(11, '2023_05_09_204949_add_soft_delete_to_tags_table', 4),
(12, '2023_05_11_211707_add_columns_for_images_to_posts_table', 5),
(13, '2023_05_12_221834_add_soft_deletes_to_posts_table', 6),
(14, '2023_05_17_232457_add_soft_deletes_to_users_table', 7),
(15, '2023_05_17_234408_add_column_role_to_users_table', 8),
(16, '2014_10_12_100000_create_password_resets_table', 9),
(17, '2023_05_21_192521_create_post_user_likes_table', 9),
(20, '2023_05_21_204853_create_comments_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@admin', '$2y$10$k.TUf7G9zcncOEMTYVGTSOnvYNm1U0b2K0AUEyp35oBo0b/WkhM6W', '2023-05-24 15:29:47');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `start_time`, `end_time`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(16, 'test1', '<p>111</p>', '2016-12-20 21:00:00', '2016-12-20 23:00:00', 7, '2023-05-29 22:16:14', '2023-09-01 11:35:05', '2023-09-01 11:35:05', 0),
(19, 'pr1', '<p>111</p>', '2016-12-20 21:00:00', '2016-12-20 21:00:00', 7, '2023-05-30 19:08:39', '2023-09-01 11:35:07', '2023-09-01 11:35:07', 0),
(20, 'Иванов Иван Иванович', '<p>Переработка по просьбе начальника, 31.05.2023 с 15:00 до 20:00</p>', '2016-12-20 21:00:00', '2016-12-20 21:00:00', 7, '2023-05-31 20:15:39', '2023-09-01 11:35:09', '2023-09-01 11:35:09', 0),
(21, 'Петров Иван Сидорович', '<p>Личная причина, 01.06.2023 с 12:00 до 15:00</p>', '2016-12-20 21:00:00', '2016-12-20 21:00:00', 6, '2023-06-01 18:37:58', '2023-09-01 11:35:12', '2023-09-01 11:35:12', 0),
(23, 'Сидоров Петр Сидорович', '<p>По личной причине</p>', '2016-12-20 21:00:00', '2016-12-20 21:00:00', 6, '2023-06-14 13:01:20', '2023-09-01 11:35:02', '2023-09-01 11:35:02', 0),
(24, 'Admin', 'нужно доделать проект', '2016-12-20 21:00:00', '2016-12-20 21:30:00', 7, '2023-06-28 07:46:24', '2023-09-01 11:34:56', '2023-09-01 11:34:56', 0),
(26, 'user', 'Обсудили лично', '2016-12-20 21:00:00', '2016-12-20 21:00:00', 6, '2023-06-28 09:07:23', '2023-08-02 20:53:49', '2023-08-02 20:53:49', 0),
(27, 'Admin', '<p>По личной причине</p>', '2016-12-21 05:20:00', '2016-12-21 06:30:50', 7, '2023-06-29 12:51:15', '2023-09-01 11:34:53', '2023-09-01 11:34:53', 0),
(32, 'user', '<p>По личной причине</p>', '2023-08-02 20:40:00', '2023-08-02 20:59:00', 6, '2023-08-02 20:54:32', '2023-09-01 11:39:12', '2023-09-01 11:39:12', 0),
(34, 'Admin', '<p>Личная</p>', '2016-12-20 22:00:00', '2016-12-21 20:30:00', 7, '2023-08-24 06:08:53', '2023-09-01 11:39:10', '2023-09-01 11:39:10', 20),
(36, 'Admin', '<p>причина</p>', '2023-09-01 11:35:00', '2023-09-01 12:45:00', 7, '2023-09-01 11:35:31', '2023-09-01 11:39:07', '2023-09-01 11:39:07', 20),
(37, 'Admin', '<p>прчиига</p>', '2023-09-01 11:41:00', '2023-09-01 12:35:00', 7, '2023-09-01 11:42:06', '2023-09-01 11:42:06', NULL, 20),
(39, 'user', '<p>AAA</p>', '2023-09-01 12:12:00', '2023-09-01 13:35:00', 7, '2023-09-01 12:14:48', '2023-09-01 12:14:48', NULL, 32),
(40, 'Admin', '<p>AAA</p>', '2023-09-01 12:15:00', '2023-09-01 13:30:00', 7, '2023-09-01 12:15:50', '2023-09-01 12:22:21', NULL, 20),
(41, 'Admin', '<p>feqvw</p>', '2023-09-01 12:25:00', '2023-09-01 12:30:00', 7, '2023-09-01 12:26:13', '2023-09-01 12:26:13', NULL, 20),
(42, 'Admin', '<p>wbgrb</p>', '2023-09-01 12:27:00', '2023-09-01 13:01:00', 6, '2023-09-01 12:28:16', '2023-09-01 12:28:16', NULL, 20),
(43, 'Admin', '<p>qdvfqv</p>', '2023-09-01 12:29:00', '2023-09-02 13:29:00', 6, '2023-09-01 12:29:47', '2023-09-01 12:30:14', NULL, 20),
(44, 'Admin', '<p>fbwb</p>', '2023-09-01 12:35:00', '2023-09-01 12:40:00', 7, '2023-09-01 12:36:12', '2023-09-03 13:19:03', NULL, 20),
(45, 'testuser', '<p>abc</p>', '2023-09-03 15:24:00', '2023-09-03 15:35:00', 6, '2023-09-03 15:24:44', '2023-09-03 15:24:44', NULL, 33);

-- --------------------------------------------------------

--
-- Структура таблицы `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(14, 16, 3, NULL, NULL),
(15, 20, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `post_user_dislikes`
--

CREATE TABLE `post_user_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_user_dislikes`
--

INSERT INTO `post_user_dislikes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(224, 39, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `post_user_likes`
--

CREATE TABLE `post_user_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_user_likes`
--

INSERT INTO `post_user_likes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(279, 32, 20, NULL, NULL),
(281, 34, 20, NULL, NULL),
(283, 36, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'По просьбе начальника', '2023-05-12 17:21:42', '2023-05-24 21:31:51', NULL),
(4, '!ЭКСТРЕННАЯ ПРИЧИНА!', '2023-05-12 17:26:57', '2023-05-24 21:31:28', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` smallint(5) UNSIGNED DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `role`, `rating`) VALUES
(20, 'Admin', 'example@example.com', NULL, '$2y$10$T7DiWP/gGcUt4Szp5H8lzOlILgT8Xc83VzMJ01emdhP2h2Jwh/rga', 'H27wpZnYdeo9VPJdhMtUtyUL5ZxZ5eobH6cjTAKln7TNcFDYXxFMtR8IfYjm', '2023-05-19 20:00:07', '2023-09-08 11:09:37', NULL, 1, -135),
(32, 'user', 'user@user', NULL, '$2y$10$ECNfX29jvk3ncd/v6LjUheOjB0lQSBOdB7PxH6N6/ytNr4F6tuqTO', NULL, '2023-05-30 19:07:28', '2023-09-03 13:14:40', NULL, 0, 0),
(33, 'testuser', 'testuser@user', NULL, '$2y$10$zD/3r2nHDsg158FIEUhPHeKiksvDYlyt4mXGQxvNBCk4nnebqx5Ui', NULL, '2023-06-01 18:21:16', '2023-09-07 14:23:14', NULL, 0, -44);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_idx` (`post_id`),
  ADD KEY `comments_user_idx` (`user_id`);

--
-- Индексы таблицы `contact_models`
--
ALTER TABLE `contact_models`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_idx` (`category_id`);

--
-- Индексы таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_idx` (`post_id`),
  ADD KEY `post_tag_tag_idx` (`tag_id`);

--
-- Индексы таблицы `post_user_dislikes`
--
ALTER TABLE `post_user_dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pud_post_idx` (`post_id`) USING BTREE,
  ADD KEY `pud_user_idx` (`user_id`) USING BTREE;

--
-- Индексы таблицы `post_user_likes`
--
ALTER TABLE `post_user_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pul_post_idx` (`post_id`),
  ADD KEY `pul_user_idx` (`user_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `contact_models`
--
ALTER TABLE `contact_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `post_user_dislikes`
--
ALTER TABLE `post_user_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT для таблицы `post_user_likes`
--
ALTER TABLE `post_user_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tag_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_fk` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_user_dislikes`
--
ALTER TABLE `post_user_dislikes`
  ADD CONSTRAINT `post_user_dislikes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_user_dislikes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_user_likes`
--
ALTER TABLE `post_user_likes`
  ADD CONSTRAINT `pul_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `pul_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
