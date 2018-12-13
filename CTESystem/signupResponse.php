<!--
singupResponse
Takes the user input and verifies they are correct
	-they are not empty
	-username, email, phone, and id must all be unique to the database
	-both password fields match
-->

<!DOCTYPE html>


<html lang="en">
	<head>
		<!--same layout to create consistent appearance-->
		<title>CTE System</title>
		<meta charset="utf-8" />
		<meta name="description" content="Testing the demo" />       
		<meta name="author" content="CTE Team" />
		<link rel="stylesheet" type="text/css" href="cte.css">
		<link rel="icon" href="book.jpg" >
	</head>
	
	<body>
		<div class="wrapper1">
			<br>


<?php 

			//getting values from input fields from maxSignup
			$firstname= $_POST["firstname"];
			$lastname= $_POST["lastname"];
			$email= $_POST["email"];
			$phonenumber = $_POST["phonenumber"];
			$idnumber = $_POST["idnumber"];	
			$password = $_POST["password"];
			$username = $_POST["username"];
			$passwordagain = $_POST["passwordagain"];
			$access = false;
			
			$conn = mysqli_connect('localhost', 'root', 'CTE2018', 'CTE');
			
			//Trying to connect to our database CTE
			if (!$conn) {
				
			  die("Connection failed: \n" . mysqli_connect_error());
			}
			
			
			
			//checking parts of the account that must be unique
			//username, email, phone number, and student id
			$usernameCheck = "SELECT IDNumber FROM Student WHERE Username = '$username'";
			$usernameResult = mysqli_query($conn, $usernameCheck);
			$emailCheck = ("SELECT IDNumber FROM Student WHERE Email = '$email'");
			$emailResult = mysqli_query($conn, $emailCheck);
			$phoneNumCheck = ("SELECT IDNumber FROM Student WHERE PhoneNumber = '$phonenumber'");
			$phoneNumResult = mysqli_query($conn, $phoneNumCheck);
			$idCheck = ("SELECT IDNumber FROM Student WHERE IDNumber = '$idnumber'");
			$idResult = mysqli_query($conn, $idCheck);
			
			//we don't want to add the account to the file unless
			//all of these values are filled in with something
			if (!empty($firstname))
			{
				
				$access = true;
				
			}
			else
			{
				echo "first name is not set<br>";
			}
				
			if (!empty($lastname))
			{
				$access = true;
				
			}
			else
			{
				echo "Last name is not set<br>";
			}
				
			if (!empty($email))
			{
				$access = true;
				
			}
			else	
			{
				echo "email is not set<br>";
			}
			
				
			if (!empty($phonenumber))
			{
				$access = true;
				
			}
			else
				echo "phonenumber not set<br>";
				
			if (!empty($idnumber))
			{
				$access = true;
				
			}
			else
				echo "ID NUMBER is not set<br>";
				
					
				
			if (!empty($username))
			{
				$access = true;
			}
				
			else
				echo "username is not set<br>";
				
			if (!empty($password))
			{
				$access = true;
					
			}
				
			else
				echo "Password is not set<br>";
				
				
			if (!empty($passwordagain))
			{
				$access = true;
				
			}
			else
				echo "The password again is not set<br>";
				
				
			if ($access == true)
			{
				//checking username, email, phone, and id for uniqueness
				if (mysqli_num_rows($usernameResult) != 0){
					echo "<p align = 'center'> <font size = '5pt'>Already an account with this USERNAME<br/>Press Back to reenter your information<br/></font> </p>";
				}
				else if (mysqli_num_rows($emailResult) != 0){
					echo "<p align = 'center'> <font size = '5pt'>Already an account with this EMAIL<br/>Press Back to re-enter your information<br/></font> </p>";
				}
				else if (mysqli_num_rows($phoneNumResult) != 0){
					echo "<p align = 'center'> <font size = '5pt'>Already an account with this PHONE NUMBER<br/>Press Back to reenter your information<br/></font> </p>";
				}
				else if (mysqli_num_rows($idResult) != 0){
					echo "<p align = 'center'> <font size = '5pt'>Already an account with this ID NUMBER<br/>Press Back to reenter your information<br/></font> </p>";
				}
				//making sure password fields are the same
				else if ($password != $passwordagain){
					echo "<p align = 'center'> <font size = '5pt'>The two password fields must be the same<br/>Press Back to reenter your information<br/></font> </p>";
				}
				else{
					/*this is inserting the user input information 
					such as last name, first name, email,.... into our database called CTE*/
					echo "<p align = 'center'> <font size = '5pt'>This account is good to go<br/></font> </p>";
					$insert = "INSERT INTO Student"."(FirstName, LastName, Email, PhoneNumber, IDNumber, Password, Username)"." VALUES"."('$firstname', '$lastname', '$email', '$phonenumber', '$idnumber', '$password', '$username')";
				
					if (mysqli_query($conn, $insert)) {
						//if everything works, prompt user to login with their information they just created
						echo "<p align = 'center'> <font size = '5pt'>New record created successfully</font> </p>";
						
?>
						<br/>
						<br/>
						<fieldset>
							<form method="POST" action="login.html">
								<input type="submit" name="LOG IN" id="login" value="SIGN IN"/>
								<br/>
							</form>
						</fieldset>
						<br>
		</div>
<?php

					}
					else {
						echo "\n Error: " . $sql . "<br>" . mysqli_error($conn);
					}	
				}
			}
			else
			{
				echo "<br /> PLEASE ENTER VALID INPUT";
				echo"<br> Press Back to try again";
				echo "<br><br>";
			}
	
?>
	</body>
</html>
