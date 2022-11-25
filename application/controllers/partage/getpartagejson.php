<?php
/*
 * Created by generator
*
*/

class GetPartageJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		$this->load->library('session');
		$this->load->database();

	}



}

?>