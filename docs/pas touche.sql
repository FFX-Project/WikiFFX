DROP DATABASE IF EXISTS FFX;

CREATE DATABASE IF NOT EXISTS FFX;
USE FFX;

CREATE TABLE Elementaire(
   Id_Elementaire COUNTER,
   Nom_Elementaire VARCHAR(50),
   PRIMARY KEY(Id_Elementaire)
)ENGINE=INNODB;

CREATE TABLE VarianteElem(
   Id_Variante COUNTER,
   Nom_Variante VARCHAR(50),
   PRIMARY KEY(Id_Variante)
)ENGINE=INNODB;

CREATE TABLE Compte(
   Id_Compte COUNTER,
   Pseudo_Compte VARCHAR(255),
   Mdp_Compte VARCHAR(255),
   Email_Compte VARCHAR(255),
   Droit_Compte INT,
   PRIMARY KEY(Id_Compte)
)ENGINE=INNODB;

CREATE TABLE Page(
   Id_Page COUNTER,
   Nom_Page VARCHAR(50),
   Image_Page VARCHAR(50),
   Description_Page VARCHAR(50),
   PRIMARY KEY(Id_Page)
)ENGINE=INNODB;

CREATE TABLE Monstre(
   Id_Page INT,
   Hp_Monstre INT,
   Accuracy_Monstre INT,
   Chance_Monstre INT,
   Defence_Monstre INT,
   DefenceMagique_Monstre INT,
   Agi_Monstre VARCHAR(50),
   Esquive_Monstre VARCHAR(50),
   Mp_Monstre INT,
   Force_Monstre INT,
   Magie_Monstre INT,
   Overkill_Monstre INT,
   Gil_Monstre INT,
   XP_Monstre INT,
   PRIMARY KEY(Id_Page),
   FOREIGN KEY(Id_Page) REFERENCES Page(Id_Page)
)ENGINE=INNODB;

CREATE TABLE Location(
   Id_Page INT,
   PRIMARY KEY(Id_Page),
   FOREIGN KEY(Id_Page) REFERENCES Page(Id_Page)
)ENGINE=INNODBENGINE=INNODB;

CREATE TABLE Item_Clef(
   Id_Page_1 INT,
   Id_Page INT NOT NULL,
   PRIMARY KEY(Id_Page_1),
   FOREIGN KEY(Id_Page_1) REFERENCES Page(Id_Page),
   FOREIGN KEY(Id_Page) REFERENCES Location(Id_Page)
)ENGINE=INNODB;

CREATE TABLE Commentaire(
   Id_Commentaire COUNTER,
   Text_Commentaire VARCHAR(255),
   Id_Page INT,
   Id_Commentaire_1 INT,
   Id_Compte INT NOT NULL,
   PRIMARY KEY(Id_Commentaire),
   UNIQUE(Id_Commentaire_1),
   FOREIGN KEY(Id_Page) REFERENCES Page(Id_Page),
   FOREIGN KEY(Id_Commentaire_1) REFERENCES Commentaire(Id_Commentaire),
   FOREIGN KEY(Id_Compte) REFERENCES Compte(Id_Compte)
)ENGINE=INNODB;

CREATE TABLE a(
   Id_Page INT,
   Id_Page_1 INT,
   PRIMARY KEY(Id_Page, Id_Page_1),
   FOREIGN KEY(Id_Page) REFERENCES Monstre(Id_Page),
   FOREIGN KEY(Id_Page_1) REFERENCES Location(Id_Page)
)ENGINE=INNODB;

CREATE TABLE Ont(
   Id_Page INT,
   Id_Elementaire INT,
   Id_Variante INT,
   PRIMARY KEY(Id_Page, Id_Elementaire, Id_Variante),
   FOREIGN KEY(Id_Page) REFERENCES Monstre(Id_Page),
   FOREIGN KEY(Id_Elementaire) REFERENCES Elementaire(Id_Elementaire),
   FOREIGN KEY(Id_Variante) REFERENCES VarianteElem(Id_Variante)
)ENGINE=INNODB;


--
-- INSERTION DANS LES TABLES :

-- LOCATION
INSERT INTO location (NomLoc) VALUES ("Temple de Baaj"), ("Plaine Foudroyée");

-- MONSTRE
INSERT INTO monstre VALUES (1,"Geosgaeno Boss", 32767,128,36,40,50,15,50,50,48,0,32767,"",0,0), (2,"Aerouge", 200,220,1,16,0,15,1,120,11,13,300,"",144,92);

-- A (JOINTURE MONSTRE/LOCATIN)

INSERT INTO a values (1,1), (2,2);

-- Elementaire

INSERT INTO elementaire VALUES (1, "Feu"), (2,"Glace"), (3,"Foudre"), (4,"Eau");

-- VariantElem

INSERT INTO varianteelem VALUES (1, "Faible"), (2, "Normal"),(3,"Puissante");

-- ItemClef

INSERT INTO item_clef VALUES (1, "Al Bhed Primer I", "Traduit de Y à A", "",1), (2, "Al Bhed Primer II", "Traduit de P à B", "",1), (3, "Al Bhed Primer III", "Traduit de L à C", "",1), (4, "Al Bhed Primer IV", "Traduit de T à D", "",1), (5, "Al Bhed Primer IX", "Traduit de E à I", "",1), (6, "Al Bhed Primer VI", "Traduit de V à F", "",1), (7, "Al Bhed Primer VII", "Traduit de K à G", "",1), (8, "Al Bhed Primer VIII", "Traduit de R à H", "",1), (9, "Al Bhed Primer X", "Traduit de G à K", "",1), (10, "Al Bhed Primer XI", "Traduit de G à K", "",1), (11, "Al Bhed Primer XII", "Traduit de M à L", "",1), (12, "Al Bhed Primer XIV", "Traduit de H à N", "",1), (13, "Al Bhed Primer XIX", "Traduit de C à S", "",1), (14, "Al Bhed Primer XV", "Traduit de U à O", "",1)
, (15, "Al Bhed Primer XVI", "Traduit de B à P", "",1), (16, "Al Bhed Primer XVII", "Traduit de N à R", "",1), (17, "Al Bhed Primer XVIII", "Traduit de N à R", "",1), (18, "Al Bhed Primer XX", "Traduit de D à T", "",1), (19, "Al Bhed Primer XXI", "Traduit de I à U", "",1)
, (20, "Al Bhed Primer XXII", "Traduit de J à V", "",1), (21, "Al Bhed Primer XXIII", "Traduit de F à W", "",1), (22, "Al Bhed Primer XXV", "Traduit de O à Y", "",1), (23, "Al Bhed Primer XXVI", "Traduit de T à D", "",1);
