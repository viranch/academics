<?php 
/*
 *Class defnition
 */
class Login extends CI_Controller { 

    function __construct(){
        parent::__construct();     
    }

    function index($message="") //default controller which calls the login page
    {
      
      $is_logged_in=$this->session->userdata('is_logged_in');
      if(!isset($is_logged_in)|| $is_logged_in == false ){
      
      }
      else{
        $type=$this->session->userdata('user_type');
        if($type=='student')
          redirect('student/student');
        elseif($type=='faculty')
          redirect('faculty/faculty');
        elseif($type='admin')
          redirect('admin/admin');
      }
      
      
      
      $data['css']='style_login.css';
      $data['javascript']='login.js';
      $data['maincontent'] = 'login_test'; 
      if($this->uri->segment(3))
        $data['message']=str_replace('_',' ',$this->uri->segment(3));
      $this->load->view('includes/template',$data);
      
    }
    
    
    
    function validate()//function called when login form is submitted
    {
      $this->load->model('login_model');
      $info= $this->login_model->validateuser();
      if($info)
      {
        $type=$info[0]['user_type'];
        $status=$info[0]['status'];
        //die("reached here");
        if($status == "active" ){ 
        $data = array('user_id' => $this->input->post('username'),
                      'is_logged_in' =>true,
                      'user_type' => $type 
                    );
        $this->session->set_userdata($data);
        //die("reached here");
        //echo "Sessions are set";

        if($type=="student")
          redirect('student/student');
        elseif($type=="admin")
          redirect('admin/admin');
        elseif($type == "faculty")
          redirect('faculty/faculty');
        }
        else{
          echo "Unidentified user for the system please contact administrator";
        }
      }
      else {
        $message="Username_or_password_is_incorrect";
        redirect('login/index/'.$message);
      }
    
    }
    
    
    function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
    
    function change_password()//function to change the password
    {
      $data['css'] = 'admin_home.css';
      $this->load->model('admin/admin_model');
      $data['javascript'] = 'default.js';
      $data['permissions']=$this->admin_model->get_eligibility();
      if($this->session->userdata('user_type')=='student'){
        $data['navigation'] = 'student/student_navigation.php';
        $data['css']='style.css';
      }
      $data['maincontent']='change_password';
      if($this->session->userdata('user_type')=='faculty'){
        $data['navigation'] = 'faculty/faculty_navigation.php';
        $data['css']='style.css';
      }
      $data['message']=$this->uri->segment(3);
      if($this->session->userdata('user_type')=='admin')
      $data['navigation'] = 'admin/admin_navigation.php';
      $this->load->view('includes/template',$data);
      
      
    }
    
    function chk_and_change()//function called when the password change form is submitted
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('old_password', 'Old Password', 'required|trim');
      $this->form_validation->set_rules('new_password', 'New password', 'required|trim|min_length[6]');
      $this->form_validation->set_rules('confpassword', 'Confirm password', 'required|matches[new_password]|trim');
      if ($this->form_validation->run() == FALSE)
      {
            $this->change_password();
      }
      else
      {
          $this->load->model('login_model');
          if($this->login_model->update_passwd()==0)
            redirect('login/change_password/Your_old_Password_wrongly_typed');
          else
            redirect('login/change_password/Succesfully_changed');
      }    
    }

 } 
 ?>

