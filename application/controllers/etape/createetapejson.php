<?php
/*
 * Created by generator
 * 
 */

class CreateEtapeJson extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		
	}
	
	/**
	 * page de creation d'un etape
	 */	
	public function index(){
		$data = Array();
		// Recuperation des objets references
		$data['itineraireCollection'] = $this->itineraireservice->getAll($this->db);

		$this->load->view('etape/createetape_fancyview', $data);
	}
	
	/**
	 * Ajout d'un Etape
	 */
	public function add(){
	
		// Insertion en base
		$model = new Etape_model();
		$model->etpidetp = $this->input->post('etpidetp'); 
		$model->etplbnom = $this->input->post('etplbnom'); 
		$model->etpiditi = $this->input->post('etpiditi'); 
		$model->etpnuord = $this->input->post('etpnuord'); 
		$model->etptxdes = $this->input->post('etptxdes'); 
		
		$etpnulatlon = explode(",", $this->input->post('etpnulatlon') );
		$model->etpnulat = trim($etpnulatlon[0]);
		$model->etpnulon = trim($etpnulatlon[1]);
		
		$this->etapeservice->insertNew($this->db, $model);
		
		$this->session->set_flashdata('msg_info', $this->lang->line('etape.message.confirm.added'));

		// renvoie vers le détail de l'itinéraire
		redirect('itineraire/detailitineraire/index/' . $model->etpiditi);
	}
}
?>
