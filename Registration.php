<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Petland</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
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
    <style>
        #petCard{
            display: none;
        }
    </style>
</head>
<body class="hold-transition login-page" style="background: #3b4148;">
<div class="login-box">
    <div class="login-logo">

    </div>
    <!-- Registration -->
    <form id="nextFrom" action="controllers/reg.php"name="nextFrom" method="post">
        <div class="card" style="background:#2c3338;" id="signupCard">
            <div class="card-body login-card-body"
                 style="border-radius: 10px; padding: 30px ; box-shadow: 0px 0px 10px 0px">

                <div class="text-center" style="padding-bottom: 10px">
                    <img class="profile-user-img img-fluid img-circle" id="imageid"
                         src="dist/img/log_img.jpg"
                         alt="User profile picture">
                    <P class="text-center " style="color: #606468"><b>Welcome! Sign Up And Become A Member</b></P>
                </div>

                <div class="form-group has-feedback" style="padding-bottom: 10px">
                    <input type="text" class="form-control" placeholder="Name" name="mobile" id="mobile" 
                           style="border-radius: 20px;background:#2c3338; color: white">
                </div>
                <div class="form-group has-feedback" style="padding-bottom: 10px">
                    <input type="text" class="form-control" placeholder="Email" name="mail" id="mail" oninput="validateEmail(this.value)"
                           style="border-radius: 20px;background:#2c3338; color: white">
                </div>
                <div class="form-group has-feedback" style="padding-bottom: 10px">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                           style="border-radius: 20px;background:#2c3338; color: white">
                    <input type="hidden" name="">
                </div>
                <div class="form-group has-feedback" style="padding-bottom: 10px">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password" id="reTypePassword"
                           style="border-radius: 20px;background:#2c3338; color: white">
                    <input type="hidden" name="">
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" name="btn_next" id="btn_next" class="btn btn-primary btn-block btn-flat"
                                style="border-radius: 20px">Sign Up
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="text-lg-center" style="padding-top: 10px">

                    <p class="mb-1">
                        <a href="index.php" style="text-decoration: none;color: #606468;" id="mylogin"><strong>Have an Account ?</strong></a>
                    </p>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </form>

        <!-- Pet Register -->
        <div class="card" style="background:#2c3338;" id="petCard">


            <div class="card-body login-card-body"
                 style="border-radius: 10px; padding: 30px ; box-shadow: 0px 0px 10px 0px">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <i id="btn-back" class="far fa-arrow-alt-circle-left fa-2x" style="color: #3c8dbc"></i>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center" style="padding-bottom: 10px">
                            <img class="profile-user-img img-fluid img-circle"
                                 src='dist/img/user4-128x128.jpg'
                                 alt="User profile picture">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center" style="padding-bottom: 10px">
                            <img class="profile-user-img img-fluid img-circle"
                                 src='dist/img/cat-128x128.jpg'
                                 alt="User profile picture">

                        </div>
                    </div>

                </div>
                <P class="text-center " style="color: #606468"><b>You Have Got A Pet ? Right!</b></P>
                <div class="form-group has-feedback" style="padding-bottom: 10px">
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name"
                           style="border-radius: 20px;background:#2c3338; color: white">
                </div>
                <div class="form-group has-feedback" style="padding-bottom: 10px">
                        <div class="input-group">
                            <input type="text" class="form-control" id="dates"
                                   data-inputmask="'alias': 'dd/mm/yyyy'" data-mask
                                   placeholder="Date Of Birth" style="border-radius: 20px;background:#2c3338; color: white">
                        </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="button" name="btn_signup" class="btn btn-primary btn-block btn-flat" id="btn_signup"
                                style="border-radius: 20px">Sign Up
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </form>
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
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="controllers/registration.js"></script>
<script src="config.js"> </script>

<script>
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(email)) {
        document.getElementById("mail").style.borderColor = '#C8C4C3';
        document.getElementById("btn_next").disabled = false;

    } else {
        document.getElementById("mail").style.borderColor = '#e52213';
        document.getElementById("btn_next").disabled = true;
    }
}

function validateTel(Tel) {
    var re = /^\d{10}$/;
    if (re.test(Tel)) {
        document.getElementById("mobile").style.borderColor = '#C8C4C3';
        document.getElementById("btn_next").disabled = false;
    } else {
        document.getElementById("mobile").style.borderColor = '#e52213';
        document.getElementById("btn_next").disabled = true;
    }
}
    $('#btn-next').on('click',function () {
        $('#petCard').show();
        $('#signupCard').hide();
    })
    $('#btn-back').on('click',function () {
        $('#signupCard').show();
        $('#petCard').hide();
    })
    $(function () {
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

    })
</script>
</body>
</html>
