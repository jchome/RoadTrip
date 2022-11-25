<?php
/*
 * Created by generator
 *
 */

class ListVoyages extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('User_model');
		$this->load->library('UserService');
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		

	}

	/**
	 * Affichage des Voyages
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){
		$usridusr = $this->session->userdata('user_id');
		
		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'voyidvoy';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		
		// preparer la pagination
		$config['base_url'] = base_url().'index.php/voyage/listvoyages/index/'.$orderBy.'/'.$asc.'/';
		$config['total_rows'] = $this->voyageservice->count($this->db);
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
		$data['voyages'] = $this->voyageservice->getAllBy_voyidusr($this->db, $usridusr, $orderBy, $asc, $config['per_page'], $offset);
		
		// voyages partagés (ou je suis un ami)
		$partages = $this->partageservice->getAllBy_paridami($this->db, $usridusr);
		$allSharedVoyages = Array();
		foreach($partages as $partage){
			$voyage = $this->voyageservice->getUnique($this->db, $partage->paridvoy);
			$allSharedVoyages[$voyage->voyidvoy] = $voyage;
		}
		$data['allSharedVoyages'] = $allSharedVoyages;
		
		$this->load->view('voyage/listvoyages_view', $data);
	}

	
	/**
	 * Suppression d'un Voyage
	 * @param $voyidvoy identifiant a supprimer
	 */
	function delete($voyidvoy){

		$this->voyageservice->deleteByKey($this->db, $voyidvoy);
		
		$this->session->set_flashdata('msg_confirm', $this->lang->line('voyage.message.confirm.deleted'));

		redirect('voyage/listvoyages/index'); 
	}

}
?>
