<?php
class Admin_model extends CI_model{
  function get_eligibility(){
    $query="select * from acad_permissions where user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  }
  function get_details_id($id)
  {
    $query="select * from acad_users where status='active' and user_id=".$id;
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_details_name($name)
  {

    $query="select * from acad_users where candidate_name LIKE '".$name."%' and status='active'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }

  }
  function delete_userid($userid)
  {
    $query="update acad_users set status='deleted' where user_id=".$userid ." and status='active'";
    $query = $this->db->query($query);
  }
  function getback_userid($userid)
  {
    $query="update acad_users set status='active' where user_id=".$userid ." and status='deleted'";
    $query = $this->db->query($query);
  }
  function get_details_id_r($id)
  {
    $query="select * from acad_users where status='deleted' and user_id=".$id;
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_details_name_r($name)
  {

    $query="select * from acad_users where candidate_name LIKE '".$name."%' and status='deleted'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_stu_details($uid){
		$query = "select * from acad_users where user_id=$uid";
		$query = $this->db->query($query);
		if($query->num_rows() > 0){
				//echo $u[1];
				return $query->result_array();
		}   
			return null;
	}

}
?>
