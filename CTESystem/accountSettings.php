<!--
accountSettings
Opens when user selects 'Account Settings' on profile.php
        -displays the name, email, phone number, ID number, username, and password of the user after login
        -allows user to change entries in the name, email, phone number, and password fields associated with their account
        -displays list of books the user has uploaded to the database
        -allows user to delete books from their account
-->

<!DOCTYPE html>

<html lang="en">

<?php
	session_start();
	//accessing IDNumber of user that is signed in
	$savedID = $_SESSION["IDNumber"];
	//connecting to the server
	$conn = mysqli_connect('localhost', 'root', 'CTE2018', 'CTE');
	
	if (!$conn) {
      die("Connection failed: \n" . mysqli_connect_error());
	}
	
	//creating variables to store changes that may have been made from
	$newFName = $_POST["firstname"];
	$newLName = $_POST["lastname"];
	$newEmail = $_POST["email"];
	$newPhone = $_POST["phonenumber"];
	$newUsername = $_POST["username"];
	$newPassword = $_POST["password"];
	$booksToDelete = $_GET["books"];
	
	//accessing Student account with savedID
	$accountCheck = "SELECT * FROM Student WHERE IDNumber = '$savedID'";
	$accountResult = mysqli_query($conn, $accountCheck);
	
?>

	<head>
		<!--code for consistent appearance-->
		<title>CTE Account Settings</title>
		<meta charset="utf-8" />
		<meta name="description" content="CTE" />
		<link rel="stylesheet" type="text/css" href="cte.css">
		<link rel="icon" href="book.jpg" >



	</head>

	<body>
		<div class="wrapper1">
			<h1>ACCOUNT SETTINGS </h1>
			<br/>
		  
			<form action="profile.php">     
				<input type="submit" name="home" id="home" value="Back to Home">
			</form>
			<br/>
			<!--form for editing information, submit button calls page again-->
			<form method="POST" action="accountSettings.php">
				<fieldset>
					<legend>My Profile</legend>

			<?php 
					if($row = mysqli_fetch_assoc($accountResult)) {
				
						//gathering columns from table
						$accFName = $row['FirstName'];
						$accLName = $row['LastName'];
						$accEmail = $row['Email'];
						$accPhone = $row['PhoneNumber'];
						$accUsername = $row['Username'];
						$accPassword = $row['Password'];
						
						//checking to see if user's changed info is different from the table
						//if it is, then we update the row in the database
						
						if ($accFName != $newFName & $newFName != ""){
							$accFName = $newFName;							
							//update query
							$update = "UPDATE Student SET FirstName = '$newFName' WHERE IDNumber = '$savedID'";
			
							if (mysqli_query($conn, $update)) {
								echo "First Name updated successfully <br>";
							}
							else {
								echo "\n Error:" . $sql . " " . mysqli_error($conn);
							}
						}
						
						if ($accLName != $newLName & $newLName != ""){
							$accLName = $newLName;							
							//update query
							$update = "UPDATE Student SET LastName = '$newLName' WHERE IDNumber = '$savedID'";
			
							if (mysqli_query($conn, $update)) {
								echo "Last Name updated successfully <br>";
							}
							else {
								echo "\n Error:" . $sql . " " . mysqli_error($conn);
							}
						}
						
						if ($accPhone != $newPhone & $newPhone != ""){
							$phoneCheck = "SELECT * FROM Student WHERE PhoneNumber = '$newPhone'";
							$phoneResult = mysqli_query($conn, $phoneCheck);
							//additionally checking to see if this new info is used by another account, as it must be unique
							if($row = mysqli_fetch_assoc($phoneResult)){
								echo "The new phone number is already linked to another account<br>";
							} 
							else{
								$accPhone = $newPhone;							
								//update query
								$update = "UPDATE Student SET PhoneNumber = '$newPhone' WHERE IDNumber = '$savedID'";
				
								if (mysqli_query($conn, $update)) {
									echo "Phone Number updated successfully <br>";
								}
								else {
									echo "\n Error:" . $sql . " " . mysqli_error($conn);
								}
							}
						}
						
						if ($accEmail != $newEmail & $newEmail != ""){
							$emailCheck = "SELECT * FROM Student WHERE Email = '$newEmail'";
							$emailResult = mysqli_query($conn, $emailCheck);
							//additionally checking to see if this new info is used by another account, as it must be unique
							if($row = mysqli_fetch_assoc($emailResult)){
								echo "The new email is already linked to another account<br>";
							} 
							else{
								$accEmail = $newEmail;							
								//update query
								$update = "UPDATE Student SET Email = '$newEmail' WHERE IDNumber = '$savedID'";
				
								if (mysqli_query($conn, $update)) {
									echo "Email updated successfully <br>";
								}
								else {
									echo "\n Error:" . $sql . " " . mysqli_error($conn);
								}
							}
						}
						
						if ($accPassword != $newPassword & $newPassword != ""){
							$accPassword = $newPassword;							
							//update query
							$update = "UPDATE Student SET Password = '$newPassword' WHERE IDNumber = '$savedID'";
			
							if (mysqli_query($conn, $update)) {
								echo "Password updated successfully <br>";
							}
							else {
								echo "\n Error:" . $sql . " " . mysqli_error($conn);
							}
						}

				
			?>
						<!--PRinting out the users information in textboxes so they can edit-->
						<br/>
						<span><label for="firstname"><strong>First Name: </strong></label></span>
						<input type="text" name="firstname" id="firstname" size="25" value="<?php echo $accFName;?>"/>
						<br/>
						<br/>
						<span><label for="lastname"><strong>Last Name: </strong></label></span>
						<input type="text" name="lastname" id="lastname" size="25" value="<?php echo $accLName;?>"/>
						<br/>
						<br/>
						<span><label for="email"><strong>Email: </strong></label></span>
						<input type="text" name="email" id="email" size="25" value="<?php echo $accEmail;?>"/>
						<br/>
						<br/>
						<span><label for ="phonenumber"><strong>Phone Number: </strong></label></span>
						<input type = "text" name = "phonenumber" id = "phonenumber" size = "25" value="<?php echo $accPhone;?>"/>
						<br/>
						<br/>
						<!--Username and IDNumber are not editable-->
						<span><label for ="username"><strong>ID Number: <?php echo $savedID;?></strong></label></span>
						<br/>
						<br/>
						<span><label for ="username"><strong>Username: <?php echo $accUsername;?></strong></label></span>
						<br/>
						<br/>
						<span><label for ="password"><strong>Password: </strong></label></span>
						<input type = "text" name = "password" id = "password" size = "25"value="<?php echo $accPassword;?>"/>
						<br/>
						<br/>
			<?php
					}
			?>  

					<input type="submit" name="cal" id="cal" value="CONFIRM CHANGES"/>
				</fieldset>
			</form>
			<br>
			<fieldset>
				<legend>Books Listed</legend>
		
		<?php
				if (isset($_GET["books"])) {
					
					//if user selected books to delete, we remove them from the
					//BookUser table, and then they will not be displayed again on this page
					//as they are gone
					
					foreach ($booksToDelete as $book){
						//accessing all books that were checked
						
						//search query
						$find = "SELECT * FROM Book WHERE BookID = '$book'";
						$findResult = mysqli_query($conn, $find);
						
						//when the listing is found
						if($row = mysqli_fetch_assoc($findResult)){
							$titleRemoved = $row["Title"];
							//delete query
							$delete = "DELETE FROM BookUser WHERE BookID = '$book' AND IDNumber = '$savedID'";
							if (mysqli_query($conn, $delete)) {
								echo "\"" . $titleRemoved . "\" removed successfully<br>";
							}
							else {
								echo "\n Error: " . $sql . " " . mysqli_error($conn) + "<br>";
							}
						} 
					
						
					}
					echo "<br>";
				}
				
				//search query
				$bookuserCheck = "SELECT * FROM BookUser WHERE IDNumber = '$savedID'";
				$bookuserResult = mysqli_query($conn, $bookuserCheck);
				
				if(mysqli_num_rows($bookuserResult) > 0) {
				
					//if the user has an book listings, they will be displayed on the 
					//screen for them to see
			?>
					<!--Form that calls the page again to updatet account-->
					<form method="GET" action="accountSettings.php">
			<?php
					while ($BUrow = mysqli_fetch_assoc($bookuserResult)){
						
						$bookID = $BUrow["BookID"];
						//select query, from book table
						$bookCheck = "SELECT * FROM Book WHERE BookID = '$bookID'";
						$bookResult = mysqli_query($conn, $bookCheck);
						
						if ($Brow = mysqli_fetch_assoc($bookResult)){
							
							//creating checkboxes for each one as a way for the user to 
							//take down book listings they no longer want to sell
			?>
							<input type="checkbox" id= "books" name="books[]" value="<?php echo $Brow["BookID"]; ?>"><?php echo $Brow["Title"] . ", By: " . $Brow["Author"] . ", ISBN: " . $Brow["ISBN"] . ", Class: " . $Brow["ClassCode"] . ", Condition: " . $BUrow["BookCondition"] . ", Price: $" . $BUrow["Price"] . "<br><br>";

						}
					}
			?>
						<input type="submit" value="REMOVE SELECTED BOOKS">
					</form>
			<?php
				}
			?>
			
			
			
			
			</fieldset>
		</div>
	</body>
</html>
