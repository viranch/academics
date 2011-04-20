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
			<h2 class="title">Important dates</h2>
			<div class="entry">
      <h3><?php if(isset($message))echo "{$message}";?></h3>
      <p>
      <?php echo form_open('admin/admin/important_dates');?>
        <table class="admin_tab " table style="width:40%">
        <tr>
					<td>Start date</td>
          <td width=40%><input id="startdate" type="text" name="start_date" size=25% value=""></td>  
      </tr>
      <tr>
        <td>End date</td>
        <td width=40%><input id="enddate" type="text" name="end_date" size=25% value=""></td>  
      </tr>
      <tr>
        <td>Description</td>
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
        
      
        <h2>Delete important dates</h2>
      
        <?php if(isset($dates)){?>
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
          }
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
