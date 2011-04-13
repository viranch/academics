	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Enter details</h2>
			<div class="entry">
			<p>
			
      <?php echo form_open('admin/admin/course_offer_insert');?>
				<table class="admin_tab" table style="width:40%"><tr>
					<td>Batch year</td>
          <td>
          <?php
          $options = array();
          foreach ($year as $row) {
            $options[$row['batch_year']]=$row['batch_year'];
          }
          echo form_dropdown('batch_year', $options, '');?>
	  </td>
				</tr><tr><td> Semester:
					<td><input type="label" name="semester" size=25% ></td></td>
 
				</tr><tr><td> Program:
					<td>
	<?php $options=array();
	    foreach ($program as $row) {
            $options[$row['program']]=$row['program'];
          }
          echo form_dropdown('program', $options, '');?>
					</td></td>
			</tr><tr><td> CourseId:
					<td>
          <?php
          $options = array(''  => '------');
          foreach ($courses as $row) {
            $options[$row['course_id']]=$row['course_name']."(".$row['course_id'].")";
          }
          echo form_dropdown('course', $options, '');?>
					 </td></td>
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
	<tr><td><input type='hidden' name="semid" value="" />
	<tr> <td><?php
        echo form_submit('submit','submit');?>
	</table></div>

