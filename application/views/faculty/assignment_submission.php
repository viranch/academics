<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Assignments</h2>
				<?php
					if($assignment_info != null){
						foreach($assignment_info as $row){
						echo "<ul>&nbsp;&nbsp; 
							<strong>{$row['file']}</strong><br>&nbsp;&nbsp;
							<i>C0urse: <strong>{$row['course_id']}</strong></i><br>
							<i>Deadline: <strong>{$row['deadline']}</strong></i><br><br>
							</ul>";
						}
					}
				?>
				
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
	<!-- start sidebar -->
			<div id="sidebar">
		<ul>
			<li>
				<h2>Courses</h2>
				<ul>
					<?php   if($btech_courses != null){
							   $btechyear = 0;
							   foreach( $btech_courses as $row){
									if($btechyear != $row['batch_year']){
										echo "<h3>B.Tech : {$row['batch_year']}</h3>";
										$btechyear = $row['batch_year'];
										}
										$var = $row['course_id'];
									echo "<li><a href='/academics/index.php/faculty/faculty/assignments_display/$var'>{$row['course_id']}</a></li>";

								}
							}
					?>

				</ul>
				<ul>
					<?php   if($mtech_courses != null){
								$mtechyear = 0;
								foreach( $mtech_courses as $row){
									if($mtechyear != $row['batch_year']){
										echo "<h3>M.Tech : {$row['batch_year']}</h3>";
										$btechyear = $row['batch_year'];
									}
									$var = $row['course_id'];
									echo "<li><a href='/academics/index.php/faculty/faculty/assignments_display/$var'>{$row['course_id']}</a></li>";

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
					<li><a href="http://intranet.daiict.ac.in/~daiict_nt01/Lecture/" target="_blank">\\daiictpdc</a></li>
					<li><a href="http://intranet.daiict.ac.in" target="_blank">Intranet</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title"><a href="#">Submitted Assignment Details</a></h2>
			<div class="entry">
			
			<table class="tab_assign">
			<?php 
					if($details == null){
						echo " There are no submissions for this assignment till now";}
					else{
						foreach($details as $row){
							
							$var = base_url(). "index.php/faculty/faculty/lectures/".$row['course_id'].'/'. $row['filename'];
							echo "<tr><td>{$row['user_id']}</td>";
							echo "<td><a href= '$var'> {$row['filename']} </a> </td>";
							echo "<td>{$row['submission_time'] }</td></tr>";
						//	echo "<p align='right'> {$row['description']} </p>";
						}
					} ?>			
				</table>
			</div>
			
		</div>
	</div>
	<!-- end content -->

