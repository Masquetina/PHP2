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

  public function create_card($filename) {
    $id_user = $this->session->userdata('id_user');
    $author = $this->input->post(trim(addslashes('author')));
    $quote = $this->input->post(trim(addslashes('quote')));
    $description = $this->input->post(trim(addslashes('description')));
    $color = $this->input->post('color');
    $data = array(
      'id_user' => $id_user,
      'author'  => $author,
      'quote'   => $quote,
      'info'    => $description,
      'img'     => $filename,
      'color'   => 'style = "background-color:' . $color . '"',
      'likes'   => 0,
      'flag'    => 0,
      'delete'  => 0,
    );
    $query = $this->db->insert('cards', $data);
    if($query) {
      $message = 'You created a new card.';
      $this->session->set_flashdata('message', $message);
      return TRUE;
    } else {
      $warning = 'Something went wrong!';
      $this->session->set_flashdata('warning', $warning);
      return FALSE;
    }
  }

  public function like_card($id_card) {
    $this->db->where('id_card', $id_card);
    $this->db->set('likes', 'likes + 1', FALSE);
    $query = $this->db->update('cards');
    if($query) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function create_like($id_card, $id_user) {
    $id_user_flager = $this->session->userdata('id_user');
    $data = array(
      'id_card' => $id_card,
      'id_user' => $id_user
    );
    $query = $this->db->insert('likes', $data);
    if($query) {
      return TRUE;
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

  public function flag_card($id_card) {
    $data = array(
     'flag' => 1,
    );
    $this->db->where('id_card', $id_card);
    $query = $this->db->update('cards', $data);
    if($this->db->affected_rows() != 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function create_flag($id_card, $id_user_author) {
    $id_user_flager = $this->session->userdata('id_user');
    $data = array(
      'id_card'        => $id_card,
      'id_user_author' => $id_user_author,
      'id_user_flager' => $id_user_flager
    );
    $query = $this->db->insert('flags', $data);
    if($query) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
