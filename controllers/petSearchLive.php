<?php

require 'conn.php';
//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  
  $result = mysqli_query($con,"SELECT * FROM Pets WHERE PETID LIKE '$q%'");

    while($row = $result->fetch_assoc()) {

        $hint = $row["PETID"];

      }

}


// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>