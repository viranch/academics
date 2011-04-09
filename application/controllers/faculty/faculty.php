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
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
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
		$data['css'] = 'style.css';
		//$data['css'] = 'faculty_profilepage.css';
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
		$data['css'] = 'faculty_lectures_display.css';
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
		$config['upload_path'] = './lectures/'.$cid;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['css'] = 'faculty_lectures_display.css';
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
			$data['css'] = 'faculty_lectureupload_success.css';
			$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'faculty/lect_upload_successpage.php';
			$this->load->view('includes/template', $data);
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
		$data['css'] = 'faculty_assignments_display.css';
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
		$config['upload_path'] = './lectures/'.$cid;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['css'] = 'faculty_assignments_display.css';
			$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'faculty/assignments_display.php';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$data1 = $this->upload->data();
			$filename = $data1['file_name'];
			$path     = $data1['full_path'];
			$data['upload_data'] = $this->upload->data();
			$this->filename = $filename;
			$inp = array( 'file' => $filename ,
						  'deadline' => $this->input->post('deadline') ,
						  'course_id'=> $cid,
						  'present_year' => date('Y'),
						  'description'=>$this->input->post('description'),
						  'user_id' =>$this->session->userdata('user_id'));
			$this->db->insert('acad_assig_create',$inp);
			$data['css'] = 'faculty_assignmentupload_sucpage.css';
			$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'faculty/assignments_uploadsuccesspage.php';
			$this->load->view('includes/template', $data);
		}	
	}
	
	function assignmentdelete($cid,$aid){
		$this->load->model('faculty/faculty_model');
		$data['details']=$this->faculty_model->deleteassignment($cid,$aid);
		redirect(base_url()."index.php/faculty/faculty/assignments_display/{$cid}");
	}
	
	function gradeupdate($cid){
		$this->load->model('faculty/faculty_model');
		$ret = $this->faculty_model->insertgrades($cid);
		if($ret)
			redirect("/faculty/faculty/grade/".$cid);
	}
}	
 ?>

