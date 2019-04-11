    <?php 
    session_start();

   
    // check gender
    $gender = "M";
    $type ="C";
    $gender_icon;
    $img_url;

    if ($gender == "M") {

        $img_url = "../dist/img/cat_chart.jpg";
        $gender_icon = "<i class='fa fa-mars' style='color:#17a2b8;'></i>";
    } else {

        $img_url = "../dist/img/dog_chart.jpg";
        $gender_icon = "<i class='fa fa-venus' style='color:#c8237e;'></i>";
    }


    if ($type == "C") {

        $img_url = "../dist/img/cat_chart.jpg";
        
    } else {

        $img_url = "../dist/img/dog_chart.jpg";
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
        <!-- DataTables -->
        <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
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
              

                  <link rel="stylesheet" href="../plugins/datePicker2/css/gijgo.min.css">





    <script>
    function showResult(str) {
      if (str.length==0) { 
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {



          document.getElementById("dropgetval").value=this.responseText;
          document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        }
      }

      xmlhttp.open("GET","../controllers/petSearchLive.php?q="+str,true);
      xmlhttp.send();
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
                                <li class="breadcrumb-item active">Medi Book</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">


                    <!-- Search Bar-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <label>Search Pet </label>
                            </div>
                            <div class="card-body">
                                <!-- /input-group -->
                                <form action="../controllers/petIdSearch.php" method="POST">
                                <div class="row" >

                                        
                                        <div class="input-group mb-12">
                  <input type="text" id="identered" name="identered" class="form-control">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Search</button>
                  </span>
                </div>



                                         </form>
                                     
                                </div>
                              <!--<div id="area" ></div>-->

                                <!-- /input-group -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                    
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
                                                 
                                            <p class="text-muted text-center" id="breedLbl"> Dog Name</p>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Age</b> <a class="float-right" id="ageLbl1"> 28 days</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Date of Birth</b> <a class="float-right" id="dobLbl">2019-02-14
                                                </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Weight</b> <a class="float-right" id="weightLbl1">1 lbl</a>
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
                                                <li class="nav-item"><a class="nav-link active" href="#vaccinations"
                                                                        data-toggle="tab">Body Type Scoring</a></li>
                                                
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">

                                                <!-- active first card -->
                                                <div class=" tab-pane active" id="vaccinations">
                                                    
                                                    <form role="form">
                    <div class="card-body">
                      <div class="form-group">
                        <img src="<?php echo $img_url;?>" height="170px">
                      </div>

                      <div class="form-group">
                    <label>Select Body Type Score</label>
                    <select class="form-control">
                      <option>Very Thing</option>
                      <option>Underweight</option>
                      <option>Ideal</option>
                      <option>Overweight</option>
                      <option>Obese</option>
                    </select>
                  </div>
                     
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>
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


