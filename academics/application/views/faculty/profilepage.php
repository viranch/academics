<div id="wrapper">
<div id="page">
	

<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Faculty Detail</h2>
		<table height="350" border="1">
		<COLGROUP span="1" width="150">
		<COLGROUP span="1" width="300">
		<tr>
  		<td>Faculty Name</td>
  		<td><?php   foreach($details as $detail)
					echo $detail['name'];?></td>
		<td rowspan="3"><img border="0" src=<?php foreach($details as $detail) echo $detail['image']; ?> alt="Image can't be uploaded" width="200" height="150" /></td>
		</tr>
		<tr>
		<td>Faculty Id</td>
		<td><?php foreach($details as $detail)
					echo $detail['user_id']; ?></td>
		</tr>
		<tr>
		<td>Gender</td>
		<td><?php foreach($details as $detail)
					echo $detail['gender']; ?></td>
		</tr>
		<tr>
		<td>Area of Expertise</td>
		<td colspan="2"> <?php foreach($details as $detail)
					echo $detail['area_of_expertise']; ?></td>
		</tr>
		<tr>
		<td>Date of joining</td>
		<td colspan="2"><?php foreach($details as $detail)
					echo $detail['date_of_joining'] ; ?></td>
		</tr>
		<tr>
		<td>Degrees</td>
		<td colspan="2"><?php foreach($details as $detail)
					echo $detail['degrees']; ?></td>
		</tr>
		<tr>
		<td>Experience</td>
		<td colspan="2"><?php foreach($details as $detail)
					echo $detail['experience']; ?></td>
		</tr>
		</table>
	</div>
<!-- end of content -->
    

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
</div>

</body>
</html>
