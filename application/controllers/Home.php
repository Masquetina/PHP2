<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
  	parent::__construct();
  }

	public function index() {
		$data = array();
		$data['page_title'] = "Home Page";
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'home';
		$config['total_rows'] = $this->db->get('cards')->num_rows();
		$config['per_page'] = 3;
		$config['num_links'] = 2;

		$config['full_tag_open']    = '<div class="pagination text-center">';
		$config['full_tag_close']   = '</div>';
		$config['num_tag_open']     = '<span class="btn btn-default">';
		$config['num_tag_close']    = '</span>';
		$config['cur_tag_open']     = '<span class="btn btn-default btn-raised btn-primary">';
		$config['cur_tag_close']    = '</span>';
		$config['next_tag_open'] 	  = '<span class="next">';
		$config['next_tag_close']  = '</span>';
		$config['prev_tag_open']	  = '<span class="next">';
		$config['prev_tag_close']  = '</span>';
		$config['first_tag_open']   = '<span>';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open']    = '<span>';
		$config['last_tag_close']  = '</span>';

		$this->pagination->initialize($config);
		$this->load->model('cards');
    $query = $this->cards->get_all_cards($config['per_page'], $this->uri->segment(2));
    if($query) {
      $data['cards'] = $query;
			$this->load_basic('home', $data);
    } else {
			$this->load_basic('home', $data);
		}
	}
}
