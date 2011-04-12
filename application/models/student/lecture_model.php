<?php
class Lecture_model extends CI_model{
  function get_lectures($courseid){
    $batch=$this->get_batch();
    $query="select * from acad_lectures A,acad_teaching B where A.user_id=B.user_id and status='active' and A.course_id='".$courseid."' and program='".$batch[0]['program']."' and batch_year=".$batch[0]['batch_year']." order by date desc";
      $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_assignment($courseid)
  {
    $batch=$this->get_batch();
    $query="select * from acad_assig_create A,acad_teaching B where A.course_id='".$courseid."' and status='active' and B.course_id=A.course_id and A.user_id=B.user_id and program='".$batch[0]['program']."' and batch_year=".$batch[0]['batch_year']."  order by assignment_id";
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
  function get_batch()
  {
    $semid=$this->ongoing();
    if(!empty($semid)){
    $query="select * from acad_batch A,acad_sem_list B where user_id=".$this->session->userdata('user_id')." and B.sem_id=".$semid[0]['sem_id'];
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
    }

  }
  function ongoing()
  {
    $query="select sem_id from acad_stu_cou where status='ongoing' and user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
}
?>
