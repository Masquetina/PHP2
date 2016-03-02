<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if($this->session->userdata('validated')) {
			$username = $this->session->userdata('username');
			$id_card = $this->uri->segment(2);
			$this->load->model('cards');
  		$query = $this->cards->delete_card($id_card);
  		if($query) {
				$message = 'You just deleted a card.';
				$this->session->set_flashdata('message', $message);
				redirect('profile/' . $username);
			} else {
				$warning = 'Can\'t perform this action.';
				$this->session->set_flashdata('warning', $warning);
				redirect('/');
			}
		} else {
			redirect('/');
		}
	}
}
