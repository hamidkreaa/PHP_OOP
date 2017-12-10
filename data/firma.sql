-- Datenbank firma

CREATE SCHEMA IF NOT EXISTS firma;

USE firma;

CREATE TABLE IF NOT EXISTS personen
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	vorname VARCHAR(40) NOT NULL,
	nachname VARCHAR(40) NOT NULL,
	strasse VARCHAR(40) NOT NULL,
	haus_nr VARCHAR(40) NOT NULL,
	ort VARCHAR(40) NOT NULL,
	plz VARCHAR(5) NOT NULL,
	email VARCHAR(40) NOT NULL,
	mobil VARCHAR(40) NOT NULL,
	telefon VARCHAR(40) NOT NULL,
	position_id INT
);


CREATE TABLE IF NOT EXISTS position
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	position VARCHAR(40) UNIQUE NOT NULL,
	gehalt DECIMAL(6,2) NOT NULL
);


-- 
INSERT INTO position (position, gehalt) VALUES ('Administrator', 4560.45);
INSERT INTO position (position, gehalt) VALUES ('Entwicklung', 7690.75);
INSERT INTO position (position, gehalt) VALUES ('Kaffekocher', 5099.25);
INSERT INTO position (position, gehalt) VALUES ('Unterhalter', 8570.15);
