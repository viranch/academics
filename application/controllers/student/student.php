<?php 
/*
 *Class defnition
 */
class Student extends CI_Controller { 

    function __construct(){
      parent::__construct();
      $this->isstudent();     
    }

    function index(){ 
        $data['css'] = 'default.css';
        $data['javascript'] = 'default.js'; 
        $data['maincontent'] = 'student/home';
        $this->load->model('student/student_model');
        $batch=$this->student_model->get_batch(); 
        $data['timetable']=$this->student_model->get_timetable($batch);
        $data['announcements']=$this->student_model->get_announcements($batch);
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
    
    function trial(){
      $this->load->model('student/student_model');
      $dates=$this->student_model->get_courses_ofsem(1);
      print_r($dates);
    }
 } 
 ?>

