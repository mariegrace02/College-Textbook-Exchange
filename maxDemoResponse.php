<!DOCTYPE html>
<!-- 
 This is a sample demo for CTE team to show 
 some important parts of PHP
  
-->


<?php 
	//EDIT THESE NUMBERS
	//establishing a connection to our server
	$firstname= $_POST["firstname"];
	$lastname= $_POST["lastname"];
	$email= $_POST["email"];
	$phonenumber = $_POST["phonenumber"];
	$idnumber = $_POST["idnumber"];	
	$password = $_POST["password"];
	$username = $_POST["username"];
	$passwordagain = $_POST["passwordagain"];
	
	
	$conn = mysqli_connect('localhost', 'root', 'CTE2018', 'CTE');
	
	if (!$conn) {
		
      die("Connection failed: \n" . mysqli_connect_error());
	}
	else
	{ 
		echo "Connected successfully";
	}
	
	
	$insert = "INSERT INTO Student"."(FirstName, LastName, Email, PhoneNumber, IDNumber, Password, Username)"." VALUES"."('$firstname', '$lastname', '$email', '$phonenumber', '$idnumber', '$password', '$username')";
	
	if (mysqli_query($conn, $insert)) {
      echo "New record created successfully";
	}
	else {
      echo "\n Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
	
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
		/*Checking if the user inputed the desired info as declared
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
