<?php
/*
 * Created by generator
 * 
 */

class CreateItineraire extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		
	}
	
	/**
	 * page de creation d'un itineraire
	 */	
	public function index(){
		$data = Array();
		// Recuperation des objets references
		$data['voyageCollection'] = $this->voyageservice->getAll($this->db);

		$this->load->view('itineraire/createitineraire_view', $data);
	}
	

	public function ajoute(){
		$itiidvoy = $this->input->get('itiidvoy');
		$model = $this->voyageservice->getUnique($this->db, $itiidvoy);
		$data['voyage'] = $model;
		$ordre = $this->itineraireservice->countBy_itiidvoy($this->db, $itiidvoy);
		$data['itinuord'] = $ordre+1;
		$data['etpidetp'] = '';
	
		$this->load->view('itineraire/createitineraire_fancyview', $data);
	}
	
	public function depuisEtape(){
		$itiidvoy = $this->input->get('itiidvoy');
		$etpidetp = $this->input->get('etpidetp');
		$model = $this->voyageservice->getUnique($this->db, $itiidvoy);
		$data['voyage'] = $model;
		
		$ordre = $this->itineraireservice->countBy_itiidvoy($this->db, $itiidvoy);
		$data['itinuord'] = $ordre+1;
		$data['etpidetp'] = $etpidetp;
		
		$this->load->view('itineraire/createitineraire_fancyview', $data);
	}
	
	
	/**
	 * Ajout d'un Itineraire
	 */
	public function add(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('itiiditi', 'lang:itineraire.form.itiiditi.label', 'trim|required');
		$this->form_validation->set_rules('idilbnom', 'lang:itineraire.form.idilbnom.label', 'trim|required');
		$this->form_validation->set_rules('itiidvoy', 'lang:itineraire.form.itiidvoy.label', 'trim|required');
		$this->form_validation->set_rules('itinuord', 'lang:itineraire.form.itinuord.label', 'trim|required');
		$this->form_validation->set_rules('ititxdes', 'lang:itineraire.form.ititxdes.label', 'trim');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('itineraire/createitineraire_view');
		}
		
		// Insertion en base
		$model = new Itineraire_model();
		$model->itiiditi = $this->input->post('itiiditi');
		$model->idilbnom = $this->input->post('idilbnom');
		$model->itiidvoy = $this->input->post('itiidvoy');
		$model->itinuord = $this->input->post('itinuord');
		$model->ititxdes = $this->input->post('ititxdes');
		$this->itineraireservice->insertNew($this->db, $model);
		
	
		$this->session->set_flashdata('msg_info', $this->lang->line('itineraire.message.confirm.added'));
	
		// Recharge la page avec les nouvelles infos
		redirect('itineraire/listitineraires/index');
	}
}
?>