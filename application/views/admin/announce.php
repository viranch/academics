<script type="text/javascript">

$(function() {
  $("#startdate").datepicker();
  $("#enddate").datepicker();
});
</script>

<!-- start page -->

<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Announcements</h2>
			<div class="entry">
			<p>
      <?php echo form_open('admin/admin/announce');?>
        <table class="admin_tab " table style="width:40%">
        <tr>
					<td>Program</td>
          <td>
          <?php
          $options = array(''  => '-------');
          foreach ($program as $row) {
            $options[$row['program']]=$row['program'];
          }
          echo form_dropdown('program', $options, '');?>
          </td>
      </tr>
      <tr>
        <td>Year</td>
          <td>
          <?php
          $options = array(''  => '------');
          foreach ($year as $row) {
            $options[$row['batch_year']]=$row['batch_year'];
          }
          echo form_dropdown('batch_year', $options, '');?>
          </td>
      </tr>
      <tr>
        <td>Courses</td>
          <td>
          <?php
          $options = array(''  => '------');
          foreach ($courses as $row) {
            $options[$row['course_id']]=$row['course_name']."(".$row['course_id'].")";
          }
          echo form_dropdown('course', $options, '');?>
          </td>
      <tr>
        <td>Annoncement</td>
        <td><textarea name="message" rows="5" cols="40"></textarea></td>
      </tr>
      <tr>
          <td>
          </td>
          <td>
          <?php
          echo form_submit('submit','Submit');
          ?>
          </td>
        </tr>
        </table>
        <br/>
        <hr/>
        
      
        <h2>Delete Announcements</h2>
      
        <table >
          <tr>
          <th>delete</th>
          <th>program</th>
          <th>year</th>
          <th>courseid</th>
          <th>Announcement</th>
          </tr>
          <?php foreach ($announcements as $row) { ?>
          <tr>
          <td><?php echo form_checkbox('announce[]',$row['id'], FALSE);?></td> 
          <td><?php echo $row['program'];?></td>
          <td><?php if($row['batch_year']!=0)echo $row['batch_year'];?></td>
          <td><?php echo $row['course_id'];?></td>
          <td><?php echo $row['message']; ?></td>
          </tr>
          
          <?php }?>
        </table>
        
      <?php 
          echo form_submit('delete','Delete');
          echo form_close();
        ?>
        </div>
        
			</p>
			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>

<!-- end page -->
<?php 
