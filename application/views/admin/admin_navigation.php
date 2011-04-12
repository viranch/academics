<div class="navigation">
<ul class="adxm menu">
  <li class="navac">
    <?php if($permissions[0]['create_user']==1)
      echo anchor('admin/admin/add_user', 'User Create');
    ?>
  </li>
  <li>
    <?php if($permissions[0]['delete_user']==1)
    echo anchor('admin/admin/delete_user', 'Delete');?>
  </li>
  <li>
    <?php
    if($permissions[0]['retrieve_user']==1)
    echo anchor('admin/admin/retrieve_user', 'Retrieve');
    ?>
  </li>

  <li>
    <?php
    if($permissions[0]['approve_courses'])
    echo anchor('admin/admin/approve_courses', 'Approve');
    ?>
  </li>
  <li>
  <?php if($permissions[0]['important_dates'])?>
    <?php echo anchor('admin/admin/important_dates', 'Important dates');?>
  </li>
  <li>
  <?php if($permissions[0]['announce'])?>
    <?php echo anchor('admin/admin/announce', 'Announce');?>

  </li>
  <li>
  <?php if($permissions[0]['deadlines'])?>
    <?php echo anchor('admin/admin/deadline', 'Registration policy');?>
</li>
  <li>
  <?php if($permissions[0]['course_assign'])?>
    <?php echo anchor('admin/admin/course_assign', 'Allot');?>
  </li>
  <li>
  <?php if($permissions[0]['course_create'])?>
    <?php echo anchor('admin/admin/course_create', 'Create course');?>
  </li>
  <li>
  <?php if($permissions[0]['reset_password'])?>
    <?php echo anchor('admin/admin/set_password', 'Reset password');?>
  </li>
  <li>
  
    <?php echo anchor('login/change_password', 'Change password');?>
  </li>
  <li>
    <?php
    echo anchor('login/logout', 'Logout');
    ?>  
</li>

</ul>

</div>  
<br/>
