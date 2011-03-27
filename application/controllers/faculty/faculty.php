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
      echo "This is faculty";
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

