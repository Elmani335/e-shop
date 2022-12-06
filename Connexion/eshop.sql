-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mariadb:3306
-- Généré le : dim. 23 oct. 2022 à 20:43
-- Version du serveur : 10.9.2-MariaDB-1:10.9.2+maria~ubu2204
-- Version de PHP : 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eshop`
--
CREATE DATABASE IF NOT EXISTS `eshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e-shop`;

-- --------------------------------------------------------

--
-- Structure de la table ``
--

CREATE TABLE IF NOT EXISTS `game` (
    `id_game` int(11) NOT NULL AUTO_INCREMENT,
    `name_game` text NOT NULL,
    PRIMARY KEY (`id_game`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


-- Structure de la table ``
--

CREATE TABLE IF NOT EXISTS `message` (
    `id_message` int(11) NOT NULL AUTO_INCREMENT,
    `id_game_message` int(11) NOT NULL,
    `id_sender_message` int(11) NOT NULL,
    `text_message` text NOT NULL,
    `send_date_message` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id_message`),
    KEY `message_game_null_fk` (`id_game_message`),
    KEY `message_user_null_fk` (`id_sender_message`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE IF NOT EXISTS `` (
    `id_score` int(11) NOT NULL AUTO_INCREMENT,
    `id_user_score` int(11) NOT NULL,
    `id_game_score` int(11) NOT NULL,
    `difficulty_game_score` int(11) NOT NULL,
    `game_score_score` int(11) NOT NULL,
    `game_started_date_score` timestamp NOT NULL DEFAULT current_timestamp(),
    `game_ended_date_score` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id_score`),
    UNIQUE KEY `id_user_score` (`id_user_score`,`id_game_score`,`difficulty_game_score`),
    KEY `score_game_null_fk` (`id_game_score`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table ``
--

CREATE TABLE IF NOT EXISTS `` (
    `id_user` int(11) NOT NULL AUTO_INCREMENT,
    `email_user` text NOT NULL,
    `password_user` text NOT NULL,
    `username_user` text DEFAULT NULL,
    `created_date_user` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id_user`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
    ADD CONSTRAINT `message_game_null_fk` FOREIGN KEY (`id_game_message`) REFERENCES `game` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_user_null_fk` FOREIGN KEY (`id_sender_message`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
    ADD CONSTRAINT `score_game_null_fk` FOREIGN KEY (`id_game_score`) REFERENCES `game` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_user_null_fk` FOREIGN KEY (`id_user_score`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
