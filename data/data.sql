DROP DATABASE IF EXISTS mvc_buch;

CREATE DATABASE IF NOT EXISTS mvc_buch;

USE mvc_buch;

DROP TABLE IF EXISTS buch;

CREATE TABLE IF NOT EXISTS buch (
id int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
Titel varchar(50) NOT NULL,
Preis decimal(10,2) NOT NULL
);

INSERT INTO buch (Titel, Preis) VALUES 
('Der Wüstenplanet',19.99),
('Schöne Neue Welt',24.99),
('Die Maschinen',9.99),
('Krieg der Welten',15.99),
('Ich, der Roboter',39.90),
('Fiasko',19.99),
('Zeit aus den Fugen',15.99),
('Machts gut und danke für den Fisch',19.00),
('Die Reise zum Mittelpunkt der Erde',21.50),
('1984',23.50);