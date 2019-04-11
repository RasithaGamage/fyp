<?php 
session_start();
  $auth = $_SESSION["can_log"];
  if($auth=='Active'){
       
  }else{
      header('Location:https://petland.lk/app/Pet_Land/index.php');
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
                        <h1 class="m-0 text-dark">Doctor</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Doctor</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Doctor Details</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                            data-target="#addDoctor" data-whatever="@mdo"><i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                                <div class="modal fade" id="addDoctor" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"
                                     data-keyboard="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="addDoctorForm">
                                                    <div class="form-group">
                                                        <label for="plateNo">Name</label>
                                                        <input type="text" class="form-control" id="plateNo"
                                                               name="plate_no" placeholder="Enter Doctor Name">
                                                        <p class="text-danger" id="error_plateNo"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="plateNo">Email</label>
                                                        <input type="email" class="form-control" id="plateNo"
                                                               name="plate_no" placeholder="Enter Email">
                                                        <p class="text-danger" id="error_plateNo"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="plateNo">VA Reg.No</label>
                                                        <input type="text" class="form-control" id="plateNo"
                                                               name="plate_no" placeholder="Enter VA Reg.No">
                                                        <p class="text-danger" id="error_plateNo"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="plateNo">NIC No</label>
                                                        <input type="text" class="form-control" id="plateNo"
                                                               name="plate_no" placeholder="Enter NIC">
                                                        <p class="text-danger" id="error_plateNo"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputdate">BirthDay</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                       data-inputmask="'alias': 'dd/mm/yyyy'" data-mask
                                                                       placeholder="Enter Date">
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="plateNo">Mobile No</label>
                                                        <input type="text" class="form-control" id="plateNo"
                                                               name="plate_no" placeholder="Enter Mobile">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea class="form-control" rows="3" id="des"
                                                                  name="description"
                                                                  placeholder="Enter Address..."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bio</label>
                                                        <textarea class="form-control" rows="3" id="des"
                                                                  name="description"
                                                                  placeholder="Enter Bio..."></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                        id="close_btn">Close
                                                </button>
                                                <button type="button" id="lorry_save_btn" name="btn_save"
                                                        class="btn btn-primary">Save
                                                    Doctor
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="doctorTable" class="table table-striped table-bordered nowrap"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>VA Reg.No</th>
                                        <th>NIC No</th>
                                        <th>Dob</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                        <th>Bio</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Dr.Sampath M</td>
                                        <td>sampathmonline@gmail.com</td>
                                        <td>#123343</td>
                                        <td>921232313V</td>
                                        <td>1992/11/11</td>
                                        <td>+94 76 75 57 909</td>
                                        <td>123, Temple Rd, Ganemulla</td>
                                        <td>BVSc ,Second class upper division Private Practitioner (Small Animal)</td>
                                        <td><i class="fas fa-edit fa-lg" data-toggle="modal"
                                               data-target="#editDoctor" data-whatever="@mdo" id="edit"
                                               style="color:#007bff!important "></i></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>VA Reg.No</th>
                                        <th>NIC No</th>
                                        <th>Dob</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                        <th>Bio</th>
                                        <th>Edit</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                        <div class="modal fade" id="editDoctor" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"
                             data-keyboard="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Doctor</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addDoctorForm">
                                            <div class="form-group">
                                                <label for="plateNo">Name</label>
                                                <input type="text" class="form-control" id="plateNo"
                                                       name="plate_no" placeholder="Enter Doctor Name">
                                                <p class="text-danger" id="error_plateNo"></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="plateNo">Email</label>
                                                <input type="email" class="form-control" id="plateNo"
                                                       name="plate_no" placeholder="Enter Email">
                                                <p class="text-danger" id="error_plateNo"></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="plateNo">VA Reg.No</label>
                                                <input type="text" class="form-control" id="plateNo"
                                                       name="plate_no" placeholder="Enter VA Reg.No">
                                                <p class="text-danger" id="error_plateNo"></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="plateNo">NIC No</label>
                                                <input type="text" class="form-control" id="plateNo"
                                                       name="plate_no" placeholder="Enter NIC">
                                                <p class="text-danger" id="error_plateNo"></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputdate">BirthDay</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                           data-inputmask="'alias': 'dd/mm/yyyy'" data-mask
                                                           placeholder="Enter Date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="plateNo">Mobile No</label>
                                                <input type="text" class="form-control" id="plateNo"
                                                       name="plate_no" placeholder="Enter Mobile">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" rows="3" id="des"
                                                          name="description"
                                                          placeholder="Enter Address..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Bio</label>
                                                <textarea class="form-control" rows="3" id="des"
                                                          name="description"
                                                          placeholder="Enter Bio..."></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                id="close_btn">Close
                                        </button>
                                        <button type="button" id="lorry_save_btn" name="btn_save"
                                                class="btn btn-primary">Update
                                            Doctor
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!--Sweet Alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../controllers/all.js"></script>

<!-- page script -->
<script>
    $(document).ready(function () {
        let table = $('#doctorTable').DataTable({
            responsive: true
        });
        new $.fn.dataTable.FixedHeader(table);

    });
    $(function () {
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

    })

</script>

