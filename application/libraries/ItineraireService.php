<?php

/*
 * Created by generator
 *
 */

require_once(APPPATH.'libraries/DAOService.php');


class ItineraireService extends DAOService{

	public function __construct($params = array()){
		parent::__construct("rtpiti", "itiiditi");
	}

	public function buildModelFromRow($row){
		if($row == null){
			return null;
		}
		$model = new Itineraire_model();
		$model->itiiditi = $row['itiiditi'];
		$model->itilbnom = $row['itilbnom'];
		$model->itiidvoy = $row['itiidvoy'];
		$model->itinuord = $row['itinuord'];
		$model->itilbdur = $row['itilbdur'];
		$model->itinudst = $row['itinudst'];
		$model->ititxdes = $row['ititxdes'];
		return $model;
	}
	
	public function getUnique($db, $value, $dummy = ""){
		return parent::getUnique($db, 'itiiditi', $value);
	}
	
	public function deleteByKey($db, $value, $dummy = ""){
		return parent::deleteByKey($db, 'itiiditi', $value);
	}

	public function delete($db, $aModel){
		if( $aModel == null) {
			throw new Exception('Error while calling the [delete] method on a null object.');
		}
		return parent::deleteByKey($db, 'itiiditi', $aModel->itiiditi);
	}


	/**
	 * Recupere la liste des enregistrements depuis le champ itiiditi
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_itiiditi($db, $itiiditi, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itiiditi', Criteria::$EQ, $itiiditi) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ itilbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_itilbnom($db, $itilbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itilbnom', Criteria::$EQ, $itilbnom) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ itiidvoy
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_itiidvoy($db, $itiidvoy, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itiidvoy', Criteria::$EQ, $itiidvoy) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ itinuord
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_itinuord($db, $itinuord, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itinuord', Criteria::$EQ, $itinuord) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ itilbdur
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_itilbdur($db, $itilbdur, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itilbdur', Criteria::$EQ, $itilbdur) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ itinudst
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_itinudst($db, $itinudst, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itinudst', Criteria::$EQ, $itinudst) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ ititxdes
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllBy_ititxdes($db, $ititxdes, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('ititxdes', Criteria::$EQ, $ititxdes) ), $orderBy, $asc, $limit, $offset);
	}



	/**
	 * Recupere la liste des enregistrements depuis le champ itilbnom
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_itilbnom($db, $itilbnom, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itilbnom', Criteria::$LIKE, $itilbnom) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ itilbdur
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_itilbdur($db, $itilbdur, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('itilbdur', Criteria::$LIKE, $itilbdur) ), $orderBy, $asc, $limit, $offset);
	}

	/**
	 * Recupere la liste des enregistrements depuis le champ ititxdes
	 * @param object $db database object
	 * @return array of data
	 */
	public function getAllLike_ititxdes($db, $ititxdes, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array( new Criteria('ititxdes', Criteria::$LIKE, $ititxdes) ), $orderBy, $asc, $limit, $offset);
	}




	/**
	 * Suppression d'un ensemble d'objets a partir d'une valeur qui n'est pas la cle
	 * @param object $db database object
	 * @return 
	 */
	public function deleteAllsBy_itiidvoy($db, $voyidvoy){
		$allObjects = $this->getAllBy_itiidvoy($db, $voyidvoy);
		foreach($allObjects as $object){
			$this->delete($db, $object);
		}
	}




	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de itilbnom : Nom de l'itinéraire
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_itilbnom($db, $itilbnom){
		return $this->countByCrietria($db, Array( new Criteria('itilbnom',Criteria::$EQ,$itilbnom) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de itiidvoy : Lien vers le voyage
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_itiidvoy($db, $itiidvoy){
		return $this->countByCrietria($db, Array( new Criteria('itiidvoy',Criteria::$EQ,$itiidvoy) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de itinuord : Ordre dans le voyage
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_itinuord($db, $itinuord){
		return $this->countByCrietria($db, Array( new Criteria('itinuord',Criteria::$EQ,$itinuord) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de itilbdur : Durée de l'itinéraire
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_itilbdur($db, $itilbdur){
		return $this->countByCrietria($db, Array( new Criteria('itilbdur',Criteria::$EQ,$itilbdur) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de itinudst : Distance de l'itinéraire
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_itinudst($db, $itinudst){
		return $this->countByCrietria($db, Array( new Criteria('itinudst',Criteria::$EQ,$itinudst) ) );
	}

	/**
	 * Decompte d'un ensemble d'objets a partir d'une valeur de ititxdes : Description et commentaires
	 * @param object $db database object
	 * @return int
	 */
	public function countBy_ititxdes($db, $ititxdes){
		return $this->countByCrietria($db, Array( new Criteria('ititxdes',Criteria::$EQ,$ititxdes) ) );
	}



	/**
	 * 
	 * @param database_object $db
	 * @param Itineraire $aModel
	 */
	public function insertNew($db, $aModel){
		$data=array( 'itilbnom'=>$aModel->itilbnom, 'itiidvoy'=>$aModel->itiidvoy, 'itinuord'=>$aModel->itinuord, 'itilbdur'=>$aModel->itilbdur, 'itinudst'=>$aModel->itinudst, 'ititxdes'=>$aModel->ititxdes);
		log_message('debug','[ItineraireService.php] : insert with data:'. print_r($data, true) );
		$db->insert($this->getTableName(), $data);
		$aModel->itiiditi = $db->insert_id();
		return $aModel;
	}

	/**
	 *
	 * @param database_object $db
	 * @param Itineraire $aModel
	 */
	public function update($db, $aModel) {
		$data = array('itilbnom'=>$aModel->itilbnom, 'itiidvoy'=>$aModel->itiidvoy, 'itinuord'=>$aModel->itinuord, 'itilbdur'=>$aModel->itilbdur, 'itinudst'=>$aModel->itinudst, 'ititxdes'=>$aModel->ititxdes);
		$db->where('itiiditi', $aModel->itiiditi);
		log_message('debug','[ItineraireService.php] : update with data:'. print_r($data, true) );
		$db->update($this->getTableName(), $data);
	}


	/***************************************************************************
	 * USER DEFINED FUNCTIONS
	 ***************************************************************************/
}

?>
