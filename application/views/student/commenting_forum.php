
	<div id="sidebar1">
		<ul>
			<li>
				<h2>Lectures Today</h2>
				<table class="tab">
        <?php   if(isset($timetable)){ ?>
        <tr>
				  <th>Course</th>
				  <th>Start</th>
				  <th>End</th>
				</tr>
          <?php
            foreach ($timetable as $row) {
              if($row['type']=='lecture'){
                echo "<tr><td>{$row['course_id']}</td>";
                echo "<td>{$row['start_time']}</td>";
                echo "<td>{$row['end_time']}</td></tr>";
              }
            }
        }
        else{
          echo "No clasess today";
        }
        ?>
				</table>
			</li>
			<li>
				<h2>Labs Today</h2>
				<ul>
					<table class="tab">
        <?php   if(isset($timetable)){?>          
				<tr>
				<th>Course</th>
				<th>Start</th>
				<th>End</th>
				</tr>
         <?php                
               
              $count=0;
              foreach ($timetable as $row) {  
                  if($row['type']=='lab'){     
                      echo "<tr><td>{$row['course_id']}</td>";
                      echo "<td>{$row['start_time']}</td>";
                      echo "<td>{$row['end_time']}</td></tr>";
                      $count++;
                  }
              }
            if($count==0)
              echo "<tr><td>Not yet set</td></tr>";
          }
          else{
            echo "No labs today";
          }
        
          ?>

				</table>
				</ul>
			</li>
			<li>

			</li>
		</ul>
	</div>
<!-- end of sidebar2 -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Courses(Ongoing)</h2>
        <h3>
        </h3>
        <ul>
        <?php
         if(isset($courses)){
           foreach ($courses as $row) {
              echo "<li>".anchor('student/lectures/index/'.$row['course_id'], $row['course_id'])."<br>{$row['course_name']}</li>";//all the courses links need to be given
           }
         }
        ?>
        </ul>
    </li>
			<li>
				<h2>Resources</h2>
				<ul>
					<li><a href="http://intranet.daiict.ac.in">intranet</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in">Resource Center</a></li>
				  <li><a href="http://library.daiict.ac.in">Library</a></li>
				  <li><a href="http://webmail.daiict.ac.in">Webmail</a></li>
				</ul>
			</li>
			
		</ul>
	</div>

<!-- start content -->
<div id="content">
		<div class="post">
			<?php $url = '/academics/index.php/student/student/newforum/'. $cid;
			echo "<h2><a href='$url'>Start new forum</a></h2>";
			if($forum != null) {foreach($forum as $row){
			echo "<h2>Subject :". $row['subject']. "</h2>" ;
		    echo "<p > Desription".$row['Description']. "</p >";
			echo "<p class='postcomments'>By:".$row['user_id']."</p>";
			}}
			else echo "no forums yet";?>
			
			
			<h2 class="title"><a href="#">Comments</a></h2>
			<div class="entry">
		   	<?php if($comments != null){
					foreach($comments as $comment){ ?>
			 <h4><?php echo $comment['user_id'] ;?></h4>
			<p ><?php echo $comment['content'] ;?></p ><p class="postcomments">Posted on <?php echo date(" d-m-Y", $comment['timeofpost']) ;?></p>
			<?php } }
			else echo "no comments till now";
			?>
			
			 <?php echo form_open('/student/student/insertcomment/'.$this->uri->segment(4).'/'.$cid);?>
			 <textarea rows="10" cols="60" name="Comment"></textarea>
        <input type="submit" value="Submit Comment" style="height:25px;width:130px;color:#fff;font-weight:bold;background:#3E83C9" name="submitcomment">
        </form>
			 
			</div>
			<!--<p class="meta">As on Academic Calender by <a href="#">admin</a></p>-->
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
</div>

</body>
</html>
<?php
