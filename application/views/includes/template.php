<?php
$this->load->view('includes/header');
if(isset($navigation))
$this->load->view($navigation);
if(isset($maincontent))
$this->load->view($maincontent);
if(!isset($footer))
$this->load->view('includes/footer');
?>

