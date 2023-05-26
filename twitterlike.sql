-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 26 mai 2023 à 21:00
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
  `tweet_date` datetime NOT NULL,
  `tweet_media` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`tweet_id`, `tweet_user_id`, `tweet_nom`, `tweet_contenu`, `tweet_tag`, `tweet_date`, `tweet_media`) VALUES
(733, 1, 'Jean', 'Je suis Jean', '', '2023-04-12 13:12:14', ''),
(734, 1, 'Jean', 'Je suis moi', '', '2023-04-12 13:17:58', ''),
(735, 1, 'Jean', 'Oui c\'est toujouyrs moi\r\n', '', '2023-04-12 13:18:10', ''),
(736, 1, 'Jean', 'Oui', '', '2023-04-12 13:19:11', ''),
(737, 1, 'Jean', 'fg', '', '2023-04-12 13:20:46', ''),
(760, 1, 'Jean', 'Les jeux c\'est génial', 'Gaming', '2023-04-12 22:03:22', ''),
(767, 1, 'Toto', 'qtyshsewhshx ys rserwrdy erwry ry d yse ', 'Blagues', '2023-04-13 08:47:00', ''),
(768, 1, 'Toto', '\"RTRQTHSYJUK6543r\'tqehsre(\'(\"\'rfgsbhey\"t-gr\'té4Q5HT4R', 'Blagues', '2023-04-13 09:23:23', ''),
(769, 1, 'Toto', 'Keie ojdjni f fq dsfqe qqf', 'Gaming', '2023-04-14 12:09:16', ''),
(770, 1, 'Jean', 'je suis Jean', 'Gaming', '2023-04-14 12:52:54', ''),
(772, 1, 'Geogeo', 'dxgytfuy__ftyfxtyjti_oèt_', 'Gaming', '2023-04-17 12:02:47', ''),
(773, 1, 'Geogeo', 'naeIFAZPIEHRJ JJ', 'Culture', '2023-04-17 12:04:42', ''),
(774, 1, 'lolo', 'jyj', 'Nature', '2023-05-22 13:43:59', ''),
(775, 1, 'lolo', 'ezee', 'Nature', '2023-05-22 13:44:39', ''),
(776, 1, 'lolo', 'fe', 'Nature', '2023-05-22 13:45:25', ''),
(777, 1, 'lolo', 'dsfsd', 'Nature', '2023-05-22 13:46:27', ''),
(778, 1, 'lolo', 'sDQ', 'Nature', '2023-05-22 13:49:05', ''),
(779, 1, 'lolo', 'dqdq', 'Nature', '2023-05-22 13:49:49', ''),
(780, 1, 'lolo', 'trt', 'Nature', '2023-05-22 13:55:01', ''),
(781, 1, 'lolo', 'gefererDDS', 'Nature', '2023-05-22 14:35:54', ''),
(782, 1, 'lolo', 'sdfs<f<d', 'Nature', '2023-05-22 14:41:38', ''),
(783, 1, 'lolo', 'je suis l\'a^pprend', 'Nature', '2023-05-22 14:46:14', ''),
(784, 1, 'Geogeo', 'efqsf qsrfgsr fgsdffg qdff ', 'Nature', '2023-05-23 17:36:03', ''),
(785, 1, 'Toto', 'foiusdgiuhsduyfgzo hioh oiqshtoiqhsriuqzh oiqhs\' otiuqzh ', 'Gaming', '2023-05-23 18:05:51', 'Media/Tweet/NaturalStone05_2K_Height.png'),
(786, 1, 'Toto', 'iytft  tyfuytrf yrtyjt', 'Nature', '2023-05-23 18:07:26', 'Media/Tweet/FZH5.2.png'),
(787, 1, 'Toto', 'je suis moi et tu es toi', 'Nature', '2023-05-23 21:53:47', ''),
(788, 1, 'Jean', 'ertysrdt rtqer tqe', 'Politique', '2023-05-24 13:53:11', 'Media/Tweet/Marbre.jpeg'),
(789, 1, 'Jean', ' z\'qtqet qertqert ', 'Nature', '2023-05-24 13:54:09', 'Media/Tweet/Worldmap Theme.mp3'),
(790, 1, 'Jean', 'dfeff e fe fe ', 'Nature', '2023-05-24 13:54:37', 'Media/Tweet/1232.png'),
(792, 1, 'Toto', 'je suis la', 'Cinéma', '2023-05-24 15:23:05', ''),
(793, 1, 'Toto', 'oui oui oui', 'Nature', '2023-05-24 15:23:19', ''),
(794, 1, 'Toto', 'Essai n°125454 ', 'Nature', '2023-05-24 15:24:54', ''),
(795, 1, 'Toto', 'Je sais plus quoi ecrire', 'Autre', '2023-05-24 15:25:12', ''),
(796, 1, 'Toto', 'dfgdfg ', 'Nature', '2023-05-24 15:26:59', ''),
(797, 1, 'Toto', 'peut etre que ça va fonctionner cette fois ci ?', 'Nature', '2023-05-24 15:31:33', ''),
(798, 1, 'Toto', 'Essai n°125455', 'Cinéma', '2023-05-25 15:25:44', ''),
(799, 1, 'Toto', 'uyg', 'Divertissement', '2023-05-25 15:27:40', ''),
(800, 1, 'Toto', 'Essai rfqredtfqe', 'Nature', '2023-05-25 18:07:51', ''),
(801, 1, 'Toto', 'fggg g g ', 'Nature', '2023-05-25 18:09:26', ''),
(802, 1, 'Toto', 'cvgghxfdg', 'Divertissement', '2023-05-25 18:10:13', ''),
(803, 1, 'Toto', 'rtyyd', 'Nature', '2023-05-25 18:10:27', ''),
(804, 1, 'Toto', 'tsre', 'Nature', '2023-05-25 18:10:51', ''),
(805, 1, 'Jean', 'dfsgwd', 'Cinéma', '2023-05-26 01:29:56', ''),
(806, 1, 'Jean', 'fsdfdfsgwd', 'Nature', '2023-05-26 01:32:29', 'Media/Tweet/NaturalStone05_2K_Normal.png'),
(807, 1, 'Jean', 'vgvf f sdf se ', 'Politique', '2023-05-26 01:38:32', 'Media/Tweet/NaturalStone05_2K_Height.png'),
(808, 1, 'Jean', 'Essai n°324645645', 'Culture', '2023-05-26 01:42:29', ''),
(809, 1, 'Jean', 'Essai n°324645646', 'Divertissement', '2023-05-26 01:46:06', ''),
(810, 1, 'Jean', 'Essai n°324645647', 'Autre', '2023-05-26 01:47:44', ''),
(811, 1, 'Jean', 'sdfqsdf ', 'Politique', '2023-05-26 12:12:51', ''),
(812, 1, 'Jean', 'sdfqsdf ', 'Politique', '2023-05-26 12:41:41', ''),
(813, 1, 'Jean', 'sdfqsdf ', 'Politique', '2023-05-26 12:48:31', ''),
(814, 1, 'Jean', 'sdfqsdf ', 'Politique', '2023-05-26 12:49:12', ''),
(816, 1, 'Jean', 'fsdhufz', 'Nature', '2023-05-26 13:29:59', ''),
(817, 1, 'Jean', 'efzsdf', 'Culture', '2023-05-26 13:33:03', 'Media/Tweet/vecteezy_electric-guitar_1207404.png'),
(822, 1, 'Jean', 'fsdhufz', 'Blagues', '2023-05-26 15:17:45', 'Media/Tweet/calirvoyance.png'),
(823, 1, 'Jean', 'Je sisos  iunsijjd n i ezj niQN NOHBO UHBOJ HJB IJHB HGHH GV HG HGVHGHV VHGV', 'Nature', '2023-05-26 15:19:37', 'Media/Tweet/emoji-visage-souriant-aux-yeux-rejouis.png'),
(824, 1, 'sd', 'je suis nouveau mouhahaha', 'Autre', '2023-05-26 15:41:24', 'Media/Tweet/1.png'),
(825, 1, 'sd', 'je suis nouveau mouhahaha', 'Autre', '2023-05-26 15:41:40', 'Media/Tweet/logo_recovery_road_detail.png'),
(826, 1, 'sd', 'dsd<', 'Politique', '2023-05-26 15:42:52', ''),
(827, 1, 'sd', 'sffgsf<', 'Politique', '2023-05-26 15:43:38', ''),
(828, 1, 'sd', 'kuhvjyv', 'Blagues', '2023-05-26 15:44:02', ''),
(829, 1, 'sd', 'opubytc', 'Blagues', '2023-05-26 15:45:39', ''),
(830, 1, 'sd', 'khvtc', 'Blagues', '2023-05-26 15:45:55', 'Media/Tweet/Logo.png'),
(831, 1, 'Jean', 'xfb<xfvwxg wgs <', 'Technologie', '2023-05-26 20:21:35', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_pseudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_biographie` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_mail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_mdp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `users_salt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_pdp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_bannière` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `users_nom`, `users_pseudo`, `users_biographie`, `users_mail`, `users_mdp`, `users_photo`, `users_salt`, `users_pdp`, `users_bannière`) VALUES
(45, 'Antoine Schmerber-Perraud', 'Toto', 'rtfg', 'sp.2001.antoine@free.fr', '$2y$10$I3PwWFXyPpmkQnG4KehPu.sxTZTeXckxGQkNLBoNqUbxH5fFDRszO', NULL, 'de2b84c4c9ab892234b6a50c0d9f4c00', 'Media/PhotoProfil/876683577-sword-art-online.jpg', 'Media/Bannière/1146700-sword-art-online.jpg'),
(46, 'Jean Pierre De la Roche', 'Jean', 'Je kkdjd jini ', 'antoine.schmerber-perraud@edu.devinci.fr', '$2y$10$/vv2NDVNfdkWUoZHeJgNn.T6hS189A5C1hqxUCa2YWbw3r.XLa0Cy', NULL, 'a3bd583cee8ebb6934cd0e3795dbfb31', 'Media/PhotoProfil/5.png', 'Media/Bannière/Fleche gauche.png'),
(47, 'George de la Muraille', 'Geogeo', 'George de la haute société', 'george.muraille@gmail.com', '$2y$10$7GkQmO0wreRfN3LkxmSmz.WKE5vKHnXn4SRYTVyY5qThL0fZzJAcq', NULL, '8ab87f58517676f297f914d94f55740d', 'Media/PhotoProfil/NaturalStone05_2K_Roughness.png', 'Media/Bannière/wallpaperbetter.com_2560x1440.jpg'),
(48, 'Toto', 'Geogeo', '', 'lolo@gmail.com', '$2y$10$Kw9DIq9a/Y4v5X1D5Xa1BOC4QGWqcoOUWP5iqzbrxOmX0NfecgZTm', NULL, 'a75ff2568921b49b1fd3d050b5054123', '', ''),
(49, 'lolo', 'lolo', '', 'lolo@mi', '$2y$10$epC8XG3oGu7m/n2J1RE1QOV2yqjY3MSpH7pC2xMr4Q9JMwRxsuLvK', NULL, '4365f6dfba3988392ed2601d409ba715', '', ''),
(50, 'Joe', 'JoJoLeRigolo', '', 'jpojo@gmail.com', '$2y$10$xDbxMtJG.4eRHLSmiqkMY.Lebco0fLPtsii4XVCz0Se0b0B9PujyO', NULL, 'f5b867c39cfb420e15cd4d3865bc8171', 'Media/PhotoProfil/Base.jpg', 'Media/Bannière/BaseBanniere.png'),
(51, 'Hehe', 'sd', '', 'jesaispas@gmail.com', '$2y$10$l0H7e36ZbbE2RzXTtgF2kek0xtMEE4MuVhU13lJGeXfES1ciXZXpu', NULL, '8891abc87bdc64d9085ed9fd1e0ffa6e', 'Media/PhotoProfil/Base.jpg', 'Media/Bannière/BaseBanniere.png');

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
  MODIFY `tweet_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=832;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
