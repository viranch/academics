<html>
<head>
	<title></title>
</head>
<body>
<?php echo validation_errors(); ?>
<?php echo form_open('http://127.0.0.1/Projects/index.php/vishu/enternewforum'); ?>
<h5>Subject</h5>
<?php echo form_input(array(
			'name' => 'subject' ,
			'size' => '100' ,
            'maxsize' => '200')
            ); ?>
<br />
<br />
<p> Descripton </p>
<?php echo form_textarea(array(
            'name' => 'description' , 
            'rows' => '10',
			'cols' => '100')
			); ?>
<?php echo form_submit('forum submit' , 'Submit Forum'); ?>

</body>
</html>