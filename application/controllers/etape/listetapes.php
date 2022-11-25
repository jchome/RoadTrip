<?php
/*
 * Created by generator
 *
 */

class ListEtapes extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');

	}

	/**
	 * Affichage des Etapes
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){
		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'etpidetp';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		
		// preparer la pagination
		$config['base_url'] = base_url().'index.php/etape/listetapes/index/'.$orderBy.'/'.$asc.'/';
		$config['total_rows'] = $this->etapeservice->count($this->db);
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
		$data['etapes'] = $this->etapeservice->getAll($this->db, $orderBy, $asc, $config['per_page'], $offset);
		
		$data['itineraireCollection'] = $this->itineraireservice->getAll($this->db);
		
		$this->load->view('etape/listetapes_view', $data);
	}

	
	/**
	 * Suppression d'un Etape
	 * @param $etpidetp identifiant a supprimer
	 */
	function delete($etpidetp){
		$model = $this->etapeservice->getUnique($this->db, $etpidetp);
		$this->etapeservice->deleteByKey($this->db, $etpidetp);
		
		$this->session->set_flashdata('msg_confirm', $this->lang->line('etape.message.confirm.deleted'));

		// renvoie vers le détail de l'itinéraire
		redirect('itineraire/detailitineraire/index/' . $model->etpiditi);
	}

}
?>
