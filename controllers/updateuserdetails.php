<?php 

session_start();
require 'conn.php';

 $dob = $_POST["dob"];
 $name = $_POST["name"];
 $mob = $_POST["mobileNo"];
 $home = $_POST["homeNO"];



 $uid = $_SESSION["Uid"];


 	if($_FILES["file"]["error"] == 4) {
 		echo "no file selected";
	}



	$result = mysqli_query($con,"UPDATE User SET  DOB = '" . $uid . "', MOBNO = '" . $mob . "', HOMENO = '" . $home . "',DOB = '" . $dob . "'   WHERE UID='" . $uid . "'");

	$result = mysqli_query($con,"UPDATE User_Credentials SET  NAME = '" . $name . "' WHERE CID='" . $uid . "'");


	if(mysqli_affected_rows($con)==0) {
		echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Failed to Update your data! Try Again!');
	    window.location.href='../view/setting.php';
	    </script>");

	} else {

		echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Details Updated Sucsessfully');
	    window.location.href='../view/setting.php';
	    </script>");
		$_SESSION["Name"] =  $name;   
	

	}

?>