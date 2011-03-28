<?php
$this->load->view('includes/header');
if(isset($navigation))
$this->load->view($navigation);
if(isset($maincontent))
$this->load->view($maincontent);
$this->load->view('includes/footer');
?>

