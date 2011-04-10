<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Retrieve user</h2>
			<div class="entry">
			<p>
      <?php echo form_open('admin/admin/retrieve_user');?>
				<table class="admin_tab " table style="width:40%"><tr>
					<td>User ID</td>
          <td width=40%><input type="text" name="user_id" size=25% value="<?php echo set_value('user_id');?>"></td>
				</tr><tr>
					<td>Name</td>
          <td><input type="text" name="name" size=25% value="<?php echo set_value('name');?>"></td>
          <tr>
          <td>
        <?php
        echo form_submit('submit','Get user details');
        ?>
          </td>
        </tr>
        </table>
        <br/>
        <hr/>
        <h2>Select to delete the user</h2>
<?php if(isset($details)){ ?>
        <table >
          <tr>
          <th>Select </th>
          <th>User id</th>    

          <th>Name</th>
          <th >User type</th>
          </tr>
          <?php 
          foreach ($details as $row) {
          ?>
          <tr>
            <td><?php echo form_checkbox('users[]',$row['user_id'], FALSE);?></td> 
            <td><?php echo "{$row['user_id']}";?></td>
            <td><?php
              echo "{$row['candidate_name']}";
            ?></td>
            <td><?php
              echo $row['user_type'];
            ?></td>
          </tr>
        <?php }?>
        </table>
<?php echo form_submit('submit','Retrieve');
        echo form_close();
        }
        else {
          if(isset($message))
            echo "<h3>{$message}</h3>";
          else
          echo "<h3>No user with the entered user id </h3>";
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
