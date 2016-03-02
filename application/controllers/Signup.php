<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		$data['page_title'] = "Signup Page";
		$this->load_forms('signup', $data);

		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$this->load->model('validate');
			$query = $this->validate->signup();
			if(!$query) {
				$warning = 'Somebody is already registered with that email address.';
				$this->session->set_flashdata('warning', $warning);
				redirect ('signup');
			} else {
				$message = 'The account is successfully created. You can log in now.';
	      $this->session->set_flashdata('message', $message);
				redirect('login');
			}
		} else {
			if($this->session->userdata('id_rolle') == 2) {
				redirect('dashboard');
			} else if($this->session->userdata('id_rolle') == 1) {
				redirect('/');
			}
		}
	}
}
