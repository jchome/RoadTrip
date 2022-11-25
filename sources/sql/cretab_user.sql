/**
 * Script MySQL pour User
 * 
**/

CREATE TABLE `rtpusr` (
	`usridusr` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`usrlbnom` varchar(255) NOT NULL COMMENT 'Nom', 
	`usrlblgn` varchar(32) NOT NULL COMMENT 'Login', 
	`usrlbpwd` varchar(32) NOT NULL COMMENT 'Mot de passe', 
	`usrlbmai` varchar(255) NOT NULL COMMENT 'Email', 
	`usrfipho` varchar(4000) COMMENT 'Photo' ,
	PRIMARY KEY (usridusr) 
);




