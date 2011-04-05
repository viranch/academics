<html>
<head>
	<title>Comments</title>
</head>
<body>
<h1> Comments </h1>
<?php foreach($info->result() as $row ): ?>
<p><?php echo $row->bywho ; ?></p>
<p><?php echo $row->content ; ?></p>
<hr>
<?php endforeach ?>

<?php $ur ="http://127.0.0.1/Projects/index.php/vishu/commentsubmission/".$this->uri->segment(3)?>
<?php echo form_open($ur); ?>
<?php echo validation_errors();?>
<p>Comment</p>
<?php echo form_textarea(array( 'name' => 'comment',
                           'rows' => '10',
						   'cols' => '60')); ?>
<?php echo "<br />"; ?>
<?php echo form_submit(array('value' => 'Submit Comment'));
?>
</body>
<head>
