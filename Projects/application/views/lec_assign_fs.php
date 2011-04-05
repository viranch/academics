<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Economics
Description: A two-column, fixed-width template suitable for business sites and blogs.
Version    : 1.0
Released   : 20080116

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Academics @ DA-IICT</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="../../../style_home.css" />
<script type="text/javascript" src="code/jquery-1.3.2.js"></script>
<script type="text/javascript" >
</script>
</head>
<body>
<div id="header">

 <div id="logo">
        <img src="images/new2_01.gif"  />
 </div>

<div class="example">
<ul class="adxm menu">

<li class="navac"><a href="/Projects/faculty/" title="Home">Home</a>
</li>
<li><a href="/Projects/faculty/profile" title="Nested fly-out menu, standard-compliant">Profile</a>
</li>
<li><a href="http://127.0.0.1/Projects/faculty/grade" title="Windowed Controls Hider, for Win IE">Grade</a>

</li>
<li><a href="http://127.0.0.1/Projects/faculty/uploadform" title="Reusable web techniques">Lectures</a>
	
</li>
<li><a href="http://www.aplus.co.yu/deliver/" title="Various sites I (co-)did">Add/Drop Courses</a>
</li>
<li><a href="http://www.aplus.co.yu/about/" title="Relevant info about me">Fees</a></li>
<li><a href="http://www.aplus.co.yu/about/contact/">Utilities</a></li>
<li><a href="http://www.aplus.co.yu/about/contact/">Logout</a></li>
</ul>
</div>	

<br/>
	
<hr />

<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				
				<ul>&nbsp;&nbsp;
				<strong></strong><br>&nbsp;&nbsp;
				<i><strong</strong></i>
				</ul>
				
			</li>
			<li>
				<h2></h2>
				<ul>
					<table class="tab">
				<tr>
				<th></th>
				<th></th>
				</tr>
				<tr>
				<td></td>
				<td></td>
				</tr>
				<tr>
				<td>28 March, 2011</td>
				<td>Hanuman Jayanti</td>
				</tr>
				</table>
				</ul>

			</li>
		</ul>
	</div>
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title"><a href="#">Lectures</a></h2>
			<div class="entry">
				<?php 
					if($lectures == null){
						echo " There are no lectures uploaded";}
					else{
						foreach($lectures as $row){
							$var = "/Projects/faculty/download/".$row['course_id'].'/'. $row['filename'];
							echo "<a href= '$var'> {$row['filename']} </a>";
							echo "<p align='right'> {$row['description']} </p>";
						}
					} ?>
				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="">Upload Lectures</a></h2>
			<div class="entry">
			<ul>
			<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
			</ul>
			
			<p><?php $anc = 'http://127.0.0.1/Projects/faculty/lectures_assignments_display/'.$this->uri->segment(3);
						echo anchor($anc , 'Upload Another File!'); ?></p>

			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
		<div id="sidebar">
		<ul>
			<li>
				<h2>Courses</h2>
				<ul>
					<?php   if($btech_courses != null){
							   $btechyear = 0;
							   foreach( $btech_courses as $row){
									if($btechyear != $row['batch_year']){
										echo "<h3>B.Tech : {$row['batch_year']}</h3>";
										$btechyear = $row['batch_year'];
										}
										$var = $row['course_id'];
									echo "<li><a href='/Projects/faculty/lectures_assignments_display/$var'>{$row['course_id']}</a></li>";
								}
							}
					?>

				</ul>
				<ul>
					<?php   if($mtech_courses != null){
								$mtechyear = 0;
								foreach( $mtech_courses as $row){
									if($mtechyear != $row['batch_year']){
										echo "<h3>M.Tech : {$row['batch_year']}</h3>";
										$btechyear = $row['batch_year'];
									}
									echo "<li><a href='#'>{$row['course_id']}</a></li>";
								}
							}
					?>
				</ul>
			</li>
			<li>
				<h2>Resources</h2>
				<ul>
					<li><a href="http://webmail.daiict.ac.in" target="_blank">Webmail</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in:8081/webslim/default.asp" target="_blank">Resource Center</a></li>
					<li><a href="http://intranet.daiict.ac.in/~daiict_nt01/Lecture/" target="_blank">\\daiictpdc</a></li>
					<li><a href="http://intranet.daiict.ac.in" target="_blank">Intranet</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
<div id="footer">
	<p class="legal">Copyright (c) 2011 Academics @ DA-IICT. All rights reserved.</p>
	<p class="credit">Designed by <a href="#"></a>.</p>
</div>
</div>

</body>
</html>
