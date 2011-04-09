<?php
class profile extends CI_model{
  function get_profile(){
    $user = $this->session->user_data('user_id');
    $this->db->where('user_id',$user);
    $query = $this->db->get('acad_users');
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
}
?>
