<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($message = NULL) {
		if($this->session->userdata('id_rolle') == 1) {
			redirect('/');
		} else if ($this->session->userdata('id_rolle') == 2) {
			redirect('index.php/dashboard');
		} else {
			$data = array();
			$data['message'] = $message;
			$data['page_title'] = "Login Page";
			$this->load_acc_forms('login', $data);
		}
	}

	public function login() {
		// TO PROTECT ALL THE PATHS/FUNCTIONS AS ABOVE, OR JUST index()?
		$this->load->model('validate');
		$query = $this->validate->login();

		if(!$query) {
			$message = "Please check Your credentials.";
			$this->index($message);
		} else {
			if($this->session->userdata('id_rolle') == 2) {
				redirect('index.php/dashboard');
			} else {
				redirect('/');
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}

	// MOVE THIS INTO SEPARATE CONTROLLER Signup extends MY_Controller
	/*
	public function signup() {
		$this->load->model('validate');
		$query = $this->validate->signup();

		if(!$query) {
			$message = "There is already a user with the same email address.";
			$this->index($message);
		} else {
			$message = "The account is successfully created. You can log in now.";
			$this->index($message);
			redirect('/index.php/login', $message);
		}
	}
	*/
}
