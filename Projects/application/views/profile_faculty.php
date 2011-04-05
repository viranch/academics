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
<link type="text/css" rel="stylesheet" href="../../../style.css" />
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
<li><a href="/Projects/faculty/profile" title="Profile">Profile</a>
</li>
<li><a href="/Projects/faculty/grade" title="Windowed Controls Hider, for Win IE">Grade</a>
</li>
<li><a href="http://www.aplus.co.yu/lab/" title="Reusable web techniques">Results</a>
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
	

<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Faculty Detail</h2>
		<table height="350" border="1">
		<COLGROUP span="1" width="150">
		<COLGROUP span="1" width="300">
		<tr>
  		<td>Faculty Name</td>
  		<td><?php   foreach($details as $detail)
					echo $detail['name'];?></td>
		<td rowspan="3"><img border="0" src=<?php foreach($details as $detail) echo $detail['image']; ?> alt="Image can't be uploaded" width="200" height="150" /></td>
		</tr>
		<tr>
		<td>Faculty Id</td>
		<td><?php foreach($details as $detail)
					echo $detail['user_id']; ?></td>
		</tr>
		<tr>
		<td>Gender</td>
		<td><?php foreach($details as $detail)
					echo $detail['gender']; ?></td>
		</tr>
		<tr>
		<td>Area of Expertise</td>
		<td colspan="2"> <?php foreach($details as $detail)
					echo $detail['area_of_expertise']; ?></td>
		</tr>
		<tr>
		<td>Date of joining</td>
		<td colspan="2"><?php foreach($details as $detail)
					echo $detail['date_of_joining'] ; ?></td>
		</tr>
		<tr>
		<td>Degrees</td>
		<td colspan="2"><?php foreach($details as $detail)
					echo $detail['degrees']; ?></td>
		</tr>
		<tr>
		<td>Experience</td>
		<td colspan="2"><?php foreach($details as $detail)
					echo $detail['experience']; ?></td>
		</tr>
		</table>
	</div>
<!-- end of content -->


	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
<div id="footer">
	<p class="legal">Copyright (c) 2007 Website Name. All rights reserved.</p>
	<p class="credit">Designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</div>

</body>
</html>
