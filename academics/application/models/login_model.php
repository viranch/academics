<?php
class login_model extends CI_model{
  
  function validateuser(){
    $this->db->where('user_id',$this->input->post('username'));
    $this->db->where('password',$this->input->post('password'));
    $query = $this->db->get('acad_users');
    if($query->num_rows() == 1) {
        return $query->result_array();
    }
  }
  function update_passwd()
  {
    $user_id=$this->session->userdata('user_id');
    $new_password=$this->input->post('new_password');
    $query="UPDATE acad_users SET password='".md5($new_password)."' WHERE user_id=".$user_id; 
    return $this->db->query($query);
  }
  
}
?>
