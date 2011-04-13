<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Approve courses</h2>
			<div class="entry">
			<p>
      <?php echo form_open('admin/admin/approve_courses');?>
        <table class="admin_tab " table style="width:40%">
        <tr>
					<td>User ID</td>
          <td width=40%><input type="text" name="user_id" size=25% value="<?php if(isset($user_id)) echo $user_id;?>"></td>
        </tr>
      <tr>
          <td>
        <?php
        echo form_submit('get_courses','Get Courses');
        ?>
          </td>
          <td>
          <?php
          echo form_submit('next','Next');
          ?>
          </td>
        </tr>
        </table>
        <br/>
        <hr/>
        
      
        <h2>unapproved Courses of the student</h2>
        <?php if(isset($batch)) 
        echo "<h3>".$batch[0]['program']." ".$batch[0]['batch_year']."</h3>";
              else
                echo "No student found";
        ?> 
        <?php if(!isset($message)){
              if(isset($courses)){ ?>
      
        <table >
          <tr>
          <th>Semester</th>
          <th>Course id</th>
          <th>Course name</th>
          <th>Credits</th>
          <th>Remarks</th>
          </tr>
          <?php
            foreach ($courses as $row) {
          ?>
          <tr>
          <td><?php echo $row['semester'];?></td>
          <td><?php echo $row['course_id'];?></td>
          <td><?php echo $row['course_name'];?></td>
          <td><?php echo $row['credits'];?></td>
          <td><?php echo $row['status'];?></td>
          </tr>
        <?php }?>
        </table>
        
        <?php echo form_submit('approve','approve');
          echo form_close();
            }
            else{
            echo "<h2>No courses unapproved </h2>";
            }
          
          }
          else{
            echo "<h2>".$message."</h2>";
          }

        ?>
        </div>
        
			</p>
			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>

<!-- end page -->
