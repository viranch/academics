<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Lectures today</h2>
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
							<h2>Labs Today</h2>
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
			<h2 class="title"><a href="#">Courses</a></h2>
			<div class="entry">
      <ul>
      <li>
      </li>
      </ul>
      </div>
		</div>
	</div>
	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>
<?php
