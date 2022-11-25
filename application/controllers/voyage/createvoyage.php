<?php
/*
 * Created by generator
 * 
 */

class CreateVoyage extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('User_model');
		$this->load->library('UserService');
		
	}
	
	/**
	 * page de creation d'un voyage
	 */	
	public function index(){
		$data = Array();
		// Recuperation des objets references
		$data['voyidusr'] = $this->session->userdata('user_id');
		$this->load->view('voyage/createvoyage_view', $data);
	}
	
	/**
	 * Ajout d'un Voyage
	 */
	public function add(){
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('voyidvoy', 'lang:voyage.form.voyidvoy.label', 'trim|required');
		$this->form_validation->set_rules('voylbnom', 'lang:voyage.form.voylbnom.label', 'trim|required');
		$this->form_validation->set_rules('voyidusr', 'lang:voyage.form.voyidusr.label', 'trim|required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('voyage/createvoyage_view');
		}
		
		// Insertion en base
		$model = new Voyage_model();
		$model->voyidvoy = $this->input->post('voyidvoy');
		$model->voylbnom = $this->input->post('voylbnom');
		$model->voyidusr = $this->input->post('voyidusr');
		$this->voyageservice->insertNew($this->db, $model);
		

	
		$this->session->set_flashdata('msg_info', $this->lang->line('voyage.message.confirm.added'));
	
		// Recharge la page avec les nouvelles infos
		redirect('voyage/listvoyages/index');
	}
}
?>