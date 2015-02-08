<?php
   echo '<h2>This is content2.php</h2>';
   echo "<br>";

	// test to see if checkMainLogin is set
	// if not, return back to the login page
			
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$check = $_POST['checkMainLogin'];
	} else {
		$check = $_GET['checkMainLogin'];
	}

   if ($check!=1) {
   	echo '<a href="login.php">Click Here to return to the login screen.</a>';
   }	else {
      echo "<br>";
      echo '<a href="content1.php">Click Here to goto content1.php</a>';
      echo "<br>";
      echo '<a href="login.php">Click Here to return to the login screen.</a>';
   }
?>