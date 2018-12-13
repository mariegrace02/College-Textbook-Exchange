<!--
profile
The user has logged in or pressed any of our return to home buttons, and is taken to the home screen
Gives users links to pages in which they can sell a book, buy a book, view their account, or logout, or view FAQs
-->

<!DOCTYPE html>
<!--
Background file that contains all of the CSS and header tags
that we are using to make the system display consistent
-->
<?php include("background.html")?>

<?php

	session_start();
	//creating session to store variables we want to save

	$signedIn = false;
	
	$username = "";
	$password = "";

	//check for if the input fields were set to avoid errors
	if (isset($_POST["username"]) && isset($_POST["password"])){
		$password = $_POST["password"];
		$username = $_POST["username"];
	}
	
	//if they inputs are not blank, then they came from the login screen
	if ($username != "" && $password != ""){
		
		//query to connect to the database
		$conn = mysqli_connect('localhost', 'root', 'CTE2018', 'CTE');

		if (!$conn) {

		  die("Connection failed: \n" . mysqli_connect_error());
		}

		//query to find the account that the user logged into
		$accountCheck = "SELECT IDNumber FROM Student WHERE Username = '$username' AND Password = '$password'";
		$accountResult = mysqli_query($conn, $accountCheck);
			if (mysqli_num_rows($accountResult) == 0){
				//if there was no account found

?>
				<!--Wrapper for the beige background-->
				<div class="wrapper1">
					<br/>
					<p>Account was not found</p>
					<!--Prompts user to make a new account or try to sign in again on the login screen-->
					<form method="POST" action="signup.html">
						<input type="submit" name="signup" id="signup" value="Sign Up">
					</form>
					<br/>
					<br>
					<form method="POST" action="login.html">
						<input type="submit" name="login" id="login" value="Log In Again">
					</form>
					<br/>
					<br>
				
				</div>

		<?php
			}
			else{
				//if the account is found

				while($row = mysqli_fetch_assoc($accountResult)) {
					//save the IDNumber of the account in the session array
					//to be accessed across pages
					$_SESSION["IDNumber"] = $row["IDNumber"];
				}
				$signedIn = true;
		?>
				<br/>

			<?php
			}

		mysqli_close($conn);





	}
	//if they came from another page within the system, they are already logged in, don't need to do it again
	else{
		
		$signedIn = true;
	}

	if ($signedIn == true){
		//if the user has been signed in, prompt them with buttons to go perform various tasks they can


?>
			<!--Wrapper for the beige background-->
			<div class="wrapper1">
				<h1>College Textbook Exchange</h1>
				<br/>

				<fieldset>
					<!--Prompts user to visit pages to do various tasks they may want to do-->
					<legend>Choose an option</legend>
					<br/>
					<!--Each uses a form where the button is a submit type that calls a different file-->
					<form method="POST" action="BuyBook.php">
						<input type="submit" name="buyBook" id="buyBook" value="Buy Books">
					</form>

					<br/>
					<br/>

					<form method="POST" action="addBook.php">
						<input type="submit" name="sellBook" id="sellBook" value="Sell Books" />
					</form>
					<br/>
					<br/>

					<form method="POST" action="accountSettings.php">
						<input type="submit" name="settings" id="settings" value="Account Settings">
					</form>

					<br/>
					<br/>
					<form method="POST" action="frontpage.html">
						<input type="submit" name="logout" id="logout" value="Log Out">
					</form>
					<br/>
					<br>
					<form method="POST" action="help.html">
						<input type="submit" name="help" id="help" value="Help">
					</form>

					<br/>
					<br/>

				</fieldset>
			</div>
		</body>
	</html>
	<?php
	}
	?>
