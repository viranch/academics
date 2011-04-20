 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>  
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ui/ui.core.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ui/ui.datepicker.js"></script>

<script type="text/javascript">

$(function() {
  $("#deadline").datepicker();
});
</script>


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
			//			echo date('m',$row['deadline']);
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
							$var = base_url()."lectures/".$row['course_id'].'/'. $row['file'];
							echo "<p><a href= '$var'> {$row['file']} </a>";
							echo $row['description'] .'<br>';
							$var = "/academics/index.php/faculty/faculty/display_assignment_submissions/".$row['course_id'].'/'. $row['assignment_id'];
							echo "Deadline: {$row['deadline']} <br>";
							$var1 = "/academics/index.php/faculty/faculty/assignmentdelete/".$row['course_id'].'/'. $row['assignment_id'];
							echo "<a href='$var1'> Delete </a>".'<br/>'; 
							echo "<a href= '$var'> Get Submissions </a><br /></p>";
						}
					} ?>
				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="">Upload New Assignments</a></h2>
			<div class="entry"><strong><?php echo $error;?></strong>
					<?php 
						$url = base_url(). "index.php/faculty/faculty/assignment_upload/". $cid;
						echo form_open_multipart($url);?>
					Description:<br><textarea name="description" rows=5 cols=65% ></textarea> <br><br>
					<b>Deadline</b> : <br>
					Date :&nbsp; <input name="deadline" type="text" id="deadline"/><br>
					Time : <?php echo "<select name='hrs'>";   
								for ($i=0;$i<24;$i++)
									echo "<option value='".$i. "'>" .$i."</option>";
									echo "</select>";
								echo "<select name='mins'>";   
								for ($i=0;$i<60;$i++)
									echo "<option value='".$i. "'>" .$i."</option>";
									echo "</select>";
								echo "<select name='secs'>";   
								for ($i=0;$i<60;$i++)
									echo "<option value='".$i. "'>" .$i."</option>";
									echo "</select>";
									?> <br>
					<input type="file" name="userfile" size="20" />
					<input type="submit" value="Upload" />
					</form>
			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->

