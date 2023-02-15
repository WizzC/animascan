-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2023 at 03:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animascan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int NOT NULL,
  `nom` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `auteur` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `nom`, `date`, `auteur`, `description`, `image`) VALUES
(1, 'Death Note', '2013-01-03', 'kubo', 'Light Yagami, un jeune étudiant surdoué, ramasse un jour le ', '90693_deathnote.png'),
(2, 'beastars', '2016-01-08', 'Paru Itagaki', 'Dans un monde peuplé d’animaux anthropomorphes, les herbivores et les carnivores coexistent. A l’académie Cherryton, la vie se poursuit avec les turpitudes de l’adolescence. Regoshi, un loup, est membre du club de théâtre. Malgré son apparence menaçante, il est une personne très douce, bien que toute sa vie il a été craint par les autres qui en ont peur. Il a donc l’habitude de cela. Mais il découvre très vite les problèmes de ses camarades, différent des siens, et il commence lui-même à changer. ', '8305_beastars.png'),
(5, 'One Piece', '1997-12-24', 'Oda', 'Il fut un temps où Gold Roger était le plus grand de tous les pirates, le \"Roi des Pirates\" était son surnom. A sa mort, son trésor d\'une valeur inestimable connu sous le nom de \"One Piece\" fut caché quelque part sur \"Grand Line\". De nombreux pirates sont partis à la recherche de ce trésor mais tous sont morts avant même de l\'atteindre. Monkey D. Luffy rêve de retrouver ce trésor légendaire et de devenir le nouveau \"Roi des Pirates\". Après avoir mangé un fruit du démon, il possède un pouvoir lui permettant de réaliser son rêve. Il lui faut maintenant trouver un équipage pour partir à l\'aventure !', '94976_OnePiece.png'),
(6, 'naruto', '2000-12-15', 'Masashi Kishimoto', 'Dans le village de Konoha vit Naruto, un jeune garçon détesté et craint des villageois du fait qu\'il détienne en lui Kyuubi (démon renard à neuf queues) d\'une incroyable force, qui a tué un grand nombre de personnes. Le ninja le plus puissant de Konoha à l\'époque, le quatrième Hokage, Minato Namikaze, réussit à sceller ce démon dans le corps de Naruto. Malheureusement il y laissa la vie.  C\'est ainsi que douze ans plus tard, Naruto rêve de devenir le plus grand Hokage de Konoha afin que tous le reconnaissent à sa juste valeur. Mais la route pour devenir Hokage est très longue et Naruto sera confronté à un bon nombre d\'épreuves et devra affronter de nombreux ennemis pour atteindre son but !', '63775_Naruto 1.png'),
(7, 'Dragon Ball', '1987-06-05', 'Akira Toriyama', 'Dragon Ball La quête finale Des sept boules de cristal venues des étoiles Dragon Ball Pour un idéal Combat glacial du Bien contre le Mal Dragon Ball La lutte infernale D\'une petite fille, d\'un enfant-animal Dragon Ball Contre l\'immoral Méchant Tao Paï Paï à la force bestiale Quand le grand Sangoku Au cœur doux Et Bulma son amie Si jolie S\'en vont dans la forêt Affronter tous les plus grands dangers Pour gagner un petit peu d\'espoir Pour savoir Le secret des boules de cristal Dragon Ball La quête finale Des sept boules de cristal venues des étoiles Dragon Ball Pour un idéal Combat glacial du Bien contre le Mal Dragon Ball La lutte infernale D\'une petite fille, d\'un enfant-animal Dragon Ball Contre l\'immoral Méchant Tao Paï Paï à la force bestiale Héros de l\'aventure Du futur Chevalier du courage D\'un autre âge Deux enfants téméraires Partent en guerre pour tenter de trouver La vérité Afin qu\'enfin s\'éclaire le mystère Le secret des boules de cristal Dragon Ball La quête finale Des sept boules de cristal venues des étoiles Dragon Ball Pour un idéal Combat glacial du Bien contre le Mal Dragon Ball La lutte infernale D\'une petite fille, d\'un enfant-animal Dragon Ball Contre l\'immoral Méchant Tao Paï Paï à la force bestiale Dragon Ball La quête finale Des sept boules de cristal venues des étoiles Dragon Ball Pour un idéal Combat glacial du Bien contre le Mal Dragon Ball La lutte infernale', '40571_dragonball 2.png'),
(8, 'Ronald Mcdonalds', '2001-04-04', 'Max La Menace', 'Ronald Mcdonalds  est un clown qui fait peur aux enfants mais il est très sympa en vrai. Il se cache dans les stations de métro de Piccadilly pendant les jours d\'été. Il a un très beau dégradé comme Mohamed. Il fait bien à manger. Après Noël , il est à Dunkerque pour le Carnaval.', '74059_IMG_4622.png'),
(9, 'A Certain Scientific Railgun', '2007-11-10', 'Nadia Benyamina', 'L\'histoire se déroule dans un monde où se mêle pouvoir surnaturel et magie. Dans la cité académique comptant pas moins de 2,3 millions d\'habitants, 80% sont des étudiants travaillent pour un programme de développement du cerveau humain.  Mikoto Misaka est une étudiante de la Cité Scolaire. Cette grande ville universitaire accueille les étudiants pourvus de dons qu\'on appelle espers. Ils sont classés par niveau; de 0, absence de don, à 5, les dons les plus puissants. Misaka est la troisième plus puissante des sept niveau 5. Elle contrôle les champs électriques et magnétiques. Cette jeune fille vit dans la partie de l\'école la plus réputée de la Cité Scolaire et cohabite avec Kuroko Shirai, esper de niveau 4 qui possède le don de téléportation et faisant partie de Judgment, une organisation qui enquête pour régler les problèmes de la Cité Scolaire. Accompagnées par deux autres amies elles vont tenter de résoudre certains problèmes qui pourraient mettre en danger la cité toute entière.', '50813_toaru.png');

-- --------------------------------------------------------

--
-- Table structure for table `scan`
--

CREATE TABLE `scan` (
  `id` int NOT NULL,
  `saison` int DEFAULT NULL,
  `nomArc` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chapitre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tomes` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `episodes` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idAnime` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scan`
--

INSERT INTO `scan` (`id`, `saison`, `nomArc`, `chapitre`, `tomes`, `episodes`, `idAnime`) VALUES
(2, 1, 'L vs Kira', '1-22', '1-3', '1-10', 1),
(3, 1, 'Kira (2ème partie)', '23-35', '3-5', '11-16', 1),
(4, 1, 'Yotsuba', '36-58', '5-7', '17-25', 1),
(5, 2, 'Mello', '59-74', '7-9', '26-29', 1),
(6, 2, 'Wammy', '75-83', '9-10', '30', 1),
(7, 2, 'Final', '84-108', '10-12', '31-37', 1),
(8, 1, 'Final', '1-20', '1-4', '1-12', 2),
(9, 1, 'flash-back', '1-13', '1-2', '1-4', 3),
(10, 1, 'Final', '14-49', '4-9', '5-12', 3),
(19, 1, 'Drama Club', '1-17', '1-2', '1-5', 4),
(20, 1, 'Meteor Festival', '18-49', '3-6', '06-12', 4),
(21, 2, 'Murder Incident Solution', '50-99', '7-11', '13-24', 4),
(22, NULL, 'Interspecies Relations', '100-123', '12-14', NULL, 4),
(24, 1, 'adazdaz', '1-14', '1-2', '1-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role` int DEFAULT NULL,
  `pseudo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `pseudo`, `email`, `password`) VALUES
(1, 1, 'fcvaf', 'aze@aez.fr', '$2y$10$tZlQGrvRF/E11fZzvq9oJu8hcgBFsrC0AhDfxVRIxpHqwTMVkHkdW'),
(2, 2, 'wizz', 'clementcarlier310@gmail.com', '$2y$10$hmQHRZ3z838rQxL9/RAshOFIPlUxh3LU8Jx5jUcdsn17pR450ziX2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan`
--
ALTER TABLE `scan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAnime` (`idAnime`),
  ADD KEY `idAnime_2` (`idAnime`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scan`
--
ALTER TABLE `scan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
