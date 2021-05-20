-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2021 às 20:59
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cretch`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_13_131202_create_partidas_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2021_05_13_180858_create_sessions_table', 2),
(8, '2021_05_14_133534_create_sessions_table', 3),
(9, '2021_05_14_150700_add_user_id_to_partidas_table', 4),
(11, '2021_05_19_142352_create_partidas_user_table', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partidas`
--

CREATE TABLE `partidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_casa` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_fora` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadio` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `competicao` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emissoras` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmados` int(11) NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `partidas`
--

INSERT INTO `partidas` (`id`, `time_casa`, `time_fora`, `estadio`, `data`, `horario`, `competicao`, `emissoras`, `confirmados`, `descricao`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'São Paulo', 'Santos', 'Pacaembu', '2005-05-05', '16:00:00', 'Amistoso', 'ESPN Brasil', 0, 'hhhhhghghghfhghf', 'f150d0cf4e8edcaa9bf0154e13eb92f2.jpg', '2021-05-14 21:26:59', '2021-05-14 21:26:59', 10),
(3, 'São Paulo', 'Santos', 'Pacaembu', '2020-11-02', '16:30:00', 'Amistoso', 'ESPN Brasil', 0, 'kkkkkkkkkkkkkkkk', 'd0e7c5a641b93bc6b3f8bfa52da7d1d7.jpg', '2021-05-14 21:36:53', '2021-05-14 21:36:53', 10),
(12, 'Palmeiras', 'São Paulo', 'Arena Pernambuco', '2021-07-05', '21:45:00', 'Campeonato Brasileiro', 'TV Globo (SP)', 0, 'aaaaaaaaaaaaa', 'e2f4e4dcee021ece11c75957fc26c2f7.jpg', '2021-05-18 20:17:32', '2021-05-18 20:54:21', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partidas_user`
--

CREATE TABLE `partidas_user` (
  `partidas_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `partidas_user`
--

INSERT INTO `partidas_user` (`partidas_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL),
(12, 2, NULL, NULL),
(12, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0tWscr42XuGdin6ISHru5OoaQyGs1bZ1G2CFwjze', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJhZzlqRGk2cmtDcTVHaWNBQnlNSEpvS04yNG1QdHd6bTlURjZXSGVmIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjt9', 1621537151);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeramie Padberg', 'ywilderman@example.org', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'E4C0cKr6Xu', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(2, 'Miss Georgiana Rempel', 'estel13@example.org', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Ft1g0DmVqKumIcg3TGmPDtSvaB3U8zopCPN314o4AD9eo8AUfOSVhaVAhGUn', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(3, 'Marcia Cruickshank', 'jennifer.schaefer@example.com', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vWTPZ6If7Z', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(4, 'Luigi Morar', 'parker.ezra@example.net', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'A5Ux1MtTVr', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(5, 'Mr. Adolfo Olson', 'jason.hettinger@example.org', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '0NooyaRMWY', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(6, 'Nella Nicolas', 'ekonopelski@example.org', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'FHlCRYw1iu', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(7, 'Fern Wiza', 'patsy.tillman@example.org', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'i8Vw6Qg94k', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(8, 'Easter Prosacco', 'bernadette12@example.com', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'UBUSRIbJNX', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(9, 'Montana Kemmer', 'bmarvin@example.org', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'W5wDDuhmQ5', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(10, 'Delphia Keebler', 'kallie.daniel@example.com', '2021-05-13 17:21:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'uWYxNDmRQPbNmjQxyQdlJwkhNiucTzOsdBDM2AC7Krr78f5UqEjYyp54fKyX', '2021-05-13 17:21:57', '2021-05-13 17:21:57'),
(11, 'Leonardo Vasconcelos', 'leovasc5@hotmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2021-05-14 17:43:32', '2021-05-14 17:43:32');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING HASH;

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partidas_user_id_foreign` (`user_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(250));

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`) USING HASH;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
