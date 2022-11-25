<?php
/*
 * Created by generator
 * 
 */

class CreateVoyageJson extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->library('session');
		$this->load->helper('url');
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

		$this->load->view('voyage/createvoyage_fancyview', $data);
	}
	
	/**
	 * Ajout d'un Voyage
	 */
	public function add(){
	
		// Insertion en base
		$model = new Voyage_model();
		$model->voyidvoy = $this->input->post('voyidvoy'); 
		$model->voylbnom = $this->input->post('voylbnom'); 
		$model->voyidusr = $this->input->post('voyidusr'); 
		$this->voyageservice->insertNew($this->db, $model);

	
		$this->session->set_flashdata('msg_info', $this->lang->line('voyage.message.confirm.added'));
	
		// renvoie vers la jsonification du modèle
		$data['voyage'] = $model;
		$this->load->view('voyage/jsonifyUnique_view', $data);
	}
}
?>
