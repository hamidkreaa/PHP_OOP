--
--
DROP TABLE 	benutzer;		
CREATE TABLE IF NOT EXISTS benutzer (
	id INT(4) PRIMARY KEY AUTO_INCREMENT ,
	anrede VARCHAR(20) NOT NULL,
	vorname VARCHAR(50) NOT NULL,
	name VARCHAR(60) NOT NULL,
	registriert_seit DATE,
	email VARCHAR(50) UNIQUE NOT NULL,
	passwort VARCHAR(20) NOT NULL
	);
		


INSERT INTO benutzer (anrede, vorname, name, registriert_seit, email, passwort) VALUES ('Herr','Max','Schmidt',2015-03-11,'max@abc.de','m1234');
INSERT INTO benutzer (anrede, vorname, name, registriert_seit, email, passwort) VALUES ('Herr','John','Schulz',2013-07-23,'john@abc.de','john');
INSERT INTO benutzer (anrede, vorname, name, registriert_seit, email, passwort) VALUES ('Frau','Walther','Kahn',2014-12-30,'walther@abc.de','walther');
INSERT INTO benutzer (anrede, vorname, name, registriert_seit, email, passwort) VALUES ('Herr','Milton','Schmidt',2015-03-11,'milton@abc.de','milton');
INSERT INTO benutzer (anrede, vorname, name, registriert_seit, email, passwort) VALUES ('Frau','Mary','Dengel',2011-10-27,'mary@abc.de','mary');











