<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class EtapeTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->model('Etape_model');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$etapes = Etape_model::getAllEtapes($this->db);
		foreach ($etapes as $etape) {
			Etape_model::delete($this->db, $etape->etpidetp);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->My_model->getError();
	 */
	function _post() {
		$etapes = Etape_model::getAllEtapes($this->db);
		foreach ($etapes as $etape) {
			Etape_model::delete($this->db, $etape->etpidetp);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getEtape, delete";
		// création d'un enregistrement
		$etape_insert = new Etape_model();
		// Nothing for field etpidetp
		$etape_insert->etplbnom = 'test_0';
		//[ERROR] type [float(20)] not generated.
		//[ERROR] type [float(20)] not generated.
		$etape_insert->etpiditi = 0;
		$etape_insert->etpnuord = 0;
		$etape_insert->etptxdes = 'text-0 : ...';
		$etape_insert->save($this->db);
		// $etape_insert->etpidetp est maintenant affecté
	
		$etape_select = Etape_model::getEtape($this->db, $etape_insert->etpidetp);
	
		$this->_assert_equals($etape_select->etpidetp, $etape_insert->etpidetp);
		Etape_model::delete($this->db, $etape_select->etpidetp);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getEtape, delete";
		$etape_insert = new Etape_model();

		// Nothing for field etpidetp
		$etape_insert->etplbnom = 'test_0';
		
		
		$etape_insert->etpiditi = 0;
		$etape_insert->etpnuord = 0;
		$etape_insert->etptxdes = 'text-0 : ...';
		$etape_insert->save($this->db);
	
		// Nothing for field etpidetp
		$etape_insert->etplbnom = 'test1_0';
		
		
		$etape_insert->etpiditi = 90;
		$etape_insert->etpnuord = 90;
		$etape_insert->etptxdes = 'text1-0 : ...';
		$etape_insert->update($this->db);
	
		$etape_update = Etape_model::getEtape($this->db, $etape_insert->etpidetp);
		
		if(!$this->_assert_equals($etape_insert->etpidetp, $etape_update->etpidetp)) {
			return false;
		}
		if(!$this->_assert_equals($etape_insert->etplbnom, $etape_update->etplbnom)) {
			return false;
		}
		if(!$this->_assert_equals($etape_insert->etpnulat, $etape_update->etpnulat)) {
			return false;
		}
		if(!$this->_assert_equals($etape_insert->etpnulon, $etape_update->etpnulon)) {
			return false;
		}
		if(!$this->_assert_equals($etape_insert->etpiditi, $etape_update->etpiditi)) {
			return false;
		}
		if(!$this->_assert_equals($etape_insert->etpnuord, $etape_update->etpnuord)) {
			return false;
		}
		if(!$this->_assert_equals($etape_insert->etptxdes, $etape_update->etptxdes)) {
			return false;
		}

		Etape_model::delete($this->db, $etape_insert->etpidetp);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: getCountEtapes, save, getEtape, delete";
	
		// comptage pour vérification : avant
		$countEtapesAvant = Etape_model::getCountEtapes($this->db);
	
		// création d'un enregistrement
		$etape = new Etape_model();
		// Nothing for field etpidetp
		$etape->etplbnom = 'test_0';
		
		
		$etape->etpiditi = 0;
		$etape->etpnuord = 0;
		$etape->etptxdes = 'text-0 : ...';
		$etape->save($this->db);
	
		// comptage pour vérification : après insertion
		$countEtapesApres = Etape_model::getCountEtapes($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countEtapesAvant +1, $countEtapesApres);
	
		// recupération de l'objet par son  etpidetp
		$etape = Etape_model::getEtape($this->db, $etape->etpidetp);
	
		// suppression de l'enregistrement
		Etape_model::delete($this->db, $etape->etpidetp);
	
		// comptage pour vérification : après suppression
		$countEtapesFinal = Etape_model::getCountEtapes($this->db);
		$this->_assert_equals($countEtapesAvant, $countEtapesFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAllEtapes, delete";
	
		$etape_insert = new Etape_model();
		// Nothing for field etpidetp
		$etape_insert->etplbnom = 'test_0';
		
		
		$etape_insert->etpiditi = 0;
		$etape_insert->etpnuord = 0;
		$etape_insert->etptxdes = 'text-0 : ...';
		$etape_insert->save($this->db);
	
		$etapes = Etape_model::getAllEtapes($this->db);
		if( ! $this->_assert_not_empty($etapes) ) {
			return FALSE;
		}
		$found = 0;
		foreach ($etapes as $etape) {
			if($etape->etpidetp == $etape_insert->etpidetp &&
					$this->_assert_equals($etape->etplbnom, $etape_insert->etplbnom ) && 
					$this->_assert_equals($etape->etpnulat, $etape_insert->etpnulat ) && 
					$this->_assert_equals($etape->etpnulon, $etape_insert->etpnulon ) && 
					$this->_assert_equals($etape->etpiditi, $etape_insert->etpiditi ) && 
					$this->_assert_equals($etape->etpnuord, $etape_insert->etpnuord ) && 
					$this->_assert_equals($etape->etptxdes, $etape_insert->etptxdes )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			Etape_model::delete($this->db, $etape->etpidetp);
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
?>
