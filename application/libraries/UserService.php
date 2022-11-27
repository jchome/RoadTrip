<?php

/*
 * Created by generator
 *
 */

require_once(APPPATH.'libraries/DAOService.php');


class UserService extends DAOService{

	public function __construct($params = array()){
		parent::__construct("rtpusr", "usridusr");
	}

	public function buildModelFromRow($row){
		if($row == null){
			return null;
		}
		$model = new User_model();
		$model->usridusr = $row['usridusr'];
		$model->usrlbnom = $row['usrlbnom'];
		$model->usrlblgn = $row['usrlblgn'];
		$model->usrlbpwd = $row['usrlbpwd'];
		$model->usrlbmai = $row['usrlbmai'];
		$model->usrfipho = $row['usrfipho'];
		return $model;
	}
	
	public function getUnique($db, $value, $dummy = ""){
		return parent::getUnique($db, 'usridusr', $value);
	}
	
	public function deleteByKey($db, $value, $dummy = ""){
		return parent::deleteByKey($db, 'usridusr', $value);
	}

	public function delete($db, $aModel){
		if( $aModel == null) {
			throw new Exception('Error while calling the [delete] method on a null object.');
		}
		return parent::deleteByKey($db, 'usridusr', $aModel->usridusr);
	}


	/**
	 * Recupere la liste des enregistrements depuis le champ usridusr
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_usridusr($db, $usridusr, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usridusr', Criteria::$EQ, $usridusr) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ usrlbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_usrlbnom($db, $usrlbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usrlbnom', Criteria::$EQ, $usrlbnom) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ usrlblgn
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_usrlblgn($db, $usrlblgn, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usrlblgn', Criteria::$EQ, $usrlblgn) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ usrlbpwd
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_usrlbpwd($db, $usrlbpwd, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usrlbpwd', Criteria::$EQ, $usrlbpwd) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ usrlbmai
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_usrlbmai($db, $usrlbmai, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usrlbmai', Criteria::$EQ, $usrlbmai) ), $orderBy, $asc, $limit, $offset);
	}



	/**
	 * Recupere la liste des enregistrements depuis le champ usrlbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_usrlbnom($db, $usrlbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usrlbnom', Criteria::$LIKE, $usrlbnom) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ usrlblgn
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_usrlblgn($db, $usrlblgn, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usrlblgn', Criteria::$LIKE, $usrlblgn) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ usrlbmai
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_usrlbmai($db, $usrlbmai, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('usrlbmai', Criteria::$LIKE, $usrlbmai) ), $orderBy, $asc, $limit, $offset);
	}







	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de usrlbnom : Nom de l'utilisateur
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_usrlbnom($db, $usrlbnom){
		return $this->countByCrietria($db, Array( new Criteria('usrlbnom',Criteria::$EQ,$usrlbnom) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de usrlblgn : Identifiant de connexion
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_usrlblgn($db, $usrlblgn){
		return $this->countByCrietria($db, Array( new Criteria('usrlblgn',Criteria::$EQ,$usrlblgn) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de usrlbpwd : Mot de passe de connexion
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_usrlbpwd($db, $usrlbpwd){
		return $this->countByCrietria($db, Array( new Criteria('usrlbpwd',Criteria::$EQ,$usrlbpwd) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de usrlbmai : Adresse e-mail de contact
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_usrlbmai($db, $usrlbmai){
		return $this->countByCrietria($db, Array( new Criteria('usrlbmai',Criteria::$EQ,$usrlbmai) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de usrfipho : Image, photo ou avatar
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_usrfipho($db, $usrfipho){
		return $this->countByCrietria($db, Array( new Criteria('usrfipho',Criteria::$EQ,$usrfipho) ) );
	}



	/**
	 * 
	 * @param database_object $db
	 * @param User $aModel
	 */
	public function insertNew($db, $aModel){
		$data=array( 'usrlbnom'=>$aModel->usrlbnom, 'usrlblgn'=>$aModel->usrlblgn, 'usrlbpwd'=>$aModel->usrlbpwd, 'usrlbmai'=>$aModel->usrlbmai, 'usrfipho'=>$aModel->usrfipho);
		log_message('debug','[UserService.php] : insert with data:'. print_r($data, true) );
		$db->insert($this->getTableName(), $data);
		$aModel->usridusr = $db->insert_id();
		return $aModel;
	}

	/**
	 *
	 * @param database_object $db
	 * @param User $aModel
	 */
	public function update($db, $aModel) {
		$data = array('usrlbnom'=>$aModel->usrlbnom, 'usrlblgn'=>$aModel->usrlblgn, 'usrlbpwd'=>$aModel->usrlbpwd, 'usrlbmai'=>$aModel->usrlbmai, 'usrfipho'=>$aModel->usrfipho);
		$db->where('usridusr', $aModel->usridusr);
		log_message('debug','[UserService.php] : update with data:'. print_r($data, true) );
		$db->update($this->getTableName(), $data);
	}


	/***************************************************************************
	 * USER DEFINED FUNCTIONS
	 ***************************************************************************/
}

?>
