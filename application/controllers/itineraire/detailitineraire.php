<?php
/*
 * Created by generator
 *
 */

class DetailItineraire extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->helper('template');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		
	}


	/**
	 * Affichage des infos
	 */
	public function index($itiiditi){
		$model = $this->itineraireservice->getUnique($this->db, $itiiditi);
		$data['itineraire'] = $model;
		$data['voyage'] = $this->voyageservice->getUnique($this->db, $model->itiidvoy);
		$orderBy = "etpnuord";
		$data['etapesCollection'] = $this->etapeservice->getAllBy_etpiditi($this->db, $itiiditi, $orderBy);

		$this->load->view('itineraire/detailitineraire_view',$data);
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('itiiditi', 'lang:itineraire.form.itiiditi.label', 'trim|required');
		$this->form_validation->set_rules('idilbnom', 'lang:itineraire.form.idilbnom.label', 'trim|required');
		$this->form_validation->set_rules('itiidvoy', 'lang:itineraire.form.itiidvoy.label', 'trim|required');
		$this->form_validation->set_rules('itinuord', 'lang:itineraire.form.itinuord.label', 'trim|required');
		$this->form_validation->set_rules('ititxdes', 'lang:itineraire.form.ititxdes.label', 'trim');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('itineraire/edititineraire_view');
		}
		
		// Mise a jour des donnees en base
		$model = new Itineraire_model();
		$oldModel = $this->itineraireservice->getUnique($this->db, $this->input->post('itiiditi') );
		
		$model->itiiditi = $this->input->post('itiiditi');
		$model->idilbnom = $this->input->post('idilbnom');
		$model->itiidvoy = $this->input->post('itiidvoy');
		$model->itinuord = $this->input->post('itinuord');
		$model->ititxdes = $this->input->post('ititxdes');
		$this->itineraireservice->update($this->db, $model);
		

		$this->session->set_flashdata('msg_confirm', $this->lang->line('itineraire.message.confirm.modified'));

		redirect('itineraire/listitineraires/index');
	}

}
?>
