<?php
class Faculty_model extends CI_model{
	
	function get_present_courses(){
		$query = " SELECT a.course_id , a.program ,a.batch_year FROM acad_teaching a where a.user_id = {$this->session->userdata('user_id')} and a.status = 'active' order by 'batch_year' " ;
		$query = $this->db->query($query);
		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		else {
			echo null;
		}
	}
	
	function get_batches(){
		$query = "select distinct batch_year from acad_batch";
		$query = $this->db->query($query);
		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		else {
			echo null;
		}	
	} 
	function get_upcoming_lectures(){
		$day = date('D');
		$query = " select  DISTINCT ti.start_time, ti.end_time, co.course_name, l.venue , c.course_id from acad_courses co , acad_stu_cou c,acad_teaching t,acad_timetable ti, acad_lect_venue l  where t.user_id={$this->session->userdata('user_id')} and t.course_id = c.course_id and c.slot_no = ti.slot_no and c.course_id = co.course_id and  l.course_id=co.course_id and ti.day ='{$day}' order by 'ti.start_time'";
        $query = $this->db->query($query);
		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		else {
			return null;
		}
	}
	
	function get_announcements(){
		$query ="select  a.user_id, a.message , u.candidate_name  from  acad_announce a, acad_users u  where program ='' and batch_year='0' and course_id ='' and u.user_id = a.user_id";
		$query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
	}
	
	function get_present_btech_courses(){
		$query = " SELECT a.course_id , a.batch_year , a.program FROM acad_teaching a ,acad_courses c where a.user_id = {$this->session->userdata('user_id')} and a.status = 'active' and a.course_id=c.course_id order by 'program' asc,  'batch_year' asc" ;
        $query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return null;
	}
	
	function get_present_mtech_courses(){
		$query = " SELECT a.course_id ,a.batch_year FROM acad_teaching a where a.user_id = {$this->session->userdata('user_id')} and a.status = 'active' and a.program = 'Mtech' order by 'batch_year' " ;
        $query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return null;
	}
	
	function get_assignmentdeadlines(){
		$query ="select a.course_id , a.file , a.deadline, a.description from acad_assig_create a where a.user_id ={$this->session->userdata('user_id')}"; 
		 $query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return null;
	}
	

    function get_stu_list($cid){
		$query = "select a.pass_course, c.audit, c.user_id, g.marks_insem1 , g.marks_insem2, g.marks_endsem, g.marks_misc, g.marks_effective, g.grade , g.course_id , g.sem_id from acad_stu_cou c, acad_courses a, acad_cou_grad g where c.course_id='{$cid}' and a.course_id = c.course_id and a.course_id = g.course_id and
		c.course_id = g.course_id and c.user_id=g.user_id and c.status ='ongoing' and g.sem_id=c.sem_id ";
		 $query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return null;
	}

	function insertgrades($cid){
		$list = $this->get_stu_list($cid);
		foreach($list as $row){
			//echo $row['user_id'];
			$user_id = $row['user_id'];
			$sem_id  = $row['sem_id'];
			$course_id = $row['course_id'];
			$insem1name= "insem1_".$row['user_id'];
			$insem2name= "insem2_".$row['user_id'];
			$endsemname= "endsem_".$row['user_id'];
			$miscname  = "misc_".$row['user_id'];
			$effectivename = "effective_" .$row['user_id'];
			$gradename     = "grade_". $row['user_id'];
			$insem1 = $this->input->post($insem1name);
			$insem2 = $this->input->post($insem2name);
			$endsem = $this->input->post($endsemname);
			$misc   = $this->input->post($miscname);
			$effective = $this->input->post($effectivename);
			$grade = $this->input->post($gradename);
			$grade = strtoupper($grade);
			$qry1 = "select credits from acad_courses where course_id='$course_id'";
			$qry1= $this->db->query($qry1);
			$credits = 0;
			$query ="";
			if($qry1->num_rows() == 1){
				foreach($qry1->result_array() as $row1)
					$credits = $row1['credits'];
				}
			$qry = "select grade_value from acad_grade where grade='$grade'";
			$qry = $this->db->query($qry);
			if($qry->num_rows() == 1){
				foreach($qry->result_array() as $row2)
					$val = $row2['grade_value'];
					$val = $val * $credits ; 
					$query = "update acad_cou_grad set gradepoints='$val' , marks_insem1='$insem1' , marks_insem2='$insem2' , marks_endsem='$endsem' , marks_misc ='$misc' , marks_effective='$effective' , grade ='$grade' where user_id='$user_id' and sem_id='$sem_id' and course_id ='$course_id'" ;	
			}
			else
			$query = "update acad_cou_grad set marks_insem1='$insem1' , marks_insem2='$insem2' , marks_endsem='$endsem' , marks_misc ='$misc' , marks_effective='$effective' , grade ='$grade' where user_id='$user_id' and sem_id='$sem_id' and course_id ='$course_id'" ;
			$query = $this->db->query($query);
		}		print_r($_POST);
				$wt1 = $this->input->post('wt_insem1');
				$wt2 = $this->input->post('wt_insem2');
				$wt3 = $this->input->post('wt_endsem');
				$wt4 = $this->input->post('wt_misc');
				$course_id = $this->uri->segment(4);
				$user_id = $this->session->userdata('user_id');
				echo $wt1. $wt2. $wt3 .$course_id .$user_id;
				$query = "Update acad_teaching set wt_insem1 = '$wt1', wt_insem2 = '$wt2' , wt_endsem ='$wt3' ,wt_misc ='$wt4' where user_id = $user_id and course_id = '$course_id'";
				$query = $this->db->query($query);
				
				return $query;
			
	}
	
	function get_course_wts($cid){
		$query = "select * from acad_teaching where course_id='$cid'";
		 $query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return null;
	}
	function get_faculty_details(){
			$query = "select u.email_id, u.dob,p.name, p.user_id, p.area_of_expertise, u.gender, u.image, p.date_of_joining, p.degrees , p.experience  from acad_users u, acad_fac_profile p where u.user_id={$this->session->userdata('user_id')} and u.user_type='faculty' and u.status='active' and u.user_id = p.user_id";
			$query = $this->db->query($query);
			if($query->num_rows() > 0){
			return $query->result_array();
		}
			else return null;

	}
	
	function get_lectures($cid){
			$query = "select l.filename , l.description , l.date , l.course_id from acad_lectures l where  l.course_id = '$cid' "; 
				$query = $this->db->query($query);
			if($query->num_rows() > 0){
			return $query->result_array();
		}
			else return null;
	}
	function get_assignments($cid){
			$query = "select l.deadline ,l.assignment_id, l.description, l.course_id, l.file from acad_assig_create l , acad_teaching u where  l.user_id=u.user_id and u.status='active' and u.course_id =l.course_id and l.course_id = '$cid' group by assignment_id ORDER BY assignment_id DESC"; 
      $query = $this->db->query($query);
			if($query->num_rows() > 0){
			return $query->result_array();
		}
			else return null;
	}
	
	function get_submission_details($cid,$aid){
			$query = "select l.user_id , l.filename , l.submission_time , l.course_id , l.assignment_id from acad_assig_sub l where course_id='$cid' and assignment_id='$aid'";
			$query = $this->db->query($query);
			if($query->num_rows() > 0){
				return $query->result_array();
		}
			else return null;
	}
	
	function insertannouncement(){
	  $d['message'] = $this->input->post('message');
    $d['course_id'] = $this->input->post('courseid');
    $d['user_id']=$this->session->userdata('user_id');
    $d['sent_time']=date('H:i:s');
    $d['sent_date']=date('Y-m-d');

    $this->db->insert('acad_announce',$d);

	}
	
	function deletelecture($cid, $filename){
			$v = base_url()."lectures/".$cid.'/'.$filename;
			unlink($v);
			$query = "delete from acad_lectures where course_id ='$cid' and filename='$filename' and user_id='{$this->session->userdata('user_id')}'";
			$query = $this->db->query($query);
	}
	function deleteassignment($cid, $aid){
			$query = "delete from acad_assig_create where course_id ='$cid' and assignment_id='$aid' and user_id='{$this->session->userdata('user_id')}'";
			$query = $this->db->query($query);
	}
	
	function forums($cid){
		$query = "SELECT * FROM forum where course_id='$cid' order by 'fid' DESC limit 0,20";
		$query = $this->db->query($query);
			if($query->num_rows() > 0){
			return $query->result_array();
		}
			else return null;
	}

	function insertforum($cid){
		$inp = array('user_id' => $this->session->userdata('user_id'),
					 'course_id' => $cid,
					 'description' => $this->input->post('description'),
					 'subject' => $this->input->post('subject'),
					 'timeofpost' => time()
					 );
		$this->db->insert('forum',$inp);
	}
	
	function getcomments($fid){
	    $query= "select content,user_id ,fid, timeofpost from comments where fid = '$fid'";
		$query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
			else return null;
	}
	
	function insertcomment($fid){
		$r['user_id'] = $this->session->userdata('user_id');
	    $r['timeofpost'] = time();
		$r['fid'] = $fid;
		$r['content'] = $_POST['Comment'];
		$this->db->insert('comments',$r);
	}
	
	function deleteforum($fid){
		
		$query = "select * from forum where fid =$fid";
		$query = $this->db->query($query);
		$res = $query->result_array();
		if($this->session->userdata('user_id') ==$res[0]['user_id']){
			$query = "delete from forum where fid = $fid";
			$query = $this->db->query($query);
		}
		}
		
	function deletecomment($fid, $time){
		$query = "delete from comments where fid =$fid and Timeofpost=$time";
		$query = $this->db->query($query);
		}
	function get_recent_notifs(){
		$uid = $this->session->userdata('user_id');
		$query = "select * from acad_announce where user_id=$uid ";
		$query = $this->db->query($query);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
			else return null;
	}
	
	function delannoucement($uid, $time){
		$query = "delete from acad_announce where id=$uid and sent_time='$time'";
		$this->db->query($query);
	
	}
}
