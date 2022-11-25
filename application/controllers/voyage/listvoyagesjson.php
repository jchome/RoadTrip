<?php
/*
 * Created by generator
 *
 */

class ListVoyagesJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->library('session');
		$this->load->database();

		$this->load->model('User_model');
		$this->load->library('UserService');
	}

	/**
	 * Affichage des Voyages
	 */
	public function index(){
		// recuperation des donnees
		$data['voyages'] = $this->voyageservice->getAll($this->db);
		
		$this->load->view('voyage/jsonifyList_view', $data);
	}


	public function findBy_voyidvoy($voyidvoy, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['voyages'] = $this->voyageservice->getAllBy_voyidvoy($this->db, urldecode($voyidvoy), $orderBy, $asc, $limit, $offset);
		$this->load->view('voyage/jsonifyList_view', $data);
	}
	public function findBy_voylbnom($voylbnom, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['voyages'] = $this->voyageservice->getAllBy_voylbnom($this->db, urldecode($voylbnom), $orderBy, $asc, $limit, $offset);
		$this->load->view('voyage/jsonifyList_view', $data);
	}
	public function findBy_voyidusr($voyidusr, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['voyages'] = $this->voyageservice->getAllBy_voyidusr($this->db, urldecode($voyidusr), $orderBy, $asc, $limit, $offset);
		$this->load->view('voyage/jsonifyList_view', $data);
	}


	public function countBy_voyidvoy($voyidvoy){
		$data['count'] = $this->voyageservice->countBy_voyidvoy($this->db, urldecode($voyidvoy));
		$this->load->view('voyage/jsonifyCount_view', $data);
	}
	public function countBy_voylbnom($voylbnom){
		$data['count'] = $this->voyageservice->countBy_voylbnom($this->db, urldecode($voylbnom));
		$this->load->view('voyage/jsonifyCount_view', $data);
	}
	public function countBy_voyidusr($voyidusr){
		$data['count'] = $this->voyageservice->countBy_voyidusr($this->db, urldecode($voyidusr));
		$this->load->view('voyage/jsonifyCount_view', $data);
	}



	public function findLike_voylbnom($voylbnom){
		$data['voyages'] = $this->voyageservice->getAllLike_voylbnom($this->db, urldecode($voylbnom));
		$this->load->view('voyage/jsonifyList_view', $data);
	}

}
?>
