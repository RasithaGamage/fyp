<?php 
session_start();

require '../controllers/conn.php';

$petid = $_GET["id"];

//get pet basic details
$result = mysqli_query($con,"SELECT * FROM Pets  WHERE PETID='".$petid."'");

    while ($row = $result->fetch_assoc()) {


        $petname = $row["PNAME"];
        $BREED = $row["BREED"];
        $petdob = $row["PDOB"];
        $weight = $row["WEIGHT"];

    }


//get user details of pet 
$result2 = mysqli_query($con,"SELECT A.USERID,B.NAME,C.MOBNO,C.HOMENO,C.IMAGE FROM User_Pet A, User_Credentials B,User C  WHERE A.PETID='".$petid."'  && C.CID = B.CID");
    
    while ($row2 = $result2->fetch_assoc()) {


        $username = $row2["NAME"];
        $mob = $row2["MOBNO"];
        $home = $row2["HOMENO"];
        $userimg = $row2["IMAGE"];

    }

//get pet vaccination data
$result3 = mysqli_query($con,"SELECT * FROM Pet_Vaccinations  WHERE PETID='".$petid."'");
    
   




//age calculation
$today = date("Y-m-d");

$date1=date_create($petdob);
$date2=date_create($today);

$diff=date_diff($date1,$date2);
 

$age = $diff->format('%d days');


// check gender
$gender = "M";
$gender_icon;

if ($gender == "M") {
    $gender_icon = "<i class='fa fa-mars' style='color:#17a2b8;'></i>";
} else {
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
                        <h1 class="m-0 text-dark">Search</h1>
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
                  <input type="text" id="idpet" name="idpet" class="form-control">
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

                                        <h3 class="profile-username text-center" id="petNameLbl1"> <?php echo $petname; ?> <?php echo $gender_icon; ?>  </h3>

                                             
                                        <p class="text-muted text-center" id="breedLbl"></p>
                                    </div>
                                </div>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Age</b> <a class="float-right" id="ageLbl1"><?php echo $age; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of Birth</b> <a class="float-right" id="dobLbl">
                                            <?php echo $petdob; ?></a>
                                    </li>
                                     <li class="list-group-item">
                                        <b>Breed</b> <a class="float-right" id="weightLbl1"><?php echo $BREED; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Weight</b> <a class="float-right" id="weightLbl1"><?php echo $weight; ?></a>
                                    </li>
                                </ul>
                                <button type="button" id="mediBookBtn" data-toggle="collapse"
                                        data-target="#owner" class="btn btn-primary btn-block" ><b>Owner</b>
                                </button>
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
                                                                    data-toggle="tab">Vaccinations</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#treatments" data-toggle="tab">Treatments</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#operations" data-toggle="tab">Operations</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#training"
                                                                    data-toggle="tab">Training</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#testreports" data-toggle="tab">Test
                                                    Reports</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">

                                            <!-- active first card -->
                                            <div class=" tab-pane active" id="vaccinations">
                                                <div class="card-footer mb-3">
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-primary float-right btn-sm"
                                                                data-toggle="modal" data-target="#addVaccination"
                                                                data-whatever="@mdo"><i class="fa fa-plus"></i> Add
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="addVaccination" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add
                                                                    Vaccination</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label>Vaccination</label>
                                                                        <select class="form-control" name="vaccination" id="vaccinationID">
                                                                            <option></option>
                                                                            <!--<option>Canine Parvovirus</option>-->
                                                                            <!--<option>Coronavirus</option>-->
                                                                            <!--<option>Distemper-Measles</option>-->
                                                                            <!--<option>Leptospirosis</option>-->
                                                                            <!--<option>Rabies</option>-->
                                                                            <!--<option>Distemper Hepatitis (CAV-2)</option>-->
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-6 control-label" > Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control" id="vaccinationDate"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group d-none">vaccinationDate
                                                                        <label for="client-mobile"
                                                                               class="col-form-label" >Age</label>
                                                                        <input type="number" class="form-control" name="contact"
                                                                               id="pet-age" placeholder="Enter age">
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" class="form-control" name="firstname" disabled
                                                                               id="exampleInputName" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="careCenter1" disabled
                                                                               id="careCenter1" placeholder="Enter Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3" id="remarks1"
                                                                                  placeholder="Any remarks"></textarea>
                                                                    </div>
                                                                    
                                                                <hr>
                                                                   
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-6 control-label" >Next Vaccination Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control" id="nxtVacDate"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="commentvaccination">Comment</label>
                                                                        <input type="text" class="form-control" name="comment"
                                                                               id="commentvaccination" placeholder="Vaccination Name/Comment">
                                                                    </div>
                                                                
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" id="addVaccinationBtn" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
                                                        <th>Edit</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        

                                                    <?php 
                                                    while ($row3 = $result3->fetch_assoc()) {

                                                        $VACDATE = $row3["VACDATE"];
                                                        $VACNAME = $row3["VACNAME"];
                                                        $VACAGE = $row3["AGE"];
                                                        $VACDOC = $row3["DOC"];
                                                        $VACCENTRE = $row3["CENTRE"];
                                                        $VACREM = $row3["REMARK"];
                                                        

                                                        echo "<tr>";
                                                        echo "<td> ".$VACNAME ." </td>";
                                                        echo "<td> ".$VACDATE ." </td>";
                                                        echo "<td> ".$VACAGE ." Days </td>";
                                                        echo "<td> ".$VACDOC ." </td>";
                                                        echo "<td> ".$VACCENTRE ." </td>";
                                                        echo "<td> ".$VACREM ." </td>";
                                                        echo "<td> <button type='button' id='addVaccinationBtn' class='btn btn-primary'>Edit</button>  </td>";
                                                       
                                                        echo "</tr>";
        
        

                                                     }
                                                    
                                                    ?>
                                                    </tbody>
                                               
                                                </table>
                                                <div class="modal fade" id="editVaccination" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Vaccination</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="hidden" id="vac-model">
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label>Vaccination</label>
                                                                        <select class="form-control" name="vaccination" id="edit-vac-vac">
                                                                        
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-2 control-label">Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control" id="edit-vac-date"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-mobile"
                                                                               class="col-form-label">Age</label>
                                                                        <input type="text" class="form-control" name="contact" id="edit-vac-age"
                                                                               id="client-mobile" placeholder="">
                                                                    </div>
                                                                    <div class="form-group d-non">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" class="form-control" name="firstname" disabled id="edit-doc-name"
                                                                               id="exampleInputName" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="address" id="edit-care-center"
                                                                               placeholder="Enter care center" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3" id="edit-vac-remark"
                                                                                  placeholder="Enter remark"></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary" id="edit-vac-button">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- treatmentcard-->
                                            <div class=" tab-pane" id="treatments">
                                                <div class="card-footer mb-3">
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-primary float-right btn-sm"
                                                                data-toggle="modal" data-target="#addTreatments"
                                                                data-whatever="@mdo"><i class="fa fa-plus"></i> Add
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="addTreatments" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add
                                                                    Treatments</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Symptoms</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="pet-Symptoms" placeholder="Enter Symptoms">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Diagnosis/Disease</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="pet-Diagnosis" 
                                                                               placeholder="Enter Diagnosis/Disease">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-2 control-label">Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control" id="pet-tretments-date"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="client-mobile"
                                                                               class="col-form-label">Age</label>
                                                                        <input type="number" class="form-control" name="age"
                                                                               id="pet-treatment-age" placeholder="Enter Age">
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" class="form-control" name="firstname" disabled
                                                                               id="exampleInputNameVac" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="address" disabled
                                                                               id="pet-treatments-center" placeholder="Enter Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Next
                                                                            Generation Risk</label>
                                                                        <select class="form-control" id="nxt-treatments" name="nxt-treatments">
                                                                            <option>Non</option>
                                                                            <option>Medium</option>
                                                                            <option>High</option>
                                                                        </select>    
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3" id="remark-treatments"
                                                                                  placeholder="Enter ..."></textarea>
                                                                    </div>
                                                                    
                                                                    <hr>
                                                                   
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-6 control-label">Next Treatment Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control" id="nxttreatmentDate1"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="commentTreament">Comment</label>
                                                                        <input type="text" class="form-control" name="comment"
                                                                               id="commentTreament" placeholder="Treament Name/Comment">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary" id="addTreatmentsBtn">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="modal fade" id="editTreatments" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Treatments</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Symptoms</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="client-mobile" placeholder="Enter Symptoms">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Diagnosis/Disease</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="client-mobile"
                                                                               placeholder="Enter Diagnosis/Disease">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-2 control-label">Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="client-mobile"
                                                                               class="col-form-label">Age</label>
                                                                        <input type="number" class="form-control" name="contact"
                                                                               id="client-mobile" placeholder="Enter Age">
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" class="form-control" name="firstname" disabled
                                                                               id="exampleInputNameTre" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="address" disabled
                                                                               id="client-address" placeholder="Enter Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Next
                                                                            Generation Risk</label>
                                                                        <input type="text" class="form-control" name="address"
                                                                               id="client-address"
                                                                               placeholder="Enter Next Generation Risk">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3"
                                                                                  placeholder="Enter ..."></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- surgerycard-->
                                            <div class=" tab-pane" id="operations">
                                                <div class="card-footer mb-3">
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-primary float-right btn-sm"
                                                                data-toggle="modal" data-target="#addOperations"
                                                                data-whatever="@mdo"><i class="fa fa-plus"></i> Add
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="addOperations" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add
                                                                    Operations</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form>
                                                            <div class="modal-body">
                                                                

                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Diagnosis/Disease</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="ope-Diagnosis"
                                                                               placeholder="Enter Diagnosis/Disease">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Surgery</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="ope-Surgery" placeholder="Enter Surgery">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-2 control-label">Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control" id="ope-date"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="client-mobile"
                                                                               class="col-form-label">Age</label>
                                                                        <input type="number" class="form-control" name="contact"
                                                                               id="ope-age" placeholder="Enter Age">
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" class="form-control" name="firstname" disabled
                                                                               id="exampleInputNameOpe" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="address" disabled
                                                                               id="ope-center" placeholder="Enter Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Next
                                                                            Generation Risk</label>
                                                                        <input type="text" class="form-control" name="address"
                                                                               id="ope-nxt"
                                                                               placeholder="Enter Next Generation Risk">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3" id="ope-remark"
                                                                                  placeholder="Enter ..."></textarea>
                                                                    </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" id="opeBtn" class="btn btn-primary">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
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
                                                <div class="modal fade" id="editOperations" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Operations</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>

                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Diagnosis/Disease</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="client-mobile"
                                                                               placeholder="Enter Diagnosis/Disease">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Surgery</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="client-mobile" placeholder="Enter Surgery">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-2 control-label">Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="client-mobile"
                                                                               class="col-form-label">Age</label>
                                                                        <input type="number" class="form-control" name="contact"
                                                                               id="client-mobile" placeholder="Enter Mobile">
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" class="form-control" name="firstname"
                                                                               id="exampleInputName" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="address"
                                                                               id="client-address" placeholder="Enter Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Next
                                                                            Generation Risk</label>
                                                                        <input type="text" class="form-control" name="address"
                                                                               id="client-address"
                                                                               placeholder="Enter Next Generation Risk">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3"
                                                                                  placeholder="Enter ..."></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- trainingcard-->
                                            <div class=" tab-pane" id="training">
                                                <div class="card-footer mb-3">
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-primary float-right btn-sm"
                                                                data-toggle="modal" data-target="#addTraining"
                                                                data-whatever="@mdo"><i class="fa fa-plus"></i> Add
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="addTraining" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add Training</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>

                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Training
                                                                            Name</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="traine-name" placeholder="Training Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Training Type</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="traine-type" placeholder="Training Type">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-2 control-label">Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="date" class="form-control" id="traine-date"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="client-mobile"
                                                                               class="col-form-label">Age</label>
                                                                        <input type="number" class="form-control" name="contact"
                                                                               id="traine-age" placeholder="Enter Age">
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" class="form-control" name="firstname" disabled
                                                                               id="exampleInputNameTree" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="address" disabled
                                                                               id="tree-center" placeholder="Enter Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3" id="traine-remark"
                                                                                  placeholder="Enter ..."></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" id="save-traineBtn" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="modal fade" id="editTraining" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Training</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>

                                                                    <div class="form-group">
                                                                        <label for="client-mobile" class="col-form-label">Training
                                                                            Name</label>
                                                                        <input type="text" class="form-control" name="contact"
                                                                               id="client-mobile" placeholder="Training Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Training Type</label>
                                                                        <select class="form-control" name="vaccination">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputdate" class="col-sm-2 control-label">Date</label>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                   data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                   data-mask
                                                                                   placeholder="Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="client-mobile"
                                                                               class="col-form-label">Age</label>
                                                                        <input type="number" class="form-control" name="contact"
                                                                               id="client-mobile" placeholder="Enter Mobile">
                                                                    </div>
                                                                    <div class="form-group d-none">
                                                                        <label for="exampleInputName">Doctor Name</label>
                                                                        <input type="text" classbr="form-control" name="firstname"
                                                                               id="exampleInputName" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="client-address" class="col-form-label">Care
                                                                            Center Name</label>
                                                                        <input type="text" class="form-control" name="address"
                                                                               id="client-address" placeholder="Enter Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Remarks</label>
                                                                        <textarea class="form-control" rows="3"
                                                                                  placeholder="Enter ..."></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                   

                                                        </tbody>

                                                    </table>-->
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

                                <h3 class="profile-username text-center" id="head-user"><?php echo $username; ?></h3>
                                <p class="text-muted text-center" id="head-user-email"></p>


                                <ul class="list-group list-group-unbordered mb-3">

                                    <li class="list-group-item">
                                        <b>Mobile No.</b> <a class="float-right" id="head-user-mobile"><?php echo$mob; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Home No.</b> <a class="float-right" id="head-user-home"> <?php echo$home; ?></a>
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


