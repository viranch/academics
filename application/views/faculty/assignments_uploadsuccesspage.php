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
							<i>Course: <strong>{$row['course_id']}</strong></i><br>
							<i>Deadline: <strong>{$row['deadline']}</strong></i><br><br>
							</ul>";
						}
					}
				?>
				
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
							   $program =0;
							   foreach( $btech_courses as $row){
									if($btechyear != $row['batch_year'] || $program != $row['program']){
										echo "<h3>{$row['program']}: {$row['batch_year']}</h3>";
										$btechyear = $row['batch_year'];
										$program  = $row['program'];
										}
											$var = $row['course_id'];
									echo "<li><a href='/academics/index.php/faculty/faculty/lectures_display/$var'>{$row['course_id']}</a></li>";
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
			<h2 class="title"><a href="#">Assignments Details</a></h2>
			<div class="entry">
				<?php 
					if($assignments == null){
						echo " There are no assignments uploaded";}
					else{
						foreach($assignments as $row){
							echo "<p>" .$row['description'] . "</p>";
							$var = "index.php/faculty/faculty/display_assignment_submissions/".$row['course_id'].'/'. $row['assignment_id'];
							echo "<p align='right'> Deadline: {$row['deadline']} </p>";
							echo "<a href= '$var'> Get Submissions </a><br />";
						}
					} ?>
				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="">Upload New Assignments</a></h2>
			<div class="entry">  
					
			<p><?php $anc = base_url() .'index.php/faculty/faculty/assignments_display/'.$this->uri->segment(4);
						echo anchor($anc , 'Upload Another File!'); ?></p>
			</div>
		</div>
	</div>
	<!-- end content -->

