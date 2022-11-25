<?php
/*
 * Created by generator
 * 
 */

class CreateItineraireJson extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		
	}
	
	/**
	 * page de creation d'un itineraire
	 */	
	public function index(){
		$data = Array();
		// Recuperation des objets references
		$data['voyageCollection'] = $this->voyageservice->getAll($this->db);

		$this->load->view('itineraire/createitineraire_fancyview', $data);
	}
	
	/**
	 * Ajout d'un Itineraire
	 */
	public function add(){
		// Insertion en base
		$model = new Itineraire_model();
		$model->itiiditi = $this->input->post('itiiditi'); 
		$model->itilbnom = $this->input->post('itilbnom'); 
		$model->itiidvoy = $this->input->post('itiidvoy'); 
		$model->itinuord = $this->input->post('itinuord'); 
		$model->ititxdes = $this->input->post('ititxdes');
		$model = $this->itineraireservice->insertNew($this->db, $model);

		$etpidetp = $this->input->post('etpidetp');
		if($etpidetp != ""){
			$etape = new Etape_model();
			$etapeToCopy = $this->etapeservice->getUnique($this->db, $etpidetp);
		
			// Récupération des données de l'étape d'origine
			$etape->etplbnom = $etapeToCopy->etplbnom;
			$etape->etpiditi = $model->itiiditi;
			$etape->etpnulat = $etapeToCopy->etpnulat;
			$etape->etpnulon = $etapeToCopy->etpnulon;
			$etape->etpnuord = 1;
			$this->etapeservice->insertNew($this->db, $etape);
		}
		
		
	
		$this->session->set_flashdata('msg_info', $this->lang->line('itineraire.message.confirm.added'));
	
		// renvoie vers le détail de l'itinéraire 
		redirect('voyage/detailvoyage/index/' . $model->itiidvoy);
	}
}
?>
