<?php

/*
 * Created by generator
 *
 */

require_once(APPPATH.'libraries/DAOService.php');


class PartageService extends DAOService{

	public function __construct($params = array()){
		parent::__construct("rtppar", "paridpar");
	}

	public function buildModelFromRow($row){
		if($row == null){
			return null;
		}
		$model = new Partage_model();
		$model->paridpar = $row['paridpar'];
		$model->paridvoy = $row['paridvoy'];
		$model->paridami = $row['paridami'];
		return $model;
	}
	
	public function getUnique($db, $value, $dummy = ""){
		return parent::getUnique($db, 'paridpar', $value);
	}
	
	public function deleteByKey($db, $value, $dummy = ""){
		return parent::deleteByKey($db, 'paridpar', $value);
	}

	public function delete($db, $aModel){
		if( $aModel == null) {
			throw new Exception('Error while calling the [delete] method on a null object.');
		}
		return parent::deleteByKey($db, 'paridpar', $aModel->paridpar);
	}


	/**
	 * Recupere la liste des enregistrements depuis le champ paridpar
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_paridpar($db, $paridpar, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('paridpar', Criteria::$EQ, $paridpar) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ paridvoy
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_paridvoy($db, $paridvoy, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('paridvoy', Criteria::$EQ, $paridvoy) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ paridami
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_paridami($db, $paridami, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('paridami', Criteria::$EQ, $paridami) ), $orderBy, $asc, $limit, $offset);
	}






	/**
	 * Suppression d'un ensemble d'objets a partir d'une valeur qui n'est pas la cle
	 * @param object $db database object
	 * @return 
	 */
	public function deleteAllsBy_paridvoy($db, $voyidvoy){
		$allObjects = $this->getAllBy_paridvoy($db, $voyidvoy);
		foreach($allObjects as $object){
			$this->delete($db, $object);
		}
	}

	/**
	 * Suppression d'un ensemble d'objets a partir d'une valeur qui n'est pas la cle
	 * @param object $db database object
	 * @return 
	 */
	public function deleteAllsBy_paridami($db, $usridusr){
		$allObjects = $this->getAllBy_paridami($db, $usridusr);
		foreach($allObjects as $object){
			$this->delete($db, $object);
		}
	}




	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de paridvoy : Lien vers le voyage
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_paridvoy($db, $paridvoy){
		return $this->countByCrietria($db, Array( new Criteria('paridvoy',Criteria::$EQ,$paridvoy) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de paridami : Lien vers l'utilisateur ami
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_paridami($db, $paridami){
		return $this->countByCrietria($db, Array( new Criteria('paridami',Criteria::$EQ,$paridami) ) );
	}



	/**
	 * 
	 * @param database_object $db
	 * @param Partage $aModel
	 */
	public function insertNew($db, $aModel){
		$data=array( 'paridvoy'=>$aModel->paridvoy, 'paridami'=>$aModel->paridami);
		log_message('debug','[PartageService.php] : insert with data:'. print_r($data, true) );
		$db->insert($this->getTableName(), $data);
		$aModel->paridpar = $db->insert_id();
		return $aModel;
	}

	/**
	 *
	 * @param database_object $db
	 * @param Partage $aModel
	 */
	public function update($db, $aModel) {
		$data = array('paridvoy'=>$aModel->paridvoy, 'paridami'=>$aModel->paridami);
		$db->where('paridpar', $aModel->paridpar);
		log_message('debug','[PartageService.php] : update with data:'. print_r($data, true) );
		$db->update($this->getTableName(), $data);
	}


	/***************************************************************************
	 * USER DEFINED FUNCTIONS
	 ***************************************************************************/
}

?>
