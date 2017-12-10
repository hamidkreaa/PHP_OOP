--
--
CREATE DATABASE IF NOT EXISTS edv_schule;

USE edv_schule;

CREATE TABLE IF NOT EXISTS seminare (
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
	titel VARCHAR(80) UNIQUE NOT NULL,
	beschreibung TEXT NOT NULL,
	preis DECIMAL(6,2),
	kategorie_id INT(2)
	);
	
CREATE TABLE  kategorien (
	id INT(2) AUTO_INCREMENT PRIMARY KEY,
	kategorie VARCHAR(20) UNIQUE NOT NULL
)	;
	
CREATE TABLE IF NOT EXISTS seminartermine (
	id INT(3) AUTO_INCREMENT PRIMARY KEY,
	seminar_id INT NOT NULL,
	beginn DATE NOT NULL,
	ende DATE NOT NULL,
	raum VARCHAR(8)
	);
		
CREATE TABLE IF NOT EXISTS benutzer (
	id INT(4) PRIMARY KEY AUTO_INCREMENT ,
	anrede VARCHAR(20) NOT NULL,
	vorname VARCHAR(50) NOT NULL,
	name VARCHAR(60) NOT NULL,
	registriert_seit DATE,
	email VARCHAR(50) UNIQUE NOT NULL,
	passwort VARCHAR(20) NOT NULL
	);
		
CREATE TABLE IF NOT EXISTS nimmt_teil (
	seminartermin_id INT,
	benutzer_id INT,PRIMARY KEY(seminartermin_id, benutzer_id)
	);
	
	
	
INSERT INTO nimmt_teil(seminartermin_id,benutzer_id) VALUES
(1,2),(1,3),(1,5),(1,6),(1,7),(1,9),(1,10),
(2,2),(2,4),(2,7),(2,8),
(3,5),(3,7),(3,8),(3,9),
(4,1),(4,2),(4,3),(4,4),(4,6),(4,10),
(5,5),(5,9),(5,10),
(6,1),(6,2),(6,3),(6,6),(6,9);


INSERT INTO benutzer (anrede, vorname, name, registriert_seit, email, passwort) VALUES ('Herr','Max','Schmidt',2015-03-11,'max@abc.de','m1234');




$anrede = array ('Herr','Frau','Dr.','Prof.');
$vorname =  array ('Max','John','Walther','Milton','Mary');
$nachname = array ('Schmidt','Schulz','Kahn','Henning','Dengel');
$registriert_seit = array ('2015-03-11','2013-07-23','2014-12-30','2011-11-26','2011-10-27');
$email = array ('max@abc.de','john@abc.de','walther@abc.de','milton@abc.de','mary@abc.de');
$passwort = array ('m1234','j1234','w1234','m1234','m1234');
try {
//for($i=0;$i<4;$i++):
$i=0;
$sql = "
INSERT INTO benutzer (anrede, vorname, nachname, registriert_seit, email,passwort) VALUES $anrede[$i],$vorname[$i],$nachname[$i],$registriert_seit[$i],$email[$i],$passwort[$i];";






INSERT INTO seminare(titel, beschreibung, preis, kategorie_id) VALUES
('PHP Grundlagen','PHP Grundlagen Beschreibung ...',1990.50,2),
('PHP OOP', 'PHP OOP Beschreibung ...',2560.30,2),
('MYSQL Grundlagen','MYSQL Grundlagen Beschreibung ...',2340.50,5),
('MYSQL Advanced','MYSQL Advanced Beschreibung ...',990.50,5),
('Java Programmierung', 'Java Programmierung Beschreibung ...',2340.50,1),
('HTML Grundlagen', 'HTML Grundlagen Beschreibung ...',1720.50,3),
('CSS Grundlagen', 'CSS Grundlagen Beschreibung ...',2190.50,4),
('JavaScript', 'JavaScript GrundlagenBeschreibung ...',3450.50,2),
('XML Grundlagen', 'XML Grundlagen Beschreibung ...',2390.50,3),
('XSLT Grundlagen', 'XSLT Grundlagen Beschreibung ...',1990.50,3),
('JQuery Grundlagen', 'JQuery Grundlagen Beschreibung ...',1990.50,2);

INSERT INTO kategorien(kategorie) VALUES

('Programmierung'),
('Web Programmierung'),
('Web Technologien'),
('Web Design'),
('Datenbanken');


anrede {'Herr','Frau','Dr.','Prof.'}
vorname {'Max','John','Walther','Milton','Mary'}
nachname{'Schmidt','Schulz','Kahn','Henning','Dengel'}
registriert_seit{'2015-03-11','2013-07-23','2014-12-30','2011-11-26','2011-10-27'}
email{'max@abc.de','john@abc.de','walther@abc.de','milton@abc.de','mary@abc.de'}
passwort{'m1234','j1234','w1234','m1234','m1234'}


INSERT INTO benutzer (anrede, vorname, nachname, registriert_seit, email,passwort)

DROP TABLE 	seminartermine;
CREATE TABLE IF NOT EXISTS seminartermine (
	id INT(3) AUTO_INCREMENT PRIMARY KEY,
	seminar_id INT NOT NULL,
	beginn DATE NOT NULL,
	ende DATE NOT NULL,
	raum VARCHAR(8)
	);

INSERT INTO seminartermine (seminar_id,beginn,ende,raum)	
VALUES (1,'2015-07-23','2015-07-28','R-4');
INSERT INTO seminartermine (seminar_id,beginn,ende,raum)	
VALUES (2,'2015-08-23','2015-08-28','R-1');
INSERT INTO seminartermine (seminar_id,beginn,ende,raum)	
VALUES (1,'2015-09-23','2015-09-28','R-3');
INSERT INTO seminartermine (seminar_id,beginn,ende,raum)	
VALUES (3,'2015-10-23','2015-10-28','R-5');
INSERT INTO seminartermine (seminar_id,beginn,ende,raum)	
VALUES (2,'2015-08-23','2015-08-28','R-1');
INSERT INTO seminartermine (seminar_id,beginn,ende,raum)	
VALUES (1,'2015-09-23','2015-09-28','R-2');





SELECT benutzer.id,anrede, vorname, name, titel, kategorie FROM benutzer 
JOIN nimmt_teil ON benutzer.id = nimmt_teil.benutzer_id 
JOIN seminartermine ON nimmt_teil.seminartermin_id = seminartermine.id
JOIN seminare ON seminartermine.seminar_id = seminare.id
JOIN kategorien ON kategorien.id = seminare.kategorie_id ORDER BY benutzer.id;