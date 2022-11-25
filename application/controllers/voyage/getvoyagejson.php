<?php
/*
 * Created by generator
*
*/

class GetVoyageJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->library('session');
		$this->load->database();

	}



}

?>