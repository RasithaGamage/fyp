<?php 

session_start();
require 'conn.php';

 $oldpw = $_POST["oldPassword"];
 $newpw = $_POST["newPassword"];
 $oldpwn = base64_encode($oldpw);
 $newpwn = base64_encode($newpw);
 $mail = $_SESSION["Email"];




	$result = mysqli_query($con,"SELECT * FROM User_Credentials WHERE EMAIL='" . $mail . "' and PASSWORD = '". $oldpwn."'");



	$count  = mysqli_num_rows($result);

	if($count==0) {
		echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Incorrect Password');
	    window.location.href='../view/setting.php';
	    </script>");

	} else {

		$result2 = mysqli_query($con,"UPDATE User_Credentials SET PASSWORD ='" . $newpwn . "' WHERE EMAIL='" . $mail . "'");
		
		if(mysqli_affected_rows($con)==0) {
		
		echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Update Failed');
	    window.location.href='../view/setting.php';
	    </script>");

			} else {

				echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Updated Sucsessfully! Please login again!');
	    window.location.href='../index.php';
	    </script>");

			}

	}

?>