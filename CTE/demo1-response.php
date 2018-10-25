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

$name= $_GET["name"];
$password = $_GET["password"];
$Total = 0;
?>


<html lang="en">
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="description" content="Testing the demo" />       
		<meta name="author" content="CTE Team" />
	</head>
	
	<body>
	<!-- 
		This is a div which will contain the contents
		
-->
	<div style="border:5px solid black; width=100px; padding-right:60px;
	padding-left:10px; float:left; size=10px;border-color: gray">
	
	<?php
	/*Checking if the user inputed the desired info as declared*/
	
		if(isset($name) && isset($password))
			print_r("WELCOME TO CTE: " $name);
		else
			print("WE ARE SORRY; THERE IS NO INPUT");
	?><br/><br/>
	
	
</html>
