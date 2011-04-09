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
    /*function createuser()
    {
      $data['maincontent']='admin/createuser';
      $this->load->view('includes/template',$data);
    
    }
    function val_user_data()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name', 'display', 'required|matches[passconf]|trim');
      $this->form_validation->set_rules('user_id','userid','max_length[10]|required|trim');     
      $this->form_validation->set_rules('password','password','max_length[32]|required|trim');      
      $this->form_validation->set_rules('conform_password','conform password','max_length[32]|required|matches[password]');      
      $this->form_validation->set_rules('first_name','first name','max_length[50]|required');      
      $this->form_validation->set_rules('last_name','last name','max_length[50]|required');      
      $this->form_validation->set_rules('dob','D.O.B','required');      
      $this->form_validation->set_rules('email_id','Email Id','max_length[50]|required');      
      $this->form_validation->set_rules('city','city','max_length[50]|required');      
      $this->form_validation->set_rules('country','country','max_length[50]|required');      
      $this->form_validation->set_rules('address','address','|required');      
      $this->form_validation->set_rules('emergency_address','Emergency address','|required');      
      $this->form_validation->set_rules('phone','phone','max_length[15]|required');      
      $this->form_validation->set_rules('creation_date','Creation date','|required');      
      $this->form_validation->set_rules('image','image','max_length[50]');      
      $this->form_validation->set_rules('bloodgroup','bloodgroup','max_length[5]');     
      $this->form_validation->set_rules('officephone','officephone','max_length[15]');
      $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
      if ($this->form_validation->run() == FALSE) // validation hasn'\t been passed
      {
        $data['maincontent']='admin/createuser'; 
        $this->load->view('includes/template',$data);
      }
      else // passed validation proceed to post success logic
      {
                    // build array for the model
          $form_data = array('user_id' => set_value('user_id'),
                            'password' => set_value('password'),
                            'user_type' => set_value('user_type'),
                            'first_name' => set_value('first_name'),
                            'last_name' => set_value('last_name'),
                            'dob' => set_value('dob'),
                            'gender' => set_value('gender'),
                            'email_id' => set_value('email_id'),
                            'city' => set_value('city'),
                            'country' => set_value('country'),
                            'address' => set_value('address'),
                            'emergency_address' => set_value('emergency_address'),
                            'phone' => set_value('phone'),
                            'status' => set_value('status'),
                            'creation_date' => set_value('creation_date'),
                            'image' => set_value('image'),
                            'bloodgroup' => set_value('bloodgroup'),
                            'identification_mark' => set_value('identification_mark'),
                            'officephone' => set_value('officephone')
                          );
          echo "Success";

      }                                                                                                                                          // run insert model to write data to db
    
    }*/
 } 
 ?>

