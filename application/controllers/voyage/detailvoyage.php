<?php
/*
 * Created by generator
 *
 */

class DetailVoyage extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('Itineraire_model');
		$this->load->library('ItineraireService');
		$this->load->library('session');
		$this->load->helper('template');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();
		
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		$this->load->model('User_model');
		$this->load->library('UserService');
		
	}


	/**
	 * Affichage des infos
	 */
	public function index($voyidvoy){
		$myself_usridusr = $this->session->userdata('user_id');
		
		$model = $this->voyageservice->getUnique($this->db, $voyidvoy);
		if($myself_usridusr != $model->voyidusr){
			// je ne suis pas propriétaire du voyage
			// suis-je un ami ?
			$partages = $this->partageservice->getAllBy_paridami($this->db, $myself_usridusr);
			$sharedVoyage = False;
			foreach($partages as $partage){
				if($partage->paridami == $myself_usridusr){
					$sharedVoyage = True;
					break;
				}
				$allSharedVoyages[$voyage->voyidvoy] = $voyage;
			}
			if( ! $sharedVoyage ){
				redirect("welcome");
			}
			
		}else{
			// je suis le propriétaire du voyage
			$partages = $this->partageservice->getAllBy_paridvoy($this->db, $voyidvoy);
			$allUsersShare = Array();
			foreach($partages as $partage){
				$user = $this->userservice->getUnique($this->db, $partage->paridami);
				if($user != null){
					$allUsersShare[$user->usridusr] = $user;
				}
				
			}
			$data['allUsersShare'] = $allUsersShare;
		}
		$data['voyage'] = $model;
		$orderBy = "itinuord";
		$data['itineraires'] = $this->itineraireservice->getAllBy_itiidvoy($this->db, $voyidvoy, $orderBy );
		
		$this->load->view('voyage/detailvoyage_view',$data);
	}


}
?>
