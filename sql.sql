---------------------	Creation de table basic	--------------------
CREATE TABLE utilisateur (

id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(100),
prenom VARCHAR(100),
email VARCHAR(255) NOT NULL UNIQUE,
description TEXT
product_image BLOB,
salarier BOOLEAN,
update_time TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

);


---------------------	Ajouter une colonne dans une table	-----------------------
ALTER TABLE name_table
ADD column_table INT NUL


--------------------	Creation de relation	----------------------
ALTER TABLE name_column
ADD FOREIGN KEY(name_column) REFERENCES name_table_parent(id)
ON DELETE CASCADE
ON UPDATE CASCADE



-----------------	pass	--------------------
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS maison;


CREATE TABLE client (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    update_time TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE maison (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    client_id INT NULL,
    nom VARCHAR(100),
    update_time TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE =InnoDB  DEFAULT CHARSET=utf8 ;


ALTER TABLE maison
ADD FOREIGN KEY (client_id) REFERENCES client(id)
ON DELETE CASCADE
ON UPDATE CASCADE;