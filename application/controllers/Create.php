<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		$data['page_title'] = "Create New Card";
		$this->load_basic('card', $data);


	}
}
