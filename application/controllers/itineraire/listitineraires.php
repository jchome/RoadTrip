<?php
/*
 * Created by generator
 *
 */

class ListItineraires extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');

	}

	/**
	 * Affichage des Itineraires
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){
		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'itiiditi';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		
		// preparer la pagination
		$config['base_url'] = base_url().'index.php/itineraire/listitineraires/index/'.$orderBy.'/'.$asc.'/';
		$config['total_rows'] = $this->itineraireservice->count($this->db);
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
		$data['itineraires'] = $this->itineraireservice->getAll($this->db, $orderBy, $asc, $config['per_page'], $offset);
		
		$data['voyageCollection'] = $this->voyageservice->getAll($this->db);
		
		$this->load->view('itineraire/listitineraires_view', $data);
	}

	
	/**
	 * Suppression d'un Itineraire
	 * @param $itiiditi identifiant a supprimer
	 */
	function delete($itiiditi){
		$model = $this->itineraireservice->getUnique($this->db, $itiiditi );
		// delete etapes
		$etapes = $this->etapeservice->getAllBy_etpiditi($this->db, $itiiditi);
		foreach($etapes as $etape){
			$this->etapeservice->deleteByKey($this->db, $etape->etpidetp);
		}
		$this->itineraireservice->deleteByKey($this->db, $itiiditi);
		
		$this->session->set_flashdata('msg_confirm', $this->lang->line('itineraire.message.confirm.deleted'));
		redirect('voyage/detailvoyage/index/' . $model->itiidvoy);
	}

}
?>
