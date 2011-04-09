<!-- start page -->
<div id="wrapper">
<div id="page">


<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Lecture Timetable</h2>
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
				<h2>Lab timetable</h2>
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
			<h2 class="title"><a href="#"> Anouncements</a></h2>
			<div class="entry">
        <?php foreach ($announcements as $row){?>
          
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
        <?php }?>

				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="#">Deadlines</a></h2>
			<div class="entry">
       <?php foreach ($deadlines as $row) {
                  if($row['deadline']!= 0000-00-00){ ?>
                    <p class="ann_p"><strong><text class="ann_name"> <?php echo "{$row['course_id']}";?></text></strong><br>&nbsp;&nbsp;
                    <?php echo "{$row['description']}";?>
                    <strong><br>&nbsp;&nbsp;<?php
                      echo "{$row['deadline']}";
                    ?></strong></p>
              <?php }} ?> 

			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
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
				<h2>Resources</h2>
				<ul>
					<li><a href="http://intranet.daiict.ac.in">intranet</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in">Resource Center</a></li>
					<li><a href="\\10.100.56.21">daiictpdc</a></li>
					<li><a href="http://library.daiict.ac.in">Library</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
<?php


