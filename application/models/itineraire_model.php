<?php
/*
 * Created by generator
 *
 */

/***************************************************************************
 * DO NOT MODIFY THIS FILE, IT IS GENERATED
 ***************************************************************************/

class Itineraire_model extends CI_Model {
	
	/**
	* identifiant interne
	* @var int
	*/
	var $itiiditi;

	/**
	* Nom de l'itinéraire
	* @var varchar(255)
	*/
	var $itilbnom;

	/**
	* Lien vers le voyage
	* @var int
	*/
	var $itiidvoy;

	/**
	* Ordre dans le voyage
	* @var int
	*/
	var $itinuord;

	/**
	* Durée de l'itinéraire
	* @var varchar(255)
	*/
	var $itilbdur;

	/**
	* Distance de l'itinéraire
	* @var float(12)
	*/
	var $itinudst;

	/**
	* Description et commentaires
	* @var text(4000)
	*/
	var $ititxdes;


	
	
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
