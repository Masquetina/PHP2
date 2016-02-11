<?php

class Cards extends CI_Model {

  public function get_all_cards() {

    $query = $this->db->get('cards');
    return $query->result();
  }
}
