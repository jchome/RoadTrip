<?php
/*
 * Created by generator
 *
 */

/***************************************************************************
 * DO NOT MODIFY THIS FILE, IT IS GENERATED
 ***************************************************************************/

class Etape_model extends CI_Model {
	
	/**
	* identifiant interne
	* @var int
	*/
	var $etpidetp;

	/**
	* Nom de l'étape
	* @var varchar(255)
	*/
	var $etplbnom;

	/**
	* Latidude de la coordonnée
	* @var float(20)
	*/
	var $etpnulat;

	/**
	* Longitude de la coordonnée
	* @var float(20)
	*/
	var $etpnulon;

	/**
	* Lien vers l'itinéraire
	* @var int
	*/
	var $etpiditi;

	/**
	* Ordre dans l'itinéraire
	* @var int
	*/
	var $etpnuord;

	/**
	* Description et commentaires
	* @var text(4000)
	*/
	var $etptxdes;


	
	
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
