<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration form</title>
</head>

<body>
<h1> Registration </h1>
<?php echo  validation_errors(); ?>

<?php echo form_open('http://127.0.0.1/Projects/index.php/check_registration'); ?>
<ul>
	<li> Enter your Name :
		<div>
			<?php echo form_input(array(
              'name'        => 'username',
              'id'          => 'username',
              'maxlength'   => '100',
              'size'        => '20',
              'style'       => 'width:20%',
            )); ?>
		</div>
	</li>
	<li>
		<?php echo form_submit('mysubmit', 'Submit Name!');?>
    </li>
</ul>
<?php form_close(); ?>
</body>
</html>