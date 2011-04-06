<?php 
/*
 *Class defnition
 */
class Lectures extends CI_Controller { 

    function __construct(){
      parent::__construct();
      $this->isstudent();     
    }

    function index(){ 
      $data['css'] = 'style_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/lectures';
      $this->load->model('student/student_model');
      $this->load->model('student/lecture_model');
      $data['courses']=$this->student_model->get_present_courses();
      $data['batch']=$this->student_model->get_batch();
      $data['timetable']=$this->student_model->get_timetable($data['batch']);
      $data['important_dates']=$this->student_model->get_important_dates(4);
      $courseid=$this->uri->segment(4);
      $data['lectures']=$this->lecture_model->get_lectures($courseid);
      $data['assgn']=$this->lecture_model->get_assignment($courseid);
      $data['announcements']=$this->student_model->get_announcements($data['batch'],5);
      $data['deadlines']=$this->student_model->get_deadlines();
      $this->load->view('includes/template',$data);
    }
    function isstudent()
    {
      $is_logged_in=$this->session->userdata('is_logged_in');
      if(!isset($is_logged_in)|| $is_logged_in == false )
        redirect("login");
      if($this->session->userdata('user_type') != 'student')
        die("Unrestricted access");
    }
    function upload()
    {
     $path = realpath(APPPATH);
     $path = $path."/assignments";
     echo "{$path}";
     $config['upload_path'] = $path; 
     $config['allowed_types'] = 'zip';
     $config['encrypt_name']  = TRUE;   
     $config['max_size']  = '100';  
     $this->load->library('upload',$config);
     if (!$this->upload->do_upload()){
       $error =  $this->upload->display_errors();
       echo "{$error}";
     }
     else {                   
       $data = array('upload_data' => $this->upload->data());
       $this->load->model('student/lecture_model');
       $assignment_id=$this->input->post('id');
       $faculty_id=$this->input->post('faculty_id');
       $course_id=$this->input->post('course_id');
       $filename=$data['upload_data']['file_name'];
       $this->lecture_model->submit_assignment($assignment_id,$faculty_id,$course_id,$filename);
       redirect('student/lectures/index/'.$course_id);
     }
    }
}
?>
