<script type="text/javascript">
var credits=[];
var category=[];
<?php
              foreach ($reg as $course) {         
                  echo "credits[\"".$course['course_id']."\"]=\"".$course['credits']."\";";
                  echo "category[\"".$course['course_id']."\"]=\"".$course['category']."\";";
              }
?>
$(document).ready(function(){
  //$("select").parent().next().text(credits[this.val()]);
  //$("select").parent().prev().children().val(this.val()); 
  $("select").each(function(){
    $(this).parent().next().text(credits[$(this).val()]);
    $(this).parent().prev().children().val($(this).val());
  });
  $("select").change(function () {
    var courseid=$(this).val();
    $(this).parent().next().text(credits[courseid]);
    $(this).parent().prev().children().val(courseid);
  });
});
</script>


<?php
$slots['core']=1;
$slots['elective']=1;
$slots['backlog']=1;
$slots['grade']=1;
$slots['next']=1;
$slots['audit']=1;
?>
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
<?php
echo form_open('student/student/val_reg');
?>
<div id="content">
  <div class="post">
    
    <h2 class="title"><a href="#">Course Registration</a></h2>
      <div class="entry">
          
          <!-- semseter list display -->
          <p><strong><text class ="ann_name">
            <?php
              echo "{$reg[0]['semester']}";
            ?>
          </text></strong><br><br>
      

      <!-- core courses list display -->
      <table id="core">
      <thead>
      <tr>
        <th colspan=2>Core Courses</th>
        <th>Credits</th>
      </tr>
      </thead>

      
      <tbody>
      <?php if(isset($reg)){ 
        foreach ($reg as $course) {
        if($course['category']=='core'&& $course['status']=='active'){ ?>
      <tr>
      <td><?php echo form_checkbox($slots['next'],$course['course_id'], TRUE); ?></td>
        <td width=80%>
          <text class="sub_ann_name">
            <?php
              echo anchor('#', $course['course_name']." (".$course['course_id'].")");  
            ?>
          </text>
        </td>
        <td>
          <?php echo "{$course['credits']}";?>
        </td>
      </tr>
      <?php
        $slots['core']++;
        $slots['next']++;}}}
      ?>
      </tbody>
      </table>
      
      <!-- start of elective courses -->
      <table id="electives">
      <thead>
      <tr>
        <th colspan=2>Elective Courses</th>
        <th>Credits</th>
      </tr>
      </thead>
    
      <tbody>
      <?php $flag=0; ?>
      <?php if(isset($reg)){
          $options=array();
          foreach($reg as $course){
            if($course['category']!='core' && $course['status']=='active'){
              if(!isset($prev) || $prev == $course['slot_no']){
                $options[$course['course_id']]=$course['course_name']." (".$course['course_id'].")";
                $prev=$course['slot_no'];
                $flag=1;
                }
              else{

      ?>
      <tr>
      <td><?php echo form_checkbox($slots['next'], 'accept', FALSE);?></td>
      <td width=80%><text class="sub_ann_name">Slot <?php echo $prev; ?>:</text>
          <?php
                echo form_dropdown('slot'.$slots['next'], $options);
                $options=array();
                $options[$course['course_id']]=$course['course_name']." (".$course['course_id'].")";
          ?>
        </td>
        <td>4</td>
      </tr>
          <?php
                $prev=$course['slot_no'];
                $slots['elective']++;
                $slots['next']++;
        
            }
           }
          }
          
      ?>
      <?php if($flag==1){?>
      <tr>
      <td><?php echo form_checkbox($slots['next'], 'accept', FALSE);?></td>
      <td width=80%><text class="sub_ann_name">Slot <?php if(isset($prev))echo $prev; ?>:</text>
          <?php
                echo form_dropdown('slot'.$slots['next'], $options);
                $slots['elective']++;
                $slots['next']++;
                    
          ?>

        </td>
        <td>4.5</td>
      </tr>

            
    </tbody>
      </table>
      <?php }}?>
      <table id="improve">
      <thead>
      <tr>
        <th colspan=2>Courses for grade improvement</th>
        <th>Credits</th>
      </tr>
      </thead>
      
      <tbody>
      <?php if(isset($gradeimprovement)){
            foreach ($gradeimprovement as $row) {?>
      <tr>
        <td><?php echo form_checkbox($slots['next'],$row['course_id'], FALSE); ?></td>
        <td width=80%><text class="sub_ann_name"><a href="http://link.to/course_page"><?php
          echo anchor('#', $row['course_name']);  
        ?></a></text></td>
        <td><?php
          echo "{$row['credits']}";
        ?></td>
      </tr>
      <?php
          $slots['next']++;
          $slots['grade']++;
      }}
      ?>
      </tbody>
      </table>
      <table id="backlog">
      <thead>
      <tr>
        <th colspan=2>Backlog Courses</th>
        <th>Credits</th>
      </tr>
      </thead>
      <tbody>
      
    <?php if(isset($backlog)) {
        foreach ($backlog as $course) {
         
      ?>
              <tr>
                  <td><?php echo form_checkbox($slots['next'],$course['course_id'], FALSE); ?></td>
                  <td width=80%>       
                    <text class="sub_ann_name">     
                        <?php echo anchor('#', $course['course_name']." (".$course['course_id'].")");?>
                    </text>
                  </td>                
                  <td>                 
                      <?php echo "{$course['credits']}";?>
                  </td>                
             </tr>                  
      <?php
        $slots['backlog']++;    
        $slots['next']++;}}
      ?>
      </tbody>
      </table>
      <table id="audit">
      <thead>
      <tr>
        <th colspan=2>Audit Courses</th>
        <th>Credits</th>
      </tr>
      </thead>
      <tbody>
      
    <?php if(isset($reg)){ 
          foreach ($reg as $course) {
        if($course['audit']==1 && $course['status']=='active'){ 
      ?>
              <tr>
                  <td><?php echo form_checkbox($slots['next'],$course['course_id'], FALSE); ?></td>
                  <td width=80%>       
                    <text class="sub_ann_name">     
                        <?php echo anchor('#', $course['course_name']." (".$course['course_id'].")");?>
                    </text>
                  </td>                
                  <td>                 
                      <?php echo "{$course['credits']}";?>
                  </td>                
             </tr>                  
      <?php
          $slots['audit']++;    
          $slots['next']++;}}}
        ?>
				</tbody>
				</table>
		<div class="buttonwrapper">
    <?php
      echo form_hidden('sem_id',$reg[0]['sem_id'] );
      echo form_hidden('core',$slots['core']-1);      
      echo form_hidden('elective',$slots['elective']-1);      
      echo form_hidden('grade',$slots['grade']-1);      
      echo form_hidden('backlog',$slots['backlog']-1);      
      echo form_hidden('audit',$slots['audit']-1);      
      echo form_submit('submit','Submit');
      echo form_close();
    ?>
    <a class="ovalbutton" href="#"><span>Submit</span></a> <a class="ovalbutton" href="#" style="margin-left: 6px"><span>Reset</span></a>
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

