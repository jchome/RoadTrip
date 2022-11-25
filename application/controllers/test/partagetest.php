<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class PartageTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->model('Partage_model');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$partages = Partage_model::getAllPartages($this->db);
		foreach ($partages as $partage) {
			Partage_model::delete($this->db, $partage->paridpar);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->My_model->getError();
	 */
	function _post() {
		$partages = Partage_model::getAllPartages($this->db);
		foreach ($partages as $partage) {
			Partage_model::delete($this->db, $partage->paridpar);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getPartage, delete";
		// création d'un enregistrement
		$partage_insert = new Partage_model();
		// Nothing for field paridpar
		$partage_insert->paridvoy = 0;
		$partage_insert->paridami = 0;
		$partage_insert->save($this->db);
		// $partage_insert->paridpar est maintenant affecté
	
		$partage_select = Partage_model::getPartage($this->db, $partage_insert->paridpar);
	
		$this->_assert_equals($partage_select->paridpar, $partage_insert->paridpar);
		Partage_model::delete($this->db, $partage_select->paridpar);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getPartage, delete";
		$partage_insert = new Partage_model();

		// Nothing for field paridpar
		$partage_insert->paridvoy = 0;
		$partage_insert->paridami = 0;
		$partage_insert->save($this->db);
	
		// Nothing for field paridpar
		$partage_insert->paridvoy = 90;
		$partage_insert->paridami = 90;
		$partage_insert->update($this->db);
	
		$partage_update = Partage_model::getPartage($this->db, $partage_insert->paridpar);
		
		if(!$this->_assert_equals($partage_insert->paridpar, $partage_update->paridpar)) {
			return false;
		}
		if(!$this->_assert_equals($partage_insert->paridvoy, $partage_update->paridvoy)) {
			return false;
		}
		if(!$this->_assert_equals($partage_insert->paridami, $partage_update->paridami)) {
			return false;
		}

		Partage_model::delete($this->db, $partage_insert->paridpar);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: getCountPartages, save, getPartage, delete";
	
		// comptage pour vérification : avant
		$countPartagesAvant = Partage_model::getCountPartages($this->db);
	
		// création d'un enregistrement
		$partage = new Partage_model();
		// Nothing for field paridpar
		$partage->paridvoy = 0;
		$partage->paridami = 0;
		$partage->save($this->db);
	
		// comptage pour vérification : après insertion
		$countPartagesApres = Partage_model::getCountPartages($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countPartagesAvant +1, $countPartagesApres);
	
		// recupération de l'objet par son  paridpar
		$partage = Partage_model::getPartage($this->db, $partage->paridpar);
	
		// suppression de l'enregistrement
		Partage_model::delete($this->db, $partage->paridpar);
	
		// comptage pour vérification : après suppression
		$countPartagesFinal = Partage_model::getCountPartages($this->db);
		$this->_assert_equals($countPartagesAvant, $countPartagesFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAllPartages, delete";
	
		$partage_insert = new Partage_model();
		// Nothing for field paridpar
		$partage_insert->paridvoy = 0;
		$partage_insert->paridami = 0;
		$partage_insert->save($this->db);
	
		$partages = Partage_model::getAllPartages($this->db);
		if( ! $this->_assert_not_empty($partages) ) {
			return FALSE;
		}
		$found = 0;
		foreach ($partages as $partage) {
			if($partage->paridpar == $partage_insert->paridpar &&
					$this->_assert_equals($partage->paridvoy, $partage_insert->paridvoy ) && 
					$this->_assert_equals($partage->paridami, $partage_insert->paridami )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			Partage_model::delete($this->db, $partage->paridpar);
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
?>
