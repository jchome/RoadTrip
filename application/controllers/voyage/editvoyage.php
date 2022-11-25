<?php
/*
 * Created by generator
 *
 */

class EditVoyage extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->library('session');
		$this->load->helper('template');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('User_model');
		$this->load->library('UserService');
		
	}


	/**
	 * Affichage des infos
	 */
	public function index($voyidvoy){
		$model = $this->voyageservice->getUnique($this->db, $voyidvoy);
		$data['voyage'] = $model;


		$this->load->view('voyage/editvoyage_view',$data);
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('voyidvoy', 'lang:voyage.form.voyidvoy.label', 'trim|required');
		$this->form_validation->set_rules('voylbnom', 'lang:voyage.form.voylbnom.label', 'trim|required');
		$this->form_validation->set_rules('voyidusr', 'lang:voyage.form.voyidusr.label', 'trim|required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('voyage/editvoyage_view');
		}
		
		// Mise a jour des donnees en base
		$model = new Voyage_model();
		$oldModel = $this->voyageservice->getUnique($this->db, $this->input->post('voyidvoy') );
		
		$model->voyidvoy = $this->input->post('voyidvoy');
		$model->voylbnom = $this->input->post('voylbnom');
		$model->voyidusr = $this->input->post('voyidusr');
		$this->voyageservice->update($this->db, $model);
		

		$this->session->set_flashdata('msg_confirm', $this->lang->line('voyage.message.confirm.modified'));

		redirect('voyage/listvoyages/index');
	}

}
?>
