
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Set the lecture timetable</h2>
			<div class="entry">
			<table class="nohover"><tr>
  <?php echo form_open('admin/admin/timetable1');?>
        <tr>
					<td><strong>Program</strong></td>
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
        <td><strong>Year</strong></td>
          <td>
          <?php
          $options = array();
          foreach ($year as $row) {
            $options[$row['batch_year']]=$row['batch_year'];
          }
          echo form_dropdown('batch_year', $options);?>
          </td>
      </tr><tr>
          <td><strong>Type of time table</strong></td>
          <td><select name="type"><option value="lecture">Lecture</option><option value="lab">Lab/Tutorial</option></select></td>
      </tr></table><br><br>
      <input type="submit" value="Submit" />
			</form>
			</div>
			
		</div>
	</div>
	<!-- end content -->


