<?php

class Signin extends CI_Controller {

	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();

		$this->load->model('User_model');
		$this->load->library('UserService');

	}
	
	public function index(){
		$data = Array();
		$this->load->view('login/signin_view', $data);
	}
	
	/**
	 * Passage de l'étape 2 : validité du mail
	 */
	public function step2(){
		$formSend = $this->input->post('formSend');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|encode_php_tags|xss_clean');
		
		$data = Array();
		$email = $this->input->post('email'); 
		$data['email'] = $email;
		if($this->form_validation->run() == FALSE){
			$this->load->view('login/signin_view', $data);
			return;
		}

		$allCandidates = $this->userservice->getAllBy_usrlbmai($this->db, $email);
		
		if(sizeOf($allCandidates) == 0){
			// créer le compte avec demande d'autres infos
			$data['email'] = $email;
			$data['usrlblgn'] = "";
			$data['usridusr'] = "";
			$this->load->view('login/signin2_view', $data);
		}else {
			$data['message'] = $this->lang->line('signin.form.mail_already_taken');
			$this->load->view('login/signin_view', $data);
		}
		
	}
	
	/**
	 * Création du user avec d'autres infos
	 */
	public function send(){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('usrlblgn', 'lang:signin.form.usrlblgn.label', 'trim|required');
		$this->form_validation->set_rules('usrlbpwd', 'lang:signin.form.usrlbpwd.label', 'trim|required');
		$this->form_validation->set_rules('usrlbnom', 'lang:signin.form.usrlbnom.label', 'trim|required');
		$this->form_validation->set_rules('usrlbmai', 'lang:signin.form.usrlbmai.label', 'trim|required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('login/signin2_view');
		}

		$allCandidates = $this->userservice->getAllBy_usrlblgn($this->db, $this->input->post('usrlblgn') );
		if(sizeOf($allCandidates) > 0){
			$data['message'] = $this->lang->line('signin.form.login_already_taken');
			$data['email'] = $this->input->post('usrlbmai');
			$data['usrlblgn'] = $this->input->post('usrlblgn');
			$data['usrlbnom'] = $this->input->post('usrlbnom');
			$data['usridusr'] = $this->input->post('usridusr');
			$this->load->view('login/signin2_view',$data);
			return;
		}
		// si usridusr vide, alors créer le compte
		// si usridusr non vide, rechercher avec cette info et faire une mise à jour
		if($this->input->post('usridusr') == ""){
			// creation
			
			// Insertion en base
			$model = new User_model();
			$model->usridusr = $this->input->post('usridusr');
			$model->usrlblgn = $this->input->post('usrlblgn');
			$model->usrlbpwd = $this->input->post('usrlbpwd');
			$model->usrlbnom = $this->input->post('usrlbnom');
			$model->usrlbmai = $this->input->post('usrlbmai');
			$model->usrenpro = "USR";
			
			$user = $this->userservice->insertNew($this->db, $model);
		}else{
			// mise à jour
			$model = $this->userservice->getUnique($this->db, $this->input->post('usridusr') );
			$model->usrlblgn = $this->input->post('usrlblgn');
			$model->usrlbpwd = $this->input->post('usrlbpwd');
			$model->usrlbnom = $this->input->post('usrlbnom');
			$this->userservice->update($this->db, $model);
			$user = $model;
		}
		
		if($user->usridusr > 0){
			$data['message'] = $this->lang->line('signin.form.done');
			$this->sendPassword($user->usrlbmai, $user->usrlblgn, $user->usrlbpwd);
		}else{
			$data['message'] = $this->lang->line('signin.form.error');
		}
		$this->load->view('welcome_message',$data);
		
		
	}
	private function sendPassword($to, $login, $password){
		$subject = 'Bienvenue';
		$message = '<html><body><p>Bonjour, <br>'.
				'Voici vos identifiants de connexion à <a href="'.base_url().'">'.base_url().'</a> : <br>'.
				'<ul><li>identifiant : '. $login . '</li>'.
				'<li>Mot de passe : '.$password .'</li></ul>'.
				'</body></html>';
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	
		// Additional headers
		$headers .= 'To: '. $to . "\r\n".
				'From: no-reply <jc.specs@free.fr>' . "\r\n";
		return mail($to, $subject, $message, $headers);
	}
}
?>