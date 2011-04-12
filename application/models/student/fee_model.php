<?php
class Fee_model extends CI_model{
  function get_fee($sem_id){
    $query="select * from acad_fee_structure A , acad_sem_list B where A.sem_id=B.sem_id and A.sem_id=".$sem_id." and user_id='".$this->session->userdata('user_id')."'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_sems()
  {
    $query="select semester,A.sem_id from acad_fee_structure A,acad_sem_list B where A.sem_id=B.sem_id and A.user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  
  }
}
?>
