/**
 * Script MySQL pour Itineraire
 * Depend de :
	- cretab_voyage.sql
**/

CREATE TABLE `rtpini` (
	`itiiditi` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant', 
	`idilbnom` varchar(255) NOT NULL COMMENT 'Nom', 
	`itiidvoy` int NOT NULL COMMENT 'Voyage' ,
	PRIMARY KEY (itiiditi) 
);


ALTER TABLE rtpini ADD CONSTRAINT FK_itiidvoy_rtpvoy_voyidvoy FOREIGN KEY (itiidvoy) REFERENCES rtpvoy (voyidvoy);


