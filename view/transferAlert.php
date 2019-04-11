<?php 
// session_start();
//   $auth = $_SESSION["can_log"];
//   if($auth=='Active'){
       
//   }else{
//       header('Location:https://petland.lk/app/Pet_Land/index.php');
//   }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">


</head>
<body>
    
</body>


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script src="../config.js"></script>

<script>
    $(document).ready(function() {
       var uniqe = ParseURLParameter('uniqe');
       var pet = ParseURLParameter('pet');
       var user = ParseURLParameter('user');
       console.log("user "+user);
       $.getJSON(notiURL + "_ByUniqueID/"+uniqe+","+user , function (data) {
       });
       
      swal("The Pet Was Successfully Added into your Account!", "Pet Request Accepted!", "success");
      setInterval(myTimer, 2000);
      
    });
    
    function myTimer(){
        window.location = 'https://petland.lk/app/Pet_Land/view/dashboard.php';
    }
    
        function ParseURLParameter(Parameter){
        var fullUrl = window.location.search.substring(1);
        var parametersArray = fullUrl.split('&');
        for(i=0;i<parametersArray.length;i++){
            var currentParameter = parametersArray[i].split('=');
            if(currentParameter[0]==Parameter){
                return currentParameter[1];
            }
        }
    }
</script>
<!-- page script -->


</script>

</body>
</html>
