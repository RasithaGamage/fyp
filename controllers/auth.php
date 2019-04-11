<?php 

require 'conn.php';

 $username = $_POST["name"];
 $password = $_POST["password"];
 $password = base64_encode($password);


	$result = mysqli_query($con,"SELECT * FROM User_Credentials WHERE EMAIL='" . $username . "' and PASSWORD = '". $password."'");

	$count  = mysqli_num_rows($result);

	if($count==0) {
		$message = "Invalid Username or Password!";
		echo $message;

	} else {

		session_start();

		while($row = $result->fetch_assoc()) {

        $_SESSION["Name"] = $row["NAME"];
        $uid = $_SESSION["Uid"] = $row["CID"];
        $_SESSION["Email"] = $row["EMAIL"];
        $_SESSION["UserType"] = $row["TYPE"];
        $_SESSION["Status"] = $row["STATUS"];

    	}

    	//echo "User";
			$result2 = mysqli_query($con,"SELECT A.PETID,B.PNAME FROM User_Pet A  LEFT JOIN Pets B 
		ON A.PETID = B.PETID WHERE USERID='".$uid ."'");
		$rowcount = mysqli_num_rows($result2);
		$_SESSION["PetCount"] =$rowcount;
		$petarray =array();
		$j=0;


		while($row = $result2->fetch_assoc()) {

			$pname =$row["PNAME"];
			$pid =$row["PETID"];

			
			$petarray[$j] = array("name" => $pname, "id" => $pid);
			
			
			$j++;
		}

		$_SESSION["PetDataArray"] =$petarray;

    	

		
		if($_SESSION["UserType"]=="DOC" && $_SESSION["Status"]=="A"){
			//echo "doc";
			echo "<script> window.location = '../view/dashboard.php'; </script>";





		} else if($_SESSION["UserType"]=="USR" && $_SESSION["Status"]=="A"){


			
			echo "<script> window.location = '../view/dashboard.php'; </script>";
			
		}else if($_SESSION["UserType"]=="ADM" && $_SESSION["Status"]=="A"){
			echo "Admin";

		}
	}

?>