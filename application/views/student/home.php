<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Lectures Today</h2>
				<table class="tab">
        <?php   if(isset($timetable)){ ?>
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
          echo "No clasess today";
        }
        ?>
				</table>
			</li>
			<li>
				<h2>Labs Today</h2>
				<ul>
					<table class="tab">
        <?php   if(isset($timetable)){?>          
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
            echo "No labs today";
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
				<h2>Resources</h2>
				<ul>
					<li><a href="http://intranet.daiict.ac.in">intranet</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in">Resource Center</a></li>
				  <li><a href="http://library.daiict.ac.in">Library</a></li>
				  <li><a href="http://webmail.daiict.ac.in">Webmail</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title"><a href="#"> Announcements</a></h2>
			<div class="entry">
        <?php if(isset($announcements)){
              foreach ($announcements as $row){?>
          
        <p class="ann_p"><strong><text class ="ann_name">
          <?php 
              if($row['course_id']!='')
                echo "{$row['course_id']}:";
              echo "{$row['candidate_name']}";
          ?> 
        </text></strong><br>
        &nbsp;&nbsp;
        <?php echo "{$row['message']}";?> <br>
        &nbsp;&nbsp; Posted on 
        <strong><i><?php
          echo "{$row['sent_date']}";
        ?></i></strong></p>
        <?php }}?>
		<div class="more"><i><a href="student/student/announcements">More...</a></i></div>
				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="#">Assignment Deadlines</a></h2>
			<div class="entry">
      <?php   if(isset($deadlines)){
              foreach ($deadlines as $row) {
                  if($row['deadline']!= 0000-00-00){ ?>
                    <p class="ann_p"><strong><text class="ann_name"> <?php echo "{$row['course_id']}";?></text></strong><br>&nbsp;&nbsp;
                    <?php echo "{$row['description']}";?>
                    <strong><br>&nbsp;&nbsp;<?php
                      echo "{$row['deadline']}";
                    ?></strong></p>
              <?php }}} ?> 

			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>
<?php


