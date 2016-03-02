<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct() {
  	parent::__construct();
  }

	public function index() {
		if($this->session->userdata('id_rolle') == 2) {
			$data = array();
			$data['page_title'] = "Dashboard Page";
			$this->load->model('administration');
    	$query = $this->administration->get_users();
    	if($query) {
      	$data['users'] = $query;
    	}

			$this->load->model('administration');
			$query = $this->administration->get_cards();
			if($query) {
      	$data['cards'] = $query;
    	}

			$this->load_basic('dashboard', $data);
		} else {
			redirect('/');
		}
	}
}
