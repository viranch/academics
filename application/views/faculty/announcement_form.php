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
									echo "<li><a href='#'>{$row['course_id']}</a></li>";
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
									echo "<li><a href='#'>{$row['course_id']}</a></li>";
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
			<h2 class="title"><a href="#">Post Announcement</a></h2>
			<div class="entry">
		
			<?php echo form_open('faculty/faculty/announce');?>
			
			<table class="tab_fee" class="alt_fee_details">
			
	<tr> 
	<td class="alt_fee_details">Course ID</td>
	<td width="150px"><input type="text" size="50" name="courseid"/></td>
   </tr>
   	<tr> 
	<td class="alt_fee_details">Program</td>
	<td>
<select name="progrm" style="width:100px" name="proram" size=4 multiple>
<option value="Btech(ICT)">Btech(ICT)</option>
<option value="Mtech(ICT)">Mtech(ICT)</option>
<option value="MSc(IT)">MSc(IT)</option>
<option value="Msc(IT-ARD)">Msc(IT-ARD)</option>
<option value="Mdes">Mdes</option>
<option value="Phd">Phd</option>
</select>
</td>
	
	<tr> 
	<td class="alt_fee_details">Batch</td>
	<td>
		<input type="checkbox" name="batch[]" value="2007" />2007
		<input type="checkbox" name="batch[]" value="2008" />2008
		<input type="checkbox" name="batch[]" value="2009" />2009
		<input type="checkbox" name="batch[]" value="2010" />2010
	</td>
   </tr>
   
   <tr> 
	<td class="alt_fee_details">Announcement</td>
	<td><textarea rows="3" cols="40" name="message"></textarea></td>
   </tr>
</table>
<input type="submit" value="Submit" style="height:25px;width:130px;color:#fff;font-weight:bold;background:#3E83C9" name="submit">
        </form>
<h2 class="title">Recent Announcements</h2>
		<br></br>
		<table class="tab_assign">
				<tr>
				<th width=30%>Course ID</th>
				<th width=50%>Announcement</th>
				</tr>
				<?php if($notifications != null){
					foreach($notifications as $row){
					$url = "faculty/faculty/deleteannouncement/".$row['id'].'/'.$row['sent_time'];
					echo "<tr><td>".$row['course_id']."</td><td>".$row['message']."</td><td>".anchor($url,'delete')."</td></tr>";
					}
					}
					else echo "<tr>No announcements by you </tr>";
				?>
				</table>
			
			<p></p>
			
        
			</div>
		</div>
	</div>
	<!-- end content -->

