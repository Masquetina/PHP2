<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($message = NULL) {
		$data = array();
		$data['message'] = $message;
		$data['page_title'] = "Login Page";
		$this->load_acc_forms('login', $data);
	}

	public function login() {
		$this->load->model('login');
		$query = $this->login->login();

		if(!$query) {
			$message = "Invalid...";
			$this->index($message);
		} else {
			redirect('/');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}


	public function signup() {
		$this->load->model('signup');
		$query = $this->user->signup();
	}
}
