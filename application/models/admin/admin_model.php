<?php
class Admin_model extends CI_model{
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
