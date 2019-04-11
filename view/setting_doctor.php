<?php 
session_start();
  $auth = $_SESSION["can_log"];
  if($auth=='Active'){
       
  }else{
      header('Location:https://petland.lk/app/Pet_Land/index.php');
  }
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php include '../common/navbar.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <?php include '../common/sidebar.php'; ?>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Doctor Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src='../dist/img/log_img.jpg'
                                         alt="User profile picture">
                                </div>
                                <form>
                                <h3 class="profile-username text-center" id="doctor-name"></h3>
                                <p class="text-muted text-center" id="doctor-email"></p>

                                
                                <ul class="list-group list-group-unbordered mb-3">
                                    
                                    <li class="list-group-item">
                                        <b>VA Reg. No.</b> <a class="float-right" id="va_no"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mobile No.</b> <a class="float-right" id="doctor-mobile"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NIC No.</b> <a class="float-right" id="doctor-nicNo"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Address</b> <a class="float-right" id="doctorAddress"></a>
                                    </li>
                                    <li class="list-group-item" style="display: flex">
                                        <b>Bio</b> &nbsp;&nbsp;&nbsp;&nbsp;<a class="float-right" id="doctor-bio"></a>
                                    </li>
                                    <!--<li class="list-group-item">
                                        <b>Rank</b> <a class="float-right" id="doctor-rank"></a>
                                    </li>-->
                                </ul>
                                </form>

                                <a href="#" class="btn btn-primary btn-block"><b>Leaderboard</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <!--<div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                          </div>

                          <div class="card-body">
                            <strong><i class="fa fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                              B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fa fa-pencil mr-1"></i> Skills</strong>

                            <p class="text-muted">
                              <span class="tag tag-danger">UI Design</span>
                              <span class="tag tag-success">Coding</span>
                              <span class="tag tag-info">Javascript</span>
                              <span class="tag tag-warning">PHP</span>
                              <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                          </div>

                        </div>-->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#userSettings"
                                                            data-toggle="tab">Doctor</a></li>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change
                                            Password</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#createPet" data-toggle="tab">Create
                                            New Pet</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="userSettings">
                                        <form class="form-horizontal" id="doctorform" method="post" autocomplete="on">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Name</label>

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputemail" class="col-sm-2 control-label">Email </label>

                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="inputemail" name="inputemail" disabled
                                                           placeholder="@gmail.com">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobileNo" class="col-sm-2 control-label">VA Reg.No</label>

                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="regNo" name="regNo"
                                                           placeholder="#123343">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="mobileNo" class="col-sm-2 control-label">NIC No</label>

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nic" name="nic" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputdate" class="col-sm-2 control-label">Date of
                                                    Birth</label>

                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="dob" name="dob"
                                                              
                                                               placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobileNo" class="col-sm-2 control-label">Mobile
                                                    No. </label>

                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="mobileNo" name="mobileNo"
                                                           >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="address" name="address"
                                                              rows="3"
                                                              placeholder="Enter ..."></textarea>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Bio</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="bio" name="bio"
                                                              rows="3"
                                                              placeholder="Enter ..."></textarea>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" id="savedoctor" class="btn btn-success">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="password">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="oldPassword" class="col-sm-3 control-label">Old
                                                    Password</label>

                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="oldPassword"
                                                    >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="newPassword" class="col-sm-3 control-label">New
                                                    Password </label>

                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="newPassword"
                                                    >
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="confirmPassword" class="col-sm-3 control-label">Confirm
                                                    Password</label>

                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="confirmPassword"
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" class="btn btn-success" id="changePasswordBtn">Change Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="createPet">
                                        <form class="form-horizontal" id="petForm">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Pet Category</label>
                                                    <select class="form-control" name="category" id="category" onChange="breedChange(this.value)">
                                                        <option value="Dog">Dog</option>
                                                        <option value="Cat">Cat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <label for="petName" class="col-sm-2 control-label">Pet Name</label>

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="petName" name="petName"
                                                           placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile" class="col-sm-2 control-label">Add Pet
                                                    Image</label>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input"
                                                                   id="file">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputdate" class="col-sm-2 control-label">Date of
                                                    Birth</label>

                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" id="dobPet"
                                                               data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Breed</label>
                                                    <div id="clearBreed">
                                                    <select class="form-control" name="breed" id="breed">
                                                       <!--<option>jsdcyhb</option>-->
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputweight" class="col-sm-2 control-label">Weight
                                                    -lbs </label>

                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="inputweight"
                                                           placeholder="? lbs">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" class="btn btn-success" id="savePet">Create Pet
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '../common/footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script src="../controllers/all.js"></script>

<script src="../controllers/pet.js"></script>
<script src="../controllers/doctor.js"></script>
<script src="../controllers/breed.js"></script>
<!--<script src="../config.js"></script>-->


<!-- page script -->
<script>
function breedChange(value){
      
       $("#clearBreed").empty();
       $("#clearBreed").append('<select class="form-control" name="breed" id="breed"></select>');
       var breed = document.getElementById("breed");
       $.getJSON(breedURL , function (data) {
          
             for(i=0;i<data.length;i++){
                 if(value==='Dog' && data[i]['type']==='Dog'){
                      breed.options[i] = new Option(data[i]['name'], data[i]['name']);
                 }
                 if(value==='Cat' && data[i]['type']==='Cat'){
                      breed.options[i] = new Option(data[i]['name'], data[i]['name']);
                 }
             }
             
       });
}
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        // $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        // //Datemask2 mm/dd/yyyy
        // $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        // $('[data-mask]').inputmask();

        //Date range picker
        // $('#reservation').daterangepicker();
        //Date range picker with time picker
        // $('#reservationtime').daterangepicker({
        //     timePicker: true,
        //     timePickerIncrement: 30,
        //     format: 'MM/DD/YYYY h:mm A'
        // })
        //Date range as a button
        // $('#daterange-btn').daterangepicker(
            // {
            //     ranges: {
            //         'Today': [moment(), moment()],
            //         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            //         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //         'This Month': [moment().startOf('month'), moment().endOf('month')],
            //         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            //     },
            //     startDate: moment().subtract(29, 'days'),
            //     endDate: moment()
            // },
        //     function (start, end) {
        //         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        //     }
        // )

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        // $('.my-colorpicker1').colorpicker()
        // //color picker with addon
        // $('.my-colorpicker2').colorpicker()

        //Timepicker
        // $('.timepicker').timepicker({
        //     showInputs: false
        // })
    })
</script>

</body>
</html>
