<?php
/*
 * Created by generator
 *
 */

class ListItinerairesJson extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
	}

	/**
	 * Affichage des Itineraires
	 */
	public function index(){
		// recuperation des donnees
		$data['itineraires'] = $this->itineraireservice->getAll($this->db);
		
		$this->load->view('itineraire/jsonifyList_view', $data);
	}


	public function findBy_itiiditi($itiiditi, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['itineraires'] = $this->itineraireservice->getAllBy_itiiditi($this->db, urldecode($itiiditi), $orderBy, $asc, $limit, $offset);
		$this->load->view('itineraire/jsonifyList_view', $data);
	}
	public function findBy_idilbnom($idilbnom, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['itineraires'] = $this->itineraireservice->getAllBy_idilbnom($this->db, urldecode($idilbnom), $orderBy, $asc, $limit, $offset);
		$this->load->view('itineraire/jsonifyList_view', $data);
	}
	public function findBy_itiidvoy($itiidvoy, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['itineraires'] = $this->itineraireservice->getAllBy_itiidvoy($this->db, urldecode($itiidvoy), $orderBy, $asc, $limit, $offset);
		$this->load->view('itineraire/jsonifyList_view', $data);
	}
	public function findBy_itinuord($itinuord, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['itineraires'] = $this->itineraireservice->getAllBy_itinuord($this->db, urldecode($itinuord), $orderBy, $asc, $limit, $offset);
		$this->load->view('itineraire/jsonifyList_view', $data);
	}
	public function findBy_itilbdur($itilbdur, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['itineraires'] = $this->itineraireservice->getAllBy_itilbdur($this->db, urldecode($itilbdur), $orderBy, $asc, $limit, $offset);
		$this->load->view('itineraire/jsonifyList_view', $data);
	}
	public function findBy_itinudst($itinudst, $orderBy = null, $limit = 50, $offset = 0){
		$asc = null;
		$data['itineraires'] = $this->itineraireservice->getAllBy_itinudst($this->db, urldecode($itinudst), $orderBy, $asc, $limit, $offset);
		$this->load->view('itineraire/jsonifyList_view', $data);
	}


	public function countBy_itiiditi($itiiditi){
		$data['count'] = $this->itineraireservice->countBy_itiiditi($this->db, urldecode($itiiditi));
		$this->load->view('itineraire/jsonifyCount_view', $data);
	}
	public function countBy_idilbnom($idilbnom){
		$data['count'] = $this->itineraireservice->countBy_idilbnom($this->db, urldecode($idilbnom));
		$this->load->view('itineraire/jsonifyCount_view', $data);
	}
	public function countBy_itiidvoy($itiidvoy){
		$data['count'] = $this->itineraireservice->countBy_itiidvoy($this->db, urldecode($itiidvoy));
		$this->load->view('itineraire/jsonifyCount_view', $data);
	}
	public function countBy_itinuord($itinuord){
		$data['count'] = $this->itineraireservice->countBy_itinuord($this->db, urldecode($itinuord));
		$this->load->view('itineraire/jsonifyCount_view', $data);
	}
	public function countBy_itilbdur($itilbdur){
		$data['count'] = $this->itineraireservice->countBy_itilbdur($this->db, urldecode($itilbdur));
		$this->load->view('itineraire/jsonifyCount_view', $data);
	}
	public function countBy_itinudst($itinudst){
		$data['count'] = $this->itineraireservice->countBy_itinudst($this->db, urldecode($itinudst));
		$this->load->view('itineraire/jsonifyCount_view', $data);
	}



	public function findLike_idilbnom($idilbnom){
		$data['itineraires'] = $this->itineraireservice->getAllLike_idilbnom($this->db, urldecode($idilbnom));
		$this->load->view('itineraire/jsonifyList_view', $data);
	}
	public function findLike_itilbdur($itilbdur){
		$data['itineraires'] = $this->itineraireservice->getAllLike_itilbdur($this->db, urldecode($itilbdur));
		$this->load->view('itineraire/jsonifyList_view', $data);
	}

}
?>
