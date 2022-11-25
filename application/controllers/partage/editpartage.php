<?php
/*
 * Created by generator
 *
 */

class EditPartage extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		$this->load->library('session');
		$this->load->helper('template');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('User_model');
		$this->load->library('UserService');
		
	}


	/**
	 * Affichage des infos
	 */
	public function index($paridpar){
		$model = $this->partageservice->getUnique($this->db, $paridpar);
		$data['partage'] = $model;

		$data['voyageCollection'] = $this->voyageservice->getAll($this->db);
		$data['userCollection'] = $this->userservice->getAll($this->db);

		$this->load->view('partage/editpartage_view',$data);
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('paridpar', 'lang:partage.form.paridpar.label', 'trim|required');
		$this->form_validation->set_rules('paridvoy', 'lang:partage.form.paridvoy.label', 'trim|required');
		$this->form_validation->set_rules('paridami', 'lang:partage.form.paridami.label', 'trim|required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('partage/editpartage_view');
		}
		
		// Mise a jour des donnees en base
		$model = new Partage_model();
		$oldModel = $this->partageservice->getUnique($this->db, $this->input->post('paridpar') );
		
		$model->paridpar = $this->input->post('paridpar');
		$model->paridvoy = $this->input->post('paridvoy');
		$model->paridami = $this->input->post('paridami');
		$this->partageservice->update($this->db, $model);
		

		$this->session->set_flashdata('msg_confirm', $this->lang->line('partage.message.confirm.modified'));

		redirect('partage/listpartages/index');
	}

}
?>
