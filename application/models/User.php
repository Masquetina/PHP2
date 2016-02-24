<?php

class User extends CI_Model {

  public function get_profile($id_user) {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('users.id_user', $id_user);
    $this->db->join('cards', 'cards.id_user = users.id_user');
    $this->db->where('cards.delete = 0');
    $this->db->order_by('cards.id_card', 'desc');
        $query = $this->db->get();
    return $query->result();
  }
}
