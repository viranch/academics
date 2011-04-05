<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title>Grade</title>
    <script type="text/javascript" src="../../../jquery.js" > </script>
	<script type="text/javascript"> 
	function calculate(){
		var obj = document.getElementById("grad_table");
		var wt = document.getElementById("weightages");
		
		
		var insem1_wt , insem2_wt, endsem_wt, misc_wt;
    	insem1_wt = new Number(document.getElementById("insem1_wt").value);
		insem2_wt = new Number(document.getElementById("insem2_wt").value);
		endsem_wt = new Number(document.getElementById("endsem_wt").value);
		misc_wt = new Number(document.getElementById("misc_wt").value);
	
		var i,j ,insem1_max, insem2_max, endsem_max, misc_max;
		insem1_max = new Number(obj.rows[1].cells[1].firstChild.value);
		insem2_max = new Number(obj.rows[1].cells[2].firstChild.value);
		endsem_max = new Number(obj.rows[1].cells[3].firstChild.value);
		misc_max   = new Number(obj.rows[1].cells[4].firstChild.value);
		
		
		for(i=2 ; obj.rows[i] != null ; i++){
			t =  new Number(obj.rows[i].cells[1].firstChild.value);
			if(insem1_max < t)
				insem1_max = t;
			t1 = new Number(obj.rows[i].cells[2].firstChild.value);
			if(insem2_max < t1)
				insem2_max = t1;
			t2 = new Number(obj.rows[i].cells[3].firstChild.value);
			if(endsem_max < t2)
				endsem_max = t2;
			t3 = new Number(obj.rows[i].cells[4].firstChild.value);
			if(misc_max < t3)
				misc_max = t3;
			}
			
			
		//	alert(misc_max);
		for( i=1 ; obj.rows[i] != null ; i++){
			var insem1 = new Number(obj.rows[i].cells[1].firstChild.value);
			var insem2 = new Number(obj.rows[i].cells[2].firstChild.value);
			var endsem = new Number(obj.rows[i].cells[3].firstChild.value);
			var misc = new Number(obj.rows[i].cells[4].firstChild.value);
			
			if(isNaN(obj.rows[i].cells[1].firstChild.value) || isNaN(obj.rows[i].cells[1].firstChild.value)  || isNaN(obj.rows[i].cells[1].firstChild.value) || isNaN(obj.rows[i].cells[1].firstChild.value))
			{
				alert("Please enter valid numbers and try again");
				break;
			}
			j=0;
			if(!((insem1_max ==0)&&(insem1_wt==0))){
				
				if(insem1_max != 0){
					var y = insem1/insem1_max;
					j = y*insem1_wt;
				}
			}
			
			if(!((insem2_max ==0)&&(insem2_wt==0))){
				
				if(insem2_max != 0){
					var y = insem2/insem2_max;
					j = j + y*insem2_wt;
				}
			}
			
			if(!((endsem_max ==0)&&(endsem_wt==0))){
				
				if(endsem_max != 0){
					var y = endsem/endsem_max;
					j = j + y*endsem_wt;
				}
			}
			
			if(!((misc_max ==0)&&(misc==0))){
				
				if(insem2_max != 0){
					var y = misc/misc_max;
					j = j + y*misc_wt;
				}
			}
			if(!isNaN(j))
			obj.rows[i].cells[5].firstChild.value = Math.round(j);
			else{
			alert("Fields must contain numbers only");
			break;}
		}
	}
	</script> 

</head>
<body>
	<?php 
		if($stu_list != null){
			echo "<form action='/Projects/faculty/gradeupdate' method = 'post'><table id=\"grad_table\">";
			echo "<tr> <td>Id</td>
							<td>Insem1</td> 
							<td>Insem2</td> 
							<td>Endsem</td> 
							<td>Misc</td>
							<td>Effective Total</td>
							<td>Grade</td>
					   </tr>";
			foreach($stu_list as $row){
				$id_insem1 = "insem1_".$row['user_id'];
				$id_insem2 = "insem2_".$row['user_id'];
				$id_endsem = "endsem_".$row['user_id'];
				$id_misc   = "misc_"  .$row['user_id'];
				$id_grade  = "grade_" .$row['user_id'];
				$id_effective = "effective_".$row['user_id'];
				echo "<tr class='stu'>
							<td>{$row['user_id']}</td>
							<td><input name='$id_insem1' class ='insem1' type='input' value='{$row['marks_insem1']}'></td> 
							<td><input name='$id_insem2' type='input' class ='insem2' value='{$row['marks_insem2']}'></td> 
							<td><input name='$id_endsem' type='input' class ='endsem' value='{$row['marks_endsem']}'></td> 
							<td><input name='$id_misc'   type='input' class ='misc' value='{$row['marks_misc']}'></td>
							<td><input name='$id_effective'  type='input' class ='effective_marks'  value='{$row['marks_effective']}'></td>
							<td><input name='$id_grade'  type='input' class ='effective_marks'  value='{$row['grade']}'></td>
					   </tr>";
			}
			echo "</table> Enter the weightage of exams for grading: 
			<table id=\"weightages\">
				<tr>
					<td>Insem1:</td>
					<td> <input name='wt_insem1' type='input'  id ='insem1_wt'></td>
				</tr>
				<tr>
					<td>Insem2:</td>
					<td><input name='wt_insem2' type='input'  id ='insem2_wt'></td>
				</tr>
				<tr>
					<td>Endsem  :</td>
					<td><input name='wt_endsem' type='input' id='endsem_wt'></td>
				</tr>
				<tr>
					<td>misc:</td>
					<td><input name='wt_misc' type='input' id='misc_wt'></td>
				</tr>
			</table>";
		    echo "<input type='button' value='Calculate Effective Marks' Onclick='calculate()' ><br>";
			echo "<input type='submit' value='Submit'> </form>";
		}
	?>



</body>
</html>