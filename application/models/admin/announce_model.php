<?php
class announce_model extends CI_model{
  function get_program(){
    $query="select program from acad_batch group by program";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_year()
  {
    $query="select batch_year from acad_batch group by batch_year";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  
  }
  function announce_courses()
  {
    $query="select course_id,course_name from acad_courses";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_announce()
  {
    $query="select * from acad_announce";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function insert()
  {
    $program= $this->input->post('program');
    $batch_year=$this->input->post('batch_year');
    $course_id=$this->input->post('course');
    $message=$this->input->post('message');
    if($batch_year==''){
      $batch_year=0;
    }
    $data = array('program' =>$program,
                  'batch_year'=>$batch_year,
                  'course_id'=>$course_id,
                  'message'=>$message,
                  'sent_date'=>date('Y-m-d'),
                  'sent_time'=>time(),
                  'user_id'=>$this->session->userdata('user_id'));
    if(!$this->db->insert('acad_announce',$data))
      echo "fine";
  }
  function delete()
  {
    $data=$this->input->post('announce');
    foreach ($data as $row) {
      $query="delete from acad_announce where id=".$row;
      $query = $this->db->query($query);
    }
  
  }
  function insert_restrictions()
  {
    $this->input->post('sem_id');
    $data = array('program' =>$this->input->post('program'),
                  'sem_id'=>$this->input->post('sem_id'),
                  'min_credits'=>$this->input->post('min_credits'),
                  'min_courses'=>$this->input->post('min_courses'),
                  'opening_date'=>$this->input->post('opening_date'),
                  'credits'=>$this->input->post('max_credits'),
                  'courses_number'=>$this->input->post('max_courses'),
                  'deadline'=>$this->input->post('deadline'));
    $this->db->insert('acad_restrictions',$data);
  
  }
  function delete_restrictions()
  {
    $program=$this->input->post('program');
    $sem_id=$this->input->post('sem_id');
    $query="delete from acad_restrictions where program='".$program."'"." and sem_id=".$sem_id;
    $query = $this->db->query($query);
    
  }
  function get_acad_restrictions()
  {
    $query="select * from acad_restrictions A,acad_sem_list B where A.sem_id=B.sem_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function update_restrictions()
  {
    $array=array('credits'=>$this->input->post('max_credits'),
      'courses_number'=>$this->input->post('max_courses'),
      'min_courses'=>$this->input->post('min_courses'),
      'min_credits'=>$this->input->post('min_credits'),
      'opening_date'=>$this->input->post('opening_date'),
      'deadline'=>$this->input->post('deadline'));
    $this->db->update('acad_restrictions',$array);
  
  }
  function is()
  {
    $query="select * from acad_restrictions where program='".$this->input->post('program')."' and sem_id=".$this->input->post('sem_id');
    $query = $this->db->query($query);
    $data=1;
    if($query->num_rows() > 0) {
        return  $data;
    }

  }
  function sem_list()
  {
    $query="select * from acad_sem_list";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_faculty()
  {
    $query="select * from acad_users where user_type='faculty' and status='active'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  
  }
  function course_assign()
  {
    $data = array('course_id' =>$this->input->post('course_id'),
      'user_id'=>$this->input->post('user_id'),
      'program'=>$this->input->post('program'),
      'batch_year'=>$this->input->post('batch_year') );
    $query="update"
    
  
  }
}
?>
