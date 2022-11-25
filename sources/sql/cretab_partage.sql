/**
 * Script MySQL pour Partage
 * Depend de :
	- cretab_voyage.sql
	- cretab_user.sql
**/

CREATE TABLE `rtppar` (
	`paridpar` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`paridvoy` int NOT NULL COMMENT 'Voyage partagé', 
	`paridami` int NOT NULL COMMENT 'Ami' ,
	PRIMARY KEY (paridpar) 
);


ALTER TABLE rtppar ADD CONSTRAINT FK_paridvoy_rtpvoy_voyidvoy FOREIGN KEY (paridvoy) REFERENCES rtpvoy (voyidvoy);
ALTER TABLE rtppar ADD CONSTRAINT FK_paridami_rtpusr_usridusr FOREIGN KEY (paridami) REFERENCES rtpusr (usridusr);


