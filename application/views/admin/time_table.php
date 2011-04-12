
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Set the lecture timetable</h2>
			<div class="entry">
			<form action="settimetable.php" method="post">
			<table class="nohover"><tr>
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
      </tr>
      <tr>
				<td><strong>Weekday</strong></td>
				<td><select name="day"><option value="mon">Monday</option><option value="tue">Tuesday</option><option value="wed">Wednesday</option><option value="thu">Thursday</option><option value="fri">Friday</option></select></td>
			</tr></table><br><br>
			<table id="timetable" class="nohover">
			<thead><tr>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Course ID/Slot No</th>
				<th>Venue</th>
			</tr></thead>
			<tbody><tr>
				<td><input type="time" title="Enter the start time for the lecture" /></td>
				<td><input type="time" title="Enter the end time for the lecture" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the venue for the lecture" /></td>
			</tr><tr>
				<td><input type="time" title="Enter the start time for the lecture" /></td>
				<td><input type="time" title="Enter the end time for the lecture" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the venue for the lecture" /></td>
			</tr><tr>
				<td><input type="time" title="Enter the start time for the lecture" /></td>
				<td><input type="time" title="Enter the end time for the lecture" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the venue for the lecture" /></td>
			</tr><tr>
				<td><input type="time" title="Enter the start time for the lecture" /></td>
				<td><input type="time" title="Enter the end time for the lecture" /></td>
				<td><select><option value="it314">IT314</option><option value="el114">EL114</option></select></td>
				<td><input type="text" title="Enter the venue for the lecture" /></td>
			</tr></tbody></table><br><br>
			<table class="nohover">
			<thead><tr>
				<th>Weekday</th><th>Lecture-1</th><th>Lecture-2</th><th>Lecture-3</th><th>Lecture-4</th>
			</tr></thead>
			<tbody><tr>
				<th>Monday</th>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
			</tr><tr>
				<th>Tuesday</th>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
			</tr><tr>
				<th>Wednesday</th>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
			</tr><tr>
				<th>Thursday</th>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
			</tr><tr>
				<th>Friday</th>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
				<td>CT114<br><i>(8:30-9:30, LT1)</i></td>
			</tr></tbody></table>
			<br><br><input type="submit" value="Submit" />
			</form>
			</div>
			
		</div>
	</div>
	<!-- end content -->


