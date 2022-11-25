<?php
/*
 * Created by generator
 *
 */

class EditEtape extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Etape_model');
		$this->load->library('EtapeService');
		$this->load->library('session');
		$this->load->helper('template');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		
	}


	/**
	 * Affichage des infos
	 */
	public function index($etpidetp){
		$model = $this->etapeservice->getUnique($this->db, $etpidetp);
		$data['etape'] = $model;

		$this->load->view('etape/editetape_view',$data);
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('etpidetp', 'lang:etape.form.etpidetp.label', 'trim|required');
		$this->form_validation->set_rules('etplbnom', 'lang:etape.form.etplbnom.label', 'trim|required');
		$this->form_validation->set_rules('etpnulat', 'lang:etape.form.etpnulat.label', 'trim|required');
		$this->form_validation->set_rules('etpnulon', 'lang:etape.form.etpnulon.label', 'trim|required');
		$this->form_validation->set_rules('etpiditi', 'lang:etape.form.etpiditi.label', 'trim|required');
		$this->form_validation->set_rules('etpnuord', 'lang:etape.form.etpnuord.label', 'trim|required');
		$this->form_validation->set_rules('etptxdes', 'lang:etape.form.etptxdes.label', 'trim');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('etape/editetape_view');
		}
		
		// Mise a jour des donnees en base
		$model = new Etape_model();
		$oldModel = $this->etapeservice->getUnique($this->db, $this->input->post('etpidetp') );
		
		$model->etpidetp = $this->input->post('etpidetp');
		$model->etplbnom = $this->input->post('etplbnom');
		$model->etpnulat = $this->input->post('etpnulat');
		$model->etpnulon = $this->input->post('etpnulon');
		$model->etpiditi = $this->input->post('etpiditi');
		$model->etpnuord = $this->input->post('etpnuord');
		$model->etptxdes = $this->input->post('etptxdes');
		$this->etapeservice->update($this->db, $model);
		

		$this->session->set_flashdata('msg_confirm', $this->lang->line('etape.message.confirm.modified'));

		redirect('itineraire/detailitineraire/index/'.$this->input->post('etpiditi'));
	}
	
	public function descendre(){
		$etapeADescendre = $this->etapeservice->getUnique($this->db, $this->input->get('etpidetp'));
		$ordreSuivant = $etapeADescendre->etpnuord + 1;
		$criteriaArray = Array( new Criteria('etpiditi', Criteria::$EQ, $etapeADescendre->etpiditi) ,
				new Criteria('etpnuord', Criteria::$EQ, $ordreSuivant ) );
		
		$etapeDescendreArray = $this->etapeservice->getAllByCrietria($this->db, $criteriaArray );
		if(count($etapeDescendreArray) == 1){
			$etapeAMonter = end($etapeDescendreArray);
			$etapeAMonter->etpnuord = $etapeADescendre->etpnuord;
			$this->etapeservice->update($this->db, $etapeAMonter);
		}
		$etapeADescendre->etpnuord = $ordreSuivant;
		$this->etapeservice->update($this->db, $etapeADescendre);
		
		$this->session->set_flashdata('msg_confirm', $this->lang->line('etape.message.confirm.modified'));
		redirect('itineraire/detailitineraire/index/'.$etapeADescendre->etpiditi );
		
	}

	public function monter(){
		$etapeAMonter = $this->etapeservice->getUnique($this->db, $this->input->get('etpidetp'));
		$ordrePrecedent = $etapeAMonter->etpnuord - 1;
		$criteriaArray = Array( new Criteria('etpiditi', Criteria::$EQ, $etapeAMonter->etpiditi) ,
				new Criteria('etpnuord', Criteria::$EQ, $ordrePrecedent ) );
	
		$etapeDescendreArray = $this->etapeservice->getAllByCrietria($this->db, $criteriaArray );
		if(count($etapeDescendreArray) == 1){
			$etapeADescendre = end($etapeDescendreArray);
			$etapeADescendre->etpnuord = $etapeADescendre->etpnuord;
			$this->etapeservice->update($this->db, $etapeADescendre);
		}
		$etapeAMonter->etpnuord = $ordrePrecedent;
		$this->etapeservice->update($this->db, $etapeAMonter);
	
		$this->session->set_flashdata('msg_confirm', $this->lang->line('etape.message.confirm.modified'));
		redirect('itineraire/detailitineraire/index/'.$etapeAMonter->etpiditi );
	
	}

	public function setLatLon(){
		$etape = $this->etapeservice->getUnique($this->db, $this->input->get('etpidetp'));
		$lat = $this->input->get('lat');
		$lon = $this->input->get('lon');
		$etape->etpnulat = $lat;
		$etape->etpnulon = $lon;
		
		$this->etapeservice->update($this->db, $etape);
		
		redirect('itineraire/detailitineraire/index/'.$etape->etpiditi );
		
	}
	
	

}
?>
