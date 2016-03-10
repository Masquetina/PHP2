<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		$data['page_title'] = "Login Page";
		$this->load_forms('login', $data);

		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if($ispost) {
			$this->load->model('validate');
			$query = $this->validate->login();
			if(!$query) {
				$warning = 'Your credentials are not valid. Please try again.';
				$this->session->set_flashdata('warning', $warning);
				redirect ('login');
			} else {
				if($this->session->userdata('id_rolle') == 2) {
					redirect('dashboard');
				} else {
					redirect('/');
				}
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
