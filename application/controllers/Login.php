<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

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
			$this->load_acc_forms('login', $data);
		}
	}

	public function login() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$this->load->model('validate');
			$query = $this->validate->login();
			if(!$query) {
				$message = "Your credentials are not valid. Please try again.";
				$this->index($message);
			} else {
				if($this->session->userdata('id_rolle') == 2) {
					redirect('dashboard');
				} else {
					redirect('/');
				}
			}
		}
	}

	public function logout() {
		$data = array(
			'id_user' ,
			'username',
			'email',
			'id_rolle',
			'validated'
		);
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('message', 'Bye bye, hope to see You again soon.');
		redirect('/');
	}
}
