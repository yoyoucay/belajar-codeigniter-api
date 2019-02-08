<?php

class User extends CI_Model
{
    public function save()
    {
      $data = [
        'email' => $this->input->post('email'),
        'password' =>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      ];

      if($this->db->insert('users', $data)){
        return [
            'id'      => $this->db->insert_id(),
            'success' => true,
            'message' => 'Data berhasil dimasukkan'
        ];
      }
    }

  public function get($key = null, $value = null)
  {

    if($key != null){
      $query = $this->db->get_where('users', array($key => $value));
      return $query->row();
    }

    $query = $this->db->get('users');
    return $query->result();
  }

}
