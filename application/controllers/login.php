<?php 
/*
 *Class defnition
 */
class Login extends CI_Controller { 

    function __construct(){
        parent::__construct();     
    }

    function index($message="")//default controller which calls the login page
    {
      $data['css']='login.css';
      $data['javascript']='login.js';
      $data['maincontent'] = 'login_form'; 
      $this->load->view('includes/template',$data);
      if($message!="")
      echo "{$message}";  
    }
    
    
    
    function validate()//function called when login form is submitted
    {
      $this->load->model('login_model');
      $info= $this->login_model->validateuser();
      if($info)
      {
        $type=$info[0]['user_type'];
        $status=$info[0]['status'];
        if($status == "active" ){ 
        $data = array('user_id' => $this->input->post('username'),
                      'is_logged_in' =>true,
                      'user_type' => $type 
                    );
        $this->session->set_userdata($data);
        if($type=="student")
          redirect('student/student');
        elseif($type=="admin")
          redirect('admin/admin');
        elseif($type == "faculty")
          redirect('faculty/faculty');
        }
        else{
          redirect('login');
        }
      }
      else {
        $message="Username/password is incorrect";
        $this->index($message);
      }
    
    }
    
    
    function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
    
    function change_password()//function to change the password
    {
      $data['maincontent']='change_password';
      $this->load->view('includes/template',$data);
      
      
    }
    
    function chk_and_change()//function called when the password change form is submitted
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('old_password', 'Old_Password', 'required|trim');
      $this->form_validation->set_rules('new_password', 'New_password', 'required|trim');
      $this->form_validation->set_rules('confpassword', 'Confirm password', 'required|matches[new_password]|trim');
      if ($this->form_validation->run() == FALSE)
      {
            $this->change_password();
      }
      else
      {
          $this->load->model('login_model');
          if($this->login_model->update_passwd())
          echo "Your password succesfully changed";
      }    
    }

 } 
 ?>

