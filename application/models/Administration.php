<?php

class Administration extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function get_users() {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('users.ban = 1');
    $this->db->order_by('users.ban_time');
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
    $this->db->join('flags', 'cards.id_card = flags.id_card');
    $query = $this->db->get();
    if($query->num_rows() != 0) {
      return $query->result();
    } else {
      return FALSE;
    }
  }

  public function delete_card($id_card, $id_user_author, $id_user_flager) {
    $data = array(
     'delete' => 1,
    );
    $this->db->where('id_card', $id_card);
    $query = $this->db->update('cards', $data);
    if($query) {
      $ban_time = date('Y-m-d');
      $data = array(
       'ban'      => 1,
       'ban_time' => $ban_time
      );
      $this->db->where('id_user', $id_user_author);
      $query = $this->db->update('users', $data);
      if($query) {
        return TRUE;
      }
    } else {
      return FALSE;
    }
  }

  public function unflag_card($id_card, $id_user_author, $id_user_flager, $id_flag) {
    $data = array(
     'flag' => 0,
    );
    $this->db->where('id_card', $id_card);
    $query = $this->db->update('cards', $data);
    if($query) {
      $this->db->where('id_flag', $id_flag);
      $this->db->delete('flags');
      if($query) {
        return TRUE;
      }
    } else {
      return FALSE;
    }
  }

  public function get_user($id_user) {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('users.id_user', $id_user);
    $query = $this->db->get();
    if($query) {
      $query = $query->result();
      return $query;
    }
  }
}
