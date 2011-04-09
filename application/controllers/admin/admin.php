<?php 
/*
 *Class defnition
 */
class Admin extends CI_Controller { 

    function __construct(){
      parent::__construct();
      $this->isadmin();
    }

    function index(){ 
      echo "You are admin";
    }
    function isadmin()
    {
      $is_logged_in=$this->session->userdata('is_logged_in');
      if(!isset($is_logged_in)|| $is_logged_in == false )
        redirect("login");
      if($this->session->userdata('user_type')!="admin")
        die("Sorry The pages are not accessible");
    }
    
    function delete_user()
    {
      $this->load->model('admin/admin_model');
      $list=$this->input->post('users');
      if(!empty($list)){
        foreach ($list as $row) {
          $this->admin_model->delete_userid($row);
          $data['message']="Succesfully deleted";
        }
      }
      if($this->input->post('user_id')!=''){
        $data['details']=$this->admin_model->get_details_id(intval($this->input->post('user_id')));
      }
      else if($this->input->post('name')!=''){
        $data['details']=$this->admin_model->get_details_name($this->input->post('name'));
      }  
      $permissions=$this->admin_model->get_eligibility();
      if($permissions[0]['delete_user']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'admin/delete_user';
      $this->load->view('includes/template',$data);  
    
    }
    
    function retrieve_user()
    {
      $this->load->model('admin/admin_model');
      $list=$this->input->post('users');
      if(!empty($list)){
        foreach ($list as $row) {
          $this->admin_model->delete_userid($row);
          $data['message']="Succesfully deleted";
        }
      }
      if($this->input->post('user_id')!=''){
        $data['details']=$this->admin_model->get_details_id(intval($this->input->post('user_id')));
      }
      else if($this->input->post('name')!=''){
        $data['details']=$this->admin_model->get_details_name($this->input->post('name'));
      }  
      $permissions=$this->admin_model->get_eligibility();
      if($permissions[0]['delete_user']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'admin/delete_user';
      $this->load->view('includes/template',$data);
    }  
    
    function approve_courses()
    {
      $this->load->model('admin/admin_model');
      $this->load->model('admin/reg_model');
      $user_id=0;
      if($this->input->post('user_id')!=''){
        if($this->input->post('next')){
            $user=$this->reg_model->get_next_user($this->input->post('user_id'));
            if(!empty($user)){
            $user_id=$user[0]['user_id'];
            }    
        }
        else{
            $user_id=$this->input->post('user_id');
        }
      }
      if(isset($user_id)){
        $data['user_id']=$user_id;
        $data['batch']=$this->reg_model->get_batch($user_id);
        $data['courses']=$this->reg_model->courses_registered($user_id);
      }

      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'admin/approve_courses';
      $this->load->view('includes/template',$data);
    
    }
    
    function important_dates()
    {
      $this->load->model('admin/utilities');
      if($this->input->post('submit')){
        $this->utilities->insert_dates();
      }
      if($this->input->post('delete')){
        $this->utilities->delete_dates();
      }
      $data['dates']=$this->utilities->get_important_dates();
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'admin/important_dates';
      $this->load->view('includes/template',$data);
    
    }    
    
    function add_user()
    {
      $data['css'] = 'style_home.css';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'admin/add_user';
      $this->load->view('includes/template',$data);
    
    }
    function announce()
    {
      $this->load->model('admin/announce_model');
      $data['program']=$this->announce_model->get_program();
      $data['year']=$this->announce_model->get_year();
      $data['courses']=$this->announce_model->announce_courses();
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'admin/announce';
      $this->load->view('includes/template',$data);
    }
 } 
 ?>

