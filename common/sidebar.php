<?php
//session_start();
//require '../controllers/conn.php';

$userType = $_SESSION["UserType"];
$uid = $_SESSION["Uid"];
$petcount = $_SESSION["PetCount"];
$petarray = $_SESSION["PetDataArray"];


 if ($userType == "USR"){
  echo "
<div class='sidebar'>

        <!-- Brand Logo -->
    <a href='dashboard.php' class='brand-link'>
      <!--<img src='' alt='Petland Logo' class='brand-image img-circle elevation-3'
           style='opacity: .8'>-->
      <span class='brand-text font-weight-light'>Petland</span>
    </a>


      <!-- Sidebar user panel (optional) -->
      <!--<div class='user-panel mt-3 pb-3 mb-3 d-flex'>
        <div class='image'>
          <img src='../dist/img/user2-160x160.jpg' class='img-circle elevation-2' alt='User Image'>
        </div>
        <div class='info'>
          <a href='#' class='d-block'>Alexander Pierce</a>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class='mt-2'>
        <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
           <li class='nav-item has-treeview menu-open'>
            <a href='#' class='nav-link active'>
              <i class='nav-icon fa fa-paw'></i>
              <p>
                My Pets
                <i class='right fa fa-angle-left'></i>
              </p>
            </a>
            <ul class='nav nav-treeview' style='display: block;'>"; 

            $x = 1;
            $j = 0;

            while($x <= $petcount) {

              //foreach($_SESSION['PetDataArray'] as $productId){

              echo "<li class='nav-item'>
                <a href='profile.php?id="; print_r($petarray[$j]['id']); echo "' class='nav-link active'>
                  <div class='user-block'> 
                    <p style='padding-left: 10px; padding-top: 6px;''>"; print_r($petarray[$j]['name']); 
$x++;  $j++; echo " </p>
                    <img class='img-circle img-bordered-sm' src='../dist/img/cat-128x128.jpg' alt='pet image'>
                  </div>
                </a>
              </li>";
              //}
            }
           echo " </ul>
          </li>

<li class='nav-item'>
<a href='./petcarecenters.php' class='nav-link'>
<i class='nav-icon fa fa-location-arrow'></i>
<p>
Petcare Centers
</p>
</a>
</li>


<li class='nav-item has-treeview '>
            <a href='#' class='nav-link '>
              <i class='nav-icon fa fa-heart'></i>
              <p>
                Breeding Eligibility
                <i class='right fa fa-angle-left'></i>
              </p>
            </a>
            <ul class='nav nav-treeview' style='display: none;'>"; 

            $x = 1;
            $j = 0;

            while($x <= $petcount) {

              //foreach($_SESSION['PetDataArray'] as $productId){

              echo "<li class='nav-item'>
                <a href='breeding.php?id="; print_r($petarray[$j]['id']); echo "' class='nav-link active'>
                  <div class='user-block'> 
                    <p style='padding-left: 10px; padding-top: 6px;''>"; print_r($petarray[$j]['name']); 
$x++;  $j++; echo " </p>
                    <img class='img-circle img-bordered-sm' src='../dist/img/cat-128x128.jpg' alt='pet image'>
                  </div>
                </a>
              </li>";
              //}
            }
           echo " </ul>
          </li>

<li class='nav-item'>
<a href='./setting.php' class='nav-link'>
<i class='nav-icon fa fa-cog'></i>
<p>
User Settings
</p>
</a>
</li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>


"; 

//doctor
} elseif ($userType == "DOC"){

echo "
<div class='sidebar'>

        <!-- Brand Logo -->
    <a href='dashboard.php' class='brand-link'>
      <!--<img src='' alt='Petland Logo' class='brand-image img-circle elevation-3'
           style='opacity: .8'>-->
      <span class='brand-text font-weight-light'>Petland</span>
    </a>


      <!-- Sidebar user panel (optional) -->
      <!--<div class='user-panel mt-3 pb-3 mb-3 d-flex'>
        <div class='image'>
          <img src='../dist/img/user2-160x160.jpg' class='img-circle elevation-2' alt='User Image'>
        </div>
        <div class='info'>
          <a href='#' class='d-block'>Alexander Pierce</a>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class='mt-2'>
        <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
           <li class='nav-item has-treeview menu-open'>
            <a href='#' class='nav-link active'>
              <i class='nav-icon fa fa-paw'></i>
              <p>
                My Pets
                <i class='right fa fa-angle-left'></i>
              </p>
            </a>
            <ul class='nav nav-treeview' style='display: block;'>"; 

            $x = 1;
            $j = 0;

            while($x <= $petcount) {

              //foreach($_SESSION['PetDataArray'] as $productId){

              echo "<li class='nav-item'>
                <a href='profile.php?id="; print_r($petarray[$j]['id']); echo "' class='nav-link active'>
                  <div class='user-block'> 
                    <p style='padding-left: 10px; padding-top: 6px;''>"; print_r($petarray[$j]['name']); 
$x++;  $j++; echo " </p>
                    <img class='img-circle img-bordered-sm' src='../dist/img/cat-128x128.jpg' alt='pet image'>
                  </div>
                </a>
              </li>";
              //}
            }
           echo " </ul>
          </li>

          <li class='nav-item'>
<a href='../view/DoctorPetSearch.php' class='nav-link'>
<i class='nav-icon fa fa-heartbeat'></i>
<p>
Treatments
</p>
</a>
</li>


<li class='nav-item'>
<a href='../view/bodytypescore.php' class='nav-link'>
<i class='nav-icon fa fa-star'></i>
<p>
Body Type Score
</p>
</a>
</li>

<li class='nav-item'>
<a href='./petcarecenters.php' class='nav-link'>
<i class='nav-icon fa fa-location-arrow'></i>
<p>
Petcare Centers
</p>
</a>
</li>

<li class='nav-item'>
<a href='./setting.php' class='nav-link'>
<i class='nav-icon fa fa-cog'></i>
<p>
User Settings
</p>
</a>
</li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>


";




}



?>
