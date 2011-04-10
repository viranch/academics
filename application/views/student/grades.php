<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Electives Status</h2>
				<ul>
				<table class="tab">
<?php $group=0;
      $open=0;
  $technical=0;
      $science=0;
      if(isset($elective)){ 
      
      foreach ($elective as $row) {
        if($row['category']=='group')
          $group++;
        if($row['category']=='open')
          $open++;
        if($row['category']=='technical')
          $technical++;
      if($row['category']=='science')
        $science++;
      }
    }
?>
          
          <tr>
						<td>Group Electives</td>
            <td align="right"><?php echo $group;?></td>
					</tr>
					<tr>
						<td>Technical Electives</td>
            <td align="right"><?php echo $technical;?></td>
					</tr>
					<tr>
						<td>Science Electives</td>
            <td align="right"><?php echo $science;?></td>
					</tr>
					<tr>
						<td>Open Electives</td>
            <td align="right"><?php echo $open;?></td>
					</tr>
				</table>
				</ul>
			</li>
		</ul>
	</div>
<!-- end of sidebar2 -->
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
					<li><a href="http://library.daiict.ac.in" target="_blank">Resource Center</a></li>
					<li><a href="http://placement.daiict.ac.in" target="_blank">placement</a></li>
					<li><a href="http://intranet.daiict.ac.in" target="_blank">Intranet</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->
<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Grades</h2>
			<div class="entry">
      <p><strong><text class ="ann_name"><?php echo $course['0']['semester'];?></text></strong><br>
				<table id="grades">
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
          <?php foreach ($course as $row) {?>
        <tr>
        <td><text class="sub_ann_name"><a href="http://link.to/course_page"><?php echo $row['course_name']." (".$row['course_id'].")";?></a></text></td>
        <td><text class="sub_ann_name"><?php echo $row['credits'];?></text></td>
        <td><text class="sub_ann_name"><?php echo $row['grade'];?></text></td>
        <td><text class="sub_ann_name"><?php echo $row['gradepoints'];?></text></td>
        </tr>
        <?php $count=$count+$row['credits'];
              $gradepoints=$gradepoints+$row['gradepoints'];}?>
				</tbody>
				</table><br>
				<table id="gradetable_head">
				<tr>
				<td width=40% align="center"><strong>Current Semester Performance</strong></td>
				<td width=40% align="center"><strong>Cumulative Performance</strong></td>
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
          <td><text class="sub_ann_name"><?php echo $spi[0]['credits_registered'];?></text></td>
          <td><text class="sub_ann_name"><?php echo $spi[0]['credits_earned']; ?></text></td>
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

