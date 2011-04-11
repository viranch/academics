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
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="code/jquery-1.3.2.js"></script>
</head>
<body>
<div id="header">

 <div id="logo">
        <img src="images/new2_01.gif"  />
 </div>

<ul class="adxm menu">
	<li class="navac"><a href="http://academics.daiict.ac.in/" title="Home">Home</a></li>
	<li><a href="http://www.aplus.co.yu/adxmenu/" title="Nested fly-out menu, standard-compliant">Profile</a></li>
	<li><a href="http://www.aplus.co.yu/wch/" title="Windowed Controls Hider, for Win IE">Registration</a></li>
	<li><a href="http://www.aplus.co.yu/lab/" title="Reusable web techniques">Results</a></li>
	<li><a href="http://www.aplus.co.yu/deliver/" title="Various sites I (co-)did">Add/Drop Courses</a></li>
	<li><a href="http://www.aplus.co.yu/about/" title="Relevant info about me">Fees</a></li>
	<li><a href="http://www.aplus.co.yu/about/contact/">Utilities</a></li>
	<li><a href="http://www.aplus.co.yu/about/contact/">Logout</a></li>
</ul>

<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Set the timetable</h2>
			<div class="entry">
			<form action="settimetable.php" method="post">
			<table class="nohover"><tr>
				<td><strong>Program</strong></td>
				<td><select name="program"><option value="btech">BTech</option><option value="mtech">MTech</option></select></td>
			</tr><tr>
				<td><strong>Batch</strong></td>
				<td><select name="batch"><option value="2010">2010</option><option value="2008">2008</option></select></td>
			</tr></table><br><br>
			<table id="timetable" class="nohover"><thead><tr>
				<th></th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th>
			</tr></thead><tbody>
			<?php for ($i=0; $i<4; $i++) { ?>
			<tr>
				<th>Lecture-<?php echo $i+1?></th>
				<?php for ($j=0; $j<5; $j++) { ?>
				<td><table class="ttentry">
				<tr><td>Start:</td><td><input type="time" name="<?php echo 'r'.$i.'c'.$j;?>_start" size=5% /></td></tr>
				<tr><td>End:</td><td><input type="time" name="<?php echo 'r'.$i.'c'.$j;?>_end" size=5% /></td></tr>
				<tr><td>Course:</td><td><input type="text" name="<?php echo 'r'.$i.'c'.$j;?>_cid" size=5% /></td></tr></table>
				</td> <?php } ?>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			<br><br><input type="submit" value="Submit" />
			</form>
			</div>
			
		</div>
	</div>
	<!-- end content -->

<div id="footer">
	<p class="legal">Copyright (c) 2011 Academics @ DA-IICT. All rights reserved.</p>
	<p class="credit">Designed by <a href="#"></a>.</p>
</div>
</div>

</body>
</html>
