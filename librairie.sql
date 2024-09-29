
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


drop database if exists librairie;
-- Creation de la base de donnees
CREATE DATABASE IF NOT EXISTS librairie;

-- Selection de la base de donnees cree
USE librairie;

-- Table structure for table `book`

CREATE TABLE IF NOT EXISTS  `book` (
  `b_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `releaseDate` int(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `personnalCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `user` (`u_id`,`prenom`,`lastName`,`age`,`Adresse`,`phone`,`mail`,`personnalCode`) VALUES
(1,'Test', 'Test',30,'123 rue de la rue', 5141234567,'test@test.ca','1'),
(4,'ahmed','boujemaa',28,'quebec',2147483647,'ahmed2@yahoo.fr','735220027'),
(5,'mohamed','ali',33,'montreal',123456789,'m@yahoo.fr','956368370'),
(6,'kamel','ali',33,'montreal',1223456789,'m@yahoo.fr','984876195');


INSERT INTO `book` (`b_id`, `title`, `author`, `summary`, `releaseDate`, `status`, `user`, `category`)
VALUES 
(1,'Le seigneur des anneaux', 'J.R.R. Tolkien','aaa',NULL,'ok', NULL, 'Fantasy'),
(2,'Harry Potter', 'J.K. Rowling','aaa',NULL,'ok', NULL, 'Fantasy'),
(3,'Le petit prince', 'Antoine de Saint-Exupéry','aaa',NULL,'ok', NULL, 'Conte'),
(4,'Le rouge et le noir', 'Stendhal','aaa',NULL,'ok', NULL, 'Roman'),
(5,'Les misérables', 'Victor Hugo','aaa',NULL,'ok', NULL, 'Roman'),
(6,'Le père Goriot', 'Honoré de Balzac','aaa',NULL,'ok', NULL, 'Roman'),
(7,'Les fleurs du mal', 'Charles Baudelaire','aaa',NULL,'ok', NULL, 'Poésie'),
(8,'Les contemplations', 'Victor Hugo','aaa',NULL,'ok', NULL, 'Poésie'),
(9,'Les liaisons dangereuses', 'Choderlos de Laclos','aaa',NULL,'ok', NULL, 'Roman'),
(10,'Les trois mousquetaires', 'Alexandre Dumas','aaa',NULL,'ok', NULL, 'Roman');



--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `personnalCode` (`personnalCode`),
  ADD UNIQUE KEY `personnalCode_2` (`personnalCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
