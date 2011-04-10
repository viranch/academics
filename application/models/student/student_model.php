<?php
class Student_model extends CI_model{
  function get_drop_courses()
  {
    $query=" select * from acad_stu_cou A,acad_courses B,acad_sem_list C where (status='ongoing' or status='grade_improvement') and user_id='".$this->session->userdata('user_id')."' and A.course_id=B.course_id and A.sem_id=C.sem_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  
  
  function get_user_profile()
  {
    $query="select * from acad_users where user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  
  
  function get_unapproved()
  {
    $query="select * from acad_stu_cou A,acad_courses B  where user_id='".$this->session->userdata('user_id')."' and (status='unapproved' or status='grade_improvement') and A.course_id=B.course_id";
    
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
         return $query->result_array();
    }
  }
  
  
  
  function unapproved_exist()
  {
    $query="select * from acad_stu_cou where user_id='".$this->session->userdata('user_id')."' and status='unapproved'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return 1;
     }
     else {
       return 0;
     }

  }
  
  
  
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
    
  }
  
  
  /*
   *Gets the present courses and data returned is
   * just the courseid 
   */
  
  function get_present_courses()
  {
    $query="select A.course_id,course_name from acad_stu_cou A,acad_courses B  where A.course_id=B.course_id and status ='ongoing' AND user_id=".$this->session->userdata('user_id');
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  
  /*
   *get the deadlines of assignments 
   */
  
  function get_deadlines($num=1)
  {
    $courses=$this->get_present_courses();
    if(isset($courses)){
      $query="select * from acad_assig_create where course_id='".$courses['0']['course_id']."'";
      foreach ($courses as $row) {
        $query=$query." or '".$row['course_id']."'";
      }  
      $query = $this->db->query($query);
      if($query->num_rows() > 0) {
        return $query->result_array();
      }
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
   *This actually gets the courses which are approved
   */
  
  function get_sems_student()
  {
    $query ="select semester, A.sem_id from acad_sem_perform A,acad_sem_list B where B.sem_id=A.sem_id and user_id='".$this->session->userdata('user_id')."' group by semester";
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
  
  
  
  /*get the course registration status of each semester
   * it gets all the acad_stu_cou table
   * this constains all the semster which are of status unregistered incomplete completed ongoing
   */
  
  function get_sems_status (){
    $user_id=$this->session->userdata('usr_id');
    $query="select semester,status from acad_stu_cou A,acad_sem_list B where A.sem_id=B.sem_id and A.user_id=".$user_id." group by status order by A.sem_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }

  /*
   *This function gets the list of all semesters offered to a student
   */
  
  function get_sem_offered($batch)
  {
    if(isset($batch)){
    $query="select semester from acad_cou_offer A,acad_sem_list B where A.sem_id=B.sem_id and program='".$batch['0']['program']."' and batch_year='".$batch['0']['batch_year']."' and status='active' group by semester";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
    }
    else {
      echo "Sorry the batch data is not sent to this function";
    }
  
  }
  /*
   *Get all the data regarding the courses offered to the user
   */
  function get_all_courses_offered($batch)
  {
    $query="select * from acad_cou_offer A,acad_sem_list B,acad_courses C where A.sem_id=B.sem_id and A.course_id=C.course_id and program='".$batch['0']['program']."' and A.status='active' and batch_year=".$batch['0']['batch_year'] ." order by slot_no";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
    
  }
  /*
   * Get the backlog courses
   */
  
  function get_backlog($batch)
  {
    $user_id=$this->session->userdata('user_id');
    $query="select * from acad_stu_cou A,acad_sem_list B,acad_courses C  where status='incomplete' and A.sem_id=B.sem_id and A.course_id=C.course_id and A.user_id='".$user_id."'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  
  /*
   *Get the grade improvement courses
   */

  function get_grade_improvement()
  {
    $user_id=$this->session->userdata('user_id');
    $query="select * from acad_stu_cou A ,acad_cou_grad B,acad_grade C,acad_courses D where B.grade=C.grade and A.course_id=B.course_id and grade_value <= 5 and (status ='completed' or status='grade_improvement') and A.user_id=B.user_id and A.course_id=D.course_id and A.user_id='".$user_id."'";
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  
  }
  function get_course_performance($semid)
  {
    $query="select * from acad_cou_grad A,acad_courses B,acad_sem_list C where A.sem_id=C.sem_id and  A.sem_id=".$semid." and user_id='".$this->session->userdata('user_id')."' and A.course_id=B.course_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_sem_performance($semid)
  {
    $query="select * from acad_sem_perform where user_id=".$this->session->userdata('user_id')." and sem_id=".$semid;
    $query = $this->db->query($query);
  
     if($query->num_rows() > 0) {
       return $query->result_array();
     }
  
  }
  function elective_status()
  {
    $query="select * from acad_stu_cou A,acad_courses B where A.course_id=B.course_id and user_id=". $this->session->userdata('user_id');
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
   }

}
?>
