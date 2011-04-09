<?php
		class Check_Registration extends CI_Controller {
			public function index(){
				$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|alpha_numeric');
						if ($this->form_validation->run() == FALSE)
						{
							$this->load->view('registration');
						}
		else
		{
	/*	    $this->load->library('email');
			$config['protocol'] = 'smtp';
		//	$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_user'] = 'vishu.revuri@gmail.com';
			$config['smtp_pass'] = '80460814674';
			$config['smtp_port'] = '465';
			$this->email->initialize($config);
			$this->email->from('vishu.revuri@gmail.com', 'Your Name');
$this->email->to('vishvesh.revoori@gmail.com');
$this->email->cc('another@another-example.com');
$this->email->bcc('them@their-example.com');

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');
$this->email->send(); */
            $this->load->library('calendar');
			
            echo $this->calendar->generate();
		    $name = $this->input->post('username');
			$data = array( 'name' => $name );
			$this->load->view('formsuccess', $data);
		}
			}
		}
?>