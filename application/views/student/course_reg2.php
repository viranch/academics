<script type="text/javascript">
$(document).ready(function(){
  $(":checkbox").change(function () {
    $('input[name="number"]').val($(this).val());
  });
});
</script>
<!-- start of sidebar1 -->
<div id="sidebar1">
  <ul>
<li>
      <h2>Registration Status</h2>
      <table class="tab">
      <tr>
      <td>Student registration</td>
      <td align="center"><?php if($approval==1||$ugcapproval==1) echo "Submitted"; else echo "Not submitted";?></td>
      </tr>
      <tr>
      <td>UGC/PGC/Registrar Approval</td>
      <td align="center"><?php if($ugcapproval==1) echo "approved"; else echo "pending";?></td>
      </tr>
      <tr>
      <td>Fees Approval</td>
      <td align="center">Unknown</td>
      </tr>
      </table>
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
					<li><a href="http://webmail.daiict.ac.in" target="_blank">Webmail</a></li>
					<li><a href="http://placement.daiict.ac.in" target="_blank">Placement</a></li>
					<li><a href="http://library.daiict.ac.in" target="_blank">Library</a></li>
					<li><a href="http://intranet.daiict.ac.in" target="_blank">Intranet</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->
<!-- start content -->
<div id="content">
  <div class="post">
    
    <h2 class="title"><a href="#">Drop Course </a></h2>
<?php if(isset($drop)){?>  
    <div class="entry">
          
          <!-- semseter list display -->
          <p><strong><text class ="ann_name">
            <?php
              echo "{$drop[0]['semester']}";
            ?>
          </text></strong><br><br>
      

      <!-- core courses list display -->
      <table id="core">
      <thead>
      <tr>
        <th colspan=2>Courses registered</th>
        <th>Credits</th>
      </tr>
      </thead>

      
      <tbody>
      <?php echo form_open('student/student/drop_courses');  
            if(isset($drop)){
              $total=0;
              $total_credits=0;
	    foreach ($drop as $row) {?>
      <tr>
        <td>
          <?php echo form_checkbox('drop[]',$row['course_id'], FALSE); ?>
        </td>
        <td width=80%>
          <text class="sub_ann_name">
            <?php echo anchor($row['course_name'], $row['course_name']."(".$row['course_id'].")");?>
          </text>
        </td>
        <td>
            <?php
              echo $row['credits'];
              $total++;
              $total_credits=$row['credits']+$total_credits;            
		?>
        </td>
      </tr>
      <?php  } }?>
      <tr>
          <td>
          </td>
          <td></td>
          <td>
          <?php
    echo form_hidden('count',$total);
    echo form_hidden('credits',$total_credits);          
		echo form_submit('submit','Submit');
          ?></td>
          
      </tr>
          
      </tbody>
      </table>
      
      <!-- start of elective courses -->
		</div> <!-- end entry -->
		</div><!-- end post -->
  </div>
<?php }
      else {
        echo "<h3>No courses to drop</h3>";
      }
?>

<!-- end content -->

