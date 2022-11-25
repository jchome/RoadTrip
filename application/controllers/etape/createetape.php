<?php
/*
 * Created by generator
 * 
 */

class CreateEtape extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
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

		$this->load->view('etape/createetape_view', $data);
	}
	
	public function ajoute(){
		$etpiditi = $this->input->get('etpiditi');
		$model = $this->itineraireservice->getUnique($this->db, $etpiditi);
		$data['itineraire'] = $model;
		$ordre = $this->etapeservice->countBy_etpiditi($this->db, $etpiditi);
		$data['etpnuord'] = $ordre+1;
		
		$this->load->view('etape/createetape_fancyview', $data);
	}
	
	/**
	 * Ajout d'un Etape
	 */
	public function add(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('etpidetp', 'lang:etape.form.etpidetp.label', 'trim|required');
		$this->form_validation->set_rules('etplbnom', 'lang:etape.form.etplbnom.label', 'trim|required');
		$this->form_validation->set_rules('etpnulat', 'lang:etape.form.etpnulat.label', 'trim|required');
		$this->form_validation->set_rules('etpnulon', 'lang:etape.form.etpnulon.label', 'trim|required');
		$this->form_validation->set_rules('etpiditi', 'lang:etape.form.etpiditi.label', 'trim|required');
		$this->form_validation->set_rules('etpnuord', 'lang:etape.form.etpnuord.label', 'trim|required');
		$this->form_validation->set_rules('etptxdes', 'lang:etape.form.etptxdes.label', 'trim');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('etape/createetape_view');
		}
		
		// Insertion en base
		$model = new Etape_model();
		$model->etpidetp = $this->input->post('etpidetp');
		$model->etplbnom = $this->input->post('etplbnom');
		$model->etpnulat = $this->input->post('etpnulat');
		$model->etpnulon = $this->input->post('etpnulon');
		$model->etpiditi = $this->input->post('etpiditi');
		$model->etpnuord = $this->input->post('etpnuord');
		$model->etptxdes = $this->input->post('etptxdes');
		$this->etapeservice->insertNew($this->db, $model);
		

	
		$this->session->set_flashdata('msg_info', $this->lang->line('etape.message.confirm.added'));
	
		// Recharge la page avec les nouvelles infos
		redirect('etape/listetapes/index');
	}
}
?>