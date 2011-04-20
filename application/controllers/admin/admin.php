<?php 
/*
 *Class defnition
 */
class Admin extends CI_Controller { 

    function __construct(){
      parent::__construct();
      $this->isadmin();
    }

    
    function grade()
    {
      $this->load->model('admin/admin_model');
      if($this->admin_model->chk_grade()==0)
        echo "not all grades are uploaded";
      else{
        $cal=$this->admin_model->calculate();
        foreach ($cal as $row) {
          $spi=$row['sum(gradepoints)']/$row['sum(credits)'];
          $sem_id=$row['sem_id'];
          $user_id=$row['user_id'];
          $data = array('spi' => $spi,
                        'grade_points_registered'=>$row['sum(credits)']*10,
                        'grade_points_earned'=>$row['sum(gradepoints)']
                      );
          $this->db->where('user_id',$user_id);
          $this->db->where('sem_id',$sem_id);
          $this->db->update('acad_sem_perform',$data);
          echo "done";
        }
        $data1=$this->admin_model->cpi();
        foreach ($data1 as $row) {
          $data=array();
          $data=array('Total_credits_registered'=>$row['sum(grade_points_registered)'],
            'Overall_grade_points'=>$row['sum(grade_points_earned)'],
			'CPI'=>($row['sum(grade_points_earned)']*10)/$row['sum(grade_points_registered)']);
          $this->db->where('user_id',$row['user_id']);
          $this->db->update('acad_stu_profile',$data);

        }
        redirect('admin/admin/index');
      } 
    }
    
    
    
    
    
    function set_password()
    {
      
      $this->load->model('admin/admin_model');
      $string=$this->admin_model->get_rand(6);
      if($this->input->post('submit')){
        $data['password']=$string;
      }
      if($this->input->post('reset_password')){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        if ($this->form_validation->run() == TRUE)
        {
        if($this->input->post('user_id')!='')
          if($this->input->post('password')!='')
            if($this->admin_model->update_password()==1)
              $data['message']="password Succesfully reset to <br/>".$this->input->post('password');
            else 
              $data['message']="Sorry userid not found";
          else
            $data['message']='Password cannot be empty';
        else
          $data['message']='user id required';
        }    
      }
      
      $data['permissions']=$this->admin_model->get_eligibility();
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent']='admin/set_password';
      $this->load->view('includes/template',$data);
    
    }
    
    
    
    function timetable()
    {
      
      $this->load->model('admin/admin_model');
      $data['permissions']=$this->admin_model->get_eligibility();
      $data['css'] = 'admin_home.css';
      $this->load->model('admin/announce_model');
      $data['program']=$this->announce_model->get_program();
      $data['year']=$this->announce_model->get_year();
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/time_table';
      $this->load->view('includes/template',$data);
    
    }
    function timetable1()
    {
      
      $this->load->model('admin/admin_model');
      if($this->input->post('submit')){
        $this->admin_model->timetable();
      }  
      $data['timetable']=$this->admin_model->show_timetable();
      $data['everything']=$this->admin_model->get_slots_courses();
      $data['permissions']=$this->admin_model->get_eligibility();
      $data['css'] = 'admin_home.css';
      $this->load->model('admin/announce_model');
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/time_table2';
      $this->load->view('includes/template',$data);
    }
    function index(){ 
      $this->load->model('admin/admin_model');
      $data['candidate']=$this->admin_model->get_details_id($this->session->userdata('user_id'));
      $data['permissions']=$this->admin_model->get_eligibility();
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/admin_home';
      if($this->input->post('submit')){
        redirect('admin/admin/grade');
      }
      
      $this->load->view('includes/template',$data);
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
      if($this->input->post('submit')){
        if($this->input->post('user_id')!=''){
          $data['details']=$this->admin_model->get_details_id(intval($this->input->post('user_id')));
          if(empty($data['details']))
            $data['message']='No user with entered data';
        }
        else if($this->input->post('name')!=''){
          $data['details']=$this->admin_model->get_details_name($this->input->post('name'));
          if(!empty($data['details']))
            $data['message']='';
        }
      }  
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['delete_user']!=1)
        die("sorry you don't have permissions to navigate to this page");
      
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation';
      $data['maincontent'] = 'admin/delete_user';
      $this->load->view('includes/template',$data);  
    
    }
    
    function retrieve_user()
    {
      $this->load->model('admin/admin_model');
      $list=$this->input->post('users');
      if(!empty($list)){
        foreach ($list as $row) {
          $this->admin_model->getback_userid($row);
          $data['message']="Succesfully retrieved";
        }
      }
      if($this->input->post('user_id')!=''){
        $data['details']=$this->admin_model->get_details_id_r(intval($this->input->post('user_id')));
      }
      else if($this->input->post('name')!=''){
        $data['details']=$this->admin_model->get_details_name_r($this->input->post('name'));
      } 
	  else{
		$data['message']='';
	  }
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['retrieve_user']!=1)
        die("sorry you don't have permissions to navigate to this page");
      //if($permissions[0]['delete_user']!=1)
        //die("sorry you don't have permissions to navigate to this page");
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation';
      $data['maincontent'] = 'admin/retrieve_user';
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
      if($this->input->post('approve')){
        if($this->reg_model->approve($this->input->post('user_id'))){
          $data['message']="Succesfully approved";
        }
      }
      if(isset($user_id)){
        $data['user_id']=$user_id;
        $data['batch']=$this->reg_model->get_batch($user_id);
        $data['courses']=$this->reg_model->courses_registered($user_id);
      }

      $data['permissions']=$this->admin_model->get_eligibility();
      $data['css'] = 'admin_home.css';
      if($data['permissions'][0]['approve_courses']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/approve_courses';
      $this->load->view('includes/template',$data);
    
    }
    
    function important_dates()
    {
      $this->load->library('form_validation');
      $this->load->model('admin/utilities');
      $this->load->model('admin/admin_model');
      if($this->input->post('submit')){
        if($this->input->post('start_date')>$this->input->post('end_date')){
          $data['message']="start date and end date not choosen correct";
        }
        else{
          $this->form_validation->set_rules('description', 'Descriptin', 'required');
          if ($this->form_validation->run() == FALSE)
          {
                $data['message']="Description cannot be empty";
          }
          else{
          $this->utilities->insert_dates();
          }  
        }
      }
      if($this->input->post('delete')){
        $this->utilities->delete_dates();
      }
      $data['dates']=$this->utilities->get_important_dates();
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['important_dates']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/important_dates';
      $this->load->view('includes/template',$data);
    
    }    
    
    function add_user()
    {
      $data['css'] = 'admin_home.css';
      $this->load->model('admin/admin_model');
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['create_user']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/add_user';
      $this->load->view('includes/template',$data);
    
    }
    function announce()
    {
      $this->load->model('admin/announce_model');
      $this->load->model('admin/admin_model');
      $data['program']=$this->announce_model->get_program();
      $data['year']=$this->announce_model->get_year();
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['announce']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['courses']=$this->announce_model->announce_courses();
      if($this->input->post('submit')){
        if($this->input->post('message')!='')
          $this->announce_model->insert();
        else
          $data['message']="description cannot be empty";
      } 
      if($this->input->post('delete')){
        $this->announce_model->delete();
        $data['message']="succesfully deleted";
      }
      $data['css'] = 'admin_home.css';
      $data['announcements']=$this->announce_model->get_announce();
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/announce';
      $this->load->view('includes/template',$data);
    }

    function deadline()
    {
      $this->load->model('admin/announce_model');
      $this->load->model('admin/admin_model');
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['deadlines']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['program']=$this->announce_model->get_program();
      $data['sem']=$this->announce_model->sem_list();
      if($this->input->post('submit')){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('max_courses', 'Maximum courses', 'required|numeric');
        $this->form_validation->set_rules('max_credits', 'Maximum credits', 'required|numeric');
        $this->form_validation->set_rules('min_courses', 'Minimum courses', 'required|numeric');
        $this->form_validation->set_rules('min_credits', 'Minimum credits', 'required|numeric');
        $this->form_validation->set_rules('deadline', 'Closing date', 'required');
        $this->form_validation->set_rules('opening_date', 'Opening date', 'required');
        if ($this->form_validation->run() == FALSE)
        {
          redirect("admin/admin/deadline");
        }
        else
        {
          if($this->announce_model->is()==1){
            $this->announce_model->update_restrictions();
          } 
          else{
            $this->announce_model->insert_restrictions();
          }
          
        }
      } 
      if($this->input->post('delete')){
        $this->announce_model->delete_restrictions();
      }
      $data['css'] = 'admin_home.css';
      $data['rest']=$this->announce_model->get_acad_restrictions();
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/offer_restrict';
      $this->load->view('includes/template',$data);
    }
    function course_assign()
    {
      $this->load->model('admin/announce_model');
      $this->load->model('admin/admin_model');
      if($this->input->post('submit')){
         $this->announce_model->course_assign();
         $data['message']="Succesully assigned user with user id ".$this->input->post('user_id')." to teach course with courseid ".$this->input->post('course_id');
      }
      $data['css'] = 'admin_home.css';
      $data['faculty']= $this->announce_model->get_faculty();
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['course_assign']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['program']=$this->announce_model->get_program();
      $data['year']=$this->announce_model->get_year();
      $data['courses']=$this->announce_model->announce_courses();
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/course_assign';
      $this->load->view('includes/template',$data);
    
    }
    function course_create()
    {
      $this->load->library('form_validation');
      $this->load->model('admin/utilities');
      $this->load->model('admin/announce_model');
      $this->load->model('admin/admin_model');
      if($this->input->post('submit')){
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('course_name', 'Course name', 'required|trim');
        $this->form_validation->set_rules('course_id', 'Course id', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('credits', 'Credits', 'required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        if ($this->form_validation->run() == FALSE){
             
        }
        else
        {
          $this->utilities->course_create();
          mkdir(realpath(APPPATH.'../lectures/').'/'.$this->input->post('course_id'),0777);
          chmod (realpath(APPPATH.'../lectures/').'/'.$this->input->post('course_id'),0777);
          mkdir(realpath(APPPATH.'../lectures/').'/'.$this->input->post('course_id').'/assignments',0777);
          chmod (realpath(APPPATH.'../lectures/').'/'.$this->input->post('course_id').'/assignments',0777);
          $data['message']="Succesfully created";
        }
      }
      if($this->input->post('delete')){
        $this->utilities->delete_course();
      
      }
      $data['permissions']=$this->admin_model->get_eligibility();
      if($data['permissions'][0]['course_create']!=1)
        die("sorry you don't have permissions to navigate to this page");
      $data['courses']=$this->announce_model->announce_courses();
      $data['css'] = 'admin_home.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'admin/admin_navigation.php';
      $data['maincontent'] = 'admin/course_reg';
      $this->load->view('includes/template',$data);
    
    }
	
	function createuser(){
			$data['css'] = 'admin_home.css';
		//	$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'admin/createuser';
			$this->load->view('includes/template', $data);
	}
	
	function updatemainpage(){
		$data['css'] = 'admin_create_user.css';
		//	$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'admin/updateusermainpage';
			$data['error'] = '';
			$this->load->view('includes/template', $data);
	}
	function updateuser_1(){
			if(isset($_POST['sid']))
				if($_POST['sid'] != '')
					$user_id = $this->input->post('sid');
			else if(isset($_POST['user_id']))
				$user_id = $this->input->post('user_id');
			else if(1)
				redirect("/admin/admin/updatemainpage/");
			$data['css'] = 'admin_create_user.css';
		//	$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'admin/showing_userinfo';
			$this->load->model('admin/admin_model');
			$data['details'] = $this->admin_model->get_stu_details($user_id);
			if($data['details'] != null)
				$this->load->view('includes/template', $data);
			else{
				$data['css'] = 'admin_create_user.css';
		//		$data['navigation'] = 'faculty/faculty_navigation.php';
				$data['maincontent'] = 'admin/updateusermainpage';
				$data['error'] ="userId does not exists, please enter correctly or create a new one" ;
				$this->load->view('includes/template', $data);
			}
	}
	

	function updateuser(){
	//		$user_id = $this->input->post('sid');
			$data['css'] = 'admin_create_user.css';
	//		$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'admin/updateuser';
			$this->load->model('admin/admin_model');
		//	$data['details'] = $this->faculty_model->get_stu_details($user_id);
			$this->load->view('includes/template', $data);
	}

	
	function val_user_data(){
		$this->load->library('form_validation');
		//rules for validation
		$this->form_validation->set_rules('user_id', 'UserId', 'required|min_length[9]|max_length[10]');
		$this->form_validation->set_rules('user_id', 'UserId' ,'callback_checkuser');
		$this->form_validation->set_rules('user_name', 'UserName', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Password confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('user_type', 'Usertype', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('email_id', 'EmailId', 'required|valid_email');
		$this->form_validation->set_rules('emergency_address', 'Emergency address', 'required');
		$this->form_validation->set_rules('phone', 'Phone No', 'required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('identification_mark', 'Identification mark', 'required');		
		if ($this->form_validation->run() == FALSE){
			$data['css'] = 'admin_create_user.css';
		//	$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'admin/createuser';
			$this->load->view('includes/template', $data);
		}
		else{
		if($this->input->post('creation_date') =='')
		$creationdate = date(" 'Y'-'m'-'d'");
		else
		$creationdate = $this->input->post('creation_date');
		$inp = array( 'user_id' => $this->input->post('user_id'),
					'candidate_name' => $this->input->post('user_name'),
					'password'=> md5($this->input->post('password')),
					'user_type'=>$this->input->post('user_type'),
					'email_id' =>$this->input->post('email_id'),
					'first_name' =>$this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'dob'       => $this->input->post('dob'),
					'gender'    => $this->input->post('gender'),
					'status'    => $this->input->post('status'),
					'image'    => $this->input->post('image'),
					'address'   => $this->input->post('address'),
					'emergency_address'   => $this->input->post('emergency_address'),
					'phone_no'  => $this->input->post('phone'),
					'creation_date' => $creationdate,
					'bloodgroup' => $this->input->post('bloodgroup'),
					'identification_mark' =>$this->input->post('identification_mark'),
					'officephone' => $this->input->post('officephone'));				
			$this->db->insert('acad_users',$inp);
			$data['css'] = 'admin_create_user.css';
		//	$data['navigation'] = 'faculty/faculty_navigation.php';
			$this->load->view('includes/template', $data);
			echo "successfully Registered";
		}
	}
	
	function checkuser($str)
		{
		if ($str)
		{
			$query = "select * from acad_users where user_id=$str";
			$query = $this->db->query($query);
			if($query->num_rows() == 1){
			$this->form_validation->set_message('checkuser', '%s has already been taken');
			return FALSE;
			}
			return true;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	function val_updateuser(){
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_id', 'UserId', 'required|min_length[9]|max_length[10]');
		$this->form_validation->set_rules('user_id', 'UserId' ,'callback_changeuser');
		$this->form_validation->set_rules('user_name', 'UserName', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Password confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('user_type', 'Usertype', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('email_id', 'EmailId', 'required|valid_email');
		$this->form_validation->set_rules('emergency_address', 'Emergency address', 'required');
		$this->form_validation->set_rules('phone', 'Phone No', 'required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('identification_mark', 'Identification mark', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['css'] = 'admin_create_user.css';
	//		$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['maincontent'] = 'admin/showing_userinfo';
			$user_id = $_POST['user_id'];
			$data['details'] = $this->faculty_model->get_stu_details($user_id);
			if($data['details'] != null)
				$this->load->view('includes/template', $data);
			else{
				$data['css'] = 'admin_create_user.css';
	//			$data['navigation'] = 'faculty/faculty_navigation.php';
				$data['maincontent'] = 'admin/updateusermainpage';
				$data['error'] ="userId does not exists, please enter correctly or create a new one" ;
				$this->load->view('includes/template', $data);
			}
		}
		else {
		if($this->input->post('creation_date') =='')
		$creationdate = date(" 'Y'-'m'-'d'");
		else
		$creationdate = $this->input->post('creation_date');
			$inp = array( 'user_id' => $this->input->post('user_id'),
					'candidate_name' => $this->input->post('user_name'),
					'password'=> md5($this->input->post('password')),
					'user_type'=>$this->input->post('user_type'),
					'email_id' =>$this->input->post('email_id'),
					'first_name' =>$this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'dob'       => $this->input->post('dob'),
					'gender'    => $this->input->post('gender'),
					'status'    => $this->input->post('status'),
					'image'    => $this->input->post('image'),
					'address'   => $this->input->post('address'),
					'emergency_address'   => $this->input->post('emergency_address'),
					'phone_no'  => $this->input->post('phone'),
					'creation_date' => $creationdate,
					'bloodgroup' => $this->input->post('bloodgroup'),
					'identification_mark' =>$this->input->post('identification_mark'),
					 'officephone' => $this->input->post('officephone'));
				$uid =$this->input->post('user_id');
				$this->db->where('user_id', $uid);
				$this->db->update('acad_users', $inp); 
		//		$query = $this->db->query($query);
			    echo "Update was successful";
		}
	}
	
	
	function changeuser($str)
		{
		if ($str){
			$query = "select * from acad_users where user_id='$str'";
			$query = $this->db->query($query);
			if($query->num_rows() == 0){
			$this->form_validation->set_message('changeuser', '%s doesn\'t exist, Please enter the valid user to proceed');
			return FALSE;
		}
			return true;
		}
		else{
			return TRUE;
		}
	}
	
	function feedetails(){
		$data['css'] = 'admin_feeform.css';
	//	$data['navigation'] = 'admin/faculty_navigation.php';
		$data['maincontent'] = 'admin/fee_form';
		$this->load->view('includes/template', $data);
		
	}
	
	function enterfeedetails(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('studentname', 'Student Name' ,'required');
		$this->form_validation->set_rules('studentid', 'StudentId' ,'callback_changeuser|required');
		$this->form_validation->set_rules('progrm', 'program' ,'required');
		$this->form_validation->set_rules('batch', 'Batch' ,'required|numeric');
		$this->form_validation->set_rules('Semster', 'program' ,'required');
		$this->form_validation->set_rules('receiptno', 'receiptno' ,'required');
		if ($this->form_validation->run() == FALSE){
		$data['css'] = 'admin_feeform.css';
	//	$data['navigation'] = 'faculty/faculty_navigation.php';
		$data['maincontent'] = 'admin/fee_form';
		$this->load->view('includes/template', $data);
		}
		else{
			$semid = $this->input->post('Semster');
			echo $semid;
			$query = "select * from acad_sem_list where semester='$semid'";
			$query = $this->db->query($query);
			$res = $query->result_array();
			foreach($res as $row)
			$semid = $row['sem_id'];
			$inp = array( 'user_id' => $this->input->post('studentid'),
					'candidate_name' => $this->input->post('studentname'),
					'program' =>$this->input->post('progrm'),
					'batch_year' =>$this->input->post('batch'),
					'reciept_number' => $this->input->post('receiptno'),
					'tution_fee'       => $this->input->post('tutionfee'),
					'excess_payment'    => $this->input->post('excesspayment'),
					'total'    => $this->input->post('total'),
					'cash_amount'    => $this->input->post('cashamount'),
					'DD/cheque_amount'   => $this->input->post('dd/chequeamount'),
					'DD/cheque_numbers'   => $this->input->post('dd/chequeno'),
					'DD/cheque_date'  => $this->input->post('dd/chqquedate'),
					'DD/cheque_iss_bank' =>  $this->input->post('dd/chequebank'),
					'hostel_fee' =>$this->input->post('hostelfee'),
					'medical_insurance' =>$this->input->post('medialinsurance'),
					'registration_fee' =>$this->input->post('registrationfee'),
					'approved_date' =>$this->input->post('approveddate'),
					'Electricity_charges ' =>$this->input->post('electricitycharges'),
					'late_fee ' =>$this->input->post('latefee'),
					'sem_id' =>$semid 
					 );
				
			$r = $this->db->insert('acad_fee_structure',$inp);
			if(!$r){
				echo "There is some error in the details provided, may be you are inserting for the second time";
				$data['css'] = 'admin_feeform.css';
			//	$data['navigation'] = 'faculty/faculty_navigation.php';
				$data['maincontent'] = 'admin/fee_form';
				$this->load->view('includes/template', $data);
			}
		//	$data['navigation'] = 'faculty/faculty_navigation.php';
			$data['css'] = 'admin_feeform.css';
			$this->load->view('includes/template', $data);
			echo "successful entry";
		}
	
	
  
}
function course_offerhome(){
		$this->load->view('admin/c_offerhome');
	}
  
	function course_offer(){
		    $this->load->model('admin/admin_model');
	      $this->load->model('admin/announce_model');
        if($this->input->post('submit')){
          if($this->input->post('slot_no')!=''){
            $this->admin_model->course_offer();
            $data['message']='Succesfully offered';
          }
          else
            $data['message']="slot_no cannot be empty";
        
        }
        if($this->input->post('offer')){
          $this->admin_model->offer_update();
          $data['message']="Offer courses now for ".$this->input->post('program_u')." ".$this->input->post('batch_year_u');
        } 
        $data['program']=$this->announce_model->get_program();
	      $data['year']=$this->announce_model->get_year();
	      $data['courses']=$this->announce_model->announce_courses();
        $data['candidate']=$this->admin_model->get_details_id($this->session->userdata('user_id'));
        $data['permissions']=$this->admin_model->get_eligibility();
        $data['semesters']=$this->announce_model->sem_list();
        $data['css'] = 'admin_home.css';
	      $data['javascript'] = 'default.js';
	      $data['navigation'] = 'admin/admin_navigation.php';
	      $data['maincontent'] = 'admin/c_offered';
	      $this->load->view('includes/template',$data);
	}
	
	function course_offer_insert(){
		$inp = array('program' => $_POST['program'],
					 'course_id' => $_POST['cid'],
					 'batch_year' => $_POST['batch'],
					 'present_year'=> date('Y'),
					 'sem_id'      => $_POST['semid'],
					 'audit'       => $_POST['audit'],
					 'slot_no'     => $_POST['slot_no'],
					 'status'     => $_POST['status']);
		$this->db->insert('acad_cou_offer',$inp);
		redirect("/admin/admin/course_offerhome");
	}
	


	function updateuserinfo(){
		if(isset($_POST['sid']))
		$uid = $_POST['sid'];
		else
		redirect("/faculty/faculty/updatemainpage");
		$query = "select * from acad_user where user_id=$sid";
		$query = $this->db->query($query);
		
		if($query->num_rows >0){
			$a = $query->result_array();
    }
    else 
			echo "Please select a correct user";
	}
	
	
	// New Insert User function:
	 function createn_user(){
    $this->load->model('admin/admin_model');  
    $data['css'] = 'admin_home.css';
    $data['javascript'] = 'default.js';
    $data['navigation']='admin/admin_navigation';
    $data['permissions']=$this->admin_model->get_eligibility();
    $data['maincontent'] = 'admin/add_user';
	  $this->load->view('includes/template', $data);
  }
	
	function callback_checkdob($str){
		if($str){
			$ar = explode($str,'-');
			$t = mktime(0,0,0,$ar[1],$ar[2],$ar[0]);
			if(($t-time()) > 0){
			$this->form_validation->set_message('checkdob', 'please enter valid dob');
			return FALSE;
		}
			return true;	}
		else
		return true;
	
	
	}
	
	function insertuser(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_id', 'User Id' ,'required|callback_checkuser|min_length[9]|max_length[10]|numeric');
		$this->form_validation->set_rules('user_name', 'User Name' ,'required');
		$this->form_validation->set_rules('password', 'Password' ,'required|min_length[5]');
		$this->form_validation->set_rules('confirm_password', 'Confirm password' ,'matches[password]|required');
		$this->form_validation->set_rules('email_id', 'EmailId' ,'required|valid_email');
		$this->form_validation->set_rules('gender', 'Gender' ,'required');
		$this->form_validation->set_rules('dob', 'Date of Birth' ,'required|callback_checkdob');
		$this->form_validation->set_rules('phone_no', 'Phone Number' ,'required|numeric');
		$this->form_validation->set_rules('bloodgroup','Blood Group','required');
		$this->form_validation->set_rules('emergency_address', 'Emergency Address' ,'required');
		$this->form_validation->set_rules('address', 'Address' ,'required');
		$this->form_validation->set_rules('identification_mark', 'Identification Mark' ,'');
		$this->form_validation->set_rules('first_name', 'First Name' ,'required');
		$this->form_validation->set_rules('last_name', 'Last Name' ,'required');
		$this->form_validation->set_rules('twelfth_school', 'Last Name' ,'');
		$this->form_validation->set_rules('twelfth_year', 'Last Name' ,'');
		$this->form_validation->set_rules('twelfth_per', 'Last Name' ,'');
		$this->form_validation->set_rules('twelfth_board', 'Last Name' ,'');
		$this->form_validation->set_rules('tenth_board', 'Last Name' ,'');
		$this->form_validation->set_rules('tenth_per', 'Last Name' ,'');
		$this->form_validation->set_rules('date_of_joining', 'Last Name' ,'');
		$this->form_validation->set_rules('degrees', 'Last Name' ,'');
		$this->form_validation->set_rules('area_of_expertise', 'Last Name' ,'');
		$this->form_validation->set_rules('experience', 'Last Name' ,'');
		$this->form_validation->set_rules('link', 'Last Name' ,'');
		if ($this->form_validation->run() == FALSE){
			$data['css'] = 'admin_home.css';
			$data['maincontent'] = 'admin/add_user';
      $this->load->model('admin/admin_model');
      $data['permissions']=$this->admin_model->get_eligibility();
      $data['navigation']='admin/admin_navigation';
      $data['javascript'] = 'default.js';
			$this->load->view('includes/template', $data);
		}
		else{
		//	$creationdate = $this->input->post('creation_date');
			$inp = array( 'user_id' => $this->input->post('user_id'),
					'candidate_name' => $this->input->post('user_name'),
					'password'=> md5($this->input->post('password')),
					'user_type'=>$this->input->post('user_type'),
					'email_id' =>$this->input->post('email_id'),
					'first_name' =>$this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'dob'       => $this->input->post('dob'),
					'gender'    => $this->input->post('gender'),
					'status'    => 'active',
          //'image'    => $this->input->post('image'),
					'address'   => $this->input->post('address'),
					'emergency_address'   => $this->input->post('emergency_address'),
					'phone_no'  => $this->input->post('phone_no'),
					'creation_date' => date('Y-m-d'),
					'bloodgroup' => $this->input->post('bloodgroup'),
					'identification_mark' =>$this->input->post('identification_mark'),
					);				
			$this->db->insert('acad_users',$inp);
			if($this->input->post('user_type') == "fac"){
				$inp = array('user_id' => $this->input->post('user_id'),
							'name' => $this->input->post('user_name'),
							'area_of_expertise' => $this->input->post('area_of_expertise'),
							'experience'        => $this->input->post('experience'),
							'degrees'           =>  $this->input->post('degrees'),
							'link'              =>   $this->input->post('link'),
							'date_of_joining'   =>   $this->input->post('date_of_joining'));
			$this->db->insert('acad_fac_profile',$inp);
			}	
			else if($this->input->post('user_type') == "stu"){
				$inp = array('user_id' => $this->input->post('user_id'),
							 'twelfth_percentage' => $this->input->post('twelfth_per'),
							  'tenth_percentage'  => $this->input->post('tenth_per'),
							  'school_name'       => $this->input->post('twelfth_school'),
							  'twelfth_board'     => $this->input->post('twelfth_board'),
							  'twelfth_year'      => $this->input->post('twelfth_year'));
							  echo "hi";
			$this->db->insert('acad_stu_profile', $inp);
				$inp = array('user_id' => $this->input->post('user_id'),
							  'program' => $this->input->post('program'),
							  'batch_year' => $this->input->post('batch_year'),
							  'present_sem_id' => 1,
							  'lab_group' => $this->input->post('lab_group'));
			$this->db->insert('acad_batch',$inp);
		//	 redirect("admin/admin/deadline");
			}	
		}
	}
	
	
	
	
	
	
  
  
} 
?>

