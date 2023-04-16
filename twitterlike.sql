-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 16 avr. 2023 à 19:27
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twitterlike`
--

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `tweet_id` int NOT NULL,
  `tweet_user_id` int NOT NULL DEFAULT '1',
  `tweet_nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`tweet_id`, `tweet_user_id`, `tweet_nom`, `tweet_contenu`, `tweet_tag`, `tweet_date`) VALUES
(731, 1, 'fdsr ', 'grsdfqs dsdrf qzesf sdfqzefg df qerf sd w ', '', '2023-04-12 12:48:11'),
(732, 1, 'erg', 'sdfg', '', '2023-04-12 12:49:56'),
(733, 1, 'Jean', 'Je suis Jean', '', '2023-04-12 13:12:14'),
(734, 1, 'Jean', 'Je suis moi', '', '2023-04-12 13:17:58'),
(735, 1, 'Jean', 'Oui c\'est toujouyrs moi\r\n', '', '2023-04-12 13:18:10'),
(736, 1, 'Jean', 'Oui', '', '2023-04-12 13:19:11'),
(737, 1, 'Jean', 'fg', '', '2023-04-12 13:20:46'),
(739, 1, 'Antoine', 'sdxdfbx  hfg hxgfhx gfhxfhgxfg xdf  x', '', '2023-04-12 13:28:16'),
(740, 1, 'Antoine', 'oefhs<iudf< dsf dsf <sdf', '', '2023-04-12 13:57:57'),
(746, 1, 'Antoine', 'ghdsfsqfws<erf', '', '2023-04-12 17:46:00'),
(747, 1, 'Antoine', ' zesrqserf qe esr qsefqsdr qz zeqrf sdfsqdETU OUOKW', '', '2023-04-12 17:46:08'),
(749, 1, 'Antoine', 'Je me suis amuser hier à jouer ', 'option8', '2023-04-12 19:30:37'),
(750, 1, 'Antoine', 'chgwdfvw df <wsdf< q', 'Divertissement', '2023-04-12 19:31:14'),
(751, 1, 'Antoine', '<qdf w<d thgfujywdf gqs fqs qr  drg wxdfgwfgwsd wsgxwfgwxdtgwdsfvxwfgw xdgwxdg wdfgf wxdg wdfgwsd wxg wsgwxdgwsgwx gwsdgwxd gwsdgwxdfg wsfgwxc qds tg xfw ', 'Autre', '2023-04-12 19:32:03'),
(752, 1, 'Antoine', 'gffgwsdfvwsd', 'Divertissement', '2023-04-12 19:47:08'),
(753, 1, 'Antoine', 'dfxffqsdf es<f qsefqsefq sdf ', 'Nature', '2023-04-12 20:44:07'),
(754, 1, 'Antoine', 'dsrfgwfdfwsfwf', 'Nature', '2023-04-12 21:02:27'),
(755, 1, 'Antoine', 'esfdsgd rtgqsr fsdf f qz ', 'Politique', '2023-04-12 21:03:04'),
(756, 1, 'Antoine', 'Je suis le peepeepep', 'Blagues', '2023-04-12 21:03:22'),
(757, 1, 'Antoine', 'ezssazie n 999', 'Autre', '2023-04-12 21:03:58'),
(758, 1, 'Antoine', 'C\'est une blageu de toto :\r\ntoto\r\nc\'est rigolo', 'Blagues', '2023-04-12 21:04:58'),
(759, 1, 'Antoine', 'sdjfi<wdio d sdhqsdifhis pd<sdh fpsdhfp ihhqsdiuhf iodshfpoisdhpiosdhpoish  iseh ospei poisepoirh oi oihopi oihosiih <opih <soei hpeoi hjpoih som<qi hp<qoi ho<iqse', 'Nature', '2023-04-12 21:07:37'),
(760, 1, 'Jean', 'Les jeux c\'est génial', 'Gaming', '2023-04-12 22:03:22'),
(763, 1, 'Antoine', 'J\'ai mangé KFC hier midi', 'Autre', '2023-04-12 22:35:55'),
(764, 1, 'Antoine', 'Si je puis me permettre de vous donner un conseil c\'est de manger 5 fruit et legume par jour', 'Conseil', '2023-04-12 22:36:16'),
(765, 1, 'Antoine', 'qsijfniqjsb d qeui fqzee boiquze oiuqb ouhqbz eoubquo bq oub ', 'Blagues', '2023-04-13 08:45:46'),
(766, 1, 'Antoine', 'trqzZTYREEZHYT BZ ZYS ERRS SD S GSD GS', 'Politique', '2023-04-13 08:46:20'),
(767, 1, 'Toto', 'qtyshsewhshx ys rserwrdy erwry ry d yse ', 'Blagues', '2023-04-13 08:47:00'),
(768, 1, 'Toto', '\"RTRQTHSYJUK6543r\'tqehsre(\'(\"\'rfgsbhey\"t-gr\'té4Q5HT4R', 'Blagues', '2023-04-13 09:23:23'),
(769, 1, 'Toto', 'Keie ojdjni f fq dsfqe qqf', 'Gaming', '2023-04-14 12:09:16'),
(770, 1, 'Jean', 'je suis Jean', 'Gaming', '2023-04-14 12:52:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_pseudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_biographie` text COLLATE utf8mb4_general_ci NOT NULL,
  `users_mail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_mdp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `users_salt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `users_nom`, `users_pseudo`, `users_biographie`, `users_mail`, `users_mdp`, `users_photo`, `users_salt`) VALUES
(45, 'Antoine Schmerber-Perraud', 'Toto', 'Je suis actuellement en cours de ga avec des camarades vraiment pas ouf qui ne pense qu\'à eux. Je pense que je vais changer d\'école parce que la ça ne va plus du tout avec l\'autre a coté de moi qui est toujours enervé.', 'sp.2001.antoine@free.fr', '$2y$10$I3PwWFXyPpmkQnG4KehPu.sxTZTeXckxGQkNLBoNqUbxH5fFDRszO', NULL, 'de2b84c4c9ab892234b6a50c0d9f4c00'),
(46, 'Jean Pierre De la Roche', 'Jean', 'Je m\'appelle Jean et je suis un rocher !', 'antoine.schmerber-perraud@edu.devinci.fr', '$2y$10$/vv2NDVNfdkWUoZHeJgNn.T6hS189A5C1hqxUCa2YWbw3r.XLa0Cy', NULL, 'a3bd583cee8ebb6934cd0e3795dbfb31'),
(47, 'George de la Muraille', 'Geogeo', '', 'george.muraille@gmail.com', '$2y$10$7GkQmO0wreRfN3LkxmSmz.WKE5vKHnXn4SRYTVyY5qThL0fZzJAcq', NULL, '8ab87f58517676f297f914d94f55740d');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`tweet_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `tweet_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=772;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
