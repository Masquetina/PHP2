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

	public function card() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$username = $this->session->userdata('username');
			$config['upload_path'] = './custom/img/cards/';
			$config['allowed_types'] = 'jpg';
	    $config['file_name'] = $username . rand(1, 999999) . '.jpg';
	    $this->load->library('upload', $config);
			if($this->upload->do_upload('userfile')) {
				$image = $config['file_name'];
				$config['image_library']	= 'gd2';
				$config['source_image']		= './custom/img/cards/' . $image;
				$config['new_image']			= './custom/img/cards/' . $image;
				$config['maintain_ratio']	= FALSE;
				$config['width']					= '600';
				$config['height']					= '338';
				//$config['x_axis'] 				= '0';
				//$config['y_axis'] 				= '0';
				$this->load->library('image_lib', $config);
				$this->image_lib->crop();
				$filename = $config['file_name'];
				$this->load->model('cards');
				$query = $this->cards->create_card($filename);
				if($query) {
					$data = $this->session->userdata('username');
					redirect('profile'.'/'.$data);
				}
			} else {
				//print $this->upload->display_errors();
				redirect ('create');
			}
		}
	}

}
