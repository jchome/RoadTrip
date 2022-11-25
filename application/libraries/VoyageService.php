<?php

/*
 * Created by generator
 *
 */

require_once(APPPATH.'libraries/DAOService.php');


class VoyageService extends DAOService{

	public function __construct($params = array()){
		parent::__construct("rtpvoy", "voyidvoy");
	}

	public function buildModelFromRow($row){
		if($row == null){
			return null;
		}
		$model = new Voyage_model();
		$model->voyidvoy = $row['voyidvoy'];
		$model->voylbnom = $row['voylbnom'];
		$model->voyidusr = $row['voyidusr'];
		return $model;
	}
	
	public function getUnique($db, $value){
		return parent::getUnique($db, 'voyidvoy', $value);
	}
	
	public function deleteByKey($db, $value){
		return parent::deleteByKey($db, 'voyidvoy', $value);
	}

	public function delete($db, $aModel){
		if( $aModel == null) {
			throw new Exception('Error while calling the [delete] method on a null object.');
		}
		return parent::deleteByKey($db, 'voyidvoy', $aModel->voyidvoy);
	}


	/**
	 * Recupere la liste des enregistrements depuis le champ voyidvoy
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_voyidvoy($db, $voyidvoy, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('voyidvoy', Criteria::$EQ, $voyidvoy) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ voylbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_voylbnom($db, $voylbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('voylbnom', Criteria::$EQ, $voylbnom) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ voyidusr
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_voyidusr($db, $voyidusr, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('voyidusr', Criteria::$EQ, $voyidusr) ), $orderBy, $asc, $limit, $offset);
	}



	/**
	 * Recupere la liste des enregistrements depuis le champ voylbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_voylbnom($db, $voylbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('voylbnom', Criteria::$LIKE, $voylbnom) ), $orderBy, $asc, $limit, $offset);
	}




	/**
	 * Suppression d'un ensemble d'objets a partir d'une valeur qui n'est pas la cle
	 * @param object $db database object
	 * @return 
	 */
	public function deleteAllsBy_voyidusr($db, $usridusr){
		$allObjects = $this->getAllBy_voyidusr($db, $usridusr);
		foreach($allObjects as $object){
			$this->delete($db, $object);
		}
	}




	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de voylbnom : Nom du voyage
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_voylbnom($db, $voylbnom){
		return $this->countByCrietria($db, Array( new Criteria('voylbnom',Criteria::$EQ,$voylbnom) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de voyidusr : Lien vers l'utilisateur
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_voyidusr($db, $voyidusr){
		return $this->countByCrietria($db, Array( new Criteria('voyidusr',Criteria::$EQ,$voyidusr) ) );
	}



	/**
	 * 
	 * @param database_object $db
	 * @param Voyage $aModel
	 */
	public function insertNew($db, $aModel){
		$data=array( 'voylbnom'=>$aModel->voylbnom, 'voyidusr'=>$aModel->voyidusr);
		log_message('debug','[VoyageService.php] : insert with data:'. print_r($data, true) );
		$db->insert($this->getTableName(), $data);
		$aModel->voyidvoy = $db->insert_id();
		return $aModel;
	}

	/**
	 *
	 * @param database_object $db
	 * @param Voyage $aModel
	 */
	public function update($db, $aModel) {
		$data = array('voylbnom'=>$aModel->voylbnom, 'voyidusr'=>$aModel->voyidusr);
		$db->where('voyidvoy', $aModel->voyidvoy);
		log_message('debug','[VoyageService.php] : update with data:'. print_r($data, true) );
		$db->update($this->getTableName(), $data);
	}


	/***************************************************************************
	 * USER DEFINED FUNCTIONS
	 ***************************************************************************/
}

?>
