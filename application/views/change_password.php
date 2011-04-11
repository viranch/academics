<h2>
  Change password
</h2>
<div id="wrapper">
  <div id="page">
<?php if(isset($message))echo "<h2>".$message."</h2>"; ?>
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

<?php echo validation_errors(); ?>
