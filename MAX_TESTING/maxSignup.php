<!DOCTYPE html>

<html lang="en">
<!--
The html title
-->
<head>
    <title>CTE SIGN UP</title>
    <meta charset="utf-8" />
    <meta name="description" content="CTE" />
	<link rel="stylesheet" type="text/css" href="cte.css">
	<link rel="icon" href="book.jpg" >
	


</head>
<!--
The div to be able to place our contents with respect to the CSS code
-->

<div class='wrapper'>
<body>

  <h1>WELCOME TO CTE </h1>
  <br/>
  
                <!-- 
	The signup-submit.php
	  -writes the account information to the database as a new user
	  -displays a welcome page
	  -provides a link that takes the user to the home page 
-->

<form method="POST" action="maxDemoResponse.php">

  <fieldset>
    <legend id='legend'>New User Signup:</legend>
	<p id='info'> ***Please fill in all information. Thank you!! <p>
	<br/>
	
    <span><label for="firstname"><strong>First Name: </strong></label></span>
    <input type="text" name="firstname" id="firstname" size="25" />
    
	<span>
	<span><label for="lastname"><strong>Last Name: </strong></label></span>
    <input type="text" name="lastname" id="lastname" size="25" /></span>
    <br/>
    <br/>
	
	
	<label for="email"><strong>Email: </strong></label>
    <input type="text" name="email" id="email" size="25" />
	<span>
	<label for="phonenumber"><strong> Phone Number: </strong></label>
   	 <input type="text" name="phonenumber" id="phonenumber" size="25" />

	</span>
    <br/>
	<br/>
	<label for="idnumber"><strong>ID Number: </strong></label>
    <input type="text" name="idnumber" id="idnumber" size="25" />
    
	<br/>
    <br/>
	<label for="username"><strong>Username: </strong></label>
    	<input type="text" name="username" id="username" size="25" />
	<span>
	<label for ="password"><strong> Password:</label>
    <input type ="password" name="password" id="password" size="30" />
	</span>
    <br/>
    <br/>
	
		
	<label for ="passwordagain"><strong> Confirm Password:</label>
    <input type ="password" name="passwordagain" id="passwordagain" size="30" />
    <br/>
    <br/>
	
       
    <input type="submit" name="signup" id="signup" value="Sign Up" />
  </fieldset>
</form>
</div>
 </body>
</html>
