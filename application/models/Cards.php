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
    $this->db->join('users', 'cards.id_user = users.id_user', 'left');
    $query = $this->db->get();
    if($query->num_rows() != 0) {
      return $query->result();
    } else {
      return FALSE;
    }
  }

  public function delete_card($id_card) {
    $data = array(
     'delete' => 1,
    );
    $id_user = $this->session->userdata('id_user');
    $this->db->where('id_user', $id_user);
    $this->db->where('id_card', $id_card);
    $query = $this->db->update('cards', $data);
    if($this->db->affected_rows() != 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
