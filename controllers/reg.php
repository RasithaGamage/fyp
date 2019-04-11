	<?php 

	require 'conn.php';

	 $username = $_POST["mobile"];
	 $email = $_POST["mail"];
	 $password1 = $_POST["password"];
	 $password = base64_encode($password1);


	 //INSERT INTO User_Credentials(EMAIL, PASSWORD, NAME, TYPE, STATUS) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])



		$result = mysqli_query($con,"INSERT INTO User_Credentials (EMAIL, PASSWORD, NAME, TYPE, STATUS) 
			VALUES ('" . $email . "','" . $password . "','" . $username . "','USR','V')");

		if ($result) {

			echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Registration Sucsessfull! Please check your Mail Box to verify your account');
	    window.location.href='../index.php';
	    </script>");
			

		} else {
			
			echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Registration Failed! ');
	    window.location.href='../Registration.php';
	    </script>");
			
		}

	?>