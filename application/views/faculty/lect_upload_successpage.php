

<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
	<div id="sidebar1">
		<ul>
			<li>
				
				<ul>&nbsp;&nbsp;
				<strong></strong><br>&nbsp;&nbsp;
				<i><strong</strong></i>
				</ul>
				
			</li>
			<li>
				<h2></h2>
				<ul>
					<table class="tab">
				<tr>
				<th></th>
				<th></th>
				</tr>
				<tr>
				<td></td>
				<td></td>
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
							$var = base_url()."lectures/".$row['course_id'].'/'. $row['filename'];
							echo "<a href= '$var'> {$row['filename']} </a>";
							echo "<p align='right'> {$row['description']} </p>";
						}
					} ?>
				
			</div>
			
		</div>
		<div class="post">
			<h2 class="title"><a href="">Upload Lectures</a></h2>
			<div class="entry">
			<ul>
			<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
			</ul>
			
			<p><?php $anc = base_url().'index.php/faculty/faculty/lectures_display/'.$this->uri->segment(4);
						echo anchor($anc , 'Upload Another File!'); ?></p>

			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->
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
									echo "<li><a href='/academics/index.php/faculty/faculty/lectures_display/$var'>{$row['course_id']}</a></li>";
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

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->

</body>
</html>
