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
		</ul>
	</div>
<!-- end of sidebar2 -->
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
			<h2 class="title"><a href="#">Start new forum</a></h2>
			<div class="entry">			
			<?php echo form_open('faculty/faculty/updateforum/'.$cid);?>
			<p><h2>Subject</h2></p>
			<input type="text" size="90" name="subject" maxlength="150"/>
			<p><h2>Description</h2></p>
			<textarea rows="10" cols="70" name="description"></textarea>
     <p align="center">
<input type="submit" value="Submit" style="height:25px;width:130px;color:#fff;font-weight:bold;background:#3E83C9">
</p>
        </form>
			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->

