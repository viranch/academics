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
						echo "<ul>&nbsp;&nbsp; 
							<strong>{$row['file']}</strong><br>&nbsp;&nbsp;
							<i>Course: <strong>{$row['course_id']}</strong></i><br>
							<i>Deadline: <strong>{$row['deadline']}</strong></i><br><br>
							</ul>";
						}
					}
				?>
				
			</li>
			<li>
				<h2>Important Dates</h2>
				<ul>
					<table class="tab">
				<tr>
				<th>Date</th>
				<th>Description</th>
				</tr>
				<tr>
				<td>25 March, 2011</td>
				<td>SEM VI</td>
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
                        <h2 class="title"><a href="#">Upload Grades</a></h2>
                        <div class="entry">
			<?php 	if($stu_list != null){
					$var = '/academics/index.php/faculty/faculty/gradeupdate/'.$this->uri->segment(4);?>
					<form action='<?php echo $var;?>' method = 'post'>
                                <table id="grad_table">
                                <tr>
                                        <td width=20%>Id</td>
                                        <td>Insem1</td> 
                                        <td>Insem2</td> 
                                        <td>Endsem</td> 
                                        <td>Misc</td>
                                        <td>Effective Total</td>
                                        <td>Grade</td>
								
					<?php 
							foreach($stu_list as $row){
							if(!$row['audit'] && $row['pass_course']=='no'){
							$id_insem1 = "insem1_".$row['user_id'];
							$id_insem2 = "insem2_".$row['user_id'];
							$id_endsem = "endsem_".$row['user_id'];
							$id_misc   = "misc_"  .$row['user_id'];
							$id_grade  = "grade_" .$row['user_id'];
							$id_effective = "effective_".$row['user_id'];?>
					</tr><tr class='stu'>
                                        <td><?php echo "{$row['user_id']}"; ?></td>
                                        <td><input name='<?php echo $id_insem1;?>' class ='insem1' type='input' value='<?php echo "{$row['marks_insem1']}";?>' size=1%></td> 
                                        <td><input name='<?php echo $id_insem2;?>' type='input' class ='insem2' value='<?php echo "{$row['marks_insem2']}";?>' size=1%></td> 
                                        <td><input name='<?php echo $id_endsem;?>' type='input' class ='endsem' value='<?php echo "{$row['marks_endsem']}";?>' size=1%></td> 
                                        <td><input name='<?php echo $id_misc;?>'   type='input' class ='misc' value='<?php echo "{$row['marks_misc']}";?>' size=1%></td>
                                        <td><input name='<?php echo $id_effective;?>'  type='input' class ='effective_marks'   value='<?php echo "{$row['marks_effective']}";?>' size=1%></td>
                                        <td><input name='<?php echo $id_grade;?>'  type='input' class ='effective_marks' value='<?php echo "{$row['grade']}";?>' size=1%></td>
					</tr>
						<?php }} ?>
							
					<?php	foreach($stu_list as $row){
							if($row['audit'] == 1){
							$id_insem1 = "insem1_".$row['user_id'];
							$id_insem2 = "insem2_".$row['user_id'];
							$id_endsem = "endsem_".$row['user_id'];
							$id_misc   = "misc_"  .$row['user_id'];
							$id_grade  = "grade_" .$row['user_id'];
							$id_effective = "effective_".$row['user_id'];
							$grade = $row['grade']?>
					<tr class='stu'>
                                        <td><?php echo "{$row['user_id']}"; ?></td>
                                        <td><input name='<?php echo $id_insem1;?>' class ='insem1' type='input' value='<?php echo "{$row['marks_insem1']}";?>' size=1%></td> 
                                        <td><input name='<?php echo $id_insem2;?>' type='input' class ='insem2' value='<?php echo "{$row['marks_insem2']}";?>' size=1%></td> 
                                        <td><input name='<?php echo $id_endsem;?>' type='input' class ='endsem' value='<?php echo "{$row['marks_endsem']}";?>' size=1%></td> 
                                        <td><input name='<?php echo $id_misc;?>'   type='input' class ='misc' value='<?php echo "{$row['marks_misc']}";?>' size=1%></td>
                                        <td><input name='<?php echo $id_effective;?>'  type='input' class ='effective_marks'   value='<?php echo "{$row['marks_effective']}";?>' size=1%></td>
                                        <td><select  style="width:100px" name='<?php echo $id_grade;?>'><?php  if($grade =='')echo "<option value='' selected='selected'></option> <option value='P' >Pass</option><option  value='F'>Fail</option></select>";
																				if($grade =='P')echo "<option value=''></option> <option value='P' selected='selected'>Pass</option><option  value='F'>Fail</option></select>";
																				if($grade =='F')echo "<option value=''></option> <option value='P' >Pass</option><option value='F' selected='selected'>Fail</option></select>";?></td>
					</tr>
						<?php }} ?>
				</table>
				<br><br><br>
                                <strong>Enter the weightage of exams for grading:</strong><br><b>
								<table id="weightages">
                                <tr>    
                                        <td>Insem1:</td>
                                        <td> <input name='wt_insem1' type='input'  id ='insem1_wt' value ='<?php echo $weights[0]["wt_insem1"];?>'></td>
                                </tr><tr>
                                        <td>Insem2:</td>
                                        <td><input name='wt_insem2' type='input'  id ='insem2_wt' value='<?php echo $weights[0]["wt_insem2"];?> '></td>
                                </tr><tr>
                                        <td>Endsem  :</td>
                                        <td><input name='wt_endsem' type='input' id='endsem_wt' value='<?php echo $weights[0]["wt_endsem"];?> '></td>
                                </tr><tr>
                                        <td>Misc:</td>
                                        <td><input name='wt_misc' type='input' id='misc_wt' value='<?php echo $weights[0]["wt_misc"];?> '></td>
                                </tr><tr>
                                        <td /><td><input type='button' value='Calculate Effective Marks' Onclick='calculate()'></td>
                                </tr></table><br><br>
                                <p align="center"><input type='submit' value='Submit' class="centerbutton"></p>
                        </form>
			<?php }
				else { ?> <b>There are no registered users for this course</b> <?php } ?>
                        </div>
                </div>
        </div>
        <!-- end content -->

