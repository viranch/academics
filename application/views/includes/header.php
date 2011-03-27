<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
  <head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>acaedamics</title>  
      <?php if(isset($css)):?>
      <link href="<?php echo base_url(); ?>assets/css/<?php echo "{$css}";?>" media="screen" rel="stylesheet" type="text/css" />  
      <?php endif; ?>
      <?php if (isset($javascript)):?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>  
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/<?php echo "{$javascript}";?>"></script>  
      <?php endif;?>
  </head>  
  <body>  
