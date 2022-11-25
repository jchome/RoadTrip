<?php
/*
 * Created by generator
 *
 */

/***************************************************************************
 * DO NOT MODIFY THIS FILE, IT IS GENERATED
 ***************************************************************************/

class Voyage_model extends CI_Model {
	
	/**
	* identifiant interne
	* @var int
	*/
	var $voyidvoy;

	/**
	* Nom du voyage
	* @var varchar(255)
	*/
	var $voylbnom;

	/**
	* Lien vers l'utilisateur
	* @var int
	*/
	var $voyidusr;


	
	
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
