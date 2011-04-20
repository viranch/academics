<!-- start page -->
		<div id="wrapper">
			<div id="page">
			<!-- start content -->
				<div id="login">
        <?php echo form_open('login/validate'); ?> 
    <h3><?php if(isset($message)) echo $message;?></h3>
            <label for="username" class="formLabel">Username</label>
              <input type="text" name="username" class="field" value="<?php echo set_value('username'); ?>" id="username"/>
						<label for="password" class="formLabel">Password</label>
						<input type="password" name="password" class="field"/>
						<div class="submit">
							<input type="submit" name="submit" value="Login" id="signin_submit"/>
						</div>
						<div class="forgot">
							&nbsp;
						</div>
					</form>
				<div style="clear: both;">&nbsp;</div>
				</div>
				<br/>
			</div><!-- end page -->
