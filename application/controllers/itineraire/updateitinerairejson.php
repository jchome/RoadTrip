<?php
/*
 * Created by generator
 * 
 */

class UpdateItineraireJson extends CI_Controller {
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		
	}
	
	/**
	 * Mise à jour d'un itineraire via json
	 */	
	public function update(){
		$itiiditi = $this->input->get('itiiditi');
		$model = $this->itineraireservice->getUnique($this->db, $itiiditi);
		// durée : "1 hour 16 mins"
		// distance : "86.4 km"
		$duree = $this->input->get('itilbdur');
		$distance = $this->input->get('itinudst');
		
		$duree = str_replace(" hours ", ":", $duree);
		$duree = str_replace(" hour ", ":", $duree);
		$duree = str_replace(" heures ", ":", $duree);
		$duree = str_replace(" heure ", ":", $duree);
		$duree = str_replace(" minutes", "", $duree);
		$duree = str_replace(" minute", "", $duree);
		$duree = str_replace(" mins", "", $duree);
		$duree = str_replace(" min", "", $duree);
		$dureeArray = explode(":", $duree);
		if(count($dureeArray) == 1){
			$duree = '00:'.((strlen($dureeArray[0])<2)?('0'):('')) .$dureeArray[0];
		}else if(count($dureeArray) == 2){
			$duree = ((strlen($dureeArray[0])<2)?('0'):('')) .$dureeArray[0]. ':' . ((strlen($dureeArray[1])<2)?('0'):('')) .$dureeArray[1] ;
		}
		
		$distance = str_replace(" km", "", $distance);
		
		$model->itilbdur = $duree;
		$model->itinudst = floatval($distance);
		
		log_message('debug',"distance: ".$distance);
		log_message('debug',"floatval(distance): ".floatval($distance));
		
		$this->itineraireservice->update($this->db, $model);
		
		$data['itineraire'] = $model;
		$this->load->view('itineraire/jsonifyUnique_view', $data);
	}
	
}
?>
