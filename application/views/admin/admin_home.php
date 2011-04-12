<!-- start page -->
<div id="wrapper">
<div id="page">
	<!-- start content -->
	<div id="content_ad_home">
		<div class="post">
      <h2 class="title"><a href="#">Welcome <?php echo $candidate[0]['candidate_name']; ?> </a></h2>
			<div class="entry">
      <?php if($permissions[0]['create_user']==1){?>
      <p class="ann_p"><strong><text class ="ann_name"><?php echo anchor('admin/admin/add_user', 'Create User');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can create a new user under the following categories  <br>&nbsp;&nbsp; <strong>Student, Faculty and Administrator.</strong></p>
      <?php } ?>
      <?php if($permissions[0]['delete_user']==1){?> 	
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/delete_user', 'Delete User');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can remove an existing user under the following categories  <br>&nbsp;&nbsp; <strong>Student, Faculty and Administrator.</strong></p>
      <?php }?>
      <?php if($permissions[0]['retrieve_user']==1){?>	
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/retrieve_user', 'Retrieve User');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can retrieve user which was removed under the following categories  <br>&nbsp;&nbsp; <strong>Student, Faculty and Administrator.</strong></p>
      <?php }?>
      <?php if($permissions[0]['approve_courses']==1){?>				
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/approve_courses', 'Approve course registration');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can approve courses which were submitted by  <br>&nbsp;&nbsp; <strong>Student.</strong></p>
      <?php }?>
      <?php if($permissions[0]['important_dates']==1){?>				
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/important_dates', 'Set Important dates');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can view or set Important dates.</p>
      <?php } ?>
      <?php if($permissions[0]['announce']==1){?>				
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/announce', 'Send announcements');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can make announcements to users within the following categories  <br>&nbsp;&nbsp; <strong>Student, Faculty and Administrator.</strong></p>
      <?php }?>
      <?php if($permissions[0]['deadlines']==1){?>				
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/deadline', 'Set registration policy');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can set deadlines for certain events for the following user <br>&nbsp;&nbsp; <strong>Student, Faculty and Administrator.</strong></p>
      <?php }?>
      <?php if($permissions[0]['course_assign']==1){?>				
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/course_assign', 'Assign faculty to a course');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can existing courses to faculty associated with it.</p> 
      <?php }?>
      <?php if($permissions[0]['course_create']==1){?>				
      <p class="ann_p"><strong><text class="ann_name"><?php echo anchor('admin/admin/course_create', 'Create a course');?></text></strong><br>&nbsp;&nbsp; Administrator, with the help of this function you can add a new course in the existing list of courses.</p>
      <?php }?>
		</div>
			
		</div>
	</div>
	<!-- end content -->
<div id="sidebar">
		<ul>
			<li>
				<h2>Resources</h2>
				<ul>
					<li><a href="http://intranet.daiict.ac.in">intranet</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in">Resource Center</a></li>
					<li><a href="\\10.100.56.21">daiictpdc</a></li>
					<li><a href="http://library.daiict.ac.in">Library</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->

