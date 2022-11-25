/**
 * Script MySQL pour Voyage
 * Depend de :
	- cretab_user.sql
**/

CREATE TABLE `rtpvoy` (
	`voyidvoy` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`voylbnom` varchar(255) NOT NULL COMMENT 'Nom', 
	`voyidusr` int NOT NULL COMMENT 'Auteur' ,
	PRIMARY KEY (voyidvoy) 
);


ALTER TABLE rtpvoy ADD CONSTRAINT FK_voyidusr_rtpusr_usridusr FOREIGN KEY (voyidusr) REFERENCES rtpusr (usridusr);


