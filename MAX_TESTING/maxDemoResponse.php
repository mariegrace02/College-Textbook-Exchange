<!DOCTYPE html>
<!-- 
 This is a sample demo for CTE team to show 
 some important parts of PHP
  
-->


<?php 

	//getting reading 
	$firstname= $_POST["firstname"];
	$lastname= $_POST["lastname"];
	$email= $_POST["email"];
	$phonenumber = $_POST["phonenumber"];
	$idnumber = $_POST["idnumber"];	
	$password = $_POST["password"];
	$username = $_POST["username"];
	$passwordagain = $_POST["passwordagain"];
	
	$accessible = false;
	
	$conn = mysqli_connect('localhost', 'root', 'CTE2018', 'CTE');
	
	if (!$conn) {
		
      die("Connection failed: \n" . mysqli_connect_error());
	}
	else
	{ 		
		echo "Connected successfully to the database \n <br /> ";
	}
	
	//Trying to connect to our database CTE
	
	
	/*this is inserting the user input information 
	such as last name, first name, email,.... into our database called CTE*/
	
	if ($password == $passwordagain)
	{
		$accessible = true;
		echo "<br /> PASSWORDS MATCH";
		
		
		$insert = "INSERT INTO Student"."(FirstName, LastName, Email, PhoneNumber, IDNumber, Password, Username)"." VALUES"."('$firstname', '$lastname', '$email', '$phonenumber', '$idnumber', '$password', '$username')";
		
		if (mysqli_query($conn, $insert)) {
		echo "New record created successfully";
		}
		else {
		echo "\n Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		
		
	}
		
	else
	{
		echo "PASSWORDS DON'T MATCH";
	}
		/*
		//this is another way of printing an output in PHP
		
		//echo "<br/> <br/> We are pleased to be talking About PHP" 
	
		$insert = "INSERT INTO Student"."(FirstName, LastName, Email, PhoneNumber, IDNumber, Password, Username)"." VALUES"."('$firstname', '$lastname', '$email', '$phonenumber', '$idnumber', '$password', '$username')";
	
	//checking if there is a connection to our database
		
	//closing the database
	
	}
	
	else
	{
		echo "failed, the passwords are not the same";
	}*/

	
	
?>


<html lang="en">
	<head>
		<title>CTE Login</title>
		<meta charset="utf-8" />
		<meta name="description" content="Testing the demo" />       
		<meta name="author" content="CTE Team" />
		<link rel="stylesheet" type="text/css" href="cte.css">
	</head>
	
	<body>
	<!-- 
		This is a div which will contain the contents
	-->
        <br/>
        <br/>
		<div class="wrapper">
		<fieldset>
		
		
	        <?php
			
			if ($accessible == true)
			{
			?>
			<form method="POST" action="login.html">
			
				<input type="submit" name="LOG IN" id="login" value="SIGN IN"/>
				<br/>
			</form>
			
			<?php	
			}
				/*
				print_r("You are now logged in as: ".$firstname." ".$lastname);
			}
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
		
			*/
		
		?>
	
		
	</fieldset>
	
	<form method="POST" action="frontpage.html">
	
       
        	<input type="submit" name="logout" id="logout" value="LOG OUT" />
  
 
        </form>
		</div>
	</body>
</html>
