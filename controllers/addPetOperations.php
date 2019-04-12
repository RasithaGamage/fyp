<?php 

session_start();
require 'conn.php';

 $disease = $_POST["disease3"];
 $petID=$_POST["petId3"];
 $operationDate = $_POST["operationDate"];
 $op_nxt_gen_risk = $_POST["op_nxt_gen_risk"];
 $remarks3 = $_POST["remarks3"];
 $age = $_POST["petAge3"];
 $operationCenter=$_POST["operationCenter"];
 $doc=$_SESSION["Name"];
 $surgery=$_POST["surgery"];
 
 

    $result = mysqli_query($con,"INSERT INTO pet_operations(DOC,PETID,disease,petAge,surgery,operation_date,nxt_gen_risk,remarks,care_center) 
    Values ('$doc','$petID','$disease','$age','$surgery','$operationDate','$op_nxt_gen_risk', '$remarks3','$operationCenter')");

if(mysqli_affected_rows($con)==0) {
    echo "failed";
    

} 
    
header('Location: ../view/DoctorTreatments.php?id='.$petID);

    

?>