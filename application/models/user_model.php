<?php
/*
 * Created by generator
 *
 */

/***************************************************************************
 * DO NOT MODIFY THIS FILE, IT IS GENERATED
 ***************************************************************************/

class User_model extends CI_Model {
	
	/**
	* identifiant interne
	* @var int
	*/
	var $usridusr;

	/**
	* Nom de l'utilisateur
	* @var varchar(255)
	*/
	var $usrlbnom;

	/**
	* Identifiant de connexion
	* @var varchar(32)
	*/
	var $usrlblgn;

	/**
	* Mot de passe de connexion
	* @var password(32)
	*/
	var $usrlbpwd;

	/**
	* Adresse e-mail de contact
	* @var varchar(255)
	*/
	var $usrlbmai;

	/**
	* Image, photo ou avatar
	* @var file(255)
	*/
	var $usrfipho;


	
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->helper('utils');
		$this->load->helper('criteria');
	}
	
	
	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
