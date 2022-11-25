<?php
/*
 * Created by generator
 * 
 */

class CreatePartageJson extends CI_Controller {

	var $SECRET = "Secr4tPhr4s3";
	
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Partage_model');
		$this->load->library('PartageService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();

		$this->load->model('Voyage_model');
		$this->load->library('VoyageService');
		$this->load->model('User_model');
		$this->load->library('UserService');
		
	}
	
	/**
	 * page de creation d'un partage
	 */	
	public function index(){

		$paridvoy = $this->input->get('paridvoy');
		
		$data = Array();
		// Recuperation des objets references
		$data['voyage'] = $this->voyageservice->getUnique($this->db, $paridvoy);

		$this->load->view('partage/createpartage_fancyview', $data);
	}
	
	/**
	 * Ajout d'un Partage
	 */
	public function add(){
		$myself_usridusr = $this->session->userdata('user_id');
		$myself = $this->userservice->getunique($this->db, $myself_usridusr);
		$paridvoy = $this->input->post('paridvoy');
		$email = $this->input->post('email'); 
	
		$allUserFriends = $this->userservice->getAllBy_usrlbmai($this->db, $email);
		// email connu ?
		if(count($allUserFriends) > 0){
			$user = end($allUserFriends);
			
		}else{
			// inconnu ==> créer un user
			$model = new User_model();
			$model->usrlbnom = $email;
			$model->usrlblgn = '-';
			$model->usrlbpwd = '';
			$model->usrlbmai = $email;
			$user = $this->userservice->insertNew($this->db, $model);

			// inviter le user
			$this->inviteUser($user, $myself);
		}
		
		// créer un partage
		$model = new Partage_model();
		$model->paridvoy = $paridvoy; 
		$model->paridami = $user->usridusr;
		$this->partageservice->insertNew($this->db, $model);

		// inviter le user
		$voyage = $this->voyageservice->getUnique($this->db, $paridvoy);
		$this->shareVoyageToUser($user, $myself, $voyage);
	
		$this->session->set_flashdata('msg_info', $this->lang->line('partage.message.confirm.added'));
	
		// renvoie vers la jsonification du modèle
		redirect("voyage/detailvoyage/index/".$paridvoy);
	}
	

	private function inviteUser($userTo, $userFrom){
		$token = sha1($userTo->usrlbmai . $userTo->usridusr . $this->SECRET);
		
		$subject = '[RoadTrip] Invitation de la part de '. $userFrom->usrlbnom;
		$message = '<html><body><p>Bonjour, <br>'.
				'Vous &ecirc;tes invit&eacute;s &agrave; vous inscrire sur la plateforme RoadTrip par l\'interm&eacute;diaire de '.
				$userFrom->usrlbnom. '. <br/><br/>'.
				'Rendez-vous &agrave; cette adresse : <a href="'.base_url().
				'index.php/user/inviteuser/welcome/?user='.$userTo->usrlbmai.'&token='.$token.'">Lien d\'acc&egrave;s</a>'.
				'</p></body></html>';
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		// Additional headers
		$headers .= 'To: '. $userTo->usrlbmai . "\r\n";
		$headers .= 'From: RoadTrip <no-reply.roadtrip@jc.specs.free.fr>' . "\r\n";
		mail($userTo->usrlbmai, $subject, $message, $headers);
	}
	

	private function shareVoyageToUser($userTo, $userFrom, $voyage){
		$subject = '[RoadTrip] Partage d\'un voyage de '. $userFrom->usrlbnom;
		$message = '<html><body><p>Bonjour, <br>'.
				'Le voyage "'.$voyage->voylbnom.'" est maintenant accessible sur la plateforme RoadTrip. '.
				'L\'utilisateur "'. $userFrom->usrlbnom. '" vous permet de le consulter. <br/><br/>'.
				'Rendez-vous &agrave; cette adresse : <a href="'.base_url().'">'.base_url().'</a>'.
				'<br/><br/>Et bonne ballade...</p></body></html>';
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		// Additional headers
		$headers .= 'To: '. $userTo->usrlbmai . "\r\n";
		$headers .= 'From: RoadTrip <no-reply.roadtrip@jc.specs.free.fr>' . "\r\n";
		mail($userTo->usrlbmai, $subject, $message, $headers);
	}
}
?>
