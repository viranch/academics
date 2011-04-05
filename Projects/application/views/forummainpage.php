<html>
<head>
	<title>Forum</title>
</head>
<body>
<?php echo anchor("http://127.0.0.1/Projects/index.php/vishu/nforum", "Start a new Forum" , array()); ?>
<?php foreach($info->result() as $row):?>
<h1><?php echo $row->subject;?> </h1>
<p><?php echo $row->description; ?></p>
<p><?php $forumid = $row->fid; 
         $commenturl = "http://127.0.0.1/Projects/index.php/vishu/comments/" . $forumid?></p>
<?php echo anchor($commenturl,"Comments" ,array()); ?>
<hr>
<?php endforeach; ?>

</body>
</html>