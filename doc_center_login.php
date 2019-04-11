<?php
session_start();
  $auth = $_SESSION["can_log"];
  if($auth=='Active'){
    //   header('Location:https://petland.lk/app/Pet_Land/view/dashboard.php');
  }else{
      header('Location:https://petland.lk/app/Pet_Land/index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Petland</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>
<body class="hold-transition login-page" style="background: #3b4148;">
<div class="login-box">
    <div class="login-logo">

    </div>
    <!-- /.login-logo -->
    <div class="card" style="background:#2c3338;" id="loginCard">
        <div class="card-body login-card-body"
             style="border-radius: 10px; padding: 30px ; box-shadow: 0px 0px 10px 0px">

            <div class="text-center" style="padding-bottom: 10px">
                <img class="profile-user-img img-fluid img-circle"
                     src="dist/img/log_img.jpg"
                     alt="User profile picture">
                <P class="text-center " style="color: #606468"><b>Hi! Dr.Sampath</b></P>
            </div>
            <form method="post" id="loginFrom">
                <div class="form-group has-feedback" style="padding-bottom: 10px">
                    
                    <label style="color: #606468">Select Your Pet Care Center</label>
                                                    <select class="form-control" name="category" id="category">
                                                        <option></option>
                                                        <!--<option>Rover - Rajagiriya</option>-->
                                                        <!--<option>PetVet Clinic - Ganemulla</option>-->
                                                    </select>
                </div>
                
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="button" name="btn_login" class="btn btn-primary btn-block btn-flat" id="btn_login2"
                                style="border-radius: 20px">Get Me In
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    <div class="text-lg-left" style="padding-top: 10px">

        <p class="mb-1">
            <strong style="color: #606468"> &copy; 2018 Petland&nbsp;&nbsp;Version 1.0</strong>
        </p>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="controllers/login.js"></script>
<script src="config.js"> </script>
<script src="http://crypto-
     js.googlecode.com/svn/tags/3.0.2/build/rollups/hmac-sha256.js">
</script>;
<script src="http://crypto-
     js.googlecode.com/svn/tags/3.0.2/build/components/enc-base64-min.js">
</script>;
<script  src="controllers/care_center.js"> </script>
<script>
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(email)) {
        document.getElementById("name").style.borderColor = '#C8C4C3';
        document.getElementById("btn_login").disabled = false;

    } else {
        document.getElementById("name").style.borderColor = '#e52213';
        document.getElementById("btn_login").disabled = true;
    }
}
    $("#mylogin").on('click', function () {
        $('#loginCard').css('display', 'none');
        $('#dontHaveAccount').css('display', 'none');
        $('#myForgetBox').css('display', 'block');

    });
    $("#backto").on('click', function () {
        $('#myForgetBox').css('display', 'none')
        $('#loginCard').css('display', 'block');
        $('#dontHaveAccount').css('display', 'block');
    });
</script>
</body>
</html>
