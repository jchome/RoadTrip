<?php
/*
 * Created by generator
*
*/

class GetEtapeJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		$this->load->library('session');
		$this->load->database();

	}



}

?>