<?php 

session_start();
require 'conn.php';

 $trName = $_POST["trName"];
 $petID=$_POST["petId4"];
 $remarks4 = $_POST["remarks4"];
 $age = $_POST["petAge4"];
 $trDate = $_POST["trDate"];
 $trType = $_POST["trType"];
 
 $trCenter=$_POST["trCenter"];
 $doc=$_SESSION["Name"];
 
 

    $result = mysqli_query($con,"INSERT INTO pet_trainings(DOC,PETID,petAge,trName,trType,TrDate,remarks,care_center) 
    Values ('$doc','$petID','$age','$trName','$trType','$trDate', '$remarks4','$trCenter')");

if(mysqli_affected_rows($con)==0) {
    echo "failed";
    

} 
    
header('Location: ../view/DoctorTreatments.php?id='.$petID);

    

?>