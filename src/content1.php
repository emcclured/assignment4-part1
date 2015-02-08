<?php
   $count = 0;
   // test the input security
   $inputname = security_check($_POST["username"]); 	

   // check cookie for count
	  
		if(!isset($_COOKIE[$inputname])) {
 		 	$count = 0;
 		 	setcookie($inputname, $count, time()+3600, '/');
		} else {
  			$count = $_COOKIE[$inputname] + 1;
                        setcookie($inputname, $count, time()+3600, '/');
		} 
   	

   echo '<h2>This is content1.php</h2>';
   echo "<br>";

	// test to see if checkMainLogin is set	
	// if not, return back to the login page
	
	$check = $_POST['checkMainLogin'];
	
   if ($check!=1) {
   	echo '<a href="login.php">Click Here to return to the login screen</a>';
   }	else {
      process_username($count);     
   }

function process_username($count){
   // test the input security
   $inputname = security_check($_POST["username"]);
   
   if ($inputname!="") {
   	echo "<h2>Hello ";
   	echo $inputname;
   	echo " You have visited this page ";
   	echo $count;
   	echo  " times before.</h2>";
   	echo "<br>";
   	
   	echo '<a href="login.php"> Click Here to log out.</a>';
      echo "<br>";
   	echo "<br>";
      echo '<a href="content2.php?checkMainLogin=1">Click Here to goto content2.php</a>'; 
   } else {
      echo "<p>A username must be entered.</p>";
      echo '<a href="login.php">Click Here to return to the login screen.</a>';
   }
   
}
 
// security check to make sure input is not a runnable script or url link
function security_check($inputdata) {
   $data = trim($inputdata);
   $data = stripslashes($inputdata);
   $data = htmlspecialchars($inputdata);
   return $inputdata;
}

?>
