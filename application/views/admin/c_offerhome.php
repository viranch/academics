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
      <?php echo form_open('admin/admin/course_offer');?>
				<table class="admin_tab " table style="width:40%"><tr>
					<td>Batch year</td>
          <td width=40%><input type="text" name="batch" size=25% value="<?php echo set_value('batch');?>"></td>
						<td>Program</td>
          <td><select  style="width:100px" name="program">
						<option value="Btech">Btech</option>
						<option value="Mtech">Mtech</option>
						<option value="Mscit">Mscit</option>
						<option value="Mdes">Mdes</option>
						</select>
</td>
				</tr><tr><td> Semester:
					<td><select  style="width:100px" name="semid">
						<option value="1">Semester1</option>
						<option value="2">Semester2</option>
						<option value="3">Summer1</option>
						<option value="4">Semester3</option>
						</select>
</td>
   
          </tr>
        <?php
        echo form_submit('submit','submit');?>
	<div style="clear: both;">&nbsp;
	</table></div>

<!-- end page -->
