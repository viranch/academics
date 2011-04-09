<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Economics
Description: A two-column, fixed-width template suitable for business sites and blogs.
Version    : 1.0
Released   : 20080116

-->
<script type="text/javascript">
window.onload=function() {
student=document.getElementById("student").innerHTML;
faculty=document.getElementById("faculty").innerHTML;
//document.getElementById("student").innerHTML="";
document.getElementById("faculty").innerHTML="";
}

function toggleForm(who) {
	if (who=="stu") {
		document.getElementById("student").innerHTML=student;
		document.getElementById("faculty").innerHTML="";
	}
	else if (who=="fac") {
		document.getElementById("faculty").innerHTML=faculty;
		document.getElementById("student").innerHTML="";
	}
}
</script>
<body>


<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
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
			<h2 class="title">Add new user</h2>
			<div class="entry">
			<p>
			<form>
				<table class="nohover"><tr>
					<td width=50%>User ID</td>
					<td width=50%><input type="text" name="user_id" size=35%></td>
				</tr><tr>
					<td>Name</td>
					<td><input type="text" name="name" size=35%></td>
				</tr><tr>
					<td>Email address</td>
					<td><input type="text" name="email" size=35%></td>
				</tr><tr>
					<td>Date of Birth</td>
					<td><input type="text" name="dob" size=35%></td>
				</tr><tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" value="male" id="male" /><label for="male">Male</label>
						<input type="radio" name="gender" value="female" id="female" /><label for="female">Female</label>
					</td>
				</tr><tr>
					<td>Image</td>
					<td><input type="text" name="dob" size=35%>Place the image in images/&lt;id&gt;.jpg</td>
				</tr><tr>
					<td>User type</td>
					<td><select onchange="toggleForm(this.value)"><option value="stu">Student</option><option value="fac">Faculty</option></select></td>
				</tr></table>
				<div id="student">
				<table class="nohover">
					<td width=50%>Twelfth School</td>
					<td width=50%><input type="text" name="twelfth_school" size=35%></td>
				</tr><tr>
					<td>Twelfth Year</td>
					<td><input type="text" name="twelfth_year" size=35%></td>
				</tr><tr>
					<td>Twelfth Percentage</td>
					<td><input type="text" name="twelfth_per" size=35%></td>
				</tr><tr>
					<td>Twelfth Board</td>
					<td><input type="text" name="twelfth_board" size=35%></td>
				</tr><tr>
					<td>Tenth Percentage</td>
					<td><input type="text" name="tenth_per" size=35%></td>
				</tr><tr>
					<td>Tenth Board</td>
					<td><input type="text" name="tenth_board" size=35%></td>
				</tr></table>
				</div>
				<div id="faculty">
				<table class="nohover"><tr>
					<td width=50%>Date of Joining</td>
					<td width=50%><input type="text" name="date_of_joining" size=35%></td>
				</tr><tr>
					<td>Degrees</td>
					<td><input type="text" name="degrees" size=35%></td>
				</tr><tr>
					<td>Area of expertise</td>
					<td><input type="text" name="area_of_expertise" size=35%></td>
				</tr><tr>
					<td>Experience</td>
					<td><input type="text" name="experience" size=35%></td>
				</tr><tr>
					<td>Link to webpage</td>
					<td><input type="text" name="link" size=35%></td>
				</tr></table>
				</div>
			</form>
			</p>
			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Resources</h2>
				<ul>
					<li><a href="http://webmail.daiict.ac.in" target="_blank">Webmail</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in:8081/webslim/default.asp" target="_blank">Resource Center</a></li>
					<li><a href="http://intranet.daiict.ac.in/~daiict_nt01/" target="_blank">\\daiictpdc</a></li>
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
