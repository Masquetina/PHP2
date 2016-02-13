<?php

class Cards extends CI_Model {

  public function get_all_cards() {

    $this->db->select('*');
    $this->db->from('cards');
    $this->db->order_by("id_card", "desc");
    $query = $this->db->get();

    return $query->result();
  }
}
