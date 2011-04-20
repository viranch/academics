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
			
			<h2 class="title"><a href="#">Forum Topics</a></h2>
			<div class="entry">
			<?php $url = '/academics/index.php/faculty/faculty/newforum/'. $cid ;
			if($info != null) {foreach($info as $row){
			echo "<h4 class='forumuser'>".$row['subject']; 
			$url = 'faculty/faculty/forumdelete/' . $row['fid'].'/'. $row['course_id'];
			if($this->session->userdata('user_id') == $row['user_id'])
        echo anchor($url,'<img src="/academics/assets/images/icon-close.png" height=2.7% align="right"></h4>');
      else echo "</h4>";
		    echo "<p >".$row['Description']. "</p >";
      echo "<p class='postcomments'>Started by ".$row['user_id']."</p>";
      echo "<a href='/academics/index.php/faculty/faculty/commnentingpage/".$row['fid']."'>Comments...</a>";
			echo "<br><br>";}}
      else echo "no forums yet";?>
      <?php echo form_open('faculty/faculty/updateforum/'.$cid);?>
      <h2>Start a topic</h2>
       <p><b>Subject</b></p>
       <input type="text" size=80% name="subject" maxlength="150"/>
       <p><b>Description</b></p>
       <textarea rows="10" cols="70" name="description"></textarea>
      <p align="center">
 <input type="submit" value="Start topic" >
 </p>
         </form>

			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->

