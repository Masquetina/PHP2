<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function load_view($view, $data) {
    $this->load->view($view, $data);
  }
}
