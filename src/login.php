<!DOCTYPE HTML>
<html>
<head>
</head>
<body> 

<?php
// global variables

// define username and usernameErr variables and set to empty values
$usernameErr = "";
$username = "";

// define checkMainLogin variable to check in content1.php and content2.php
// to keep them from being directly accessed
$checkMainLogin = 0;
?>

<?php
echo "<h1>Login</h1>";
echo "<p>Please enter in a username in the text box and then </p>";
echo "<p>press the Login button.</p>";
echo "<br>";
?>

<!-- html code to display user input field and Login button -->

<form method="post" action="content1.php">
   username: <input type="text" name="username">
   <input type="hidden" name="checkMainLogin" value="1">
   <br><br>
   <input type="submit" name="submit" value="Login">
</form>

</body>
</html>