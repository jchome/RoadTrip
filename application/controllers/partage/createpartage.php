<?php
/*
 * Created by generator
 * 
 */

class CreatePartage extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('User_model');
		$this->load->library('UserService');
		
	}
	
	/**
	 * page de creation d'un partage
	 */	
	public function index(){
		$data = Array();
		// Recuperation des objets references
		$data['voyageCollection'] = $this->voyageservice->getAll($this->db);
		$data['userCollection'] = $this->userservice->getAll($this->db);

		$this->load->view('partage/createpartage_view', $data);
	}
	
	/**
	 * Ajout d'un Partage
	 */
	public function add(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('paridpar', 'lang:partage.form.paridpar.label', 'trim|required');
		$this->form_validation->set_rules('paridvoy', 'lang:partage.form.paridvoy.label', 'trim|required');
		$this->form_validation->set_rules('paridami', 'lang:partage.form.paridami.label', 'trim|required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('partage/createpartage_view');
		}
		
		// Insertion en base
		$model = new Partage_model();
		$model->paridpar = $this->input->post('paridpar');
		$model->paridvoy = $this->input->post('paridvoy');
		$model->paridami = $this->input->post('paridami');
		$this->partageservice->insertNew($this->db, $model);
		

	
		$this->session->set_flashdata('msg_info', $this->lang->line('partage.message.confirm.added'));
	
		// Recharge la page avec les nouvelles infos
		redirect('partage/listpartages/index');
	}
}
?>