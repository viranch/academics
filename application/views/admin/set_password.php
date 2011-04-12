<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Reset password</h2>
			<div class="entry">
			<p>
      <?php echo form_open('admin/admin/set_password');?>
<?php if(isset($message)) echo "<h2>".$message."</h2>";?>
        <table class="admin_tab " table style="width:40%"><tr>
					<td>User ID</td>
          <td width=40%><input type="text" name="user_id" size=25% value="<?php echo set_value('user_id');?>"></td>
				</tr><tr>
					<td>Password</td>
          <td><input type="text" name="password" size=25% value="<?php if(isset($password)) echo $password;?>"></td>
          <tr>
          <td>
        <?php
        echo form_submit('submit','Get random password');
        ?>
          </td>
          <td>
          <?php echo form_submit('reset_password','Reset password');?>
          </td>
        </tr>
        </table>
        <br/>
        <hr/>
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
