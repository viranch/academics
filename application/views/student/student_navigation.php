<div class="example">
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
    <a href="http://www.aplus.co.yu/deliver/" title="Various sites I (co-)did">Add/Drop Courses</a>
  </li>
  <li>
    <a href="http://www.aplus.co.yu/about/" title="Relevant info about me">Fees</a>
  </li>
  <li>
    <a href="http://www.aplus.co.yu/about/contact/">Utilities</a>
  </li>
  <li>
    <?php
    echo anchor('login/logout', 'Logout');
    ?>  
</li>
</ul>

</div>  
<br/>
<hr />
