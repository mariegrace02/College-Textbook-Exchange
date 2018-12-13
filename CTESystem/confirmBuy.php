 <!--
 confirmBuy
 This takes the book that was selected by the user on the BuyBook page and displays all of the
 listings in the BookUser table that have its bookID
 Buy button takes you to transactionComplete page, and simulates the user buying the specific book
 -->
 
 <!--calls the background.html page to set up the consistent appearance-->

<?php include("background.html")?>

		<div class="wrapper1">
			<h1>CONFIRM BUY</h1>
			<br>
			
	


<?php
		//load database connection
		session_start();
		$host = "localhost";
		$user = "root";
		$password = "CTE2018";
		$database_name = "CTE";
		$pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		// Search from MySQL database table
		$sellingBookID=$_POST['sellingBookID'];
		$query = $pdo->prepare("select * from BookUser where BookID='$sellingBookID'  LIMIT 0 , 10");
		$query->bindValue(1, "$sellingBookID", PDO::PARAM_STR);
		$query->execute();

		// Display search result

		if (!$query->rowCount() == 0) {

			//List of books with same BookID as one selected on in BuyBook.php, displayed in a table
			echo "<table style=\"font-family:arial;color:#333333;\">";
			echo "<tr>
			<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">BookID</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">BookCondition</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Description</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">IDNumber</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">BookStatus</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Price</td></tr>";

			while ($results = $query->fetch()) {
				//accessing columns from the rows that contain correct BookID
				//saving them in session variables to be used when user selects a listing to buy
				$_SESSION["sellerID"] = $results['IDNumber'];
				$_SESSION["bookID"] = $results['BookID'];
?>

				<form method="POST" action="transactionComplete.php">

      <?php
					echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";

					$sellingBookID = $results['BookID'];
					echo $sellingBookID;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";

					$BookCondition = $results['BookCondition'];
					echo $BookCondition;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";

					$Description = $results['Description'];
					echo $Description;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";

					$IDNumber = $results['IDNumber'];
					echo $IDNumber;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";

					$BookStatus = $results['BookStatus'];
					echo $BookStatus;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";

					$Price = $results['Price'];
					echo $Price;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
					
					//button at the end of each listing to buy that specific listing
					echo '<button type="submit" name="buy" id="buy" size="20"> Buy </button>';
					  
					echo '<input type="hidden" name="Description" value="'.$Description.'"/>';
				echo '</form>';
			}
			echo "</table>";
		}
		else{
			echo 'Nothing found';
		}

//Source: http://tutorial.world.edu/web-development/how-to-create-database-search-mysql-php-script/
?>
		<br>
		<br>
		<form action="profile.php">     
			<input type="submit" name="home" id="home" value="Back to Home">
		</form>
		<br/>
	</body>
</html>
