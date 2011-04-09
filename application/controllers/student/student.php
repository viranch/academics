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
      $data['css'] = 'style.css';
      $data['javascript'] = '';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/home';
      $this->load->model('student/student_model');
      $data['courses']=$this->student_model->get_present_courses();
      $data['batch']=$this->student_model->get_batch();
      $data['timetable']=$this->student_model->get_timetable($data['batch']);
      $data['important_dates']=$this->student_model->get_important_dates(4);
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
    function registration()
    {
      
      $this->load->model('student/student_model');
      $data['batch']=$this->student_model->get_batch();
      $data['reg']=$this->student_model->get_all_courses_offered($data['batch']);
      $data['backlog']=$this->student_model->get_backlog($data['batch']);
      $data['courses']=$this->student_model->get_present_courses();

      //$this->load->view('student/registration',$data);
      $data['css'] = 'style.css';
      $data['javascript'] = 'registration.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/course_reg';
      $data['gradeimprovement']=$this->student_model->get_grade_improvement();
      $this->load->view('includes/template',$data);
    }
    
    function show_unapproved()
    {
      if($this->uri->segment(4))
        $data['message']=str_replace('_',' ',$this->uri->segment(4));
      $this->load->model('student/student_model');
      if($this->student_model->unapproved_exist() == 0)
        redirect('student/student/registration');
      $data['batch']=$this->student_model->get_batch();
      $data['courses']=$this->student_model->get_present_courses();
      $data['css'] = 'style.css';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/course_reg1';
      $data['reg']=$this->student_model->get_all_courses_offered($data['batch']);   
      $data['unapproved']=$this->student_model->get_unapproved();
      $this->load->view('includes/template',$data);
    }

    /*
     * Validation after registration
     */
    function val_reg()
    {
      $this->load->model('student/registration_model');
      $data['batch']=$this->registration_model->get_batch();
      $restrictions=$this->registration_model->get_deadline($data['batch']);
      $courses=array();
      $backlog=array();
      $grade=array();
      $audit=array();
      $glo_count=0;
      $totalcredits=0;
      $count=1;
      $elec=array();
      
      while($count <= $this->input->post('core')){
        if ($this->input->post($count)!='') {
          $courseid=$this->input->post($count);
          $cre=$this->registration_model->get_credits($courseid);
          $totalcredits=$totalcredits+$cre[0]['credits'];
          $courses[$glo_count]=$courseid;
          $glo_count++;
        }
        $count++;
      }
      
      $glo_count=0;
      
      for($count1=0;$count1 < $this->input->post('elective');$count1++){
        if ($this->input->post($count)!='') {
          $courseid=$this->input->post($count); 
          $cre=$this->registration_model->get_credits($courseid);
          $totalcredits=$totalcredits+$cre[0]['credits'];
          $elec[$glo_count]=$courseid;
          $glo_count++;
        }
        $count++;
      }
      
      $glo_count=0;

      for($count1=0;$count1 < $this->input->post('grade');$count1++){
        if ($this->input->post($count)!='') {
          $courseid=$this->input->post($count);
          $cre=$this->registration_model->get_credits($courseid);
          $totalcredits=$totalcredits+$cre[0]['credits'];
          $grade[$glo_count]=$courseid;
          $glo_count++;
        }
        $count++;
      }
      
      $glo_count=0;

      for($count1=0;$count1 < $this->input->post('backlog');$count1++){
        if ($this->input->post($count)!='') {
          $courseid=$this->input->post($count);
          $cre=$this->registration_model->get_credits($courseid);
          $totalcredits=$totalcredits+$cre[0]['credits'];
          $backlog[$glo_count]=$courseid;
          $glo_count++;
        }
        $count++;
      }
      $glo_count=0;

      for($count1=0;$count1 < $this->input->post('audit');$count1++){
        $flag=1;
        if ($this->input->post($count)!='') {
          $courseid=$this->input->post($count);
          if(isset($elec)){
            foreach ($elec as $key) {
              if($courseid==$key)
                $flag=0;
            }
          }
          if($flag){
            $audit[$glo_count]=$courseid;
          $cre=$this->registration_model->get_credits($courseid);
          $totalcredits=$totalcredits+$cre[0]['credits'];
            $glo_count++;
          }
          $flag=1;
        }
        $count++;
      }
      
      $total_courses=count($courses)+count($elec)+count($grade)+count($audit)+count($backlog);
      
      if($restrictions['0']['courses_number'] < $total_courses){
        $message="Sorry_exceeding_total_courses";
        redirect('student/student/show_unapproved/'.$message);
      }
      if($restrictions['0']['deadline'] < date("Y-m-d")){
        $message="The_registration_is_closed";
        redirect('student/student/show_unapproved/'.$message);
      }
      if($restrictions['0']['credits']< $totalcredits){
        $message="Exceeding_credits";
        redirect('student/student/show_unapproved/'.$message);
      }
      
      $status=$this->registration_model->get_unapproved();
      if($status==1){
        $this->registration_model->delete_unapproved();
        $this->registration_model->changeimprovement();
      }
      foreach ($courses as $courseid) {
         $slot=$this->registration_model->slotno($courseid);
         $this->registration_model->register($this->input->post('sem_id'),$slot[0]['slot_no'],$courseid,0);
      }
      
      foreach ($elec as $courseid) {
         $slot=$this->registration_model->slotno($courseid);
         $this->registration_model->register($this->input->post('sem_id'),$slot[0]['slot_no'],$courseid,0);
      }
      
      foreach ($grade as $courseid) {
          $query="update acad_stu_cou set status='grade_improvement' where course_id='".$courseid."' and user_id='".$this->session->userdata('user_id')."'";
          $query = $this->db->query($query);
       }
      foreach ($audit as $courseid) {
          $slot=$this->registration_model->slotno($courseid);
           $this->registration_model->register($this->input->post('sem_id'),$slot[0]['slot_no'],$courseid,1); 
      }
      foreach($backlog as $courseid){ 
        $this->registration_model->register($this->input->post('sem_id'),10,$courseid,0); 
        
      }
      redirect('student/student/show_unapproved/Succesfully_registered');
      
    }
   /*
    *end of registration validation
    */ 

    function fee()
    {
      $data['css'] = 'style_home_baba.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/fee';
      $sem_id=$this->uri->segment(4);
      $this->load->model('student/fee_model');
      $data['fee']=$this->fee_model->get_fee($sem_id);
      $this->load->view('includes/template',$data);
    
    }
    /*
     * student profile
     */
    function profile()
    {
      $data['css'] = 'style.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/student_profile';
      $this->load->model('student/student_model');
      $data['batch']=$this->student_model->get_batch();
      $data['profile']=$this->student_model->get_user_profile();
      $data['student']=$this->student_model->get_student_profile();
      $data['courses']=$this->student_model->get_present_courses();
      $data['timetable']=$this->student_model->get_timetable($data['batch']);
      $data['important_dates']=$this->student_model->get_important_dates(4);       
      $this->load->view('includes/template',$data);
    
    }
    function grades()
    {
      $this->load->model('student/student_model');
      $data['css'] = 'style.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/grades';
      $data['semester'] = $this->student_model->get_sems_student();
      $sem_id=$this->uri->segment(4);
      $data['course']=$this->student_model->get_course_performance($sem_id);    
      $data['spi']=$this->student_model->get_sem_performance($sem_id);
      $data['cpi']=$this->student_model->get_student_profile();
      $this->load->view('includes/template',$data);
    
    }
    function drop_courses()
    {
      $this->load->model('student/student_model');
      $data['batch']=$this->student_model->get_batch();
      $data['courses']=$this->student_model->get_present_courses();
      $data['drop']=$this->student_model->get_drop_courses();
      $data['css'] = 'style.css';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/course_reg2';
      $data['javascript'] = 'default.js';
      $data['reg']=$this->student_model->get_all_courses_offered($data['batch']);   
      $this->load->view('includes/template',$data);
    
    }
    function val_drop()
    {
      $number=$this->input->post('number');
      echo $number;
    }

} 
 ?>

