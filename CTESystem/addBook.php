<!--
addBook
Opens when user selects 'Sell Books' option on profile.php
	-Takes user input of book that they would like to sell
-->

<!DOCTYPE html>
<?php
  session_start();
  //continuing session
?>
<html lang="en">

	<head>
		<!--
		Same beginning code for consistency
		-->
		<title>SELL A BOOK</title>
		<meta charset="utf-8" />
		<meta name="description" content="CTE" />
		<link rel="stylesheet" type="text/css" href="cte.css">
		<link rel="icon" href="book.jpg" >
	</head>
	<!--
	The div to be able to place our contents with respect to the CSS code
	-->
	<body>
		<div class='wrapper1'>
			<h1>ADD A BOOK</h1>
			<br/>

			<fieldset>
				<legend id='legend'>New Book:</legend>
				<!--once submit, goes to addBookResponse.php to add to database-->
				<form method="POST" action="addBookResponse.php">
					<p id='bookinfo'> ***Please fill in all information. Thank you!! ***<p>

					<!--Creating fields for all columns in book and book user tables-->
					<span><label for="bookTitle"><strong>Book Title: </strong></label></span>
					<input type="text" name="bookTitle" id="bookTitle" size="25" />
					<br/>
					<br/>
					<label for="author"><strong>Author: </strong></label>
					<input type="text" name="author" id="author" size="25" />
					<br/>
					<br/>
					<label for="isbn"><strong>ISBN: </strong></label>
					<input type="text" name="isbn" id="isbn" size="25" /></span>
					<br/>
					<br/>
	
	
					<label for="classCode"><strong>Class Code: </strong></label>
					<input type="text" name="classCode" id="classCode" size="25" />
	
					<br/>
					<br/>
					
					<label for="price"><strong>Book Price: </strong></label>
					<input type="text" name="price" id="price" size="20" />
	
					<br/>
					</span>
					<br/>
					<label for="price"><strong>Book Description: </strong></label>
					<textarea "textarea" name="description" id="description" size="100" /> </textarea>
	
					<br/>
	
					<br/>
					<label for="bookCondition"><strong>Book Condition: </strong></label>
					<!--choosing from preset options for book condition-->
					<select name="bookCondition" id="bookCondition">
	
						<option value="Blank" checked="checked">Choose...</option>
						<option value = "Mint-Unused">Mint-Unused</option>
						<option value="Like New-Used">Like New-Used</option>
						<option value="Good">Good</option>
						<option value="Used">Used </option>
					</select>

					<br/>
					<br/>
					<input type="submit" name="confirm" id="confirm" value="Confirm" />
				</form>
				<br/>
				<form action="profile.php">
					<input type="submit" name="home" id="home" value="Back to Home">
				</form>
				<br/>
			</fieldset>

		</div>
	</body>
</html>
