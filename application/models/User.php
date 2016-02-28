<?php

class User extends CI_Model {

  public function get_profile($username) {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('users.username', $username);
    $this->db->join('cards', 'cards.id_user = users.id_user');
    $this->db->where('cards.delete = 0');
    $this->db->order_by('cards.id_card', 'desc');
    $query = $this->db->get();
    if($query->num_rows() != 0) {
      return $query->result();
    } else {
      // OVDE REDIREKTOVATI NA 404
      redirect('/');
    }
  }
}
