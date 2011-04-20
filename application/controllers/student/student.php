<?php 
/*
 *Class defnition
 */
class Student extends CI_Controller { 

    function __construct(){
      parent::__construct();
      $this->isstudent();     
    }
    function lectures()
    {
      $data['css'] = 'style.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/courses_lectures';
      $this->load->model('student/student_model');
      $data['batch']=$this->student_model->get_batch();
      $data['courses']=$this->student_model->get_present_courses();
      $data['timetable']=$this->student_model->get_timetable($data['batch']);
      $this->load->view('includes/template',$data);
    
    }
    
    
    
    function index(){ 
      
      $data['css'] = 'style.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/home';
      $this->load->model('student/student_model');
      $data['courses']=$this->student_model->get_present_courses();
      $data['batch']=$this->student_model->get_batch1();
      if(empty($data['batch'])){
        $data['message']="Please contact administrator<br>No batch entry for the student in daiict";
      }
      $data['timetable']=$this->student_model->get_timetable($data['batch']);
      $data['announcements']=$this->student_model->get_announcements($data['batch'],5);
      $data['deadlines']=$this->student_model->get_deadlines(5);
      $this->load->view('includes/template',$data);
    }
    
    
    function announcements()
    {
      
      $data['css'] = 'style.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/announcements';
      $this->load->model('student/student_model');
      $data['courses']=$this->student_model->get_present_courses();
      $data['batch']=$this->student_model->get_batch();
      $data['timetable']=$this->student_model->get_timetable($data['batch']);
      $data['announcements']=$this->student_model->get_announcements($data['batch'],35);
       $this->load->view('includes/template',$data);
    }
    function importantdates()
    {
       
      $data['css'] = 'style.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/important_dates';
      $this->load->model('student/student_model');
      $data['courses']=$this->student_model->get_present_courses();
      $data['batch']=$this->student_model->get_batch();
      $data['timetable']=$this->student_model->get_timetable($data['batch']);
      $data['important_dates']=$this->student_model->get_important_dates(35);
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
      $this->load->model('student/registration_model');
      if($this->uri->segment(4))
        $data['message']=str_replace('_',' ',$this->uri->segment(4));
      $data['batch']=$this->student_model->get_batch();
      $data['batch1']=$this->student_model->get_batch1();
        if(empty($data['batch1'])){
          $data['message1']='Sorry No batch infromation stored for user';
          $data['footer']=1;
        }
        else{
          $data['approval']=$this->student_model->unapproved_exist();
          $data['ugcapproval']=$this->registration_model->get_UGC_approval();
          $data['reg']=$this->student_model->get_all_courses_offered($data['batch1']);
          if(empty($data['reg']))
            $data['footer']=1;
          $data['backlog']=$this->student_model->get_backlog($data['batch']);
          $data['courses']=$this->student_model->get_present_courses();
          $data['elective']=$this->student_model->elective_status();
          $data['gradeimprovement']=$this->student_model->get_grade_improvement();
        }
      //$this->load->view('student/registration',$data);
      $data['css'] = 'style.css';
      $data['javascript'] = 'registration.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/course_reg';
      
      $this->load->view('includes/template',$data);
    }
    
    function show_unapproved()
    {
      if($this->uri->segment(4))
        $data['message']=str_replace('_',' ',$this->uri->segment(4));
      $this->load->model('student/student_model');
      $this->load->model('student/registration_model');
      $data['approval']=$this->student_model->unapproved_exist();
      $data['ugcapproval']=$this->registration_model->get_UGC_approval();
      if($this->student_model->unapproved_exist() == 0)
        redirect('student/student/registration');
      $data['batch1']=$this->student_model->get_batch1();
      $data['courses']=$this->student_model->get_present_courses();
      $data['css'] = 'style.css';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/course_reg1';
      $data['elective']=$this->student_model->elective_status();
      $data['reg']=$this->student_model->get_all_courses_offered($data['batch1']);   
      $data['restrict']=$this->registration_model->get_deadline($data['batch1']);
      $data['unapproved']=$this->student_model->get_unapproved();
      $this->load->view('includes/template',$data);
    }

    /*
     * Validation after registration
     */
    function val_reg()
    {
      
      $this->load->model('student/registration_model');
      $this->load->model('student/student_model');
      $data['batch1']=$this->student_model->get_batch1();
      $restrictions=$this->registration_model->get_deadline($data['batch1']);
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
        redirect('student/student/registration/'.$message);
      }
      if($restrictions['0']['deadline'] < date("Y-m-d")){
        $message="The_registration_is_closed";
        redirect('student/student/registration/'.$message);
      }
	
	if($restrictions['0']['opening_date'] > date("Y-m-d")){
        
		$message="Sorry_registration_not_yet_open";
        redirect('student/student/registration/'.$message);
      }
      if($restrictions['0']['credits']< $totalcredits){
        $message="Exceeding_credits";
        redirect('student/student/registration/'.$message);
      }
      if($restrictions['0']['min_credits']>$totalcredits){
        $message="sorry_minimum_credits_limit_is_".$restrictions['0']['min_credits'];
        redirect('student/student/registration/'.$message);
      }
      if($restrictions['0']['min_courses']>$total_courses){
        $message="sorry_minimum_courses_limit_is_".$restrictions['0']['min_courses'];
        redirect('student/student/registration/'.$message);
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
    
      $data['css'] = 'style.css';
      $data['javascript'] = 'default.js';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/fee';
      $sem_id=$this->uri->segment(4);
      $this->load->model('student/fee_model');
      $data['sems']=$this->fee_model->get_sems();
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
      $data['elective']=$this->student_model->elective_status();
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
      $this->load->model('student/registration_model');
      $data['batch']=$this->student_model->get_batch1();
      $data['courses']=$this->student_model->get_present_courses();
      if($this->input->post('submit')){
        $this->registration_model->drop($data['batch']);
      }
      $data['approval']=$this->student_model->unapproved_exist();
      $data['ugcapproval']=$this->registration_model->get_UGC_approval();
      $data['drop']=$this->student_model->get_drop_courses();
      $data['css'] = 'style.css';
      $data['navigation'] = 'student/student_navigation.php';
      $data['maincontent'] = 'student/course_reg2';
      $data['javascript'] = 'default.js';
      $data['reg']=$this->student_model->get_all_courses_offered($data['batch']);
      $data['footer']=1;   
      $this->load->view('includes/template',$data);
    
    }

	
	
	function newforum($cid){
		$this->load->model("student/student_model");
		$data['courses']=$this->student_model->get_present_courses();
		$data['batch']=$this->student_model->get_batch();
		$data['timetable']=$this->student_model->get_timetable($data['batch']);
		$data['important_dates']=$this->student_model->get_important_dates(2);
		$data['announcements']=$this->student_model->get_announcements($data['batch'],5);
		$data['deadlines']=$this->student_model->get_deadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'student/student_navigation.php';
		$data['maincontent'] = 'student/new_forum.php';
		$data['cid'] = $cid;
		$this->load->view("includes/template", $data);
	
	}
	
	function updateforum($cid){
		$this->load->model("student/student_model");
		$this->student_model->insertforum($cid);
		redirect("/student/lectures/index/".$cid);
	}
	
	
	function commnentingpage($fid){
		$this->load->model("student/student_model");
		$data['comments'] = $this->student_model->getcomments($fid);
		$data['courses']=$this->student_model->get_present_courses();
		$data['batch']=$this->student_model->get_batch();
		$data['timetable']=$this->student_model->get_timetable($data['batch']);
		$data['important_dates']=$this->student_model->get_important_dates(2);
		$data['announcements']=$this->student_model->get_announcements($data['batch'],5);
		$data['deadlines']=$this->student_model->get_deadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'student/student_navigation.php';
		$data['maincontent'] = 'student/commenting_forum.php';
		$this->load->view("includes/template", $data);
		}
  function forum($cid){
    $this->load->model("student/student_model");
    $data['courses']=$this->student_model->get_present_courses();
    $data['batch']=$this->student_model->get_batch();
    $data['timetable']=$this->student_model->get_timetable($data['batch']);
    $data['important_dates']=$this->student_model->get_important_dates(2);
    $data['announcements']=$this->student_model->get_announcements($data['batch'],5);
    $data['deadlines']=$this->student_model->get_deadlines();
    $data['info'] = $this->student_model->forums($cid);
    $data['css'] = 'style.css';
    $data['navigation'] = 'student/student_navigation.php';
    $data['maincontent'] = 'student/forummainpage.php';
    $data['cid'] =$cid;
    $this->load->view("includes/template", $data);
  }
    

	function insertcomment($fid,$cid){
		$this->load->model("student/student_model");
    $this->student_model->insertcomment($fid);
		redirect("/student/student/f/".$fid."/".$cid);	
	}
  
  function f(){
    $fid=$this->uri->segment(4);
    $cid=$this->uri->segment(5); 
    $data['cid']=$cid;   
    $this->load->model("student/student_model");
    $data['info'] = $this->student_model->forums($cid);
		$data['forum'] = $this->student_model->getforum($fid);
		$data['comments'] = $this->student_model->getcomments($fid);
		$data['courses']=$this->student_model->get_present_courses();
		$data['batch']=$this->student_model->get_batch();
		$data['timetable']=$this->student_model->get_timetable($data['batch']);
		$data['important_dates']=$this->student_model->get_important_dates(2);
		$data['announcements']=$this->student_model->get_announcements($data['batch'],5);
		$data['deadlines']=$this->student_model->get_deadlines();
		$data['css'] = 'style.css';
		$data['navigation'] = 'student/student_navigation.php';
		$data['maincontent'] = 'student/commenting_forum.php';
		$this->load->view("includes/template", $data);
	}
	
  

} 
 ?>

