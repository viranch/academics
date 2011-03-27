<?php
echo form_open('admin/admin/val_user_data');
?>
<p>
        <label for="user_id">userid</label>
        <?php echo form_error('user_id'); ?>
        <br /><input id="user_id" type="text" name="user_id" maxlength="10" value="<?php echo set_value('user_id'); ?>"  />
</p>

<p>
        <label for="password">password</label>
        <?php echo form_error('password'); ?>
        <br /><input id="password" type="password" name="password" maxlength="32" value="<?php echo set_value('password'); ?>"  />
</p>

<p>
        <label for="conform_password">conform password</label>
        <?php echo form_error('conform_password'); ?>
        <br /><input id="conform_password" type="password" name="conform_password" maxlength="32" value="<?php echo set_value('conform_password'); ?>"  />
</p>

<p>
        <label for="user_type">user type</label>
        <?php echo form_error('user_type'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
                  <?php $options = array(
                                                                      ''  => 'Please Select',
                                                                                                                        'example_value1'    => 'example option 1'
                                                                                                                                                                        ); ?>

        <br /><?=form_dropdown('user_type', $options, set_value('user_type'))?>
</p>                                             
                        
<p>
        <label for="first_name">first name</label>
        <?php echo form_error('first_name'); ?>
        <br /><input id="first_name" type="text" name="first_name" maxlength="50" value="<?php echo set_value('first_name'); ?>"  />
</p>

<p>
        <label for="last_name">last name</label>
        <?php echo form_error('last_name'); ?>
        <br /><input id="last_name" type="text" name="last_name" maxlength="50" value="<?php echo set_value('last_name'); ?>"  />
</p>

<p>
        <label for="dob">D.O.B</label>
        <?php echo form_error('dob'); ?>
        <br /><input id="dob" type="text" name="dob"  value="<?php echo set_value('dob'); ?>"  />
</p>

<p>
        <label for="gender">gender</label>
        <?php echo form_error('gender'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
                  <?php $options = array(
                                                                      ''  => 'Please Select',
                                                                                                                        'example_value1'    => 'example option 1'
                                                                                                                                                                        ); ?>

        <br /><?=form_dropdown('gender', $options, set_value('gender'))?>
</p>                                             
                        
<p>
        <label for="email_id">Email Id</label>
        <?php echo form_error('email_id'); ?>
        <br /><input id="email_id" type="text" name="email_id" maxlength="50" value="<?php echo set_value('email_id'); ?>"  />
</p>

<p>
        <label for="city">city</label>
        <?php echo form_error('city'); ?>
        <br /><input id="city" type="text" name="city" maxlength="50" value="<?php echo set_value('city'); ?>"  />
</p>

<p>
        <label for="country">country</label>
        <?php echo form_error('country'); ?>
        <br /><input id="country" type="text" name="country" maxlength="50" value="<?php echo set_value('country'); ?>"  />
</p>

<p>
        <label for="address">address</label>
  <?php echo form_error('address'); ?>
  <br />
              
  <?=form_textarea( array( 'name' => 'address', 'rows' => '5', 'cols' => '80', 'value' => set_value('address') ) )?>
</p>
<p>
        <label for="emergency_address">Emergency address</label>
  <?php echo form_error('emergency_address'); ?>
  <br />
              
  <?=form_textarea( array( 'name' => 'emergency_address', 'rows' => '5', 'cols' => '80', 'value' => set_value('emergency_address') ) )?>
</p>
<p>
        <label for="phone">phone</label>
        <?php echo form_error('phone'); ?>
        <br /><input id="phone" type="text" name="phone" maxlength="15" value="<?php echo set_value('phone'); ?>"  />
</p>

<p>
        <label for="status">status</label>
        <?php echo form_error('status'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
                  <?php $options = array(
                                                                      ''  => 'Please Select',
                                                                                                                        'example_value1'    => 'example option 1'
                                                                                                                                                                        ); ?>

        <br /><?=form_dropdown('status', $options, set_value('status'))?>
</p>                                             
                        
<p>
        <label for="creation_date">Creation date</label>
        <?php echo form_error('creation_date'); ?>
        <br /><input id="creation_date" type="text" name="creation_date"  value="<?php echo set_value('creation_date'); ?>"  />
</p>

<p>
        <label for="image">image</label>
        <?php echo form_error('image'); ?>
        <br /><input id="image" type="text" name="image" maxlength="50" value="<?php echo set_value('image'); ?>"  />
</p>

<p>
        <label for="bloodgroup">bloodgroup</label>
        <?php echo form_error('bloodgroup'); ?>
        <br /><input id="bloodgroup" type="text" name="bloodgroup" maxlength="5" value="<?php echo set_value('bloodgroup'); ?>"  />
</p>

<p>
        <label for="identification_mark">identification mark</label>
  <?php echo form_error('identification_mark'); ?>
  <br />
              
  <?=form_textarea( array( 'name' => 'identification_mark', 'rows' => '5', 'cols' => '80', 'value' => set_value('identification_mark') ) )?>
</p>
<p>
        <label for="officephone">officephone</label>
        <?php echo form_error('officephone'); ?>
        <br /><input id="officephone" type="text" name="officephone" maxlength="15" value="<?php echo set_value('officephone'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>

