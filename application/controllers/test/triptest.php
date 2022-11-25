<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class TripTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->model('Trip_model');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$trips = Trip_model::getAllTrips($this->db);
		foreach ($trips as $trip) {
			Trip_model::delete($this->db, $trip->);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->My_model->getError();
	 */
	function _post() {
		$trips = Trip_model::getAllTrips($this->db);
		foreach ($trips as $trip) {
			Trip_model::delete($this->db, $trip->);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getTrip, delete";
		// création d'un enregistrement
		$trip_insert = new Trip_model();
		$trip_insert->voyidvoy = 0;
		$trip_insert->voylbnom = 'test_0';
		$trip_insert->voyidusr = 0;
		$trip_insert->save($this->db);
		// $trip_insert-> est maintenant affecté
	
		$trip_select = Trip_model::getTrip($this->db, $trip_insert->);
	
		$this->_assert_equals($trip_select->, $trip_insert->);
		Trip_model::delete($this->db, $trip_select->);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getTrip, delete";
		$trip_insert = new Trip_model();

		$trip_insert->voyidvoy = 0;
		$trip_insert->voylbnom = 'test_0';
		$trip_insert->voyidusr = 0;
		$trip_insert->save($this->db);
	
		$trip_insert->voyidvoy = 90;
		$trip_insert->voylbnom = 'test1_0';
		$trip_insert->voyidusr = 90;
		$trip_insert->update($this->db);
	
		$trip_update = Trip_model::getTrip($this->db, $trip_insert->);
		
		if(!$this->_assert_equals($trip_insert->voyidvoy, $trip_update->voyidvoy)) {
			return false;
		}
		if(!$this->_assert_equals($trip_insert->voylbnom, $trip_update->voylbnom)) {
			return false;
		}
		if(!$this->_assert_equals($trip_insert->voyidusr, $trip_update->voyidusr)) {
			return false;
		}

		Trip_model::delete($this->db, $trip_insert->);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: getCountTrips, save, getTrip, delete";
	
		// comptage pour vérification : avant
		$countTripsAvant = Trip_model::getCountTrips($this->db);
	
		// création d'un enregistrement
		$trip = new Trip_model();
		$trip->voyidvoy = 0;
		$trip->voylbnom = 'test_0';
		$trip->voyidusr = 0;
		$trip->save($this->db);
	
		// comptage pour vérification : après insertion
		$countTripsApres = Trip_model::getCountTrips($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countTripsAvant +1, $countTripsApres);
	
		// recupération de l'objet par son  
		$trip = Trip_model::getTrip($this->db, $trip->);
	
		// suppression de l'enregistrement
		Trip_model::delete($this->db, $trip->);
	
		// comptage pour vérification : après suppression
		$countTripsFinal = Trip_model::getCountTrips($this->db);
		$this->_assert_equals($countTripsAvant, $countTripsFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAllTrips, delete";
	
		$trip_insert = new Trip_model();
		$trip_insert->voyidvoy = 0;
		$trip_insert->voylbnom = 'test_0';
		$trip_insert->voyidusr = 0;
		$trip_insert->save($this->db);
	
		$trips = Trip_model::getAllTrips($this->db);
		if( ! $this->_assert_not_empty($trips) ) {
			return FALSE;
		}
		$found = 0;
		foreach ($trips as $trip) {
			if($trip-> == $trip_insert-> &&
					$this->_assert_equals($trip->voyidvoy, $trip_insert->voyidvoy ) && 
					$this->_assert_equals($trip->voylbnom, $trip_insert->voylbnom ) && 
					$this->_assert_equals($trip->voyidusr, $trip_insert->voyidusr )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			Trip_model::delete($this->db, $trip->);
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
?>
