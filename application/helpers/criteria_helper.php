<?php

class Criteria {
	static $EQ = "=";
	static $LIKE = "like";
	static $LT = "<";
	static $LE = "<=";
	static $GT = ">";
	static $GE = ">=";
	
	static $NULL = "is null";
	static $DIFF = "!=";
	
	var $column;
	var $operator;
	var $value;
	
	function __construct($aColumn, $anOperator, $aValue){
		$this->column = $aColumn;
		$this->operator = $anOperator;
		$this->value = $aValue;
	}
	
}

?>