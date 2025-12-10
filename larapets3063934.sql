-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2025 a las 14:21:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `larapets3063934`
--
CREATE DATABASE IF NOT EXISTS `larapets3063934` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `larapets3063934`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptions`
--

CREATE TABLE IF NOT EXISTS `adoptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adoptions_user_id_foreign` (`user_id`),
  KEY `adoptions_pet_id_foreign` (`pet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `adoptions`
--

INSERT INTO `adoptions` (`id`, `user_id`, `pet_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-11-06 20:32:09', '2025-11-06 20:32:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-fernanflorez4@gmail.com|127.0.0.1', 'i:1;', 1763751900),
('laravel-cache-fernanflorez4@gmail.com|127.0.0.1:timer', 'i:1763751900;', 1763751900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_22_214804_create_pets_table', 1),
(5, '2025_10_22_214926_create_adoptions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'no-image.png',
  `kind` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `age` int(11) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `name`, `image`, `kind`, `weight`, `age`, `breed`, `location`, `description`, `active`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Firulais', 'no-image.png', 'Dog', 7.6, 2, 'French Bulldog', 'Paris', 'Black dog, so charming, lovely', 0, 1, '2025-11-06 20:32:09', '2025-12-03 01:21:07'),
(2, 'Killer', 'no-image.png', 'Dog', 18, 6, 'Canne Corso', 'Millan', 'Explosive & , be carefully with it, Danger', 1, 0, '2025-11-06 20:32:09', '2025-11-06 20:32:09'),
(3, 'Pistacho', 'no-image.png', 'Cat', 5, 1, 'Mestizo', 'Manizales', 'Beatifull & , sweet', 1, 0, '2025-11-06 20:32:09', '2025-11-06 20:32:09'),
(4, 'Pipo', 'no-image.png', 'Pajaro', 2.5, 2, 'Guacamayo', 'Asia', 'Colorido y amigable', 1, 0, '2025-11-06 20:32:09', '2025-11-06 20:32:09'),
(5, 'DarkViolet', 'no-image.png', 'Parrot', 3.7, 1, 'Leannon', 'East Lorenzo', 'Sed dolorem exercitationem odio ea sunt inventore sapiente excepturi tempore saepe.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(6, 'Tomato', 'no-image.png', 'Fish', 7, 5, 'Kunze', 'West Ravenshire', 'Illum id qui quasi dicta aut aperiam quaerat consequatur voluptas incidunt perferendis.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(7, 'DarkSeaGreen', 'no-image.png', 'Fish', 1.5, 0, 'Waters', 'North Evalynburgh', 'Est nisi consequuntur illo consequatur impedit voluptas sequi tempore quas omnis.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(8, 'Crimson', 'no-image.png', 'Fish', 7.4, 9, 'Goldner', 'Candelariostad', 'Et molestias harum excepturi consequatur et.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(9, 'MidnightBlue', 'no-image.png', 'Cat', 9.7, 5, 'Littel', 'Kodyshire', 'Quaerat rerum modi occaecati quia odio aut.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(10, 'RosyBrown', 'no-image.png', 'Fish', 2.7, 4, 'Schinner', 'Waelchibury', 'Sit non nobis eius architecto alias iste cumque enim animi.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(11, 'DarkGreen', 'no-image.png', 'Dog', 7.4, 9, 'Johnson', 'North Selenabury', 'Ut et doloremque atque earum ut impedit nihil veniam.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(12, 'AntiqueWhite', 'no-image.png', 'Pig', 0.5, 4, 'Romaguera', 'South Alvina', 'Aut vitae ut laboriosam earum aut est voluptatem dolor saepe officia.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(13, 'LightGoldenRodYellow', 'no-image.png', 'Parrot', 1.4, 1, 'Nader', 'Arjunville', 'Non repudiandae culpa blanditiis fugiat saepe facere.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(14, 'DarkSlateGray', 'no-image.png', 'Parrot', 8, 1, 'Funk', 'West Meaghanchester', 'Reprehenderit odit impedit quasi incidunt autem veniam perspiciatis suscipit voluptatem assumenda.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(15, 'GoldenRod', 'no-image.png', 'Parrot', 4.9, 2, 'Thompson', 'Keshawnville', 'Consequatur qui et harum enim voluptas aperiam non optio consectetur.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(16, 'LightBlue', 'no-image.png', 'Dog', 8.5, 7, 'Crooks', 'New Carson', 'Non pariatur sapiente nobis officia cumque harum sit expedita.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(17, 'SeaShell', 'no-image.png', 'Cat', 1.2, 6, 'Spencer', 'New Keyshawn', 'Perspiciatis laboriosam quo qui at magnam.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(18, 'AliceBlue', 'no-image.png', 'Dog', 4.6, 3, 'Jacobson', 'New Mistyside', 'Adipisci totam quos ipsam et quidem.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(19, 'ForestGreen', 'no-image.png', 'Dog', 4.3, 6, 'Lehner', 'Maryview', 'Fugit fuga pariatur reprehenderit non expedita dignissimos autem illum.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(20, 'DodgerBlue', 'no-image.png', 'Pig', 2.5, 9, 'Reilly', 'Andreanebury', 'Et molestiae quos minus sed ut rem omnis voluptate sit.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(21, 'LightSalmon', 'no-image.png', 'Parrot', 6.9, 3, 'Kuhn', 'New Julio', 'Eveniet perferendis suscipit optio cum blanditiis ut.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(22, 'DarkMagenta', 'no-image.png', 'Parrot', 4.1, 9, 'Ernser', 'Heidenreichstad', 'Asperiores natus aut repellendus suscipit vitae nobis doloribus temporibus.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(23, 'Gainsboro', 'no-image.png', 'Fish', 2.5, 0, 'Zieme', 'North Christinaton', 'Voluptatum aut aut cumque et autem ipsum ducimus.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(24, 'LightPink', 'no-image.png', 'Dog', 7.8, 8, 'Klein', 'Lake Abbyhaven', 'Qui voluptates tempore ea unde voluptatem ut sint dicta beatae quia.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(25, 'FloralWhite', 'no-image.png', 'Pig', 5.9, 9, 'Bahringer', 'Andreaneberg', 'Nihil vel illo magnam deserunt quia voluptates non.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(26, 'SkyBlue', 'no-image.png', 'Fish', 8.8, 8, 'Blanda', 'Laurieland', 'Quisquam et odit occaecati qui incidunt.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(27, 'RosyBrown', 'no-image.png', 'Pig', 7.8, 8, 'Kozey', 'Granvilleport', 'Expedita molestias ipsam voluptatem in incidunt quidem nostrum.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(28, 'LightBlue', 'no-image.png', 'Parrot', 7, 1, 'Daugherty', 'Port Rafael', 'Veniam aut maiores consequatur ut ut dolore non quas.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(29, 'MediumSeaGreen', 'no-image.png', 'Parrot', 9.8, 6, 'Stehr', 'Rosieburgh', 'Ipsa consectetur ut rerum ullam et consequuntur odit autem.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(30, 'Chartreuse', 'no-image.png', 'Bird', 5.2, 7, 'Reichert', 'West Barneyfurt', 'Iusto commodi a voluptatum nostrum vel qui assumenda unde illum repudiandae.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(31, 'LightSteelBlue', 'no-image.png', 'Fish', 9.4, 8, 'White', 'Conroyside', 'Incidunt sint atque facere consectetur porro voluptas illo ullam.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(32, 'FloralWhite', 'no-image.png', 'Bird', 6, 9, 'Bahringer', 'Assuntaville', 'Qui voluptatem est dolor quia in expedita asperiores.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(33, 'Purple', 'no-image.png', 'Dog', 8.6, 3, 'Corwin', 'Fordville', 'Nulla voluptatem sapiente et vitae nihil quae delectus est.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(34, 'Violet', 'no-image.png', 'Cat', 3.4, 3, 'Stracke', 'Gleasonview', 'Voluptatem sit consequatur eos dolor dolorem voluptatem placeat voluptate dolor.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(35, 'Blue', 'no-image.png', 'Fish', 1.4, 2, 'Eichmann', 'East Keirahaven', 'Ea quisquam sequi tenetur incidunt quasi praesentium sit in eos.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(36, 'BlanchedAlmond', 'no-image.png', 'Fish', 5.2, 6, 'Schmitt', 'Lake Shannonfort', 'Nulla at sed non nisi eos veniam.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(37, 'RosyBrown', 'no-image.png', 'Pig', 1.1, 9, 'Monahan', 'East Parker', 'Alias rerum consequatur eius facere rerum et nihil fugit.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(38, 'LemonChiffon', 'no-image.png', 'Fish', 1.9, 9, 'Labadie', 'Lake Glendaville', 'Facilis est tenetur enim voluptas dolorum.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(39, 'DarkOrchid', 'no-image.png', 'Bird', 0.6, 4, 'Homenick', 'Otiliabury', 'Recusandae porro reiciendis architecto nobis quae repudiandae ratione est vitae hic sapiente.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(40, 'FireBrick', 'no-image.png', 'Fish', 1.5, 0, 'Torphy', 'Port Abbie', 'Qui repellendus laudantium molestiae nostrum et voluptatem et.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(41, 'SeaShell', 'no-image.png', 'Parrot', 8.3, 5, 'Jakubowski', 'Brekkemouth', 'Et molestiae eaque aut qui libero maxime quia deserunt.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(42, 'WhiteSmoke', 'no-image.png', 'Fish', 6.3, 0, 'Terry', 'Michaleshire', 'Deleniti dolor consequatur repellat alias similique.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(43, 'Bisque', 'no-image.png', 'Parrot', 9.1, 0, 'Nitzsche', 'New Marieburgh', 'Est est aperiam ex dolores.', 1, 0, '2025-11-06 20:34:27', '2025-11-06 20:34:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5uZPDvzKp20czmpveSE27EgYiaEOo2OMdb4FV8el', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRVJXV1lZSHVqdFl6QURFU2NmYUZqZkJtUEFCZXRHR01wY0djMzlpaCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXNlcnM/cGFnZT01Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1764369101),
('GzXaIjSUauNNW55KOD9rs5uF6pF9qoQoRtsVHuqw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic0g2MG9pTzUwZ0tnczRHVkhxSTV6bTBlMFVXNEFVTmxrcGhzU2hYRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1763645340),
('QN4338oQmkwkAmT1F7c2VObtUgQ5na9xwYjQPEaD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYk84dThQdjgySnJvQzk0RlhWamJRS2ZYa0Q5Tm52bTBqdlVHUGZwRSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXNlcnMvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1763656401),
('qXV8459wOHgavZpXw0FbElcXzhnRBtjGZNmDXnPC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia0xXY25sY3pGanNjdlRPNHp2RE55RG9iQ2VSSjBhZlYyWmVwZnliYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXRzLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1764706893),
('VvHkjYOzrJ8wR4s7QWM5OfczHqz1vZ7YBSRlBlDz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVEtKZkplb3VLbjZSNXpJUUhLM1VQYlVGTktTenliZVZlQ3lvOEVOMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2Vycy8xL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1763753817);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `document` bigint(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'no-photo.png',
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role` varchar(255) NOT NULL DEFAULT 'Customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_document_unique` (`document`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `document`, `fullname`, `gender`, `birthdate`, `photo`, `phone`, `email`, `email_verified_at`, `password`, `active`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 75000001, 'Jhon Wick', 'Male', '1964-09-12', 'wick.jpg', '310000001', 'david72ty@gmail.com', NULL, '$2y$12$4s6ko4KzEWulkAo.WilzeeSYG5OdhlhqvR5Lz0q4zH6pnguYlmbL.', 1, 'Administrator', 't2aPvMZg0v4SKQjx1Qm8hJ8RsCIjB8hto9rZe3KwGGwQv7wkYjf5vuK3iK0r', '2025-11-06 20:32:09', '2025-11-13 18:47:07'),
(2, 750000002, 'Lara Croft', 'Female', '1992-02-14', 'croft.jpg', '31200001', 'lara@mail.com', NULL, '$2y$12$lwDRhaGmr6uvf7TYyrOesO7us.SFRzAInlgIuQzsUWz4GFrP.sRgi', 0, 'Customer', NULL, '2025-11-06 20:32:09', NULL),
(3, 759162928, 'Felipe Lind', 'Male', '1988-10-29', 'sin-photo.jpg', '310970056', 'felipe.lind7170@example.com', '2025-11-06 15:32:10', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '2vgQNVRPw2', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(4, 753656681, 'Mateo Bednar', 'Male', '1973-05-07', 'user_mateo-bednar.jpg', '310028242', 'mateo.bednar7527@example.com', '2025-11-06 15:32:11', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 0, 'Customer', 'w6WmRTYkRV', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(5, 752813662, 'Miguel Steuber', 'Male', '2023-03-17', 'user_miguel-steuber.jpg', '310116942', 'miguel.steuber3721@example.com', '2025-11-06 15:32:12', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'eKVDPwGvEY', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(6, 757004161, 'Jorge Corwin', 'Male', '1977-03-18', 'user_jorge-corwin.jpg', '310235372', 'jorge.corwin4642@example.com', '2025-11-06 15:32:13', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'EylbY3UHxX', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(7, 757147882, 'Felipe Langworth', 'Male', '1997-02-13', 'user_felipe-langworth.jpg', '310267617', 'felipe.langworth9558@example.com', '2025-11-06 15:32:13', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'QlQTPYjt8Z', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(8, 758306304, 'Mateo Greenfelder', 'Male', '1988-05-25', 'user_mateo-greenfelder.jpg', '310718526', 'mateo.greenfelder6254@example.com', '2025-11-06 15:32:14', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'O1IyDpIxE5', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(9, 754959949, 'Camila Borer', 'Female', '1991-12-05', 'user_camila-borer.jpg', '310700931', 'camila.borer7521@example.com', '2025-11-06 15:32:15', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'geu1gf1YpV', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(10, 759751882, 'Jorge Abernathy', 'Male', '2013-12-27', 'user_jorge-abernathy.jpg', '310141437', 'jorge.abernathy6138@example.com', '2025-11-06 15:32:15', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'V2yZZDKdny', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(11, 753754182, 'Laura Reichel', 'Female', '1982-01-13', 'user_laura-reichel.jpg', '310984623', 'laura.reichel620@example.com', '2025-11-06 15:32:16', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'zuDn8UmOoq', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(12, 750277038, 'Isabella Zulauf', 'Female', '2010-02-11', 'user_isabella-zulauf.jpg', '310624184', 'isabella.zulauf2935@example.com', '2025-11-06 15:32:16', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'qQzjFyOsNZ', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(13, 757884930, 'Carlos Cormier', 'Male', '2005-03-28', 'user_carlos-cormier.jpg', '310552228', 'carlos.cormier2178@example.com', '2025-11-06 15:32:17', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '15GYWD9IH8', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(14, 756606350, 'Daniela Metz', 'Female', '1999-05-16', 'user_daniela-metz.jpg', '310056627', 'daniela.metz2816@example.com', '2025-11-06 15:32:17', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'sKG1K14FjD', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(15, 757076513, 'Carlos Dietrich', 'Male', '1998-11-07', 'user_carlos-dietrich.jpg', '310128488', 'carlos.dietrich9380@example.com', '2025-11-06 15:32:18', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'M1zK2vjhAS', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(16, 757286437, 'María Torp', 'Female', '1984-07-10', 'user_maria-torp.jpg', '310465944', 'maría.torp7885@example.com', '2025-11-06 15:32:19', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'Hur1pMANjn', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(17, 759724569, 'Sofía Kuhic', 'Female', '1983-10-03', 'user_sofia-kuhic.jpg', '310641569', 'sofía.kuhic4139@example.com', '2025-11-06 15:32:20', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '8k4auXYQxr', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(18, 751452970, 'Miguel Hand', 'Male', '2001-05-30', 'user_miguel-hand.jpg', '310883011', 'miguel.hand8132@example.com', '2025-11-06 15:32:21', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '5TnLKWkK7M', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(19, 756036712, 'Valentina Lakin', 'Female', '2007-06-25', 'user_valentina-lakin.jpg', '310034790', 'valentina.lakin1163@example.com', '2025-11-06 15:32:21', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'AzH5Zy8seR', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(20, 750686073, 'David Wilderman', 'Male', '1993-10-04', 'user_david-wilderman.jpg', '310319505', 'david.wilderman7975@example.com', '2025-11-06 15:32:22', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'vXdKnpbxyX', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(21, 754786316, 'Luis O\'Keefe', 'Male', '2000-10-07', 'user_luis-okeefe.jpg', '310421708', 'luis.o\'keefe2154@example.com', '2025-11-06 15:32:22', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '8vKblMJKLu', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(22, 757661817, 'María O\'Kon', 'Female', '1979-03-31', 'images/user_maria-okon.jpg', '310626930', 'maría.o\'kon1881@example.com', '2025-11-06 15:32:23', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '7Om4fJMIZn', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(23, 759300582, 'Carlos Cassin', 'Male', '1987-08-23', 'user_carlos-cassin.jpg', '310363433', 'carlos.cassin4077@example.com', '2025-11-06 15:32:24', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '5ivjQx6lrT', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(24, 757652282, 'Laura Johnson', 'Female', '1994-06-13', 'user_laura-johnson.jpg', '310224834', 'laura.johnson8973@example.com', '2025-11-06 15:32:24', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '45ZGJVpApP', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(25, 754316581, 'Miguel Nienow', 'Male', '1991-10-07', 'user_miguel-nienow.jpg', '310933996', 'miguel.nienow6604@example.com', '2025-11-06 15:32:25', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'ytKP6j4vEI', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(26, 756042768, 'Isabella Marks', 'Female', '2004-05-26', 'images/user_isabella-marks.jpg', '310732286', 'isabella.marks5017@example.com', '2025-11-06 15:32:25', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'j20qpD2L7Y', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(27, 754840851, 'Felipe Bernier', 'Male', '2013-01-23', 'images/user_felipe-bernier.jpg', '310441221', 'felipe.bernier540@example.com', '2025-11-06 15:32:26', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'lKVzLaaCcr', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(28, 756573693, 'Juan McKenzie', 'Male', '1994-10-05', 'images/user_juan-mckenzie.jpg', '310959187', 'juan.mckenzie586@example.com', '2025-11-06 15:32:26', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'w8MBvbc0Lq', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(29, 752770996, 'Valentina Wolff', 'Female', '2016-12-23', 'images/user_valentina-wolff.jpg', '310239567', 'valentina.wolff652@example.com', '2025-11-06 15:32:27', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'Jv8YaBZEGs', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(30, 758678301, 'Camila Bode', 'Female', '1974-12-12', 'images/user_camila-bode.jpg', '310590421', 'camila.bode5640@example.com', '2025-11-06 15:32:28', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'Y6052t6nMZ', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(31, 759786823, 'Juan Weimann', 'Male', '1972-08-05', 'images/user_juan-weimann.jpg', '310565554', 'juan.weimann2011@example.com', '2025-11-06 15:32:28', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'rHzG1OsUxk', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(32, 755230164, 'Sebastián Kerluke', 'Male', '1973-06-03', 'images/user_sebastian-kerluke.jpg', '310176780', 'sebastián.kerluke8379@example.com', '2025-11-06 15:32:29', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '4wMnvu7Led', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(33, 750426723, 'Valentina Lindgren', 'Female', '2025-02-18', 'images/user_valentina-lindgren.jpg', '310897057', 'valentina.lindgren3903@example.com', '2025-11-06 15:32:30', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '8K0cNUkDKx', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(34, 755008074, 'Carlos Ondricka', 'Male', '1993-08-03', 'images/user_carlos-ondricka.jpg', '310956813', 'carlos.ondricka7778@example.com', '2025-11-06 15:32:30', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'KFrm50rU2R', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(35, 753830863, 'Juan Johns', 'Male', '2003-01-10', 'images/user_juan-johns.jpg', '310006565', 'juan.johns5266@example.com', '2025-11-06 15:32:31', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'oZa5J4hmWf', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(36, 758879069, 'Miguel Heller', 'Male', '1990-04-07', 'images/user_miguel-heller.jpg', '310465193', 'miguel.heller7315@example.com', '2025-11-06 15:32:31', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'CDdrCGexUX', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(37, 753726135, 'Isabella Trantow', 'Female', '1997-08-17', 'images/user_isabella-trantow.jpg', '310672187', 'isabella.trantow7218@example.com', '2025-11-06 15:32:32', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '04X21S5afW', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(38, 754869873, 'Sebastián Smitham', 'Male', '1990-09-08', 'images/user_sebastian-smitham.jpg', '310703459', 'sebastián.smitham7386@example.com', '2025-11-06 15:32:33', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'AD4XyYyvBF', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(39, 754221874, 'Felipe Waelchi', 'Male', '1972-10-23', 'images/user_felipe-waelchi.jpg', '310690488', 'felipe.waelchi9047@example.com', '2025-11-06 15:32:33', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'BrHV0aQKOd', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(40, 754183106, 'Sofía Pagac', 'Female', '1977-10-03', 'images/user_sofia-pagac.jpg', '310207210', 'sofía.pagac2559@example.com', '2025-11-06 15:32:34', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'N9SQuJFGYH', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(41, 758457736, 'Juan West', 'Male', '1970-01-02', 'images/user_juan-west.jpg', '310362141', 'juan.west1841@example.com', '2025-11-06 15:32:34', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'FTN45OF1jo', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(42, 757737194, 'Carlos Olson', 'Male', '2019-03-11', 'images/user_carlos-olson.jpg', '310344429', 'carlos.olson3428@example.com', '2025-11-06 15:32:35', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'ylGYfbMCqP', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(43, 756682553, 'Ana Schmidt', 'Female', '1980-02-17', 'images/user_ana-schmidt.jpg', '310210665', 'ana.schmidt7092@example.com', '2025-11-06 15:32:35', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '4wN262ZSgm', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(44, 754874927, 'Isabella Schmeler', 'Female', '2001-03-28', 'images/user_isabella-schmeler.jpg', '310173596', 'isabella.schmeler3207@example.com', '2025-11-06 15:32:36', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'prUA66iqj0', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(45, 757438665, 'Valentina Streich', 'Female', '1973-07-17', 'images/user_valentina-streich.jpg', '310338994', 'valentina.streich9424@example.com', '2025-11-06 15:32:37', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '6zu4UzUuaa', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(46, 759736337, 'Carlos Veum', 'Male', '2010-12-11', 'images/user_carlos-veum.jpg', '310780140', 'carlos.veum1955@example.com', '2025-11-06 15:32:37', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '0uGqpbDraE', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(47, 753867284, 'Isabella Kub', 'Female', '1999-02-22', 'images/user_isabella-kub.jpg', '310715915', 'isabella.kub4799@example.com', '2025-11-06 15:32:38', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'TRLLtObK4T', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(48, 759092932, 'Daniela Prohaska', 'Female', '2015-12-14', 'images/user_daniela-prohaska.jpg', '310215092', 'daniela.prohaska9947@example.com', '2025-11-06 15:32:39', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'jqOMsG5Ogj', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(49, 754414475, 'Andrés Langosh', 'Male', '1992-10-29', 'images/user_andres-langosh.jpg', '310800889', 'andrés.langosh4204@example.com', '2025-11-06 15:32:39', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'AowqYZ2zSD', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(50, 754745013, 'Valentina Johnson', 'Female', '1998-02-22', 'images/user_valentina-johnson.jpg', '310641066', 'valentina.johnson9167@example.com', '2025-11-06 15:32:40', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'FHersRvF0d', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(51, 753390031, 'Lucía Mante', 'Female', '2016-09-25', 'images/user_lucia-mante.jpg', '310052792', 'lucía.mante8469@example.com', '2025-11-06 15:32:40', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'QX0RpXnS9E', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(52, 759591319, 'Felipe Blanda', 'Male', '2013-01-08', 'images/user_felipe-blanda.jpg', '310465704', 'felipe.blanda6778@example.com', '2025-11-06 15:32:41', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'fTvSVfK9tz', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(53, 757215361, 'David McGlynn', 'Male', '1970-11-27', 'images/user_david-mcglynn.jpg', '310162204', 'david.mcglynn8054@example.com', '2025-11-06 15:32:42', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'OciYOmdLp3', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(54, 759615527, 'David Dietrich', 'Male', '2012-05-25', 'images/user_david-dietrich.jpg', '310512749', 'david.dietrich9911@example.com', '2025-11-06 15:32:42', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'hiPagSrzkL', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(55, 753564690, 'Isabella Mueller', 'Female', '1972-01-11', 'images/user_isabella-mueller.jpg', '310456035', 'isabella.mueller451@example.com', '2025-11-06 15:32:43', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'L7vDKmAZwp', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(56, 750916652, 'Valentina Walsh', 'Female', '2006-08-05', 'images/user_valentina-walsh.jpg', '310236070', 'valentina.walsh180@example.com', '2025-11-06 15:32:43', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'V18CgmnZyQ', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(57, 753141631, 'Camila Kilback', 'Female', '1988-05-10', 'images/user_camila-kilback.jpg', '310698822', 'camila.kilback1341@example.com', '2025-11-06 15:32:44', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'U8XDG0kzbu', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(58, 750188626, 'Miguel Gusikowski', 'Male', '1978-01-12', 'images/user_miguel-gusikowski.jpg', '310745182', 'miguel.gusikowski2341@example.com', '2025-11-06 15:32:44', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'JhdipjApts', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(59, 758263210, 'Camila Buckridge', 'Female', '1991-04-05', 'images/user_camila-buckridge.jpg', '310004192', 'camila.buckridge5533@example.com', '2025-11-06 15:32:45', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '1QjflpLiqy', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(60, 756419056, 'Gabriela Abbott', 'Female', '2010-05-05', 'images/user_gabriela-abbott.jpg', '310982440', 'gabriela.abbott6429@example.com', '2025-11-06 15:32:46', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'XCSmX3z2nw', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(61, 754219914, 'Daniela Collier', 'Female', '2012-12-22', 'images/user_daniela-collier.jpg', '310616263', 'daniela.collier4065@example.com', '2025-11-06 15:32:46', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '42cym1pEvK', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(62, 757030630, 'Isabella Adams', 'Female', '1976-07-14', 'images/user_isabella-adams.jpg', '310284658', 'isabella.adams330@example.com', '2025-11-06 15:32:47', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'jqTPTuwf7r', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(63, 757102979, 'Sebastián Price', 'Male', '1982-05-05', 'images/user_sebastian-price.jpg', '310676724', 'sebastián.price4848@example.com', '2025-11-06 15:32:47', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'IL3AubAiVS', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(64, 750023814, 'Sofía Volkman', 'Female', '1995-10-05', 'images/user_sofia-volkman.jpg', '310618780', 'sofía.volkman3764@example.com', '2025-11-06 15:32:48', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'YkLL3ROuMB', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(65, 752133330, 'Gabriela Toy', 'Female', '1987-08-20', 'images/user_gabriela-toy.jpg', '310949510', 'gabriela.toy1084@example.com', '2025-11-06 15:32:48', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'ywvIEpjNZy', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(66, 753747440, 'Ana Fisher', 'Female', '1993-10-22', 'images/user_ana-fisher.jpg', '310373698', 'ana.fisher5147@example.com', '2025-11-06 15:32:49', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '9pTJzPphE5', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(67, 755600875, 'Felipe Connelly', 'Male', '2016-04-24', 'images/user_felipe-connelly.jpg', '310121066', 'felipe.connelly6907@example.com', '2025-11-06 15:32:50', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'QcNjyyj0aA', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(68, 755114434, 'Felipe Hintz', 'Male', '1987-01-23', 'images/user_felipe-hintz.jpg', '310735028', 'felipe.hintz9651@example.com', '2025-11-06 15:32:50', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'nu2DyN5ofE', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(69, 754676863, 'Camila Hansen', 'Female', '2010-08-23', 'images/user_camila-hansen.jpg', '310437174', 'camila.hansen2673@example.com', '2025-11-06 15:32:51', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'Q468Mm4iSA', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(70, 756788056, 'Sofía Rowe', 'Female', '2014-01-25', 'images/user_sofia-rowe.jpg', '310431087', 'sofía.rowe4984@example.com', '2025-11-06 15:32:51', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'aANcRVu8JK', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(71, 757984677, 'Ana Stanton', 'Female', '1994-09-07', 'images/user_ana-stanton.jpg', '310739054', 'ana.stanton1900@example.com', '2025-11-06 15:32:52', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'rxawdcxDuk', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(72, 752984433, 'Lucía Smith', 'Female', '2018-06-19', 'images/user_lucia-smith.jpg', '310651619', 'lucía.smith6943@example.com', '2025-11-06 15:32:52', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'Lvp3Q5kuqc', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(73, 758982004, 'Sofía Nicolas', 'Female', '1970-03-04', 'images/user_sofia-nicolas.jpg', '310696801', 'sofía.nicolas718@example.com', '2025-11-06 15:32:53', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'aHnazqzWlk', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(74, 750144167, 'Isabella Jakubowski', 'Female', '2022-08-19', 'images/user_isabella-jakubowski.jpg', '310461260', 'isabella.jakubowski7630@example.com', '2025-11-06 15:32:54', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '802IGQseUS', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(75, 754417472, 'Jorge Kessler', 'Male', '1996-06-06', 'images/user_jorge-kessler.jpg', '310336894', 'jorge.kessler1589@example.com', '2025-11-06 15:32:54', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '1XqIdi7Sew', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(76, 754696041, 'David Cronin', 'Male', '1998-12-27', 'images/user_david-cronin.jpg', '310709742', 'david.cronin7235@example.com', '2025-11-06 15:32:55', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'ZjY1lWPfee', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(77, 751574250, 'María Haley', 'Female', '1991-10-17', 'images/user_maria-haley.jpg', '310021702', 'maría.haley5763@example.com', '2025-11-06 15:32:55', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'jtBaPfAGmW', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(78, 759147763, 'Luis Wuckert', 'Male', '1991-12-11', 'images/user_luis-wuckert.jpg', '310750345', 'luis.wuckert1650@example.com', '2025-11-06 15:32:56', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'On5ANkMdFJ', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(79, 756765825, 'Sofía VonRueden', 'Female', '1997-06-05', 'images/user_sofia-vonrueden.jpg', '310828638', 'sofía.vonrueden4953@example.com', '2025-11-06 15:32:56', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'CbJpBXIBhs', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(80, 754920163, 'Gabriela Kuhlman', 'Female', '1993-11-01', 'images/user_gabriela-kuhlman.jpg', '310205900', 'gabriela.kuhlman6162@example.com', '2025-11-06 15:32:57', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'rkZd1vZCjQ', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(81, 758580905, 'Carlos Veum', 'Male', '1986-05-19', 'images/user_carlos-veum.jpg', '310817671', 'carlos.veum7826@example.com', '2025-11-06 15:32:57', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'dYwaU8ykxk', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(82, 758316947, 'Camila Jast', 'Female', '1971-06-20', 'images/user_camila-jast.jpg', '310364443', 'camila.jast1269@example.com', '2025-11-06 15:32:58', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'IsQgMgTFcH', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(83, 755206392, 'Luis Murray', 'Male', '1982-07-01', 'images/user_luis-murray.jpg', '310389083', 'luis.murray1069@example.com', '2025-11-06 15:32:58', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'rWHQTyicFv', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(84, 759681740, 'Isabella Corwin', 'Female', '1979-06-11', 'images/user_isabella-corwin.jpg', '310108669', 'isabella.corwin5858@example.com', '2025-11-06 15:32:59', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'anzobTnZb8', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(85, 757187242, 'Sebastián Hoeger', 'Male', '1991-03-21', 'images/user_sebastian-hoeger.jpg', '310926909', 'sebastián.hoeger2519@example.com', '2025-11-06 15:33:00', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '9p0IuFOCKQ', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(86, 752523776, 'Sebastián O\'Kon', 'Male', '2001-05-13', 'images/user_sebastian-okon.jpg', '310640466', 'sebastián.o\'kon8452@example.com', '2025-11-06 15:33:00', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'KHqqWkBnX5', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(87, 758942342, 'Carlos Turner', 'Male', '2001-11-24', 'images/user_carlos-turner.jpg', '310976826', 'carlos.turner9555@example.com', '2025-11-06 15:33:01', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'ccCXzHcMIj', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(88, 750755898, 'Felipe Collins', 'Male', '2012-11-28', 'images/user_felipe-collins.jpg', '310887152', 'felipe.collins5427@example.com', '2025-11-06 15:33:01', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'sRIRlzewnZ', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(89, 757985828, 'Juan Prohaska', 'Male', '1970-08-13', 'images/user_juan-prohaska.jpg', '310673041', 'juan.prohaska478@example.com', '2025-11-06 15:33:02', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'YVZwCaaAKj', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(90, 755723453, 'Luis Leannon', 'Male', '1974-08-02', 'images/user_luis-leannon.jpg', '310237954', 'luis.leannon9273@example.com', '2025-11-06 15:33:02', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'SMAp3iwfmz', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(91, 755556250, 'Felipe Gerhold', 'Male', '1975-09-09', 'images/user_felipe-gerhold.jpg', '310975010', 'felipe.gerhold2791@example.com', '2025-11-06 15:33:03', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '61lqzkRS7h', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(92, 750407043, 'Andrés Lueilwitz', 'Male', '1992-03-12', 'images/user_andres-lueilwitz.jpg', '310871460', 'andrés.lueilwitz6290@example.com', '2025-11-06 15:33:04', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'eXinxGq9JG', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(93, 755558408, 'Laura Deckow', 'Female', '2020-02-19', 'images/user_laura-deckow.jpg', '310918265', 'laura.deckow4367@example.com', '2025-11-06 15:33:04', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'WUBFsLUnJm', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(94, 755275486, 'Miguel Hand', 'Male', '1994-05-04', 'images/user_miguel-hand.jpg', '310079584', 'miguel.hand9561@example.com', '2025-11-06 15:33:05', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'xiORmlDYXt', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(95, 752864589, 'Ana Bins', 'Female', '1987-03-10', 'images/user_ana-bins.jpg', '310851127', 'ana.bins9130@example.com', '2025-11-06 15:33:05', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', '8c1EJSU6ul', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(96, 751741180, 'Gabriela Gerhold', 'Female', '1971-01-23', 'images/user_gabriela-gerhold.jpg', '310757118', 'gabriela.gerhold7677@example.com', '2025-11-06 15:33:06', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'gh8tHA6sGX', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(97, 754797891, 'Sebastián Langworth', 'Male', '1993-07-24', 'images/user_sebastian-langworth.jpg', '310121976', 'sebastián.langworth6667@example.com', '2025-11-06 15:33:06', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'F8HgyHIz1J', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(98, 750040673, 'Valentina Lockman', 'Female', '1986-07-09', 'images/user_valentina-lockman.jpg', '310694845', 'valentina.lockman2340@example.com', '2025-11-06 15:33:07', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'MtgWDINGUn', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(99, 750189223, 'Sofía Considine', 'Female', '2005-10-24', 'images/user_sofia-considine.jpg', '310568695', 'sofía.considine4388@example.com', '2025-11-06 15:33:08', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'DzxzwV7JCq', '2025-11-06 20:34:27', '2025-11-06 20:34:27'),
(100, 755600335, 'Jorge Grimes', 'Male', '1993-08-17', 'images/user_jorge-grimes.jpg', '310904698', 'jorge.grimes3840@example.com', '2025-11-06 15:33:09', '$2y$12$0BKGgiTVDU7NdEFFAMntQe/vMzAgo6bx0mCATV4EUb2YeVKyL9M72', 1, 'Customer', 'AkuSTq1oRY', '2025-11-06 20:34:27', '2025-11-06 20:34:27');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adoptions`
--
ALTER TABLE `adoptions`
  ADD CONSTRAINT `adoptions_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`),
  ADD CONSTRAINT `adoptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
