<?php 

session_start();
require 'conn.php';

 $pdob = $_POST["pdob"];
 $pname = $_POST["petname"];
 $gender = $_POST["gender"];
 $breed = $_POST["breed"];
 $weight = $_POST["weight"];



 $pid = $_POST["pid"];


	$result = mysqli_query($con,"UPDATE Pets SET  PNAME = '" . $pname . "', PDOB = '" . $pdob . "',GENDER = '" . $gender . "', BREED = '" . $breed . "',WEIGHT = '" . $weight . "'   WHERE PETID='" . $pid . "'");


	if(mysqli_affected_rows($con)==0) {
		echo "<script LANGUAGE='JavaScript'>
	    window.alert('Failed to Update your Pet Details! Try Again!');
	    window.location.href='../view/profile.php?id="; echo $pid;  echo"';
	    </script>";

	} else {

		echo "<script LANGUAGE='JavaScript'>
	    window.alert('Pet Details Updated Sucsessfully');
	    window.location.href='../view/profile.php?id="; echo $pid;  echo"';
	    </script>"; 
	

	}

?>