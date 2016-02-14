<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function load_basic($view, $data) {
    $this->session;
    $this->load->view('head', $data);
    $this->load->view('header');
    $this->load->view($view, $data);
    $this->load->view('footer');
  }

  public function load_acc_forms($view, $data) {
    $this->session;
    $this->load->view('head', $data);
    $this->load->view($view, $data);
    $this->load->view('footer');
  }
}
