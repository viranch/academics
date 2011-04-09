<?php
class Lecture_model extends CI_model{
  function get_lectures($courseid){
    $query="select * from acad_lectures A,acad_teaching B where A.user_id=B.user_id and status='active' and A.course_id='".$courseid."' order by date";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_assignment($courseid)
  {
    $query="select * from acad_assig_create A,acad_teaching B where A.course_id='".$courseid."' and status='active' and B.course_id=A.course_id order by assignment_id";
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  }
  function submit_assignment($assignment_id,$faculty_id,$course_id,$filename)
  {
    $data = array('assignment_id' =>$assignment_id,
                  'faculty_user_id' =>$faculty_id,
                  'user_id' =>$this->session->userdata('user_id'),
                  'filename'=> $filename,
                  'submission_time'=>'0000'
                  );
    $this->db->insert('acad_assig_sub',$data);
  
  }
}
?>
