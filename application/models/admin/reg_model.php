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
  function get_sem_registered($userid,$status)
  {
    $query="select sem_id from acad_stu_cou where user_id=".$userid." and status='".$status."' group by sem_id";
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  }
 function get_regcourses($userid)
  {
    $query="select * from acad_stu_cou A,acad_courses B where A.course_id=B.course_id and user_id=".$userid." and (status='unapproved' or status='grade_improvement')";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function pre($userid,$sem_id)
  {
    $courses=$this->get_regcourses($userid);  
    $query="update acad_stu_cou set status='completed' where status='ongoing' and user_id=".$userid;
    $query = $this->db->query($query);
    $query="update acad_stu_cou set status='ongoing' where (status='unapproved' or status='grade_improvement')  and user_id=".$userid;
    $query = $this->db->query($query);
    if(isset($courses)){
    $total=0;  
    foreach ($courses as $row) {
      $total=$total+$row['credits'];
      $data=array();
      $data = array('user_id' =>$userid,
                    'course_id'=> $row['course_id'],
                    'sem_id'=>$sem_id[0]['sem_id']);
      $this->db->insert('acad_cou_grad',$data);
    }}
    $data=array();
    $data=array('user_id'=>$userid,
                'sem_id'=>$sem_id[0]['sem_id'],
                'credits_earned'=>$total);
    $this->db->insert('acad_sem_perform',$data);
          
  }
  function approve($userid)
  {
    $sem_id1=$this->get_sem_registered($userid,'unapproved');
    $sem_id2=$this->get_sem_registered($userid,'ongoing');
    if($sem_id1==$sem_id2){
      echo "post";
    }
    else{
      $this->pre($userid,$sem_id1);
    }
  }

}
?>
