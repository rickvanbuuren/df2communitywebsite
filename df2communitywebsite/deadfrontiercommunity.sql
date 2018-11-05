-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 nov 2018 om 23:16
-- Serverversie: 10.1.35-MariaDB
-- PHP-versie: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deadfrontiercommunity`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_01_112842_ads', 1),
(4, '2018_10_05_125224_create_posts_table', 2),
(5, '2018_10_31_185331_add_user_id_to_posts', 3),
(6, '2018_11_01_121604_add_role_to_user', 4),
(7, '2018_11_03_133113_add_cover_image_to_posts', 5),
(8, '2018_11_03_151354_add_hidden_to_posts', 6),
(9, '2018_11_03_152123_add_hidden_to_posts', 7),
(10, '2018_11_03_152450_add_hidden_to_posts', 8),
(11, '2018_11_04_141607_add_category_to_posts', 9);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`, `hidden`, `category`) VALUES
(18, 'Hidden test unchecked', 'Hidden test unchecked', '2018-11-03 14:49:02', '2018-11-03 19:55:04', 1, 'noimage.jpg', 'true', 'Maps'),
(19, 'Hidden test', 'Hidden test', '2018-11-03 14:49:40', '2018-11-03 19:55:18', 1, 'noimage.jpg', 'false', 'Bosses'),
(20, 'Hidden test 2', 'bal bla bla', '2018-11-03 16:53:48', '2018-11-04 13:44:16', 1, 'noimage.jpg', 'false', 'Maps'),
(21, 'Post two', 'hidden deze is veranderd', '2018-11-03 17:25:12', '2018-11-04 19:48:32', 1, 'noimage.jpg', 'true', 'Bosses'),
(22, 'Post one', 'Dit is een nieuwe post', '2018-11-04 11:12:30', '2018-11-04 11:13:32', 3, 'mri-pet-2685_1541333550.jpg', 'false', 'Maps'),
(23, 'dasdas', 'fffffffffffff', '2018-11-04 11:12:57', '2018-11-04 11:12:57', 3, 'planning_1541333577.PNG', 'false', 'Maps'),
(24, 'Hidden test unchecked', 'Hidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test uncheckedHidden test unchecked', '2018-11-04 13:05:20', '2018-11-04 13:43:59', 1, 'MRI_1541342178.jpg', 'false', 'Weapons'),
(25, 'Hidden test unchecked', 'vvvvvvvvvv', '2018-11-04 13:34:09', '2018-11-04 13:43:49', 1, 'noimage.jpg', 'false', 'Skills'),
(26, 'Mooie post', 'Met tekst', '2018-11-04 20:09:22', '2018-11-04 20:12:36', 3, 'MRI_1541365762.jpg', 'false', 'Maps'),
(27, 'Nogmaals een test', 'Dit is nogmaals een test', '2018-11-04 20:14:53', '2018-11-04 20:15:08', 3, 'trello_1541366093.PNG', 'true', 'Weapons'),
(28, 'Tekst met tekst editor verwerkt', '<p>Tekst met tekst e<s>ditor verwerkt&nbsp;Tekst met tek</s>st editor verwerkt&nbsp;Tekst m<strong>et tekst editor verwerkt</strong></p>', '2018-11-04 20:27:17', '2018-11-04 20:27:17', 3, 'noimage.jpg', 'false', 'Bosses');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Rick van Buuren', 'rickvanb10@gmail.com', NULL, '$2y$10$3zbkOhOqXZN26dAJyp53DeJuxEyAaEtvN/hHkwjOR6nePAePq2MVC', 'EjsymBQbeBVBY5eVSSnP7wxFw3wNsoIeu0fcEaAuurtc5sTnLulDMEeRbpd2', '2018-10-31 11:35:38', '2018-10-31 11:35:38', 'admin'),
(2, 'Gebruiker2', 'gebruiker@gebruiker.nl', NULL, '$2y$10$GgUGbPwpKcPvLW7wkpM0F.3jsTbZfSuEfOuSB/lyeoKZ5MB.P21im', NULL, '2018-10-31 19:11:50', '2018-11-04 19:21:17', 'user'),
(3, 'gebruiker3', 'ik@ik.ik', NULL, '$2y$10$e7u4F4Td0lrUUmVfg42Rke8RtfsCSkQHwNeUbeug6DJCLtEaq1vMe', 'WTL9WTsOIXS2SXLJ3nOC24q4Mf29qcob3uwo3pau4yFQfL2cNOFeQVliO0pE', '2018-11-03 19:25:11', '2018-11-04 19:42:56', 'user');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
