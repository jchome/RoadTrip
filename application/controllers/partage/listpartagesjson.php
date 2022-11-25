<?php
/*
 * Created by generator
 *
 */

class ListPartagesJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		$this->load->library('session');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('User_model');
		$this->load->library('UserService');
	}

	/**
	 * Affichage des Partages
	 */
	public function index(){
		// recuperation des donnees
		$data['partages'] = $this->partageservice->getAll($this->db);
		
		$this->load->view('partage/jsonifyList_view', $data);
	}


	public function findBy_paridpar($paridpar, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['partages'] = $this->partageservice->getAllBy_paridpar($this->db, urldecode($paridpar), $orderBy, $asc, $limit, $offset);
		$this->load->view('partage/jsonifyList_view', $data);
	}
	public function findBy_paridvoy($paridvoy, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['partages'] = $this->partageservice->getAllBy_paridvoy($this->db, urldecode($paridvoy), $orderBy, $asc, $limit, $offset);
		$this->load->view('partage/jsonifyList_view', $data);
	}
	public function findBy_paridami($paridami, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['partages'] = $this->partageservice->getAllBy_paridami($this->db, urldecode($paridami), $orderBy, $asc, $limit, $offset);
		$this->load->view('partage/jsonifyList_view', $data);
	}


	public function countBy_paridpar($paridpar){
		$data['count'] = $this->partageservice->countBy_paridpar($this->db, urldecode($paridpar));
		$this->load->view('partage/jsonifyCount_view', $data);
	}
	public function countBy_paridvoy($paridvoy){
		$data['count'] = $this->partageservice->countBy_paridvoy($this->db, urldecode($paridvoy));
		$this->load->view('partage/jsonifyCount_view', $data);
	}
	public function countBy_paridami($paridami){
		$data['count'] = $this->partageservice->countBy_paridami($this->db, urldecode($paridami));
		$this->load->view('partage/jsonifyCount_view', $data);
	}




}
?>
