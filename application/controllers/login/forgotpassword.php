<?php

class ForgotPassword extends CI_Controller {

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
		$this->load->view('login/forgotpassword_view', $data);
	}
	
	public function send(){
		$formSend = $this->input->post('formSend');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|encode_php_tags|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('login/forgotpassword_view');
			return;
		}
		
		$email = $this->input->post('email'); 
		
		$allCandidates = $this->userservice->getAllBy_usrlbmai($this->db, $email);
		//log_message('debug','[forgotpassword] : '. print_r($allCandidates) );
		if(sizeOf($allCandidates) == 0){
			$data['message'] = $this->lang->line('forgotPassword.form.notfound');
			$this->load->view('login/forgotpassword_view',$data);
		}else if(sizeOf($allCandidates) == 1){
			// faire le job
			$user = end($allCandidates);
			$sentOK = $this->sendPassword($user->usrlbmai, $user->usrlblgn, $user->usrlbpwd);
			if(!$sentOK){
				$data['message'] = $this->lang->line('forgotPassword.form.mail_error');
			}else{
				$data['message'] = $this->lang->line('forgotPassword.form.mail_sent');
			}
			$this->load->view('welcome_message',$data);
		}else{
			$data['message'] = $this->lang->line('forgotPassword.form.mail_multiple');
			$this->load->view('welcome_message',$data);
		}
	}
	
	private function sendPassword($to, $login, $password){
		$subject = '[GeoWay] Mot de passe oublié';
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