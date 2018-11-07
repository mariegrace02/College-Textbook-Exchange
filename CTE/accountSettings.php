<!DOCTYPE html>
<!--
The html title
-->
<html lang="en">

<head>
    <title>CTE Account Settings</title>
    <meta charset="utf-8" />
    <meta name="description" content="CTE" />
	<link rel="stylesheet" type="text/css" href="cte.css">


</head>

<body>
<div class="wrapper">
  <h1>ACCOUNT SETTINGS </h1>
  <br/>
  
                <!-- 
	The signup-submit.php
	  -writes the account information to the database as a new user
	  -displays a welcome page
	  -provides a link that takes the user to the home page 
-->

<fieldset>
<legend>My Profile</legend>
<br/>
<br/>
	
       
<span><label for="firstname"><strong>First Name: </strong></label></span>
<input type="text" name="firstname" id="firstname" size="25" />

<span><label for ="phonenumber"><strong>Phone Number: </strong></label></span>
<input type = "text" name = "phonenumber" id = "phonenumber" size = "25">
<br/>
<br/>

<span><label for="lastname"><strong>Last Name: </strong></label></span>
<input type="text" name="lastname" id="lastname" size="25" />

<span><label for ="username"><strong>Username: </strong></label></span>
<input type = "text" name = "username" id = "username" size = "25">
<br/>
<br/>

<span><label for="email"><strong>Email: </strong></label></span>
<input type="text" name="email" id="email" size="25" />
<span><label for ="password"><strong>Password: </strong></label></span>
<input type = "text" name = "password" id = "password" size = "25">
<br/>
<br/>
  
 
</form>

<br/>
<br/>

<form method="POST" action="accountSettings.php">

       
    <input type="submit" name="confirm" id="confirm" value="Confirm Changes" style="float:right"/>
  
 
</form>
</fieldset>
</div>
 </body>
</html>
