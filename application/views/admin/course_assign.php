
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

			<h2 class="title">Assign Course</h2>
			<div class="entry">
			<p>
<?php echo form_open('admin/admin/course_assign');?>  
<?php if(isset($message)) echo "<h2>".$message."</h2>";?>
  <table class="admin_tab " table style="width:40%">
      
	<tr>
		<td>Course ID</td>
        <td>
       <?php
          $options = array();
          foreach ($courses as $row) {
            $options[$row['course_id']]=$row['course_name']."(".$row['course_id'].")";
          }
          echo form_dropdown('course_id', $options);?>
		</td>
	</tr>
	<tr>
		<td>Faculty ID</td>
        <td>
      <?php
          $options = array();
          foreach ($faculty as $row) {
            $options[$row['user_id']]=$row['user_id']."(".$row['candidate_name'].")";
          }
          echo form_dropdown('user_id', $options);?>
		</td>
  </tr>
<tr>
  <td>program</td>
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
  <td>year</td>
 <td>  <?php
          $options = array();
          foreach ($year as $row) {
            $options[$row['batch_year']]=$row['batch_year'];
          }
          echo form_dropdown('batch_year', $options);?>
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
        
      

                 
      </form>        </div>
        
			</p>
			</div>
		</div>
	</div>
	<!-- end content -->
	<div style="clear: both;">&nbsp;</div>

<!-- end page -->

