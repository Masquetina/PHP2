<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	 function __construct() {
     parent::__construct();
   }

	public function index() {
    $data = array();
		$data['page_title'] = "Login";
		$this->load_view('login', $data);
	}

  public function validate() {
    $this->load->model('user');
    $query = $this->user->validate();

    if($query) {
      $data = array(
        'email' => $this->input->post('email'),
        'logged' => true
      );
      $this->session->set_userdata($data);
      redirect('index.php/home/user');
    } else {

      echo 'NIJE USPELO!';
      //$this->index();
    }
  }
}
