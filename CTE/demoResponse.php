<!DOCTYPE html>
<!-- 
 This is a sample demo for CTE team to show 
 some important parts of PHP
  

-->


<?php 

	//EDIT THESE NUMBERS
	//establishing a connection to our server
	$dbhost = '192.168.110.46';
	$dbuser = 'team';
	$dbpass = 'HolaJesus123?';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);

	//making sure we can connect to our server
	if(! $conn ) {
		die('Could not connect: ' . mysql_error());
	}

	/*
		This is a a section to POST inputs from the keyboards
		of respective variables.
		
	*/
	$firstname= $_POST["firstname"];
	$lastname= $_POST["lastname"];
	$username= $_POST["username"];
	$email= $_POST["email"];
	//$phone = $_POST["phone"];
	$password = $_POST["password"];
	$passwordagain = $_POST["passwordagain"];

	//NEED TO GENERATE ID BASED OFF OF LAST ID IN THE STUDENT TABLE

	//CHECK TO SEE IF PASSWORDS ARE THE SAME
	//ELSE IF CHECK TO SEE IF THE EMAIL WAS ALREADY IN USE
	//ELSE IF CHECK TO SEE IF THE USERNAME IS ALREADY IN USE
	//ELSE CAN ADD TO THE DATABASE

	$insert = "INSERT INTO Student"."(firstName, lastName, email, phoneNumber, IDNumber, password)".
		"VALUES"."('$firstname', '$lastname', '$email', '$phone', '$RANDOMLYGENERATEID', '$password')";

	//not sure what this is for
	mysql_select_db('Student');

	//querying the database
	$sqlinsert = mysql_query($insert, $conn);
	
	//checking to see if the insert worked
	if(! $sqlinsert ) {
		die('Could not enter data: ' . mysql_error());
	}

	//$data = $username."-".$password;
	//$sentences = file ("./names.txt");

	//$fileName = file_put_contents("./names.txt", rtrim($data), FILE_APPEND);

	mysql_close($conn);
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
		$access1= false;
		$access2 = false;

		if(isset($firstname,$password ) //$lastname,$username, $email,$passwordagain))
		{
		
			$access1 = true;	
			
		}
		
		if($password == $passwordagain)
		{
			$access2 = true;
			
		}
		
		if (($access1 == true) 
			//&& ($access2 == true))		
		{
			print_r("WELCOME TO CTE: " .$firstname. " ". $lastname);
		}
		/*else
		{
			print_r("The passwords DO NOT MATCH");
			//$fileName = file_put_contents("./names.txt", rtrim($data), FILE_APPEND);
		}*/
		
	?>
	
	<?php
	//this is another way of printing an output in PHP
	
		echo "<br/> <br/> We are pleased to be talking About PHP"
	?>
	
	</fieldset>
	
	<form method="POST" action="frontpage.html">
	
       
    <input type="submit" name="logout" id="logout" value="LOG OUT" />
  
 
</form>
	</body>
</html>
