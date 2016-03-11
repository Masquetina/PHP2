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
			$this->form_validation->set_rules(
					'username',
					'Username',
					'trim|required|min_length[3]|max_length[20]|alpha|is_unique[users.username]'
			);

			$this->form_validation->set_rules(
					'email',
					'Email',
					'trim|strtolower|required|valid_email|max_length[30]|is_unique[users.email]'
			);

			$this->form_validation->set_rules(
					'password',
					'Password',
					'trim|required|min_length[10]|max_length[20]'
			);

			$this->form_validation->set_rules(
					'repeatPassword',
					'Password confirmation',
					'trim|required|matches[password]'
			);

			$this->form_validation->set_error_delimiters('<div class="text-primary">', '</div>');

			if (!$this->form_validation->run()) {
        $this->load->view('signup');
      } else {
				$this->load->model('validate');
				$query = $this->validate->signup();
				if($query) {
					$message = 'The account is successfully created. You can log in now.';
		      $this->session->set_flashdata('message', $message);
					redirect('login');
				}
      }
		} else {
			$this->load_forms('signup', $data);
		}
	}
}
