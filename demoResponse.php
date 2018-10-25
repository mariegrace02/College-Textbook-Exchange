<!DOCTYPE html>
<!-- 
 This is a sample demo for CTE team to show 
 some important parts of PHP
  

-->


<?php 
/*
		This is a a section to POST inputs from the keyboards
		of respective variables.
		
	*/

$username= $_POST["username"];
$password = $_POST["password"];
//$name = $username."-".$password;
//$fileName = file_put_contents("./singles.txt", rtrim($data), FILE_APPEND);
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
<br/>
<br/>
		<fieldset>
	<?php
	/*Checking if the user inputed the desired info as declared*/

		if(isset($username) && isset($password))
			print_r("WELCOME TO CTE: " .$username);
		else
			print("WE ARE SORRY, NO INPUT");
	?>
	
	<?php
	//this is another way of printing an output in PHP
	
		echo "<br/> <br/> We are pleased to be talking About PHP"
	?>
	
	</fieldset>
	</body>
</html>