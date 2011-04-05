<?php 
class Forum extends CI_Controller {
    function index(){
	    $data['query'] = $this->db->query('SELECT subject,description FROM forum');
		$this->load->view('forummainpage', $data);
		}
	}
	public function forum(){
	   $data['query'] = $this->db->query('SELECT subject,description FROM forum');
		$this->load->view('forummainpage', $data);
		}
		
?>