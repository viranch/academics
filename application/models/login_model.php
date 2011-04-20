<?php
class login_model extends CI_model{
  
  function validateuser(){
    $this->db->where('user_id',$this->input->post('username'));
    $this->db->where('password',md5($this->input->post('password')));
    $query = $this->db->get('acad_users');
    if($query->num_rows() == 1) {
        return $query->result_array();
    }
  }
  function update_passwd()
  {
    $user_id=$this->session->userdata('user_id');
    $old_password=$this->input->post('old_password');
    $query="select * from acad_users where password='".md5($old_password)."' and user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
    if($query->num_rows() == 0) {
        return 0;
    }
    $new_password=$this->input->post('new_password');
    $query="UPDATE acad_users SET password='".md5($new_password)."' WHERE user_id=".$user_id; 
    $query=$this->db->query($query);
    return 1;
  }
  
}
?>
