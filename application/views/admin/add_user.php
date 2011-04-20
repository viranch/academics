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
$(function() {
  $("#dob").datepicker();
});

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

		</ul>
	</div>
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Create new user</h2>
			<div class="entry">
			<p>
			<?php echo form_open('admin/admin/insertuser');?>
				<table class="nohover"><tr>
					<td width=50%>User ID</td>			
					<td width=50%><input type="text" name="user_id" size=35% value ="<?php echo set_value('first_name');?>"></td><td> <?php echo form_error('user_id'); ?></td>
				</tr><tr>
					<td>User Name</td>
					<td><input type="text" name="user_name" size=35% value ="<?php echo set_value('user_name');?>"></td><td> <?php echo form_error('user_name'); ?></td>
				</tr><tr>
					<td>Password</td>
					<td><input type="password" name="password" size=35% value ="<?php echo set_value('password');?>"></td><td> <?php echo form_error('password'); ?></td>
				</tr><tr>
					<td>Confirm Password</td>
					<td><input type="password" name="confirm_password" size=35% value ="<?php echo set_value('confirm_password');?>"></td><td> <?php echo form_error('confirm_password'); ?></td>
				</tr><tr>
					<td>First Name</td>
					<td><input type="text" name="last_name" size=35% value ="<?php echo set_value('first_name');?>"></td><td> 
				</tr><tr>
					<td>Last Name</td>
					<td><input type="text" name="first_name" size=35% value ="<?php echo set_value('last_name');?>"></td>
				</tr><tr>
					<td>Date of Birth</td>
					<td><input type="text" name="dob" size=35% id="dob" value ="<?php echo set_value('dob');?>"></td><td> <?php echo form_error('dob'); ?>
				</tr><tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" value="male" <?php echo set_radio('gender', 'male', TRUE); ?> />Male
						<input type="radio" name="gender" value="female" <?php echo set_radio('gender', 'female'); ?> />Female
					</td><td> <?php echo form_error('gender'); ?></td>
				</tr><tr>
					<td>EmailId</td>
					<td><input type="text" name="email_id" size=35% value ="<?php echo set_value('email_id');?>"></td><td> <?php echo form_error('email_id'); ?></td>
				</tr><tr>
					<td>Phone No</td>
					<td><input type="text" name="phone_no" size=35% value ="<?php echo set_value('phone_no');?>"></td><td> <?php echo form_error('phone_no'); ?></td>
				</tr>
				<tr>
					<td>Blood Group</td>
					<td><input type="text" name="bloodgroup" value="<?php echo set_value('bloodgroup'); ?>" size=35% /></td><td> <?php echo form_error('blood_group');?>
				</tr>
				
				
				
				
				<tr>
					<td>Identification Mark</td>
					<td><?php echo form_textarea( array( 'name' => 'identification_mark', 'rows' => '2', 'cols' => '40', 'value' => set_value('identification_mark') ) )?></td>
					<td> <?php echo form_error('identification_mark'); ?></td>
				</tr><tr>
					<td>Image</td>
					<td><input type="file" name="image" size=35% value ="<?php echo set_value('image');?>"></td>
					<td> <?php echo form_error('image'); ?></td>
				</tr><tr><td><label for="address">address</label></td>
				<td><?php echo form_textarea( array( 'name' => 'address', 'rows' => '3', 'cols' => '50', 'value' => set_value('address') ) )?></td></tr>
				<tr><td><label for="address">Emergency address</label></td>
				<td><?php echo form_textarea( array( 'name' => 'emergency_address', 'rows' => '3', 'cols' => '50', 'value' => set_value('emergency_address') ) );?></td>
				<td><?php echo form_error('emergency_address'); ?></td></tr>
					<td>User type</td>
					<td><select onchange="toggleForm(this.value)" name="user_type"><option value="student">Student</option><option value="faculty">Faculty</option></select></td>
				</tr></table>
				<div id="student">
				<table class="nohover">
					<td width=50%>Twelfth School</td>
					<td width=50%><input type="text" name="twelfth_school" size=35% value ="<?php echo set_value('twelfth_school');?>"></td>
				</tr><tr>
					<td>Program</td>
					<td><input type="text" name="program" size=35% value ="<?php echo set_value('program');?>"></td><td> 
				</tr><tr>
					<td>Batch year</td>
					<td><input type="text" name="batch_year" size=35% value ="<?php echo set_value('batch_year');?>"></td><td> 
				</tr><tr>
					<td>Labgroup</td>
					<td><input type="text" name="lab_group" size=35% value ="<?php echo set_value('lab_group');?>"></td><td> 
				</tr><tr>
					<td>Twelfth Year</td>
					<td><input type="text" name="twelfth_year" size=35% value ="<?php echo set_value('twelfth_year');?>"></td>
				</tr><tr>
					<td>Twelfth Percentage</td>
					<td><input type="text" name="twelfth_per" size=35% value ="<?php echo set_value('twelfth_per');?>"></td>
				</tr><tr>
					<td>Twelfth Board</td>
					<td><input type="text" name="twelfth_board" size=35% value ="<?php echo set_value('twelfth_board');?>"></td>
				</tr><tr>
					<td>Tenth Percentage</td>
					<td><input type="text" name="tenth_per" size=35% value ="<?php echo set_value('tenth_per');?>"></td>
				</tr><tr>
					<td>Tenth Board</td>
					<td><input type="text" name="tenth_board" size=35% value ="<?php echo set_value('tenth_board');?>"></td>
				</tr></table>
				</div>
				<div id="faculty">
				<table class="nohover"><tr>
					<td width=50%>Date of Joining</td>
					<td width=50%><input type="text" name="date_of_joining" id ="doj" value ="<?php echo set_value('date_of_joining');?>" size=35%></td>
				</tr><tr>
					<td>Degrees</td>
					<td><input type="text" name="degrees" size=35% value ="<?php echo set_value('degrees');?>"></td>
				</tr><tr>
					<td>Area of expertise</td>
					<td><input type="text" name="area_of_expertise" size=35% value ="<?php echo set_value('area_of_expertise');?>"></td>
				</tr><tr>
					<td>Experience</td>
					<td><input type="text" name="experience" size=35% value ="<?php echo set_value('experience');?>"></td>
				</tr><tr>
					<td>Link to webpage</td>
					<td><input type="text" name="link" size=35% value ="<?php echo set_value('link');?>"></td>
				</tr><tr></table>
				</div>
				 <?php echo form_submit( 'submit', 'Submit'); ?>
			</form>
			</p>
			</div>
		</div>
	</div>
	<!-- end content -->
</div>
</div>
</body>
</html>
