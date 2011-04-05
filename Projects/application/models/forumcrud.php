<?php
class forumcrud extends CI_Model {

   var $course       = '';
   var $bywho        = '';
   var $timeofpost   = ''; 
   var $subject      = '';
   var $description  = '';
   var $fid          = '';
  // var $comment      = '';
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function nforumentry(){
	    $this->subject   = $_POST['subject']; 
        $this->description = $_POST['description'];
        $this->timeofpost    = time();
		$this->bywho      = "vishvesh";
		$this->course     = "it332"; 
        $this->db->insert('forum', $this);
	}
	
	function getcomments($fid){
	    $query = $this->db->query("select content , bywho ,fid, timeofpost from comments where fid = '$fid'");
        $data['info'] = $query;
		$this->load->view('commentspage', $data);
    }
	
	function getcommentswithcommentingoption($fid){
	    $query = $this->db->query("select content , bywho ,fid, timeofpost from comments where fid = '$fid'");
        $data['info'] = $query;
		$this->load->view('tocommentpage', $data);
		}
		
		
	function insertcomment($fid){
		$bywho      = "vishvesh";
	    $timeofpost = time();
		$fid = $fid;
		$comment = $_POST['comment'];
		$data = array('bywho' => $bywho , 'timeofpost' => $timeofpost , 'fid'=> $fid , 'content' => $comment);
		$qry = $this->db->insert_string('comments', $data);
		$this->db->query($qry);
	}
	
	function displaygrades(){
		$present_sem = 8;
        $data = array('psem' => $present_sem);
		$this->load->view('mainpage_grade', $data);
	}
	
	function displaygradedetails($psem){
	

	
	}
}
 ?>