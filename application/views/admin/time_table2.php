	<!-- start content -->
	<div id="content">
		<div class="post">
    <h2 class="title">Set the timetable for <?php echo $this->input->post('program'); echo $this->input->post('batch_year'); ?></h2>
			<div class="entry">
      <?php echo form_open('admin/admin/timetable1');?>
      <table class="nohover"><tr>
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
			<tbody>
      <?php $options=array(''=>'----');
      $flag=0;
      if(isset($everything)){ 
        for($i=0;$i<count($everything)-1;$i++){
          if($everything[$i]['slot_no']!=$everything[$i+1]['slot_no']){
            if($flag==0){
              $options[$everything[$i]['slot_no']]=$everything[$i]['course_id'];
            }
          }     
          else{
            $options[$everything[$i]['slot_no']]="slot ".$everything[$i]['slot_no'];
            $flag=1;
          }
        }}
        ?>      
      <tr>
				<td><input name="start[]" type="time" title="Enter the start time for the lecture" /></td>
				<td><input name="end[]" type="time" title="Enter the end time for the lecture" /></td>
				<td><?php echo form_dropdown('slot[]', $options,'');?></td>
				<td><input name="venue[]" type="text" title="Enter the venue for the lecture" /></td>
      </tr>
      <tr>
				<td><input name="start[]" type="time" title="Enter the start time for the lecture" /></td>
				<td><input name="end[]" type="time" title="Enter the end time for the lecture" /></td>
				<td><?php echo form_dropdown('slot[]', $options,'');?></td>
				<td><input name="venue[]" type="text" title="Enter the venue for the lecture" /></td>
			</tr><tr>
				<td><input name=start[]" type="time" title="Enter the start time for the lecture" /></td>
				<td><input name="end[]" type="time" title="Enter the end time for the lecture" /></td>
				<td><?php echo form_dropdown('slot[]', $options,'');?></td>
				<td><input name="venue[]" type="text" title="Enter the venue for the lecture" /></td>
			</tr><tr>
				<td><input name="start[]" type="time" title="Enter the start time for the lecture" /></td>
				<td><input name="end[]" type="time" title="Enter the end time for the lecture" /></td>
				<td><?php echo form_dropdown('slot[]', $options,'');?></td>
				<td><input name="venue[]" type="text" title="Enter the venue for the lecture" /></td>
      </tr>
      <tr>
      <td><?php echo form_submit('submit','submit');?></td>
      </tr>
      </tbody></table><br><br>
      <input type="hidden" name="program" value="<?php echo $this->input->post('program') ?>" />
      <input type="hidden" name="batch_year" value="<?php echo $this->input->post('batch_year') ?>" />
      <?php echo form_close();?>
			<table class="nohover">
			<thead><tr>
				<th>Weekday</th><th>Lecture-1</th><th>Lecture-2</th><th>Lecture-3</th><th>Lecture-4</th>
			</tr></thead>
      <tbody>
      <tr>
        <th>Monday</th>
        <?php foreach ($timetable as $row) {
              if($row['day']=='mon' && $row['type']='lecture'){
        ?>
          <td><?php echo $row['course_id']?><br><i><?php echo "(".$row['start_time']."-".$row['end_time'].")";?></i></td>
        <?php }}?>
      
      </tr>
      
      <tr>
        <th>Tuesday</th>
        <?php foreach ($timetable as $row) {
              if($row['day']=='tue' && $row['type']='lecture'){
        ?>
          <td><?php echo $row['course_id']?><br><i><?php echo "(".$row['start_time']."-".$row['end_time'].")";?></i></td>
        <?php }}?>
      
      </tr>

      <tr>
        <th>Wednesday</th>
        <?php foreach ($timetable as $row) {
              if($row['day']=='wed'&& $row['type']='lecture'){
        ?>
          <td><?php echo $row['course_id']?><br><i><?php echo "(".$row['start_time']."-".$row['end_time'].")";?></i></td>
        <?php }}?>
      </tr>
      
      <tr>
        <th>Thursay</th>
        <?php foreach ($timetable as $row) {
              if($row['day']=='thu'&& $row['type']='lecture'){
        ?>
          <td><?php echo $row['course_id']?><br><i><?php echo "(".$row['start_time']."-".$row['end_time'].")";?></i></td>
        <?php }}?>
     <tr/> 
    
      <tr>
        <th>Friday</th>
        <?php foreach ($timetable as $row) {
              if($row['day']=='fri'&& $row['type']='lecture'){
        ?>
          <td><?php echo $row['course_id']?><br><i><?php echo "(".$row['start_time']."-".$row['end_time'].")";?></i></td>
        <?php }}?>
      <tr/>
      </tbody>
      </table>
			<br><br><input type="submit" value="Submit" />
			</form>
			</div>
			
		</div>
	</div>
	<!-- end content -->
<?php
