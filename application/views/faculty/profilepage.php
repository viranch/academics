<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Assignments</h2>
				<?php
					if($assignment_info != null){
						foreach($assignment_info as $row){
			//			echo date('m',$row['deadline']);
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
			<h2 class="title"><a href="#">Profile</a></h2>
			<div class="entry">
				<table id="profiletable">
				<tr>
            <?php $file=base_url()."images/".$details['0']['image']; ?>
          <td>
            <img src="<?php echo "{$file}";?>" /></td>
					<td width=65%></td>
				</tr>
				<tr>
					<td>Name:</td>
          <td><?php   foreach($details as $detail)
                                        echo $detail['name'];?></td>
				</tr>
				<tr>
					<td>ID:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['user_id']; ?></td>
				</tr>
				<tr>
					<td>Email:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['email_id']; ?></td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['dob']; ?></td>
				</tr>
				<tr>
					<td>Gender:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['gender']; ?></td>
				</tr>
				<tr>
					<td>Area of Expertise:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['area_of_expertise']; ?></td>
				</tr>
				<tr>
					<td>Date of Joining:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['date_of_joining'] ; ?></td>
				</tr>
				<tr>
					<td>Degrees:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['degrees']; ?></td>
				</tr>
				<tr>
					<td>Experience:</td>
          <td><?php foreach($details as $detail)
                                        echo $detail['experience']; ?></td>
				</tr>
				</table>
			</div>
		</div>
	</div>
	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>
<?php
