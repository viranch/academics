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
<li><a href="http://127.0.0.1/Projects/faculty/lectures_faculty" title="Reusable web techniques">Lectures</a>
	
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
				<h2>Assignments</h2>
				<?php
					if($assignment_info != null){
						foreach($assignment_info as $row){
						echo "<ul>&nbsp;&nbsp; 
							<strong>{$row['filename']}</strong><br>&nbsp;&nbsp;
							<i>Deadline: <strong>{$row['submission_time']}</strong></i><br><br>
							</ul>";
						}
					}
				?>
				<ul>&nbsp;&nbsp;
				<strong>Project Report</strong><br>&nbsp;&nbsp;
				<i>Deadline: <strong>28th March</strong></i>
				</ul>
				
			</li>
			<li>
				<h2>Important Dates</h2>
				<ul>
					<table class="tab">
				<tr>
				<th>Date</th>
				<th>Description</th>
				</tr>
				<tr>
				<td>25 March, 2011</td>
				<td>SEM VI</td>
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
			<h2 class="title"><a href="#">Upcoming Lectures</a></h2>
			<div class="entry">
				<?php   if($timetable !=null){
							foreach($timetable as $row){
								echo "<p><strong><text class ='ann_name'>{$row['course_id']}: {$row['course_name']}</text></strong><br><strong><i>&nbsp;&nbsp;28th March:</i></strong> {$row['start_time']} - {$row['end_time']} ({$row['venue']})<br></p> ";
							}
						}
				?>
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="#">Announcements</a></h2>
			<div class="entry">
				<?php foreach($announcements as $row){
					echo "<p>&nbsp;&nbsp;{$row['message']} <p style='text-align: right;'> From :<b>{$row['candidate_name']}</b></p></p>";
					}
				?>
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
									echo "<li><a href='#'>{$row['course_id']}</a></li>";
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
