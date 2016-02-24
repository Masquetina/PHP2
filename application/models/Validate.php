<?php

class Validate extends CI_Model {

  public function login() {
    $this->db->where('email', $this->input->post('email'));
    $this->db->where('password', $this->input->post('password'));

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
        $message = 'Ups! Are You banned? Logging is disabled.';
        $this->session->set_flashdata('message', $message);
      }
      return TRUE;
		}
  }

  public function signup() {
    $this->db->where('email', $this->input->post('email'));
    $this->db->where('password', $this->input->post('password'));
    $query = $this->db->get('users');
    if($query->num_rows() == 0) {
    } else {

    }
    // IF SUCCESS
    $message = 'The account is successfully created. You can log in now.';
    $this->session->set_flashdata('message', $message);
  }
}
