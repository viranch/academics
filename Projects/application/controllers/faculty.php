<?php 
/*
 *Class defnition
 */
class Faculty extends CI_Controller { 

    function __construct(){
      parent::__construct();
      $this->isfaculty();     
    }

      function index(){ 
      $data['css'] = 'student_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'faculty/home';
      $this->load->model('faculty_model');
      $data['btech_courses']=$this->faculty_model->get_present_btech_courses();
	  $data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
      $data['timetable']=$this->faculty_model->get_upcoming_lectures();
   //   $data['important_dates']=$this->student_model->get_important_dates(4);
      $data['announcements']=$this->faculty_model->get_announcements();
	  $data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
      $this->load->view('home',$data); 
    
    }
    function isfaculty()
    {
    }
	
	function grade(){
		$this->load->model('faculty_model');
		$data['stu_list'] = $this->faculty_model->get_stu_list();
	    $this->load->view('grademainpage', $data);
	}
	
	function gradeupdate(){
		$this->load->model('faculty_model');
		$ret = $this->faculty_model->insertgrades();
		if($ret)
			redirect("/faculty/grade/");
 }
	function profile(){
		$this->load->model('faculty_model');
		$data['details'] = $this->faculty_model->get_faculty_details();
		$this->load->view('profile_faculty', $data);
	}
	
	function uploadform(){
		$this->load->view('upload_form', array('error' => ' ' ));
	
	}
	function do_upload($cid){
		$this->load->model('faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['lectures'] = $this->faculty_model->get_lectures($cid);
	//	$data['assignments'] = $this->faculty_model->get_assignments($cid);
		$data['cid'] = $cid;
		$config['upload_path'] = '/wamp/www/Projects/application/Lectures/it-223';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
		//	redirect("http://127.0.0.1/Projects/faculty/lectures_assignments_display/it-223");
			$this->load->view('lec_assign_f', $data);
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
						  'user_id'  =>'200801047',
						  'description'=>$this->input->post('description'),
						  'date'	=> '23-3-2011');
			$this->db->insert('acad_lectures',$inp);
			$this->load->view('lec_assign_fs', $data);
		}	
	}
	
	
	function lectures_faculty(){
	  $this->load->model('faculty_model');
      $data['btech_courses']=$this->faculty_model->get_present_btech_courses();
	  $data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
      $data['timetable']=$this->faculty_model->get_upcoming_lectures();
   //   $data['important_dates']=$this->student_model->get_important_dates(4);
      $data['announcements']=$this->faculty_model->get_announcements();
	  $data['assignment_info'] =$this->faculty_model->get_assignmentdeadlines();
      $this->load->view('lectures_f',$data); 
	}




	function lectures_assignments_display($cid){
		$data['error'] = ' ';
	    $this->load->model('faculty_model');
		$data['btech_courses']=$this->faculty_model->get_present_btech_courses();
		$data['mtech_courses']=$this->faculty_model->get_present_mtech_courses();
		$data['lectures'] = $this->faculty_model->get_lectures($cid);
	//	$data['assignments'] = $this->faculty_model->get_assignments($cid);
		$data['cid'] = $cid;
		$this->load->view('lec_assign_f', $data);
	}
	
	function download($cid,$filename){
		$this->load->helper('download');
		$data = file_get_contents("http://127.0.0.1/Projects/application/Lectures/it-223/".$filename);
		force_download($filename, $data);
	}

}	?>

