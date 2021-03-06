<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function like() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$id_user = $this->session->userdata('id_user');
			$id_card = $this->uri->segment(3);
			$this->load->model('cards');
			$query = $this->cards->like_card($id_card);
			if($query) {
				$this->load->model('cards');
				$query = $this->cards->create_like($id_card, $id_user);
			}
		}
	}

	public function delete() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$username = $this->session->userdata('username');
			$id_card = $this->uri->segment(3);
			$this->load->model('cards');
			$query = $this->cards->delete_card($id_card);
			if(!$query) {
				$warning = 'Error! Something went wrong.';
				$this->session->set_flashdata('warning', $warning);
				redirect('profile/' . $username);
			}
		}
	}

	public function flag() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$id_card = $this->uri->segment(3);
			$id_user_author = $this->uri->segment(4);
			$this->load->model('cards');
			$query = $this->cards->flag_card($id_card);
			if($query) {
				$this->load->model('cards');
				$query = $this->cards->create_flag($id_card, $id_user_author);
			}
		}
	}
}
