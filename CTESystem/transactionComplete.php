<!--
transactionComplete
Takes user selection of a specific posting from confirmBuy
	-displays info of seller for user to get in contact with
	-displays information of the book as well as the fields from the BookUser table that are specific to this listing
	-sends an email to both the user and the seller to notify them, and provide them with each other's iniformation
	-makes the status of the listing unavailable, so it can be removed
-->

<!DOCTYPE html>

<html>
	<head>
		<title>Transaction</title>
		<!--including CSS and icon image-->
		<link rel="stylesheet" type="text/css" href="cte.css">
		<link rel="icon" href="book.jpg" >
	</head>
	<body>
		<div class="wrapper1">



<?php
			//load database connection

			session_start();
			//protecting from errors
			if (!empty($_SESSION["IDNumber"])){
				$savedBuyerID = $_SESSION["IDNumber"];
			}
			//accessing saved book listing variables from confirmBuy.php
			$savedSellerID = $_SESSION["sellerID"];
			$savedBookID = $_SESSION["bookID"];

			$host = "localhost";
			$user = "root";
			$password = "CTE2018";
			$database_name = "CTE";
			//email system variables
			$sellerEmail;
			$buyerEmail;
			//Messages for buyer and seller
			$msgSeller = "The seller of the book you are buying is ";
			$msgBuyer = "The book has been bought by ";
			$savedDescription = $_POST['Description'];
			//Create connection
			$conn = new mysqli($host, $user, $password, $database_name);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			echo "<p style='color:blue'> Transaction complete!</p> <br/>";

			//search query of Student table for seller info
			$sql = "SELECT * FROM Student WHERE IDNumber='$savedSellerID' ";
			$result = $conn->query($sql) or die($conn->error);
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()) {
					//displaying information of seller to user on the screen
					echo "Information of Seller " . "<br>";
					echo "<br>";
					echo "Name: " . $row["FirstName"] . " " . $row["LastName"] . "<br>";
					echo "Email: " . $row["Email"] . "<br>";
					echo "Phone number: " . $row["PhoneNumber"] . "<br>";
					$msgSeller .= $row["FirstName"]. " " . $row["LastName"]." email: ".$row["Email"]." Phone: ".$row["PhoneNumber"];
					$sellerEmail = $row["Email"];
				}
			}

			else {
				echo "No Seller user information";
			}

			//Buyer query
			$sqlBuyer = "SELECT * FROM Student WHERE IDNumber='$savedBuyerID' ";
			$resultBuyer = $conn->query($sqlBuyer) or die($conn->error);

			//buyer info for email. Get info from batabase
			if ($resultBuyer->num_rows > 0) {
				// output data of each row
				if($row = $resultBuyer->fetch_assoc()) {
					$msgBuyer .= $row["FirstName"]. " " . $row["LastName"]." email: ".$row["Email"]." Phone: ".$row["PhoneNumber"];
					$buyerEmail = $row["Email"];
				}
			}

			else {
				echo "No Buyer user information";
			}

			echo '<p>';
			//search query of Book for book info
			$sql = "SELECT * FROM Book WHERE BookID='$savedBookID' ";
			$result = $conn->query($sql) or die($conn->error);
			
			if ($result->num_rows > 0) {
			// output data of each row
				if($row = $result->fetch_assoc()) {
					//displaying book information to the user on the screen
					echo "Information of Book " . "<br>";
					echo "<br>";
					echo "Title: " . $row["Title"] . "<br>";
					echo "Author: " . $row["Author"] . "<br>";
					echo "ISBN: " . $row["ISBN"] . "<br>";
					echo "Class Code: " . $row["ClassCode"] . "<br>";

				}
			}

			else {
				echo "No book information";
			}
			//search query of BookUser for rest of book listing info
			$sql = "SELECT * FROM BookUser WHERE BookID='$savedBookID' AND Description='$savedDescription' ";
			$result = $conn->query($sql) or die($conn->error);
			//echo $result;
			if ($result->num_rows > 0) {
				// output data of each row
				if($row = $result->fetch_assoc()) {
					echo "Condition: " . $row["BookCondition"] . "<br>";
					echo "Description: " . $row["Description"] . "<br>";
					echo "Status: " . $row["BookStatus"] . "<br>";
					echo "Price: " . $row["Price"] . "$<br>";
					//Email to seller
					$msgSeller .=" Price sold at: ".$row["Price"];
					$msgSellerFinal = wordwrap($msgSeller,70);
					//echo $buyerEmail;
					mail("$buyerEmail","CTE SYSTEM EMAIL",$msgSellerFinal);
					//Email to Buyer
					$msgBuyer .=" Price sold at: ".$row["Price"];
					$msgBuyerFinal = wordwrap($msgBuyer,70);
					//echo $sellerEmail;
					mail("$sellerEmail","CTE SYSTEM EMAIL",$msgBuyerFinal);
					//SAVED INFO FOR UNAVAILABLE CHANGE
					$savedBookID = $row["BookID"];
					$savedDescription = $row["Description"];
					$savedSellerID = $row["IDNumber"];

				}
			}

			else {
				echo "<br>";
				echo "No book information";
			}


			// Update availability of listing to unavailable for removal
			$sql = "UPDATE BookUser SET BookStatus='unavailable' WHERE BookID='$savedBookID' AND Description='$savedDescription' AND IDNumber= '$savedSellerID' ";
			if($conn->query($sql) === TRUE){
				echo "Records were updated successfully.<br/>";
			} 
			else {
				echo "ERROR: Not able to execute " . $conn->error;
			}

			//deleting rows where status is unavailable
			$sql = "DELETE FROM BookUser WHERE BookStatus='unavailable' ";
			if(mysqli_query($conn, $sql)){
				echo "";
			} 
			else {
				echo "ERROR: Not able to execute " . $conn->error;
			}		
			//closing connection to server
			$conn->close();
			echo '<p>'; 
			
			?>

			<form action="profile.php">     
				<input type="submit" name="home" id="home" value="Back to Home">
			</form>
			<br>
		</div>
	</body>
</html>
