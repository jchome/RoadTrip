<?php

if (!function_exists('formatInfo')) {
	function formatInfo($message){
		$htmlCode = '<div class="alert alert-info">
					<button class="close" data-dismiss="alert">&#10006;</button>
					<strong>OK</strong>
					<p>'.$message.'</p>
				</div>';
		return $htmlCode;
	}
}

if (!function_exists('formatWarn')) {
	function formatWarn($message){
		$htmlCode = '<div class="alert alert-warning">
					<button class="close" data-dismiss="alert">&#10006;</button>
					<strong>Attention</strong>
					<p>'.$message.'</p>
				</div>
		';
		return $htmlCode;
	}
}

if (!function_exists('formatError')) {
	function formatError($message){
		$htmlCode = '<div class="alert alert-danger">
					<button class="close" data-dismiss="alert">&#10006;</button>
					<strong>Erreur !</strong>
					<p>'.$message.'</p>
			</div>
		';
		return $htmlCode;
	}
}

if (!function_exists('formatConfirm')) {
	function formatConfirm($message){
		$htmlCode = '<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&#10006;</button>
					<strong>OK</strong>
					<p>'.$message.'</p>
				</div>';
		return $htmlCode;
	}
}



/**
 * $itemToShow --> $subItemToShow : 
 * Applications --> list || edit || detail
 * Objets --> list || edit
 */
if (!function_exists('htmlNavigation')) {
	function htmlNavigation($itemToShow, $subItemToShow, $parameter_1 = null, $parameter_2 = null){
		$session = $parameter_1;
		if($subItemToShow == 'fancy'){
			return "";
		}
		$htmlCode = '<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="'.base_url().'"><img src="'.base_url().'www/images/logo-small.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            ';
		
		// pour les admin :
		if($session->userdata('user_id') == 0) {
			// users
			$htmlCode .= '<li class="'.(($itemToShow == "user")?('active'):('')).'"><a href="'.base_url().'index.php/user/listusers">Utilisateurs</a>';
		
		}
		
		$htmlCode .= '<li class="'.(($itemToShow == "voyage")?('active'):('')).'"><a href="'.base_url().'index.php/voyage/listvoyages">Voyages</a>';
		//$htmlCode .= '<li class="'.(($itemToShow == "partage")?('active'):('')).'"><a href="'.base_url().'index.php/partage/listpartages">Partage</a>';
		//$htmlCode .= '<li class="'.(($itemToShow == "itineraire")?('active'):('')).'"><a href="'.base_url().'index.php/itineraire/listitineraires">Itineraire</a>';
		//$htmlCode .= '<li class="'.(($itemToShow == "etape")?('active'):('')).'"><a href="'.base_url().'index.php/etape/listetapes">Etape</a>';
		
		$htmlCode .= '
            <!--li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu navbar-right">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li-->
          </ul>';

		// menu de droite
		$htmlCode .= '
				<ul class="nav navbar-nav navbar-right">
						<li class="dropdown user-info">
							<input type="hidden" name="session_user_id" id="session_user_id" value="'.$session->userdata('user_id').'"/>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> '.$session->userdata('user_name').'<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="'.base_url().'index.php/user/editmyself/">Mon profil</a></li>
								<li><a href="'.base_url().'index.php/welcome/logout">Logout</a></li>
							</ul>
						</li>
					</ul-->
        </div><!--/.nav-collapse -->
      </div>
    </nav>'; 
		
		return $htmlCode;
	}
}

?>