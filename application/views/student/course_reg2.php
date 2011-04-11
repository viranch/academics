<script type="text/javascript">
$(document).ready(function(){
  $(":checkbox").change(function () {
    $('input[name="number"]').val($(this).val());
  });
});
</script>
<!-- start page -->
<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
<div id="sidebar1">
  <ul>
    <li>
      <h2>Registration Status</h2>
      <table class="tab">
      <tr>
      <td>Student Registration</td>
      <td align="center"><img title="Pending" src="images/task-attention.png"> or <img title="Complete" src="images/task-complete.png"></td>
      </tr>
      <tr>
      <td>UGC/PGC Approval</td>
      <td align="center"><img title="Pending" src="images/task-attention.png"> or <img title="Ongoing" src="images/chronometer.png"></td>
      </tr>
      <tr>
      <td>Registrar Approval</td>
      <td align="center"><img title="Pending" src="images/task-attention.png"> or <img title="Ongoing" src="images/chronometer.png"></td>
      </tr>
      <tr>
      <td>Fees Approval</td>
      <td align="center"><img title="Pending" src="images/task-attention.png"> or <img title="Ongoing" src="images/chronometer.png"></td>
      </tr>
      </table>
    </li>
    <li>
      <h2>Electives Status</h2>
      <ul>
      <table class="tab">
        <tr>
          <td>Group Electives</td>
          <td align="right">1/2</td>
        </tr>
        <tr>
          <td>Technical Electives</td>
          <td align="right">2/4</td>
        </tr>
        <tr>
          <td>Science Electives</td>
          <td align="right">2/2</td>
        </tr>
        <tr>
          <td>Open Electives</td>
          <td align="right">2/2</td>
        </tr>
        <tr>
          <td><strong>Elective Credits</strong></td>
          <td align="right"><strong>25.5/31</strong></td>
        </tr>
      </table>
      </ul>
    </li>
    <li>
      <h2>Important Dates</h2>
      <ul>
        <table class="tab">
      <tr>
      <th>Date</th>
      <th>Description</th>
      </tr>
      <tr>
      <td>25 March, 2011</td>
      <td>SEM VI</td>
      </tr>
      <tr>
      <td>28 March, 2011</td>
      <td>Hanuman Jayanti</td>
      </tr>
      </table>
      </ul>

    </li>
  </ul>
</div>
<!-- end of sidebar2 -->
<!-- start content -->
<div id="content">
  <div class="post">
    
    <h2 class="title"><a href="#">Course Registration</a></h2>
      <div class="entry">
          
          <!-- semseter list display -->
          <p><strong><text class ="ann_name">
            <?php
              echo "{$drop[0]['semester']}";
            ?>
          </text></strong><br><br>
      

      <!-- core courses list display -->
      <table id="core">
      <thead>
      <tr>
        <th colspan=2>Courses registered</th>
        <th>Credits</th>
      </tr>
      </thead>

      
      <tbody>
      <?php echo form_open('student/student/val_drop');  
            if(isset($drop)){
            foreach ($drop as $row) {?>
      <tr>
        <td>
          <?php echo form_checkbox($row['slot_no'],$row['course_id'], FALSE); ?>
        </td>
        <td width=80%>
          <text class="sub_ann_name">
            <?php echo anchor($row['course_name'], $row['course_name']."(".$row['course_id'].")");?>
          </text>
        </td>
        <td>
            <?php
              echo $row['credits'];
            ?>
        </td>
      </tr>
      <?php  } }?>
      <tr>
          <td>
          </td>
          <td></td>
          <td>
          <?php
            echo form_hidden('number','22');
            echo form_submit('submit','Submit');
          ?></td>
          
      </tr>
          
      </tbody>
      </table>
      
      <!-- start of elective courses -->
		<div class="buttonwrapper">
		</div>	
		</div> <!-- end entry -->
		</div><!-- end post -->
	</div>
<!-- end content -->
<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Courses</h2>
        <h3>
        <?php
          if(isset($batch))
            echo "{$batch['0']['semester']}";
        ?>
        </h3>
        <ul>
        <?php
         if(isset($courses)){
           foreach ($courses as $row) {
              echo "<li>".anchor('student/lectures/index/'.$row['course_id'], $row['course_id'])."</li>";//all the courses links need to be given
           }
         }
        ?>
        </ul>
      </li>
			<li>
				<h2>Resources</h2>
				<ul>
					<li><a href="http://webmail.daiict.ac.in" target="_blank">Webmail</a></li>
					<li><a href="http://resourcecentre.daiict.ac.in:8081/webslim/default.asp" target="_blank">Resource Center</a></li>
					<li><a href="http://intranet.daiict.ac.in/~daiict_nt01/" target="_blank">\\daiictpdc</a></li>
					<li><a href="http://intranet.daiict.ac.in" target="_blank">Intranet</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>
</div>
<?php

