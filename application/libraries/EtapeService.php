<?php

/*
 * Created by generator
 *
 */

require_once(APPPATH.'libraries/DAOService.php');


class EtapeService extends DAOService{

	public function __construct($params = array()){
		parent::__construct("rtpetp", "etpidetp");
	}

	public function buildModelFromRow($row){
		if($row == null){
			return null;
		}
		$model = new Etape_model();
		$model->etpidetp = $row['etpidetp'];
		$model->etplbnom = $row['etplbnom'];
		$model->etpnulat = $row['etpnulat'];
		$model->etpnulon = $row['etpnulon'];
		$model->etpiditi = $row['etpiditi'];
		$model->etpnuord = $row['etpnuord'];
		$model->etptxdes = $row['etptxdes'];
		return $model;
	}
	
	public function getUnique($db, $value){
		return parent::getUnique($db, 'etpidetp', $value);
	}
	
	public function deleteByKey($db, $value){
		return parent::deleteByKey($db, 'etpidetp', $value);
	}

	public function delete($db, $aModel){
		if( $aModel == null) {
			throw new Exception('Error while calling the [delete] method on a null object.');
		}
		return parent::deleteByKey($db, 'etpidetp', $aModel->etpidetp);
	}


	/**
	 * Recupere la liste des enregistrements depuis le champ etpidetp
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_etpidetp($db, $etpidetp, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etpidetp', Criteria::$EQ, $etpidetp) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ etplbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_etplbnom($db, $etplbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etplbnom', Criteria::$EQ, $etplbnom) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ etpnulat
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_etpnulat($db, $etpnulat, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etpnulat', Criteria::$EQ, $etpnulat) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ etpnulon
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_etpnulon($db, $etpnulon, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etpnulon', Criteria::$EQ, $etpnulon) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ etpiditi
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_etpiditi($db, $etpiditi, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etpiditi', Criteria::$EQ, $etpiditi) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ etpnuord
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_etpnuord($db, $etpnuord, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etpnuord', Criteria::$EQ, $etpnuord) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ etptxdes
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_etptxdes($db, $etptxdes, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etptxdes', Criteria::$EQ, $etptxdes) ), $orderBy, $asc, $limit, $offset);
	}



	/**
	 * Recupere la liste des enregistrements depuis le champ etplbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_etplbnom($db, $etplbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etplbnom', Criteria::$LIKE, $etplbnom) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ etptxdes
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_etptxdes($db, $etptxdes, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('etptxdes', Criteria::$LIKE, $etptxdes) ), $orderBy, $asc, $limit, $offset);
	}




	/**
	 * Suppression d'un ensemble d'objets a partir d'une valeur qui n'est pas la cle
	 * @param object $db database object
	 * @return 
	 */
	public function deleteAllsBy_etpiditi($db, $itiiditi){
		$allObjects = $this->getAllBy_etpiditi($db, $itiiditi);
		foreach($allObjects as $object){
			$this->delete($db, $object);
		}
	}




	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de etplbnom : Nom de l'étape
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_etplbnom($db, $etplbnom){
		return $this->countByCrietria($db, Array( new Criteria('etplbnom',Criteria::$EQ,$etplbnom) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de etpnulat : Latidude de la coordonnée
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_etpnulat($db, $etpnulat){
		return $this->countByCrietria($db, Array( new Criteria('etpnulat',Criteria::$EQ,$etpnulat) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de etpnulon : Longitude de la coordonnée
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_etpnulon($db, $etpnulon){
		return $this->countByCrietria($db, Array( new Criteria('etpnulon',Criteria::$EQ,$etpnulon) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de etpiditi : Lien vers l'itinéraire
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_etpiditi($db, $etpiditi){
		return $this->countByCrietria($db, Array( new Criteria('etpiditi',Criteria::$EQ,$etpiditi) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de etpnuord : Ordre dans l'itinéraire
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_etpnuord($db, $etpnuord){
		return $this->countByCrietria($db, Array( new Criteria('etpnuord',Criteria::$EQ,$etpnuord) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de etptxdes : Description et commentaires
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_etptxdes($db, $etptxdes){
		return $this->countByCrietria($db, Array( new Criteria('etptxdes',Criteria::$EQ,$etptxdes) ) );
	}



	/**
	 * 
	 * @param database_object $db
	 * @param Etape $aModel
	 */
	public function insertNew($db, $aModel){
		$data=array( 'etplbnom'=>$aModel->etplbnom, 'etpnulat'=>$aModel->etpnulat, 'etpnulon'=>$aModel->etpnulon, 'etpiditi'=>$aModel->etpiditi, 'etpnuord'=>$aModel->etpnuord, 'etptxdes'=>$aModel->etptxdes);
		log_message('debug','[EtapeService.php] : insert with data:'. print_r($data, true) );
		$db->insert($this->getTableName(), $data);
		$aModel->etpidetp = $db->insert_id();
		return $aModel;
	}

	/**
	 *
	 * @param database_object $db
	 * @param Etape $aModel
	 */
	public function update($db, $aModel) {
		$data = array('etplbnom'=>$aModel->etplbnom, 'etpnulat'=>$aModel->etpnulat, 'etpnulon'=>$aModel->etpnulon, 'etpiditi'=>$aModel->etpiditi, 'etpnuord'=>$aModel->etpnuord, 'etptxdes'=>$aModel->etptxdes);
		$db->where('etpidetp', $aModel->etpidetp);
		log_message('debug','[EtapeService.php] : update with data:'. print_r($data, true) );
		$db->update($this->getTableName(), $data);
	}


	/***************************************************************************
	 * USER DEFINED FUNCTIONS
	 ***************************************************************************/
}

?>
