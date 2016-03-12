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
	public function delete($id_card, $id_user_author, $id_user_flager) {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$id_card = $this->uri->segment(3);
			$id_user_author = $this->uri->segment(4);
			$id_user_flager = $this->uri->segment(5);
			$this->load->model('administration');
			$query = $this->administration->delete_card($id_card, $id_user_author, $id_user_flager);
			if($query) {
				$this->load->model('administration');
				$query = $this->administration->get_user($id_user_author);
				if($query) {
					foreach($query as $data) {
						$data = array(
							'id_user'  => $data->id_user,
							'username' => $data->username,
							'avatar' 	 => $data->avatar,
							'ban_time' =>	$data->ban_time
						);
					}
					echo json_encode($data);
				}
			}
		}
	}

	public function unflag() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$id_card = $this->uri->segment(3);
			$id_user_author = $this->uri->segment(4);
			$id_user_flager = $this->uri->segment(5);
			$this->load->model('administration');
			$query = $this->administration->unflag_card();
			if($query) {

			}
		}
	}
}
