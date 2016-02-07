<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	 function __construct() {
     parent::__construct();
   }

	public function index() {
		$data = array();
		$data['page_title'] = "Home Page";
		$this->load_view('home', $data);
	}
}
