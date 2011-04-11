<?php
class Registration_model extends CI_model{
  function get_unapproved(){
    $query="select * from acad_stu_cou where (status='unapproved' or status='grade_improvement') and  user_id='".$this->session->userdata('user_id')."'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
       return 1;
     }
     else {
       return 0;
     }
  }
  function delete_unapproved()
  {
    $query="delete from acad_stu_cou where user_id='".$this->session->userdata('user_id')."' and status='unapproved'";
    $query = $this->db->query($query);
  }
  function register($semid,$slot_no,$course_id,$audit)
  {
  
    $data=array('user_id'=>$this->session->userdata('user_id'),
                'sem_id'=>$semid,
                'status'=>'unapproved',
                'slot_no'=>$slot_no,
                'course_id'=>$course_id,
                'registered_date'=>'0000-00-00',
                'audit'=>$audit   
              );
    
    if($this->db->insert('acad_stu_cou',$data))
      echo "success";
  
  }
  function slotno($courseid)
  {
    $batch=$this->get_batch();
    $query="select slot_no from acad_cou_offer where program='".$batch['0']['program']."' and course_id='".$courseid."' and batch_year=".$batch['0']['batch_year'];
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }    
  
  }

  function get_batch()
  {
    $query="select * from acad_batch A,acad_sem_list B where user_id=".$this->session->userdata('user_id')." and A.present_sem_id=B.sem_id";
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  }
  function changeimprovement()
  {
    $query="update acad_stu_cou set status='completed' where status='grade_improvement' and user_id='".$this->session->userdata('user_id')."'";
    $query = $this->db->query($query);
  }
  function get_deadline($batch,$sem='')
  {
    $sem_id=$this->get_sem_offered($batch);
    $query="select * from acad_restrictions where program='".$batch['0']['program']."' and sem_id=".$sem_id[0]['sem_id'];
    if($sem!='')
      $query="select * from acad_restrictions where program='".$batch['0']['program']."' and sem_id=".$sem;
  
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  }
  function get_credits($courseid)
  {
    $query="select credits from acad_courses where course_id='".$courseid."'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_sem_offered($batch)
  {
    $query="select A.sem_id,semester from acad_cou_offer A,acad_sem_list B where status='active' and A.sem_id=B.sem_id and program='".$batch['0']['program']."' group by semester"; 
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_UGC_approval()
  {
    $query="select * from acad_stu_cou where user_id=".$this->session->userdata('user_id')." and status='unapproved'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return 0;
     }
     else{
        return 1;
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
  function is_grade_improvement($course_id)
  {
    $query="select * from acad_stu_cou where (status='grade_improvement' or status='incomplete') and course_id='".$course_id."' and user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return 1;
    }
    else{
        return 0;
    }
  
  }
  function drop($batch)
  {
    $sem_id=$this->ongoing();
    $min=$this->get_deadline($batch,$sem_id[0]['sem_id']);
    $min_courses=$min[0]['min_courses'];
    if(($this->input->post('count')-count($this->input->post('drop')))< $min_courses){
      echo "Minimum_credits have to be".$min_courses;
    }
    else{
      $drop=$this->input->post('drop');
      if(isset($drop)){
      foreach ($drop as $row) {
        $query="delete from acad_stu_cou where (status='ongoing' or status='incomplete') and course_id='".$row."' and user_id=".$this->session->userdata('user_id');
        $query = $this->db->query($query);
        if($this->is_grade_improvement($row)!=1){ 
          $query="delete from acad_cou_grad where course_id='".$row."' and user_id=".$this->session->userdata('user_id');
          $query =$this->db->query($query);
        }
        $query="update acad_stu_cou set status='completed' where status='grade_improvement' and course_id='".$row."' and user_id=".$this->session->userdata('user_id');
        $query = $this->db->query($query);
      }
      }
    }
  
  }

  
}
?>

