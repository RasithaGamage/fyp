<?php 

session_start();
require 'conn.php';

 $vaccination = $_POST["vaccination"];
 $vaccDate = $_POST["vaccDate"];
 $petID=$_POST["petId"];
 $remarks1 = $_POST["remarks"];
 $nxtDate = $_POST["nxtDate"];
 $comment = $_POST["comment"];
 $age = $_POST["petAge"];
 $doc=$_SESSION["Name"];
 



    $result = mysqli_query($con,"INSERT INTO pet_vaccinations(VACNAME,PETID,VACDATE,AGE,DOC,CENTRE,REMARK,NXTVACDATE,COMMENT) 
    Values ('$vaccination','$petID','$vaccDate','$age','$doc','Colombo','$remarks1', '$nxtDate','$comment')");

if(mysqli_affected_rows($con)==0) {
    echo "failed";
    

} 
    
header('Location: ../view/DoctorTreatments.php?id='.$petID);

    

?>