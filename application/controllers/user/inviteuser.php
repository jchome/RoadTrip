<?php


class InviteUser extends CI_Controller {
	
	var $SECRET = "Secr4tPhr4s3";
	/**
	 * Constructeur
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('UserService');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->database();
		
	}
	
	/**
	 * page de creation d'un user
	 */	
	public function index(){
	}
	
	public function welcome(){
		$token = $this->input->get('token');
		
		$mail = $this->input->get('user');
		$userFound = $this->userservice->getAllBy_usrlbmai($this->db, $mail );
		if(sizeOf($userFound) != 1){
			$this->session->set_flashdata('msg_error', $this->lang->line('user.message.user_not_found', $mail));
			redirect('welcome');
		}
		$user = reset($userFound);
		if($user->usrlblgn != "-"){
			$this->session->set_flashdata('msg_error', $this->lang->line('user.message.already_registered'));
			redirect('welcome');
		}
		
		$calculatedToken = sha1($user->usrlbmai . $user->usridusr . $this->SECRET);
		if( $calculatedToken == $token){
			// créer le compte avec demande d'autres infos
			$data['email'] = $mail;
			$data['usrlblgn'] = $mail;
			$data['usridusr'] = $user->usridusr;
			$this->load->view('login/signin2_view', $data);
			
		}else{
			$this->session->set_flashdata('msg_error', $this->lang->line('user.message.invalid_token'));
			redirect('welcome');
		}
	}
	
}
?>