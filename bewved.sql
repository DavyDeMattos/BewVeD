-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : dim. 23 juil. 2023 à 16:02
-- Version du serveur : 8.0.33
-- Version de PHP : 8.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bewved`
--
CREATE DATABASE IF NOT EXISTS `bewved` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bewved`;

-- --------------------------------------------------------

--
-- Structure de la table `learner`
--

CREATE TABLE `learner` (
  `id` int NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prom_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `learner`
--

INSERT INTO `learner` (`id`, `lastname`, `firstname`, `age`, `gender`, `prom_id`) VALUES
(1, 'Skywalker', 'Luke', 76, 'm', 1),
(2, 'Doe', 'Jane', 22, 'f', 1),
(3, 'DaVinci', 'Leonardo', 39, 'm', 1),
(4, 'McClure', 'Morgan', 72, 'f', 1),
(5, 'Stroman', 'Zora', 67, 'f', 1),
(6, 'Vandervort', 'Carolyne', 53, 'f', 1),
(7, 'Hartmann', 'Tremayne', 45, 'f', 1),
(8, 'Johnson', 'Erin', 48, 'f', 1),
(9, 'Lynch', 'Nikki', 74, 'f', 1),
(10, 'Harris', 'Heloise', 49, 'f', 1),
(11, 'Mann', 'Trinity', 64, 'f', 1),
(12, 'Donnelly', 'Virginia', 29, 'f', 1),
(13, 'Bosco', 'Karlie', 68, 'f', 1),
(14, 'Tremblay', 'Tara', 27, 'm', 1),
(15, 'Goldner', 'Armani', 24, 'm', 1),
(16, 'Ullrich', 'Kennedi', 37, 'm', 1),
(17, 'Medhurst', 'Rafael', 36, 'm', 1),
(18, 'Parker', 'Eriberto', 30, 'm', 1),
(19, 'Jenkins', 'Aletha', 32, 'm', 1),
(20, 'Yundt', 'Nikko', 58, 'm', 1),
(21, 'Kilback', 'Claudine', 69, 'm', 1),
(22, 'Lockman', 'Annabell', 70, 'm', 1),
(23, 'Bradtke', 'Augustine', 25, 'm', 1),
(24, 'Aufderhar', 'Ethan', 71, 'f', 2),
(25, 'Gislason', 'Josie', 51, 'f', 2),
(26, 'Jones', 'Rubye', 73, 'f', 2),
(27, 'Gutkowski', 'Spencer', 48, 'f', 2),
(28, 'Powlowski', 'Kelton', 49, 'f', 2),
(29, 'Lesch', 'Mara', 68, 'f', 2),
(30, 'Beier', 'Leola', 24, 'f', 2),
(31, 'Streich', 'Carter', 24, 'm', 2),
(32, 'Mohr', 'Retta', 38, 'm', 2),
(33, 'Hegmann', 'Dandre', 54, 'm', 2),
(34, 'Tillman', 'Lazaro', 55, 'm', 2),
(35, 'Heidenreich', 'Doug', 38, 'm', 2),
(36, 'Marvin', 'Vladimir', 18, 'm', 2),
(37, 'Hoeger', 'Brice', 63, 'm', 2),
(38, 'King', 'Hank', 21, 'm', 2),
(39, 'Rosenbaum', 'Ariane', 31, 'm', 2),
(40, 'Zemlak', 'Giles', 26, 'm', 2),
(41, 'Koss', 'Sigrid', 35, 'm', 3),
(42, 'Koss', 'Oral', 54, 'm', 3),
(43, 'Wuckert', 'Angela', 66, 'm', 3),
(44, 'Lowe', 'Tremaine', 65, 'm', 3),
(45, 'Collins', 'Amber', 65, 'm', 3),
(46, 'Lehner', 'Coralie', 32, 'm', 3),
(47, 'Flatley', 'Teresa', 20, 'm', 3),
(48, 'Krajcik', 'Cloyd', 74, 'm', 3),
(49, 'Balistreri', 'Wava', 46, 'm', 3),
(50, 'Brakus', 'Eino', 45, 'm', 3),
(51, 'King', 'Cicero', 60, 'm', 3);

-- --------------------------------------------------------

--
-- Structure de la table `learner_skill`
--

CREATE TABLE `learner_skill` (
  `learner_id` int NOT NULL,
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `learner_skill`
--

INSERT INTO `learner_skill` (`learner_id`, `skill_id`) VALUES
(1, 1),
(1, 2),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 6),
(5, 5),
(6, 4),
(7, 6),
(8, 2),
(9, 3),
(10, 3),
(11, 2),
(12, 5),
(13, 6),
(14, 6),
(15, 5),
(16, 6),
(17, 2),
(18, 2),
(19, 4),
(20, 5),
(21, 1),
(22, 2),
(23, 4),
(24, 2),
(24, 6),
(24, 7),
(25, 1),
(25, 4),
(25, 7),
(26, 4),
(26, 5),
(26, 7),
(27, 3),
(27, 6),
(27, 7),
(28, 1),
(28, 5),
(28, 7),
(29, 4),
(29, 5),
(29, 7),
(30, 1),
(30, 3),
(30, 7),
(31, 2),
(31, 4),
(32, 4),
(32, 6),
(33, 5),
(33, 6),
(34, 4),
(34, 5),
(35, 5),
(35, 6),
(36, 3),
(36, 4),
(37, 1),
(38, 3),
(39, 4),
(39, 5),
(40, 4),
(40, 5),
(41, 9),
(42, 8),
(43, 8),
(44, 9),
(45, 9),
(46, 9),
(47, 9),
(48, 9),
(49, 9),
(50, 8),
(51, 8);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prom`
--

CREATE TABLE `prom` (
  `id` int NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prom`
--

INSERT INTO `prom` (`id`, `label`) VALUES
(1, 'CDA-20230701'),
(2, 'DWWM-20230701'),
(3, 'NULL-20230701');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id` int NOT NULL,
  `skill_group_id` int DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id`, `skill_group_id`, `label`) VALUES
(1, 1, 'Bootstrap'),
(2, 1, 'Css'),
(3, 1, 'React Js'),
(4, 2, 'Python'),
(5, 2, 'SQL'),
(6, 2, 'PHP'),
(7, 1, 'test'),
(8, 4, 'copier coller'),
(9, 4, 'ChatGpt'),
(10, 5, 'qwerty'),
(11, 4, 'pause');

-- --------------------------------------------------------

--
-- Structure de la table `skill_group`
--

CREATE TABLE `skill_group` (
  `id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skill_group`
--

INSERT INTO `skill_group` (`id`, `code`) VALUES
(1, 'Compétences Front'),
(2, 'Compétences Back'),
(3, 'Compétences Infra'),
(4, 'Flémmard'),
(5, 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@mail.com', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$2y$13$KsIg7zTlAVFhVOO3h15Or.ewKb6yxGpkDe0n.4k1TeH6WK9ZtZOuy'),
(2, 'joe@mail.com', '[\"ROLE_USER\"]', '$2y$13$KsIg7zTlAVFhVOO3h15Or.ewKb6yxGpkDe0n.4k1TeH6WK9ZtZOuy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8EF38347CC070FF` (`prom_id`);

--
-- Index pour la table `learner_skill`
--
ALTER TABLE `learner_skill`
  ADD PRIMARY KEY (`learner_id`,`skill_id`),
  ADD KEY `IDX_5AB0BEC16209CB66` (`learner_id`),
  ADD KEY `IDX_5AB0BEC15585C142` (`skill_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `prom`
--
ALTER TABLE `prom`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5E3DE477BCFCB4B5` (`skill_group_id`);

--
-- Index pour la table `skill_group`
--
ALTER TABLE `skill_group`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `learner`
--
ALTER TABLE `learner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prom`
--
ALTER TABLE `prom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `skill_group`
--
ALTER TABLE `skill_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `learner`
--
ALTER TABLE `learner`
  ADD CONSTRAINT `FK_8EF38347CC070FF` FOREIGN KEY (`prom_id`) REFERENCES `prom` (`id`);

--
-- Contraintes pour la table `learner_skill`
--
ALTER TABLE `learner_skill`
  ADD CONSTRAINT `FK_5AB0BEC15585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5AB0BEC16209CB66` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `FK_5E3DE477BCFCB4B5` FOREIGN KEY (`skill_group_id`) REFERENCES `skill_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
