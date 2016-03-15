<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function image() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		if($ispost) {
			$username = $this->uri->segment(3);
			$config['upload_path'] = './custom/img/avatars/';
      $config['allowed_types'] = 'jpg';
			// MIN / MAX / WIDTH / HEIGHT
			$config['file_name'] = $username;
			$config['overwrite'] = TRUE;
	    $this->load->library('upload', $config);
			if(!$this->upload->do_upload('userfile')) {
				$warning = 'Please choose a JPG file.';
				$this->session->set_flashdata('warning', $warning);
				redirect('profile/'. $username);
			} else {
				$image = getimagesize('./custom/img/avatars/' . $username . '.jpg');
				$config['image_library']	= 'gd2';
        $config['source_image']		= './custom/img/avatars/' . $username . '.jpg';
				$config['new_image']			= './custom/img/avatars/' . $username . '.jpg';
				$config['maintain_ratio']	= FALSE;
				$config['width']					= 320;
				$config['height']					= 320;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				if($this->session->userdata('avatar') == 'avatar.jpg'){
				// POZVATI MODEL DA PROMENI PODATAK O PUTANJI SLIKE U BAZI
				}
				redirect('profile/'. $username);
			}
		}
	}
}
