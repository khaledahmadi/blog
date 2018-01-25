-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 03:21 AM
-- Server version: 5.6.17
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP Tutorial', NULL, NULL),
(2, 'JAVA Tutorial', NULL, NULL),
(3, 'Database', '2017-07-27 01:28:41', '2017-07-27 01:28:41'),
(4, 'Larave', '2017-07-27 01:29:24', '2017-07-27 01:29:24'),
(5, 'Long Read', '2017-07-30 18:40:45', '2017-07-30 18:40:45'),
(6, 'Story', '2017-08-09 21:23:02', '2017-08-09 21:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(15, 'asad', 'khaledahmadi556@yahoo.com', 'Trying to get property of non-object (View: C:\\wamp\\www\\blog\\resources\\views\\posts\\show.blade', 1, 6, '2017-08-10 09:13:59', '2017-08-10 09:51:35'),
(19, 'khaled', 'khaledahmadi455@yahoo.com', '\\show.blade.php)Trying to get property of non-object (View: C:\\wamp\\www\\blog\\resources\\views\\posts\\show.blade.php);lk;lkjdkajfkdlajfdlkajldfjalksdjf\\show.blade.php)Tryingpublic function __construct()\r\n    {\r\n        $this->middleware(''auth'');\r\n    }public function __construct()\r\n    {\r\n        $this->middleware(''auth'');\r\n    }', 1, 6, '2017-08-10 09:39:24', '2017-08-10 09:53:03'),
(20, 'jawid', 'asad@yahoo.com', '<p>well well donewell donewell donewell donewell donewell donewell <strong>donewell</strong> done</p>', 1, 5, '2017-08-11 01:40:26', '2017-08-16 09:46:53'),
(21, 'qodos', 'khaledahmadi455@yahoo.com', '{{route(''blog'')}}{{route(''blog'')}}{{{{route(''blog'')}}{{route(''blog'')}}{{route(''blog'')}}(''blog'')}}', 1, 5, '2017-08-11 01:41:43', '2017-08-11 01:41:43'),
(23, 'Khob', 'Khaledahmadi556@yahoo.com', '<p>Hi dear I don''t want you too&nbsp;</p>', 1, 8, '2017-08-14 09:05:50', '2017-08-14 09:05:50'),
(24, 'omidullah', 'khaledahmadi455@yahoo.com', '<h1>well done<strong> bro </strong></h1>\r\n<p> your <strong>the most</strong> <em>hooo</em></p>\r\n<p><span style="text-decoration:line-through;"><em>jklajdsfklajdlfkajlsdk</em></span></p>', 1, 6, '2017-08-14 09:07:43', '2017-08-15 10:33:51'),
(27, 'omidullah', 'khaledahmadi455@yahoo.com', '<p>It is really an <em>awesom</em> mobile <em>application</em> <strong>well</strong> done bro</p>', 1, 9, '2017-08-16 07:26:08', '2017-08-16 10:31:10'),
(28, 'khalid', 'khaledahmadi455@yahoo.com', '<p><em>testing</em> prupose of this <strong>blog</strong></p>', 1, 11, '2017-08-17 01:18:27', '2017-08-17 01:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2017_07_17_074306_create_posts_table', 1),
(11, '2017_07_27_073905_create_categories_table', 1),
(12, '2017_07_27_075738_categoryId_for_post_table', 2),
(13, '2017_08_01_020148_tag_table', 3),
(14, '2017_08_01_021700_create_post_tag', 3),
(15, '2017_08_07_022744_create_comments_table', 4),
(16, '2017_08_16_114311_add_image_column_to_post', 5),
(17, '2017_08_16_165258_add_user_id_column_to_post', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khaledahmadi556@yahoo.com', '$2y$10$0rt7NUIg6riQNaaPbjfTsOJcLNlcwoFBukGDJ1W3UCzc6vua4YTKm', '2017-07-30 20:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `image`, `category_id`, `body`, `created_at`, `updated_at`) VALUES
(5, 1, 'Marketing Plus', 'marketing', '1502876799.png', 3, '<p>Marketing post new versionhjkk</p>', '2017-07-31 21:36:52', '2017-08-16 09:46:39'),
(6, 1, 'Application for mobarak', 'mobarak', NULL, 3, 'testing', '2017-08-10 09:13:17', '2017-08-10 09:51:44'),
(7, 1, 'new updated postnn', 'new123', NULL, 2, 'donepublic function __construct()\r\n    {\r\n        $this->middleware(''auth'');\r\n    }public function __construct()\r\n    {\r\n        $this->middleware(''auth'');\r\n    }public function __construct()\r\n    {\r\n        $this->middleware(''auth'');\r\n    }public function __construct()\r\n    {\r\n        $this->middleware(''auth'');\r\n    }', '2017-08-10 09:52:43', '2017-08-10 09:52:43'),
(8, 1, 'new movie', 'movie', NULL, 6, '<h2>welcome</h2>\r\n<p><strong>this is the new blog which contains the followings</strong></p>\r\n<ul>\r\n<li>plugins</li>\r\n<li>menu</li>\r\n<li>sidebar</li>\r\n<li>navebar</li>\r\n</ul>', '2017-08-11 03:01:36', '2017-08-11 03:01:36'),
(9, 2, 'Mobile Application', 'mobile-app', '1502862514.jpeg', 4, '<p> This is The <strong>New</strong> Mobile Application with <strong>100</strong> Features.</p>', '2017-08-16 04:07:11', '2017-08-16 05:48:34'),
(11, 1, 'shaker', 'shaker', '1502873928.png', 5, '<p>this is the <strong>shoker</strong> blog</p>', '2017-08-16 08:58:48', '2017-08-29 04:44:53'),
(13, 1, 'google recaptcha', 'google-captchaq', '1503992130.jpg', 1, '<p>New Blog For google <strong>reCAPTCHA</strong></p>', '2017-08-29 07:34:05', '2017-08-29 07:35:30'),
(14, 1, 'google recaptcha2', 'google-captcha2', '1503993774.jpg', 1, '<p>testing</p>', '2017-08-29 08:02:54', '2017-08-29 08:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_post_id_foreign` (`post_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(13, 5, 2),
(14, 5, 6),
(15, 5, 8),
(16, 6, 6),
(17, 6, 7),
(18, 6, 8),
(19, 7, 6),
(20, 7, 7),
(21, 7, 8),
(22, 7, 9),
(23, 8, 2),
(24, 8, 6),
(25, 8, 9),
(26, 9, 6),
(27, 9, 7),
(28, 9, 8),
(32, 11, 7),
(33, 11, 9),
(34, 5, 7),
(35, 9, 2),
(36, 11, 8),
(38, 13, 9),
(39, 13, 6),
(40, 13, 8),
(41, 14, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Long Read', NULL, '2017-08-01 01:35:40'),
(6, 'Quick Tips', '2017-08-03 23:47:27', '2017-08-03 23:47:27'),
(7, 'Laravel', '2017-08-03 23:48:24', '2017-08-03 23:48:24'),
(8, 'PHP', '2017-08-03 23:54:49', '2017-08-03 23:54:49'),
(9, 'Marketing', '2017-08-09 21:23:33', '2017-08-09 21:23:33'),
(10, 'Omid', '2017-08-17 02:24:27', '2017-08-17 02:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'khaled', 'khaledahmadi556@yahoo.com', '$2y$10$BkVucFeNkNbtLs6ldagYzu69YZoaiw/wpnMhqEfX5LUxjrCz4bx7S', 'mRaCnBH6MzrGLI6dMCuTk2bAoHYhyMKQcLnMN7OWYDYKrPoTxacXjiO3v6uV', '2017-07-27 00:22:09', '2017-07-27 00:22:09'),
(2, 'Omid', 'omid@yahoo.com', '$2y$10$IWJmotOX5qaOkpKUOJksxuChcH87N7ScEybRUH6mvXSuSAo3LbONO', 'jxKf6I3w0Pi9invYXCX7UnfrtMio7LuVemFMAymoSMsIKNso0EPHD8J77ljE', '2017-08-16 10:11:21', '2017-08-16 10:11:21'),
(3, 'khaled33', 'jjjjj@yahoo.com', '$2y$10$qAZy7gOGC/glQmn5eKevguXFlbrgN9aDsFN2OZe31iwlfws4UwGmG', 'RVfc4vGTGGrGA3CyuPST0cYbGV0CieFTH5caGalaQ7jYs11LgMBZtf9L7gJa', '2017-08-23 02:56:11', '2017-08-23 02:56:11');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
