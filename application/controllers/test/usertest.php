<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class UserTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->model('User_model');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$users = User_model::getAllUsers($this->db);
		foreach ($users as $user) {
			User_model::delete($this->db, $user->usridusr);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->My_model->getError();
	 */
	function _post() {
		$users = User_model::getAllUsers($this->db);
		foreach ($users as $user) {
			User_model::delete($this->db, $user->usridusr);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getUser, delete";
		// création d'un enregistrement
		$user_insert = new User_model();
		// Nothing for field usridusr
		$user_insert->usrlbnom = 'test_0';
		$user_insert->usrlblgn = 'test_0';
		$user_insert->usrlbpwd = 'p4ssW0rD-0';
		$user_insert->usrlbmai = 'test_0';
		$user_insert->usrfipho = 'file-0 : ...';
		$user_insert->save($this->db);
		// $user_insert->usridusr est maintenant affecté
	
		$user_select = User_model::getUser($this->db, $user_insert->usridusr);
	
		$this->_assert_equals($user_select->usridusr, $user_insert->usridusr);
		User_model::delete($this->db, $user_select->usridusr);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getUser, delete";
		$user_insert = new User_model();

		// Nothing for field usridusr
		$user_insert->usrlbnom = 'test_0';
		$user_insert->usrlblgn = 'test_0';
		$user_insert->usrlbpwd = 'p4ssW0rD-0';
		$user_insert->usrlbmai = 'test_0';
		$user_insert->usrfipho = 'file-0 : ...';
		$user_insert->save($this->db);
	
		// Nothing for field usridusr
		$user_insert->usrlbnom = 'test1_0';
		$user_insert->usrlblgn = 'test1_0';
		$user_insert->usrlbpwd = 'pwd1-0';
		$user_insert->usrlbmai = 'test1_0';
		
		$user_insert->update($this->db);
	
		$user_update = User_model::getUser($this->db, $user_insert->usridusr);
		
		if(!$this->_assert_equals($user_insert->usridusr, $user_update->usridusr)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->usrlbnom, $user_update->usrlbnom)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->usrlblgn, $user_update->usrlblgn)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->usrlbpwd, $user_update->usrlbpwd)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->usrlbmai, $user_update->usrlbmai)) {
			return false;
		}
		if(!$this->_assert_equals($user_insert->usrfipho, $user_update->usrfipho)) {
			return false;
		}

		User_model::delete($this->db, $user_insert->usridusr);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: getCountUsers, save, getUser, delete";
	
		// comptage pour vérification : avant
		$countUsersAvant = User_model::getCountUsers($this->db);
	
		// création d'un enregistrement
		$user = new User_model();
		// Nothing for field usridusr
		$user->usrlbnom = 'test_0';
		$user->usrlblgn = 'test_0';
		$user->usrlbpwd = 'p4ssW0rD-0';
		$user->usrlbmai = 'test_0';
		
		$user->save($this->db);
	
		// comptage pour vérification : après insertion
		$countUsersApres = User_model::getCountUsers($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countUsersAvant +1, $countUsersApres);
	
		// recupération de l'objet par son  usridusr
		$user = User_model::getUser($this->db, $user->usridusr);
	
		// suppression de l'enregistrement
		User_model::delete($this->db, $user->usridusr);
	
		// comptage pour vérification : après suppression
		$countUsersFinal = User_model::getCountUsers($this->db);
		$this->_assert_equals($countUsersAvant, $countUsersFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAllUsers, delete";
	
		$user_insert = new User_model();
		// Nothing for field usridusr
		$user_insert->usrlbnom = 'test_0';
		$user_insert->usrlblgn = 'test_0';
		$user_insert->usrlbpwd = 'p4ssW0rD-0';
		$user_insert->usrlbmai = 'test_0';
		
		$user_insert->save($this->db);
	
		$users = User_model::getAllUsers($this->db);
		if( ! $this->_assert_not_empty($users) ) {
			return FALSE;
		}
		$found = 0;
		foreach ($users as $user) {
			if($user->usridusr == $user_insert->usridusr &&
					$this->_assert_equals($user->usrlbnom, $user_insert->usrlbnom ) && 
					$this->_assert_equals($user->usrlblgn, $user_insert->usrlblgn ) && 
					$this->_assert_equals($user->usrlbpwd, $user_insert->usrlbpwd ) && 
					$this->_assert_equals($user->usrlbmai, $user_insert->usrlbmai ) && 
					$this->_assert_equals($user->usrfipho, $user_insert->usrfipho )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			User_model::delete($this->db, $user->usridusr);
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
?>
