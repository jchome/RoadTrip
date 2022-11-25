<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class ItineraireTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->model('Itineraire_model');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$itineraires = Itineraire_model::getAllItineraires($this->db);
		foreach ($itineraires as $itineraire) {
			Itineraire_model::delete($this->db, $itineraire->itiiditi);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->My_model->getError();
	 */
	function _post() {
		$itineraires = Itineraire_model::getAllItineraires($this->db);
		foreach ($itineraires as $itineraire) {
			Itineraire_model::delete($this->db, $itineraire->itiiditi);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getItineraire, delete";
		// création d'un enregistrement
		$itineraire_insert = new Itineraire_model();
		// Nothing for field itiiditi
		$itineraire_insert->itilbnom = 'test_0';
		$itineraire_insert->itiidvoy = 0;
		$itineraire_insert->itinuord = 0;
		$itineraire_insert->itilbdur = 'test_0';
		//[ERROR] type [float(12)] not generated.
		$itineraire_insert->ititxdes = 'text-0 : ...';
		$itineraire_insert->save($this->db);
		// $itineraire_insert->itiiditi est maintenant affecté
	
		$itineraire_select = Itineraire_model::getItineraire($this->db, $itineraire_insert->itiiditi);
	
		$this->_assert_equals($itineraire_select->itiiditi, $itineraire_insert->itiiditi);
		Itineraire_model::delete($this->db, $itineraire_select->itiiditi);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getItineraire, delete";
		$itineraire_insert = new Itineraire_model();

		// Nothing for field itiiditi
		$itineraire_insert->itilbnom = 'test_0';
		$itineraire_insert->itiidvoy = 0;
		$itineraire_insert->itinuord = 0;
		$itineraire_insert->itilbdur = 'test_0';
		
		$itineraire_insert->ititxdes = 'text-0 : ...';
		$itineraire_insert->save($this->db);
	
		// Nothing for field itiiditi
		$itineraire_insert->itilbnom = 'test1_0';
		$itineraire_insert->itiidvoy = 90;
		$itineraire_insert->itinuord = 90;
		$itineraire_insert->itilbdur = 'test1_0';
		
		$itineraire_insert->ititxdes = 'text1-0 : ...';
		$itineraire_insert->update($this->db);
	
		$itineraire_update = Itineraire_model::getItineraire($this->db, $itineraire_insert->itiiditi);
		
		if(!$this->_assert_equals($itineraire_insert->itiiditi, $itineraire_update->itiiditi)) {
			return false;
		}
		if(!$this->_assert_equals($itineraire_insert->itilbnom, $itineraire_update->itilbnom)) {
			return false;
		}
		if(!$this->_assert_equals($itineraire_insert->itiidvoy, $itineraire_update->itiidvoy)) {
			return false;
		}
		if(!$this->_assert_equals($itineraire_insert->itinuord, $itineraire_update->itinuord)) {
			return false;
		}
		if(!$this->_assert_equals($itineraire_insert->itilbdur, $itineraire_update->itilbdur)) {
			return false;
		}
		if(!$this->_assert_equals($itineraire_insert->itinudst, $itineraire_update->itinudst)) {
			return false;
		}
		if(!$this->_assert_equals($itineraire_insert->ititxdes, $itineraire_update->ititxdes)) {
			return false;
		}

		Itineraire_model::delete($this->db, $itineraire_insert->itiiditi);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: getCountItineraires, save, getItineraire, delete";
	
		// comptage pour vérification : avant
		$countItinerairesAvant = Itineraire_model::getCountItineraires($this->db);
	
		// création d'un enregistrement
		$itineraire = new Itineraire_model();
		// Nothing for field itiiditi
		$itineraire->itilbnom = 'test_0';
		$itineraire->itiidvoy = 0;
		$itineraire->itinuord = 0;
		$itineraire->itilbdur = 'test_0';
		
		$itineraire->ititxdes = 'text-0 : ...';
		$itineraire->save($this->db);
	
		// comptage pour vérification : après insertion
		$countItinerairesApres = Itineraire_model::getCountItineraires($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countItinerairesAvant +1, $countItinerairesApres);
	
		// recupération de l'objet par son  itiiditi
		$itineraire = Itineraire_model::getItineraire($this->db, $itineraire->itiiditi);
	
		// suppression de l'enregistrement
		Itineraire_model::delete($this->db, $itineraire->itiiditi);
	
		// comptage pour vérification : après suppression
		$countItinerairesFinal = Itineraire_model::getCountItineraires($this->db);
		$this->_assert_equals($countItinerairesAvant, $countItinerairesFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAllItineraires, delete";
	
		$itineraire_insert = new Itineraire_model();
		// Nothing for field itiiditi
		$itineraire_insert->itilbnom = 'test_0';
		$itineraire_insert->itiidvoy = 0;
		$itineraire_insert->itinuord = 0;
		$itineraire_insert->itilbdur = 'test_0';
		
		$itineraire_insert->ititxdes = 'text-0 : ...';
		$itineraire_insert->save($this->db);
	
		$itineraires = Itineraire_model::getAllItineraires($this->db);
		if( ! $this->_assert_not_empty($itineraires) ) {
			return FALSE;
		}
		$found = 0;
		foreach ($itineraires as $itineraire) {
			if($itineraire->itiiditi == $itineraire_insert->itiiditi &&
					$this->_assert_equals($itineraire->itilbnom, $itineraire_insert->itilbnom ) && 
					$this->_assert_equals($itineraire->itiidvoy, $itineraire_insert->itiidvoy ) && 
					$this->_assert_equals($itineraire->itinuord, $itineraire_insert->itinuord ) && 
					$this->_assert_equals($itineraire->itilbdur, $itineraire_insert->itilbdur ) && 
					$this->_assert_equals($itineraire->itinudst, $itineraire_insert->itinudst ) && 
					$this->_assert_equals($itineraire->ititxdes, $itineraire_insert->ititxdes )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			Itineraire_model::delete($this->db, $itineraire->itiiditi);
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
?>
