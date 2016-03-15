<?php

class Menu extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function get_social() {
    $this->db->select('*');
    $this->db->from('social_links');
    $query = $this->db->get();
    if($query->num_rows() != 0) {
      return $query->result();
    } else {
      return FALSE;
    }
  }
}
