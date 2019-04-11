<?php 
session_start();
require 'conn.php';

 $category = $_POST["category"];
 $petName = $_POST["petName"];
 $dobPet = $_POST["dobPet"];
 $gender = $_POST["gender"];
 $breed = $_POST["breed"];
 $weight = $_POST["inputweight"];
 
 $uid = $_SESSION["Uid"];

 //echo $category." ".$petName." ". $dobPet. " ". $gender ." ".  $breed ." ". $gender." ".  $uid ;

$result = mysqli_query($con,"SELECT LATESTNO FROM Pets ORDER BY LATESTNO DESC LIMIT 1");

while($row = $result->fetch_assoc()) {

        $latest = $row["LATESTNO"];
        
    	}

$latestno = ++$latest;
$latest = str_pad($latestno , 4, '0', STR_PAD_LEFT);    	


 if($category == "Dog"){

 	$latest = "D".$latest;

 } else if($category == "Cat"){

 	$latest = "C".$latest;
 }

$result = mysqli_query($con,"INSERT INTO User_Pet (USERID, PETID, TYPE) 
			VALUES ('" . $uid . "','" . $latest . "','" . $category . "')");

		if ($result) { 

			$result2 = mysqli_query($con,"INSERT INTO Pets (PETID, CATEGORY, PNAME, WEIGHT, BREED, PDOB, GENDER, LATESTNO) 
			VALUES ('" . $latest . "','" . $category . "','" . $petName . "','" . $weight . "','" . $breed . "','" . $dobPet . "','" . $gender . "','" . $latestno . "')");

			if ($result2) {

				echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Pet Created Sucsessfull!');
	    window.location.href='../view/settings.php';
	    </script>");

			}


		} else {

			echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Pet Creation Failed! Please Try Again!  ');
	    window.location.href='../setting.php';
	    </script>");
		}



?>