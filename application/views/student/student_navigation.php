<div class="navigation">
<ul class="adxm menu">
  <li class="navac">
    <?php
      echo anchor('student/student', 'Home');
    ?>
  </li>
  <li>
    <?php echo anchor('student/student/profile', 'Profile');?>
  </li>
  <li>
    <?php
    echo anchor('student/student/show_unapproved', 'Registration');
    ?>
  </li>

  <li>
    <?php
    echo anchor('student/student/grades/1', 'Result');
    ?>
  </li>
  <li>
    <?php echo anchor('student/student/drop_courses', 'Drop courses');?>
  </li>
  <li>
    <a href="http://www.aplus.co.yu/about/" title="Relevant info about me">Fees</a>
  </li>
  <li>
    <?php
    echo anchor('student/student/announcements', 'Announcements');
    ?>  
</li>
  <li>
    <?php
    echo anchor('student/student/importantdates', 'Important dates');
    ?>  
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
