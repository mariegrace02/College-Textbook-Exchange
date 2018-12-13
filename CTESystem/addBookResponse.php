<!--
addBookResponse
Saves book information the user entered on addBook.php
	-stores it in the database	
		-if the book has already been added before, only add listing to BookUser table
		-if not, add the book info to the Book table as well
-->

<!DOCTYPE html>


<html lang="en">
	<head>
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

			//continuing session
			session_start();
				
			//getting variables from form from addBook.php
			$bookTitle= $_POST["bookTitle"];
			$author= $_POST["author"];
			$isbn= $_POST["isbn"];
			$classCode = $_POST["classCode"];
			$courseProfessor = $_POST["courseProfessor"];	
			$bookCondition = $_POST["bookCondition"];
			$bookPrice = $_POST["price"];
			$description= $_POST["description"];
			
			$randomID = 0;
			$access = false;
			$bookStatus = "available";
			
			$min = 1;
			$max = 1000;
			
			//creating a random ID for the book listing
			$randomID = rand($min,$max);
			$bookstatus = rent;
				
			$randomIDArray = array();
			//checking to make sure this number wasn't already used
			if (in_array('$randomID', $randomIDArray))
			{
				
				array_push($randomIDArray,$randomID);
				$randomID = rand($min, $max);
				
				array_push($randomIDArray,$randomID);
				
			}
			else
			{
				array_push($randomIDArray,$randomID);

			}	
				
			
			//connecting to the server
			$conn = mysqli_connect('localhost', 'root', 'CTE2018', 'CTE');
			//Trying to connect to our database CTE
			if (!$conn) {
				
			  die("Connection failed: \n" . mysqli_connect_error());
			}
				
			
			$savedIDNumber = $_SESSION["IDNumber"];
			//finding the listed book in the Book table
			$isbnCheck = "SELECT * FROM Book WHERE ISBN = '$isbn'";
			$isbnResult = mysqli_query($conn, $isbnCheck);
			
			
					
			if (mysqli_num_rows($isbnResult) == 0)
			{
				//if the book is not founnd in the Book table, we add it to the Book table and the BookUser Table	
				$insert = "INSERT INTO Book"."(BookID,Title,Author, ISBN, ClassCode)"." VALUES"."($randomID,'$bookTitle', '$author','$isbn', '$classCode')";
				
				$insertBookUser = "INSERT INTO BookUser"."(BookID, BookCondition, Price, Description,IDNumber, BookStatus)"." VALUES"."('$randomID', '$bookCondition', '$bookPrice','$description','$savedIDNumber','$bookStatus')";
				
				
				if (mysqli_query($conn,$insert) && mysqli_query($conn,$insertBookUser) ) 
				{
					echo "<p align = 'center'> <font size = '5pt'>New Book Added successfully</font> </p>";
				}
				else {
					echo "\n Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				
			}
			
			else
			{
				//otherwise, we add the book to just the BookUser table
				$getSavedBookID = "SELECT * FROM Book WHERE ISBN = '$isbn'";
				$getSavedBookIDResult = mysqli_query($conn, $getSavedBookID);
				
				
				if($row = mysqli_fetch_assoc($getSavedBookIDResult)) 
				{
					//we are using the bookID that we already created for this book from the Book table
					$bookIDNumber = $row["BookID"];
			
					$insertBookID = "INSERT INTO BookUser"."(BookID, BookCondition, Price, Description, IDNumber, BookStatus)"." VALUES"."('$bookIDNumber', '$bookCondition', '$bookPrice','$description','$savedIDNumber','$bookStatus')";
					
					
					if ( mysqli_query($conn,$insertBookID) ) 
					{
						echo "<p align = 'center'> <font size = '5pt'>New Book Added successfully</font> </p>";
					}
					else {
						echo "\n Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				
				else
				{
					echo "\n Error: first " . $sql . " " . mysqli_error($conn);
				}
			
			
			}
		
	

?>
			<br/>

			<form action="profile.php">     
				<input type="submit" name="home" id="home" value="Back to Home">
			</form>

			<br>
			<br>
				
		</div>

	</body>
</html>
