<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	function __construct() {
  	parent::__construct();
  }

	public function index() {
		$data = array();
		$data['page_title'] = "Profile Page";
		$username = $this->uri->segment(2);
		if($username == 'admin') {
			redirect('/');
		} else {
			$this->load->model('user');
    	$query = $this->user->get_profile($username);
			$data['user'] = $query[0];
      $data['cards'] = $query;
			$this->load_basic('profile', $data);
		}
	}
}
