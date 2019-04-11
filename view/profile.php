<?php 
session_start();
require '../controllers/conn.php';

$pid = $_GET['id'];  


$result = mysqli_query($con,"SELECT * FROM Pets WHERE PETID='".$pid."'");

while($row = $result->fetch_assoc()) {
    $PName = $row["PNAME"];
    $pdob = $row["PDOB"];
    $gender =  $row["GENDER"];
    $weigh = $row["WEIGHT"];
    $breed = $row["BREED"];
}


$today = date("Y-m-d");

$date1=date_create($pdob);
$date2=date_create($today);

$diff=date_diff($date1,$date2);
 

$age = $diff->format('%d days');
// check gender
$gender_icon;

 if ($gender == "M") {
     $gender_icon = "<i class='fa fa-mars' style='color:#17a2b8;'></i>";
 } else {
     $gender_icon = "<i class='fa fa-venus' style='color:#c8237e;'></i>";
 }

?>


<!DOCTYPE html>
<?php


// check gender


// if ($gender == "M") {
//     $gender_icon = "<i class='fa fa-mars' style='color:#17a2b8;'></i>";
// } else {
//     $gender_icon = "<i class='fa fa-venus' style='color:#c8237e;'></i>";
// }


?>
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
    <script src="../plugins/jquery/jquery.min.js"></script>

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
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pet Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center" id="text-center1">
                                    <img class="profile-user-img img-fluid img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center" id="nameLbl"><?php echo $PName; ?> <?php echo $gender_icon; ?></h3>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Age</b> <a class="float-right" id="ageLbl"><?php echo $age; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of Birth</b> <a class="float-right" id="dobLbl"> <?php echo $pdob; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Breed</b> <a class="float-right" id="breedLbl"><?php echo $breed; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Weight</b> <a class="float-right" id="weghtLbl"><?php echo $weigh; ?></a>
                                    </li>
                                </ul>

                                <button class="btn btn-primary btn-block" id="mediBtn"><b><a style="color:white; "href="medibook.php?id=<?php echo $pid; ?>">Medi Book</a></b></button>
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
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <!--<li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Lifeline</a>
                                    </li>-->
                                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a>
                                    </li>
                                   
                                    <li class="nav-item"><a class="nav-link" href="#transferpet" data-toggle="tab">Transfer
                                            Pet</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">


                                    <!-- /.tab-pane -->
                                    <div class="tab-pane " id="timeline">
                                        <form>
                                        <!-- The timeline -->
                                        <ul class="timeline timeline-inverse" id="timeLife">
                                          
                                            
                                            
                                            
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                          <!--                  <li class="time-label">-->
                          <!--<span class="bg-success">-->
                          <!--  3 Jan. 2014-->
                          <!--</span>-->
                          <!--                  </li>-->
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                          <!--                  <li>-->
                          <!--                      <i class="fa fa-medkit bg-warning"></i>-->

                          <!--                      <div class="timeline-item">-->
                          <!--                          <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>-->

                          <!--                          <h3 class="timeline-header"><a href="#" id="name2Lbl"> </a> got vaccination-->
                          <!--                              for Distemper Hepatitis (CAV-2) </h3>-->
                          <!--                      </div>-->
                          <!--                  </li>-->
                                            <!-- END timeline item -->
                          <!--                  <li class="time-label">-->
                          <!--<span class="bg-success">-->
                          <!--  10 Jan. 2017-->
                          <!--</span>-->
                          <!--                  </li>-->
                          <!--                  <li>-->
                          <!--                      <i class="fa fa-birthday-cake bg-gray"></i>-->
                          <!--                      <div class="timeline-item">-->
                          <!--                          <span class="time"><i-->
                          <!--                                      class="fa fa-clock-o"></i> 1 Year 3 Months</span>-->

                          <!--                          <h3 class="timeline-header no-border"><a href="#" id="name3Lbl">  </a> born-->
                          <!--                          </h3>-->
                          <!--                      </div>-->
                          <!--                  </li>-->
                                        </ul>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <!-- setting tab -->
                                    <div class="tab-pane active" id="settings">
                                        <form class="form-horizontal" method="POST" action="../controllers/updatepetdetails.php">
                                          
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Pet Name</label>

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="petname" name="petname"
                                                           placeholder="Pet Name" value="<?php echo $PName; ?>">
                                                </div>
                                            </div>

                                            <input type="hidden" value="<?php echo $pid; ?>" name="pid" id="pid">
                                            <div class="form-group">
                                                <label for="exampleInputFile" class="col-sm-6 control-label">Add Profile
                                                    Picture</label>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="file0" class="custom-file-input"
                                                                   id="file0">
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
                                                        <input type="date" class="form-control" name="pdob" id="pdob"
                                                               data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $pdob; ?>" data-mask id="dob1Input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" style="width: 100%;" id="gender" name="gender" value="<?php echo $gender; ?>" >
                                                        <option value="M" <?php if($gender=="M"){echo "Selected";}?>>Male</option>
                                                        <option Value="F" <?php if($gender=="F"){echo "Selected";}?>>Female</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Breed</label>
                                                    <select class="form-control" 
                                                            style="width: 100%;" id="breed" name="breed" value="<?php echo $breed; ?>" >
                                                            <option value="Labrado">Labrado</option>
                                                         <option value="German Shepard">German Shepard</option>
                                                         <option value="Bull Dog">Bull Dog</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputweight" class="col-sm-2 control-label">Weight
                                                    -lbs </label>

                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="weight" name="weight"
                                                           placeholder="10 lbs" value="<?php echo $weigh; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-12">
                                                    <button type="submit" id="petUpdate" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <!-- transfertab tab -->
                                    <div class="tab-pane" id="transferpet">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Pet Name</label>

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name5Lbl" value="<?php echo $PName; ?>"
                                                            disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Receiver
                                                    Email </label>
                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="receiverEmail"
                                                           placeholder="abc@petland.com" disabled="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="myCheck"> I agree to the <a href="#">terms and
                                                                conditions of transfer policy </a> & User should be
                                                            registered with us to transfer your pet
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-12">
                                                    <button type="button" id="requestBtn" class="btn btn-success">Request</button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->


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
<script src="jquery-3.3.1.min.js"></script>
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


<!-- page script -->
<script>
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
        $("#img").click(function () {
            $("input[id='my_file']").click();
        });
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        // $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        // //Datemask2 mm/dd/yyyy
        // $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        // //Money Euro
        // $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

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
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>

</body>
</html>
