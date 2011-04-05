<?php
		class vishu extends CI_Controller {
		  
			public function index(){
			    echo "<title>main page </title>";
			    echo anchor("http://127.0.0.1/Projects/index.php/vishu/forum","Go to Forum" ,array()) . "</br>";
				echo anchor("http://127.0.0.1/Projects/index.php/vishu/grades","Go to Grades" ,array()). "</br>";
				echo anchor("http://127.0.0.1/login.html","Go to quiz" ,array()). "<br/>";
				echo anchor("http://127.0.0.1/Projects/index.php/vishu/displaycalender","Go to Calender" ,array());
				}
			public function displaycalender(){
				$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => 'http://127.0.0.1/Projects/index.php/vishu/displaycalender');
				$this->load->library('calendar', $prefs);
                echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
			
			}
			public function grades(){
				$this->load->model('forumcrud');
				$this->forumcrud->displaygrades();
			}
			
			public function getgradedetails($psem){
			    $this->load->model('forumcrud');
				$this->forumcrud->displaygradedetails($psem);
            }			
			
			public function forum(){
				$config['database'] = "acadamics";
				$this->load->database($config);
				$re = $this->db->query('SELECT fid,bywho,subject,description FROM forum');
				$data['info'] = $re;
				$this->load->view("forummainpage", $data);
			}
		
		     	public function nforum(){
				$this->load->view('forumentry');
			}
			
			
            public function comments($fid){
			$this->load->model('forumcrud');
			$this->forumcrud->getcomments($fid);
			}
						
		    public function enternewforum( ){
				$this->form_validation->set_rules('subject', 'Subject', 'required');
				$this->form_validation->set_rules('description', 'Description', 'required');
						if ($this->form_validation->run() == FALSE)
							$this->load->view('forumentry');
						else{
						    $this->load->model('forumcrud');
							$this->forumcrud->nforumentry();
							echo "your forum has been submitted sucessfully" . "<br />";
						    echo anchor("http://127.0.0.1/Projects/index.php/vishu/","Go back to main page" ,array());
						}
			}
							
			public function commentpage($fid){
				$this->load->model('forumcrud');
		     	$this->forumcrud->getcommentswithcommentingoption($fid);
			}
				
			public function commentsubmission($fid){
				$this->form_validation->set_rules('comment','Comment', 'required');
				if ($this->form_validation->run() == FALSE){
					$c = "http://127.0.0.1/Projects/index.php/vishu/commentpage/".$fid;
					redirect($c);
				}
				else{
					$this->load->model('forumcrud');
					$this->forumcrud->insertcomment($fid);
					echo "your comment has been submitted sucessfully" . "<br />";
				    $y ="http://127.0.0.1/Projects/index.php/vishu/comments/".$fid ;
					echo anchor($y,"Go back to comment page" ,array());
					echo "<br />";
					echo anchor("http://127.0.0.1/Projects/index.php/vishu/","Go back to main page" ,array());
				}
			}
		}?>