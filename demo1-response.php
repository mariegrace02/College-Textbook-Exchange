<!DOCTYPE html>
<!-- 
 This is a sample demo for CTE team to show 
 some important parts of PHP
  

-->


<?php 
/*
		This is a a section to get inputs from the keyboards
		of respective variables.
		
	*/

$username= $_GET["username"];
$password = $_GET["password"];
$Total = 0;
?>


<html lang="en">
	<head>
		<title>CTE Login</title>
		<meta charset="utf-8" />
		<meta name="description" content="Testing the demo" />       
		<meta name="author" content="CTE Team" />
	</head>
	
	<body>
	<!-- 
		This is a div which will contain the contents
		
-->
	<?php
	/*Checking if the user inputed the desired info as declared*/
	
		if(isset($username) && isset($password))
			print_r("WELCOME TO CTE: " $usernname);
		else
			print("WE ARE SORRY, NO INPUT");
	?>
	<br/><br/>
	
	
</html>