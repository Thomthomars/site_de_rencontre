-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 21 Août 2013 à 11:08
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `1mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `connection`
--

CREATE TABLE `connection` (
  `utilisateur_id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`utilisateur_id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `connection`
--

INSERT INTO `connection` (`utilisateur_id_utilisateur`) VALUES
(1000000001),
(1000000005);

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id_conversation` int(11) NOT NULL AUTO_INCREMENT,
  `convers` text,
  `Date` timestamp NULL DEFAULT NULL,
  `id_message` int(11) NOT NULL,
  PRIMARY KEY (`id_conversation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `conversation`
--

INSERT INTO `conversation` (`id_conversation`, `convers`, `Date`, `id_message`) VALUES
(11, 'salut', '2013-07-29 09:26:48', 0),
(15, 'salut', '2013-07-30 14:43:06', 0),
(16, 'salut', '2013-07-30 14:43:09', 0),
(17, 'salut', '2013-08-02 17:34:23', 0),
(18, 'salut', '2013-08-02 17:36:24', 0),
(19, 'Bonjours, blabla voudrait dialoguer avec vous.', '2013-08-21 09:00:41', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE `message` (
  `id_conversation` int(11) NOT NULL,
  `message` text,
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `message_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_message`),
  KEY `fk_Message_conversation1` (`id_conversation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `Message`
--

INSERT INTO `Message` (`id_conversation`, `message`, `id_message`, `message_date`) VALUES
(11, 'bajour', 10, '2013-07-29 09:26:48'),
(15, 'salut', 11, '2013-07-30 14:43:06'),
(16, 'salut', 12, '2013-07-30 14:43:09'),
(17, 'salut ^^', 13, '2013-08-02 17:34:23'),
(18, 'salut ^^', 14, '2013-08-02 17:36:24');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `taille` int(11) DEFAULT NULL,
  `poid` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `localisation` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cheveux_couleur` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cheveux_coupe` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `mail` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `nom` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `photos_ref` int(11) DEFAULT NULL,
  `nationnalite` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `profession` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `hobbies` text CHARACTER SET latin1,
  `attentes` text CHARACTER SET latin1,
  `couleur_yeux` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `origine` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `signe_distinct` text CHARACTER SET latin1,
  `Style_vestimentaire` text CHARACTER SET latin1,
  `style_de_vie` text CHARACTER SET latin1,
  `personalitees` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `tabac_addict` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `alcool_addict` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `je_vie` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `je_sors` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `activite_sport` text CHARACTER SET latin1,
  `musique` text CHARACTER SET latin1,
  `cinema` text CHARACTER SET latin1,
  `livre` text CHARACTER SET latin1,
  `magazine_journaux` text CHARACTER SET latin1,
  `mot_de_pass` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `login` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `mail_interne` text CHARACTER SET latin1,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `id_utilisateur_UNIQUE` (`id_utilisateur`),
  UNIQUE KEY `mail_UNIQUE` (`mail`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000000011 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `taille`, `poid`, `age`, `localisation`, `cheveux_couleur`, `cheveux_coupe`, `mail`, `nom`, `photos_ref`, `nationnalite`, `profession`, `hobbies`, `attentes`, `couleur_yeux`, `origine`, `signe_distinct`, `Style_vestimentaire`, `style_de_vie`, `personalitees`, `tabac_addict`, `alcool_addict`, `je_vie`, `je_sors`, `activite_sport`, `musique`, `cinema`, `livre`, `magazine_journaux`, `mot_de_pass`, `login`, `mail_interne`) VALUES
(1, 140, 65, 28, 'Vincenne', 'blond', 'court', 'yo@gmail.com', 'mik', NULL, 'Française', 'Dev web', 'tester les applications de Mars qui ne fonctionnent pas', 'que ça fonctionne', 'bleu', 'européen', 'Barbe, trace de sang', 'troué de coup de couteau', 'sanglante', 'abject', 'jamais', 'récement', 'sous les toits', 'difficilement', 'aucune', 'la mélodie de la mort', 'l''horreur', 'Hannibal', 'comment tuer son boss', 'thom', 'mika', ''),
(1000000001, 180, 61, 23, 'Paris', 'chatain', 'mi-long', 'bakumtsu20@gmail.com', 'Danger', NULL, 'alerienne', 'agent immobilier', 'Boire du rhum, du champagne, manger dormir faire la fï¿½te.', 'Rien a part quelqu un de plus pour me filer un coup de main sur le site', 'gris', 'europï¿½en', 'lunettes', 'A poil', 'arrache', 'complexe', 'assez', 'a mort', 'sous les ponts', 'jamais de mon carton', 'ecrire', '', '', '', '', 'thomas', 'Mars', ''),
(1000000002, 145, 100, 78, 'PANAME', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'thom', ''),
(1000000003, 140, NULL, NULL, NULL, NULL, NULL, 'bb@free.fr', 'guivarch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mot', 'connard', ''),
(1000000004, 140, NULL, NULL, NULL, NULL, NULL, 'a@free.fr', 'dan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'thom', 'th', ''),
(1000000005, 146, 38, 32, '', 'roux', 'mi-long', 'bla@free.fr', 'bloup', NULL, 'arabe', 'dev', '', '', 'gris', '', 'lunettes', '', 'arrache', 'complexe', '', '', '', '', '', '', '', '', '', 'b', 'blabla', ''),
(1000000006, 170, NULL, NULL, NULL, NULL, NULL, 'fuck@free.fr', 'fuck', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', 'modafucker', NULL),
(1000000007, 140, NULL, NULL, NULL, NULL, NULL, 'aa@free.fr', 'bbb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aaa', NULL),
(1000000008, 140, NULL, NULL, NULL, NULL, NULL, 'v@free.fr', 'v', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'v', 'v', NULL),
(1000000009, 140, NULL, NULL, NULL, NULL, NULL, '1@free.rf', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL),
(1000000010, NULL, NULL, NULL, NULL, NULL, NULL, 'mikipops@me.com', 'lolilol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'squall', 'kikoulol', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_conversation`
--

CREATE TABLE `utilisateur_has_conversation` (
  `id_utilisateur` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `id_utilisateur2` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_conversation`),
  KEY `fk_utilisateur_has_conversation_utilisateur` (`id_utilisateur`),
  KEY `fk_utilisateur_has_conversation_conversation1` (`id_conversation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur_has_conversation`
--

INSERT INTO `utilisateur_has_conversation` (`id_utilisateur`, `id_conversation`, `id_utilisateur2`) VALUES
(1000000001, 11, 1000000005),
(1000000001, 17, 1000000005),
(1000000001, 18, 1000000005),
(1000000005, 15, 1000000001),
(1000000005, 16, 1000000001);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_visite_favoris`
--

CREATE TABLE `utilisateur_has_visite_favoris` (
  `utilisateur_id_utilisateur` int(11) NOT NULL,
  `visite_favoris_id_visite_favoris` int(11) NOT NULL,
  PRIMARY KEY (`utilisateur_id_utilisateur`,`visite_favoris_id_visite_favoris`),
  KEY `fk_utilisateur_has_visite_favoris_utilisateur1` (`utilisateur_id_utilisateur`),
  KEY `fk_utilisateur_has_visite_favoris_visite_favoris1` (`visite_favoris_id_visite_favoris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visite_favoris`
--

CREATE TABLE `visite_favoris` (
  `id_visite_favoris` int(11) NOT NULL,
  PRIMARY KEY (`id_visite_favoris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `fk_connection_utilisateur1` FOREIGN KEY (`utilisateur_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `fk_Message_conversation1` FOREIGN KEY (`id_conversation`) REFERENCES `conversation` (`id_conversation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_has_conversation`
--
ALTER TABLE `utilisateur_has_conversation`
  ADD CONSTRAINT `fk_utilisateur_has_conversation_conversation1` FOREIGN KEY (`id_conversation`) REFERENCES `conversation` (`id_conversation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_has_conversation_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_has_visite_favoris`
--
ALTER TABLE `utilisateur_has_visite_favoris`
  ADD CONSTRAINT `fk_utilisateur_has_visite_favoris_utilisateur1` FOREIGN KEY (`utilisateur_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_has_visite_favoris_visite_favoris1` FOREIGN KEY (`visite_favoris_id_visite_favoris`) REFERENCES `visite_favoris` (`id_visite_favoris`) ON DELETE NO ACTION ON UPDATE NO ACTION;
