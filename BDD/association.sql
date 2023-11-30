-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id_act` int(11) NOT NULL AUTO_INCREMENT,
  `nom_act` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `num_resp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_act`) -- Faites de `id_act` la clé primaire
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `id_act` int(11) NOT NULL,
  `id_creneau` int(11) NOT NULL,
  PRIMARY KEY (`id_act`, `id_creneau`), -- Faites de `id_act` et `id_creneau` la clé primaire
  KEY `id_creneau` (`id_creneau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id_creneau` int(11) NOT NULL AUTO_INCREMENT,
  `heure_debut` datetime DEFAULT NULL,
  `heure_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_creneau`) -- Faites de `id_creneau` la clé primaire
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `num_participant` int(11) NOT NULL AUTO_INCREMENT,
  `nom_participant` varchar(100) DEFAULT NULL,
  `prenom_participant` varchar(100) DEFAULT NULL,
  `mail_participant` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`num_participant`) -- Faites de `num_participant` la clé primaire
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id_part` int(11) NOT NULL AUTO_INCREMENT,
  `id_act` int(11) NOT NULL,
  `num_participant` int(11) NOT NULL,
  `id_creneau` int(11) NOT NULL,
  PRIMARY KEY (`id_part`), -- Faites de `id_part` la clé primaire
  KEY `id_act` (`id_act`),
  KEY `num_participant` (`num_participant`),
  KEY `id_creneau` (`id_creneau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `num_resp` int(11) NOT NULL AUTO_INCREMENT,
  `nom_resp` varchar(100) DEFAULT NULL,
  `prenom_resp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`num_resp`) -- Faites de `num_resp` la clé primaire
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insertion de données dans la table `activite`
INSERT INTO `activite` (`nom_act`, `description`, `num_resp`) VALUES
('Atelier de peinture', 'Atelier pour apprendre à peindre', 1),
('Cours de danse', 'Cours de danse contemporaine', 2),
('Conférence sur l histoire de l art', 'Conférence sur l art du Moyen Âge', 1);

-- Insertion de données dans la table `avoir`
INSERT INTO `avoir` (`id_act`, `id_creneau`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- Insertion de données dans la table `creneau`
INSERT INTO `creneau` (`heure_debut`, `heure_fin`) VALUES
('2023-09-07 10:00:00', '2023-09-07 12:00:00'),
('2023-09-07 14:00:00', '2023-09-07 16:00:00'),
('2023-09-08 11:00:00', '2023-09-08 13:00:00');

-- Insertion de données dans la table `participant`
INSERT INTO `participant` (`nom_participant`, `prenom_participant`, `mail_participant`) VALUES
('Smith', 'Alice', 'alice.smith@example.com'),
('Dubois', 'Pierre', 'pierre.dubois@example.com'),
('Gonzalez', 'Maria', 'maria.gonzalez@example.com'),
('Gruere', 'Anthony', 'gruere.anthony@example.com');

-- Insertion de données dans la table `participation`
INSERT INTO `participation` (`id_act`, `num_participant`, `id_creneau`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(1, 2, 1),
(2, 1, 2),
(3, 24, 3);

-- Insertion de données dans la table `responsable`
INSERT INTO `responsable` (`nom_resp`, `prenom_resp`) VALUES
('Dupont', 'Jean'),
('Martin', 'Sophie'),
('Garcia', 'Carlos');