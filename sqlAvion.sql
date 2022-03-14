-- Nettoyage des tables

DROP TABLE IF EXISTS avion;
DROP TABLE IF EXISTS mode_de_fontionnement;
DROP TABLE IF EXISTS parcours_canalisation;
DROP TABLE IF EXISTS emplacement;
DROP TABLE IF EXISTS emplacement_sys_elimination;
DROP TABLE IF EXISTS materiel_de_communication;
DROP TABLE IF EXISTS emplacement_materiel_de_com;
DROP TABLE IF EXISTS point_acces_externe;
DROP TABLE IF EXISTS fenetre_poste_pilotage;
DROP TABLE IF EXISTS ouverture_fenetre_pos_pilo;
DROP TABLE IF EXISTS dimenssion;


-- Creation basic des tables avec les relation static

-- Avion
CREATE TABLE avion (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NULL,
    plan_internte_image MEDIUMBLOB NULL NULL,
    disposition_siege_image MEDIUMBLOB NULL NULL,
    plan_cabine_image MEDIUMBLOB NULL NULL,
    plan_pilotage_image MEDIUMBLOB NULL NULL,
    couleur_amenagement_interne VARCHAR(100),
    epaisseur_vitre VARCHAR(100),
    lampes_temoin_hors_circuit VARCHAR(3),
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Mode de fonctionnement de l'avion
CREATE TABLE mode_de_fontionnement (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    nom VARCHAR(50) NULL,
    description_ TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Parcours de canalisation de l'avion
CREATE TABLE parcours_canalisation (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    nom VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    description_ TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Emplacement de de l'avion
CREATE TABLE emplacement (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    nom VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    description_ TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Emplacement du systeme d'elemination de l'avion
CREATE TABLE emplacement_sys_elimination (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    nom VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    description_ TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Materiel de communication de l'avion
CREATE TABLE materiel_de_communication (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    emplacement_materiel_id INT NULL,
    nom VARCHAR(50) NULL,
    fonction VARCHAR(150) NULL,
    observation TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Emplacement du materiel de communication
CREATE TABLE emplacement_materiel_de_com (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    materiel_communication_id INT NULL,
    nom VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    description_ TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Point d'acces externe de l'avion
CREATE TABLE point_acces_externe (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    nom VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    description_ TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Les fenetres de poste de pilotages
CREATE TABLE fenetre_poste_pilotage (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    ouverture_fenetre_id INT NULL,
    nom VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Ouverture du poste de pilotage
CREATE TABLE ouverture_fenetre_pos_pilo (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fenetre_poste_pilotage_id INT NULL,
    nom VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    description_ TEXT NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


-- Ouverture de la fenetre du poste de pilotage
CREATE TABLE dimenssion (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    avion_id INT NULL,
    dimenssion_verticale VARCHAR(50) NULL,
    hauteur_point_entre VARCHAR(50) NULL,
    hauteur_point_sortir VARCHAR(50) NULL,
    image_ MEDIUMBLOB NULL,
    creer TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;



-- Creation des relation one-to-many

-- avion to *
ALTER TABLE mode_de_fontionnement
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- avion to *
ALTER TABLE parcours_canalisation
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- avion to *
ALTER TABLE emplacement
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- avion to *
ALTER TABLE emplacement_sys_elimination
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- avion to *
ALTER TABLE materiel_de_communication
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- avion to *
ALTER TABLE point_acces_externe
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- avion to *
ALTER TABLE fenetre_poste_pilotage
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- avion to *
ALTER TABLE dimenssion
ADD FOREIGN KEY (avion_id) REFERENCES avion(id)
ON DELETE CASCADE
ON UPDATE CASCADE;


-- Creation des relations many-to-many

-- materiel_de_communication to *
ALTER TABLE emplacement_materiel_de_com
ADD FOREIGN KEY (materiel_communication_id) REFERENCES materiel_de_communication(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- emplacement_materiel_de_com to *
ALTER TABLE materiel_de_communication
ADD FOREIGN KEY (emplacement_materiel_id) REFERENCES emplacement_materiel_de_com(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- fenetre_poste_pilotage to *
ALTER TABLE ouverture_fenetre_pos_pilo
ADD FOREIGN KEY (fenetre_poste_pilotage_id) REFERENCES fenetre_poste_pilotage(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- ouverture_fenetre_pos_pilo to *
ALTER TABLE fenetre_poste_pilotage
ADD FOREIGN KEY (ouverture_fenetre_id) REFERENCES ouverture_fenetre_pos_pilo(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

