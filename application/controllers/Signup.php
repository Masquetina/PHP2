<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($message = NULL) {
		if($this->session->userdata('id_rolle') == 1) {
			redirect('/');
		} else if ($this->session->userdata('id_rolle') == 2) {
			redirect('dashboard');
		} else {
			$data = array();
			$data['message'] = $message;
			$data['page_title'] = "Login Page";
			$this->load_acc_forms('signup', $data);
		}
	}

	public function signup() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$this->load->model('validate');
			$query = $this->validate->signup();
			if(!$query) {
				$message = "Somebody is already registered with that email address.";
				$this->index($message);
			} else {
				redirect('login');
			}
		}
	}
}
