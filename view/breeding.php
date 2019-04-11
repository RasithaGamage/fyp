    <?php 
    session_start();
    require '../controllers/conn.php';

    $petid = $_GET["id"];

    //get pet basic details
    $result = mysqli_query($con,"SELECT * FROM Pets  WHERE PETID='".$petid."'");

    while ($row = $result->fetch_assoc()) {


        $petname = $row["PNAME"];
        $petgender = $row["GENDER"];
        $BREED = $row["BREED"];
        $petdob = $row["PDOB"];
        $weight = $row["WEIGHT"];
        $category = $row["CATEGORY"];

    }

    //age calculation




    $today = date("Y-m-d");


    $date1=date_create($petdob);
    $date2=date_create($today);
    $diff=date_diff($date1,$date2);
    $age = $diff->format("%R%a days");





    // check gender
    
    
    $gender_icon;
    $img_url;

    if ($petgender == "M") {

        $img_url = "../dist/img/cat_chart.jpg";
        $gender_icon = "<i class='fa fa-mars' style='color:#17a2b8;'></i>";
    } else {

        $img_url = "../dist/img/dog_chart.jpg";
        $gender_icon = "<i class='fa fa-venus' style='color:#c8237e;'></i>";
    }





    ?>



    <!-- Head -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profile</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <!-- Use This For Mobile Responive -->
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

        <!--Date Range -->
        <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!--Font Awesome 5-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


      


        <script>
            function showHint() {

                var settings = {
                  "async": true,
                  "crossDomain": true,
                  "url": "http://localhost:8080/checkEligibility",
                  "method": "POST",
                  "headers": {
                    "content-type": "application/json",
                    "cache-control": "no-cache",
                    "postman-token": "2654f56b-e358-d089-3342-2fa167217606"
                },
                "processData": false,
                "data": "{\n\"id\":1,\n\"name\":\"bobby\",\n\"age\":45,\n\"bodytypescore\":3\n}"
            }

            $.ajax(settings).done(function (response) {
              console.log(response);
              var agealig = response.message;

              document.getElementById("myProgressage").value = "75";



              alert(agealig);

          });

        }



        
    </script>


    
</head>
<!-- Body -->
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Breeding</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Breeding Eligibility</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">



                    <!-- Owner & Pet Profile-->
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <!-- Pet -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center" id="pet-profile">
                                                <img class="profile-user-img img-fluid img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">
                                            </div>

                                            <h3 class="profile-username text-center" id="petNameLbl1">

                                                <p class="text-muted text-center" id="breedLbl"> <?php echo $petname; ?> <?php echo $gender_icon; ?></p>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Age</b> <a class="float-right" id="ageLbl1"> <?php echo $age; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date of Birth</b> <a class="float-right" id="dobLbl"><?php echo $petdob; ?>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Category</b> <a class="float-right" id="weightLbl1"><?php echo $category; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Breed</b> <a class="float-right" id="weightLbl1"><?php echo $BREED; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Weight</b> <a class="float-right" id="weightLbl1"><?php echo $weight; ?></a>
                                        </li>
                                    </ul>
                                    <!-- <button type="button" id="mediBookBtn" data-toggle="collapse"
                                            data-target="#owner" class="btn btn-primary btn-block" ><b></b>
                                        </button> -->
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="col-md-9">
                            <!-- Medi Book -->
                            <div class="row" id="mediBook">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link " href="#vaccinations"
                                                    data-toggle="tab">Breeding Eligibility</a></li>

                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">

                                                    <!-- active first card -->
                                                    <div class=" tab-pane active" id="vaccinations">

                                                        
                                                            <div class="card-body">
                                                              <div class="form-group">
                                                                <label>Age Eligibility</label>
                                                                <div class="progress">

                                                                  <div class="progress-bar" id="myProgressage"role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                              </div>
                                                          </div>

                                                          <div class="form-group">
                                                            <label>Vaccination Eligibility</label>
                                                            <div class="progress">

                                                              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%"></div>
                                                          </div>
                                                      </div>

                                                      <div class="form-group">
                                                        <label>Treatment Eligibility</label>
                                                        <div class="progress">

                                                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%"></div>
                                                      </div>
                                                  </div>


                                                  <div class="form-group">
                                                    <label>Operation Eligibility</label>
                                                    <div class="progress">

                                                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%"></div>
                                                  </div>
                                              </div>


                                          </div>
                                          <!-- /.card-body -->

                                          <div class="card-footer">
                                              <button type="" onclick="showHint()" class="btn btn-success">Process</button>
                                          </div>
                                      
                                  </div>




                              </div>
                              <!-- /.tab-content -->
                          </div><!-- /.card-body -->


                      </div>
                      <!-- /.nav-tabs-custom -->
                  </div>
              </div>
          </div>
      </div>
      <div class="row collapse" id="owner">
        <div class="col-md-12">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                        src="../dist/img/user1-128x128.jpg"
                        alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center" id="head-user"> </h3>
                    <p class="text-muted text-center" id="head-user-email"></p>


                    <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Mobile No.</b> <a class="float-right" id="head-user-mobile"></a>
                        </li>
                        <li class="list-group-item">
                            <b>Home No.</b> <a class="float-right" id="head-user-home"></a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
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

<!-- send data to rule server -->
<script type="text/javascript">

    function senddata(){



        var markers = [{ "id":1,
        "name":"bobby",
        "age":3,
        "bodytypescore":5}];



        $.ajax({
            type: "POST",
            url: "localhost:8080/checkEligibility",
    // The key needs to match your method's input parameter (case-sensitive).
    data: JSON.stringify({ Markers: markers }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function(data){alert(data);},
    failure: function(errMsg) {
        alert(errMsg);
    }
});

    }

</script>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<!-- Use This For Mobile Responsive -->
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<!-- Date Range Picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></scrtyipt>
<!--Sweet Alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!--<script src="../config.js"></script>-->

<!-- page script -->


