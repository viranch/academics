
  <div id="sidebar1">
  <ul>
         <li>
           <h2>Forum</h2>
           <?php
      if(isset($info)){
         foreach ($info as $row) {
           //echo anchor('student/student/f/'.$row['fid']."/".$this->uri->segment(4),$row['subject'])."<br/>";
            echo anchor('student/student/f/'.$row['fid']."/".$cid,$row['subject'])."<br/>";
          }
     }
          else {
            echo "<h3>No forums created yet</h3>";
          }
  
    $url = '/academics/index.php/student/student/newforum/'. $cid;?>
    <i><a href="<?php echo $url ?>">Start new topic...</a></i>
  
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
			<?php
			if($forum != null) {foreach($forum as $row){?>
			<h2 class='title'><?php echo $row['subject'] ?></h2>
		    	<br>&nbsp;&nbsp;&nbsp;<i>Posted by </i><strong><?php echo $row['user_id']?></strong><i> on </i><strong><?php echo date("d-m-Y", $row['Timeofpost']) ?></strong>
			<div class='entry'>
		    	<p><text class="ann_name"><?php echo $row['Description'] ?></text></p>
			<?php }}
			else echo "No topics yet";?>
			<br>			

			<h2>Comments</h2>
		   	<?php if($comments != null){
					foreach($comments as $comment){ ?>
			 <h4 class="forumuser"><?php echo $comment['user_id'] ;?></h4>
			<p ><?php echo $comment['content'] ;?></p ><p class="postcomments"><i>Posted on <?php echo date(" d-m-Y", $comment['timeofpost']) ;?></i></p>
			<?php } }
			else echo "No comments till now<br>";
			?>
			<br><strong>Leave a comment:</strong><br><br>
			 <?php echo form_open('/student/student/insertcomment/'.$this->uri->segment(4).'/'.$cid);?>
			 <textarea rows="10" cols=60 name="Comment"></textarea><br><br>
        <input type="submit" value="Post Comment" name="submitcomment">
        </form>
			 
			</div>
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
