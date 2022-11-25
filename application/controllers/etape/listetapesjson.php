<?php
/*
 * Created by generator
 *
 */

class ListEtapesJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		$this->load->library('session');
		$this->load->database();

		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
	}

	/**
	 * Affichage des Etapes
	 */
	public function index(){
		// recuperation des donnees
		$data['etapes'] = $this->etapeservice->getAll($this->db);
		
		$this->load->view('etape/jsonifyList_view', $data);
	}


	public function findBy_etpidetp($etpidetp, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['etapes'] = $this->etapeservice->getAllBy_etpidetp($this->db, urldecode($etpidetp), $orderBy, $asc, $limit, $offset);
		$this->load->view('etape/jsonifyList_view', $data);
	}
	public function findBy_etplbnom($etplbnom, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['etapes'] = $this->etapeservice->getAllBy_etplbnom($this->db, urldecode($etplbnom), $orderBy, $asc, $limit, $offset);
		$this->load->view('etape/jsonifyList_view', $data);
	}
	public function findBy_etpnulat($etpnulat, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['etapes'] = $this->etapeservice->getAllBy_etpnulat($this->db, urldecode($etpnulat), $orderBy, $asc, $limit, $offset);
		$this->load->view('etape/jsonifyList_view', $data);
	}
	public function findBy_etpnulon($etpnulon, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['etapes'] = $this->etapeservice->getAllBy_etpnulon($this->db, urldecode($etpnulon), $orderBy, $asc, $limit, $offset);
		$this->load->view('etape/jsonifyList_view', $data);
	}
	public function findBy_etpfgarr($etpfgarr, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['etapes'] = $this->etapeservice->getAllBy_etpfgarr($this->db, urldecode($etpfgarr), $orderBy, $asc, $limit, $offset);
		$this->load->view('etape/jsonifyList_view', $data);
	}
	public function findBy_etpiditi($etpiditi, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['etapes'] = $this->etapeservice->getAllBy_etpiditi($this->db, urldecode($etpiditi), $orderBy, $asc, $limit, $offset);
		$this->load->view('etape/jsonifyList_view', $data);
	}
	public function findBy_etpnuord($etpnuord, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['etapes'] = $this->etapeservice->getAllBy_etpnuord($this->db, urldecode($etpnuord), $orderBy, $asc, $limit, $offset);
		$this->load->view('etape/jsonifyList_view', $data);
	}


	public function countBy_etpidetp($etpidetp){
		$data['count'] = $this->etapeservice->countBy_etpidetp($this->db, urldecode($etpidetp));
		$this->load->view('etape/jsonifyCount_view', $data);
	}
	public function countBy_etplbnom($etplbnom){
		$data['count'] = $this->etapeservice->countBy_etplbnom($this->db, urldecode($etplbnom));
		$this->load->view('etape/jsonifyCount_view', $data);
	}
	public function countBy_etpnulat($etpnulat){
		$data['count'] = $this->etapeservice->countBy_etpnulat($this->db, urldecode($etpnulat));
		$this->load->view('etape/jsonifyCount_view', $data);
	}
	public function countBy_etpnulon($etpnulon){
		$data['count'] = $this->etapeservice->countBy_etpnulon($this->db, urldecode($etpnulon));
		$this->load->view('etape/jsonifyCount_view', $data);
	}
	public function countBy_etpfgarr($etpfgarr){
		$data['count'] = $this->etapeservice->countBy_etpfgarr($this->db, urldecode($etpfgarr));
		$this->load->view('etape/jsonifyCount_view', $data);
	}
	public function countBy_etpiditi($etpiditi){
		$data['count'] = $this->etapeservice->countBy_etpiditi($this->db, urldecode($etpiditi));
		$this->load->view('etape/jsonifyCount_view', $data);
	}
	public function countBy_etpnuord($etpnuord){
		$data['count'] = $this->etapeservice->countBy_etpnuord($this->db, urldecode($etpnuord));
		$this->load->view('etape/jsonifyCount_view', $data);
	}



	public function findLike_etplbnom($etplbnom){
		$data['etapes'] = $this->etapeservice->getAllLike_etplbnom($this->db, urldecode($etplbnom));
		$this->load->view('etape/jsonifyList_view', $data);
	}

}
?>
