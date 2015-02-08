<?php

// check if POST or GET

$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

switch ($method) {
  case 'POST':
    // if the command is POST then encode the command into a json string
    $jsonstring = json_encode($_POST);
    
    // create the startstring and the endstring based on POST
    
    $startstring = '{"Type":"POST","parameters":';
    $endstring ='}';
    break;
  case 'GET': 
    $jasonstring = json_encode($_GET);
    
    // create the startstring and the endstring based on GET
   
    $startstring = '{"Type":"GET","parameters":';
    $endstring ='}';
    break;
  default:
    // if the command is not a POST or GET print error 
    
    echo "Sorry, that command type is not recognized.  Please use POST or GET.";
    exit();  
}

// now replace the "" in the $jsonstring with "undefined"

$replacedstring = str_replace('""', '"undefined"', $jasonstring);

// print out the final formatted string
// for example, if you enter in to the web browser the following url:
// http://localhost/assignment4-part1/src/loopback.php/?name&dog=pug&cat=siamese
//
// you get the following JSON formatted output string:
// {"Type":"GET","parameters":{"name":"undefined","dog":"pug","cat":"siamese"}}

echo $startstring, $replacedstring, $endstring;  
 
?>