-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 mai 2022 à 14:36
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `little_discord`
--

-- --------------------------------------------------------

--
-- Structure de la table `channels`
--

DROP TABLE IF EXISTS `channels`;
CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `channels`
--

INSERT INTO `channels` (`id`, `name`, `description`, `date_of_creation`, `last_update`) VALUES
(1, 'MUSIC', 'music dedicated channel', '2022-05-16 18:03:30', '2022-05-18 04:53:12'),
(2, 'ART', 'art dedicated channel', '2022-05-15 11:15:42', '2022-05-18 04:24:40'),
(9, 'new', 'new new', '2022-05-16 05:24:40', NULL),
(10, 'Test Channels', 'added a test channel', '2022-05-16 14:59:33', '2022-05-17 08:33:20'),
(11, 'deleteme', 'deleteme++', '2022-05-18 13:35:00', '2022-05-18 13:35:07'),
(12, 'Another Test', 'Another Test channel for messages', '2022-05-19 07:27:47', '2022-05-19 07:27:47');

-- --------------------------------------------------------

--
-- Structure de la table `channels_users`
--

DROP TABLE IF EXISTS `channels_users`;
CREATE TABLE IF NOT EXISTS `channels_users` (
  `id_user` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sent_by` varchar(35) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(1200) NOT NULL,
  `id_channel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_channel` (`id_channel`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sent_by`, `date`, `content`, `id_channel`) VALUES
(1, '1', '2022-05-15 06:03:42', 'content test', 2),
(2, '2', '2022-05-15 06:04:22', 'hello bibi!', 1),
(3, '6', '2022-05-15 11:27:45', 'MUSICA', 1),
(4, '6', '2022-05-15 11:28:05', 'John  mod', 10),
(116, '1', '2022-05-19 07:28:27', 'zzzz', 9),
(7, '1', '2022-05-15 16:47:48', 'test\r\n', 1),
(115, '5', '2022-05-19 07:26:17', 'hey!', 9),
(9, '1', '2022-05-15 17:07:37', 'test', 1),
(33, '1', '2022-05-16 09:36:10', 'why', 2),
(32, '1', '2022-05-16 09:34:10', 'why', 2),
(31, '1', '2022-05-16 09:33:58', 'hey', 2),
(120, '5', '2022-05-19 07:46:04', 'Ciao Marco!!', 12),
(55, '1', '2022-05-17 06:38:00', 'test', 1),
(20, '2', '2022-05-16 05:25:37', 'write up', 9),
(21, '8', '2022-05-16 05:27:14', 'here', 9),
(30, '1', '2022-05-16 09:33:36', 'hi', 2),
(23, '1', '2022-05-16 05:29:58', 'bibina', 9),
(24, '1', '2022-05-16 05:30:00', 'bibina', 9),
(25, '1', '2022-05-16 05:30:03', 'bibina', 9),
(26, '2', '2022-05-16 06:37:53', 'write up', 9),
(27, '2', '2022-05-16 06:38:38', 'hey', 9),
(28, '2', '2022-05-16 06:39:05', 'hey', 1),
(34, '1', '2022-05-16 09:36:29', 'hey', 2),
(35, '1', '2022-05-16 09:36:49', 'zzz', 1),
(36, '1', '2022-05-16 09:37:20', 'ttt', 1),
(114, '10', '2022-05-19 07:25:32', 'heyz', 1),
(113, '10', '2022-05-19 07:25:14', 'hey', 1),
(112, '10', '2022-05-19 07:23:30', 'what??', 2),
(42, '1', '2022-05-16 09:50:22', 'oi', 9),
(111, '10', '2022-05-19 07:23:13', 'testing now here', 9),
(44, '1', '2022-05-16 09:50:35', 'oi2', 9),
(46, '1', '2022-05-16 09:50:53', 'here too', 9),
(47, '1', '2022-05-16 09:51:04', '???', 1),
(110, '10', '2022-05-19 07:23:02', 'testing now here', 9),
(49, '1', '2022-05-16 09:51:38', 'work or not?', 2),
(51, '1', '2022-05-16 09:52:00', 'else?', 2),
(52, '2', '2022-05-16 09:52:27', 'namitest', 1),
(109, '10', '2022-05-19 07:23:00', 'testing now here', 9),
(54, '2', '2022-05-16 09:53:34', 'bugs?', 1),
(56, '1', '2022-05-17 06:38:35', 'testnow', 1),
(57, '1', '2022-05-17 06:38:48', 'hey', 1),
(58, '1', '2022-05-17 06:38:55', 'test', 1),
(59, '1', '2022-05-17 06:39:01', 'testing', 1),
(60, '1', '2022-05-17 06:40:51', 'rrrr', 10),
(61, '1', '2022-05-17 06:50:22', 'test', 2),
(62, '1', '2022-05-17 07:20:46', 'bibi', 1),
(108, '10', '2022-05-19 07:22:48', 'retestnow', 11),
(64, '1', '2022-05-17 07:29:13', 'hey', 1),
(65, '2', '2022-05-17 07:57:22', 'test', 1),
(107, '10', '2022-05-19 07:21:01', 'test', 11),
(67, '1', '2022-05-17 08:07:44', 't\'est', 1),
(68, '1', '2022-05-17 08:07:44', 't\'est', 1),
(69, '1', '2022-05-17 08:10:38', 'uuuu', 1),
(72, '5', '2022-05-18 07:06:28', 'test now for messdiv', 1),
(73, '5', '2022-05-18 07:10:56', 'test now after reboot', 10),
(119, '11', '2022-05-19 07:45:54', 'hey ciao lilu', 12),
(77, '6', '2022-05-18 07:25:19', 'new message from me', 9),
(78, '6', '2022-05-18 07:25:33', 'seconding message', 9),
(79, '6', '2022-05-18 07:25:46', 'what if', 2),
(80, '5', '2022-05-18 07:28:42', 'lilu first message here', 2),
(81, '5', '2022-05-18 07:30:04', 'lilu first on new channel', 9),
(118, '5', '2022-05-19 07:45:41', 'test now', 12),
(84, '5', '2022-05-18 07:31:59', 'lilu & test', 9),
(117, '11', '2022-05-19 07:44:55', 'Test Marco', 12),
(86, '5', '2022-05-18 07:36:59', 'lttttttt', 9),
(87, '5', '2022-05-18 07:40:40', 'testnow', 2),
(88, '6', '2022-05-18 07:41:35', 'now?', 2),
(89, '6', '2022-05-18 07:41:43', 'butnow?', 2),
(91, '1', '2022-05-18 13:31:47', 'boh', 10),
(92, '1', '2022-05-18 13:32:20', 'boh boh', 10),
(93, '1', '2022-05-18 13:33:38', 'hey', 10),
(94, '1', '2022-05-18 13:34:43', 'what', 10),
(95, '1', '2022-05-18 13:38:24', 'test', 11),
(104, '1', '2022-05-19 04:44:40', 'hey new test', 2),
(103, '1', '2022-05-19 04:40:35', 'oi', 2),
(98, '1', '2022-05-18 16:17:59', 'wei', 2),
(99, '1', '2022-05-18 17:52:41', 'test', 2),
(106, '9', '2022-05-19 04:53:21', 'first message test', 10),
(105, '9', '2022-05-19 04:52:00', 'testnow', 2),
(121, '1', '2022-05-19 09:27:39', 'what', 9),
(122, '9', '2022-05-19 10:40:41', 'testnow', 2),
(123, '9', '2022-05-19 10:44:37', 'admin message', 11),
(124, '9', '2022-05-19 10:44:49', 'admin message', 12),
(125, '9', '2022-05-19 10:44:59', 'anotherone', 12),
(126, '1', '2022-05-19 11:27:52', 'new message', 2),
(127, '1', '2022-05-19 12:39:58', 'bibi hoi', 1),
(128, '1', '2022-05-19 12:41:47', 'test new', 2),
(129, '1', '2022-05-19 12:42:23', 'more', 1),
(134, '12', '2022-05-19 14:33:44', 'hey!', 1),
(131, '12', '2022-05-19 14:16:52', 'first message', 12),
(132, '12', '2022-05-19 14:17:18', 'here now ggg', 2),
(133, '12', '2022-05-19 14:18:15', 'hey!', 9),
(135, '12', '2022-05-19 14:34:30', 'hey!', 10),
(136, '12', '2022-05-19 14:34:52', 'ok!', 12);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(130) NOT NULL,
  `rights` int(11) NOT NULL,
  `dob` date NOT NULL,
  `data1` varchar(255) NOT NULL,
  `connected` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rights`, `dob`, `data1`, `connected`) VALUES
(1, 'bibi', 'bibi@bibi.io', '$argon2id$v=19$m=65536,t=4,p=1$VjFWSUNYa2pQT2FGWWlWQQ$3D+LKwC16brQ7zndcqtgLOu5Y+Jt3UOG+W7QXodqp9M', 42, '2004-02-02', 'example', 0),
(2, 'nami', 'nami@nami.io', '$argon2id$v=19$m=65536,t=4,p=1$RjRubjZjdFVJOUcxR2huWg$yoSSenCfvSQs1hBIueGd9hgfsxEaWRGs30UyFeXf6d0', 1, '2004-02-02', 'example', 1),
(11, 'Marcone', 'marco@marco.io', '$argon2id$v=19$m=65536,t=4,p=1$UkQzOHRqQTZ3eDFnSXNWTA$x/06gTnANb/6NutzVvMjXTojwFQ10NdUFPnhswJLkiU', 42, '2004-05-19', 'example', 0),
(10, 'test', 'test@test.io', '$argon2id$v=19$m=65536,t=4,p=1$WFNjRDhyWEdqV3pKeFFBQQ$aLw2auc6uetrgdCczFasHfqav9nkeO9pfdn9a/DDeHE', 1, '2000-02-02', 'example', 0),
(5, 'lilu', 'lilu@lilu.io', '$argon2id$v=19$m=65536,t=4,p=1$UDdRcEQ5NzZmWm9IMXh2aw$xTg1lpxRHe/3jMXznTKN2TjOnuH43ZfAKuZ1CefKK3k', 1, '2000-05-05', 'example', 0),
(6, 'john', 'john@doe.io', '$argon2id$v=19$m=65536,t=4,p=1$WkZiSC9TWS50ODBqVUt4Ng$jmRcwFhYi+Te69etfKE/C+AcfO2CDnp8MdLlVP12kms', 1, '2000-05-05', 'example', 0),
(9, 'admin', 'admin@admin.io', '$argon2id$v=19$m=65536,t=4,p=1$UE9oWVBWd29VUDZHcEZKQQ$0h+TE4v8o4VWXa03/OzRoWNWqkWA8yQ2tskw3K8fk/8', 1, '2004-05-05', 'example', 1),
(8, 'gigi', 'gigi@gigi.io', '$argon2id$v=19$m=65536,t=4,p=1$a1BMZmwuL0NLeFZkSEZNUg$iEfQcuj+AuT0/mp4xRonz8wvLSIyDWpRcVzo+97L2nk', 1, '2000-05-05', 'example', 1),
(12, 'mina', 'mina@mina.io', '$argon2id$v=19$m=65536,t=4,p=1$MWNrS3owZmxrRFFJalJrUw$Xe1QkW8lnaVf+XKhVrbDfoAKnmPl7QKm7ZBtp/UBp7U', 42, '2004-05-05', 'example', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
