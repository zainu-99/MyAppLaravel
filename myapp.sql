-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2020 pada 13.37
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '2020-03-07 06:47:22', '2020-03-06 23:47:22'),
(2, 'Programmer', 'Programmer', '2020-03-07 06:47:34', '2020-03-06 23:47:34'),
(3, 'Content Writter', 'Content Writter', '2020-03-06 23:47:51', '2020-03-06 23:47:51'),
(4, 'Editor', 'Editor', '2020-03-10 06:23:18', '2020-03-09 23:23:18'),
(5, 'Manager', 'Manager', '2020-11-25 06:59:20', '2020-11-24 23:59:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_level`
--

CREATE TABLE `group_level` (
  `id` bigint(20) NOT NULL,
  `id_group` bigint(20) NOT NULL,
  `group_level_id` bigint(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_level`
--

INSERT INTO `group_level` (`id`, `id_group`, `group_level_id`, `note`, `created_at`, `updated_at`) VALUES
(19, 1, NULL, 'Admin', '2020-11-26 03:14:24', '2020-11-25 20:14:24'),
(20, 2, NULL, 'Programer', '2020-03-10 06:24:24', '2020-03-09 23:24:24'),
(21, 3, NULL, 'Content Writter', '2020-03-08 04:34:25', '2020-03-07 21:34:25'),
(22, 4, NULL, 'Editor', '2020-03-07 14:23:43', '2020-03-07 07:23:43'),
(24, 1, NULL, NULL, '2020-11-25 22:19:13', '2020-11-25 22:19:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_app`
--

CREATE TABLE `log_app` (
  `id` bigint(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `table_name` text NOT NULL,
  `data_before` text NOT NULL,
  `data_after` text NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_error`
--

CREATE TABLE `log_error` (
  `id` bigint(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `message_error` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_app`
--

CREATE TABLE `menu_app` (
  `id` bigint(20) NOT NULL,
  `id_role` bigint(20) NOT NULL,
  `menu_text` varchar(50) DEFAULT NULL,
  `menu_app_id` bigint(20) DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `order_sort` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_app`
--

INSERT INTO `menu_app` (`id`, `id_role`, `menu_text`, `menu_app_id`, `icon`, `order_sort`, `created_at`, `updated_at`) VALUES
(41237, 2, 'Admin System', NULL, '<i class=\"nav-icon fas fa-users-cog\"></i>', 1, '2020-03-06 20:25:25', '2020-03-06 13:25:25'),
(41243, 8, 'Users', 41237, '<i class=\"nav-icon far fas fa-users\"></i>', 1, '2020-11-26 02:38:28', '2020-11-25 19:38:28'),
(41244, 9, 'Group', 41247, '<i class=\"nav-icon fas fa-layer-group\"></i>', 1, '2020-11-26 06:35:43', '2020-11-25 23:35:43'),
(41245, 10, 'Roles', 41247, '<i class=\"nav-icon fas fa-tag\"></i>', 2, '2020-11-26 02:33:29', '2020-11-25 19:33:29'),
(41246, 11, 'Menu', 41247, '<i class=\"nav-icon fas fa-chevron-circle-down\"></i>', 3, '2020-11-26 02:33:43', '2020-11-25 19:33:43'),
(41247, 16, 'Master Data', NULL, '<i class=\"nav-icon fas fa-database\"></i>', 2, '2020-11-26 02:33:14', '2020-11-25 19:33:14'),
(41250, 13, 'Group', 41237, '<i class=\"nav-icon fas fa-circle\"></i>', 2, '2020-11-25 19:37:18', '2020-11-25 19:37:18'),
(41251, 17, 'Setting', NULL, '<i class=\"nav-icon fas fa-cog\"></i>', 3, '2020-11-28 12:34:24', '2020-11-28 05:34:24'),
(41252, 18, 'Change Profile', 41251, '<i class=\"nav-icon fas fa-circle\"></i>', 1, '2020-11-28 05:34:45', '2020-11-28 05:34:45'),
(41253, 19, 'Change Password', 41251, '<i class=\"nav-icon fas fa-circle\"></i>', 2, '2020-11-28 05:35:04', '2020-11-28 05:35:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `note` text DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `controller` text DEFAULT NULL,
  `accessview` tinyint(1) NOT NULL DEFAULT 0,
  `accessadd` tinyint(1) NOT NULL DEFAULT 0,
  `accessedit` tinyint(1) NOT NULL DEFAULT 0,
  `accessdelete` tinyint(1) NOT NULL DEFAULT 0,
  `accessprint` tinyint(1) NOT NULL DEFAULT 0,
  `accesscustom` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `note`, `url`, `controller`, `accessview`, `accessadd`, `accessedit`, `accessdelete`, `accessprint`, `accesscustom`, `created_at`, `updated_at`) VALUES
(2, 'Admin System', NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, '2020-11-26 02:25:51', '2020-11-25 19:25:51'),
(8, 'User', '-', '/appdashboard/adminsystem/user', 'User', 1, 1, 1, 1, 1, 0, '2020-11-26 02:23:15', '2020-11-25 19:23:15'),
(9, 'Group', NULL, '/appdashboard/masterdata/group', 'Group', 1, 1, 1, 1, 0, 0, '2020-11-26 02:23:33', '2020-11-25 19:23:33'),
(10, 'Role', NULL, '/appdashboard/masterdata/role', 'Role', 1, 1, 1, 1, 0, 0, '2020-11-26 03:29:14', '2020-11-25 20:29:14'),
(11, 'Menu', NULL, '/appdashboard/masterdata/menu', 'MenuApp', 1, 0, 0, 0, 0, 0, '2020-11-26 02:25:56', '2020-11-25 19:25:56'),
(12, 'User Access', NULL, '/appdashboard/adminsystem/user/useraccess/{iduser}', 'UserRole', 1, 0, 0, 0, 0, 0, '2020-11-26 03:50:51', '2020-11-25 20:49:54'),
(13, 'Group Level', NULL, '/appdashboard/adminsystem/grouplevel', 'GroupLevel', 1, 0, 0, 0, 0, 0, '2020-11-26 03:29:03', '2020-11-25 20:29:03'),
(14, 'User Group Level', NULL, '/appdashboard/adminsystem/user/usergrouplevel/{iduser}', 'UserGroupLevel', 1, 0, 0, 0, 0, 0, '2020-11-26 03:51:27', '2020-11-25 20:51:27'),
(15, 'Role Group Level', NULL, '/appdashboard/adminsystem/grouplevel/rolegrouplevel/{idgroup}', 'RoleGroupLevel', 1, 0, 0, 0, 0, 0, '2020-11-26 03:51:10', '2020-11-25 20:51:10'),
(16, 'Master Data', NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, '2020-11-25 19:24:45', '2020-11-25 19:24:45'),
(17, 'Setting', NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, '2020-11-28 05:32:00', '2020-11-28 05:32:00'),
(18, 'Change Profile', NULL, '/appdashboard/setting/changeprofile', 'ChangeProfile', 1, 0, 1, 0, 0, 0, '2020-11-28 05:33:33', '2020-11-28 05:33:33'),
(19, 'Change Password', NULL, '/appdashboard/setting/changepassword', 'ChangePassword', 1, 0, 1, 0, 0, 0, '2020-11-28 05:33:52', '2020-11-28 05:33:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_group_level`
--

CREATE TABLE `role_group_level` (
  `id` bigint(20) NOT NULL,
  `id_role` bigint(20) NOT NULL,
  `id_group_level` bigint(20) NOT NULL,
  `isview` tinyint(1) NOT NULL DEFAULT 0,
  `isadd` tinyint(1) NOT NULL DEFAULT 0,
  `isedit` tinyint(1) NOT NULL DEFAULT 0,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0,
  `isprint` tinyint(1) NOT NULL DEFAULT 0,
  `iscustom` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_group_level`
--

INSERT INTO `role_group_level` (`id`, `id_role`, `id_group_level`, `isview`, `isadd`, `isedit`, `isdelete`, `isprint`, `iscustom`, `created_at`, `updated_at`) VALUES
(14, 8, 19, 1, 1, 1, 1, 1, 0, '2020-11-28 12:35:34', '2020-11-28 05:35:34'),
(29, 9, 19, 1, 1, 1, 1, 0, 0, '2020-11-28 12:35:47', '2020-11-28 05:35:47'),
(30, 10, 19, 1, 1, 1, 1, 0, 0, '2020-11-28 12:35:49', '2020-11-28 05:35:49'),
(31, 11, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 12:35:41', '2020-11-28 05:35:41'),
(32, 12, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 12:35:38', '2020-11-28 05:35:38'),
(33, 13, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 12:35:27', '2020-11-28 05:35:27'),
(34, 14, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 12:35:38', '2020-11-28 05:35:38'),
(35, 15, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 12:35:30', '2020-11-28 05:35:30'),
(36, 2, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 12:35:23', '2020-11-28 05:35:23'),
(38, 16, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 12:35:25', '2020-11-28 05:35:25'),
(39, 17, 19, 1, 0, 0, 0, 0, 0, '2020-11-28 05:35:26', '2020-11-28 05:35:26'),
(40, 19, 19, 1, 0, 1, 0, 0, 0, '2020-11-28 12:35:50', '2020-11-28 05:35:50'),
(41, 18, 19, 1, 0, 1, 0, 0, 0, '2020-11-28 12:35:50', '2020-11-28 05:35:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_app`
--

CREATE TABLE `setting_app` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `value` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `email_verified_at`, `no_hp`, `address`, `avatar`, `gender`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '20201127001', 'admin', 'admin@admin.com', NULL, '-', '-', 'files\\users photo\\IMG_20200215_203123_622-min.jpg', 1, 1, '$2y$10$f0PDApCPYD8aEiqCCXIsTueoWvasYI/eTYuMC5t52gwcApgqdO1VK', '0q2SLTBDw5EXskrjklRTOU8FiOLE1w0NNHQeXgLtxCJRcLWuuNRXGevI7bkk', '2020-03-03 01:16:43', '2020-11-28 05:37:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group_level`
--

CREATE TABLE `user_group_level` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_group_level` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_group_level`
--

INSERT INTO `user_group_level` (`id`, `id_user`, `id_group_level`, `created_at`, `updated_at`) VALUES
(36, 1, 19, '2020-03-08 01:26:11', '2020-03-08 01:26:11'),
(43, 1, 20, '2020-11-25 23:07:20', '2020-11-25 23:07:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_role` bigint(20) NOT NULL,
  `allow_view` tinyint(1) NOT NULL DEFAULT 0,
  `allow_add` tinyint(1) NOT NULL DEFAULT 0,
  `allow_edit` tinyint(1) NOT NULL DEFAULT 0,
  `allow_delete` tinyint(1) NOT NULL DEFAULT 0,
  `allow_print` tinyint(1) NOT NULL DEFAULT 0,
  `allow_custom` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `id_user`, `id_role`, `allow_view`, `allow_add`, `allow_edit`, `allow_delete`, `allow_print`, `allow_custom`, `created_at`, `updated_at`) VALUES
(3, 1, 8, 1, 1, 1, 1, 1, NULL, '0000-00-00 00:00:00', '2020-11-25 23:23:59'),
(5, 1, 2, 1, 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 12, 1, 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 9, 1, 1, 1, 1, 0, NULL, '0000-00-00 00:00:00', '2020-11-25 23:22:53'),
(13, 1, 10, 1, 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 11, 1, 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 13, 1, 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '2020-03-09 21:58:51'),
(16, 1, 14, 1, 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 15, 1, 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 16, 1, 1, 1, 1, 1, NULL, '2020-11-25 23:06:42', '2020-11-25 23:06:59'),
(19, 1, 17, 1, 0, 0, 0, 0, '0', '2020-11-28 05:36:04', '2020-11-28 05:36:04'),
(20, 1, 19, 1, 0, 1, 0, 0, '0', '2020-11-28 05:36:07', '2020-11-28 05:36:08'),
(21, 1, 18, 1, 0, 1, 0, 0, '0', '2020-11-28 05:36:07', '2020-11-28 05:36:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `group_level`
--
ALTER TABLE `group_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`group_level_id`),
  ADD KEY `id_group` (`id_group`);

--
-- Indeks untuk tabel `log_app`
--
ALTER TABLE `log_app`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `log_error`
--
ALTER TABLE `log_error`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_app`
--
ALTER TABLE `menu_app`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_parent` (`menu_app_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indeks untuk tabel `role_group_level`
--
ALTER TABLE `role_group_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_group_level` (`id_group_level`);

--
-- Indeks untuk tabel `setting_app`
--
ALTER TABLE `setting_app`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_group_level`
--
ALTER TABLE `user_group_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_group_level` (`id_group_level`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `group_level`
--
ALTER TABLE `group_level`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `log_app`
--
ALTER TABLE `log_app`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_error`
--
ALTER TABLE `log_error`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_app`
--
ALTER TABLE `menu_app`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41254;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `role_group_level`
--
ALTER TABLE `role_group_level`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `setting_app`
--
ALTER TABLE `setting_app`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_group_level`
--
ALTER TABLE `user_group_level`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `group_level`
--
ALTER TABLE `group_level`
  ADD CONSTRAINT `group_level_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_level_ibfk_2` FOREIGN KEY (`group_level_id`) REFERENCES `group_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_app`
--
ALTER TABLE `log_app`
  ADD CONSTRAINT `log_app_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu_app`
--
ALTER TABLE `menu_app`
  ADD CONSTRAINT `menu_app_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_app_ibfk_2` FOREIGN KEY (`menu_app_id`) REFERENCES `menu_app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_group_level`
--
ALTER TABLE `role_group_level`
  ADD CONSTRAINT `role_group_level_ibfk_1` FOREIGN KEY (`id_group_level`) REFERENCES `group_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_group_level_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_group_level`
--
ALTER TABLE `user_group_level`
  ADD CONSTRAINT `user_group_level_ibfk_1` FOREIGN KEY (`id_group_level`) REFERENCES `group_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_group_level_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
