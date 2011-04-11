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
			<h2 class="title">Set the lab/tutorial timetable</h2>
			<div class="entry">
			<form action="settimetable.php" method="post">
			<table class="nohover"><tr>
				<td><strong>Program</strong></td>
				<td><select name="program"><option value="btech">BTech</option><option value="mtech">MTech</option></select></td>
			</tr><tr>
				<td><strong>Batch</strong></td>
				<td><select name="batch"><option value="2010">2010</option><option value="2008">2008</option></select></td>
			</tr><tr>
				<td><strong>Weekday</strong></td>
				<td><select name="day"><option value="mon">Monday</option><option value="tue">Tuesday</option><option value="wed">Wednesday</option><option value="thu">Thursday</option><option value="fri">Friday</option></select></td>
			</tr></table><br><br>
			<table id="timetable" class="nohover">
			<thead><tr>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Course ID/Slot No</th>
				<th>Group No</th>
				<th>Venue</th>
			</tr></thead>
			<tbody><tr>
				<td><input type="time" title="Enter the start time for the lab/tutorial" /></td>
				<td><input type="time" title="Enter the end time for the lab/tutorial" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the group no. for the lab/tutorial" size=5% /></td>
				<td><input type="text" title="Enter the venue for the lab/tutorial" size=5% /></td>
			</tr><tr>
				<td><input type="time" title="Enter the start time for the lab/tutorial" /></td>
				<td><input type="time" title="Enter the end time for the lab/tutorial" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the group no. for the lab/tutorial" size=5% /></td>
				<td><input type="text" title="Enter the venue for the lab/tutorial" size=5% /></td>
			</tr><tr>
				<td><input type="time" title="Enter the start time for the lab/tutorial" /></td>
				<td><input type="time" title="Enter the end time for the lab/tutorial" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the group no. for the lab/tutorial" size=5% /></td>
				<td><input type="text" title="Enter the venue for the lab/tutorial" size=5% /></td>
			</tr><tr>
				<td><input type="time" title="Enter the start time for the lab/tutorial" /></td>
				<td><input type="time" title="Enter the end time for the lab/tutorial" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the group no. for the lab/tutorial" size=5% /></td>
				<td><input type="text" title="Enter the venue for the lab/tutorial" size=5% /></td>
			</tr><tr>
				<td><input type="time" title="Enter the start time for the lab/tutorial" /></td>
				<td><input type="time" title="Enter the end time for the lab/tutorial" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the group no. for the lab/tutorial" size=5% /></td>
				<td><input type="text" title="Enter the venue for the lab/tutorial" size=5% /></td>
			</tr></tbody></table><br><br>
			<table class="nohover">
			<thead><tr>
				<th>Weekday</th>
				<th>CT114<br><i>(8:30-9:30, LAB001)</i></th>
				<th>CT114<br><i>(8:30-9:30, LAB001)</i></th>
				<th>CT114<br><i>(8:30-9:30, LAB001)</i></th>
				<th>CT114<br><i>(8:30-9:30, LAB001)</i></th>
				<th>CT114<br><i>(8:30-9:30, LAB001)</i></th>
			</tr></thead>
			<tbody><tr>
				<th>Monday</th>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
			</tr><tr>
				<th>Tuesday</th>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
			</tr><tr>
				<th>Wednesday</th>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
			</tr><tr>
				<th>Thursday</th>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
			</tr><tr>
				<th>Friday</th>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
				<td>Group 1</td>
			</tr></tbody></table>
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
