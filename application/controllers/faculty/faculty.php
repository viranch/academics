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
      function index(){ 
      $data['css'] = 'student_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'faculty/home';
      $this->load->model('student/faculty_model');
      $data['courses']=$this->faculty_model->get_present_courses();
      $data['timetable']=$this->faculty_model->get_upcoming_lectures();
   //   $data['important_dates']=$this->student_model->get_important_dates(4);
   //   $data['announcements']=$this->student_model->get_announcements($data['batch'],5);
      $this->load->view('includes/template',$data); 
    }
    }
    function isfaculty()
    {
      $is_logged_in=$this->session->userdata('is_logged_in');
      if(!isset($is_logged_in)|| $is_logged_in == false )
        redirect("login");
      if($this->session->userdata('user_type')!="faculty")
        die("Sorry The pages are not accessible");
    }
	
	
	
 } 
 ?>

