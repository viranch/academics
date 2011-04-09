<?php

?>
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
				<tr>
				<td>IT 315</td>
				<td>12:00 PM</td>
				<td>1:00 PM</td>
				</tr>
				<tr>
				<td>SC 105</td>
				<td>10:00 AM</td>
				<td>11:00 AM</td>
				</tr>
				</table>
			</li>
			<li>
				<h2>Electives Status</h2>
				<ul>
				<table class="tab">
					<tr>
						<td>Group Electives</td>
						<td align="right">1/2</td>
					</tr>
					<tr>
						<td>Technical Electives</td>
						<td align="right">2/4</td>
					</tr>
					<tr>
						<td>Science Electives</td>
						<td align="right">2/2</td>
					</tr>
					<tr>
						<td>Open Electives</td>
						<td align="right">2/2</td>
					</tr>
					<tr>
						<td><strong>Elective Credits</strong></td>
						<td align="right"><strong>25.5/31</strong></td>
					</tr>
				</table>
				</ul>
			</li>
			<li>
				<h2>Important Dates</h2>
				<ul>
					<table class="tab">
				<tr>
				<th>Date</th>
				<th>Description</th>
				</tr>
				<tr>
				<td>25 March, 2011</td>
				<td>SEM VI</td>
				</tr>
				<tr>
				<td>28 March, 2011</td>
				<td>Hanuman Jayanti</td>
				</tr>
				</table>
				</ul>

			</li>
		</ul>
	</div>
<!-- end of sidebar2 -->
<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Grades</h2>
			<div class="entry">
      <p><strong><text class ="ann_name"><?php echo $course['0']['semester'];?></text></strong><br>
        <?php if(isset($courses)){?>
        <table id="sem1">
				<thead>
				<tr>
					<th width=50%>Course</th>
					<th>Credits</th>
					<th>Grade</th>
					<th width=20%>Grade Points</th>
				</tr>
        </thead>
        <?php $count=0;$gradepoints=0; ?>
				<tbody>
          <?php 
                foreach ($course as $row) {?>
        <tr>
        <td><text class="sub_ann_name"><a href="http://link.to/course_page"><?php echo $row['course_name']." (.".$row['course_id'].")";?></a></text></td>
        <td><text class="sub_ann_name"><?php echo $row['credits'];?></text></td>
        <td><text class="sub_ann_name"><?php echo $row['grade'];?></text></td>
        <td><text class="sub_ann_name"><?php echo $row['gradepoints'];?></text></td>
        </tr>
        <?php $count=$count+$row['credits'];
              $gradepoints=$gradepoints+$row['gradepoints'];}?>
				</tbody>
        </table>
        <?php } ?>
				<table id="gradetable_head">
				<tr>
				<td width=40%><strong>Current Semester Performance</strong></td>
				<td width=40%><strong>Cumulative Performance</strong></td>
				</tr>
				<tr>
				<td><table id="gradetable">
				<thead>
					<tr>
						<th>Credits</th>
						<th>Grade Points</th>
						<th>SPI</th>
					</tr>
				</thead>
				<tbody>
					<tr>
          <td><text class="sub_ann_name"><?php echo $count;?></text></td>
          <td><text class="sub_ann_name"><?php echo $gradepoints; ?></text></td>
          <td><text class="sub_ann_name"><?php echo $spi[0]['spi'];?></text></td>
					</tr>
				</tbody>
				</table></td>
				<td><table id="gradetable">
				<thead>
					<tr>
						<th>Credits</th>
						<th>Grade Points</th>
						<th>CPI</th>
					</tr>
				</thead>
				<tbody>
					<tr>
          <td><text class="sub_ann_name"><?php echo $cpi[0]['Total_credits_earned'];?> </text></td>
          <td><text class="sub_ann_name"><?php echo $cpi[0]['Overall_grade_points'];?></text></td>
          <td><text class="sub_ann_name"><?php echo $cpi[0]['CPI'];?></text></td>
					</tr>
				</tbody>
				</table></td>
				</tr>
				</table>
				</p><br>
			</div> <!-- end entry -->
		</div><!-- end post -->
	</div>
<!-- end content -->
<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Semesters</h2>
				<ul>
          <?php
            if(isset($semester)){
            foreach ($semester  as $sem) {
          ?>
            <li><?php echo anchor('student/student/grades/'.$sem['sem_id'], $sem['semester']);?></li>
          <?php
            }
          }
          ?>
				</ul>
			</li>
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

