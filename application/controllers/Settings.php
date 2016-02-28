<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if ($ispost) {
			$username = $this->input->post('username');
			$config['upload_path'] = './custom/img/avatars/';
      $config['allowed_types'] = 'jpg|jpeg';
			$config['file_name'] = $username;
			$config['overwrite'] = TRUE;
	    $this->load->library('upload', $config);
			!$this->upload->do_upload('userfile');
			if(!$this->upload->do_upload()) {
				$warning = 'You can upload only JPG or JPEG!';
				$this->session->set_flashdata('warning', $warning);
				redirect('profile/'. $username);
			} else {
				redirect('profile/'. $username);
			}
		}
	}
}
