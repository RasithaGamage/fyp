<?php 
session_start();

require '../controllers/conn.php';

$result = mysqli_query($con,"SELECT * FROM User WHERE UID='" . $_SESSION["Uid"] . "'");

while($row = $result->fetch_assoc()) {
        
        $MobNo = $row["MOBNO"];
        $HomNo = $row["HOMENO"];
        $DOB = $row["DOB"]; 

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
                        <h1 id="head-name"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
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
                                <div class="text-center" id="userProp">
                                    <img class='profile-user-img img-fluid img-circle'  src='../dist/img/log_img.jpg' >  
                                </div>

                                <h3 class="profile-username text-center" id="profile-username"><?php echo $_SESSION["Name"];?></h3>
                                <p class="text-muted text-center" id="profile-email"><?php echo $_SESSION["Email"];?></p>
                                <form>

                                <ul class="list-group list-group-unbordered mb-3">

                                    <li class="list-group-item">
                                        <b>Date of Birth</b> <a class="float-right" id="Birth"><?php echo $DOB; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mobile No.</b> <a class="float-right" id="Mobile"> <?php echo $MobNo; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Home No.</b> <a class="float-right"  id="Home"><?php echo $HomNo; ?></a>
                                    </li>
                                   <!-- <li class="list-group-item">
                                        <b>Language Preference</b> <a class="float-right" id="lang"><?php echo $MobNo; ?></a>
                                    </li>-->

                                    <li class="list-group-item">
                                        <b>Level</b> <a class="float-right">Begining</a>
                                    </li>
                                    <!--<li class="list-group-item">
                                        <b>Rank</b> <a class="float-right">35</a>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#userSettings"
                                                            data-toggle="tab">User</a></li>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change
                                            Password</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#createPet" data-toggle="tab">Add New Pet</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="userSettings">
                                        <form class="form-horizontal" method="post" action="../controllers/updateuserdetails.php">
                                            <!--<div class="form-group text-center">
                                                <img id="img" class="profile-user-img img-fluid img-circle"
                                                     src="../dist/img/user1-128x128.jpg"
                                                     alt="User profile picture">
                                                <h3 class="profile-username text-center" id="currentUser"></h3>
                                                <label for="name" class="col-sm-2 mt-2 control-label">Change
                                                    Profile</label>
                                                <input type="file" id="my_file" style="display: none;"/>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Name</label>

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           value="<?php echo $_SESSION["Name"];?>">
                                                </div>
                                            </div>


                                           
                                            <div class="form-group">
                                                <label for="exampleInputFile" class="col-sm-6 control-label">Add Profile
                                                    Picture</label>
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
                                                <label for="inputemail" class="col-sm-6 control-label" id="currentUserEmai">Email </label>

                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="inputemail" name="inputemail" disabled
                                                           value="<?php echo $_SESSION["Email"];?>">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="mobileNo" class="col-sm-6 control-label">Mobile
                                                    No. </label>

                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="mobileNo" name="mobileNo"
                                                          value="<?php echo $MobNo; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="homeNO" class="col-sm-6 control-label">Home
                                                    No. </label>

                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="homeNO" name="homeNO"
                                                          value="<?php echo $HomNo; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputdate" class="col-sm-6 control-label">Date of
                                                    Birth</label>

                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $DOB; ?>" data-mask name="dob" id="dob">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Language Preference</label>
                                                    <select class="form-control select2" 
                                                            style="width: 100%;" placeholder="English" id="language" name="language">
                                                        <option>English</option>
                                                        <option>Sinhala</option>

                                                    </select>
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" id="updateUser" name="updateUser" class="btn btn-success">Update Details</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="password">
                                        <form class="form-horizontal" method="POST" action="../controllers/changepassword.php">
                                            <div class="form-group">
                                                <label for="oldPassword" class="col-sm-6 control-label">Old
                                                    Password</label>

                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                                    required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="newPassword" class="col-sm-6 control-label">New
                                                    Password </label>

                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="newPassword" name="newPassword"
                                                    required>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="confirmPassword" class="col-sm-6 control-label">Confirm
                                                    Password</label>

                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success" id="changePasswordBtn">Change Password 
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>



                                    <div class="tab-pane" id="createPet">
                                        <form class="form-horizontal" method="POST" action="../controllers/addpet.php">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Pet Category</label>
                                                    <select class="form-control" name="category" id="category">
                                                        <option value="Dog">Dog</option>
                                                        <option value="Cat">Cat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <label for="petName" class="col-sm-6 control-label">Pet Name</label>

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="petName" name="petName"
                                                           placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile" class="col-sm-6 control-label">Add Pet
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
                                                <label for="inputdate" class="col-sm-6 control-label">Date of
                                                    Birth</label>

                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" id="dobPet" name="dobPet"
                                                               data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender"  id="gender">
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
                                                         <option value="Labrado">Labrado</option>
                                                         <option value="German Shepard">German Shepard</option>
                                                         <option value="Bull Dog">Bull Dog</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputweight" class="col-sm-6 control-label">Weight
                                                    -lbs </label>

                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="inputweight" name="inputweight"
                                                           placeholder="? lbs">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success" id="savePet">Add Pet
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
<script src="../controllers/user.js"> </script>
<script src="../controllers/pet.js"></script>
<script src="../controllers/breed.js"></script>
<!--<script src="../config.js"></script>-->
<script src="../controllers/all.js"></script>
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
        $('.select2').select2()

    })
    
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
</script>

</body>
</html>
