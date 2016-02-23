<?php

class Validate extends CI_Model {

  public function login() {
    $this->db->where('email', $this->input->post('email'));
    $this->db->where('password', $this->input->post('password'));
    $query = $this->db->get('users');
    if($query->num_rows() == 1) {
      $row = $query->row();
			$data = array(
        'id_user'   => $row->id_user,
				'username'  => $row->username,
				'email'     => $row->email,
				'id_rolle'  => $row->id_rolle,
        'avatar'    => $row->avatar,
        'validated' => TRUE
			);
			$this->session->set_userdata($data);
      $this->session->set_flashdata('message', 'Hi! Wellcome.');
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
    $this->session->set_flashdata('message', 'The account is successfully created. You can log in now.');
  }
}
