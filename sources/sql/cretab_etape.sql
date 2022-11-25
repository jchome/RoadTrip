/**
 * Script MySQL pour Etape
 * Depend de :
	- cretab_itineraire.sql
**/

CREATE TABLE `rtpetp` (
	`etpidetp` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant', 
	`etplbnom` varchar(255) NOT NULL COMMENT 'Nom', 
	`etpnulat` float(20) NOT NULL COMMENT 'Latitude', 
	`etpnulon` float(20) NOT NULL COMMENT 'Longitude', 
	`etpfgarr` char(1) NOT NULL COMMENT 'Arrêt', 
	`etpiditi` int NOT NULL COMMENT 'Itinéraire' ,
	PRIMARY KEY (etpidetp) 
);


ALTER TABLE rtpetp ADD CONSTRAINT FK_etpiditi_rtpini_itiiditi FOREIGN KEY (etpiditi) REFERENCES rtpini (itiiditi);


