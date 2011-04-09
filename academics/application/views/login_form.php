
  <legend>Login form</legend>
  <?php echo form_open('login/validate');?>
    <label for="username">username</label>
    <?php echo form_input('username',set_value('username','Username')); ?>
    <label for="password">password</label>
    <?php echo form_password('password','')."<br/>"; ?>
    <?php echo form_submit('submit','Login');?>
    <?php echo anchor('login/req_passwd', 'Forgot password'); ?>    
  <?php echo form_close(); ?>



