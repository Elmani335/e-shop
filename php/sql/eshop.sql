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
USE `eshop`;

-- --------------------------------------------------------

--
-- Structure de la table ``
--

CREATE TABLE IF NOT EXISTS `order` (
    `id_order` int(3) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id_order`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `command_details`
--

CREATE TABLE IF NOT EXISTS `command_details` (
    `id_command_details` int(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_order` int(3) NOT NULL,
    `id_product` int(3) NOT NULL,
    `order_quantity` int(3) NOT NULL,
    `order_price` float NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
    `user_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `user_pseudo` VARCHAR(20) NOT NULL,
    `user_password` VARCHAR(11) NOT NULL,
    `user_firstname` VARCHAR(20) NOT NULL,
    `user_lastname` VARCHAR(20) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
    `product_id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `product_categ` int(3) NOT NULL,
    `product_name` VARCHAR(40) NOT NULL,
    `product_description` text NOT NULL,
    `product_image` text NOT NULL,
    `product_price` int(8) NOT NULL,
    `product_stock` int(4) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------