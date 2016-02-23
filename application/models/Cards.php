<?php

class Cards extends CI_Model {

  public function get_all_cards() {
    $this->db->select('*');
    $this->db->from('likes');
    $this->db->join('cards', 'likes.id_card = cards.id_card', 'right');
    $this->db->where('cards.delete = 0');
    $this->db->order_by('cards.id_card', 'desc');
    $this->db->join('users', 'cards.id_user = users.id_user');
    $query = $this->db->get();
    return $query->result();
  }
}
