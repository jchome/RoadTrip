<?php


/**
 * Transformation des types date
 * @param unknown_type $sqlDate
 */
if (!function_exists('fromSQLDate')) {
	function fromSQLDate($sqlDate){
		$frDate = "";
		if( $sqlDate != 0 ){
			preg_match("/(\d\d\d\d)-(\d\d)-(\d\d)(.*)/", $sqlDate, $matches);
			$frDate = $matches[3] . "/" . $matches[2] . "/" . $matches[1];
			if( isset($matches[4]) ){
				$frDate .= $matches[4];
			}
		}
		return $frDate;
	}
}


if (!function_exists('toSQLDate')) {
	function toSQLDate($frDate){
		$sqlDate = "";
		if( $frDate != "" ){
			preg_match("!(\d\d)/(\d\d)/(\d\d\d\d)(.*)!", $frDate, $matches);
			$sqlDate = $matches[3] . "-" . $matches[2] . "-" . $matches[1];
			if( isset($matches[4]) ){
				$sqlDate .= $matches[4];
			}
		}
		return $sqlDate;
	}
}

if (!function_exists('emptyToNull')) {
	function emptyToNull($string){
		if($string == '') {
			return null;
		}else{
			return $string;
		}
	}
}

?>