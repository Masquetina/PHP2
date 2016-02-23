<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	 function __construct() {
     parent::__construct();
   }

	public function index() {

		$data = array();
		$data['page_title'] = "Profile Page";
		$id_user = $this->uri->segment(2);
		if($id_user == 1) {
			redirect('/');
		} else {
			$this->load->model('user');
    	$query = $this->user->get_profile($id_user);
    	if($query) {
      	$data['cards'] = $query;
				$data['user'] = $query[0];
				$this->load_basic('profile', $data);
			}
		}
	}
}
