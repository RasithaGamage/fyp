<?php 
session_start();
require '../controllers/conn.php';

$pid = $_GET['id'];  


$result = mysqli_query($con,"SELECT * FROM Pet_Vaccinations WHERE PETID='".$pid."'");

while($row = $result->fetch_assoc()) {
    $vacdate = $row["VACDATE"];
    $vacage = $row["AGE"];
    
}


?>
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
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark" id="bookName"></h1>
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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#vaccinations"
                                                            data-toggle="tab">Vaccinations</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#treatments" data-toggle="tab">Treatments</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#operations" data-toggle="tab">Operations</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#training"
                                                            data-toggle="tab">Training</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#testreports" data-toggle="tab">Test Reports</a></li>
                                </ul>
                            </div><!-- /.card-header -->


                            <div class="card-body">
                                <div class="tab-content">

                                    <!-- active first card -->
                                    <div class=" tab-pane active" id="vaccinations">
                                        <table id="vaccinTable" class="table table-striped table-bordered nowrap"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Vaccination</th>
                                                <th>Date</th>
                                                <th>Age</th>
                                                <th>Doctor</th>
                                                <th>Care Center Name</th>
                                                <th>Remark</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            

                                            </tbody>
                                     
                                        </table>
                                    </div>

                                    <!-- treatmentcard-->
                                    <div class=" tab-pane" id="treatments">
                                            <table id="treatmentsTable"
                                                   class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Symptoms</th>
                                                    <th>Diagnosis/Disease</th>
                                                    <th>Date</th>
                                                    <th>Age</th>
                                                    <th>Doctor</th>
                                                    <th>Care Center</th>
                                                    <th>Next Generation Risk</th>
                                                    <th>Remarks</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                       
                                                </tbody>
                                           
                                            </table>
                                    </div>


                                    <!-- surgerycard-->
                                    <div class=" tab-pane" id="operations">

                                            <table id="operationsTable"
                                                   class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Diagnosis/Disease</th>
                                                    <th>Surgery</th>
                                                    <th>Date</th>
                                                    <th>Age</th>
                                                    <th>Doctor</th>
                                                    <th>Care Center</th>
                                                    <th>Next Generation Risk</th>
                                                    <th>Remarks</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                           

                                                </tbody>
                                         
                                            </table>
                                    </div>

                                    <!-- trainingcard-->
                                    <div class=" tab-pane" id="training">

                                            <table id="trainingTable" class="table table-striped table-bordered nowrap"
                                                   style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Training Name</th>
                                                    <th>Training Type</th>
                                                    <th>Date</th>
                                                    <th>Age</th>
                                                    <th>Doctor</th>
                                                    <th>Care Center</th>
                                                    <th>Remarks</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                            
                                                </tbody>
                                            
                                            </table>
                                    </div>


                                    <!-- testreportcard-->
                                    <div class=" tab-pane" id="testreports">

                                        <div class="card-body">
                                            <p>Coming Soon</p>
                                            <!--<table id="example2" class="table table-bordered table-hover table-responsive-lg">
                                                <thead>
                                                <tr>
                                                    <th>Training Name</th>
                                                    <th>Training Type</th>
                                                    <th>Date</th>
                                                    <th>Age</th>
                                                    <th>Doctor</th>
                                                    <th>Care Center</th>
                                                    <th>Remarks</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Ear Odor</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                </tbody>

                                            </table>-->
                                        </div>
                                    </div>


                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->


                        <!-- /.card-body -->
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

<script src="../controllers/medibook.js"></script>
<!--Sweet Alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- page script -->
<script>
    $(document).ready(function () {
        // let table1 = $('#vaccinTable').DataTable({
        //     responsive: true
        // });
        // let table2 = $('#treatmentsTable').DataTable({
        //     responsive: true
        // });
        // let table3 = $('#operationsTable').DataTable({
        //     responsive: true
        // });
        // let table4 = $('#trainingTable').DataTable({
        //     responsive: true
        // });
        // new $.fn.dataTable.FixedHeader(table1);
        // new $.fn.dataTable.FixedHeader(table2);
        // new $.fn.dataTable.FixedHeader(table3);
        // new $.fn.dataTable.FixedHeader(table4);


    });


</script>
<script>


</script>


