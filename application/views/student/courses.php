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
			<h2 class="title"><a href="#">Lectures</a></h2>
			<div class="entry">
        <?php if(isset($lectures)){ 
        $dir=base_url()."lectures/";  
        foreach ($lectures as $row){?>
          
        <p class="ann_p"><strong><text class ="ann_name">
          <?php 
              echo "{$row['description']}";
          ?> 
        </text></strong><br/><br/>
        &nbsp;&nbsp; 
        <?php echo "<a href=\"".$dir.$row['filename']."\">".$row['filename']."</a>"?> <br/>
        &nbsp;&nbsp; Posted on 
        <strong><i><?php
          echo "{$row['date']}";
        ?></i></strong></p>
        <?php }}?>

				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="#">Assignments</a></h2>
			<div class="entry">
       <?php foreach ($assgn as $row) {?>
              <p class="ann_p"><strong><text class="ann_name"> 
                  <?php echo "{$row['description']}";?>
              </text></strong><br>&nbsp;&nbsp;
                     
        <br>&nbsp;&nbsp;
                  <?php
                  $dir=base_url()."lectures/";
                  echo "<a href=\"".$dir.$row['file']."\">".$row['file']."</a></text>"
                  ?>
              <?php 
                  echo form_open_multipart('student/lectures/upload');
                  
                  echo form_hidden('course_id', $row['course_id']);
                  echo form_hidden('id', $row['assignment_id']);
                  echo form_hidden('faculty_id',$row['user_id']);
                  echo form_upload('userfile');
                  echo form_submit('submit','Upload');
                  echo form_close(); 

          }?>  </p>

			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>
<?php


