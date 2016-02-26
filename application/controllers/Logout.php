<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if($this->session->userdata('validated')) {
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
		} else {
			$this->session->set_flashdata('message', 'You have to be logged in first.');
			redirect ('/');
		}
	}
}
