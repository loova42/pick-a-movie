-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 07 avr. 2021 à 12:21
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  AUTOCOMMIT = 0;
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Base de données :  `db_pickamovie`
  --
  DROP DATABASE IF EXISTS db_pickamovie;
CREATE DATABASE IF NOT EXISTS db_pickamovie;
USE db_pickamovie;
-- --------------------------------------------------------
  --
  -- Structure de la table `admin`
  --
  DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
    `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
    `idClient` int(11) NOT NULL,
    PRIMARY KEY (`idAdmin`),
    KEY `idClient` (`idClient`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
--
  -- Déchargement des données de la table `admin`
  --
INSERT INTO
  `admin` (`idAdmin`, `idClient`)
VALUES
  (4, 15);
-- --------------------------------------------------------
  --
  -- Structure de la table `client`
  --
  DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
    `idClient` int(11) NOT NULL AUTO_INCREMENT,
    `nickNameClient` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    `nameClient` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    `firstNameClient` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    `pwdClient` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    `emailClient` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    PRIMARY KEY (`idClient`),
    KEY `idClient` (`idClient`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 25 DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
--
  -- Déchargement des données de la table `client`
  --
INSERT INTO
  `client` (
    `idClient`,
    `nickNameClient`,
    `nameClient`,
    `firstNameClient`,
    `pwdClient`,
    `emailClient`
  )
VALUES
  (
    15,
    'Loova',
    'Valentin',
    'Durieux',
    '$2y$10$ka8iPVSJcWFynaGrrbQl5ONzhtJuZe40jJV1j9YR2PIkWyRvuSbue',
    'test@email.com'
  );
-- --------------------------------------------------------
  --
  -- Structure de la table `movie`
  --
  DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
    `idMovie` int(11) NOT NULL AUTO_INCREMENT,
    `titleMovie` varchar(100) COLLATE utf8_bin NOT NULL,
    `summaryMovie` text COLLATE utf8_bin NOT NULL,
    `childPrice` double NOT NULL,
    `adultPrice` double NOT NULL,
    `studentPrice` double NOT NULL,
    `poster` varchar(200) COLLATE utf8_bin NOT NULL,
    `header` varchar(200) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY (`idMovie`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 18 DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
--
  -- Déchargement des données de la table `movie`
  --
INSERT INTO
  `movie` (
    `idMovie`,
    `titleMovie`,
    `summaryMovie`,
    `childPrice`,
    `adultPrice`,
    `studentPrice`,
    `poster`,
    `header`
  )
VALUES
  (
    2,
    'Star Wars : l\'empire contre attaque',
    'Les Rebelles sont dispersés après l’attaque de leur base. Han et Leia sont poursuivis tandis que Luke s’entraîne avec maître Yoda. Mais quand Luke affronte Vador, il découvre la vérité sur son passé.',
    6.5,
    10,
    8,
    'posters/StarWars.jpg',
    'posters/headers/StarWarsHeader.jpg'
  ),
  (
    3,
    'Alien',
    'Réalisé par Ridley Scott, ce classique de la science-fiction raconte l\'histoire de Ripley (Sigourney Weaver) qui enquête sur un appel de détresse provenant d\'une planète lointaine et fait une découverte effroyable.',
    6.5,
    9,
    8,
    'posters/Alien.jpg',
    'posters/headers/alienHeader.jpg'
  ),
  (
    4,
    'Bob l\'éponge : le film',
    'Quand son meilleur ami est kidnappé, Bob l\'éponge entraîne Patrick dans une folle aventure loin de Bikini Bottom pour sauver leur compagnon à coquille rose.',
    6.5,
    9,
    8,
    'posters/BobLeponge.jpg',
    'posters/headers/2017_SpongeBob_Collection_Header.webp'
  ),
  (
    5,
    'The Darjeeling Limited',
    'Francis, Jack et Peter, trois frères qui ne se sont pas vus depuis la mort de leur père, décident de faire un grand voyage en train à travers l\'Inde pour renouer les liens fraternels. Mais très vite, la \"quête spirituelle\" va dérailler : ils vont se retrouver seuls, perdus au milieu du désert avec onze valises, une imprimante, une machine à plastifier et beaucoup de comptes à régler avec la vie...',
    6.5,
    9,
    8,
    'posters/DarjeelingLimited.jpg',
    NULL
  ),
  (
    6,
    'DeadPool',
    'Basé sur l\'antihéros le moins conventionnel de l\'univers Marvel, Deadpool raconte l\'histoire des origines de Wade Wilson, un mercenaire qui traque l\'homme qui a presque anéanti sa vie.',
    6.5,
    9,
    8,
    'posters/DeadPool.jpg',
    'posters/headers/deadPoolHeader.jpg'
  ),
  (
    7,
    'ET, l’extraterrestre',
    'Pour devenir l\'ami d\'une créature de l\'espace qui veut rentrer chez elle, il faut de la patience et beaucoup de bonbons.',
    6.5,
    9,
    8,
    'posters/ET.jpg',
    NULL
  ),
  (
    8,
    'India Jones et la dernière croisade',
    'Accompagné de son père pour sa troisième aventure, Indiana Jones part explorer le berceau de la civilisation dans une nouvelle quête du Graal.',
    6.5,
    9,
    8,
    'posters/IndianaJones.jpg',
    'posters/headers/indianaJonesHeader.jpg'
  ),
  (
    9,
    'Iron Man',
    'Survivant d\'une attaque en territoire ennemi, l\'homme d\'affaires Tony Stark fabrique une armure high-tech pour défendre le monde sous le nom de Iron Man.',
    6.5,
    9,
    8,
    'posters/IronMan.jpg',
    NULL
  ),
  (
    10,
    'Big Trouble in Little China',
    'Un camionneur macho est plongé dans un monde étrange, quand la fiancée de son ami est kidnappée par des forces mystérieuses dans le quartier de Chinatown, à San Francisco.',
    6.5,
    9,
    8,
    'posters/JackBurton.jpg',
    'posters/headers/jackBurtonHeader.jpg'
  ),
  (
    11,
    'Jurassic Park',
    'À moins que vous ne soyez prêts à lutter pour votre survie, il vaut mieux ne pas toucher à l\'ADN de dinosaure fossilisé.',
    6.5,
    9,
    8,
    'posters/JurassicPark.jpg',
    'posters/headers/jurassicParkHeader.jpg'
  ),
  (
    12,
    'La vie aquatique',
    'Steve Zissou (Bill Murray) et son équipe traquent le mystérieux requin-jaguar, une créature quasi-mythique qui a tué le coéquipier de Steve pendant le tournage d’un documentaire.',
    6.5,
    9,
    8,
    'posters/LaVieAquatique.jpg',
    NULL
  ),
  (
    13,
    'Scooby-Doo',
    'La bande de Scooby-Doo se retrouve sur Spooky Island pour comprendre la cause d\'une série d\'incidents paranormaux.',
    6.5,
    9,
    8,
    'posters/ScoobyDoo.jpg',
    NULL
  ),
  (
    14,
    'Soul',
    'Les studios Pixar Animation vous propulsent depuis les rues de New York dans des dimensions cosmiques, en quête de réponses à de grandes questions existentielles.',
    6.5,
    9,
    8,
    'posters/Soul.jpg',
    'posters/headers/soulHeader.jpg'
  ),
  (
    15,
    'Spider-Man : far from home',
    'Même les super-héros ont parfois besoin de vacances, mais une nouvelle menace oblige Peter Parker à passer à l\'action lors d\'un voyage scolaire en Europe.',
    6.5,
    9,
    8,
    'posters/SpiderMan.jpg',
    NULL
  ),
  (
    16,
    'Toy Story',
    'Bienvenue dans un monde épatant où les jouets jouent quand leurs propriétaires ne sont pas là. Rencontrez Woody, Buzz et tous leurs amis dans une aventure remplie d’humour, de cœur et d’amitié.',
    6.5,
    9,
    8,
    'posters/ToyStory.jpg',
    'posters/headers/toyStoryHeader.jpg'
  );
-- --------------------------------------------------------
  --
  -- Structure de la table `purchase`
  --
  DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
    `idPurchase` int(11) NOT NULL AUTO_INCREMENT,
    `ticketPrice` double NOT NULL,
    `ticketQuant` int(11) NOT NULL,
    `idSession` int(11) NOT NULL,
    `idClient` int(11) NOT NULL,
    PRIMARY KEY (`idPurchase`),
    KEY `fk_purchaseClient` (`idClient`),
    KEY `fk_purchaseSession` (`idSession`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
-- --------------------------------------------------------
  --
  -- Structure de la table `review`
  --
  DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
    `idReview` int(11) NOT NULL AUTO_INCREMENT,
    `textReview` text COLLATE utf8_bin NOT NULL,
    `dateReview` datetime NOT NULL,
    `noteReview` int(1) NOT NULL,
    `idClient` int(11) NOT NULL,
    `idMovie` int(11) NOT NULL,
    PRIMARY KEY (`idReview`),
    KEY `fk_reviewMovie` (`idMovie`),
    KEY `fk_reviewClient` (`idClient`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
-- --------------------------------------------------------
  --
  -- Structure de la table `session`
  --
  DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
    `idSession` int(11) NOT NULL AUTO_INCREMENT,
    `dateTimeSession` datetime NOT NULL,
    `idMovie` int(11) NOT NULL,
    PRIMARY KEY (`idSession`),
    KEY `fk_sessionMovie` (`idMovie`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
--
  -- Contraintes pour les tables déchargées
  --
  --
  -- Contraintes pour la table `admin`
  --
ALTER TABLE
  `admin`
ADD
  CONSTRAINT `fk_adminClient` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
--
  -- Contraintes pour la table `purchase`
  --
ALTER TABLE
  `purchase`
ADD
  CONSTRAINT `fk_purchaseClient` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD
  CONSTRAINT `fk_purchaseSession` FOREIGN KEY (`idSession`) REFERENCES `session` (`idSession`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
  -- Contraintes pour la table `review`
  --
ALTER TABLE
  `review`
ADD
  CONSTRAINT `fk_reviewClient` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD
  CONSTRAINT `fk_reviewMovie` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
  -- Contraintes pour la table `session`
  --
ALTER TABLE
  `session`
ADD
  CONSTRAINT `fk_sessionMovie` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;