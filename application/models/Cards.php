<?php

class Cards extends CI_Model {

  public function get_all_cards() {

    $this->db->select('*');
    $this->db->from('likes');
    //  FOR THE My Profile PAGE:
    //  $this->db->join('users', 'cards.id_user = users.id_user');
    //  $this->db->join('users', 'id_user', 'inner');
    $this->db->join('cards', 'likes.id_card = cards.id_card', 'right');
    $this->db->order_by('cards.id_card', 'desc');
    $query = $this->db->get();

    return $query->result();
  }
}
