<div class="navigation">
<ul class="adxm menu">
  <li>
    <?php echo anchor('admin/admin/','Home');?>
  </li>
  <li>
  <li class="navac">
    <?php if($permissions[0]['create_user']==1){
      echo anchor('admin/admin/createn_user', 'User Create');}
    ?>
  </li>
  
  <li>
    <?php if($permissions[0]['course_offer']==1){
    echo anchor('admin/admin/course_offer', ' course offer');}?>
  </li>

  <li>
    <?php if($permissions[0]['delete_user']==1){
    echo anchor('admin/admin/delete_user', 'Delete user');}?>
  </li>
  <li>
    <?php
    if($permissions[0]['retrieve_user']==1){
    echo anchor('admin/admin/retrieve_user', 'Retrieve user');}
    ?>
  </li>

  <li>
    <?php
    if($permissions[0]['approve_courses']==1){
    echo anchor('admin/admin/approve_courses', 'Approve');}
    ?>
  </li>
  <li>
  <?php if($permissions[0]['important_dates']==1){?>
    <?php echo anchor('admin/admin/important_dates', 'Important dates');}?>
  </li>
  <li>
  <?php if($permissions[0]['announce']==1){?>
    <?php echo anchor('admin/admin/announce', 'Announce');}?>

  </li>
  <li>
  <?php if($permissions[0]['deadlines']==1){?>
    <?php echo anchor('admin/admin/deadline', 'Registration policy');}?>
</li>
  <li>
  <?php if($permissions[0]['course_assign']==1){?>
    <?php echo anchor('admin/admin/course_assign', 'Allot courses');}?>
  </li>
  <li>
  <?php if($permissions[0]['course_create']==1){?>
    <?php echo anchor('admin/admin/course_create', 'Create course');}?>
  </li>
  <li>
  <?php if($permissions[0]['reset_password']==1){?>
    <?php echo anchor('admin/admin/set_password', 'Reset password');}?>
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
