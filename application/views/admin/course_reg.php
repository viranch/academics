
<script type="text/javascript">

$(function() {
  $("#startdate").datepicker();
  $("#enddate").datepicker();
  $('input[name="deadline"]').datepicker();
});
</script>

<!-- start page -->

<div id="wrapper">
<div id="page">
	<!-- start content -->
	<div id="content_admin">
		<div class="post">

			<h2 class="title">Addition Of Course</h2>
			<div class="entry">
			<p>
<?php echo form_open('admin/admin/course_create');?>
    <table class="admin_tab " table style="width:40%">
        <tr>
					<td>Category</td>
          <td>

			<select name="category">
				<option value="core">core</option>
				<option value="open">open</option>
				<option value="group">group</option>
				<option value="technical">technical</option>
				<option value="science">science</option>
			</select>
		</td>
      </tr>
      <tr>
      
    <tr>
		<td>Course Name</td>
        <td>
        <input type="text" name="course_name" value=""  />
		</td>
	</tr>
	<tr>
		<td>Course ID</td>
        <td>
        <input type="text" name="course_id" value=""  />
		</td>
	</tr>
	<tr>
		<td>Pass / Fail Course</td>
        <td>
      <?php
      $options = array('yes'  => 'yes',
                        'no'    => 'no' 
                        );
      echo form_dropdown('pass', $options);?>
		</td>
	</tr>
	<tr>
		<td>Credits</td>
        <td>
        <input type="text" name="credits" value=""  />
		</td>
	</tr>

	<tr>
		<td>Description</td>
        <td>
        <?php echo form_textarea('description','')?>    
      </td>
	</tr>
      <tr>
          <td>
          </td>
          <td>
          <input type="submit" name="submit" value="Submit"  />          </td>
        </tr>

        </table>
        <br/>
        <hr/>
	<h2>Delete Courses</h2>
      
        <table >
          <tr>
          <th>delete</th>
          <th>course id</th>
          <th>Course name</th>
          <th>Credits</th>
          </tr>
          <?php foreach ($courses as $row) { ?>
          <tr>
          <td><?php echo form_checkbox('courses[]',$row['course_id'], FALSE);?></td> 
          <td><?php echo $row['course_id'];?></td>
          <td><?php echo $row['course_name'];?></td>
          <td><?php echo $row['credits'];?></td>
          </tr>
          
          <?php }?>
          <tr>
            <td><?php echo form_submit('delete','delete'); ?><td>
          </tr>
        </table>
        
        
      

                 
      </form>        </div>
        
			</p>
			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->

	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>

<!-- end page -->

