<?php

class Validate extends CI_Model {

  public function login() {
    $this->db->where('email', $this->input->post(trim(addslashes('email'))));
    $this->db->where('password', $this->input->post(trim(addslashes('password'))));
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
        $message = 'Hi ' . ucwords($data['username']) . '! Wellcome.';
  			$this->session->set_userdata($data);
        $this->session->set_flashdata('message', $message);
      } else {
        $message = 'Ops! Are You banned? Login is disabled.';
        $this->session->set_flashdata('message', $message);
      }
      return TRUE;
		} else {
      return FALSE;
    }
  }

  public function signup() {
    $this->db->where('email', $this->input->post(trim(addslashes('email'))));
    $this->db->where('password', $this->input->post(trim(addslashes('password'))));
    $query = $this->db->get('users');
    if($query->num_rows() == 0) {
      // UPISATI NOVOG KORISNIKA U TABELU users
      $message = 'The account is successfully created. You can log in now.';
      $this->session->set_flashdata('message', $message);
      return TRUE;
    } else {
      return TRUE;
    }
  }
}
