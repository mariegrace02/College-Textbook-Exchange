 <!--
 BuyBook
 This page displays all books that have been listed to the database for the user to view listings
 User can also search for specific titles or authors and narrow down what is displayed in the table
 View buttons take user to screen where individual listings of the book are shown
 -->
 
 
 <!--calls the background.html page to set up the consistent appearance-->
<?php include("background.html")?>

		<div class="wrapper1"> <!--allows the beige wrapper to be used-->
			<h1>BUY BOOKS</h1> <!--header-->
			<br>
			<!--Search bar to narrow down what is displayed to certain titles and authors-->
			<form action="BuyBook.php" method="post"> Search title or author: <input type="text" name="search" placeholder=" Search here ... "/>
				<input type="submit" value="Submit" />
			</form>
			<br>


<?php
			//load database connection 
			session_start();
			$host = "localhost";
			$user = "root";
			$password = "CTE2018";
			$database_name = "CTE";
			$pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			// Search from MySQL database table, narrowing down if keyword was entered
			$search =$_POST['search'];
			$query = $pdo->prepare("select * from Book where Title LIKE '%$search%' OR Author LIKE '%$search%'  ");
			$query->bindValue(1, "%$search%", PDO::PARAM_STR);
			$query->execute();

			// Display search result
			if (!$query->rowCount() == 0) {
				echo "<table style=\"font-family:arial;color:#333333;\">";
				echo "<tr>
					<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Title</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Author</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">ISBN</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">ClassCode</td></tr>";

				while ($results = $query->fetch()) {
					
					//while books are found in the database, we are going to display them in the table
					$sellingBookID = $results['BookID'];

?>
					<form method="POST" action="confirmBuy.php">

		<?php
					echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
					$sellingTitle = $results['Title'];
					echo $sellingTitle;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
					
					$sellingAuthor = $results['Author'];
					echo $sellingAuthor;
					echo "</td>
					<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
					
					$sellingIsbn = $results['ISBN'];
					echo $sellingIsbn;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
					
					$sellingClassCode = $results['ClassCode'];
					echo $sellingClassCode;
					echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
					
					//submit button to see all listings of this particular book, one button for each book in database
					echo '<button type="submit" name="view" id="view" size="10"> View </button></td>';

					
					echo '<input type="hidden" name="sellingBookID" value=' . $sellingBookID . '/>';
					echo '</form>';
				}
				echo "</table>";
			}	
			else {
				echo 'Nothing found';
			}

//Source: http://tutorial.world.edu/web-development/how-to-create-database-search-mysql-php-script/
			echo '<p>'; 
 
 ?>
			
			<form action="profile.php">     
				<input type="submit" name="home" id="home" value="Back to Home">
			</form>
			<br>

		</div>
	</body>
</html>
