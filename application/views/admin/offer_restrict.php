<script type="text/javascript">

$(function() {
  $("#startdate").datepicker();
  $("#enddate").datepicker();
  $('input[name="deadline"]').datepicker();
  $('input[name="opening_date"]').datepicker();
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
			<h2 class="title">Course offer policy</h2>
			<div class="entry">
			<p>
      <?php echo form_open('admin/admin/deadline');?>
        <table class="admin_tab " table style="width:40%">
        <tr>
					<td>Program</td>
          <td>
          <?php
          $options = array();
          foreach ($program as $row) {
            $options[$row['program']]=$row['program'];
          }
          echo form_dropdown('program', $options);?>
          </td>
      </tr>
      <tr>
        <td>Semester</td>
          <td>
          <?php
          $options = array();
          foreach ($sem as $row) {
            $options[$row['sem_id']]=$row['semester'];
          }
          echo form_dropdown('sem_id', $options);?>
          </td>
      </tr>
      <tr>
        <td>Min courses</td>
          <td>
          <?php echo form_input('min_courses',set_value('min_courses',''));?>
          </td>
      </tr>
  
      <tr>
        <td>Min credits</td>
        <td><?php echo form_input('min_credits',set_value('min_credits',''));?></td>
      </tr>
      <tr>
        <td>Max_Courses</td>
          <td>
          <?php echo form_input('max_courses',set_value('max_courses',''));?>
          </td>
      <tr>
        <td>Max_credits</td>
        <td><?php echo form_input('max_credits',set_value('max_credits',''));?></td>
      </tr>
      <tr>
      <td>opening date</td>
      <td><?php echo form_input('opening_date',set_value('opening_date',''));?></td>
      </tr>
      <tr>
        <td>closing date</td>
        <td><?php echo form_input('deadline',set_value('deadline',''));?></td>
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
        
      
        <h2>Delete course policy</h2>
      
        <table class="admin_tab " table style="width:40%">
        <tr>
					<td>Program</td>
          <td>
          <?php
          $options = array();
          foreach ($program as $row) {
            $options[$row['program']]=$row['program'];
          }
          echo form_dropdown('program1', $options);?>
          </td>
      </tr>
      <tr>
        <td>Semester</td>
          <td>
          <?php
          $options = array();
          foreach ($sem as $row) {
            $options[$row['sem_id']]=$row['semester'];
          }
          echo form_dropdown('sem_id1', $options);?>
          </td>
      </tr>
      <tr>
      <td></td>
      <td><?php echo form_submit('delete','delete'); ?></td>
      </tr>
      </table>
        <table >
          <tr>
          <th>program</th>
          <th>Semester</th>
          <th>Max courses</th>
          <th>Max credits</th>
          <th>Min courses</th>
          <th>Min credits</th>
          <th>Opening date</th>
          <th>Closing date</th>
          </tr>
          <?php foreach ($rest as $row) { ?>
          <tr>
          <td><?php echo $row['program'];?></td>
          <td><?php echo $row['semester'];?></td>
          <td><?php echo $row['courses_number'];?></td>
          <td><?php echo $row['credits']; ?></td>
          <td><?php echo $row['min_courses'];?></td>
          <td><?php echo $row['min_credits'];?></td>
          <td><?php echo $row['opening_date'];?></td>
          <td><?php echo $row['deadline'];?></td>
          </tr>
          
          <?php }?>
        </table>
        
      <?php 
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
echo validation_errors(); ?> 
