-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2016 a las 22:29:20
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `socialquotient`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternatives`
--

CREATE TABLE IF NOT EXISTS `alternatives` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `text` text NOT NULL COMMENT 'Text of alternative',
  `question_id` int(11) NOT NULL COMMENT 'Question Id',
  `weight` int(11) DEFAULT NULL COMMENT 'weight of alternative',
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'is the alternative active?',
  `is_taken` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Alternatives' AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `alternatives`
--

INSERT INTO `alternatives` (`id`, `text`, `question_id`, `weight`, `is_active`, `is_taken`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', 1, 5, 1, 0, '2016-01-15 21:13:22', '2016-01-15 21:13:22', NULL),
(2, 'B', 1, 4, 1, 0, '2016-01-15 21:13:22', '2016-01-15 21:13:22', NULL),
(3, 'C', 1, 3, 1, 0, '2016-01-15 21:14:00', '2016-01-15 21:14:00', NULL),
(4, 'D', 1, 2, 1, 0, '2016-01-15 21:14:00', '2016-01-15 21:14:00', NULL),
(5, 'Don´t Know', 1, 1, 1, 0, '2016-01-15 21:14:20', '2016-01-15 21:14:20', NULL),
(6, 'higher than average', 2, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(7, 'higher than average', 3, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(8, 'higher than average', 4, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(9, 'higher than average', 5, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(10, 'higher than average', 6, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(11, 'higher than average', 7, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(12, 'higher than average', 8, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(13, 'higher than average', 9, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(14, 'higher than average', 10, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(15, 'higher than average', 11, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(16, 'higher than average', 12, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(17, 'higher than average', 13, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(18, 'higher than average', 14, 3, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(19, 'about average', 2, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(20, 'about average', 3, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(21, 'about average', 4, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(22, 'about average', 5, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(23, 'about average', 6, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(24, 'about average', 7, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(25, 'about average', 8, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(26, 'about average', 9, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(27, 'about average', 10, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(28, 'about average', 11, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(29, 'about average', 12, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(30, 'about average', 13, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(31, 'about average', 14, 2, 1, 1, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(32, 'lower than average', 2, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(33, 'lower than average', 3, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(34, 'lower than average', 4, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(35, 'lower than average', 5, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(36, 'lower than average', 6, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(37, 'lower than average', 7, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(38, 'lower than average', 8, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(39, 'lower than average', 9, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(40, 'lower than average', 10, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(41, 'lower than average', 11, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(42, 'lower than average', 12, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(43, 'lower than average', 13, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL),
(44, 'lower than average', 14, 1, 1, 0, '2016-01-15 21:35:22', '2016-01-15 21:35:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `user_id` int(11) NOT NULL COMMENT 'User Id',
  `question_id` int(11) NOT NULL COMMENT 'Question Id',
  `alternative_id` int(11) NOT NULL COMMENT 'Alternative Id',
  `target_id` int(11) DEFAULT NULL COMMENT 'Target (other user id)',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:Valid / 0: Invalid',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `question` (`question_id`),
  KEY `alternative` (`alternative_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='selected alternative by user' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bands`
--

CREATE TABLE IF NOT EXISTS `bands` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'group name',
  `start_date` date DEFAULT NULL COMMENT 'start date for quiz',
  `end_date` date DEFAULT NULL COMMENT 'end date for quiz',
  `email` varchar(255) NOT NULL COMMENT 'email owner',
  `zip` varchar(255) NOT NULL COMMENT 'zip code',
  `description` text NOT NULL COMMENT 'group description',
  `token` varchar(50) NOT NULL COMMENT 'security',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:Active / 0:Inactive',
  `close_date` date DEFAULT NULL,
  `is_processed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:No / 1:Si',
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `token` (`token`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Groups for quiz' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `text` text NOT NULL COMMENT 'Question''s text',
  `type` enum('first','second') NOT NULL COMMENT 'type of question',
  `order` int(11) NOT NULL COMMENT 'Ordenation of the questions in the quiz',
  `trait` tinyint(1) NOT NULL DEFAULT '0',
  `global_score` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'is the question active?',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Quiz''s Questions' AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `text`, `type`, `order`, `trait`, `global_score`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Who is more likely to save a dog if it''s drowning in a river?', 'first', 1, 0, NULL, 1, '2016-01-15 21:08:19', '2016-01-15 21:08:19', NULL),
(2, 'My general happiness is', 'second', 1, 0, NULL, 1, '2016-01-15 21:23:49', '2016-04-14 21:03:55', NULL),
(3, 'My intelligence is', 'second', 2, 0, NULL, 1, '2016-01-15 21:23:49', '2016-04-14 21:03:55', NULL),
(4, 'My Grade Point Average (in high school) is/ was', 'second', 3, 0, NULL, 1, '2016-01-15 21:25:05', '2016-04-14 21:03:55', NULL),
(5, 'My athletic ability is', 'second', 4, 1, NULL, 1, '2016-01-15 21:25:05', '2016-04-14 21:03:51', NULL),
(6, 'My liking ]for most people is', 'second', 5, 1, NULL, 1, '2016-01-15 21:26:12', '2016-04-14 21:03:55', NULL),
(7, 'My upbeat, positive attitude is', 'second', 6, 1, NULL, 1, '2016-01-15 21:26:12', '2016-04-14 21:03:55', NULL),
(8, 'The number of my smiles per day is', 'second', 7, 1, NULL, 1, '2016-01-15 21:27:20', '2016-04-14 21:03:51', NULL),
(9, 'My verbal skills are', 'second', 8, 1, NULL, 1, '2016-01-15 21:27:20', '2016-04-14 21:03:55', NULL),
(10, 'My sense of humor is', 'second', 9, 1, NULL, 1, '2016-01-15 21:28:34', '2016-04-14 21:03:55', NULL),
(11, 'The courtesy I show to others is', 'second', 10, 1, NULL, 1, '2016-01-15 21:28:34', '2016-04-14 21:03:51', NULL),
(12, 'My success in activities is', 'second', 11, 1, NULL, 1, '2016-01-15 21:29:43', '2016-04-14 21:03:55', NULL),
(13, 'Others consider me to be a leader', 'second', 12, 1, NULL, 1, '2016-01-15 21:29:43', '2016-04-14 21:03:55', NULL),
(14, 'My physical attractiveness is', 'second', 13, 1, NULL, 1, '2016-01-15 21:30:37', '2016-04-14 21:03:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'user name',
  `email` varchar(255) DEFAULT NULL COMMENT 'email address',
  `group_id` int(11) NOT NULL COMMENT 'group id',
  `photo` varchar(255) DEFAULT NULL COMMENT 'photo url',
  `gender` enum('male','female') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `description` text,
  `token` varchar(50) NOT NULL COMMENT 'security',
  `state_email` enum('not sent','inscription','take','checked') NOT NULL DEFAULT 'not sent' COMMENT 'Estado de Envío de Email',
  `take_quiz` enum('no taken','taken first','taken second') NOT NULL DEFAULT 'no taken' COMMENT 'State if user take a quiz',
  `scoreA` varchar(255) DEFAULT NULL COMMENT 'Score of the first quiz',
  `scoreB` varchar(255) DEFAULT NULL COMMENT 'Score of the second quiz',
  `is_download` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `email` (`email`),
  KEY `group` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
