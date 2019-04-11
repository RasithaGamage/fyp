<?php

//require 'conn.php';


$petid = $_POST["idpet"];

//echo $petid;



echo "<script LANGUAGE='JavaScript'>
    window.location.href='../view/DoctorTreatments.php?id=".$petid."';
    </script>";



/*$result = mysqli_query($con,"SELECT * FROM Pets A,Pet_Vaccinations B WHERE A.PETID='".$q."'");

    while ($row = $result->fetch_assoc()) {


        $petname = $row["PNAME"];
        $BREED = $row["BREED"];

    }*/




?>

