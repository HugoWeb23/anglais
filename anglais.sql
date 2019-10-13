-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 13 oct. 2019 à 11:59
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `anglais`
--

-- --------------------------------------------------------

--
-- Structure de la table `exemple`
--

CREATE TABLE `exemple` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historique_reponses`
--

CREATE TABLE `historique_reponses` (
  `id` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_partie` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `prenom_joueur` varchar(255) NOT NULL,
  `date_partie` varchar(50) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `intitule_question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `reponse`, `id_theme`, `intitule_question`) VALUES
(1, 'and', 'et', 3, 'Traduis ce mot en français'),
(2, 'a bone', 'un os', 3, 'Traduis ce mot en français'),
(3, 'book', 'livre', 3, 'Traduis ce mot en français'),
(4, 'brother', 'frère', 3, 'Traduis ce mot en français'),
(5, 'but', 'mais', 3, 'Traduis ce mot en français'),
(6, 'children', 'les enfants', 3, 'Traduis ce mot en français'),
(7, 'dog', 'chien', 3, 'Traduis ce mot en français'),
(8, 'father', 'père', 3, 'Traduis ce mot en français'),
(9, 'friend', 'ami', 3, 'Traduis ce mot en français'),
(10, 'have', 'avoir', 3, 'Traduis ce mot en français'),
(11, 'look', 'regarder', 3, 'Traduis ce mot en français'),
(12, 'musician', 'musicien', 3, 'Traduis ce mot en français'),
(13, 'my', 'mon/ma/mes', 3, 'Traduis ce mot en français'),
(14, 'play', 'jouer', 3, 'Traduis ce mot en français'),
(15, 'read', 'lire', 3, 'Traduis ce mot en français'),
(16, 'really', 'vraiment', 3, 'Traduis ce mot en français'),
(17, 'spell', 'épeler', 3, 'Traduis ce mot en français'),
(18, 'talk', 'parler', 3, 'Traduis ce mot en français'),
(19, 'too', 'également', 3, 'Traduis ce mot en français'),
(20, 'wash', 'laver', 3, 'Traduis ce mot en français'),
(21, 'watch', 'regarder', 3, 'Traduis ce mot en français'),
(22, 'wish', 'souhaiter', 3, 'Traduis ce mot en français'),
(23, 'et', 'and', 4, 'Traduis ce mot en anglais'),
(24, 'un os', 'a bone', 4, 'Traduis ce mot en anglais'),
(25, 'livre', 'book', 4, 'Traduis ce mot en anglais'),
(26, 'frère', 'brother', 4, 'Traduis ce mot en anglais'),
(27, 'mais', 'but', 4, 'Traduis ce mot en anglais'),
(28, 'les enfants', 'children', 4, 'Traduis ce mot en anglais'),
(29, 'chien', 'dog', 4, 'Traduis ce mot en anglais'),
(30, 'père', 'father', 4, 'Traduis ce mot en anglais'),
(31, 'ami', 'friend', 4, 'Traduis ce mot en anglais'),
(32, 'avoir', 'have', 4, 'Traduis ce mot en anglais'),
(33, 'regarder', 'look', 4, 'Traduis ce mot en anglais'),
(34, 'musicien', 'musician', 4, 'Traduis ce mot en anglais'),
(35, 'mon/ma/mes', 'my', 4, 'Traduis ce mot en anglais'),
(36, 'jouer', 'play', 4, 'Traduis ce mot en anglais'),
(37, 'lire', 'read', 4, 'Traduis ce mot en anglais'),
(38, 'vraiment', 'really', 4, 'Traduis ce mot en anglais'),
(39, 'épeler', 'spell', 4, 'Traduis ce mot en anglais'),
(40, 'parler', 'talk', 4, 'Traduis ce mot en anglais'),
(41, 'également', 'too', 4, 'Traduis ce mot en anglais'),
(42, 'laver', 'wash', 4, 'Traduis ce mot en anglais'),
(43, 'regarder', 'watch', 4, 'Traduis ce mot en anglais'),
(44, 'souhaiter', 'wish', 4, 'Traduis ce mot en anglais'),
(54, 'please', 's\'il vous plaît', 10, 'Traduis ce mot en français'),
(55, 'thank you', 'merci', 10, 'Traduis ce mot en français'),
(56, 'thanks', 'merci (moins formel)', 10, 'Traduis ce mot en français'),
(57, 'you\'re welcome', 'de rien', 10, 'Traduis ce mot en français'),
(58, 'sorry', 'désolé', 10, 'Traduis ce mot en français'),
(61, 'excuse-me', 'excuse-moi', 10, 'Traduis ce mot en français'),
(62, 'nice to meet you', 'ravi de vous rencontrer', 10, 'Traduis ce mot en français'),
(63, 'have a good day', 'bonne journée', 10, 'Traduis ce mot en français'),
(64, 's\'il vous plaît', 'please', 11, 'Traduis ce mot en anglais'),
(65, 'merci', 'thank you', 11, 'Traduis ce mot en anglais'),
(66, 'merci (moins formel)', 'thanks', 11, 'Traduis ce mot en anglais'),
(67, 'de rien', 'you\'re welcome', 11, 'Traduis ce mot en anglais'),
(68, 'désolé', 'sorry', 11, 'Traduis ce mot en anglais'),
(69, 'excuse-moi', 'excuse-me', 11, 'Traduis ce mot en anglais'),
(70, 'ravi de vous rencontrer', 'nice to meet you', 11, 'Traduis ce mot en anglais'),
(71, 'bonne journée', 'have a good day', 11, 'Traduis ce mot en anglais');

-- --------------------------------------------------------

--
-- Structure de la table `selection_questions`
--

CREATE TABLE `selection_questions` (
  `id` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_partie` int(11) NOT NULL,
  `resultat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `theme`) VALUES
(3, 'Traduis ces mots EN -> FR (série 1)'),
(4, 'Traduis ces mots FR -> EN (série 1)'),
(10, 'Les formules de politesse EN ->  FR'),
(11, 'Les formules de politesse FR -> EN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `exemple`
--
ALTER TABLE `exemple`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historique_reponses`
--
ALTER TABLE `historique_reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `selection_questions`
--
ALTER TABLE `selection_questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `exemple`
--
ALTER TABLE `exemple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique_reponses`
--
ALTER TABLE `historique_reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `selection_questions`
--
ALTER TABLE `selection_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
