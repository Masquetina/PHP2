<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		$data['page_title'] = "Signup Page";
		$this->load_forms('signup', $data);
	}

	public function validate() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if($ispost) {
			$this->form_validation->set_rules(
				'username',
				'Username',
				'trim|strtolower|required|min_length[3]|max_length[10]|alpha|is_unique[users.username]',
				array('required'	 => 'Required',
							'min_length' => 'Minimum length of 3',
							'max_length' => 'Maximum length of 10',
							'alpha' 		 => 'Only letters alowed',
							'is_unique'  => 'Someone\'s using it already'
				)
			);
			$this->form_validation->set_rules(
				'email',
				'Email',
				'trim|required|valid_email|max_length[30]|is_unique[users.email]',
				array('required'		=> 'Required',
							'max_length' 	=> 'Maximum length of 30',
							'valid_email'	=> '%s format is not valid',
							'is_unique' 	=> 'Someone\'s using it already'
				)
			);
			$this->form_validation->set_rules(
				'password',
				'Password',
				'trim|required|min_length[8]|max_length[20]',
				array('required'	 => 'Required',
							'min_length' => 'Minimum length of 8',
							'max_length' => 'Maximum length of 15'
				)
			);
			$this->form_validation->set_rules(
				'repeatPassword',
				'Password confirmation',
				'trim|required|matches[password]',
				array('required' => 'Required',
							'matches'	 => 'Doesn\'t match'
				)
			);
			if($this->form_validation->run()) {
				$this->load->model('validate');
				$query = $this->validate->signup();
				if($query) {
					$message = 'The account is successfully created. You can log in now.';
	    		$this->session->set_flashdata('message', $message);
					redirect('login');
				}
    	} else {
				$data = array();
				$data['page_title'] = "Signup Page";
				$this->load_forms('signup', $data);
			}
		}
	}
}
