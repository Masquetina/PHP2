<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	 function __construct() {
     parent::__construct();
   }

	public function index() {

		$data = array();
		$data['page_title'] = "Home Page";

		$this->load->model('cards');
    $query = $this->cards->get_all_cards();

    if($query) {
      $data['cards'] = $query;
    }
		$this->load_view('home', $data);
	}

	/*
		public function user() {
		$data = array();
		$data['page_title'] = "My Profile";
		$this->load_view('profile', $data);
	}*/
}
