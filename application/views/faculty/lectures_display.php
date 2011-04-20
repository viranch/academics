<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Links for course <?php echo $cid; ?></h2>
          &nbsp;&nbsp;<strong><?php echo anchor('faculty/faculty/lectures_display/'.$cid, 'Lectures');?></a></strong><br><br>
          &nbsp;&nbsp;<strong><?php echo anchor('faculty/faculty/assignments_display/'.$cid,'Assignments');?></strong><br><br>
          &nbsp;&nbsp;<strong><?php echo anchor('faculty/faculty/forum/'.$cid,'Discussion Forum');?></strong><br><br>
          &nbsp;&nbsp;<strong><?php echo anchor('faculty/faculty/grade/'.$cid,'Grades');?></strong><br><br>
				<h2>Assignments</h2>
				<?php
					if($assignment_info != null){
						foreach($assignment_info as $row){
						if ($row['course_id']==$cid) {
						echo "<ul> 
							<strong>{$row['file']}</strong><br>&nbsp;&nbsp;
							<i>Course: <strong>{$row['course_id']}</strong></i><br>&nbsp;&nbsp;
							<i>Deadline: <strong>{$row['deadline']}</strong></i><br><br>
							</ul>";
						}
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
			<h2 class="title"><a href="#">Lectures</a></h2>
			<div class="entry">
				<?php 
					if($lectures == null){
						echo " There are no lectures uploaded";}
					else{
						foreach($lectures as $row){
							$var = base_url()."lectures/".$row['course_id'].'/'. $row['filename'];?>
						<a href='/academics/index.php/faculty/faculty/lecturedelete/<?php echo $row['course_id'].'/'.$row['filename']; ?>'><img src="/academics/assets/images/icon-close.png" height=2.5%></a>
						&nbsp;&nbsp;<a href='<?php echo $var;?>'><?php echo "{$row['filename']}"; ?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<p><?php  echo "{$row['description']}"; ?><b><br>Uploaded on </b><?php echo "{$row['date']}"; ?></p>
					<?php	}
					} ?>
				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="">Upload Lectures</a></h2>
      <p>Allowed file types are (pdf,ppt,xls,doc,txt,docx)</p>
      <div class="entry"><strong><?php  echo $error;?></strong>
					<?php 
						$url = base_url(). "index.php/faculty/faculty/lecture_upload/". $cid;
						echo form_open_multipart($url);?>
					Description:<br><textarea name="description" rows=5 cols=65% ></textarea> <br><br>
					<input type="file" name="userfile" size="20" />
					<input type="submit" value="Upload" />
					</form>
			</div>
		</div>
	</div>
	<!-- end content -->

