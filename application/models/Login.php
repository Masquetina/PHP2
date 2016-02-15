<?php

class Login extends CI_Model {

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
        'validated' => TRUE
			);
			$this->session->set_userdata($data);
			return true;
		} else {
		  return false;
    }
  }

  public function signup() {

  }
}
