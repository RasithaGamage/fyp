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
    <title>Petcare Centers</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
       
    
    
  </head>
  <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <?php include '../common/navbar.php'; ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?php include '../common/sidebar.php';?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Petcare Centers</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Petcare Centers</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="row">
           <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Petcare Centers Map</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63371.80385595535!2d79.82118593505682!3d6.92192257629144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo!5e0!3m2!1sen!2slk!4v1540442906780" width="800" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    Footer
                  </div>
                  <!-- /.card-footer-->
                </div>
              </div>
              <!-- /col-md-9 -->
              <!-- clinic day -->
              <div class="col-md-3">
                <div class="card bg-warning-gradient">
                  <div class="card-header">
                    <h3 class="card-title">Petcare Center Details</h3>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    Ragama PetCare
                    No,210, Main road
                    Ragama.
                    <br>
                    0112 345 6567 | info@ragamapetcare.com
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- col-md-3 -->
              
            </div>
            <!-- /.card -->
          </div>
          <!-- / row -->

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
  <!-- SlimScroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <script src="../controllers/all.js"></script>
  <script src="../controllers/pet.js"></script>
  
</body>
</html>
