-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 15 jan. 2018 à 00:03
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `css_class` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `css_class`) VALUES
(1, 'Amuse-bouche', 'danger'),
(2, 'Entrée', 'success'),
(3, 'Plat principal', 'primary'),
(4, 'Dessert', 'warning');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `unite`) VALUES
(1, 'tomate', 'Pièce'),
(7, 'pomme', 'Grammes'),
(8, 'ketchup', 'Cuillère à soupe'),
(9, 'boeuf', 'Grammes'),
(10, 'poulet', 'Grammes'),
(11, 'moutarde', 'Cuillère à soupe'),
(12, 'sucre', 'Grammes'),
(13, 'sel', 'Cuillère à café'),
(14, 'riz', 'Grammes'),
(15, 'poire', 'Pièce'),
(17, 'coquilettes', 'Grammes'),
(18, 'carotte', 'Pièce'),
(19, 'epinard', 'Grammes'),
(20, 'olive', 'Grammes'),
(22, 'poireau', 'Pièce'),
(23, 'fraise', 'Grammes'),
(24, 'sésame', 'Grammes'),
(25, 'farine', 'Grammes'),
(26, 'lasagne', 'Pièce'),
(27, 'courgette', 'Pièce'),
(28, 'salade', 'Pièce'),
(29, 'endive', 'Pièce'),
(30, 'avocat', 'Pièce'),
(31, 'moule', 'Grammes'),
(32, 'camembert', 'Grammes'),
(33, 'lait', 'Grammes');

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`, `id_category`, `image`) VALUES
(3, 'Quiche au poireau et saumon fumé', 'Etape 1\r\nPréchauffez le four th.7.\r\nEtape 2\r\nEmincez les poireaux (sans les feuilles!), faites les fondre dans un peu de beurre; lorsqu\'ils sont fondus, justement, ajoutez deux bonnes cuillères à soupe de crème, salez, poivrez, et parfumez avec la muscade, selon votre goût. Etalez cette préparation sur le fond de pâte, recouvrir entièrement de saumon fumé (en tranches entières ou en lanières).\r\nEtape 3\r\nMélangez dans un gros bol deux oeufs entiers, deux généreuses cuillères de crème, les six cuillères de lait (ou plus selon la consistance désirée), le gruyère râpé, le sel, le poivre et éventuellement encore un peu de muscade. Versez sur la quiche cette préparation et mettez à cuire environ 30 minutes.', 1, 'https://image.afcdn.com/recipe/20170113/700_w420h344c1cx1500cy993.jpg'),
(8, 'Pain aux graines de sésame ', 'Etape 1\r\nMettre les flocons d\'avoine et les graines de sésame dans une poêle et les faire légèrement colorer dans un petit filet d\'huile. Puis les réserver.\r\nEtape 2\r\nDans la cuve de la machine à pain mettre les ingrédients.\r\nEtape 3\r\nSélectionner le programme \"pain complet\".\r\nEtape 4\r\nAu \"Bip\" qui indique la fin de la phase de pétrissage, ajouter les graines torréfiées et laisser le programme se dérouler normalement.', 1, 'http://lesrecettesdejosephine.com/wp-content/uploads/2014/04/pain-complet-2.jpg?w=640'),
(9, 'Lasagnes de légumes', 'Etape 1\r\nFaire revenir dans une poêle avec un peu d’huile d’olive, l’oignon émincé, le poivron coupé petit, les courgettes, les aubergines, les lardons, et les tomates en dernier.\r\nEtape 2\r\nAjouter du sel, poivre, et épices. Laisser cuire environ 15 min.\r\nEtape 3\r\nPendant ce temps, préparer la béchamel :\r\nEtape 4\r\nFaire chauffer 1 cuillère à soupe d\'huile , ajouter 2 cuillères à soupe de farine.\r\nEtape 5\r\nPuis hors du feu, verser l\'équivalent d\'un verre de lait froid.\r\nEtape 6\r\nBien mélanger, et remettre sur le feu pour que ça épaississe. Ajouter de la muscade.\r\nEtape 7\r\nAlterner légumes, béchamel, lasagnes, et terminer avec du fromage râpé.\r\nEtape 8\r\nEnfourner à 200°C (thermostat 6-7), pendant 30 min.', 3, 'http://static.cuisineaz.com/400x320/i74044-lasagnes-vegetariennes.jpg'),
(10, 'Salade endive avocat', 'Etape 1\r\nLaver les endives et les détailler en tranches.\r\nEtape 2\r\nCouper l\'avocat, le demi pamplemousse et le comté en morceaux.\r\nEtape 3\r\nAjouter sel, poivre, vinaigrette (attention, l\'avocat \"boit\" la vinaigrette, préparez-en un peu plus qu\'à l\'habitude).\r\nEtape 4\r\nServir frais.', 2, 'http://img-3.journaldesfemmes.fr/QTeg7WtNNc-qRH7_3OlQjEv9jgg=/750x/smart/6d75f7d8f7c844e786bee02053165a97/recipe-jdf/10026041.jpg'),
(11, 'Moules au camembert', 'Etape 1\r\nFaites revenir l\'oignon, les échalotes et l\'ail avec un peu de saint doux dans une poêle.\r\nEtape 2\r\nDans une casserole faites fondre votre camembert avec la crème et le vin blanc puis réservez.\r\nEtape 3\r\nMettez vos moules dans une cocotte avec l\'oignon les échalote et l\'ail et faites les cuire 5 min environ (pour qu\'elles s\'ouvrent).\r\nEtape 4\r\nPuis videz la moitié de leur jus.\r\nEtape 5\r\nAjouter le camembert avec la crème, remuer délicatement et laissez mijoter à feu doux environ 5 min.\r\nEtape 6\r\nC\'est prêt.', 3, 'https://files.meilleurduchef.com/mdc/photo/recette/moules-marinieres/moules-marinieres-640.jpg'),
(12, 'Smoothie Pomme Poire', 'Etape 1\r\nEplucher et couper en morceaux les pommes et les poires.\r\nEtape 2\r\nMettre dans un blender/mixer avec le lait de soja et les flocons d\'avoine.\r\nEtape 3\r\nMixer 2 min et c\'est prêt!', 4, 'http://frcdn.ar-cdn.com/recipes/land500/7994916d-0d1e-4dc7-af14-2e859522ebe2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `id_ingredient` int(11) NOT NULL,
  `id_recipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`id_ingredient`, `id_recipe`) VALUES
(25, 8),
(24, 8),
(26, 9),
(27, 9),
(1, 9),
(28, 10),
(29, 10),
(30, 10),
(31, 11),
(32, 11),
(33, 12),
(7, 12),
(15, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`id_category`);

--
-- Index pour la table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD KEY `fk_recipe_id` (`id_recipe`),
  ADD KEY `fk_recipe_ingredient` (`id_ingredient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `fk_recipe_id` FOREIGN KEY (`id_recipe`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recipe_ingredient` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
