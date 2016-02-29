<?php

class Cards extends CI_Model {

  function __construct() {
    parent::__construct();
   }

  public function get_all_cards() {
    $this->db->select('*');
    $this->db->from('cards');
    $this->db->where('cards.delete = 0');
    $this->db->order_by('cards.id_card', 'desc');
    $this->db->join('users', 'cards.id_user = users.id_user');
    $query = $this->db->get();
    return $query->result();
  }
}
