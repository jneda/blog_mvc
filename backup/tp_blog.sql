-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2023 at 01:12 PM
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
-- Database: `tp_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'Anthony'),
(8, 'Chocolatine'),
(6, 'Cray-1'),
(11, 'Dark Sasuke est un génie'),
(3, 'Histoire de ma vie'),
(2, 'Houlala'),
(10, 'Le webmaster est super nul'),
(4, 'Ordinateur'),
(9, 'Pain au chocolat'),
(7, 'Piratage informatique'),
(5, 'Swag');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int NOT NULL,
  `id_post` int NOT NULL,
  `id_author` int NOT NULL,
  `date` datetime NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_post`, `id_author`, `date`, `content`) VALUES
(1, 1, 2, '2022-12-21 14:43:34', 'Salut Anthony !\nProfite d\'une offre exceptionnelle sur les marqueurs effaçables en visitant ce site : www.totallynotsuspicous.ru !\nBises,\nToto Totovitch\n'),
(2, 2, 3, '2022-12-21 14:46:26', 'La classe à Dallas ! 🤠'),
(3, 1, 1, '2022-12-21 14:47:00', 'Merci Toto, c\'est vraiment chic de ta part !\r\nC\'est vrai qu\'il est difficile de trouver de bons marqueurs effaçables de nos jours. 😢\r\nJ\'irai voir ton lien quand j\'aurai fini de rembourser mon emprunt pour acheter mon nouvel ordinateur !'),
(4, 3, 1, '2022-12-21 14:54:59', 'P.S. : Sauriez-vous où je pourrais télécharger de la RAM SVP ?'),
(5, 3, 2, '2022-12-21 14:55:42', 'Salut Anthony !\nJe te recommande www.totallynotatrap.ru, un super site de téléchargement de mémoire vive (utilisé par le GIGN et l\'Académie des Sciences de Melun).\nBises,\nToto Totovitch'),
(6, 3, 12, '2022-12-23 17:16:16', 'DTC ptdmdlol !!! 💩'),
(8, 7, 3, '2022-12-23 17:19:01', 'C&#039;est vrai que c&#039;est bon, surtout avec du roquefort ! 😛'),
(13, 23, 12, '2023-01-05 09:29:21', 'Zizi !'),
(16, 23, 13, '2023-01-05 12:58:18', 'Sois un peu plus gentil Kevin, sinon gare à tes fesses ! 😷'),
(18, 23, 12, '2023-01-05 13:04:00', 'Mais heu... 😣');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_author` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `title`, `content`, `date`, `id_author`, `image`) VALUES
(1, 'Bienvenue sur mon blog ! 😁', 'Je m\'appelle Anthony Houlala et je suis développeur web.\r\nIci, vous pourrez suivre mes aventures et écrire des commentaires pour m\'encourager !\r\nÀ plus dans le bus !', '2022-12-21 14:35:43', 1, 'anthony_houlala.jpg'),
(2, 'Mon nouvel ordinateur ! 😍', 'Mon serveur personnel n\'arrivait plus à soutenir le trafic des visiteurs de mon blog.\r\nPlutôt que d\'optimiser l\'accès à la base de données, j\'en ai profité pour réaliser mon rêve : j\'ai acheté un Cray-1 !\r\nIl est pas beau mon bébé ? Dites-moi ce que vous en pensez en commentaire. 😉', '2022-12-21 14:38:24', 1, 'Cray-1.png'),
(3, 'J\'ai été piraté ! 😱', 'Je naviguais tranquillement sur le web, à la recherche de marqueurs effaçables performants et pas chers, quand tout à coup mon clavier a pris feu !\r\nDepuis, mon bébé refuse de démarrer. 😭\r\nHeureusement, je suis un professionnel : un formatage du disque dur devrait résoudre le problème.', '2022-12-21 14:50:57', 1, 'Burning_Logitech.jpg'),
(7, 'Les chocolatines c&#039;est bon ! 🙌', 'Salut tout le monde, Anthony m&#039;a invité sur son super site pour y partager ma passion des CHOCOLATINES ! 😍\nÀ bientôt pour un article passionnant sur la fabrication de la pâte feuilletée. 😉', '2022-12-23 14:48:15', 7, 'chocolatine.jpg'),
(10, 'La pâte feuilletée c&#039;est dur ! 😬', 'La pâte feuilletée est réalisée à partir d&#039;une détrempe composée de farine, de sel et d&#039;eau. Des produits d&#039;addition peuvent être ajoutés à des fins technologiques ou pour optimiser la conservation du produit. Le type de mélange couramment réalisé est un pétrissage qui assure la répartition homogène et uniforme des constituants et l&#039;obtention d&#039;une masse. Des mouvements mécaniques de fraseurs dans une cuve mélange permettent une structuration de la pâte, son réseau de gluten est notamment formé.\n\nAprès un certain temps de repos, cette pâte est abaissée par le biais d&#039;un processus de laminage qui consiste en l&#039;utilisation de rouleaux en rotation en sens inverse qui exercent une pression sur celle-ci. Leur écartement est progressif afin d&#039;éviter d&#039;éventuels déchirements. L&#039;épaisseur de la pâte étant alors diminuée, on y étale alors de la matière grasse (généralement du beurre sec dit de tourage, mais parfois de la margarine ou de l&#039;huile), avant de replier la pâte, la pivoter et recommencer l&#039;opération plusieurs fois (classiquement six), en faisant reposer la pâte au réfrigérateur entre chaque tour, pour que la pâte perde son élasticité et que la matière grasse durcisse. C&#039;est cette opération dite de « tourage » (abaisser, tourner, plier) qui permet d&#039;obtenir un nombre important de couches, par rapport à la pâte « feuille à feuille » classique, donnant ainsi une pâte plus légère.\n\nLe nombre de feuilles de la pâte feuilletée f peut ainsi se déduire de f = b + 1 où b b, le nombre de couches de beurre, se calcule par la formule b = ( p + 1 ) n, p étant le nombre de plis effectués, et n le nombre de fois où la pâte a été pliée.\n\nAinsi, dans la recette classique, en pliant la pâte en trois (deux plis type pli roulé) et en réalisant six tours, on obtient b = ( 2 + 1 ) 6 soit 729 couches de beurre et donc 730 feuillets de pâte.\n\nLors de la cuisson, la chaleur du four engendre une évaporation de l’eau sous forme de chaleur dirigée vers le sommet de la pâte. Cette vapeur d&#039;eau exerce une pression sur les différentes couches de matière grasse qui sont imperméables. La rétention gazeuse provoquée permet le développement du feuilletage et ainsi l&#039;acquisition du volume final requis par gonflement des feuillets. À la fin du cycle de cuisson, la matière grasse est absorbée par la pâte et le caractère moelleux de la pâte est alors renforcé.', '2022-12-27 11:18:10', 7, 'Cute_dog.jpg'),
(18, 'Ce site est super nul 😪', 'Va toucher l&#039;herbe Anthony !', '2023-01-03 12:56:07', 12, '095-pile-of-poo.png'),
(23, 'Cacabillet ! [Edit][Edit]', 'Prout ! Mouhahahah !', '2023-01-05 10:14:06', 12, '63b6a1f82615d-bob_de_naar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id_post_category` int NOT NULL,
  `id_post` int NOT NULL,
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id_post_category`, `id_post`, `id_category`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 3, 6),
(14, 3, 7),
(15, 7, 8),
(16, 7, 9),
(17, 7, 5),
(21, 10, 8),
(22, 10, 9),
(23, 10, 5),
(29, 18, 11),
(30, 18, 10),
(39, 23, 11),
(40, 23, 10),
(41, 23, 1),
(42, 23, 8),
(43, 23, 2),
(44, 23, 9),
(45, 23, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'toto_boss', 'totodu77@houlala.fr', '$2y$10$skqvENbB62ozqn8RIYilnu695gNDi4nHpSVp/8KM9xBUofRkbCYMW'),
(2, 'toto', 'toto.totovitch.totov@totallylegit.ru', '$2y$10$V7P53GEuDOf0pPWSymevA.F3d6zujhIE6rhvi.76drsjEruVkNl0q'),
(3, 'totophe', 'christophe@gaia.org', '$2y$10$RupBFpv79Dknq.yDF8m3FeEXuLgu6FHVMC8dCnWSyeqqKSaAAvj0e'),
(7, 'chocolatine_lover', 'bobo@zavatta.com', '$2y$10$N.659AL949GP30rgThr4buqY0TwEwMUqY2Xs8dhA99wYmksgP6lGW'),
(12, 'xX_d4rk_S4suk3_Xx', 'kevin.marchand@yopmail.fr', '$2y$10$CqYsMQkiYHezxrwbDEM1mOhhyCSltkJWR76lKCJEfeg...vCI9oMi'),
(13, 'vengeuse_masquee', 'maria@db.org', '$2y$10$GAjW49R1mCKuMX170IVDpOiwtMh9WyR4Er3eQbLT8MAv20nEBy5im');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id_post_category`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id_post_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
