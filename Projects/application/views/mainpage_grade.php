<html>
<head>
	<title>Grades</title>
</head>
<body>
<?php   if($psem >= 1)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/1","Semester 1" ,array()) . "</br>";
		
		if($psem >= 2)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/2","Semester 2" ,array()) . "</br>";
		
		if($psem >= 3)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/3","Summer1" ,array()) . "</br>";
				
		if($psem >= 4)	
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/4","Semester 3" ,array()) . "</br>";
		
		if($psem >= 5)		
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/5","Semester 4" ,array()) . "</br>";
				
		if($psem >= 6)	
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/6","Summer2" ,array()) . "</br>";
		
		if($psem >= 7)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/7","Semester 5" ,array()) . "</br>";
				
		if($psem >= 8)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/8","Semester 6" ,array()) . "</br>";
		
		if($psem >= 9)		
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/9","Summer 3" ,array()) . "</br>";
				
		if($psem >= 10)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/10","Semester 7" ,array()) . "</br>";
				
		if($psem >= 11)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/11","Semester 9" ,array()) . "</br>";
				
		if($psem >= 12)
				echo anchor("http://127.0.0.1/Projects/vishu/getgradedetails/12","Summer 4" ,array()) . "</br>";
				
		?>	
				</body>
</html>