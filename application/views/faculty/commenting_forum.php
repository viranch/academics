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
			<h2 class="title"><a href="#">Comments</a></h2>
			<div class="entry">
		   	<?php if($comments != null){
					foreach($comments as $comment){ ?>
            <h4 class="forumuser"><?php echo $comment['user_id'];
			 if($this->session->userdata('user_id') == $comment['user_id'])
			 echo "&nbsp;&nbsp;".anchor('faculty/faculty/deletecomment/'.$comment['fid'].'/'.$comment['timeofpost'], '<img src="/academics/assets/images/icon-close.png" height=2.7% align="right">');?></h4>
			<p ><?php echo $comment['content'] ;?></p ><p class="postcomments">Posted on <?php echo date("d-m-Y", $comment['timeofpost']) ;?></p>
			<?php } }
			else echo "no comments till now";
			?>
			
			 <?php echo form_open('/faculty/faculty/insertcomment/'.$this->uri->segment(4));?>
			 <textarea rows="10" cols="60" name="Comment"></textarea><br><br>
        <input type="submit" value="Submit Comment" style="height:25px;width:130px;color:#fff;font-weight:bold;background:#3E83C9" name="submitcomment">
        </form>
			 
			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->

