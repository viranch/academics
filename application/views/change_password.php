<h2>
  Change password
</h2>
<div id="wrapper">
  <div id="page">
  <p>Your new Password has to be minimum 6 character long.</p>
  <p>Do not use the same password that you use for other online accounts.</p>
  <p>Use a combination of letters, numbers, and punctuation.</p>
  <p>Passwords are case-sensitive. Remember to check your CAPS lock key.</p>
<h3><?php echo validation_errors(); ?></h3>
<?php if(isset($message))echo "<h3>".str_replace('_',' ',$message)."</h3>"; ?>
      <?php echo form_open('login/chk_and_change');?>
      <label for="password" class="formLabel">Old Password</label>
      <input type="password" name = "old_password" class="field"/>
      <label for="password" class="formLabel">New Password</label>
      <input type="password" name = "new_password" class="field"/>
      <label for="password" class="formLabel">Confirm Password</label>
      <input type="password" name = "confpassword" class="field"/>
    <br/><br/>
      <input type = "submit" value="Submit">
      <?php echo form_close();?>

