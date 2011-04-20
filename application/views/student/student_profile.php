<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Lectures today</h2>
        <?php if(isset($timetable)){?>
        <table class="tab">
        <tr>
				  <th>Course</th>
				  <th>Start</th>
				  <th>End</th>
				</tr>
          <?php
          
            foreach ($timetable as $row) {
              if($row['type']=='lecture'){
                echo "<tr><td>{$row['course_id']}</td>";
                echo "<td>{$row['start_time']}</td>";
                echo "<td>{$row['end_time']}</td></tr>";
              }
            }
        }
          else{
            echo "<h3>No clasess today</h3>";
          }
          ?>
				</table>
			</li>
			<li>
							<h2>Labs Today</h2>
				<ul>
<?php if(isset($timetable)){ ?>  
        <table class="tab">
				<tr>
				<th>Course</th>
				<th>Start</th>
				<th>End</th>
				</tr>
         <?php                
                  
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
          else{
            echo "<h3>No labs today</h3>";
          }

          ?>

				</table>
				</ul>
			</li>
			<li>

			</li>
		</ul>
	</div>
<!-- end of sidebar2 -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Courses(Ongoing)</h2>
        <h3>
        <?php
        ?>
        </h3>
        <ul>
        <?php
         if(isset($courses)){
           foreach ($courses as $row) {
              echo "<li>".anchor('student/lectures/index/'.$row['course_id'], $row['course_id'])."<br>{$row['course_name']}</li>";//all the courses links need to be given
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
					<li><a href="http://library.daiict.ac.in" target="_blank">Library</a></li>
					<li><a href="http://intranet.daiict.ac.in" target="_blank">Intranet</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title"><a href="#">Profile</a></h2>
			<div class="entry">
				<table id="profiletable">
        
        <?php if(!isset($student)){
          echo "<h3>Student profile information is not completely entered by admin<br>Please Contact administrator</h3>";
        }?>
        <tr>
            <?php $file=base_url()."images/".$profile['0']['image']; ?>
          <td>
            <img src="<?php echo "{$file}";?>" height="250" width="200"  /></td>
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
					<td>Tenth Percentage:</td>
          <td><?php echo "{$student['0']['tenth_percentage']}"; ?></td>
				</tr>
				<tr>
					<td>Twelfth Percentage:</td>
          <td><?php echo "{$student['0']['twelfth_percentage']}"; ?></td>
				</tr>
				<tr>
					<td>Tenth School:</td>
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
				<tr>
					<td>Address</td>
          <td><?php echo "{$profile['0']['address']}";?></td>
				</tr>
				</table>
			</div>
		</div>
	</div>
  <!-- end content -->

	<div style="clear: both;">&nbsp;</div>
<?php
