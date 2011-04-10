<!-- start of sidebar1 -->
<div id="sidebar1">
  <ul>
    <li>
      <h2>Registration Status</h2>
      <table class="tab">
      <tr>
      <td>Student Registration</td>
      <td align="center"><?php if($approval==1) echo "Submitted"; else echo "Not submitted";?></td>
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
	<li>
				<h2>Electives Status</h2>
				<ul>
				<table class="tab">
<?php $group=0;
      $open=0;
  $technical=0;
      $science=0;
      if(isset($elective)){ 
      
      foreach ($elective as $row) {
        if($row['category']=='group')
          $group++;
        if($row['category']=='open')
          $open++;
        if($row['category']=='technical')
          $technical++;
      if($row['category']=='science')
        $science++;
      }
    }
?>
          
          <tr>
						<td>Group Electives</td>
            <td align="right"><?php echo $group;?></td>
					</tr>
					<tr>
						<td>Technical Electives</td>
            <td align="right"><?php echo $technical;?></td>
					</tr>
					<tr>
						<td>Science Electives</td>
            <td align="right"><?php echo $science;?></td>
					</tr>
					<tr>
						<td>Open Electives</td>
            <td align="right"><?php echo $open;?></td>
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
    
    <h2 class="title"><a href="#">Course Registration</a></h2>
      <div class="entry">
          
          <!-- semseter list display -->
          <p><strong><text class ="ann_name">
            <?php
              if(isset($restrict)){
                if($restrict[0]['opening_date']<date('Y-m-d')){
                  if($restrict[0]['deadline']<date('Y-m-d')){
                    echo "Registrations closed for ";
                  }
                  else{
                    echo "Registrations opened for ";
                  }
                }
                else{
                  echo "Registration not yet open for ";
                }
                echo "{$reg[0]['semester']}";
              
              }
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
      <?php foreach ($unapproved as $row) {?>
      <tr>
        <td width=80%>
          <text class="sub_ann_name">
            <?php echo anchor($row['course_name'], $row['course_name']);?>
          </text>
        </td>
        <td></td>
        <td>
            <?php
              echo $row['credits'];
            ?>
        </td>
      </tr>
      <?php }?>
      <tr>
          <td>
          </td>
          <td></td>
          <td><?php
            echo anchor('student/student/registration', 'Edit');
          ?></td>
          
      </tr>
      <?php if(isset($message))
        echo "<h2>".$message."<h2>";
      ?>
          
      </tbody>
      </table>
      
      <!-- start of elective courses -->
		</div> <!-- end entry -->
		</div><!-- end post -->
	</div>
<!-- end content -->

<?php 

