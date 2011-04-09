<?php

/**
* SENDS EMAIL WITH GMAIL
*/
class Email extends Controller
{
	function __construct()
	{
		parent::Controller();
	}
	
	function index() 
	{	
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('nettutsTutorials@gmail.com', 'Jeffrey Way');
		$this->email->to('nettutsTutorials@gmail.com');		
		$this->email->subject('This is an email test');		
		$this->email->message('It is working. Great!');
		
		$path = $this->config->item('server_root');
		$file = $path . '/ci_day3/attachments/yourInfo.txt';
		
		$this->email->attach($file);
		
		if($this->email->send())
		{
			echo 'Your email was sent, fool.';
		}
		
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}


      
