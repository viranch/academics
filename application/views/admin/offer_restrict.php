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
<!-- start of sidebar1 -->
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Course offer deadlines</h2>
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
        <td>Year</td>
          <td>
          <?php
          $options = array();
          foreach ($year as $row) {
            $options[$row['batch_year']]=$row['batch_year'];
          }
          echo form_dropdown('batch_year', $options);?>
          </td>
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
        <td>deadline</td>
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
        
      
        <h2>Delete course offer deadline</h2>
      
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
        <td>Year</td>
          <td>
          <?php
          $options = array();
          foreach ($year as $row) {
            $options[$row['batch_year']]=$row['batch_year'];
          }
          echo form_dropdown('batch_year1', $options);?>
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
          <th>year</th>
          <th>Max_courses</th>
          <th>Max credits</th>
          <th>Deadline</th>
          </tr>
          <?php foreach ($rest as $row) { ?>
          <tr>
          <td><?php echo $row['program'];?></td>
          <td><?php echo $row['batch_year'];?></td>
          <td><?php echo $row['courses_number'];?></td>
          <td><?php echo $row['credits']; ?></td>
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
