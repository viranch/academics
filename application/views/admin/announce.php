<script type="text/javascript">

$(function() {
  $("#startdate").datepicker();
  $("#enddate").datepicker();
});
</script>

<!-- start page -->

<div id="wrapper">
<div id="page">
<!-- start of sidebar1 -->
<!-- end of sidebar2 -->
	<!-- start content -->
	<div id="content_admin">
		<div class="post">
			<h2 class="title">Announcements</h2>
			<div class="entry">
			<p>
      <?php echo form_open('admin/admin/important_dates');?>
        <table class="admin_tab " table style="width:40%">
        <tr>
					<td>Program</td>
          <td>
          <?php
          $options = array(''  => '-------');
          foreach ($program as $row) {
            $options[$row['program']]=$row['program'];
          }
          echo form_dropdown('name', $options, '');?>
          </td>
      </tr>
      <tr>
        <td>Year</td>
          <td>
          <?php
          $options = array('value1'  => 'Label1',
                            'value2'    => 'Label2' 
                            );
          echo form_dropdown('name', $options, 'value1');?>
          </td>
      </tr>
      <tr>
        <td>course</td>
        <td><textarea name="description" rows="5" cols="40"></textarea></td>
      </tr>
      <tr>
          <td>
          </td>
          <td>
          <?php
          echo form_submit('submit','Submit');
          ?>
          </td>
        </tr>
        </table>
        <br/>
        <hr/>
        
      
        <h2>Delete Announcements</h2>
      
        <table >
          <tr>
          <th>delete</th>
          <th>startdate</th>
          <th>enddate</th>
          <th>description</th>
          </tr>
          <?php foreach ($dates as $row) { ?>
          <tr>
          <td><?php echo form_checkbox('dates[]',$row['id'], FALSE);?></td> 
          <td><?php echo $row['start_date'];?></td>
          <td><?php echo $row['end_date'];?></td>
          <td><?php echo $row['description'];?></td>
          </tr>
          
          <?php }?>
        </table>
        
      <?php 
          echo form_submit('delete','Delete');
          echo form_close();
        ?>
        </div>
        
			</p>
			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>

<!-- end page -->
<?php
print_r($courses); 
