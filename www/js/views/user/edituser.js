/* Javascript for edituser_view.php */




 
function deleteFile_usrfipho(){
	if( confirm("Supprimer ce fichier ?") ){
		$("#usrfipho_deleteButton").hide();
		$("#usrfipho_currentFile").hide();
		$("#usrfipho").val("");
	}
}





//$("#usridusr").get(0).setCustomValidity('Champ requis');
//$("#usrlbnom").get(0).setCustomValidity('Champ requis');
//$("#usrlblgn").get(0).setCustomValidity('Champ requis');
//$("#usrlbpwd").get(0).setCustomValidity('Champ requis');
//$("#usrlbmai").get(0).setCustomValidity('Champ requis');
