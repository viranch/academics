<p>
  change password
</p>
<?php

echo form_open('login/chk_and_change');
echo form_label('old_password','Old password');
echo form_password('old_password','');
echo form_label('new_password','New Password');
echo form_password('new_password','');
echo form_label('confpassword','Confirm password');
echo form_password('confpassword','');
echo form_submit('submit','Submit');
echo form_close();
?>
<?php echo validation_errors(); ?>
