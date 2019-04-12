<?php 

session_start();
require 'conn.php';

 $symptoms = $_POST["symptoms"];
 $disease = $_POST["disease"];
 $petID=$_POST["petId2"];
 $treatedDate = $_POST["treatedDate"];
 $nxt_treatments = $_POST["nxt_treatments"];
 $remarks2 = $_POST["remarks2"];
 $age = $_POST["petAge2"];
 $treatcareCenter=$_POST["treatcareCenter"];
 $doc=$_SESSION["Name"];
 $nxtTreatDate=$_POST["nxtTreatDate"];
 $comment2=$_POST["comment2"];
 
 

    $result = mysqli_query($con,"INSERT INTO pet_treatments(DOC,PETID,symptoms,disease,petAge,treated_date,care_center,nxt_gen_risk,remarks,nxt_treatment_date, comment) 
    Values ('$doc','$petID','$symptoms','$disease','$age','$treatedDate','$treatcareCenter','$nxt_treatments', '$remarks2','$nxtTreatDate','$comment2')");

if(mysqli_affected_rows($con)==0) {
    echo "failed";
    

} 
    
header('Location: ../view/DoctorTreatments.php?id='.$petID);

    

?>