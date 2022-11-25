<?php
/*
 * Created by generator
*
*/

class GetItineraireJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->database();

	}



}

?>