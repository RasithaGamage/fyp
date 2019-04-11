<?php
session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  


  <style>
  @media screen and (max-width: 600px) {
    #off_to_mobile {
      visibility: hidden;
      clear: both;
      display: none;
    }
  }

  #space {
    padding-top: 15px;
  }

</style>

</head>
<body class="hold-transition sidebar-mini">
  <!--<div id="sessions"> </div>-->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include '../common/navbar.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      

      <!-- Sidebar -->
      <?php include'../common/sidebar.php'; ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Petland</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Petland</a></li>
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-md-8">
              <div class="card card-widget">
                <div class="card-header">
                  Create post
                </div>
                <div class="card-body">
                  <!-- User image -->
                  
                  <img id="blah" class="img-fluid pad" src="#" alt="" />
  
                  <form  id="space" action="#" method="post">
                      <div class="row">
                    
                          <div id="commenterImage" class='col-md-2'>
                            <img class="img-circle img-md" src="../dist/img/log_img.jpg" alt="User Image">   
                          </div>
                         
                    
                        <div class='col-md-10' style='width=100%'>
                         

                          <textarea rows="2"  class="form-control form-control-md" cols="50" placeholder="What's you wanna post?"></textarea>
                        </div>
                    </div>
                    
                    
                    
                  </div>
                  <div class="card-footer">
                    
                    <label class="btn btn-default ">
                        <i class="fa fa-picture-o"></i> <input type="file" id="file" name="file" hidden>
                        
                    </label>
                    <button type="button" id="postBtn" class="btn btn-info btn-md pull-right"><i class="fa fa-check"></i> Post</button>
                  </div>
                </div>
              </form>
            </div>
            
            <!-- /.col -->
            <div class="col-md-4" id="off_to_mobile" >
              <!-- profile summary-->
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info-active">
                  <h3 class="widget-user-username" id="head-name"><?php echo $_SESSION["Name"];?></h3>
                  <h5 class="widget-user-desc">Beginner</h5>
                </div>
                <div class="widget-user-image">
                  <img class='profile-user-img img-fluid img-circle' src='../dist/img/log_img.jpg' >
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header" id="petCount"><?php echo $_SESSION["PetCount"];?></h5>
                        <span class="description-text">Pets</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header" id="postCount">0</h5>
                        <span class="description-text">POST</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">1</h5>
                        <span class="description-text">Rank</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  
                  <!-- /.row -->
                </div>
              </div>
              <div >
          
            </div>
            </div>
            
          </div> <!-- first row -->
          
          
          <!-- timeline --->
        
              <div class="col-md-8">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                  <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                  <span class="description">Shared Publicly</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="fa fa-circle-o"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img class="img-fluid pad" src="../dist/img/photo2.png" alt="Photo">

                <p>I took this photo this morning. What do you guys think?</p>
                
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-heart"></i> Like</button>
                <span class="float-right text-muted">127 likes - 3 comments</span>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Maria Gonzales
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Luna Stark
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <form action="#" method="post">
                  <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          
            
            
              <!-- clinic day -->
              
              
              
          </div>
          

          <!--- timeline post -->
          
          
            
            
            
                </div><!--/. container-fluid -->
              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php include '../common/footer.php';?>
          </div>
          <!-- ./wrapper -->

          <!-- REQUIRED SCRIPTS -->
          <!-- jQuery -->
          <!--<script src="../plugins/jquery/jquery.min.js"></script>-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <!-- Bootstrap -->
          <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
          <!-- AdminLTE App -->
          <script src="../dist/js/adminlte.js"></script>

          <!-- OPTIONAL SCRIPTS -->
          <script src="../dist/js/demo.js"></script>

          <!-- PAGE PLUGINS -->
          <!-- SparkLine -->
          <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
          <!-- jVectorMap -->
          <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
          <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
          <!-- SlimScroll 1.3.0 -->
          <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
          <!-- ChartJS 1.0.2 -->
          <script src="../plugins/chartjs-old/Chart.min.js"></script>
         

          <!-- PAGE SCRIPTS -->
          <script src="../dist/js/pages/dashboard2.js"></script>
          <script>
              function readURL(input) {
                console.log("preview");
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();
                
                    reader.onload = function(e) {
                      $('#blah').attr('src', e.target.result);
                    }
                
                    reader.readAsDataURL(input.files[0]);
                  }
                }
                
                $("#file").change(function() {
                  readURL(this);
                });
          </script>
          <script>
        //     function logOut(){
        //         let ajaxConfig = {
        //         method: "GET",
        //         dataType: "json",
        //         url: userURL + "_logout",
        //         async: true
        //     }
        //     $.ajax(ajaxConfig).done(function (response) {
        //         window.location = 'https://petland.lk/app/Pet_Land/index.php';
        //     });
        // }
          </script>
        </body>
        </html>
        