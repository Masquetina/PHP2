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

  public function load_forms($view, $data) {
    $this->session;
    $this->load->view('head', $data);
    $this->load->view('flashdata');
    $this->load->view($view, $data);
  }

  public function load_admin($view, $data) {
    $this->session;
    $this->load->view('head', $data);
    $this->load->view('header');
    $this->load->view($view, $data);
  }
}
