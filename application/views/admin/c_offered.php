<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Enter details</h2>
			<div class="entry">
			<p>
			
      <?php echo form_open('admin/admin/course_offer_insert');?>
				<table class="admin_tab " table style="width:40%"><tr>
					<td>Batch year</td>
          <td width=40%><input type="label" name="batch" size=25% value="<?php echo $batch ;?>"></td>
				</tr><tr><td> Semester:
					<td><input type="label" name="semester" size=25% value="<?php echo $semester;?>"></td></td>
 
				</tr><tr><td> Program:
					<td><input type="label" name="program" size=25% value="<?php echo $program;?>"></td></td>
			</tr><tr><td> CourseId:
					<td><input type="label" name="cid" size=25% ></td></td>
						</tr><tr><td>audit:<td><select  style="width:100px" name="audit">
						<option value="1">yes</option>
						<option value="0">No</option>
						</select></tr><tr>
					<td> Slot no:
					</td><td><input type="slotno" name="slot_no" size=25% ></td>
          </tr>
				<tr><td>Status:<td><select  style="width:100px" name="status">
						<option value="active">active</option>
						<option value="notactive">Notactive</option>
						</select></tr>
	<div style="clear: both;">&nbsp;
	<tr><td><input type='hidden' name="semid" value="<?php echo $semid ;?>" />
	<tr> <td><?php
        echo form_submit('submit','submit');?>
	</table></div>
			
<!-- end page -->
