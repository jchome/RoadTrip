<?php
abstract class DAOService{
	
	/**
	 * Name of the query table in database
	 * @var string
	 */
	var $tableName;
	
	function __construct($aTableName = null, $aKeyField = null){
		$this->tableName = $aTableName;
		$this->keyField = $aKeyField;
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getKeyField(){
		return $this->keyField;
	}
	
	public function buildModelFromRow($row){
		throw new Exception('The class method [buildModelFromRow] is not defined.');
	}
	
	/**
	 * Recupération des données pour un ensemble de critères
	 * @param databse_object $db
	 * @param string $orderBy
	 * @param string $asc
	 * @param int $limit
	 * @param int $offset
	 * @return array of Models
	 * @throws Exception
	 */
	public function getAllByCrietria($db, $criteriaArray, $orderBy = null, $asc = null, $limit = null, $offset = null){
		if( $this->getTableName() == null ){
			 throw new Exception('The variable [tableName] is not defined.');
		}
		
		$db->select('*');
		$db->from($this->getTableName());
		if( $orderBy != null ){
			if($asc != null) {
				$db->order_by($orderBy, $asc);
			}else {
				$db->order_by($orderBy, "asc");
			}
		}
		if($limit != null){
			$db->limit($limit, $offset);
		}
		foreach($criteriaArray as $criteria){
			if( $criteria->operator == Criteria::$EQ ){
				$db->where($criteria->column, $criteria->value);
			}else if($criteria->operator == Criteria::$LIKE){
				$db->like($criteria->column, $criteria->value);
			}else if($criteria->operator == Criteria::$DIFF ||
					$criteria->operator == Criteria::$GE ||
					$criteria->operator == Criteria::$GT ||
					$criteria->operator == Criteria::$LE ||
					$criteria->operator == Criteria::$LT){
				$db->where($criteria->column. ' '. $criteria->operator, $criteria->value);
			}else if($criteria->operator == Criteria::$NULL ||
					$criteria->operator == Criteria::$NOTNULL){
				$db->where($criteria->column. ' '. $criteria->operator);
			}
		}
		$query = $db->get();
		
		// recuperer les enregistrements
		$records = array();
		foreach ($query->result_array() as $row) {
			$records[$row[$this->getKeyField()]] = $this->buildModelFromRow($row);
		}
		return $records;
		
	}
	
	/**
	 * Recupération des données complètes
	 * @param database_object $db
	 * @param string $orderBy
	 * @param string $asc
	 * @param int $limit
	 * @param int $offset
	 * @return array of Models
	 */
	public function getAll($db, $orderBy = null, $asc = null, $limit = null, $offset = null){
		return $this->getAllByCrietria($db, Array(), $orderBy, $asc, $limit, $offset);
	}
	
	public function count($db){
		return $this->countByCrietria($db, Array());
	}
	/**
	 * 
	 * @param database_object $db
	 * @param array $criteriaArray
	 * @return int
	 * @throws Exception
	 */
	public function countByCrietria($db, $criteriaArray){
		if( $this->getTableName() == null ){
			throw new Exception('The variable [tableName] is not defined.');
		}
		
		$db->select('*');
		$db->from($this->getTableName());
		
		foreach($criteriaArray as $criteria){
			if( $criteria->operator == Criteria::$EQ ){
				$db->where($criteria->column, $criteria->value);
			}else if($criteria->operator == Criteria::$LIKE){
				$db->like($criteria->column, $criteria->value);
			}else if($criteria->operator == Criteria::$DIFF ||
					$criteria->operator == Criteria::$GE ||
					$criteria->operator == Criteria::$GT ||
					$criteria->operator == Criteria::$LE ||
					$criteria->operator == Criteria::$LT){
				$db->where($criteria->column. ' '. $criteria->operator, $criteria->value);
			}else if($criteria->operator == Criteria::$NULL ||
					$criteria->operator == Criteria::$NOTNULL){
				$db->where($criteria->column. ' '. $criteria->operator);
			}
		}
		$query = $db->get();
		return $query->num_rows();
	}
	
	protected function getUnique($db, $key, $value){
		if( $this->getTableName() == null ){
			throw new Exception('The variable [tableName] is not defined.');
		}
		$query = $db->get_where($this->getTableName(), array($key => $value));
		if ($query->num_rows() != 1) {
			return null;
		}
		return $this->buildModelFromRow($query->row_array());
	}
	
	protected function deleteByKey($db, $key, $value){
		if( $this->getTableName() == null ){
			throw new Exception('The variable [tableName] is not defined.');
		}
		
		$db->delete($this->getTableName(), array($key=>$value));
		
	}
		
}
?>