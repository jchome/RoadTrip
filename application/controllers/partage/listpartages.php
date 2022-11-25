<?php
/*
 * Created by generator
 *
 */

class ListPartages extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('User_model');
		$this->load->library('UserService');

	}

	/**
	 * Affichage des Partages
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){
		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'paridpar';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		
		// preparer la pagination
		$config['base_url'] = base_url().'index.php/partage/listpartages/index/'.$orderBy.'/'.$asc.'/';
		$config['total_rows'] = $this->partageservice->count($this->db);
		$config['per_page'] = 15;
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['first_link'] = '&lt;&lt;';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '&gt;&gt;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['num_links'] = 5;
		$config['uri_segment'] = '6'; // where the offset is in the URI segment 
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination;
		
		// recuperation des donnees
		$data['partages'] = $this->partageservice->getAll($this->db, $orderBy, $asc, $config['per_page'], $offset);
		
		$data['voyageCollection'] = $this->voyageservice->getAll($this->db);
		$data['userCollection'] = $this->userservice->getAll($this->db);
		
		$this->load->view('partage/listpartages_view', $data);
	}

	
	/**
	 * Suppression d'un Partage
	 * @param $paridpar identifiant a supprimer
	 */
	function delete($paridpar){

		$this->partageservice->deleteByKey($this->db, $paridpar);
		
		$this->session->set_flashdata('msg_confirm', $this->lang->line('partage.message.confirm.deleted'));

		redirect('partage/listpartages/index'); 
	}
	function deleteUsrVoy(){
		$paridami = $this->input->get('paridami');
		$paridvoy = $this->input->get('paridvoy');
		$criteriaArray = Array( new Criteria('paridvoy', Criteria::$EQ, $paridvoy),
				new Criteria('paridami', Criteria::$EQ, $paridami) );
		$allModels = $this->partageservice->getAllByCrietria($this->db, $criteriaArray);
		$model = end($allModels);
		$this->partageservice->deleteByKey($this->db, $model->paridpar);
		
		$this->session->set_flashdata('msg_confirm', $this->lang->line('partage.message.confirm.deleted'));
		
		redirect('voyage/detailvoyage/index/'. $paridvoy);
	}

}
?>
