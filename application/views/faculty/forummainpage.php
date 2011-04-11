<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Links for course <?php echo $cid; ?></h2>
					&nbsp;&nbsp;<strong><a href="/academics/index.php/faculty/faculty/lectures_display/<?php echo $cid; ?>">Lectures</a></strong><br><br>
					&nbsp;&nbsp;<strong><a href="/academics/index.php/faculty/faculty/assignments_display/<?php echo $cid; ?>">Assignments</a></strong><br><br>
					&nbsp;&nbsp;<strong><a href="/academics/index.php/faculty/faculty/forum/<?php echo $cid; ?>">Discussion Forum</a></strong><br><br>
					&nbsp;&nbsp;<strong><a href="/academics/index.php/faculty/faculty/grade/<?php echo $cid; ?>">Grades</a></strong><br><br>
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
									echo "<li><a href='/academics/index.php/faculty/faculty/forum/$var'>{$row['course_id']}</a></li>";
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
									echo "<li><a href='/academics/index.php/faculty/faculty/forum/$var'>{$row['course_id']}</a></li>";
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
			
			<h2 class="title"><a href="#">Forums</a></h2>
			<div class="entry">
			<?php $url = '/academics/index.php/faculty/faculty/newforum/'. $cid;
			echo "<h2><a href='$url'>Start new forum</a></h2>";
			if($info != null) {foreach($info as $row){
			echo form_open('faculty/faculty/comments/'.$row['fid']);
			echo "<h2>Subject :". $row['subject']. "</h2>" ;
		    echo "<p >".$row['description']. "</p >";
			echo "<p class='postcomments'>".$row['user_id']."</p>";
			echo "<input type='submit' value='Comments' style='height:25px;width:130px;color:#fff;font-weight:bold;background:#3E83C9'> ";
			}}
			else echo "no forums yet";			?>
			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->

