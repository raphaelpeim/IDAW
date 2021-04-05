-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2020 at 12:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IDAW`
--

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `food`, `composed_by`) VALUES
(1, 13, 3),
(2, 13, 6),
(3, 13, 14),
(4, 13, 15),
(5, 13, 16),
(6, 13, 17);

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `category`, `calories`, `lipids`, `sodium`, `potassium`, `carbohydrates`, `proteins`) VALUES
(1, 'Pomme', 'Fruit', 52, 0.2, 1, 107, 14, 0.3),
(2, 'Banane', 'Fruit', 89, 0.3, 1, 358, 23, 1.1),
(3, 'Courgette', 'Fruit', 17, 0.3, 8, 261, 3.1, 1.2),
(4, 'Orange', 'Fruit', 47, 0, 0, 0, 0, 0),
(5, 'Poireau', 'Légume', 61, 0, 0, 0, 0, 0),
(6, 'Oignon', 'Légume', 40, 0, 0, 0, 0, 0),
(7, 'Pomme de terre', 'Légume', 73, 0, 0, 0, 0, 0),
(8, 'Porc', 'Viande', 242, 0, 0, 0, 0, 0),
(9, 'Boeuf', 'Viande', 250, 0, 0, 0, 0, 0),
(10, 'Poulet', 'Viande', 239, 0, 0, 0, 0, 0),
(11, 'Saumon', 'Poisson', 179, 0, 0, 0, 0, 0),
(12, 'Truite', 'Poisson', 141, 0, 0, 0, 0, 0),
(13, 'Ratatouille', 'Plat', 75, 0, 0, 0, 0, 0),
(14, 'Aubergine', 'Légume', 25, 0, 0, 0, 0, 0),
(15, 'Tomate', 'Fruit', 21, 0, 0, 0, 0, 0),
(16, 'Poivron', 'Légume', 20, 0, 0, 0, 0, 0),
(17, 'Ail', 'Légume', 131, 0, 0, 0, 0, 0),
(18, 'Abricot', 'Fruit', 48, 0, 0, 0, 0, 0),
(19, 'Rhubarbe', 'Légume', 21, 0, 0, 0, 0, 0),
(20, 'Carotte', 'Légume', 36, 0, 0, 0, 0, 0),
(21, 'Mouton', 'Viande', 234, 0, 0, 0, 0, 0),
(22, 'Canard', 'Viande', 337, 28, 59, 204, 0, 19),
(23, 'Coulommiers', 'Fromage', 292, 0, 0, 0, 0, 0),
(24, 'Camembert', 'Fromage', 299, 0, 0, 0, 0, 0),
(25, 'Comté', 'Fromage', 400, 0, 0, 0, 0, 0),
(26, 'Brie', 'Fromage', 334, 0, 0, 0, 0, 0),
(27, 'Sole', 'Poisson', 73, 0, 0, 0, 0, 0),
(28, 'Thon', 'Poisson', 117, 0, 0, 0, 0, 0),
(29, 'Chocolat noir', 'Produit transformé', 550, 0, 0, 0, 0, 0),
(30, 'Chocolat au lait', 'Produit transformé', 535, 0, 0, 0, 0, 0),
(31, 'Chocolat blanc', 'Produit transformé', 539, 0, 0, 0, 0, 0),
(32, 'Radis', 'Légume', 16, 0, 0, 0, 0, 0),
(33, 'Bettrave', 'Légume', 43, 0, 0, 0, 0, 0),
(34, 'Lapin', 'Viande', 173, 0, 0, 0, 0, 0),
(35, 'Avoine', 'Céréale', 350, 0, 0, 0, 0, 0),
(36, 'Riz', 'Céréale', 130, 0, 0, 0, 0, 0),
(37, 'Fraise', 'Fruit', 33, 0.3, 1, 153, 8, 0.7),
(39, 'Framboise', 'Fruit', 53, 0.7, 1, 151, 12, 1.2);

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `user`, `food`, `quantity`, `date`) VALUES
(1, 1, 23, 85, '2020-03-20'),
(2, 1, 36, 100, '2020-03-21'),
(3, 1, 9, 200, '2020-03-21'),
(4, 1, 24, 80, '2020-03-20'),
(5, 6, 36, 100, '2020-03-30'),
(6, 1, 22, 150, '2020-04-06');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_f`, `name_l`, `pseudo`, `password`, `phone`, `mail`, `age`, `sex`, `sport`) VALUES
(1, 'Raphaël', 'Peim', 'Shinzeo', '00d70c561892a94980befd12a400e26aeb4b8599', '06 22 22 22 22', 'raphael.peim@etu.imt-lille-douai.fr', '< 40 ans', 'Masculin', 'Moyenne'),
(2, 'Charlotte', 'Raulin\r\n', 'Cha', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 00 02', 'charlotte.raulin@etu.imt-lille-douai.fr', '< 40 ans', 'Féminin', 'Elevée'),
(3, 'Marin', 'Leicknam', 'Marinou', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 00 03', 'marin.leicknam@etu.imt-lille-douai.fr', '< 40 ans', 'Non binaire', 'Moyenne'),
(4, 'Juliette', 'Negri', 'Ju', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 10 00', 'juliette.negri@gmail.com', '< 40 ans', 'Féminin', 'Elevée'),
(5, 'Test', 'Test', 'Test', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 00 10', 'test@test.com', '> 60 ans', 'Non binaire', 'Basse'),
(6, 'Océane', 'Dupenloup', 'oce', '48ccd811381ac26a673fa9b44619e55c68a8202b', '0699488931', 'oceane.dupenloup@etu.imt-lille-douai.fr', '< 40 ans', 'Féminin', 'Moyenne'),
(7, 'Post', 'Man', 'Postman', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 01 00', 'postman@gmail.com', '< 40 ans', 'Masculin', 'Moyenne'),
(8, 'XMLHttp', 'Request', 'xmlhttprequest', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 00 05', 'xmlhttp@gmail.com', '< 40 ans', 'Masculin', 'Basse'),
(19, 'Prénom', 'Nom', 'Pseudo', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 00 06', 'email@gmail.com', '< 40 ans', 'Masculin', 'Basse'),
(38, 'P', 'N', 'P', '00d70c561892a94980befd12a400e26aeb4b8599', '06 10 00 00 00', 'e@gmail.com', '< 40 ans', 'Masculin', 'Basse'),
(39, 'B', 'A', 'C', '00d70c561892a94980befd12a400e26aeb4b8599', '06 02 00 00 00', 'd@gmail.com', '< 40 ans', 'Masculin', 'Basse'),
(40, 'b', 'a', 'IMM', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 01 00 00', 'em@gmail.com', '< 40 ans', 'Masculin', 'Basse'),
(41, 'M', 'M', 'O', '00d70c561892a94980befd12a400e26aeb4b8599', '06 00 00 04 00', 'l@gmail.com', '< 40 ans', 'Masculin', 'Basse'),
(42, 'Monerp', 'Mon', 'Odueps', '00d70c561892a94980befd12a400e26aeb4b8599', '06 11 11 11 11', 'liame@gmail.com', '< 40 ans', 'Masculin', 'Basse');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
