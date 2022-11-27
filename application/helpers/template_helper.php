<?php


if (!function_exists('htmlHeader')) {
	function htmlHeader($title){
		$htmlCode = metaTags() . titleTag($title) . siteCSS() . customCSS() . '

<script type="text/javascript">
function base_url(){return "'. base_url() .'";};
</script>
';
		return $htmlCode;
	}
}

if (!function_exists('bodyFooter')) {
	function bodyFooter(){
		$htmlCode = jquery();
		return $htmlCode;
	}
}

if (!function_exists('jquery')) {
	function jquery(){
		$htmlCode = '
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="'.base_url().'www/js/bootstrap-typeahead.js"></script>
<!-- OpenStreetMap API -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-ant-path@1.3.0/dist/leaflet-ant-path.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.3.0/leaflet.markercluster.js" integrity="sha512-jF3LrG2wkD0aqc+Q1K09ghfuEV9+3Zv0nyRKsT88zhwY9OF3kcGem/f70gMaUzHwhMknUOyzxHeUMm8OpkMEHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
				';
		return $htmlCode;
	}
}


if (!function_exists('metaTags')) {
	function metaTags(){
		$htmlCode = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
		return $htmlCode;
	}
}

if (!function_exists('titleTag')) {
	function titleTag($title){
		$htmlCode = '<title>'. $title .'</title>';
		return $htmlCode;
	}
}


if (!function_exists('siteCSS')) {
	function siteCSS(){
		$htmlCode = '<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
';
		return $htmlCode;
	}
}


if (!function_exists('customCSS')) {
	function customCSS(){
		$htmlCode = '<!-- Custom CSS -->
<link rel="stylesheet" href="'.base_url().'www/css/custom.css" />
<link rel="stylesheet" href="'.base_url().'www/css/main.css" />';
		return $htmlCode;
	}
}



?>