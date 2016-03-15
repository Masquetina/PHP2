<?php

class Validate extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function login() {
    $this->db->where('email', trim(strtolower($this->input->post('email'))));
    $this->db->where('password', trim(md5($this->input->post('password'))));
    $query = $this->db->get('users');
    if($query->num_rows() == 1) {
      $row = $query->row();
      $ban = $row->ban;
      if($ban == 0) {
        $data = array(
          'id_user'   => $row->id_user,
  				'username'  => $row->username,
  				'email'     => $row->email,
  				'id_rolle'  => $row->id_rolle,
          'avatar'    => $row->avatar,
          'validated' => TRUE
  			);
  			$this->session->set_userdata($data);
        $message = 'Hi ' . ucwords($data['username']) . '! Wellcome.';
        $this->session->set_flashdata('message', $message);
        return TRUE;
      } else {
        $warning = 'Ops! Are You banned? Login is disabled.';
        $this->session->set_flashdata('warning', $warning);
        return TRUE;
      }
		} else {
      return FALSE;
    }
  }

  public function signup() {
    $username = trim(strtolower($this->input->post('username')));
    $email = trim($this->input->post('email'));
    $password = trim(md5($this->input->post('password')));
    $data = array(
      'username' => $username,
      'email'    => $email,
      'password' => $password,
      'avatar'   => 'avatar.jpg',
      'id_rolle' => 1,
      'ban'      => 0,
    );
    $query = $this->db->insert('users', $data);
    if($query) {
      return TRUE;
    }
  }
}
