<?php
class Student_model extends CI_model{
  
  /*
   * retruns data of batch,year,present_sem_id,group_id
   */
  function get_batch()
  {
    $query="select * from acad_batch A,acad_sem_list B where user_id=".$this->session->userdata('user_id')." and A.present_sem_id=B.sem_id";
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
    else {
      echo "Sorry the user doesnot seem to be a student";
    }

    /*$user = $this->session->userdata('user_id');
    $this->db->where('user_id',$user);
    $query = $this->db->get('acad_batch',1);
     if($query->num_rows() > 0) {
       return $query->result_array();
     }
     else {
      echo "The student is not a valid student";
     }*/
  }
  /**
   *recieves from controller batch data and retrieves time table
   *data returned is courseid,start_time,endtime,type 
   */
  
  function get_timetable($data)
  {
    $query = "select A.course_id,T.start_time,T.end_time,T.type from acad_stu_cou A,acad_timetable T 
              where A.slot_no=T.slot_no AND 
              status='ongoing' AND 
              user_id=".$this->session->userdata('user_id')." AND 
              day='".date("D")."' AND 
              T.program='".$data['0']['program']."' AND 
              T.batch_year=".$data['0']['batch_year']; 
     $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
     else {
       echo "No timetable is bieng set up";
     }
  }
  
  
  /*
   *Gets the present courses and data returned is
   * just the courseid 
   */
  function get_present_courses()
  {
    $query="select course_id from acad_stu_cou where status ='ongoing' AND user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
     }
    else {
      echo "No course is registered";
    }
  }
  
  
  /*
   *all data from acad_announcemts for a user
   */
  function get_announcements($batch,$number=null)
  {
    
    $courses = $this->get_present_courses();
    //$query = "select * from acad_announce where (program='".$batch[0]['program']."' OR program='NULL') and (batch_year=".$batch['0']['batch_year']." OR batch_year = 0) and (course_id = ''";
    
    $query = "select * from acad_announce A,acad_users B where (program='".$batch[0]['program']."' OR program='NULL') and (batch_year=".$batch['0']['batch_year']." OR batch_year = 0) and (course_id = ''";

    if(!empty($courses))
    {
      foreach ($courses as $row) {
        $query = $query ." or course_id='" .$row['course_id']."'";
      }
      //$query= $query.") order by sent_date";
      $query= $query.") and A.user_id=B.user_id order by sent_date";
      //echo "{$query}";
      if(empty($number))
        $query = $this->db->query($query);
      else
        $query = $this->db->query($query,$number);
      
      if($query->num_rows() > 0) {
        return $query->result_array();
      }
      else{
        echo "No announcements";
      }
    }
  
  }  
  
  
  /*
   *Gets all data from the acad_stu_profile table
   */
  function get_student_profile()
  {
    $user=$this->session->userdata('user_id');
    $this->db->where('user_id',$user);
    $query = $this->db->get('acad_stu_profile',1);   
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
    else{
      echo "The profile for the user is not yet set";
    }
  }
  
  
  /*
   *The data of present courses and the ids of courses too
   */
  function get_sems_student()
  {
    $query ="select semester,sem_id from acad_sem_perform A,acad_sem_list B where B.sem_id=A.sem_id and user_id='".$this->session->userdata('user_id')."' group by semester";
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  }
  
  
  /*
   *get courses given a sem id for a user also gets grades and gradepoints 
   */
  function get_courses_ofsem($sem_id)
  {
    $user_id=$this->session->userdata('user_id');
    $query="select status,A.course_id,present_year,B.grade,C.course_name,D.grade_value from"; 
    $query=$query." acad_stu_cou A,acad_cou_grad B,acad_courses C,acad_grade D ";
    $query=$query."where A.user_id=B.user_id and A.course_id=B.course_id and ";
    $query=$query."A.sem_id=".$sem_id." and C.course_id=A.course_id and B.grade=D.grade and A.user_id='".$user_id."'";
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
    else {
      echo "Sorry no courses for the given semid";
    }
  }
  
  
  
  /*
   *Gets every thing from acad_important_dates
   */
  function get_important_dates($number=null)
  {
    $query="select * from acad_important_dates where end_date > '".date("Y-m-d")."' order by start_date";
    if(empty($number))
      $query = $this->db->query($query);
    else
      $query = $this->db->query($query,$number);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
    else {
      echo "Sorry no important dates setup";
    }  
  
  }
  
  
  
  
  function get_present_semester(){
    
  }

}
?>
