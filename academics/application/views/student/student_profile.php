<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Lecture Timetable</h2>
				<table class="tab">
        <tr>
				  <th>Course</th>
				  <th>Start</th>
				  <th>End</th>
				</tr>
          <?php
          if(isset($timetable)){
            foreach ($timetable as $row) {
              if($row['type']=='lecture'){
                echo "<tr><td>{$row['course_id']}</td>";
                echo "<td>{$row['start_time']}</td>";
                echo "<td>{$row['end_time']}</td></tr>";
              }
            }
          }
          ?>
				</table>
			</li>
			<li>
							<h2>Lab timetable</h2>
				<ul>
					<table class="tab">
				<tr>
				<th>Course</th>
				<th>Start</th>
				<th>End</th>
				</tr>
         <?php                
          if(isset($timetable)){          
              $count=0;
              foreach ($timetable as $row) {  
                  if($row['type']=='lab'){     
                      echo "<tr><td>{$row['course_id']}</td>";
                      echo "<td>{$row['start_time']}</td>";
                      echo "<td>{$row['end_time']}</td></tr>";
                      $count++;
                  }
              }
            if($count==0)
              echo "<tr><td>Not yet set</td></tr>";
          }
          ?>

				</table>
				</ul>
			</li>
			<li>
				<h2>Important Dates</h2>
				<ul>
					<table class="tab">
				<tr>
				<th>start</th>
        <th>Event</th>
        <th>end</th>
        </tr>
        <?php
        if(isset($important_dates)){  
          foreach ($important_dates as $row) {
            echo "<tr><td>{$row['start_date']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['end_date']}</td></tr>";
          }
        }
        ?>
				</table>
				</ul>

			</li>
		</ul>
	</div>
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title"><a href="#">Profile</a></h2>
			<div class="entry">
				<table id="profiletable">
				<tr>
            <?php $file=base_url()."images/".$profile['0']['image']; ?>
          <td>
            <img src="<?php echo "{$file}";?>" /></td>
					<td></td>
				</tr>
				<tr>
					<td>Name:</td>
          <td><?php echo "{$profile['0']['candidate_name']}";?></td>
				</tr>
				<tr>
					<td>ID:</td>
          <td><?php echo "{$profile['0']['user_id']}"; ?></td>
				</tr>
				<tr>
					<td>Email:</td>
          <td><?php echo "{$profile['0']['email_id']}";?></td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
          <td><?php echo "{$profile['0']['dob']}";?></td>
				</tr>
				<tr>
					<td>Gender:</td>
          <td><?php echo "{$profile['0']['gender']}";?></td>
				</tr>
				<tr>
					<td>SSC Percentage:</td>
          <td><?php echo "{$student['0']['tenth_percentage']}"; ?></td>
				</tr>
				<tr>
					<td>HSC Percentage:</td>
          <td><?php echo "{$student['0']['twelfth_percentage']}"; ?></td>
				</tr>
				<tr>
					<td>SSC School:</td>
          <td><?php echo "{$student['0']['school_name']}";?></td>
				</tr>
				<tr>
					<td>Boards:</td>
          <td><?php echo "{$student['0']['twelfth_board']}"; ?></td>
				</tr>
				<tr>
					<td>Year of passing Std 12:</td>
          <td><?php echo "{$student['0']['twelfth_year']}";?></td>
				</tr>
				</table>
			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Courses</h2>
        <h3>
        <?php
          if(isset($batch))
            echo "{$batch['0']['semester']}";
        ?>
        </h3>
        <ul>
        <?php
         if(isset($courses)){
           foreach ($courses as $row) {
              echo "<li>".anchor('student/lectures/index/'.$row['course_id'], $row['course_id'])."</li>";//all the courses links need to be given
           }
         }
        ?>
        </ul>
    </li>
			<li>
			<li>
				<h2>Resources</h2>
				<ul>
					<li><a href="http://webmail.daiict.ac.in" target="_blank">Webmail</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in:8081/webslim/default.asp" target="_blank">Resource Center</a></li>
					<li><a href="http://intranet.daiict.ac.in/~daiict_nt01/" target="_blank">\\daiictpdc</a></li>
					<li><a href="http://intranet.daiict.ac.in" target="_blank">Intranet</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
<?php
