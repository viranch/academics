<?php 
/*
 *Class defnition
 */
class Faculty extends CI_Controller { 

    function __construct(){
      parent::__construct();
      $this->isfaculty();     
    }
    function isfaculty()
    {
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)|| $is_logged_in == false )
			redirect("login");
		if($this->session->userdata('user_type')!="faculty")
			die("Sorry The pages are not accessible");
    }
    function index(){ 
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['announcements']=$this->faculty_model->get_announcements();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation';
		$data['maincontent'] = 'faculty/home';
	    $this->load->view('includes/template', $data);
    }

	function gradehome(){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/gradehome.php';
	    $this->load->view('includes/template', $data);
	}
	
	function grade($cid){
		$this->load->model('faculty/faculty_model');
		$data['stu_list'] = $this->faculty_model->get_stu_list($cid);
		$data['weights'] = $this->faculty_model->get_course_wts($cid);
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['cid']=$cid;
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/gradingpage.php';
		$data['javascript'] = 'gradefunc.js';
	    $this->load->view('includes/template', $data);
	}
	
	function profile(){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['details'] = $this->faculty_model->get_faculty_details();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/profilepage.php';
	    $this->load->view('includes/template', $data);
	}
	
	function lectures_display($cid){
    $data['error'] = ' ';
	    $this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['lectures'] = $this->faculty_model->get_lectures($cid);
		$data['cid'] = $cid;
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/lectures_display.php';
	    $this->load->view('includes/template', $data);
	}
	
	 function lectureshome(){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['announcements']=$this->faculty_model->get_announcements();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/lectureshome.php';
	    $this->load->view('includes/template', $data);
	}
	
	
	function lecture_upload($cid){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['lectures'] = $this->faculty_model->get_lectures($cid);
		$data['cid'] = $cid;
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
    $path = realpath(APPPATH.'../lectures/'.$cid."/");
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'pdf|ppt|xls|doc|txt|docx';
    $config['max_size']	= '10000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['css'] = 'style.css';
			$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'faculty/lectures_display.php';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$data1 = $this->upload->data();
			$filename = $data1['file_name'];
			$path     = $data1['full_path'];
			$data['upload_data'] = $this->upload->data();
			$this->filename = $filename;
			$inp = array('filename' => $filename ,
						  'course_id'=>$cid,
						  'user_id'  =>$this->session->userdata('user_id'),
						  'description'=>$this->input->post('description'),
						  'date'	=> date("Y-m-d"));
			$this->db->insert('acad_lectures',$inp);
			$data['css'] = 'style.css';
			$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'faculty/lect_upload_successpage.php';
			redirect("faculty/faculty/lectures_display/".$cid);
		}	
	}
	
	function lecturedelete($cid,$filename){
		$this->load->model('faculty/faculty_model');
		$data['details']=$this->faculty_model->deletelecture($cid,$filename);
		$url = base_url()."index.php/faculty/faculty/lectures_display/".$cid ;
		redirect($url);
	}
	
	function assignmentshome(){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/assignmentshome.php';
		$this->load->view('includes/template', $data);
	}
	
	function assignments_display($cid){
		$data['error'] = ' ';
	    $this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['assignments'] = $this->faculty_model->get_assignments($cid);
		$data['cid'] = $cid;
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/assignments_display.php';
		$this->load->view('includes/template', $data);
	}
	
	
	function assignment_upload($cid){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['assignments'] = $this->faculty_model->get_assignments($cid);
		$data['cid'] = $cid;
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$config['upload_path'] = './lectures/'.$cid;
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|txt|zip|rar|ppt';
		$config['max_size']	= '1000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['css'] = 'style.css';
			$data['javascript'] = '1';
			$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'faculty/assignments_display.php';
			$this->load->view('includes/template', $data);
		}
		else
		{   
			$year = $this->input->post('deadline');
			$time = $_POST['hrs'].":".$_POST['mins'].":".$_POST['secs'];
			$deadline = $year .' '.$time;
			$data1 = $this->upload->data();
			$filename = $data1['file_name'];
			$path     = $data1['full_path'];
			$data['upload_data'] = $this->upload->data();
			$this->filename = $filename;
			$query = "select max(assignment_id) as assignment_id from acad_assig_create where course_id='$cid' order by assignment_id desc";
			$query = $this->db->query($query);
			$query = $query->result_array(); 
			$inp = array( 'assignment_id' => ($query[0]['assignment_id']+1),
						  'file' => $filename ,
						  'deadline' =>  $deadline,
						  'course_id'=> $cid,
						  'present_year' => date('Y'),
						  'description'=>$this->input->post('description'),
						  'user_id' =>$this->session->userdata('user_id'));
			$this->db->insert('acad_assig_create',$inp);
			$data['css'] = 'style.css';
			$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'faculty/assignments_uploadsuccesspage.php';
			redirect("faculty/faculty/assignments_display/".$cid);
		}	
	}
	
	function assignmentdelete($cid,$aid){
		$this->load->model('faculty/faculty_model');
		$data['details']=$this->faculty_model->deleteassignment($cid,$aid);
		redirect(base_url()."index.php/faculty/faculty/assignments_display/{$cid}");
	}
	

	function display_assignment_submissions($cid , $aid){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
    $data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines(); 
    $data['details']=$this->faculty_model->get_submission_details($cid,$aid);
		$data['css'] = 'style_home_baba.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/assignment_submission.php';
		$this->load->view('includes/template', $data);	
	}
	
	
		function anouncementshome(){
		$this->load->model('faculty/faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['notifications'] = $this->faculty_model->get_recent_notifs();
		$data['courses'] = $this->faculty_model->get_present_courses();
		$data['batches'] = $this->faculty_model->get_batches();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/announcement_form.php';
		$this->load->view('includes/template', $data);
		}
	
	function announce(){
		$this->load->model("faculty/faculty_model");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('message', 'Message',"required"); 
		$this->faculty_model->insertannouncement();
		if ($this->form_validation->run() == FALSE){
			redirect("faculty/faculty/anouncementshome");
		}
		else{
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/general.php';
		$data['message'] = "Your announcement has been submitted <br><a href='/academics/index.php/faculty/faculty/anouncementshome'>Post another announcement</a>";
		$this->load->view('includes/template', $data);
	}}
	
	function gradeupdate($cid){
		$this->load->model('faculty/faculty_model');
		$ret = $this->faculty_model->insertgrades($cid);
		if($ret)
			redirect("/faculty/faculty/grade/".$cid);
	}
	

	
	function forum($cid){
		$this->load->model("faculty/faculty_model");
		$data['info'] = $this->faculty_model->forums($cid);
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/forummainpage.php';
		$data['cid'] =$cid;
		$this->load->view("includes/template", $data);
	}
	
	function newforum($cid){
		$this->load->model("faculty/faculty_model");
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/new_forum.php';
		$data['cid'] = $cid;
		$this->load->view("includes/template", $data);
	
	}
	
	function updateforum($cid){
		$this->load->model("faculty/faculty_model");
		$this->faculty_model->insertforum($cid);
		redirect("/faculty/faculty/forum/".$cid);
	}
	
	 public function comments($fid){
		$this->load->model("faculty/faculty_model");
		$data['comments'] = $this->faculty_model->getcomments($fid);
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/comments_forum.php';
		$this->load->view("includes/template", $data);
	}
	
	
	function forumdelete($fid ,$cid){
		$this->load->model('faculty/faculty_model');
		$this->faculty_model->deleteforum($fid);
		redirect("/faculty/faculty/forum/".$cid);
	}
	
	function deletecomment($fid, $time ){
		$this->load->model('faculty/faculty_model');
		$this->faculty_model->deletecomment($fid, $time);
		redirect("/faculty/faculty/commnentingpage/".$fid);
	}
	function commnentingpage($fid){
		$this->load->model("faculty/faculty_model");
		$data['comments'] = $this->faculty_model->getcomments($fid);
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['timetable']=$this->faculty_model->get_upcoming_lectures();
		$data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'faculty/commenting_forum.php';
		$this->load->view("includes/template", $data);
		}
	
	function insertcomment($fid){
		$this->load->model("faculty/faculty_model");
		$this->faculty_model->insertcomment($fid);
		redirect("/faculty/faculty/commnentingpage/".$fid);	
	}
	
	function deleteannouncement($uid, $time){
		$this->load->model("faculty/faculty_model");
		$this->faculty_model->delannoucement($uid, $time);
		redirect("/faculty/faculty/anouncementshome");
	
	}
	
}	
 ?>

