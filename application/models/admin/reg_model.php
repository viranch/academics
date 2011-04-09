<?php
class Reg_model extends CI_model{
  function courses_registered($userid){
    $query="select * from acad_stu_cou A,acad_courses B,acad_sem_list C where (status='unapproved' or status='grade_improvement') and A.course_id=B.course_id and A.sem_id=C.sem_id and user_id=".$userid;
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_batch($userid)
  {
    $query="select * from acad_batch where user_id=".$userid;
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_next_user($userid)
  {
    $query="select user_id from acad_users where status='active' and user_type='student' and user_id >".$userid." order by user_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
}
?>
