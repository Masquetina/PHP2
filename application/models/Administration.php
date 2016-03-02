<?php

class Administration extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function get_users() {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('users.ban = 1');
    $query = $this->db->get();
    if($query->num_rows() != 0) {
      return $query->result();
    } else {
      return FALSE;
    }
  }

  public function get_cards() {
    $this->db->select('*');
    $this->db->from('cards');
    $this->db->where('cards.delete = 0');
    $this->db->where('cards.flag = 1');
    $this->db->join('users', 'cards.id_user = users.id_user');
    $this->db->join('flags', 'users.id_user = flags.id_user_author');
    $query = $this->db->get();
    if($query->num_rows() != 0) {
      return $query->result();
    } else {
      return FALSE;
    }
  }
}
