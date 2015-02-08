<html>
<head>
</head>
<body>

<?php

// format of url should be:
//  http://your_website_address/multtable.php?min-multiplicand=1&max-multiplicand=10&min-multiplier=1&max-multiplier=10

// print out the values passed into the url

echo "<p>min-multiplicand " . $_GET["min-multiplicand"] . "</p>";
	 
echo "<p>max-multiplicand " . $_GET["max-multiplicand"]  . "</p>";

echo "<p>min-multiplier " . $_GET["min-multiplier"] . "</p>";
	 
echo "<p>max-multiplier " . $_GET["max-multiplier"]  . "</p>";

// assign the values passed in to local variables

$minmultiplicand = $_GET["min-multiplicand"];
$maxmultiplicand = $_GET["max-multiplicand"];
$minmultiplier = $_GET["min-multiplier"];
$maxmultiplier = $_GET["max-multiplier"];

// make sure the inputs are valid, if not the inform the user

// check to see if there are 4 inputs

$are_all_fields_filled_in = true;

if (empty($_GET["min-multiplicand"]) == true) {
   echo "<h2>Minimum multiplicand is not a parameter.</h2>";
	$are_all_fields_filled_in = false;
}

if (empty($_GET["max-multiplicand"]) == true) {
   echo "<h2>Maximum multiplicand is not a parameter.</h2>";
	$are_all_fields_filled_in = false;
}

if (empty($_GET["min-multiplier"]) == true) {
   echo "<h2>Minimum multiplier is not a parameter.</h2>";
	$are_all_fields_filled_in = false;
}

if (empty($_GET["max-multiplier"]) == true) {
   echo "<h2>Maximum multiplier is not a parameter.</h2>";
	$are_all_fields_filled_in = false;
}

if ($are_all_fields_filled_in == false) {
	exit();
}

// check for valid integers

$are_all_numbers_integers = true;

// function intval takes in a string and tries to convert it to an integer
// it will return an integer number or 0 if it can't
// we have to do this because GET inputs are strings

if (intval($minmultiplicand) == 0) {
   echo "<h2>Minimum multiplicand is not an integer.</h2>";
	$are_all_numbers_integers = false;
}

if (intval($maxmultiplicand) == 0) {
   echo "<h2>Maximum multiplicand is not an integer.</h2>";
	$are_all_numbers_integers = false;
}

if (intval($minmultiplier) == 0) {
   echo "<h2>Minimum multiplier is not an integer.</h2>";
	$are_all_numbers_integers = false;
}

if (intval($maxmultiplier) == 0) {
   echo "<h2>Maximum multiplier is not an integer.</h2>";
   $are_all_numbers_integers = false;
}

if ($are_all_numbers_integers == false) {
   exit();
}

// check for min values are actually less than max values

if ($minmultiplicand>$maxmultiplicand) {
   echo "<h2>Minimum multiplicand is greater than Maximum multiplicand.</h2>";
   exit();
}

if ($minmultiplier>$maxmultiplier) {
   echo "<h2>Minimum multiplier is greater than Maximum multiplier.</h2>";
   exit();
}

// now build the table and display the results

echo '<table width="1000" border="2">';
echo '<tr>';
echo '<th>';
echo '</th>';
	
// print out the x axis
	
for ($x = $minmultiplicand; $x <= $maxmultiplicand; $x++) { 		
    echo '<th>'.$x.'</th>'; 
}
	
echo "</tr>";

// print out the y axis

for ($y = $minmultiplier; $y <= $maxmultiplier; $y++) {
	 echo '<tr><th>'.$y.'</th>';
     
    // print out the multiplication row   
     
    for ($z = $minmultiplicand; $z <= $maxmultiplicand; $z++) {
        $result = $y * $z;    	  
    	  
        echo '<td>'.($result).'</td>';
	 }
	 
    echo "</tr>";
}

echo '</table>';

?>

</body>
</html>
