<?php
class Admin_model extends CI_model{
  
  function offer_update()
  {
    $query="update acad_cou_offer A,acad_sem_list B set status='completed' where A.sem_id=B.sem_id and A.sem_id <".$this->input->post('semester_u')." and batch_year=".$this->input->post('batch_year_u')." and program='".$this->input->post('program')."'" ;
    $query = $this->db->query($query);
  }
  
  function chk_grade()
  {
    $query="select * from acad_cou_grad where grade='0'";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return 0;
     }
     else{
        return 1;
     }
  
  }
  function grade_points_calculation()
  {
    $query="select sum(credits),user_id,sem_id from acad_stu_cou A,acad_courses B where A.course_id=B.course_id and audit=0 and pass_course='no' group by user_id,sem_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function calculate()
  {
    $query="select * from  (select sum(gradepoints),user_id,sem_id from acad_cou_grad  group by sem_id,user_id) X,(select sum(credits),user_id,sem_id from acad_stu_cou A,acad_courses B where A.course_id=B.course_id and audit=0 and pass_course='no' group by user_id,sem_id) y where X.sem_id=y.sem_id and X.user_id=y.user_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function cpi ()
   {
     $query="select sum(grade_points_registered),sum(grade_points_earned),user_id from acad_sem_perform group by user_id";
     $query = $this->db->query($query);
      if($query->num_rows() > 0) {
         return $query->result_array();
      }
   }
  
  function earned()
  {
    $query="select sum(gradepoints),user_id,sem_id from acad_cou_grad group by sem_id,user_id";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  
  function course_offer()
  {
    $data=array('program'=>$this->input->post('program'),
      'batch_year'=>$this->input->post('batch_year'),
      'sem_id'=>$this->input->post('semester'),
      'course_id'=>$this->input->post('course'),
      'audit'=>$this->input->post('audit'),
      'slot_no'=>$this->input->post('slot_no'),
      'status'=>$this->input->post('status')
    );  
    $this->db->insert('acad_cou_offer',$data);
  
  }
  
  
  
  function update_password()
  {
    $user_id=$this->input->post('user_id');
    $password=$this->input->post('password');
    $query="update acad_users set password='".md5($password)."' where user_id=".$user_id;
    $query = $this->db->query($query);
    if($this->db->affected_rows()>0)  
       return  1;
    else
      return 0; 
    
  }
  
  function get_rand($length)
  {
      if($length>0) 
      { 
          $rand_id="";
          for($i=1; $i<=$length; $i++){
              mt_srand((double)microtime() * 1000000);
              $num = mt_rand(1,36);
              $rand_id .= $this->assign_rand_value($num);
            }
      }
      return $rand_id;
  } 
  
  function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}
  
  
  
  
  function get_slots_courses()
  {
    $program=$this->input->post('program');
    $batch_year=$this->input->post('batch_year');
    $query="select * from acad_cou_offer where status='active' and program='".$program."' and batch_year=".$batch_year." order by slot_no"; 
    $query = $this->db->query($query);
    if($query->num_rows() > 0) {
        return $query->result_array();
    }
  }
  
  
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
  function timetable()
  {
    $venue= $this->input->post('venue');
    $start_time=$this->input->post('start');
    $end_time=$this->input->post('end');
    $slot=$this->input->post('slot');
    for ($i = 0; $i < count($venue); $i++) {
      if($venue[$i]!='' and $start_time[$i]!='' and $end_time[$i]!='' and $slot[$i]!=''){
    
        $data = array('program' =>$this->input->post('program'),
                      'batch_year'=>$this->input->post('batch_year'),
                      'start_time'=>$start_time[$i],
                      'end_time'=>$end_time[$i],
                      'day'=>$this->input->post('day'),
                      'slot_no'=>$slot[$i],
                      'type'=>'lecture'
                    );
        $this->db->insert('acad_timetable',$data);
        
      }
    }
  
  }
  function show_timetable()
  {
    $query="select * from acad_timetable A,acad_cou_offer B where A.program=B.program and A.batch_year=B.batch_year and A.slot_no=B.slot_no and  A.program='".$this->input->post('program')."' and A.batch_year=".$this->input->post('batch_year');
    $query = $this->db->query($query);  
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
	function get_courses_offered($batch,$semid, $program){
	$query = "select * from acad_cou_offer where batch_year='$batch' and sem_id='$semid' and program= '$program'";
	$query = $this->db->query($query);
		if($query->num_rows() > 0){
				return $query->result_array();
		}   
			return null;
  }
  
  function get_semester($semid){
  $query = "select semester from acad_sem_list where sem_id='$semid'";
  $query = $this->db->query($query);
		if($query->num_rows() > 0){
				$array = $query->result_array();
				foreach($array as $row){
					$semester = $row['semester'];
					return $semester;
				}
		}   
			return null;
  }
  
  

}
?>
