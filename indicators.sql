-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 22 2015 г., 12:24
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `trading_time`
--

-- --------------------------------------------------------

--
-- Структура таблицы `indicators`
--

CREATE TABLE IF NOT EXISTS `indicators` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `pdfGuideName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `videoLink` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `videoId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `indicators`
--

INSERT INTO `indicators` (`id`, `title`, `pdfGuideName`, `videoLink`, `videoId`, `updatedAt`) VALUES
(1, 'BearCage', 'BearCage.pdf', 'https://www.youtube.com/watch?v=T-vtPXE2eyU', 'T-vtPXE2eyU', '2015-06-22 11:58:54'),
(2, 'BullWhip', 'BullWhip.pdf', 'https://www.youtube.com/watch?v=cl38cXqRxMw', 'cl38cXqRxMw', '2015-06-22 11:59:08'),
(3, 'Composite Range Deviation Indicator', 'Composite Range Deviation Indicator.pdf', NULL, NULL, '2015-06-22 11:39:15'),
(4, 'Composite Time Volatility Indicator', 'Composite Time Volatility Indicator.pdf', NULL, NULL, '2015-06-22 11:39:53'),
(5, 'Gravity Indicator', 'Gravity Indicator.pdf', 'https://www.youtube.com/watch?v=gYFb9Bl_3Gs', 'gYFb9Bl_3Gs', '2015-06-22 11:59:24'),
(6, 'HiLoCount', 'HiLoCount.pdf', 'https://www.youtube.com/watch?v=sUkRenVwUOY', 'sUkRenVwUOY', '2015-06-22 12:00:03'),
(7, 'Peak Energy HA', 'Peak Energy HA.pdf', NULL, NULL, '2015-06-22 11:41:16'),
(8, 'Peak Expansion HA', 'Peak Expansion HA.pdf', NULL, NULL, '2015-06-22 11:41:40'),
(9, 'Peak HA', 'Peak HA.pdf', NULL, NULL, '2015-06-22 11:42:00'),
(10, 'Peak Long, Medium and Short Term', 'Peak Long, Medium and Short Term.pdf', NULL, NULL, '2015-06-22 11:42:24'),
(11, 'Peak', 'Peak.pdf', NULL, NULL, '2015-06-22 11:42:55'),
(12, 'PowwerPlay', 'PowwerPlay.pdf', 'https://www.youtube.com/watch?v=UnyuLJx5JgI', 'UnyuLJx5JgI', '2015-06-22 12:00:59'),
(13, 'Range Deviation Pivots (Historical)', 'Range Deviation Pivots (Historical).pdf', 'https://www.youtube.com/watch?v=Zblrexdl4OQ', 'Zblrexdl4OQ', '2015-06-22 11:59:45'),
(14, 'Range Deviation Pivots', 'Range Deviation Pivots.pdf', 'https://www.youtube.com/watch?v=Zblrexdl4OQ', 'Zblrexdl4OQ', '2015-06-22 11:59:38'),
(15, 'SlammDunk', 'SlammDunk.pdf', 'https://www.youtube.com/watch?v=-gDHWnhoLXs', '-gDHWnhoLXs', '2015-06-22 12:00:32'),
(16, 'Time Average Bands', 'Time Average Bands.pdf', 'https://www.youtube.com/watch?v=op7q7OThaSM', 'op7q7OThaSM', '2015-06-22 11:58:41'),
(17, 'Time Continuation', 'Time Continuation.pdf', 'https://www.youtube.com/watch?v=qXAD0UEsylQ', 'qXAD0UEsylQ', '2015-06-22 12:00:17'),
(18, 'Time Momentum Indicator', 'Time Momentum Indicator.pdf', NULL, NULL, '2015-06-22 11:46:35'),
(19, 'Time Steps Indicator', 'Time Steps Indicator.pdf', 'https://www.youtube.com/watch?v=PLLMh-C2wYI', 'PLLMh-C2wYI', '2015-06-22 11:57:50'),
(20, 'Time Volume Indicator', 'Time Volume Indicator.pdf', 'https://www.youtube.com/watch?v=1KUcYFKb2nE', '1KUcYFKb2nE', '2015-06-22 12:01:32'),
(21, 'UFO-POPS', 'UFO-POPS.pdf', 'https://www.youtube.com/watch?v=H_DO6bmbNDQ', 'H_DO6bmbNDQ', '2015-06-22 11:58:26'),
(22, 'Volatility Time Bands', 'Volatility Time Bands.pdf', 'https://www.youtube.com/watch?v=d5CZYO-Kkqw', 'd5CZYO-Kkqw', '2015-06-22 11:57:24'),
(23, 'VP Indicator', 'VP Indicator.pdf', NULL, NULL, '2015-06-22 11:47:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
