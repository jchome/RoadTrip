<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class VoyageTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->model('Voyage_model');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$voyages = Voyage_model::getAllVoyages($this->db);
		foreach ($voyages as $voyage) {
			Voyage_model::delete($this->db, $voyage->voyidvoy);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->My_model->getError();
	 */
	function _post() {
		$voyages = Voyage_model::getAllVoyages($this->db);
		foreach ($voyages as $voyage) {
			Voyage_model::delete($this->db, $voyage->voyidvoy);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getVoyage, delete";
		// création d'un enregistrement
		$voyage_insert = new Voyage_model();
		// Nothing for field voyidvoy
		$voyage_insert->voylbnom = 'test_0';
		$voyage_insert->voyidusr = 0;
		$voyage_insert->save($this->db);
		// $voyage_insert->voyidvoy est maintenant affecté
	
		$voyage_select = Voyage_model::getVoyage($this->db, $voyage_insert->voyidvoy);
	
		$this->_assert_equals($voyage_select->voyidvoy, $voyage_insert->voyidvoy);
		Voyage_model::delete($this->db, $voyage_select->voyidvoy);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getVoyage, delete";
		$voyage_insert = new Voyage_model();

		// Nothing for field voyidvoy
		$voyage_insert->voylbnom = 'test_0';
		$voyage_insert->voyidusr = 0;
		$voyage_insert->save($this->db);
	
		// Nothing for field voyidvoy
		$voyage_insert->voylbnom = 'test1_0';
		$voyage_insert->voyidusr = 90;
		$voyage_insert->update($this->db);
	
		$voyage_update = Voyage_model::getVoyage($this->db, $voyage_insert->voyidvoy);
		
		if(!$this->_assert_equals($voyage_insert->voyidvoy, $voyage_update->voyidvoy)) {
			return false;
		}
		if(!$this->_assert_equals($voyage_insert->voylbnom, $voyage_update->voylbnom)) {
			return false;
		}
		if(!$this->_assert_equals($voyage_insert->voyidusr, $voyage_update->voyidusr)) {
			return false;
		}

		Voyage_model::delete($this->db, $voyage_insert->voyidvoy);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: getCountVoyages, save, getVoyage, delete";
	
		// comptage pour vérification : avant
		$countVoyagesAvant = Voyage_model::getCountVoyages($this->db);
	
		// création d'un enregistrement
		$voyage = new Voyage_model();
		// Nothing for field voyidvoy
		$voyage->voylbnom = 'test_0';
		$voyage->voyidusr = 0;
		$voyage->save($this->db);
	
		// comptage pour vérification : après insertion
		$countVoyagesApres = Voyage_model::getCountVoyages($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countVoyagesAvant +1, $countVoyagesApres);
	
		// recupération de l'objet par son  voyidvoy
		$voyage = Voyage_model::getVoyage($this->db, $voyage->voyidvoy);
	
		// suppression de l'enregistrement
		Voyage_model::delete($this->db, $voyage->voyidvoy);
	
		// comptage pour vérification : après suppression
		$countVoyagesFinal = Voyage_model::getCountVoyages($this->db);
		$this->_assert_equals($countVoyagesAvant, $countVoyagesFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAllVoyages, delete";
	
		$voyage_insert = new Voyage_model();
		// Nothing for field voyidvoy
		$voyage_insert->voylbnom = 'test_0';
		$voyage_insert->voyidusr = 0;
		$voyage_insert->save($this->db);
	
		$voyages = Voyage_model::getAllVoyages($this->db);
		if( ! $this->_assert_not_empty($voyages) ) {
			return FALSE;
		}
		$found = 0;
		foreach ($voyages as $voyage) {
			if($voyage->voyidvoy == $voyage_insert->voyidvoy &&
					$this->_assert_equals($voyage->voylbnom, $voyage_insert->voylbnom ) && 
					$this->_assert_equals($voyage->voyidusr, $voyage_insert->voyidusr )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			Voyage_model::delete($this->db, $voyage->voyidvoy);
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
?>
